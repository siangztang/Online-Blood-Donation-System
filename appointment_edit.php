<?php 
include('dbconn.php');

$id = $_POST['id'];
$donor = $_POST['donor'];
$centerID = $_POST['centerID'];
$date_time = $_POST['date_time'];
$appointment_status = $_POST['appointment_status'];

$sql = "UPDATE `appointment` SET  `donor_username`='$donor' ,`healthcarep_username`=(SELECT healthcarep_username FROM `healthcare_professional` WHERE `center_id` = $centerID ORDER BY RAND() LIMIT 1) ,`center_id`='$centerID' , `appointment_date_time`= '$date_time',
 `appointment_status`='$appointment_status' WHERE appointment_id='$id' ";
$query= mysqli_query($conn,$sql);

if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully update data!'

       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to update data!'

      
    );

    echo json_encode($data);
} 
mysqli_close($conn);
?>