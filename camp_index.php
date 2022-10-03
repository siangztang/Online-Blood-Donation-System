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
      <title>Campaign List - FusionTech</title>
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
                            <a class="nav-link active" href="camp_index.php">
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
                                            Blood Campaign List
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                            <i class="me-1" data-feather="user-plus"></i>
                                            Add New Campaign
                                        </a>
                                        <a class="btn btn-sm btn-light text-primary" href="camp_pdf.php">
                                            <i class="me-1" data-feather="download"></i>
                                            Print Table as PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-fluid px-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" width="100%" cell-spacing="0" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Center ID</th>
                                            <th>Date & Time</th>
                                            <th>Campaign Description</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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

    <?php include("js_link.php"); ?>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excelHtml5',
            text: 'Generate Reports',
            title: 'FusionTech Online Blood Donation',
            autoFilter: true,
            className: '',
            messageTop: 'Campaign List',
            messageBottom: 'Generate Date: <?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("d-m-Y h:i:sa") ?>',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
          }
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'camp_fetch_data.php',
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
    <!-- user data modal -->
    <script type="text/javascript">
       $(document).on('submit', '#saveUserForm', function(event) {
        event.preventDefault();
        var center_id = $('#inputCenter').val();
        var camp_date_time = $('#inputDate').val();
        var camp_description = $('#inputDescription').val();

        if (center_id != '' && camp_date_time != '' && camp_description != '') {
          var form = new FormData();
          form.append("center_id", center_id);
          form.append("camp_date_time", camp_date_time);
          form.append("camp_description", camp_description);

          var settings = {
              "async": true,
              "url": 'camp_add.php',
              "type": "POST",
              "processData": false,
              "contentType": false,
              "mimeType": "multipart/form-data",
              "data": form
          };

          $.ajax(settings).done(function (data) {

              var d = JSON.parse(data);

              if (d.status == 'success') {
                Swal.fire({
                title: d.msg,
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  } else {
                    window.location.reload();
                  }
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: d.msg,
                })
              }

          }, 'json');

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Fill all the require field!',
          })
        }
      });

    $(document).on('click', '.editbtn',function(event){
      var id = $(this).data('id');
      var trid = $(this).closest('tr').attr('id');
      $.ajax({
        url:"camp_get_single_data.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          $('#id').val(json.camp_id);
          $('#idforshown').val(json.prefix + json.camp_id);
          $('#trid').val(trid);
          $('._inputCenter').selectpicker('val', [json.center_id]);
          $('#_inputDate').val(json.camp_date_time);
          $('#_inputDescription').val(json.camp_description);
          $('#editUserModal').modal('show');

        }
      })
    });

    $(document).on('submit', '#updateUserForm',function(){
      var id = $('#id').val();
      var trid = $('#trid').val();
      var center_id = $('#_inputCenter').val();
      var camp_date_time = $('#_inputDate').val();
      var camp_description = $('#_inputDescription').val();

      

      var form = new FormData();
        form.append("id", id);
        form.append("center_id", center_id);
        form.append("camp_date_time", camp_date_time);
        form.append("camp_description", camp_description);


        var settings = {
          "async": true,
          "url": 'camp_edit.php',
          "type": "POST",
          "processData": false,
          "contentType": false,
          "mimeType": "multipart/form-data",
          "data": form
        };

        $.ajax(settings).done(function (data) {

            var d = JSON.parse(data);
            if (d.status == 'success') {
              Swal.fire({
                title: d.msg,
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                } else {
                  window.location.reload();
                }
              })
            }
            else
            {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: d.msg,
            })
            }

         }, 'json');
    });

    $(document).on('click', '.deleteBtn', function(event) {
      
      var id = $(this).data('id');

      Swal.fire({
      title: 'Are you sure?',
      text: "Delete Campaign: CAM" + id ,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete: CAM' + id
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "camp_delete.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'success') 
            {
              $("#" + id).closest('tr').remove();
              Swal.fire({
                title: 'CAM'+ id + ' has been deleted.',
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                } else {
                  window.location.reload();
                }
              })
            } 
            else 
            {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Failed to Delete Profile!',
            })
            }
          }
        });
        }
      })
    });
    </script>
    
    </script>

    <!-- add campaign modal -->
    <!-- Modal -->
    <?php
      include('dbconn.php');
      $centerAddsql = "SELECT * FROM `blood_donation_center` ";
      $centerAddQuery = mysqli_query($conn,$centerAddsql);
    ?>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Campaign</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="saveUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="inputCenter" class="col-sm-2 col-form-label">Center ID: </label>
              <div class="col-sm-10">
                <select name="inputCenter" id="inputCenter" class="inputCenter selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>                
                  <?php
                  while($row = mysqli_fetch_assoc($centerAddQuery))
                  {
                    echo "<option data-tokens='".$row["center_id"]."' value='".$row["center_id"]."'>".'BDC'.$row["center_id"]." - ".$row["center_name"]."</option>";

                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputDate" class="col-sm-2 col-form-label">Date & Time: </label>
              <div class="col-sm-10">
              <input type="datetime-local" name="inputDate" class="form-control" id="inputDate" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputDescription" class="col-sm-2 col-form-label">Description: </label>
              <div class="col-sm-10">
              <input type="text" name="inputDescription" class="form-control" id="inputDescription" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Campaign</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end add campaign modal -->

    <!-- update campaign modal -->
    <!-- Modal -->
    <?php
      $centerEditsql = "SELECT * FROM `blood_donation_center` ";
      $centerEditQuery = mysqli_query($conn,$centerAddsql);
    ?>
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modify Selected Campaign</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
            <div class="mb-3 row">
              <label for="id" class="col-sm-2 col-form-label">Camp ID: </label>
              <div class="col-sm-10">
                <input type="text" name="idforshown" class="form-control" id="idforshown" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputCenter" class="col-sm-2 col-form-label">Center ID: </label>
              <div class="col-sm-10">
                <select name="_inputCenter" id="_inputCenter" class="_inputCenter selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>                
                  <?php
                  while($row = mysqli_fetch_assoc($centerEditQuery))
                  {
                    echo "<option data-tokens='".$row["center_id"]."' value='".$row["center_id"]."'>".'BDC'.$row["center_id"]." - ".$row["center_name"]."</option>";

                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputDate" class="col-sm-2 col-form-label">Date & Time: </label>
              <div class="col-sm-10">
              <input type="datetime-local" name="_inputDate" class="form-control" id="_inputDate" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputDescription" class="col-sm-2 col-form-label">Description: </label>
              <div class="col-sm-10">
              <input type="text" name="_inputDescription" class="form-control" id="_inputDescription" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end add campaign modal -->
        
    </body>
</html>
