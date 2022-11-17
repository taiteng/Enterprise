<?php
session_start();
include '../Admin_Back_End/config.php';
include '../Back_End/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/feather/feather.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/css/vendor.bundle.base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css"></script>
        <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
        
        <!-- inject:css -->
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="icon" href="../Images/logo.png" />
        
        
        <title>Covent</title>
    </head>
    <body>
        <div class="container-scroller">
          
            <!--Navigation Bar -->
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                    <!-- Expand Button -->
                    <div class="me-3">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                            <span class="icon-menu"></span>
                        </button>
                    </div>

                    <div>
                        <a class="navbar-brand brand-logo" href="index.php">
                            <img src="../Images/coventco_white.jpg" alt="logo" />
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="index.php">
                            <img src="../Images/coventco_white.jpg" alt="logo" />
                        </a>
                    </div>
                </div>

                <!-- Greeting Bar -->
                <div class="navbar-menu-wrapper d-flex align-items-top"> 
                    <ul class="navbar-nav">
                        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                            <h1 class="welcome-text">Greetings, <span class="text-black fw-bold"><?=$_SESSION['name']?></span></h1>
                            <h3 class="welcome-sub-text">Welcome to Covent Dashboard</h3>
                        </li>
                    </ul>

                     <!-- Admin Settings -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                            <a class="nav-link" id="UserDropdown" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="mb-1 mt-3 font-weight-semibold"><?=$_SESSION['name']?></p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <a class="dropdown-item" href="../Worker/logout.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2" href=""></i>Sign Out</a>
                            </div>
                        </li>
                    </ul>

                    <!-- Expand Button -->
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            
            <div class="container-fluid page-body-wrapper">
                <div class="theme-setting-wrapper">
                    <div id="settings-trigger"><i class="ti-settings"></i></div>
                    <div id="theme-settings" class="settings-panel">
                        <i class="settings-close ti-close"></i>
                        <p class="settings-heading">SIDEBAR SKINS</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
                        <p class="settings-heading mt-2">HEADER SKINS</p>
                        <div class="color-tiles mx-0 px-4">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                      </div>
                    </div>
                </div>
            
                <!--Left Sidebar-->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="mdi mdi-grid-large menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Projects</li>
                        <li class="nav-item">
                            <a class="nav-link" href="projects.php" aria-expanded="false" aria-controls="ui-basic">
                                <i class="menu-icon mdi mdi-floor-plan"></i>
                                <span class="menu-title">Manage Tasks</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Service Management</li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#editservice" aria-expanded="false" aria-controls="form-elements">
                                <i class="menu-icon mdi mdi-card-text-outline"></i>
                                <span class="menu-title">Edit Service</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="editservice">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="fnd.php">Food and Drinks</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="item.php">Items</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="decoration.php">Decorations</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="fun.php">Fun and Entertainment</a></li>
                                </ul>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="discount.php" aria-expanded="false" aria-controls="icons">
                                <i class="menu-icon mdi mdi-layers-outline"></i>
                                <span class="menu-title">Discount</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Company Management</li>
                        <li class="nav-item">
                            <a class="nav-link" href="employee.php" aria-expanded="false" aria-controls="auth">
                                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                <span class="menu-title">Employees</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Information Editor</li>
                        <li class="nav-item">
                            <a class="nav-link" href="tnc.php">
                                <i class="menu-icon mdi mdi-file-document"></i>
                                <span class="menu-title">Terms and Condition</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">
                                <i class="menu-icon mdi mdi-help-circle-outline"></i>
                                <span class="menu-title">Help</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            
                <!-- Main Panel Body -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="d-flex flex-row justify-content-lg-end mt-xl-5">
                            <button type="button" class="btn btn-primary btn-icon-text col-lg-2" aria-hidden="true"  data-bs-toggle="modal" data-bs-target="#employeeModal">
                                <i class="ti-plus btn-icon-prepend"></i>
                                New Employee
                            </button>
                        </div>
                        
                        <div class="row flex-grow mt-xl-3">
                            <div class="col-lg-12 d-flex flex-column">
                                  <div class="card card-rounded">
                                        <div class="card-body">
                                            <h4 class="card-title">Employee Overview</h4>
                                            <table id="employeeTable" class="table table-bordered table-striped mb-0 table-responsive" style="box-shadow: 2px 2px 10px #888888; width:100%; overflow-x: auto;">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Employee Name</th>
                                                        <th>Email</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Add Employee -->
                    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="../Worker/signup_auth.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" name="username" class="form-control" placeholder="Charles John" required>
                                              </div>
                                              <div class="form-group">
                                                <label>Employee Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Abcd!23" minlength="5" maxlength="20" required>
                                              </div>
                                             
                                              <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="abcd@gmail.com" required>
                                              </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" value="Register" >Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="../Admin_Back_End/api/employee_api/handle_editEmployee.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Employee</label>

                                            <input type="hidden" id="employee" name="employee" value=""/>
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input id="employeeName" type="text" name="name" class="form-control" placeholder="Charles John" required>
                                              </div>
                                              <div class="form-group">
                                                <label>Employee Password</label>
                                                <input id="employeePassword" type="password" name="pw"  onChange="checkPassword()" class="form-control" placeholder="Abcd!23" required>
                                              </div>
                                             <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input id="employeePassword2" type="password" name="pw2" onChange="checkPassword()" class="form-control" placeholder="Abcd!23" required>
                                              </div>
                                              <div class="form-group">
                                                <label>Email</label>
                                                <input id="employeeEmail" type="email" name="email" class="form-control" placeholder="abcd@gmail.com" required>
                                              </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Warning: Employee Deletion</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="../Admin_Back_End/api/employee_api/handle_deleteEmployee.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">You are about to remove this employee</label>

                                            <input type="hidden" id="deleteEmployee" name="deleteAcc" value=""/>

                                            <b><p id="deleteEmployeeName"></p></b>
                                            <div class="form-text">Employee will be removed permanently!</div>

                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Covent: Your Event Planning Partner</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

      
        <script src="../Admin_Front_End/admin_design/js/off-canvas.js"></script>
        <script src="../Admin_Front_End/admin_design/js/hoverable-collapse.js"></script>
        <script src="../Admin_Front_End/admin_design/js/template.js"></script>
        <script src="../Admin_Front_End/admin_design/js/settings.js"></script>
        <script src="../Admin_Front_End/admin_design/js/jquery.cookie.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            function checkPassword(){
                var pw = document.getElementById("employeePassword");
                var rpw = document.getElementById("employeePassword2");

                if(pw.value === rpw.value)
                    rpw.setCustomValidity('');
                else{
                    rpw.setCustomValidity('Password is not equivalent!');
                } 
            }
            
            
        $(document).ready(function(){
            $(document).on('click', '.editBtn', function(){
                var employeeId = $(this).data('id');
                var employeeName = $(this).data('name');
                var employeeEmail = $(this).data('email');

                $('#employee').val(employeeId);
                $('#employeeName').val(employeeName);
                $('#employeeEmail').val(employeeEmail);
            });
        });

        $(document).ready(function(){
            $(document).on('click', '.deleteBtn', function(){
                var employeeId = $(this).data('id');
                var employeeName = $(this).data('name');
                
                $('#deleteEmployee').val(employeeId);
                document.getElementById("deleteEmployeeName").innerHTML = "Employee Name: "+ employeeName;
            });
        });
        
        $(document).ready(function(){
            var employeeDataTable = $('#employeeTable').DataTable({
                'scrollX' : true,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'dataTableEmployee.php'
                },
                pageLength: 10,
                'columnDefs': [
                   {
                        "targets": 2,
                        "className": "text-center"
                   },
                   {    "searchable": false, 
                            "targets": 2 
                   },
                    {    "orderable": false,
                         "targets": 2 
                    }
                ],
                'columns': [
                    { data: 'username' },
                    { data: 'email' },
                    { data: 'actions' }
                ]
            });
        });


      </script>
      
        <?php
        if(isset($_SESSION['createSuccess'])){ ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Account Created',
                text: 'You just created the Account'
                });
            </script>
        <?php
            unset($_SESSION['createSuccess']);
        }
        ?>
        
        <?php
        if(isset($_SESSION['updateSuccess'])){ ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Account Updated',
                text: 'You just updated the Account'
                });
            </script>
        <?php
            unset($_SESSION['updateSuccess']);
        }
        ?>
            
        <?php
        if(isset($_SESSION['deleteSuccess'])){ ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Account Deleted',
                text: 'You just deleted a Account'
                });
            </script>
        <?php
            unset($_SESSION['deleteSuccess']);
        }
        ?>
        
    </body>
</html>

