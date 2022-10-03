<?php
    include_once("dbconn.php");

    if(isset($_POST['contactSubmit'])){
        $email = trim($_POST['inputEmail']);
        $date_time = date('Y-m-d H:i:s');
        $subject = $_POST['inputSubject'];
        $msg = $_POST['inputMessage'];

        $insert_sql = "INSERT INTO `contact_form`(`contact_form_email`,`contact_form_date_time`, `contact_form_subject`,`contact_form_message`) VALUES ('$email','$date_time','$subject', '$msg')";

        $query_run = mysqli_query($conn, $insert_sql);

        if($query_run)
        {
            $status = 1;
        }
        else
        {
            $status = 2;
        }
    }
    
    mysqli_close($conn);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact Admin - FusionTech</title>
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
                                        <div class="h3 fw-light mb-0">Contact Admin</div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <form action="#" method="post" class="row g-3 was-validated">
                                            <?=(isset($error_msg)) ? $error_msg : '';?>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmail">Email address</label>
                                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="Enter your email address" required="required"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputSubject">Subject</label>
                                                <input class="form-control" id="inputSubject" name="inputSubject" type="tel" required="required" placeholder="Enter your subject" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputMessage">Message: </label>
                                                <textarea class="form-control" name="inputMessage" id="inputMessage" rows="10" required="required" placeholder="Type Your Message...."></textarea>
                                            </div>
                                            
                                            <button type="submit" value="Send" class="btn btn-primary" id="contactSubmit" name="contactSubmit">Submit</button>
                                        </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-4">
                                        <div class="small text-center">
                                            Back to Main Login Page?
                                            <a href="hp_admin_login_choice.php">Click here!</a>
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
        <?php
            if(isset($status)){
                if ($status == 1) {
                    echo 
                    "<script>
                        Swal.fire({
                        title: 'Contact Form Submitted!',
                        icon: 'success',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace('hp_admin_login_choice.php');
                        } else {
                            location.replace('hp_admin_login_choice.php');
                        }
                        })
                    </script>";
                }else if ($status == 2){
                    echo 
                    "<script>
                        Swal.fire({
                        title: 'Failed to Submit Contact Form!',
                        icon: 'error',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace('hp_admin_login_choice.php');
                        } else {
                            location.replace('hp_admin_login_choice.php');
                        }
                        })
                    </script>";
                }
            }

        ?>


    </body>
</html>