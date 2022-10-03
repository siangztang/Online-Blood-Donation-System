<?php include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$blood_type = $_POST['blood_type'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];

$sqlSelect = "SELECT * FROM donor WHERE  donor_username = '$username' "; 
$result = mysqli_query($conn, $sqlSelect);

if(mysqli_num_rows($result) > 0){ 

	$data = array(

        'status'=>'failed',
        'msg' => 'Username is duplicated'
      
    );

    echo json_encode($data);


}else{
	if(empty($_FILES['image'])){
		$sql = "INSERT INTO `donor` (`donor_username`,`donor_password`,`donor_name`,`donor_blood_type`,`donor_age`,`donor_gender`,`donor_contact`,`donor_address`,`donor_email`,`image`)
						 values ('$username','$password', '$name',  '$blood_type','$age' ,  '$gender','$contact' ,  '$address','$email' ,'')";
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

						$sql = "INSERT INTO `donor` (`donor_username`,`donor_password`,`donor_name`,`donor_blood_type`,`donor_age`,`donor_gender`,`donor_contact`,`donor_address`,`donor_email`,`image`)
						 values ('$username','$password', '$name',  '$blood_type','$age' ,  '$gender','$contact' ,  '$address','$email','$img_path')";
						$query = mysqli_query($conn,$sql);
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
						        'status'=> 'failed',
						      	'msg' => 'Failed to add data'
						    );

						    echo json_encode($data);
						} 
				}else{


						$data = array(
						        'status'=>'failed',
						      	'msg' => 'Failed to add image'
						    );

						    echo json_encode($data);
				}

}else{


	$sql = "INSERT INTO `donor` (`donor_username`,`donor_password`,`donor_name`,`donor_blood_type`,`donor_age`,`donor_gender`,`donor_contact`,`donor_address`,`donor_email`,`image`)
						 values ('$username','$password', '$name',  '$blood_type','$age' ,  '$gender','$contact' ,  '$address','$email' ,'')";
						$query= mysqli_query($conn,$sql);


				if($query ==true)
				{
				   
				    $data = array(
				        'status'=> 'success',
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

		}
}

}
mysqli_close($conn);
?>