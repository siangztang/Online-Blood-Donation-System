<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `appointment` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'appointment_id',
    1 => 'donor_username',
    2 => 'healthcarep_username',
    3 => 'center_id',
    4 => 'appointment_date_time',
    5 => 'appointment_status',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, appointment_id) like '%".$search_value."%'";
	$sql .= " OR donor_username like '%".$search_value."%'";
	$sql .= " OR healthcarep_username like '%".$search_value."%'";
	$sql .= " OR CONCAT(prefix2, center_id) like '%".$search_value."%'";
	$sql .= " OR appointment_date_time like '%".$search_value."%'";
	$sql .= " OR appointment_status like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY appointment_id ASC";
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
    $id = $row['appointment_id'];
    $appointment_id = "$prefix"."$id";
    $sub_array[] = $appointment_id;
	$sub_array[] = $row['donor_username'];
	$sub_array[] = $row['healthcarep_username'];
	$sub_array[] = "BDC".$row['center_id'];
	$sub_array[] = $row['appointment_date_time'];
	$sub_array[] = $row['appointment_status'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['appointment_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['appointment_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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
