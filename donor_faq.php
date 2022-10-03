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
    <title>Faq JavaScript</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">

        <style>
            /* Google Font CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500;600&display=swap');

::selection{
  background: #751919;
  color: #fff;
}
.accordion{
  display: flex;
  max-width: 100%;
  width: 100%;
  align-items: center;
  justify-content: space-between;
  background: #fff;
  border-radius: 25px;
  padding: 45px 90px 45px 60px;

}
.accordion .image-box{
  height: 360px;
  width: 600px;

}
.accordion .image-box img{
  height: 100%;
  width: 100%;
  object-fit: contain;
}
.accordion .accordion-text{
  width: 60%;
}
.accordion .accordion-text .title{
  font-size: 35px;
  font-weight: 600;
  color: #751919;
  font-family: 'Fira Sans', sans-serif;
}
.accordion .accordion-text .faq-text{
  margin-top: 25px;
  height: auto;

}

.accordion .accordion-text li{
  list-style: none;
  cursor: pointer;
}
.accordion-text li .question-arrow{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.accordion-text li .question-arrow .question{
  font-size: 18px;
  font-weight: 500;
  color: #595959;
  transition: all 0.3s ease;
}
.accordion-text li .question-arrow .arrow{
  font-size: 20px;
  color: #595959;
  transition: all 0.3s ease;
}
.accordion-text li.showAnswer .question-arrow .arrow{
  transform: rotate(-180deg);
}
.accordion-text li:hover .question-arrow .question,
.accordion-text li:hover .question-arrow .arrow{
  color: #751919;
}
.accordion-text li.showAnswer .question-arrow .question,
.accordion-text li.showAnswer .question-arrow .arrow{
  color:#751919;
}
.accordion-text li .line{
  display: block;
  height: 2px;
  width: 100%;
  margin: 10px 0;
  background: rgba(0, 0, 0, 0.1);
}
.accordion-text li p{
  width: 92%;
  font-size: 15px;
  font-weight: 500;
  color: #595959;
  display: none;
  line-height:1.8;
}
.accordion-text li.showAnswer p{
  display: block;
}

@media (max-width: 994px) {
  body{
    padding: 40px 20px;
  }
  .accordion{
    max-width: 100%;
    padding: 45px 60px 45px 60px;
  }
  .accordion .image-box{
    height: 360px;
    width: 220px;
  }
  .accordion .accordion-text{
    width: 63%;
  }
}
@media (max-width: 820px) {
  .accordion{
    flex-direction: column;
  }
  .accordion .image-box{
    height: 360px;
    width: 300px;
    background: #7d2ae8;
    width: 100%;
    border-radius: 25px;
    padding: 30px;
  }
  .accordion .accordion-text{
    width: 100%;
    margin-top: 30px;
  }
}
@media (max-width: 538px) {
  .accordion{
    padding: 25px;
  }
  .accordion-text li p{
    width: 98%;
  }
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

</style>

</head>
<body>
    <!-- Header section Starts -->
    <?php include("donor_header_2.php") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home" style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/faq3.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Our FAQ Page</h3>
        <p style="font-size:20px;">Let's get answers to some frequently asked questions .</p>
    </div>

</section>
<!-- Home section Ends -->

<!-- Blog Section starts -->
<section class="blog" id="blog"  style="background-color: #fff;">
<div class="box-container">

<div class="accordion">

    <div class="accordion-text">
      <div class="title">Frequently Asked Questions</div>
    <ul class="faq-text">
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
			$sql = "SELECT * FROM faq";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                
                <li>
                  <div class="question-arrow">
                     <span class="question"><?php echo $row ["faq_title"];?></span>
                     <i class="bx bxs-chevron-down arrow"></i>
                  </div>
                  <br><p><?php echo $row ["faq_answer"];?> </p>
                  <span class="line"></span>
               </li>
             
               <?php

            }
            $connection->close();
?>


    </ul>
    </div>
    <div class="image-box" style="margin-left:150px;">
      <img src="assets/img/images/giphy.gif" alt="Accordion Image">
    </div>
  </div>

    <script>
    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
      li[i].addEventListener("click", (e)=>{
        let clickedLi;
        if(e.target.classList.contains("question-arrow")){
          clickedLi = e.target.parentElement;
        }else{
          clickedLi = e.target.parentElement.parentElement;
        }
       clickedLi.classList.toggle("showAnswer");
      });
    }
  </script>



</div><br>
</section>
<!-- Blog Section Ends -->


<!-- Footer section Starts -->

<?php include("donor_footer.html") ?>
<!-- Footer section Ends -->
  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>

</html>