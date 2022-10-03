<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `blood_donation_center` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'center_id',
    1 => 'center_name',
    2 => 'center_contact',
    3 => 'center_address',
    4 => 'center_information',
    5 => 'image',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, center_id) like '%".$search_value."%'";
	$sql .= " OR center_name like '%".$search_value."%'";
	$sql .= " OR center_contact like '%".$search_value."%'";
	$sql .= " OR center_address like '%".$search_value."%'";
	$sql .= " OR center_information like '%".$search_value."%'";
	$sql .= " OR image like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY center_id ASC";
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
    $id = $row['center_id'];
    $center_id = "$prefix"."$id";
    $sub_array[] = $center_id;
	$sub_array[] = $row['center_name'];
	$sub_array[] = $row['center_contact'];
	$sub_array[] = $row['center_address'];
	$sub_array[] = $row['center_information'];
	if($row['image'] != ''){
		$sub_array[] = '<img style="width:80px;" src="assets/img/upload/donation_center/'.$row['image'].'" /> ';
	}else{

		$sub_array[] = '-';
	}
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['center_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['center_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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