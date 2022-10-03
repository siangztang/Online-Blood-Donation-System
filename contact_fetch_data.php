<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `contact_form` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'contact_form_id',
    1 => 'donor_username',
    2 => 'seeker_username',
    3 => 'healthcarep_username',
    4 => 'contact_form_email',
    5=> 'contact_form_date_time',
    6 => 'contact_form_subject',
    7 => 'contact_form_message	',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, contact_form_id)  like '%".$search_value."%'";
	$sql .= " OR donor_username like '%".$search_value."%'";
	$sql .= " OR seeker_username like '%".$search_value."%'";
	$sql .= " OR healthcarep_username like '%".$search_value."%'";
	$sql .= " OR contact_form_email like '%".$search_value."%'";
	$sql .= " OR contact_form_date_time like '%".$search_value."%'";
	$sql .= " OR contact_form_subject like '%".$search_value."%'";
	$sql .= " OR contact_form_message like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY contact_form_id ASC";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$prefix = $row['prefix'];
	$id = $row['contact_form_id'];
    $contact_form_id = "$prefix"."$id";
    $sub_array[] = $contact_form_id;
	$sub_array[] = $row['donor_username'];
	$sub_array[] = $row['seeker_username'];
	$sub_array[] = $row['healthcarep_username'];
	$sub_array[] = $row['contact_form_email'];
	$sub_array[] = $row['contact_form_date_time'];
	$sub_array[] = $row['contact_form_subject'];
	$sub_array[] = $row['contact_form_message'];
	$sub_array[] = '<a href="mailto:'.$row['contact_form_email'].'" data-id="'.$row['contact_form_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-reply"></i></a>  <a href="javascript:void();" data-id="'.$row['contact_form_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

mysqli_close($conn);

?>
