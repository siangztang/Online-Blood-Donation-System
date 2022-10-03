<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `blood` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'bloodbag_id',
    1 => 'donor_username',
    2 => 'blood_group',
    3 => 'blood_volume',
    4 => 'hemoglobin_content',
    5 => 'blood_status',
    6 => 'donate_date_time',
    7 => 'date_best_before',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE donor_username like '%".$search_value."%'";
	$sql .= " OR blood_group like '%".$search_value."%'";
	$sql .= " OR blood_volume like '%".$search_value."%'";
	$sql .= " OR hemoglobin_content like '%".$search_value."%'";
	$sql .= " OR blood_status like '%".$search_value."%'";
	$sql .= " OR donate_date_time like '%".$search_value."%'";
	$sql .= " OR date_best_before like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY bloodbag_id ASC";
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
    $id = $row['bloodbag_id'];
    $bloodbag_id = "$prefix"."$id";
    $sub_array[] = $bloodbag_id;
	$sub_array[] = $row['donor_username'];
	$sub_array[] = $row['blood_group'];
	$sub_array[] = $row['blood_volume'];
	$sub_array[] = $row['hemoglobin_content'];
	$sub_array[] = $row['blood_status'];
	$sub_array[] = $row['donate_date_time'];
	$sub_array[] = $row['date_best_before'];
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