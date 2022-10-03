<?php
include 'functions.php';
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];

?>
<?php
if(isset($_POST['delete']))
{
  $id = $_POST['id'];

  $query = "DELETE FROM blood_request WHERE request_id='$id'";
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


.footer{

    border-bottom: 1px solid rgba(0, 23, 58, 0.8);
    padding: 0 0 0 0;
}
.footer .box-container{
    border-bottom:10px solid #6967679d;
    border-top:10px solid #6967679d;
    background: #e9e9e9;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(22rem,1fr));
    gap: 2rem;
}

.footer .box-container .box h3{
    font-size: 28px;
    margin: 0 0 20px 0;
    padding: 2px 0 2px 0;
    line-height: 1;
    font-weight: 700;
    text-transform: uppercase;
    color:#751919;
    font-weight: bold;
}
.footer .box-container .box p{
    font-size: 14px;
    line-height: 24px;
    margin-bottom: 0;
    font-family: "Raleway", sans-serif;
    color: #444;
}

.footer .box-container .box a{
    display: block;
    font-size: 1.5rem;
    color: #444;
    padding: 1rem 0;
    line-height: 1;
}
.footer .box-container .box a:hover{
    color: #751919;
}

.footer .box-container .box a i{
    padding-right:.5rem;
    color:  #751919;
}

.footer .box-container .box a:hover i{
    padding-right:2rem;
    
}
.home{
    padding-top: 200px;
    background-color: #751919;
}

.donate-seek .box-button{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
    gap:2rem;
    padding-right: 350px;

}

.donate-seek .box-button .btn{

    border-radius: 10rem;
    box-shadow:var(--box-shadow);
    border: var(--border);
    padding: 3rem;
    text-align: center;
    font-size: large;
    font-weight: bold;
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
        <h3 style="font-size:48px;">Welcome to My Request Page</h3>
        <p style="font-size:20px;">Let's hae a look at your request lists.</p>
    </div>

</section>

<!-- Home section Ends -->


<section  style="background-color: #fff;">
      
<div class="container">
    <h1 class="heading">My Request </h1>

    <div class="dash-body"style="background-color: gray;" > 
      <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
        <tr>
          <td colspan="4" style="padding-top:0px;width: 100%;">
            <center>
              <table class="filter-container" border="0">
                <tr>
                  <td width="10%">

                  </td>
                  <td width="5%" style="text-align: center;font-size:20px;color:rgb(0, 0, 0);">

                  </td>
                  <td width="30%">

                  </td>

                </tr>

                <tr>

                  <td colspan="4" style="padding-top:10px;width: 100%;">
                    <?php $sql = "SELECT * FROM blood_request where seeker_username='$seeker_username'";
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
                        $sql = "SELECT * FROM blood_request   WHERE seeker_username = '$seeker_username' ORDER BY request_date_time DESC";
                        $result = $connection->query($sql);

                        if (!$result) {
                          die("Invalid query: " . $connection->error);
                        }
                        // read data of each row
                        while ($row = $result->fetch_assoc()) {
                        ?>



                          <div class="dashboard-items search-items">

                            <div style="width:100%;">
                              <form method="post">

                                <div class="h3-search">
                                  Request ID: <?php echo $row["request_id"]; ?><br>
                                </div>
                                <div class="h1-search">
                                  Request Blood Type: <?php echo $row["blood_type"]; ?><br>
                                </div>

                                <div class="h4-search">
                                  <b> Request Date:</b> <?php echo $row["request_date_time"]; ?>
                                </div>
                                <br>
                                <button class=" btn-primary-soft1  " style="padding-top:11px;padding-bottom:11px;width:100%;margin-bottom:15px;">
                                  <font class="tn-in-text"><?php echo $row["request_status"]; ?></font>
                                </button>
                                <form method="post">
                                  <input type="hidden" name="id" value="<?php echo $row["request_id"]; ?>">
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
<?php include("seeker_footer.html") ?>

<!-- Footer section Ends -->




</body>