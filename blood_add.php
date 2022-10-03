<?php include('dbconn.php');

$donor  = $_POST['donor'];
$blood_group = $_POST['blood_group'];
$blood_volume = $_POST['blood_volume'];
$hemoglobin_content= $_POST['hemoglobin_content'];
$blood_status = $_POST['blood_status'];
date_default_timezone_set("Asia/Kuala_Lumpur");

$donate_date_time = date('Y-m-d H:i:s');
$date_best_before = date('Y-m-d', strtotime("+42 day"));



$sql = "INSERT INTO `blood` (`donor_username`,`blood_group`,`blood_volume`,`hemoglobin_content`,`blood_status`,`donate_date_time`,`date_best_before`)
 values ('$donor','$blood_group', '$blood_volume', '$hemoglobin_content',  '$blood_status','$donate_date_time',  '$date_best_before')";
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