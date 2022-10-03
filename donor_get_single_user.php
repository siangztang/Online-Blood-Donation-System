<?php include('dbconn.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `donor` WHERE donor_id='$id' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

mysqli_close($conn);

?>
