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
  .notifi-box {
  background: var(--red);
  opacity: 0;
  backdrop-filter: blur(15px);
  width: 400px;
  height: 0px;
  position: absolute;
  top: 1px;
  right: 45px;
  overflow-y:auto;
  transition: 0.6s ease;
  transition-property: 1s opacity, 250ms height;
  margin-top: 190px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
  font-size: 30px;
  padding: 10px;
  border-bottom: 1px solid #eee;
  color: #999;
  margin-left: 45px;

}
.notifi-box h2 span {
  color: #f00;
}
.notifi-item {
  display: flex;
  border-bottom: 1px solid #eee;
  padding: 15px 5px;
  margin-bottom: 15px;
  cursor: pointer;
  margin-left: 45px;

}
.notifi-item:hover {
  background-color: #eee;
}

.notifi-item .text h4 {
  color: #777;
  font-size: 16px;
  margin-top: 10px;
  
}
.notifi-item .text p {
  color:#999;
  font-size: 12px;
  
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
.notifi-box h1 {
  font-size: 30px;
  text-align:center;
  padding: 10px;
  color: red;
  margin-left: 0px;
  margin-top: 200px;

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
           <a href="donor_logout.php" class="logout_btn">Logout</a>


    </nav>
    <?php $sql = "SELECT * FROM appointment where donor_username='$donor_username' and appointment_status = 'pending' and status='0' ORDER BY appointment_date_time DESC";
        $res = mysqli_query($conn, $sql); ?>
     <div class="icon"  onclick="toggleNotifi()">
        <img src="assets/img/images/bell4.png" alt="" > <span><?php echo mysqli_num_rows($res); ?></span>
      </div>
    <?php
      $select = mysqli_query($conn, "SELECT * FROM `donor` WHERE donor_username = '$donor_username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>
          <center > 
           <?php
            if($fetch['image'] == ''){
               echo ' <a href="donor_update_profile.php"><img src="assets/img/images/default-avatar.png" >' ;
            }else{
               echo ' <a href="donor_update_profile.php"><img src="assets/img/upload/donor/'.$fetch['image'].'">';
            }
           ?>
            </center>
    


</header>
<!-- Header Section Ends -->

<!--Notification Section Starts Here-->
<nav>
		<div class="logo"> </div>

		<div class="notifi-box" id="box" style="    z-index: 1;">
			<h2>Notifications <span><?php echo mysqli_num_rows($res); ?></span></h2>
            <?php
                $query = "SELECT * FROM appointment where donor_username='$donor_username' and appointment_status = 'pending'  ORDER BY appointment_date_time DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                        
                ?>

                            <a style="
                         <?php
                            if($i['status']=='0'){
                                echo "font-weight:bold; " ;
                            }
                         ?> 
                         " class="dropdown-item" href="notiview.php?id=<?php echo $i['appointment_id'] ?> " >
			<div class="notifi-item" >
                
            <div class="text" id="notifications"  >  

            <h4 style="font-weight:900;"> Appointment Reminder !!!</h4> <br>
                 <p style="  font-size: 17px;"> <?php echo date('F j, Y, g:i a',strtotime($i['appointment_date_time'])) ?></p>
                 <p style="  font-size: 17px;"> Appointment ID : <?php echo $i ["appointment_id"];?> </p>
                 <p style="  font-size: 17px;"> Status : <?php echo $i ["appointment_status"];?> </p>

                </div> 
                <span style="font-size:15px;color:#999;float:right;margin-top:50px;margin-left:50px;">                        <?php
                            if($i['status']=='0'){
                                echo sprintf(" <i class='fa-solid fa-circle'></i>") ;
                            }
                         ?> </span>
          </div>
          </a>


                <?php  
                }
            }else
                {echo "<h1> No Records yet.</h1>";} 
                ?>



            

		</div>
	</nav>


  
	<script src="js/notiscript.js"></script>


<!--Notification Section Ends Here-->


</body>