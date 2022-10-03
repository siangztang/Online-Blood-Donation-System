<?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $db = 'fusiontech';

  $conn = mysqli_connect($host, $username, $password, $db);
  if($conn===false){
      die('Error connection' . mysqli_connect_error());
  }
?>