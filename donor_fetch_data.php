<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `donor` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'donor_id',
    1 => 'donor_username',
    2 => 'donor_name',
    3 => 'donor_blood_type',
    4 => 'donor_age',
    5 => 'donor_gender',
    6 => 'donor_contact',
    7 => 'donor_address',
    8 => 'donor_email',
    9 => 'latest_donation_date',
    10 => 'image',

);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, donor_id) like '%".$search_value."%'";
	$sql .= " OR donor_username like '%".$search_value."%'";
	$sql .= " OR donor_name like '%".$search_value."%'";
	$sql .= " OR donor_blood_type like '%".$search_value."%'";
	$sql .= " OR donor_age like '%".$search_value."%'";
	$sql .= " OR donor_gender like '%".$search_value."%'";
	$sql .= " OR donor_contact like '%".$search_value."%'";
	$sql .= " OR donor_address like '%".$search_value."%'";
	$sql .= " OR donor_email like '%".$search_value."%'";
	$sql .= " OR latest_donation_date like '%".$search_value."%'";
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
	$sql .= " ORDER BY donor_id ASC";
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
	$requestQuery = mysqli_query($conn,"SELECT max(blood.donate_date_time) FROM blood blood inner join donor donor on blood.donor_username='".$row['donor_username']."';");	
	$sub_array = array();
	$prefix = $row['prefix'];
    $id = $row['donor_id'];
    $donor_id = "$prefix"."$id";
    $sub_array[] = $donor_id;
	$sub_array[] = $row['donor_username'];
	$sub_array[] = $row['donor_name'];
	$sub_array[] = $row['donor_blood_type'];
	$sub_array[] = $row['donor_age'];
	$sub_array[] = $row['donor_gender'];
	$sub_array[] = $row['donor_contact'];
	$sub_array[] = $row['donor_address'];
	$sub_array[] = $row['donor_email'];
	while($rows = mysqli_fetch_assoc($requestQuery)){
		if (is_null($rows['max(blood.donate_date_time)'])){
			$sub_array[]='<center>-</center>';
		}else{
			$date = $rows['max(blood.donate_date_time)'];
			$sub_array[]="<center>$date</center>";
		}
	}
	if($row['image'] != ''){
		$sub_array[] = '<center><img style="width:80px;" src="assets/img/upload/donor/'.$row['image'].'" /></center> ';
	}else{

		$sub_array[] = '<center>-</center>';
	}
	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['donor_id'].'" class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="javascript:void();" data-id="'.$row['donor_id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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