
<?php
include 'functions.php';
include 'config.php';
session_start();
$donor_username = $_SESSION['donor_username'];
?>
<?php
if(isset($_POST['submit']))
{

  $center_id = $_POST['center_id'];
  $appointment_date_time = $_POST['appointment_date_time'];

  $select = mysqli_query($conn, "SELECT * FROM `appointment` WHERE appointment_date_time = '$appointment_date_time' and center_id = '$center_id'") or die('query failed');

  
   if( mysqli_num_rows($select) > 0 )
   {
     echo "<script>alert('Woops! Slot is already taken pls choose a different slot.')</script>";
   } 
   else
   {
    $insert = mysqli_query($conn, "INSERT INTO `appointment`(donor_username,appointment_date_time,appointment_status,center_id) VALUES('$donor_username','$appointment_date_time','pending','$center_id')") or die('query failed');
    if($insert){
      echo "<script>alert(' Appointment Booked Successfully!.')</script>";

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
            @import url('font-inter.css');

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
    color: #fff;
    font-weight: 500;
    font-size: 16px;
    border: none;
   
}


.btn-primary-soft:hover{
    background-color: var(--primarycolor) ;
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
  font-size: 23px;
  font-weight: 600;
  padding-top: 20px;
  padding-bottom: 10px;
}

.h3-search{
  margin: 0;
  padding: 0;
  font-size: 18px;
  font-weight: 500;
  color: #212529e3;
  
}
.xo{
    width: 40%;
    margin: 0.5rem;
    border-radius: .5rem;
    border: var(--border);
    font-size: 1.5rem;
    color: var(--black);
    text-transform: none;
    text-align: center;
    margin-top:16.5px;
    margin-bottom:20.5px;
    margin-left:20.5px;
}

            
    .logout-btn{
    margin-top: 30px;
    width: 85%;
}

.header-search{
    display: flex;
    justify-content: center;

    
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
        <h3 style="font-size:48px;">Welcome to Our Appointment Page</h3>
        <p style="font-size:20px;">Let's start booking appointments and save lives.</p>
    </div>

</section>

<!-- Home section Ends -->
<section style="  background-color: #fff;">

<div class="container">
     <h1 class="heading" style="color:#751919;">Book Now!!! </h1>
     <div class="menu">

                          
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    </td>
                    <td >
                            <form action="" method="GET" class="header-search">

                                        <input type="search" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="input-text header-searchbar" placeholder="Search Your Venue" list="doctors" value="">&nbsp;&nbsp;
                                        
                                
                                        <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                        </form>
                    </td>
                    <td width="15%">
  
                    </td>
                    <td width="10%">
                    </td>


                </tr>
                
                
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <p class="heading-main12" style="margin-left: 65px;font-size:30px;color:rgb(49, 49, 49);margin-top: 45px;margin-bottom: 25px">Blood Centers  </p>
                        <p class="heading-main12" style="margin-left: 45px;font-size:22px;color:rgb(49, 49, 49)"> </p>
                    </td>
                    
                </tr>

                <tr>
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
    if(isset($_GET['search']))
    {
      $filtervalues = $_GET['search'];
			$sql = "SELECT * FROM blood_donation_camp inner join blood_donation_center on blood_donation_camp.center_id=blood_donation_center.center_id WHERE CONCAT(center_name,center_address,center_contact,camp_description) LIKE '%$filtervalues%' ";
			$result = mysqli_query($connection,$sql);

        if (!$result) {
				die("Invalid query: " . $connection->error);
			}
            // read data of each row
			while($row = $result->fetch_assoc()) 
            {
                ?>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none;padding-top:0px;">
                            
                        <tbody>
                        
                            <tr>


                                        <td style="width: 25%;">
                                                <div  class="dashboard-items search-items"  >

                                                    <div style="width:100%; text-align:center;">

                                                       <form  method="post" >  


                                                            <div class="h1-search" >
                                                            <input type="hidden" name="center_name"><?php echo $row ["center_name"];?></input> 
                                                               
                                                            </div>
                                                            <div class="h3-search" style="text-align:Justify;">
                                                              <input type="hidden" name="center_id" value="<?php echo $row ["center_id"];?>"> </input> 
                                                            </div>
                                                            <div class="h3-search" style="text-align:Justify;">
                                                              <input type="hidden" name="center_address"><b>Address : </b> <?php echo $row ["center_address"];?> </input> 
                                                            </div>
                                                            <div class="h3-search" style="text-align:Justify;">
                                                              <input type="hidden" name="center_contact"><b>Contact : </b> <?php echo $row ["center_contact"];?></input>                                                                 
                                                            </div>
                                                            <div class="h3-search" style="text-align:Justify;">
                                                              <input type="hidden" name="center_information"><b>Additional Info : </b> <?php echo $row ["center_information"];?></input>   
                                                            </div>
                                                            <input type="datetime-local" class="xo"  name="appointment_date_time"  required></input>

                                                            <br>
                                                            <INPUT type="submit"  name="submit" class="login-btn btn-primary-soft btn " style="padding-top:11px;padding-bottom:11px;width:100%"></INPUT><br><br>

                                                          </form>
                                                    </div>
                                                 
                                                </div>
                                            </td><br>
                                            


                              </tr> 
                        </tbody>
                        </table>
                        </div>
                       </center>
                   </td> 
                </tr>
                
               <?php

            }
          }
          $connection->close(); 
?>     


            </table>
        </div>
    </div>

    </div>  


    </section>


<!-- Footer section Starts -->

<?php include("donor_footer.html") ?>

<!-- Footer section Ends -->

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>


</body>
