<?php include('dbconn.php');

$output = array();
$sql = "SELECT * FROM `blog` ";
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'blog_id',
    1 => 'admin_username',
    2 => 'blog_dtCreated',
    3 => 'blog_title',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(prefix, blog_id) like '%".$search_value."%'";
	$sql .= " OR admin_username like '%".$search_value."%'";
	$sql .= " OR blog_dtCreated like '%".$search_value."%'";
	$sql .= " OR blog_title like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY blog_id ASC";
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
    $idforshown = $row['blog_id'];
    $blog_id = "$prefix"."$idforshown";
    $sub_array[] = $blog_id;

	$id = $row['blog_id'];
	$sub_array[] = $row['blog_title'];
	$datetime = $row['blog_dtCreated'];
	$date = explode(" ", $datetime);
	$sub_array[] = $date[0];
	$sub_array[] = $row['admin_username'];
	
	$sub_array[] = '<a href="blog_edit_post.php?id='.$id.'"; class="btn btn-info btn-sm editbtn" ><i class="fa-solid fa-pen-to-square"></i></a>  <a href="blog_delete.php?id='.$id.'"; class="btn btn-danger btn-sm deleteBtn" ><i class="fa-solid fa-trash"></i></a>';
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

