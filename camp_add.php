<?php include('dbconn.php');


$center_id  = $_POST['center_id'];
$camp_date_time = $_POST['camp_date_time'];
$camp_description = $_POST['camp_description'];



$sql = "INSERT INTO `blood_donation_camp` (`center_id`,`camp_date_time`,`camp_description`)
 values ('$center_id','$camp_date_time', '$camp_description')";
$query= mysqli_query($conn,$sql);

if (!$query) {
    echo("Error description: " . mysqli_error($conn));
}

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