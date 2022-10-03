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

	$sql = "UPDATE `seeker` SET  `seeker_username`='$username' ,`seeker_password`='$password' ,`seeker_name`='$name' , `seeker_blood_type`= '$blood_type',
						 `seeker_age`='$age', `seeker_gender`= '$gender', `seeker_contact`='$contact', `seeker_address`= '$address', `seeker_email`='$email', `latest_request_date`='$date' WHERE seeker_id='$id' ";
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

            $move = move_uploaded_file($path,'assets/img/upload/seeker/'.$filename);
      
            if($move){

        		$img_path .= $filename;
                $sql = "UPDATE `seeker` SET  `seeker_username`='$username' ,`seeker_password`='$password' ,`seeker_name`='$name' , `seeker_blood_type`= '$blood_type',
						 `seeker_age`='$age', `seeker_gender`= '$gender', `seeker_contact`='$contact', `seeker_address`= '$address', `seeker_email`='$email', `latest_request_date`='$date', `image`='$img_path' WHERE seeker_id='$id' ";
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
            
            $sql = "UPDATE `seeker` SET  `seeker_username`='$username' ,`seeker_password`='$password' ,`seeker_name`='$name' , `seeker_blood_type`= '$blood_type',
				 `seeker_age`='$age', `seeker_gender`= '$gender', `seeker_contact`='$contact', `seeker_address`= '$address', `seeker_email`='$email', `latest_request_date`='$date'  WHERE seeker_id='$id' ";
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