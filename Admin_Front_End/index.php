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
        
        <!-- plugins:css -->
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/feather/feather.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/css/vendor.bundle.base.css">
        
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
                                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                            </div>
                        </li>
                    </ul>

                    <!-- Expand Button -->
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
        
          <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            
            <!-- Sidebar & Colors Customization -->
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
                        <a class="nav-link" href="../Tnc/index.php">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Terms and Condition</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Faq/index.php">
                            <i class="menu-icon mdi mdi-help-circle-outline"></i>
                            <span class="menu-title">Help</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Main Panel Body -->
            <div class="main-panel">
              <div class="content-wrapper">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="home-tab">
                      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active border-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </ul>
                      </div>
                      <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                            
                            <!-- Sales Line Chart -->
                            <div class="row">
                                <div class="col-lg-12 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Sales Line Chart</h4>
                                                        </div>
                                                        <div id="performance-line-legend"></div>
                                                    </div>
                                                    <div class="chartjs-wrapper mt-5">
                                                        <canvas id="performaneLine"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6 d-flex flex-column">
                                    <!-- Progress Ratio Doughnut Chart -->
                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 my-auto">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h4 class="card-title card-title-dash">Progress Ratio</h4>
                                                            </div>
                                                            <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                                            <div id="doughnut-chart-legend" class="mt-5 text-center "></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 d-flex flex-column">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Progress Review</h4>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive  mt-1">
                                                        <table class="table select-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Employee</th>
                                                                    <th>Task</th>
                                                                    <th>Progress</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT worker_name, service_type, service_desc, project_status, progress_check FROM service ORDER BY progress_check DESC";
                                                                
                                                                $result = mysqli_query($conn, $query);
                                                                
                                                                if ($result->num_rows > 0) {
                                                                        // output data of each row
                                                                        while($row = $result->fetch_assoc()) {
                                                                            if($row['project_status'] == "Open"){
                                                                                echo '<tr>
                                                                                    <td>
                                                                                        <div class="d-flex ">
                                                                                            <div>
                                                                                                <h6>'.$row['worker_name'].'</h6>
                                                                                                <p>Employee</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <h6>'.$row['service_type'].'</h6>
                                                                                        <p>'.$row['service_desc'].'</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div>
                                                                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                                <p class="text-success">'.$row['progress_check'].'</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><div class="badge badge-opacity-success">'.$row['project_status'].'</div></td>
                                                                                </tr>';
                                                                            }else if($row['project_status'] == "In-Progress"){
                                                                                echo '<tr>
                                                                                    <td>
                                                                                        <div class="d-flex ">
                                                                                            <div>
                                                                                                <h6>'.$row['worker_name'].'</h6>
                                                                                                <p>Employee</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <h6>'.$row['service_type'].'</h6>
                                                                                        <p>'.$row['service_desc'].'</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div>
                                                                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                                <p class="text-success">'.$row['progress_check'].'</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><div class="badge badge-opacity-warning">'.$row['project_status'].'</div></td>
                                                                                </tr>';
                                                                            }else{
                                                                                echo '<tr>
                                                                                    <td>
                                                                                        <div class="d-flex ">
                                                                                            <div>
                                                                                                <h6>'.$row['worker_name'].'</h6>
                                                                                                <p>Employee</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <h6>'.$row['service_type'].'</h6>
                                                                                        <p>'.$row['service_desc'].'</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div>
                                                                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                                <p class="text-success">'.$row['progress_check'].'</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><div class="badge badge-opacity-danger">'.$row['project_status'].'</div></td>
                                                                                </tr>';
                                                                            }
                                                                            
                                                                            
                                                                        }
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
                
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Covent: Your Event Planning Partner</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      
      <script src="../Admin_Front_End/admin_design/vendors/js/vendor.bundle.base.js"></script>
      <script src="../Admin_Front_End/admin_design/vendors/chart.js/Chart.min.js"></script>

      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../Admin_Front_End/admin_design/js/off-canvas.js"></script>
      <script src="../Admin_Front_End/admin_design/js/hoverable-collapse.js"></script>
      <script src="../Admin_Front_End/admin_design/js/template.js"></script>
      <script src="../Admin_Front_End/admin_design/js/settings.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="../Admin_Front_End/admin_design/js/jquery.cookie.js" type="text/javascript"></script>
      <script src="../Admin_Front_End/admin_js/performanceLine.js" type="text/javascript"></script>
      <script src="../Admin_Front_End/admin_js/doughnutChart.js?v=<?=$version?>" type="text/javascript"></script>
      
      <!-- End custom js for this page-->
    </body>

</html>

