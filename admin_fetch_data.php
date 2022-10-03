
<?php

include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `admin` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'admin_id',
    1 => 'admin_username',
    2 => 'admin_name',
    3 => 'admin_email',
    4 => 'admin_contact',
    5 => 'image',
);


if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, admin_id) like '%".$search_value."%'";
	$sql .= " OR admin_username like '%".$search_value."%'";
	$sql .= " OR admin_password like '%".$search_value."%'";
	$sql .= " OR admin_name like '%".$search_value."%'";
	$sql .= " OR admin_email like '%".$search_value."%'";
	$sql .= " OR admin_contact like '%".$search_value."%'";
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
	$sql .= " ORDER BY admin_id ASC";
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
    $id = $row['admin_id'];
    $admin_id = "$prefix"."$id";
    $sub_array[] = $admin_id;
	$sub_array[] = $row['admin_username'];
	$sub_array[] = $row['admin_name'];
	$sub_array[] = $row['admin_email'];
	$sub_array[] = $row['admin_contact'];
	if($row['image'] != ''){
		$sub_array[] = '<img style="width:80px;" src="assets/img/upload/admin/'.$row['image'].'" /> ';
	}else{
		$sub_array[] = '-';
	}
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['admin_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['admin_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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

