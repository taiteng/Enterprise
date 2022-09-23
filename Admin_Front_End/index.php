

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../Admin_Front_End/cards_style.css">
        
        <!-- logo -->
        <link rel="icon" href="../Images/logo.png">
        
        <style>
          .zoom {
                transition: transform .4s; /* Animation */
                margin: 0 auto;
            }

            .zoom:hover {
              transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
              background:#911F27;
              color: white;
             
            }
            *{
                padding:0;
                margin:0 ;
                box-sizing:border-box;
            }
            /* width */
            ::-webkit-scrollbar {
              width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
                border-radius: 10px;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888;
              border-radius: 10px;
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
            <nav class="navbar navbar-expand-sm bg-white navbar-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../Images/coventco.png" alt="logo" onclick="location.href='home.php'"/>
                    </a>
                    <div class="d-flex flex-row bd-highlight mb-3 justify-content-end">
                        <ul class="navbar-nav nav">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php" style="font-size: 20px;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" style="font-size: 20px;">Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" style="font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Profile</a>
                                <ul class="dropdown-menu">
                                   <?php
                                    if(isset($_SESSION['userLogged'])){
                                        echo '<li><a class="dropdown-item" href="../FrontEnd/AccountPage.php">Settings</a></li>';
                                        echo '<li><a class="dropdown-item" href="../BackEnd/logout.php">Log Out</a></li>';
                                    }else{
                                        echo '<li><a class="dropdown-item" href="../FrontEnd/LoginPage.php">Log In</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div style="margin-top:10%; width:100%; height:300px;">
            <div class="zoom" style="width: 27%; float: left; height:100%;  margin-left: 5%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; " >
                <img class="zoom" style="width:20%; height:auto; display: flex; margin-top:15%; justify-content: center;" src="../Images/project-icon.png" class="card-img-top" alt="...">
                <p class="card-text zoom" style="font-size: 18px; margin-top:15%; text-align: center;"><b>PROJECTS</b></p>
            </div>
        
            <div class="zoom" style="width: 56%;  align-items: center; height:100%; margin-left: 36%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;" >
                <img class="zoom" style="width:20%; height:auto; display: flex;  justify-content: center;" src="../Images/employee-icon.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text zoom" style=" font-size: 18px; text-align: center;"><b>EMPLOYEE SYSTEM</b></p>
                </div>
            </div>
        </div>
        
        <div style="margin-top:5%; width:100%; height:300px; margin-bottom: 5%;">
            <div class="zoom" style="width: 27%; float: left;align-items: center; height:100%;  margin-left: 5%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; " >
                <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/project_history-icon.png" class="card-img-top" alt="...">
                <p class="card-text zoom" style="font-size: 18px; margin-top:15%; text-align: center;"><b>Project History</b></p>
            </div>
        
            <div class="zoom" style="width: 26%; float:left;  align-items: center; height:100%; margin-left: 4%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;" >
                <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/statistic-icon.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text zoom" style=" font-size: 18px; margin-top:15%; text-align: center;"><b>Sales Statistic</b></p>
                </div>
            </div>
            
            <div class="zoom" style="width: 26%;  align-items: center; height:100%; margin-left:66%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;" >
                <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/discount-icon.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text zoom" style=" font-size: 18px; margin-top:15%; text-align: center;"><b>Discount</b></p>
                </div>
            </div>
        </div>
        
    </body>
</html>
