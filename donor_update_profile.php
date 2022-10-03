<?php

include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_age = mysqli_real_escape_string($conn, $_POST['update_age']);
   $update_contact = mysqli_real_escape_string($conn, $_POST['update_contact']);

   mysqli_query($conn, "UPDATE `donor` SET donor_name = '$update_name',donor_age = '$update_age', donor_email = '$update_email' WHERE donor_username = '$donor_username'") or die('query failed');
   
   if(!empty($update_contact)){
      if(!preg_match ("/^(01)[0-9]{8,9}$/", $update_contact)){
         $message[] = 'invalid contact!';
      }else{
         mysqli_query($conn, "UPDATE `donor` SET donor_contact = '$update_contact' WHERE donor_username = '$donor_username'") or die('query failed');
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
         mysqli_query($conn, "UPDATE `donor` SET donor_password = '$confirm_pass' WHERE donor_username = '$donor_username'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }



   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'assets/img/upload/donor/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `donor` SET image = '$update_image' WHERE donor_username = '$donor_username'") or die('query failed');
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
      $select = mysqli_query($conn, "SELECT * FROM `donor` WHERE donor_username = '$donor_username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" class="was-validated" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="assets/img/images/default-avatar.png" >' ;
         }else{
            echo '<img src="assets/img/upload/donor/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Full Name :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['donor_name']; ?>" class="box">
            <span>Your Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['donor_email']; ?>" class="box">
            <span>Your Age :</span>
            <input type="text" name="update_age" value="<?php echo $fetch['donor_age']; ?>" class="box">
            <span>Your Phone Number :</span>
            <input type="text" name="update_contact" value="<?php echo $fetch['donor_contact']; ?>" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['donor_password']; ?>"  >
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box"  >
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box"  >
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box" >
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
      </div>
      <input type="submit" value="Update profile" name="update_profile" class="btn">
      <a href="donor.php" class="delete-btn">Go back</a>
   </form>

</div>

</body>
</html>