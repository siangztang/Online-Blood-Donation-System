<?php 
include('dbconn.php');

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$blood_type = $_POST['blood_type'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];

$date = date('Y-m-d H:i:s');

if(empty($_FILES['image'])){

	$sql = "UPDATE `donor` SET  `donor_username`='$username' ,`donor_password`='$password' ,`donor_name`='$name' , `donor_blood_type`= '$blood_type',
		 `donor_age`='$age', `donor_gender`= '$gender', `donor_contact`='$contact', `donor_address`= '$address', `donor_email`='$email', `latest_donation_date`='$date'  WHERE donor_id='$id' ";
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




}else{
		$img = $_FILES['image'];
		if(isset($img['name']) && $img["name"] != '' ){

		$filename = date('YmdHi').'_'.(str_replace(' ','',$img['name']));
        $path = $img['tmp_name'];
        $img_path = '';

        $move = move_uploaded_file($path,'assets/img/upload/donor/'.$filename);
      
        if($move){

        		$img_path .= $filename;
				$sql = "UPDATE `donor` SET  `donor_username`='$username' ,`donor_password`='$password' ,`donor_name`='$name' , `donor_blood_type`= '$blood_type',
				 `donor_age`='$age', `donor_gender`= '$gender', `donor_contact`='$contact', `donor_address`= '$address', `donor_email`='$email', `latest_donation_date`='$date', `image`='$img_path' WHERE donor_id='$id' ";
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
				      	'msg' => 'Failed to update data' . mysqli_error($conn)
				    );

				    echo json_encode($data);
				} 
		}else{

				$data = array(
				        'status'=>'failed',
				      	'msg' => 'Failed to upload image'
				    );

				    echo json_encode($data);

		}
}else{


		$sql = "UPDATE `donor` SET  `donor_username`='$username' ,`donor_password`='$password' ,`donor_name`='$name' , `donor_blood_type`= '$blood_type',
		 `donor_age`='$age', `donor_gender`= '$gender', `donor_contact`='$contact', `donor_address`= '$address', `donor_email`='$email', `latest_donation_date`='$date'  WHERE donor_id='$id' ";
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



}






}




mysqli_close($conn);



?>