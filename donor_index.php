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
      <title>Donor List - FusionTech</title>
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
                            <a class="nav-link collapsed active" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                                Manage Profile
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseProfile" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link active" href="donor_index.php">Donor</a>
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
                                            Donor List
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                            <i class="me-1" data-feather="user-plus"></i>
                                            Add New Donor
                                        </a>
                                        <a class="btn btn-sm btn-light text-primary" href="donor_pdf.php">
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
                            <div class="card-body display-table" style="overflow: auto;">
                                <table class="table" width="100%" cell-spacing="0" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Blood Type</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Latest Donation Date</th>
                                            <th>Image</th>
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
            messageTop: 'Donor Profiles',
            messageBottom: 'Generate Date: <?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("d-m-Y h:i:sa") ?>',
            exportOptions: {
                columns: [0, 1, 2, 3, 4,5 ,6 ,7 ,8 ,9]
            },
            customize: function(xlsx) {
            var sheet = xlsx.xl.worksheets['sheet1.xml'];
            $('row:first', sheet).attr('s', '36');
            $('row:first', sheet).attr('s', '51');
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
          'url': 'donor_fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [11]
          },
        ]
      });
    });
    </script>
    <!-- user data modal -->
    <script type="text/javascript">
       $(document).on('submit', '#saveUserForm', function(event) {
        event.preventDefault();
        var username = $('#inputUsername').val();
        var password = $('#inputPassword').val();
        var name = $('#inputName').val();
        var blood_type = $('#inputBloodType').val();
        var age = $('#inputAge').val();
        var gender = $('#inputGender').val();
        var contact = $('#inputContact').val();
        var address = $('#inputAddress').val();
        var email = $('#inputEmail').val();
        var image = $('#inputImage')[0].files[0];

        if (username != '' && password != '' && name != '' && blood_type != '' && age != ''&& gender != '' && contact != '' && address != ''&& email != '' ) {


        var form = new FormData();
        form.append("username", username);
        form.append("password", password);
        form.append("name", name);
        form.append("blood_type",blood_type);
        form.append("age", age);
        form.append("gender", gender);
        form.append("contact", contact);
        form.append("address", address);
        form.append("email", email);
        form.append("image", image);

         var settings = {
            "async": true,
            "url": 'donor_add_user.php',
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
        url:"donor_get_single_user.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          $('#id').val(json.donor_id);
          $('#idforshown').val(json.prefix+ json.donor_id);
          $('#trid').val(trid);
          $('#_inputUsername').val(json.donor_username);
          $('#_inputPassword').val(json.donor_password);
          $('#_inputName').val(json.donor_name);
          $('._inputBloodType').selectpicker('val', [json.donor_blood_type]);
          $('#_inputAge').val(json.donor_age);
          $('._inputGender').selectpicker('val', [json.donor_gender]);
          $('#_inputContact').val(json.donor_contact);
          $('#_inputAddress').val(json.donor_address);
          $('#_inputEmail').val(json.donor_email);
          var date = json.latest_donation_date.split(' ');
          $('#_inputDate').val(date[0]);
          $('#editUserModal').modal('show');

        }
      })
    });

    $(document).on('submit', '#updateUserForm',function(){
      var id = $('#id').val();
      var trid = $('#trid').val();
      var username = $('#_inputUsername').val();
      var password = $('#_inputPassword').val();
      var name = $('#_inputName').val();
      var blood_type = $('#_inputBloodType').val();
      var age = $('#_inputAge').val();
      var gender = $('#_inputGender').val();
      var contact = $('#_inputContact').val();
      var address = $('#_inputAddress').val();
      var email = $('#_inputEmail').val();
      var latest_donation_date = $('#_inputDate').val();
      var image = $('#_inputImage')[0].files[0];



        var form = new FormData();
        form.append("id", id);
        form.append("username", username);
        form.append("password", password);
        form.append("name", name);
        form.append("blood_type",blood_type);
        form.append("age", age);
        form.append("gender", gender);
        form.append("contact", contact);
        form.append("address", address);
        form.append("email", email);
        form.append("latest_donation_date", latest_donation_date);
        form.append("image", image);


         var settings = {
            "async": true,
            "url": 'donor_update_user.php',
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
      text: "Delete Profile: DNR" + id ,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete: DNR' + id
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "donor_delete_user.php",
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
                title: 'DNR'+ id + ' has been deleted.',
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

    <!-- add donor modal -->
    <!-- Modal -->
    
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Donor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="saveUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body ">
            <div class="mb-3 row">
              <label for="inputUsername" class="col-sm-3 col-form-label">Username: </label>
              <div class="col-sm-9">
              <input type="text" name="username" class="form-control" id="inputUsername" pattern="^(?=.{5,50}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Password: </label>
              <div class="col-sm-9">
              <input type="password" name="inputPassword" class="form-control" id="inputPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputName" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-9">
              <input type="text" name="inputName" class="form-control" id="inputName" pattern="^[a-zA-Z '.,]{4,}(?: [a-zA-Z]+)?(?: [a-zA-Z]+)?$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputBloodType" class="col-sm-3 col-form-label">Blood Type: </label>
              <div class="col-sm-9">
                <select name="inputBloodType" id="inputBloodType" class="selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <option data-tokens="A+" value="A+">A+</option><option data-tokens="A-" value="A-">A-</option>
                  <option data-tokens="B+" value="B+">B+</option><option data-tokens="B-" value="B-">B-</option>
                  <option data-tokens="O+" value="O+">O+</option><option data-tokens="O-" value="O-">O-</option>
                  <option data-tokens="AB+" value="AB+">AB+</option><option data-tokens="AB-" value="AB-">AB-</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputAge" class="col-sm-3 col-form-label">Age: </label>
              <div class="col-sm-9">
              <input type="number" name="inputAge" class="form-control" id="inputAge" max='999' min='1' required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputGender" class="col-sm-3 col-form-label">Gender: </label>
              <div class="col-sm-9">
              <select name="inputGender" id="inputGender" class="selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                <option value="" default></option>
                <option value=M>M</option><option value="F">F</option>
              </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputContact" class="col-sm-3 col-form-label">Contact: </label>
              <div class="col-sm-9">
              <input type="text" name="inputContact" class="form-control" id="inputContact" pattern="^(01)[0-9]{8,9}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputAddress" class="col-sm-3 col-form-label">Address: </label>
              <div class="col-sm-9">
              <input type="text" name="inputAddress" class="form-control" id="inputAddress" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputEmail" class="col-sm-3 col-form-label">Email: </label>
              <div class="col-sm-9">
                <input type="email" name="inputEmail" class="form-control" id="inputEmail" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputImage" class="col-sm-3 col-form-label">Profile Picture</label>
              <div class="col-sm-9">
                <input type="file" name="inputImage" class="form-control" id="inputImage" accept="image/*" class="box">
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <h5>Minimal Requirement: </h5>
              <div class="mb-3 row">
                <span class="col-sm-2">Username: </span>
                  <div class="col-sm-10">
                    <span>consists of 5 to 50 characters, “.” and “_” are allowed.</span>
                  </div>
              </div>
              <div class="mb-3 row">
                <span class="col-sm-2">Password: </span>
                  <div class="col-sm-10">
                    <span>must contain one or more uppercase characters, lowercase characters, and numeric values within the length of 8 to 50.</span>
                  </div>
              </div>
              <div class="mb-3 row">
                <span class="col-sm-2">Contact: </span>
                  <div class="col-sm-10">
                    <span>Malaysia phone format, start with “01”, in 10 to 11 digits.</span>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save as New Donor</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end add donor modal -->

    <!-- update donor modal -->
    <!-- Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modify Selected Donor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
            <div class="mb-3 row">
              <label for="idforshown" class="col-sm-3 col-form-label">Donor ID: </label>
              <div class="col-sm-9">
                <input type="text" name="idforshown" class="form-control" id="idforshown" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputUsername" class="col-sm-3 col-form-label">Username: </label>
              <div class="col-sm-9">
              <input type="text" name="_username" class="form-control" id="_inputUsername" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputPassword" class="col-sm-3 col-form-label">Password: </label>
              <div class="col-sm-9">
              <input type="password" name="_inputPassword" class="form-control" id="_inputPassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputName" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-9">
              <input type="text" name="_inputName" class="form-control" id="_inputName" pattern="^[a-zA-Z '.,]{4,}(?: [a-zA-Z]+)?(?: [a-zA-Z]+)?$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputBloodType" class="col-sm-3 col-form-label">Blood Type: </label>
              <div class="col-sm-9">
                <select name="_inputBloodType" id="_inputBloodType" class="_inputBloodType selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <option data-tokens="A+" value="A+">A+</option><option data-tokens="A-" value="A-">A-</option>
                  <option data-tokens="B+" value="B+">B+</option><option data-tokens="B-" value="B-">B-</option>
                  <option data-tokens="O+" value="O+">O+</option><option data-tokens="O-" value="O-">O-</option>
                  <option data-tokens="AB+" value="AB+">AB+</option><option data-tokens="AB-" value="AB-">AB-</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputAge" class="col-sm-3 col-form-label">Age: </label>
              <div class="col-sm-9">
              <input type="number" name="_inputAge" class="form-control" id="_inputAge" max='999' min='1' required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputGender" class="col-sm-3 col-form-label">Gender: </label>
              <div class="col-sm-9">
                <select name="_inputGender" id="_inputGender" class="_inputGender selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <option data-tokens="M" value="M">M</option>
                  <option data-tokens="F" value="F">F</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputContact" class="col-sm-3 col-form-label">Contact: </label>
              <div class="col-sm-9">
              <input type="text" name="_inputContact" class="form-control" id="_inputContact" pattern="^(01)[0-9]{8,9}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputAddress" class="col-sm-3 col-form-label">Address: </label>
              <div class="col-sm-9">
              <input type="text" name="_inputAddress" class="form-control" id="_inputAddress" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputEmail" class="col-sm-3 col-form-label">Email: </label>
              <div class="col-sm-9">
                <input type="email" name="_inputEmail" class="form-control" id="_inputEmail" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputImage" class="col-sm-3 col-form-label">Profile Picture</label>
              <div class="col-sm-9">
                <input type="file" name="_inputImage" class="form-control" id="_inputImage" accept="image/*" class="box">
              </div>
            </div>
            <hr>
            <div class="mb-3 row">
              <h5>Minimal Requirement: </h5>
              <div class="mb-3 row">
                <span class="col-sm-2">Username: </span>
                  <div class="col-sm-10">
                    <span>consists of 5 to 50 characters, “.” and “_” are allowed.</span>
                  </div>
              </div>
              <div class="mb-3 row">
                <span class="col-sm-2">Password: </span>
                  <div class="col-sm-10">
                    <span>must contain one or more uppercase characters, lowercase characters, and numeric values within the length of 8 to 50.</span>
                  </div>
              </div>
              <div class="mb-3 row">
                <span class="col-sm-2">Contact: </span>
                  <div class="col-sm-10">
                    <span>Malaysia phone format, start with “01”, in 10 to 11 digits.</span>
                  </div>
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
    <!-- end update donor modal -->
        
    </body>
</html>
