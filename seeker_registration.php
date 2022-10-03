<?php

include 'config.php';

if(isset($_POST['submit'])){

   $seeker_username = mysqli_real_escape_string($conn, $_POST['seeker_username']);
   $seeker_email = mysqli_real_escape_string($conn, $_POST['seeker_email']);
   $seeker_password = mysqli_real_escape_string($conn, ($_POST['seeker_password']));
   $seeker_cpassword = mysqli_real_escape_string($conn, ($_POST['seeker_cpassword']));
   $seeker_name = mysqli_real_escape_string($conn, $_POST['seeker_name']);
   $seeker_blood_type = mysqli_real_escape_string($conn, $_POST['seeker_blood_type']);
   $seeker_age = mysqli_real_escape_string($conn, $_POST['seeker_age']);
   $seeker_gender = mysqli_real_escape_string($conn, $_POST['seeker_gender']);
   $seeker_contact = mysqli_real_escape_string($conn, $_POST['seeker_contact']);
   $seeker_address = mysqli_real_escape_string($conn, $_POST['seeker_address']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'assets/img/upload/seeker/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `seeker` WHERE seeker_username = '$seeker_username' AND seeker_password = '$seeker_password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exist'; 
   }else{
      if(!preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $seeker_password)){
         $message[] = 'Password length min 8 & must contain one capital letter, one integer!';
      }elseif(!preg_match ("/^(01)[0-9]{8,9}$/", $seeker_contact)){
         $message[] = 'Contact not valid';
      }elseif($seeker_password != $seeker_cpassword){
         $message[] = 'Confirm password not matched!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `seeker`(seeker_username, seeker_email, seeker_password,seeker_name,seeker_blood_type,seeker_age,seeker_gender,seeker_contact,seeker_address, image) VALUES('$seeker_username', '$seeker_email', '$seeker_password','$seeker_name','$seeker_blood_type','$seeker_age','$seeker_gender','$seeker_contact','$seeker_address', '$image')") or die('query failed');

         if($insert){
            
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script>alert('Registered Successfully!.')</script>";
            header('location:seeker_login.php');
         }else{
            $message[] = 'Failed Registration!';
         }
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
   <link rel="stylesheet" href="css/registrationstyle.css">
   
</head>
<body>

<div class="wrapper">
<form action="" method="post" enctype="multipart/form-data"> 
    <div class="title">
      Registration Form
    </div>
    <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
    <div class="form">
      <div class="inputfield">
        <label>Username</label>
        <input type="text" class="input" name="seeker_username" placeholder="enter username" class="box"  required >
       </div> 
       <div class="inputfield">
        <label>Password</label>
        <input type="password" class="input" name="seeker_password" placeholder="enter password" class="box"  required >
     </div>  
     <div class="inputfield">
        <label>Confirm Password</label>
        <input type="password" class="input" name="seeker_cpassword" placeholder="confirm password" class="box" required>
     </div> 
       <div class="inputfield">
          <label>Full Name</label> 
          <input type="text" class="input" name="seeker_name" placeholder="Enter your name" class="box" pattern="^[a-zA-Z '.,]{4,}(?: [a-zA-Z]+)?(?: [a-zA-Z]+)?$" required>
       </div>  

       <div class="inputfield">
        <label>Age</label>
        <input type="number" class="input" name="seeker_age" required>
       </div> 

       <div class="inputfield">
        <label>Blood Group</label>
        <div class="custom_select">
          <select name="seeker_blood_type" required>
            <option value="">Select</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
       </div>


        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="seeker_gender" required>
              <option value="">Select</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
          </div>
        </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="seeker_contact"  required>
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="seeker_address" required></textarea>
       </div> 
       <div class="inputfield">
        <label>Email Address</label>
        <input type="text" class="input" name="seeker_email" placeholder="enter email" class="box" required>
       </div>         
       

     <div class="inputfield">
      <label>Upload Profile Picture</label>
      <input type="file" name="image" class="input" accept="image/jpg, image/jpeg, image/png">
     </div>
     <div class="inputfield"> 
     </div>

      <div class="inputfield">
        <input type="submit" name="submit" value="Register" class="btn" >
      </div><br>
    </div>
    <p>Already a Member? <a href="seeker_login.php">Login Now</a></p>
</div>	
	
</body>
</html>