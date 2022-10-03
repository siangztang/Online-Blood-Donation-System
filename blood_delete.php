<?php include('dbconn.php');

$id = $_POST['id'];
$sql = "DELETE FROM `blood` WHERE bloodbag_id='$id'";
$query =mysqli_query($conn,$sql);
if($query==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 
mysqli_close($conn);
?>