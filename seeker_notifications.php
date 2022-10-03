<?php
include("config.php");
session_start();
$seeker_username = $_SESSION['seeker_username'];


$sql = "UPDATE blood_request  SET status='1' where seeker_username='$seeker_username'";
$res = mysqli_query($conn, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}

