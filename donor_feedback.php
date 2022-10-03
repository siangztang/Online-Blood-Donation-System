
<?php
include 'functions.php';
include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];
if(isset($_POST['submit']))
{
   $donor_username = $_POST['donor_username'];
   $contact_form_email = $_POST['contact_form_email'];
   $contact_form_subject = $_POST['contact_form_subject'];
   $contact_form_message = $_POST['contact_form_message'];

   if(empty($contact_form_email) || empty($donor_username) || empty($contact_form_subject) || empty($contact_form_message))
   {
     echo "<script>alert('Woops! Something Wrong Went.')</script>";
   } 
   else
   {
    $insert = mysqli_query($conn, "INSERT INTO `contact_form`(donor_username,contact_form_email, contact_form_subject, contact_form_message) VALUES('$donor_username','$contact_form_email', '$contact_form_subject', '$contact_form_message')") or die('query failed');
    if($insert){
      echo "<script>alert('Feedback Sent Successfully!.')</script>";
      header('location:feedback.php');
    }    
   }
}
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

.containers .content{
  display: flex;
  align-items: center;
  justify-content: space-between;

  border:.2rem solid  #751919;
  background-color:rgba(230, 225, 225, 0.849);

}
.containers .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.content .left-side::before{
  content: '';
  position: absolute;
  height: 85%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #2f2f36;
}
.content .left-side .details{
  margin: 22px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 50px;
  color:#751919;
  margin-bottom: 10px;
}
.content .left-side .details .topic{
  font-size: 23px;
  font-weight: 500;
}
.content .left-side .details .text-one,
.content .left-side .details .text-two{
  font-size: 18px;
  color: #751919;
}
.container .content .right-side{
  width: 65%;
  margin-right: 375px;
}
.content .right-side .topic-text{
  font-size: 36px;
  font-weight: 600;
  color: #1c1b1f;
  line-height: 3.8rem;
  text-align: center;
  margin-right: 175px;

}

.content .right-side  p{
  font-size: 23px;
  font-weight: 600;
  color: #1c1b1f;
  line-height: 2.8rem;
  text-align: center;
  margin-right: 175px;


}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 15px 0;
  margin-right: 175px;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 90%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #Fff;
  border-radius: 6px;
  padding: 0 25px;
  resize: none;
  margin-right: 175px;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 20px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
  margin-left: 170px;
}
.right-side .button input[type="button"]{
  color: #fff;
  font-size: 23px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: var(--red);
  cursor: pointer;
  transition: all 0.3s ease;
}
      .btn{
    display: inline-black;
    margin-top: 1rem;
    padding: .5rem;
    padding-left: 1rem;
    border: var(--border);
    border-radius: .5rem;
    box-shadow:var(--box-shadow);
    color: var(--red);
    cursor: pointer;
    font-size: 1.7rem;
    background: #fff;

    width:520px;
}

.btn span{
    padding: .7rem 1rem;
    border-radius: .5rem;
    background: var(--red);
    color:#fff;
    margin-left: .5rem;
}

.btn:hover{
    background:var(--red) ;
    color:#fff ;
}

.btn:hover span{
    color:var(--red) ;
    background:#fff;
    margin-left: 1rem;
}


</style>
</head>
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
        <h3 style="font-size:48px;">Welcome to Our Feedback Page</h3>
        <p style="font-size:20px;">Please share your feedback to help us improve our system.</p>
    </div>

</section>

<!-- Home section Ends -->
<section style="  background-color: #fff;">

<div class="containers">
  <div class="content">
    <div class="left-side">
      <div class="address details">
        <i class="fas fa-map-marker-alt"></i>
        <div class="topic">Address</div>
        <div class="text-one">Jalan Teknologi 5,<br>
          Taman Teknologi Malaysia,<br>
          57000 Kuala Lumpur,<br>
          Wilayah Persekutuan Kuala Lumpu</div>

      </div>
      <div class="phone details">
        <i class="fas fa-phone-alt"></i>
        <div class="topic">Phone</div>
        <div class="text-one">+60 123456789</div>

      </div>
      <div class="email details">
        <i class="fas fa-envelope"></i>
        <div class="topic">Email</div>
        <div class="text-one">fusiontech@gmail.com</div>

      </div>
    </div>
    <div class="right-side">
      <div class="topic-text">Send us a message</div><br>
      <p>If you have any any type of quries , <br> you can send us message from here. It's our pleasure to help you.</p>
    
    <form method="post" >
      <div class="input-box">
        <input type="hidden" name="donor_username" placeholder="Username" value="<?php echo $fetch['donor_username']; ?>" required="required" >
      </div>
      <div class="input-box">
        <input type="email" name="contact_form_email" placeholder="Email" value="<?php echo $fetch['donor_email']; ?>" required="required" >
      </div>
      <div class="input-box">
        <input type="text"  name="contact_form_subject" placeholder="Subject" required="required" >
      </div>
      <div class="input-box message-box">
        <textarea  name="contact_form_message" placeholder="Type Your Message...." required="Required" ></textarea>
      </div>
      <div class="button">
        <input type="submit" name="submit" value="Send Now" class="btn">
      </div>
    </form>
  </div>
  </div>
</div>
</section>


<!-- Footer section Starts -->

<?php include("donor_footer.html") ?>

<!-- Footer section Ends -->




</body>