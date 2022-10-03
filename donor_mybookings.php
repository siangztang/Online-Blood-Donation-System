<?php
include 'functions.php';
include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];

?>
<?php
if(isset($_POST['delete']))
{
  $id = $_POST['id'];

  $query = "DELETE FROM appointment WHERE appointment_id='$id'";
  $query_run = mysqli_query ($conn,$query);

  if ($query_run)
  {
    echo '<script> alert ("Appointment Cancelled");</script>';
  }
  else
  {
    echo '<script> alert ("Error");</script>';
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
:root {
  --primarycolor: #751919;
  --primarycolorhover: #d68989;
  --btnice:#D8EBFA;
  --btnnicetext:#1b62b3;
}
.dashboard-items{
  
  border: 5px solid #751919;
  border-radius: 7px;
  color: var(--primarycolor);

}
.header-searchbar{
    width: 75%;
    background-color: rgba(255, 255, 255, 0.705);
    border: 0.5px solid rgba(190, 190, 190, 0.884);
    font-size:18px;
    
    
}


.dash-body{
    display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow:.5rem .5rem 0 rgba(4, 82, 66, 0.2);
  margin-left: 10px;
  padding-top: 30px;
  border:.2rem solid  #751919;
  background-color:rgba(230, 225, 225, 0.849);
}
.input-text{
    border-radius: 4px;
    border: 5px solid #d68989;
    padding: 10px;
    width: 92%;
    transition: 0.2s;
    outline: none;
}

.input-text:focus{
    border: 5px solid #751919;
    transition: 0.2s;
}
.btn{
    cursor: pointer;
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 15px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Inter', sans-serif;
}

.btn:hover{
    background-color: var(--primarycolorhover);
    box-shadow: none;
    transition: all 0.5s;
    font-family: 'Inter', sans-serif;

}

.btn-primary{
    background-color: var(--primarycolor) ;
    border: 1px solid var(--primarycolor) ;
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.btn-primary-soft{
    background-color: #d68989;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/    color: #fff;
    font-weight: 500;
    font-size: 16px;
    border: none;
    /*box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3)*/
}
.btn-primary-soft1{
    background-color: var(--primarycolor);
    /*border: 1px solid rgba(57,108,240,0.1) ;*/    color: #fff;
    font-weight: 500;
    font-size: 16px;
    border: none;
    /*box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3)*/
}

.btn-primary-soft:hover{
    background-color: var(--primarycolor) ;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.search-items{
  padding:20px;
  margin:10px;
  width:95%;
  display: flex;
  padding-left:0;
  padding-left: 30px;
  box-sizing: border-box;
  line-height: 1.5;
  box-shadow: 0 3px 5px 0 rgba(95, 95, 97, 0.068);
}

.h1-search{
  margin: 0;
  padding: 0;
  font-size: 25px;
  font-weight: 600;
  padding-top: 20px;
  padding-bottom: 10px;
}

.h3-search{
  margin: 0;
  padding: 0;
  font-size: 25px;
  font-weight: 500;
  color: #212529e3;
  
}
.h4-search{
  margin: 0;
  padding: 0;
  font-size: 20px;
  font-weight: 500;

  
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
        <h3 style="font-size:48px;">Welcome to My Bookings Page</h3>
        <p style="font-size:20px;">Let's hae a look at your booking lists.</p>
    </div>

</section>

<!-- Home section Ends -->
<section  style="  background-color: #fff;">
      
<div class="container">

<h1 class="heading">My Bookings </h1>

<div class="dash-body">
<table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
  <tr >
      <td colspan="4" style="padding-top:0px;width: 100%;" >
          <center>
          <table class="filter-container" border="0" >
          <tr>
             <td width="10%">

             </td> 
          <td width="5%" style="text-align: center;font-size:20px;color:rgb(0, 0, 0);">

          </td>
          <td width="30%">

      </td>

      </tr>

  <tr>

              <td colspan="4" style="padding-top:10px;width: 100%;" >
              <?php $sql = "SELECT * FROM appointment where donor_username='$donor_username'";
              $res = mysqli_query($conn, $sql); ?>
                  <p class="heading-main12" style="margin-right: 180px;font-size:30px;color:rgb(49, 49, 49);margin-top: 15px;margin-bottom: 45px">Total Bookings (<?php echo mysqli_num_rows($res); ?>)</p>

              </td>
              
          </tr>
              </table>

          </center>
      </td>
      
  </tr>
  
 
    
  <tr>
     <td colspan="4">
         <center>
          <div class="abc scroll">
          <table width="80%" class="sub-table scrolldown" border="0" style="border:none">
          
          <tbody>
          
              <tr>
              <td style="width: 25%;">
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
      $sql = "SELECT * FROM appointment inner join blood_donation_center on appointment.center_id=blood_donation_center.center_id  WHERE donor_username='$donor_username' ORDER BY appointment_date_time DESC";
      $result = $connection->query($sql);

      if (!$result) {
          die("Invalid query: " . $connection->error);
      }
      // read data of each row
      while($row = $result->fetch_assoc()) 
      {
          ?>
          


                                      <div  class="dashboard-items search-items"  >
                                      
                                          <div style="width:100%;">
                                          <form method="post" >
                                          
                                                  <div class="h3-search" >
                                                      Appointment ID: <?php echo $row ["appointment_id"];?><br>
                                                  </div>
                                                  <div class="h1-search">
                                                      Center Name: <?php echo $row ["center_name"];?><br>
                                                  </div>
                                                  <div class="h4-search">
                                                     <b> Center Contact:</b> <?php echo $row ["center_contact"];?> <br>
                                                     <b> Appointment Date:</b> <?php echo $row ["appointment_date_time"];?> 
                                                  </div>
                                                  <br>
                                                  <button  class=" btn-primary-soft1  "  style="padding-top:11px;padding-bottom:11px;width:100%;margin-bottom:15px;"><font class="tn-in-text"><?php echo $row ["appointment_status"];?></font></button>
                                                  <form method="post" >
                                                    <input type="hidden" name="id" value="<?php echo $row ["appointment_id"];?>">
                                                    <INPUT type="submit" value="Cancel Booking" name="delete" class="login-btn btn-primary-soft btn " style="padding-top:11px;padding-bottom:11px;width:100%"></INPUT><br><br>
                                                  </form>
                                              </div>
                                          
                                      </div><br>

                                      
       
         <?php

      }
      $connection->close();
?>
                              </td> 
              </tr>
          </tbody>

          </table>
          </div>
          </center>
     </td> 
  </tr>
         
          
          
</table>
</div>
</div>
</div>

</section>


<!-- Footer section Starts -->
<?php include("donor_footer.html") ?>

<!-- Footer section Ends -->




</body>