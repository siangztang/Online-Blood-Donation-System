<?php

include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];

if(isset($_POST['seeker_update_profile'])){

   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_age = mysqli_real_escape_string($conn, $_POST['update_age']);
   $update_contact = mysqli_real_escape_string($conn, $_POST['update_contact']);

   mysqli_query($conn, "UPDATE `seeker` SET seeker_age = '$update_age',seeker_contact = '$update_contact', seeker_email = '$update_email' WHERE seeker_username = '$seeker_username'") or die('query failed');

   if(!empty($update_contact)){
      if(!preg_match ("/^(01)[0-9]{8,9}$/", $update_contact)){
         $message[] = 'invalid contact!';
      }else{
         mysqli_query($conn, "UPDATE `seeker` SET seeker_contact = '$update_contact' WHERE seeker_username = '$seeker_username'") or die('query failed');
         $message[] = 'contact updated successfully!';
      }
   }

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, ($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, ($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, ($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif (!preg_match ("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $new_pass)){
         $message[] = 'Password length min 8 & must contain one capital letter, one integer!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `seeker` SET seeker_password = '$confirm_pass' WHERE seeker_username = '$seeker_username'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'assets/img/upload/seeker/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `seeker` SET image = '$update_image' WHERE seeker_username = '$seeker_username'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/profilestyle.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `seeker` WHERE seeker_username = '$seeker_username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" class="was-validated" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="assets/img/images/default-avatar.png" >' ;
         }else{
            echo '<img src="assets/img/upload/seeker/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }

         $tempUname = $fetch['seeker_username'];
      ?>
      
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['seeker_username']; ?>" class="box" disabled>
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['seeker_email']; ?>" class="box">
            <span>Your Age :</span>
            <input type="text" name="update_age" value="<?php echo $fetch['seeker_age']; ?>" class="box">
            <span>Your Phone Number :</span>
            <input type="text" name="update_contact" value="<?php echo $fetch['seeker_contact']; ?>" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['seeker_password']; ?>" >
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box" >
         </div>
      </div>
      <input type="submit" value="Update profile" name="seeker_update_profile" class="btn">
      <a href="seeker.php" class="delete-btn">Go back</a>
   </form>

</div>

</body>
</html>