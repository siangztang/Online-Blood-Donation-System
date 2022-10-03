<?php 
include('dbconn.php');

$id = $_POST['id'];
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$admin_name = $_POST['admin_name'];
$admin_email = $_POST['admin_email'];
$admin_contact = $_POST['admin_contact'];

if(empty($_FILES['image'])){

	$sql = "UPDATE `admin` SET  `admin_username`='$admin_username' ,`admin_password`='$admin_password' ,`admin_name`='$admin_name' , `admin_email`='$admin_email', `admin_contact`='$admin_contact'  WHERE admin_id='$id' ";
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
                $sql = "UPDATE `admin` SET  `admin_username`='$admin_username' ,`admin_password`='$admin_password' ,`admin_name`='$admin_name' , `admin_email`='$admin_email', `admin_contact`='$admin_contact', `image`='$img_path'  WHERE admin_id='$id' ";
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
            
            $sql = "UPDATE `admin` SET  `admin_username`='$admin_username' ,`admin_password`='$admin_password' ,`admin_name`='$admin_name' , `admin_email`='$admin_email', `admin_contact`='$admin_contact'  WHERE admin_id='$id' ";
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