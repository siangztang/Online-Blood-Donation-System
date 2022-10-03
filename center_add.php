<?php include('dbconn.php');

$name = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$information = $_POST['information'];

$sqlSelect = "SELECT * FROM `blood_donation_center` WHERE  center_name = '$name' "; 
$result = mysqli_query($conn, $sqlSelect);
if(mysqli_num_rows($result) > 0){ 

	$data = array(

        'status'=>'failed',
        'msg' => 'Center Name is duplicated'
      
    );

    echo json_encode($data);


}else{
		
	if(empty($_FILES['image'])){
		$sql = "INSERT INTO `blood_donation_center` (`center_name`,`center_contact`,`center_address`,`center_information`)
            values ('$name','$contact','$address','$information')";
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

					$sql = "INSERT INTO `blood_donation_center` (`center_name`,`center_contact`,`center_address`,`center_information`,`image`)
                        values ('$name','$contact','$address','$information','$img_path')";
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
