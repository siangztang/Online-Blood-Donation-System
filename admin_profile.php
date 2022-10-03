<?php
    session_start(); 
    include_once("dbconn.php");

    if(isset( $_SESSION["loggedin"] )){
        $session_id = $_SESSION["admin_id"];
        $uname = $_SESSION["admin_username"];
        $email = $_SESSION["admin_email"];
    }else{
        header("Location: 400.php");
    }

    $imagequery = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = $session_id"));

    $image = $imagequery["image"];


    if(isset($_POST['btnModify'])){
        $username = $_POST["username2"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $update_query = "UPDATE `admin` SET `admin_password`='$password',`admin_name`='$name',`admin_email`='$email',`admin_contact`='$contact' WHERE `admin_username` = '$username'";

        $query_run = mysqli_query($conn, $update_query);

        if($query_run)
        {
            $status = 1;
        }
        else
        {
            $status = 2;
        }
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
        <title>Admin Profile - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>

        <style>
            .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            }

            .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            }
        </style>
    </head>
    <body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="admin_dashboard.php"><img src="assets/img/logo.jpeg" alt="logo" style="width: 80px; height: 32px">FusionTech - Blood Donation Online System</a>
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/upload/admin/<?php echo $image ?>" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/upload/admin/<?php echo $image ?>" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php echo $uname;?></div>
                                <div class="dropdown-user-details-email"><?php echo $email;?></div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin_profile.php">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="hp_admin_logout.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link" href="admin_dashboard.php">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <!-- Sidenav Heading (Main)-->
                            <div class="sidenav-menu-heading">Main</div>
                            <!-- Sidenav Accordion (Manage Profile)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                                Manage Profile
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProfile" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link" href="donor_index.php">Donor</a>
                                    <a class="nav-link" href="seeker_index.php">Seeker</a>
                                    <a class="nav-link" href="hp_table.php">Healthcare Professional</a>
                                    <a class="nav-link" href="admin_table.php">Admin</a>
                                </nav>
                            </div>
                            <!-- Sidenav Accordion (Manage Donation Center)-->
                            <a class="nav-link" href="center_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-hospital"></i></div>
                                Manage Donation Center
                            </a>
                            <!-- Sidenav Accordion (Manage Blood Bank Inventory)-->
                            <a class="nav-link collapsed " href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseInv" aria-expanded="false" aria-controls="collapseInv">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-warehouse"></i></div>
                                Blood Bank Inventory
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseInv" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link " href="inventory_index.php">Manage Inventory</a>
                                    <a class="nav-link " href="blood_index.php">Bloodbag</a>
                                    <a class="nav-link " href="location_index.php">Blood Location</a>
                                </nav>
                            </div>
                            <!-- Sidenav Accordion (Manage Blood Donation)-->
                            <a class="nav-link" href="appointment_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-heart"></i></div>
                                Manage Appointment (Blood Donation)
                            </a>

                            <!-- Sidenav Accordion (Manage Blood Request)-->
                            <a class="nav-link" href="request_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-hand-holding-heart"></i></div>
                                Manage Blood Request
                            </a>

                            <!-- Sidenav Accordion (Manage Blood Campaign)-->
                            <a class="nav-link" href="camp_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-calendar-day"></i></div>
                                Manage Blood Campaign
                            </a>

                            <!-- Sidenav Accordion (Manage Recent Blog)-->
                            <a class="nav-link" href="blog_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-newspaper"></i></div>
                                Manage Recent Blog
                            </a>

                            <!-- Sidenav Accordion (Manage Gallery)-->
                            <a class="nav-link" href="gallery_index.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-photo-video"></i></div>
                                Manage Gallery
                            </a>

                            <!-- Sidenav Accordion (Manage FAQ)-->
                            <a class="nav-link" href="faq_table.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-question-circle"></i></div>
                                Manage FAQ
                            </a>

                            <!-- Sidenav Accordion (Manage Contact Form)-->
                            <a class="nav-link" href="contact_index.php">
                                <div class="nav-link-icon"><i class="fa-solid fa-envelopes-bulk"></i></div>
                                Contact Form List
                            </a>

                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as Admin:</div>
                            <div class="sidenav-footer-title"><?php echo $uname;?></div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-fluid px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="user"></i></div>
                                            Profile
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" src="assets/img/upload/admin/<?php echo $image ?>" alt="" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">Accept: JPG or PNG</div>
                                        <!-- Profile picture upload button-->
                                        <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                                            <?php
                                            $id = $imagequery["admin_id"];
                                            $name = $imagequery["admin_name"];
                                            
                                            ?>
                                            <div class="upload-btn-wrapper">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                                <button class="btn btn-primary">Upload a file</button>
                                                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <?php
                                            $sql_query = "SELECT * FROM `admin` WHERE `admin_username` = '$uname';";
                                            $results = mysqli_query($conn, $sql_query);
                                            while($row = mysqli_fetch_assoc($results)){
                                        ?>
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="username">Username (how your name will appear to other users on the site)</label>
                                                <input class="form-control" id="username2" name="username2" type="hidden" placeholder="Enter your username ..." value="<?php echo $uname; ?>"/>
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username" value="<?php echo $uname ?>" disabled/>
                                            </div>
                                            <!-- Form Row (Full Name)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="name">Full Name</label>
                                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="<?php echo $row["admin_name"]; ?>" />
                                            </div>
                                            <!-- Form Row (Home Address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" value="<?php echo $row["admin_password"]; ?>" />
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Email address</label>
                                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email address" value="<?php echo $row["admin_email"]; ?>" />
                                            </div>
                                            <!-- Form Row (Phone number)-->
                                            <div class="mb-3">
                                                    <label class="small mb-1" for="contact">Phone number</label>
                                                    <input class="form-control" id="contact" name="contact" type="tel" placeholder="Enter your phone number" value="<?php echo $row["admin_contact"]; ?>" />
                                                </div>
                                            <!-- Save changes button-->
                                            <button type="submit" class="btn btn-primary" name="btnModify">Done Modify</button>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; FusionTech 2022</div>
                        </div>
                    </div>
                </footer> b
            </div>
        </div>
        <?php include("js_link.php"); ?>
        <?php
            if(isset($status)){
                if ($status == 1) {
                    echo 
                    "<script>
                        Swal.fire({
                        title: 'Modify Successfully!',
                        icon: 'success',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace('admin_profile.php');
                        } else {
                            location.replace('admin_profile.php');
                        }
                        })
                    </script>";
                }else if ($status == 2){
                    echo 
                    "<script>
                        Swal.fire({
                        title: 'Failed to Modify Profile!',
                        icon: 'error',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace('admin_profile.php');
                        } else {
                            location.replace('admin_profile.php');
                        }
                        })
                    </script>";
                }
            }

        ?>


        <script type="text/javascript">
            document.getElementById("image").onchange = function(){
            document.getElementById("form").submit();
            };
        </script>

     <?php
        if(isset($_FILES["image"]["name"])){
        $id = $_POST["id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)){
            echo
            "
            <script>
            alert('Invalid Image Extension');
            document.location.href = '/blood_donation_system/admin_profile.php';
            </script>
            ";
        }
        elseif ($imageSize > 1200000){
            echo
            "
            <script>
            alert('Image Size Is Too Large');
            document.location.href = '/blood_donation_system/admin_profile.php';
            </script>
            ";
        }
        else{
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa");
            $newImageName .= '.' . $imageExtension;
            $query = "UPDATE `admin` SET `image` = '$newImageName' WHERE admin_id = $id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'assets/img/upload/admin/' . $newImageName);
            echo
            "
            <script>
            document.location.href = ' /blood_donation_system/admin_profile.php';
            </script>
            ";
        }
        }
    ?>
    <?php mysqli_close($conn); ?>
    </body>
</html>
