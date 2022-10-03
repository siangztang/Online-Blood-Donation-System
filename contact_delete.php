<?php include('dbconn.php');

$id = $_POST['id'];
$sql = "DELETE FROM `contact_form` WHERE contact_form_id='$id'";
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