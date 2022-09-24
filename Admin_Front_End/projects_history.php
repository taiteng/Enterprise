<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        
        <!-- logo -->
        <link rel="icon" href="../Images/logo.png">
        
        <style>
            
            /* width */
            ::-webkit-scrollbar {
              width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555;
            }

        </style>
        
        <title>Home</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #e3242b">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../Images/coventco.png" alt="logo" onclick="location.href='index.php'"/>
                    </a>
                    <div class="d-flex flex-row bd-highlight mb-3 justify-content-end">
                        <ul class="navbar-nav nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" style="font-size: 20px; color: white;">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="font-size: 20px; color: white;">Profile</a>
                                <ul class="dropdown-menu">
                                   <?php
                                    if(isset($_SESSION['userLogged'])){
                                        echo '<li><a class="dropdown-item" style="font-size: 20px;" href="../FrontEnd/AccountPage.php">Settings</a></li>';
                                        echo '<li><a class="dropdown-item" style="font-size: 20px;" href="../BackEnd/logout.php">Log Out</a></li>';
                                    }else{
                                        echo '<li><a class="dropdown-item" style="font-size: 20px;" href="../FrontEnd/LoginPage.php">Log In</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <table class="table align-middle mb-0 bg-white" style="margin-top:10%;">
            <thead class="bg-light">
              <tr>
                <th>No</th>
                <th>Task/Description</th>
                <th>Person-in-Charge (PIC)</th>
                <th>Status</th>
                <th>Quotation Document</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                   <p class="fw-bold mb-1">1</p>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">Car Party </p>
                  <p class="text-muted mb-0">IT department</p>
                </td>
                <td>
                    <p>Kin</p>
                </td>
                <td><span class="status text-muted">&bull;</span> Closed</td>
                <td>
                    <img style="width:30px; height:auto;" src="../Images/download_icon.png"/>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                   <p class="fw-bold mb-1">1</p>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">Car Party </p>
                  <p class="text-muted mb-0">IT department</p>
                </td>
                <td>
                    <p>John</p>
                </td>
                <td><span class="status text-danger">&bull;</span> Policy Violated</td>
                <td>
                    <img style="width:30px; height:auto;" src="../Images/download_icon.png"/>
                </td>
              </tr>
              
            </tbody>
          </table>

        
    </body>
</html>