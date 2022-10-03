<?php include('dbconn.php');

$donor = $_POST['donor'];
$centerID = $_POST['centerID'];
$date_time = $_POST['date_time'];
$appointment_status = $_POST['appointment_status'];


$sql = "INSERT INTO `appointment` (`donor_username`,`healthcarep_username`,`center_id`,`appointment_date_time`,`appointment_status`)
 values ('$donor',(SELECT healthcarep_username FROM `healthcare_professional` WHERE `center_id` = $centerID ORDER BY RAND() LIMIT 1), '$centerID', '$date_time',  '$appointment_status')";
$query= mysqli_query($conn,$sql);


if($query ==true)
{
   
    $data = array(
        'status'=>'success',
        'msg' => 'Successfully add data'

       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
        'msg' => 'Failed to add data'

      
    );

    echo json_encode($data);
} 
mysqli_close($conn);
?>