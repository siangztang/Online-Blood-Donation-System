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

    $id = $_GET['id'];

    $sql_query = "SELECT * FROM `blog` WHERE blog_id='$id'";
    $results = mysqli_query($conn, $sql_query);

    if($id == null){
        header('Location: blog_index.php');
    }else{

        if(isset($_POST['delete'])){

            $delete_query = "DELETE FROM `blog` WHERE blog_id='$id'";

            if(mysqli_query($conn, $delete_query)){
                $status = 1;
            }else{
                $status = 2;
            }
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
        <title>Delete Blog - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>
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
                            <a class="nav-link active" href="blog_index.php">
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
                                            <div class="page-header-icon"><i data-feather="file-plus"></i></div>
                                            Delete Post
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" href="blog_index.php">
                                            <i class="me-1" data-feather="arrow-left"></i>
                                            Back to All Posts
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-fluid px-4">
                        <form action="#" method="POST">
                            <?php
                                $query = "SELECT * FROM blog WHERE blog_id='$id'";
                                $results = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <div class="row gx-4">
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-header">Post ID</div>
                                        <div class="card-body"><input class="form-control" id="inputPostID" name="inputPostID" type="text" placeholder="Enter your post id..." value="<?php echo $row["prefix"].$row["blog_id"] ?>" disabled/></div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-header">Post Author</div>
                                        <div class="card-body"><input class="form-control" id="inputPostAuthor" name="inputPostAuthor" type="text" placeholder="Enter Author Name..." value="<?php echo $row["admin_username"] ?>" disabled/></div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-header">Post Title</div>
                                        <div class="card-body"><input class="form-control" id="inputPostTitle" name="inputPostTitle" type="text" placeholder="Enter your post title..." value="<?php echo $row["blog_title"] ?>" disabled/></div>
                                    </div>
                                    <div class="card card-header-actions mb-4">
                                        <div class="card-header">Post Description</div>
                                        <div class="card-body"><textarea class="lh-base form-control" name="inputPostDesc" type="text" placeholder="Enter your post Description..." rows="4" id="inputPostDesc" disabled><?php echo $row["blog_description"] ?></textarea></div>
                                    </div>
                                    <div class="card card-header-actions mb-4 mb-lg-0">
                                        <div class="card-header">Post Content</div>
                                        <div class="card-body">
                                        <textarea name="blog_content" id="blog_content" class="form-control" rows="4"><?php echo $row["blog_content"] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card card-header-actions">
                                        <div class="card-header">Confirmation</div>
                                        <div class="card-body">
                                            <div class="d-grid"><button type="submit" name="delete" id="delete" class="fw-500 btn btn-primary delete">Delete the Post</button></div>
                                            <br>
                                            <div class="d-grid"><button type="reset" name="delete" id="delete" class="fw-500 btn btn-secondary goback" onclick="window.location.href='blog_index.php'">Go Back to the list</button></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
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
    <?php include("js_link.php"); ?>

    <script>
        $(document).ready(function() {
            $("#blog_content").summernote({
                placeholder: 'Write your content here',
                tabsize: 2,
                height: 400
            })
        });
        $('#blog_content').summernote('disable');

    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'blog_fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [4]
          },
        ]
      });
    });
    </script>
    <?php
    if(isset($status)){
        if ($status == 1) {
            echo 
            "<script>
                Swal.fire({
                title: 'BLG'+ $id + ' has been deleted.',
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location.replace('blog_index.php');
                  } else {
                    location.replace('blog_index.php');
                  }
                })
            </script>";
        }else if ($status == 2){
            echo 
            "<script>
                Swal.fire({
                title: 'Failed to Delete Post!',
                icon: 'error',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location.replace('blog_index.php');
                  } else {
                    location.replace('blog_index.php');
                  }
                })
            </script>";
        }
    }
    ?>
    </body>
</html>
