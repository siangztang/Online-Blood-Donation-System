<?php 
include('dbconn.php');

$id = $_POST['id'];
$donor  = $_POST['donor'];
$blood_group = $_POST['blood_group'];
$blood_volume = $_POST['blood_volume'];
$hemoglobin_content= $_POST['hemoglobin_content'];
$blood_status = $_POST['blood_status'];
$donate_date_time = $_POST['donate_date_time'];
$date_best_before = $_POST['date_best_before'];

$sql = "UPDATE `blood` SET  `donor_username`='$donor' ,`blood_group`='$blood_group' ,`blood_volume`='$blood_volume' , `hemoglobin_content`= '$hemoglobin_content',
 `blood_status`='$blood_status',`donate_date_time`='$donate_date_time', `date_best_before`='$date_best_before' WHERE bloodbag_id='$id' ";
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