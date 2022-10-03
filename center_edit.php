<?php 
include('dbconn.php');

$id = $_POST['id'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$information = $_POST['information'];


if(empty($_FILES['image'])){

	$sql = "UPDATE `blood_donation_center` SET  `center_name`='$name' , `center_contact`='$contact', `center_address`= '$address', `center_information`='$information' WHERE `center_id`='$id' ";
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

        $move = move_uploaded_file($path,'assets/img/upload/donation_center/'.$filename);
      
        if($move){

        		$img_path .= $filename;
                $sql = "UPDATE `blood_donation_center` SET  `center_name`='$name' , `center_contact`='$contact', `center_address`= '$address', `center_information`='$information', `image`='$img_path'  WHERE `center_id`='$id' ";
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


    $sql = "UPDATE `blood_donation_center` SET  `center_name`='$name' , `center_contact`='$contact', `center_address`= '$address', `center_information`='$information', `image`='$img_path'  WHERE `center_id`='$id' ";

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