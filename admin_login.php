<?php
    session_start();
    include_once("dbconn.php");

    if(isset($_POST["login"])){
        $uname =  $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `admin` WHERE admin_username='$uname' AND admin_password='$password'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            echo "Login successful";
            $_SESSION["loggedin"] = true;
            $_SESSION["admin_id"] = $row["admin_id"];
            $_SESSION["admin_username"] = $row["admin_username"];
            $_SESSION["admin_name"] = $row["admin_name"];
            $_SESSION["admin_password"] = $row["admin_password"];
            $_SESSION["admin_contact"] = $row["admin_contact"];
            $_SESSION["admin_email"] = $row["admin_email"];
            $_SESSION["image"] = $row["image"];
            header("Location: admin_dashboard.php");
        }else{
            $error_msg = "<p class='error_msg'>Login Failed! Username or Password Wrong!</p>";
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Login - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>
    </head>
    <style>
        .bg {
            background-color: #4c5760;
            
        }
    </style>
    <body class="bg">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4 mt-15">
                        <div class="row justify-content-center">
                            <center>
                                <img src="assets/img/logo.png" alt="logo" style="width: 240px; height: 96px; margin-bottom: 20px;">
                                <h1 style="color: white; font-size: 32px; font-weight: bold;">Fusion Tech - Blood Donation System</h1>
                            </center>
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                                <div class="card my-5">
                                    <div class="card-body p-5 text-center">
                                        <div class="h3 fw-light mb-0">Admin - Log In</div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <!-- Login form-->
                                        <form action="#" method="post" class="row g-3 was-validated">
                                            <?=(isset($error_msg)) ? $error_msg : '';?>
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" id="username" placeholder="Enter username" pattern="^(?=.{5,50}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" name="username" required>
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password:</label>
                                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
                                            </div>
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex align-items-center justify-content-center mt-5">
                                                <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-4">
                                        <div class="small text-center">
                                            No Account but is admin?
                                            <a href="admin_contact_admin.php">Contact Admin!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small text-white">Copyright &copy; Fusion Tech 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php include("js_link.php"); ?>
    </body>
</html>
