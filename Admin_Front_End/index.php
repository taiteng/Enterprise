<?php
session_start();
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
        
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="../Admin_Front_End/admin_design/js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
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
                        <h1 class="welcome-text">Greetings, <span class="text-black fw-bold">John Doe</span></h1>
                        <h3 class="welcome-sub-text">Welcome to Covent Dashboard</h3>
                    </li>
                </ul>
                
                <!-- Admin Settings -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="" data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="mb-1 mt-3 font-weight-semibold">Admin Name</p>
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
                        <a class="nav-link" href="" aria-expanded="false" aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Reviews</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" aria-expanded="false" aria-controls="charts">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Sales Statistic</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" aria-expanded="false" aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Edit Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" aria-expanded="false" aria-controls="icons">
                            <i class="menu-icon mdi mdi-layers-outline"></i>
                            <span class="menu-title">Discount</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Company Management</li>
                    <li class="nav-item">
                        <a class="nav-link" href="" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">Employees</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Information Editor</li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Terms and Condition</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
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
                                                        <div class="col-lg-12">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h4 class="card-title card-title-dash">Progress Ratio</h4>
                                                            </div>
                                                            <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                                            <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Service Type Histogram -->
                                <div class="col-lg-6 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Top Service Type</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Birthday Party</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                                                    <small class="text-muted mb-0">162543</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                        <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                                            <div class="d-flex">
                                                                <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                                                <div class="wrapper ms-3">
                                                                    <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                                                    <small class="text-muted mb-0">Alaska, USA</small>
                                                                </div>
                                                            </div>
                                                            <div class="text-muted text-small">
                                                                1h ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                          <!-- Employees Progress Review -->  
                          <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                              
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
                                                                <th>
                                                                    <div class="form-check form-check-flat mt-0">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                    </div>
                                                                </th>
                                                                <th>Customer</th>
                                                                <th>Company</th>
                                                                <th>Progress</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check form-check-flat mt-0">
                                                                        <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex ">
                                                                        <img src="images/faces/face1.jpg" alt="">
                                                                        <div>
                                                                            <h6>Brandon Washington</h6>
                                                                            <p>Head admin</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h6>Company name 1</h6>
                                                                    <p>company type</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                            <p class="text-success">79%</p>
                                                                            <p>85/162</p>
                                                                        </div>
                                                                        <div class="progress progress-md">
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><div class="badge badge-opacity-warning">In progress</div></td>
                                                            </tr>
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
      <script src="../Admin_Front_End/admin_design/js/dashboard.js"></script>
      <!-- End custom js for this page-->
    </body>

</html>

