<?php

include 'config.php';
session_start();


if(isset($_POST['submit'])){

   $seeker_username = mysqli_real_escape_string($conn, $_POST['seeker_username']);
   $seeker_password = mysqli_real_escape_string($conn ,$_POST['seeker_password']);

   $select = mysqli_query($conn, "SELECT * FROM `seeker` WHERE seeker_username = '$seeker_username' AND seeker_password = '$seeker_password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['seeker_username'] = $row['seeker_username'];
      header('location:seeker.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/profilestyle.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="username" name="seeker_username" placeholder="enter username" class="box" required>
      <input type="password" name="seeker_password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>Don't have an account? <a href="seeker_registration.php">Register Now</a></p>
   </form>

</div>

</body>
</html>