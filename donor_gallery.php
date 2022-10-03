<?php
include 'functions.php';
include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Blood Donation Gallery</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="assets/css/css/foundation.css" />
      <script src="assets/js/vendor/jquery.js"></script>
      <script src="assets/js/vendor/modernizr.js"></script>
      <link rel="stylesheet" href="assets/css/style2.css">

      <!-- font awesome cdn link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      
   </head>

   <style>


.icons-container .heading{
    color: #fff;
}
.icons-container .box-container{
    display: grid;
    gap:2rem;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.icons-container  .icons{
    border: var(--border);
    box-shadow: var(--box-shadow);
    border-radius: 100%;
    text-align: center;
    padding:2.5rem;
    background: white;
}

.icons-container .icons i{
    font-size: 4.5rem;
    color:#751919;
    padding-bottom: .7rem;
}

.icons-container .icons h3{
    font-size: 4.5rem;
    color:var(--black);
    padding: .5rem 0;
    text-shadow:var(--text-shadow) ;
}

.icons-container .icons p{
    font-size: 1.7rem;
    color:var(--light-color);
}
.blog .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(40rem, 1fr));
    gap: 2rem;
}
.blog .box-container .box{
    text-align: center;
    background: white;
    border-radius: .5rem;
    border: var(--border);
    box-shadow: var(--box-shadow);
    padding: 2rem;
}
.blog .box-container .box img{
    height: 20rem;
    border: var(--border);
    border-radius: .5rem;
    margin-top: 1rem;
    margin-bottom: 1rem;
}
.blog .box-container .box h3{
    color: var(--black);
    font-size: 1.8rem;
    text-align:justify;
}
.blog .box-container .box p{
    color: var(--black);
    font-size: 1.8rem;
    text-align:left;
}

.blog .box-container h2{
  color: var(--black);
  text-shadow:var(--text-shadow) ;
  font-size: 3rem;
  line-height: 1.5; 
  margin-bottom:15px;
}
.blog .box-container .box span{
    color: var(--turqoise);
    font-size: 2.5rem;
    
}


.donor-opinion .heading{
    color: white;
}
   </style>
   <body>
   
<!-- Header section Starts -->
<?php include("donor_header_2.php") ?>
<!-- Header Section Ends -->
<!-- Home section Starts -->
<section class="home" id="home"   style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Our Gallery Page</h3>
        <p style="font-size:20px;">Let's have a look at some pictures.</p>
    </div>

</section>

<!-- Home section Ends -->

<section class="donor-opinion" id="donor-opinion" style="background-color: #fff;">

<h1 class="heading" >Photo Gallery </h1>

    <div class="box-container">
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
     $sql = "SELECT * FROM gallery ORDER BY image_id";
     $result = $connection->query($sql);

        if (!$result) {
        die("Invalid query: " . $connection->error);
     }
        // read data of each row
     while($row = $result->fetch_assoc()) 
        {
            ?>
                 <div class="box">
                <?php echo '<img src="assets/img/upload/gallery/'.$row['image'].'">';?> 
                <p><?php echo $row ["upload_date"];?></p><br>
                
                 </div>  
            
           <?php

        }
        $connection->close();
?>

    </div>
</section>

<!-- Footer section Starts -->
<?php include("donor_footer.html") ?>
<!-- Footer section Ends -->



  <!-- custom javascript file link  -->
  <script src="assets/js/script.js"></script>

      
   </body>

   
</html>
