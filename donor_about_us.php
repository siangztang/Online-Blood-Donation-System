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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion Tech Online Blood Donation Website</title>
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">

        <style>


/*REVIEW*/
.row-development {
  max-width: 1140px;
  margin: 0 auto 0 auto;
}
.row-development:before,
.row-development:after {
  content: "";
  display: table;
}
.row-development:after {
  clear: both;
}
.row-development h2 {
  letter-spacing: 0.5px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
  line-height: 60px;
  font-family: "Alegreya Sans SC", sans-serif;
  font-size: 36px;
  font-weight: 500;
}

.col-development {
  display: block;
  float: left;
  margin: 1% 0 1% 1.6%;
}
.col-development:first-child {
  margin-left: 0;
}
.development-box p {
  font-size: 90%;
  line-height: 145%;
  text-align: center;
}

.development {
  width: 100%;
}
.development-box {
  padding: 1%;
}

.development img {
  float: left;
  height: 45px;
  width: 45px;
  border-radius: 50%;
  margin: 10px;
}
.development p {
  float: left;
  margin-top: 15px;
  margin-left: 10px;
  font-size: large;
  color: #fff;
}

.development-text-box {
  line-height: 145%;
  margin-bottom: 20px;
  font-size: 90%;
  margin-right: 15px;
  margin-top: 70px;
  margin: 70px 10px 20px 10px;
  font-style: italic;
  font-size: 16px;
}
.development-text-box:before {
  display: block;
  font-size: 500%;
}
.development-review {
  height: 100vh;
  background-position: center;
  background-size: cover;
  color: #000000;
  background-attachment: fixed;
  clear: both;
  padding: 75px 0px;
  margin: 0px;   
}



</style>

<!-- Header section Starts -->
<?php include("donor_header_2.php") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home" style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to About Us Page</h3>
        <p style="font-size:20px;">Let's read some information about our development teams.</p>
    </div>

</section>
<!-- Home section Ends -->

<!--REVIEW-->
<section class="development" style="  background-color: #fff;">
        <div class="row-development">
            <h2>Brief Introduction<br>History and Background</h2>
        </div>
        <div class="row-development">
            <div class="col-development development development-box">
                <div class="development-text-box">
                Fusion Tech Online Blood Donation Website (hereinafter referred to as Fusion Tech) has been promoting unpaid voluntary blood donation in Malaysia since 2022, providing blood for patients in Malaysia hospitals 
                and it is still the only blood supply institution in Malaysia. Fusion Tech will be under the jurisdiction of the Hospital Authority from June 2022
                and continues to recruit voluntary blood donors to ensure that Malaysia's blood supply remains self-sufficient. With the development of clinical medical technology and the increasing demand for hematopoietic stem cells from patients, Fusion Tech will establish a public cord blood bank in 2022. Fusion Tech continues to recruit volunteer donors and find patients suitable unrelated bone marrow for transplantation.
                <br><br>
                In addition, Fusion Tech places great emphasis on the pursuit of excellent service and continuous improvement of quality, and is committed to ensuring the safety and efficacy of blood donors and recipients. To this end, the center has established a set of quality management system, which comprehensively covers the whole process from blood donation to blood transfusion.
                Fusion Tech will continue to improve the overall blood donor satisfaction by improving the blood donation center environment and service level, enhance the community's awareness of the importance of blood donation, and encourage citizens to donate blood regularly to stabilize the blood supply in Hong Kong.
                </div>
            </div>
        </div>
</section>
<!--REVIEW-->

<!-- Footer section Starts -->
<?php include("donor_footer.html") ?>

<!-- Footer section Ends -->



  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>