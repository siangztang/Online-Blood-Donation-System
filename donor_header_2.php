<?php

include 'config.php';
$donor_username = $_SESSION['donor_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion Tech Online Blood Donation Website</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">
<style>
      .icon {
    cursor: pointer;
    position:relative;
    line-height: 60px;

  }
  .icon span {
    background: var(--red);
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;

  }
  .icon img {
    display: inline-block;
    width: 25px;
    margin-top: 20px;

  }
  .icon:hover {
    opacity: .7;
  }


 .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }


.header .dropdown-content a {
    padding: 12px 16px;
    display: block;
  }
  
.dropdown:hover .dropdown-content {
    display: block;
  }

.header .navbar .dropdown .dropbtn{
    font-size: 1.7rem;
    color: var(--light-color);
    margin-left: 2rem;
    background-color: #fff;
}

.header .navbar .dropdown .dropbtn:hover{
    color: var(--bluegreen);
} 

.dropdown {
    float: left;
    overflow: hidden;
  }

 center img{
    height: 80px;
    width: 80px;
    border-radius: 50%;
    object-fit: cover;

 }


.item{
    position: relative;
    cursor: pointer;
   }
   
.item a{
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
   }
   
.item a:hover{
    background: #5a1616;
    transition: 0.3s ease;
   }
  
</style>

</head>
<body>

<!-- Header section Starts -->
<header class="header" style="background:#fff;">

    <a href="#home" class="logo"><img src="assets/img/logo.png" alt="logo"> </a>
    <nav class="navbar">
        
        <div style="float:left;"><a href="donor.php">Dashboard</a></div>
        <div class="dropdown">
            <button class="dropbtn">Appointment
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="appointment.php" >Book Appointment</a>
              <a href="donor_mybookings.php" >My Bookings</a>
            </div>
        </div>
        <div style="float:left;"> <a href="donor_donation_center.php">Donation Center</a></div>
        <div style="float:left;"> <a href="donor_donation_campaign.php">Campaigns</a></div>
        <div style="float:left;"> <a href="donor_donation_history.php">Donation History</a></div>
        <div class="dropdown">
            <button class="dropbtn">Services
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="donor_about_us.php">About</a>
            <a href="donor_faq.php">FAQ</a>
            <a href="donor_gallery.php">Gallery</a>
            <a href="donor_feedback.php">Contact Us</a>
            <a href="donor_blog_2.php">Blog</a>
            </div>
        </div>
           <a href="index.php" class="logout_btn">Logout</a>


    </nav>
</header>
<!-- Header Section Ends -->




</body>