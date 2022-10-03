<?php 
include('dbconn.php');

$id = $_POST['id'];
$center_id  = $_POST['center_id'];
$camp_date_time = $_POST['camp_date_time'];
$camp_description = $_POST['camp_description'];

$sql = "UPDATE `blood_donation_camp` SET  `center_id`='$center_id' ,`camp_date_time`='$camp_date_time' ,`camp_description`='$camp_description' WHERE camp_id='$id' ";
$query= mysqli_query($conn,$sql);

if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully update data'
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to update data'
      
    );

    echo json_encode($data);
} 
mysqli_close($conn);

?>