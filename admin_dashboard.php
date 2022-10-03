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

    
    
    include("charts_code.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>
    </head>
    <body class="nav-fixed" onload=display_ct();>
    <<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="admin_dashboard.php"><img src="assets/img/logo.png" alt="logo" style="width: 80px; height: 32px">FusionTech - Blood Donation Online System</a>
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
                            <a class="nav-link active" href="admin_dashboard.php">
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
                    <div class="container-xl px-4 mt-5">
                        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                            <div class="me-4 mb-3 mb-sm-0">
                                <h1 class="mb-0">Dashboard</h1>
                                <div class="small">
                                    <span class="fw-500 text-primary" id="ct"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card card-waves mb-4 mt-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <h1 class="text-primary">Welcome back to Fusion Tech Blood Donation Center Hi Admin</h1>
                                        <h1 class="text-gray-700" style="font-size: 35px;"><?php echo $uname ?></h1>
                                    </div>
                                    <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="assets/img/logo.png" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-start-lg border-start-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-primary mb-1">Total Donors</div>
                                                <div class="h5"><?php echo $total_row_donor ?></div>
                                            </div>
                                            <div class="ms-2"><i class="fas fa-heart fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-start-lg border-start-secondary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-secondary mb-1">Total Seekers</div>
                                                <div class="h5"><?php echo $total_row_seeker ?></div>
                                            </div>
                                            <div class="ms-2"><i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-start-lg border-start-success h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-success mb-1">Total Healthcare Professional</div>
                                                <div class="h5"><?php echo $total_row_healthcare_professional ?></div>
                                            </div>
                                            <div class="ms-2"><i class="fas fa-user-nurse fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-start-lg border-start-info h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-info mb-1">Total Donation Center</div>
                                                <div class="h5"><?php echo $total_row_blood_donation_center ?></div>
                                            </div>
                                            <div class="ms-2"><i class="fas fa-hospital fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="me-4 mb-3 mb-sm-0"><h1 class="mb-0">Blood Bank Inventory</h1></div>
                        <br>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-a fa-beat"></i>+</span></div>
                                    <div class="col">
                                        <div class="card-body py-5">
                                        <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_aplus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                            <p class="card-text">ml</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-o fa-beat"></i> +</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                            <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_bplus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                            <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-b fa-beat"></i>+</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                            <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_oplus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                            <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;">AB</i>+</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                            <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_abplus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                            <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-a fa-beat"></i>-&nbsp;</span></div>
                                    <div class="col">
                                        <div class="card-body py-5">
                                            <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_aminus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                            <p class="card-text">ml</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-o fa-beat"></i> -&nbsp;</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                                <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_bminus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                                <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;"><i class="fa-solid fa-b fa-beat"></i>-&nbsp;</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                                <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_ominus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                                <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card-icon">
                                <div class="row no-gutters">
                                    <div class="col-auto card-icon-aside bg-danger">&nbsp;<span style="color: white;">AB</i>-&nbsp;</span></div>
                                        <div class="col">
                                            <div class="card-body py-5">
                                                <h1 class="card-title" style="font-size: 30px;"><?php echo $blood_abminus_volumn[0] ?>  <i class="fa-solid fa-droplet fa-beat" style="color: red;"></i></h1>
                                                <p class="card-text">ml</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center><h1>Currently Blood Collection <?php echo $total_volume[0] ?> ml</h1></center>
                        <?php $width = ($total_volume[0] /6500) * 100 ?>
                        <div class="progress" style="margin-bottom: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo $width ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <center>
                        <span>(Daily collection target 6500 ml)</span>
                        <br>
                        <span>(Total collection yesterday: <?php echo $total_volume2[0]?> ml)</span>
                        <br>
                        <span>Data update date: <?php echo $current_date ?> (Auto Update Everyday 12:00 a.m.)</span>
                        <br>
                        </center>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">Percentage of each role person in Fusion Tech</div>
                                    <div class="card-body">
                                        <canvas id="myChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">Blood Type Statistics</div>
                                    <div class="card-body">
                                        <canvas id="myChart2" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">Total Blood Donation Record 2022 (Monthly)</div>
                            <div class="card-body">
                                <div class="card-body">
                                    <canvas id="myChart3" width="auto" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">Total Blood Request Record 2022 (Monthly)</div>
                            <div class="card-body">
                                <div class="card-body">
                                    <canvas id="myChart4" width="auto" height="100"></canvas>
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
                </footer>
            </div>
        </div>
        
        <script>
                function display_c(){
                    var refresh=1000;
                    mytime=setTimeout('display_ct()',refresh)
                }

                function display_ct() {
                    var x = new Date()
                    document.getElementById('ct').innerHTML = x;
                    display_c();
                }
        </script>
       <?php include("js_link.php"); ?>

        <script>
        const labels = [
            'Donor',
            'Seeker',
            'Healthcare Professional',
            'Admin',
        ];
        var total_admin = '<?php echo $total_row_admin ?>'
        var total_donor = '<?php echo $total_row_donor ?>'
        var total_seeker = '<?php echo $total_row_seeker ?>'
        var total_healthcare_professional = '<?php echo $total_row_healthcare_professional ?>'
        const data = {
            labels: labels,
            datasets: [{
            label: 'role',
            backgroundColor: [
                '#003f5c',
                '#2f4b7c',
                '#665191',
                '#d45087',
            ],
            data: [total_donor, total_seeker, total_healthcare_professional, total_admin],
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {}        
        };
        </script>

        <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        </script>

    <script>
        const blood_aplus_volumn = <?php echo json_encode($blood_aplus_volumn) ?>;
        const blood_bplus_volumn = <?php echo json_encode($blood_bplus_volumn) ?>;
        const blood_oplus_volumn = <?php echo json_encode($blood_oplus_volumn) ?>;
        const blood_abplus_volumn = <?php echo json_encode($blood_abplus_volumn) ?>;
        const blood_aminus_volumn = <?php echo json_encode($blood_aminus_volumn) ?>;
        const blood_bminus_volumn = <?php echo json_encode($blood_bminus_volumn) ?>;
        const blood_ominus_volumn = <?php echo json_encode($blood_ominus_volumn) ?>;
        const blood_abminus_volumn = <?php echo json_encode($blood_abminus_volumn) ?>;

        const labels2 = [
            'A+',
            'B+',
            'O+',
            'AB+',
            'A-',
            'B-',
            'O-',
            'AB-',
        ];

        const data2 = {
            labels: labels2,
            datasets: [{
            label2: 'My First dataset2',
            backgroundColor: [
                '#F94144',
                '#F3722C',
                '#F8961E',
                '#577590',
                '#277DA1',
                '#90BE6D',
                '#43AA8B',
                '#4D908E'
            ],
            data: [blood_aplus_volumn, blood_bplus_volumn, blood_oplus_volumn, blood_abplus_volumn, blood_aminus_volumn, blood_bminus_volumn, blood_ominus_volumn, blood_abminus_volumn],
            }]
        };

        const config2 = {
            type: 'pie',
            data: data2,
            options: {}
        };
    </script>

    <script>
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>

    
    <script>
        const x = <?php echo json_encode($donation_xValues) ?>;
        const y = <?php echo json_encode($donation_yValues) ?>;

        const data3 = {
            labels: x,
            datasets: [{
            label: 'Montly',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: y,
            }]
        };

        const config3 = {
            type: 'bar',
            data: data3,
            option: {
            },
            plugins: [ChartDataLabels]
        };
    </script>

    <script>
        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );
    </script>



    <script>
        const x1 = <?php echo json_encode($request_xValues) ?>;
        const y1 = <?php echo json_encode($request_yValues) ?>;
        const data4 = {
            labels: x1,
            datasets: [{
            label: 'Montly',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: y1,
            }]
        };

        const config4 = {
            type: 'bar',
            data: data4,
            option: {
            },
            plugins: [ChartDataLabels]
        };
    </script>

    <script>
        const myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );
    </script>

    </body>
</html>
