<?php 
	
	include('dbconn.php');

	$admin_username = $_POST['admin_username'];
	$admin_password = $_POST['admin_password'];
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$admin_contact = $_POST['admin_contact'];

	$sqlSelect = "SELECT * FROM admin WHERE admin_username = '$admin_username' "; 
	$result = mysqli_query($conn, $sqlSelect);

	if(mysqli_num_rows($result) > 0){ 

		$data = array(
        	'status'=>'failed',
        	'msg' => 'Username is duplicated'
    );

    echo json_encode($data);

	}else{

		if(empty($_FILES['image'])){
			$sql = "INSERT INTO `admin` (`admin_username`,`admin_password`,`admin_name`,`admin_email`,`admin_contact`)
			values ('$admin_username','$admin_password', '$admin_name',  '$admin_email','$admin_contact')";
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

					$move = move_uploaded_file($path,'assets/img/upload/admin/'.$filename);
		      
		        	if($move){

		                $img_path .= $filename;

						$sql = "INSERT INTO `admin` (`admin_username`,`admin_password`,`admin_name`,`admin_email`,`admin_contact`,`image`)
								values ('$admin_username','$admin_password', '$admin_name',  '$admin_email','$admin_contact' ,'$img_path')";
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

				}
		}		
	}

mysqli_close($conn);

?>