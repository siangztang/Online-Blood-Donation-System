
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

</style>
</head>
<body>
<!-- Header section Starts -->
<?php include("header.html") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home" style="background:#751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Our Blog Page</h3>
        <p style="font-size:20px;">Let's read some intresting articles realted to blood donations.</p>
    </div>

</section>

<!-- Home section Ends -->


<!-- Blog Section starts -->
<section class="blog" id="blog" style="background:#fff;">
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
            $blog_id = $_REQUEST['blog_id'];
			$sql = "SELECT * FROM blog where blog_id='$blog_id'" ;
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                

                     <div class="box" style="position:relative">
                        <h2> <?php echo $row ["blog_title"];?></h2>
                        <p style="color: var(--black);font-size: 1.8rem;text-align:left;">By : <?php echo $row ["admin_username"];?></p>
                        <p style="color: var(--black);font-size: 1.8rem;text-align:left;"><?php echo $row ["blog_dtCreated"];?></p><br>                        
                        <h3> <?php echo $row ["blog_content"];?></h3><br><br><br>
                        <div class="button" style="position:absolute;bottom:0;float:left;">
                           <a href="blog.php" class="btn ">Back </a><br><br>
                        </div> 
                     </div>                
               <?php

            }
            $connection->close();
?>


</div><br>
</section>
<!-- Blog Section Ends -->

<!-- Footer section Starts -->
<?php include("footer.html") ?>

<!-- Footer section Ends -->
  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>