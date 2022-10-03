<?php
include 'functions.php';
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];
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


@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap");

.containers {
  min-height: 100vh;

  display: flex;
  align-items: center;
  justify-content: center;
  padding: 100px 0;
  background-color: #fff;
  border:.2rem solid  #751919;
  background-color:rgba(230, 225, 225, 0.849);

}


.timeline {
  width: 80%;
  height: auto;
  max-width: 800px;
  margin: 0 auto;
  position: relative;
}

.timeline ul {
  list-style: none;
}
.timeline ul li {
  padding: 20px;
  background-color: #751919;
  color: white;
  border-radius: 10px;
  margin-bottom: 20px;
}
.timeline ul li:last-child {
  margin-bottom: 0;
}
.timeline-content h1 {
  font-weight: 500;
  font-size: 25px;
  line-height: 30px;
  margin-bottom: 10px;
}
.timeline-content p {
  font-size: 16px;
  line-height: 30px;
  font-weight: 300;
}
.timeline-content .date {
  font-size: 12px;
  font-weight: 900;
  margin-bottom: 10px;
  letter-spacing: 2px;
  color:#751919;
}
@media only screen and (min-width: 768px) {
  .timeline:before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 100%;
    background-color: gray;
  }
  .timeline ul li {
    width: 50%;
    position: relative;
    margin-bottom: 50px;
  }
  .timeline ul li:nth-child(odd) {
    float: left;
    clear: right;
    transform: translateX(-30px);
    border-radius: 20px 0px 20px 20px;
  }
  .timeline ul li:nth-child(even) {
    float: right;
    clear: left;
    transform: translateX(30px);
    border-radius: 0px 20px 20px 20px;
  }
  .timeline ul li::before {
    content: "";
    position: absolute;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background-color: gray;
    top: 0px;
  }
  .timeline ul li:nth-child(odd)::before {
    transform: translate(50%, -50%);
    right: -30px;
  }
  .timeline ul li:nth-child(even)::before {
    transform: translate(-50%, -50%);
    left: -30px;
  }
  .timeline-content .date {
    position: absolute;
    top: -30px;
  }
  .timeline ul li:hover::before {
    background-color: #751919;
  }
}




</style>
</head>
<body>
<!-- Header section Starts -->
<?php include("seeker_header_2.php") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home"   style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Donation History Page</h3>
        <p style="font-size:20px;">Let's have a look at your donation history lists.</p>
    </div>

</section>

<!-- Home section Ends -->
<section style="background-color: #fff;">

<h1 class="heading" style='color:#751919;'>Request History </h1>


      
<div class="containers">
<div class="timeline">
  <ul>
<?php
$servername = "localhost";
      $username = "root";
      $password = "";
      $database = "fusiontech";

      // Create connection
      $connection = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
      }
      // read all row from database table
      $sql = "SELECT * FROM blood_request where seeker_username='$seeker_username' ORDER BY request_date_time DESC " ;
      $result = $connection->query($sql);

      if (!$result) {
          die("Invalid query: " . $connection->error);
      }
      // read data of each row
      while($row = $result->fetch_assoc()) 
      {
          ?>
                <li>
                   <div class="timeline-content">
                     <h3 class="date"><?php echo $row ["request_date_time"];?></p></h3>
                     <h1><?php echo $row ["request_status"];?></p></h1>
                     <p>
                     <div class="h3-search" style="font-size:18px;line-height:30px">
                              Request Blood Type: <?php echo $row ["blood_type"];?><br>
                           </div>
                     </p>
                   </div>
                 </li>             
         <?php

      }
      $connection->close();
?>
</ul>
</div>
</div>

</section>




<!-- Footer section Starts -->
<?php include("seeker_footer.html") ?>
<!-- Footer section Ends -->




</body>