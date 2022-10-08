<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- logo -->
        <link rel="icon" href="../Images/logo.png">
        
        <style>
            .image{
                width: 50px;
                height: 50px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            .box{
                background:whitesmoke;
                width: 28%;
                height:250px;
                box-sizing: border-box;
                box-shadow: 2px 2px 10px #888888;
                padding:2em;
                border-radius: 24px;
                text-align: center;
                margin: 20px;
            }
            
            .container{
                width:100%;
                height: auto;
                display:flex;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                flex-flow: wrap;
            }
            
            .title{
                font-size: 18px; 
                margin-top:15%; 
                text-align: center;
            }
            
            .link{
                text-decoration: none; 
                color: black;
            }
            
            @media screen and (max-width:1200px){
                .box{
                    width:40%;
                }
            }
            
            @media screen and (max-width:600px){
                .box{
                    width:40%;
                }
                .title{
                    font-size:13px;
                }
            }
            
            .zoom {
                transition: transform .4s; /* Animation */
            }

            .zoom:hover {
              transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
              background:#911F27;
              color: white;
             
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
            <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #e3242b;">
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
        
        <div class="container" style="margin-top: 10%;">
            <div class="box zoom" onclick="location.href='../Admin_Front_End/projects.php';">
                <a class="zoom link" href="projects.php">
                    <img class="zoom image " src="../Images/project-icon.png">
                    <p class="zoom title"><b>Projects</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/employee.php';">
                <a class="zoom link" href="employee.php">
                    <img class="zoom image" src="../Images/employee-icon.png">
                    <p class="zoom title"><b>Employee System</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/.php';">
                <a class="zoom link" href=".php">
                    <img class="zoom image" src="../Images/employee-icon.png">
                    <p class="zoom title"><b>Help</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/projects_history.php';">
                <a class="zoom link" href="projects_history.php">
                    <img class="zoom image" src="../Images/project_history-icon.png">
                    <p class="zoom title"><b>Project History</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/statistic.php';">
                <a class="zoom link" href="statistic.php">
                    <img class="zoom image" src="../Images/statistic-icon.png">
                    <p class="zoom title"><b>Sale Statistic</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/discount.php';">
                <a class="zoom link" href="discount.php">
                    <img class="zoom image" src="../Images/discount-icon.png">
                    <p class="zoom title"><b>Discount</b></p>
                </a>
            </div>
            <div class="box zoom" onclick="location.href='../Admin_Front_End/.php';">
                <a class="zoom link" href=".php">
                    <img class="zoom image" src="../Images/discount-icon.png">
                    <p class="zoom title"><b>Manage Service</b></p>
                </a>
            </div>
        </div>
        
        
<!--    <div class="row container" style="margin-top:10%; width:100%; height:300px;">
            <a class="col-sm-3 zoom" href="projects.php" style="text-decoration: none; color: black; width: 27%;height:100%; border-radius: 20px; box-shadow: 2px 2px 8px #888888; ">
                <img class="zoom" style="width:20%; height:auto; display: block; margin-top:15%; justify-content: center;" src="../Images/project-icon.png" alt="...">
                <p class="zoom" style="font-size: 18px; margin-top:15%; text-align: center;"><b>PROJECTS</b></p>
            </a>
        
            <a class="col-sm-9 zoom" href="employee.php" style="text-decoration: none; color: black; width: 56%; height:100%;border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;">
                <img class="zoom" style="width:20%; height:auto; display: flex;  justify-content: center;" src="../Images/employee-icon.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text zoom" style=" font-size: 18px; text-align: center;"><b>EMPLOYEE SYSTEM</b></p>
                </div>
            </a>
            
        </div>
        
        <div style="margin-top:5%; width:100%; height:300px; margin-bottom: 5%;">
            <div class="zoom" style="width: 27%; float: left;align-items: center; height:100%;  margin-left: 5%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; " >
                <a href="projects_history.php" style="text-decoration: none; color: black;">
                    <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/project_history-icon.png" class="card-img-top" alt="...">
                    <p class="card-text zoom" style="font-size: 18px; margin-top:15%; text-align: center;"><b>Project History</b></p>
                </a>
            </div>
        
            <div class="zoom" style="width: 26%; float:left;  align-items: center; height:100%; margin-left: 4%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;" >
                <a href="statistic.php" style="text-decoration: none; color: black;">
                    <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/statistic-icon.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text zoom" style=" font-size: 18px; margin-top:15%; text-align: center;"><b>Sales Statistic</b></p>
                    </div>
                </a>
                
            </div>
            <div class="zoom" style="width: 26%;  align-items: center; height:100%; margin-left:66%; padding:15px; border-radius: 20px; box-shadow: 2px 2px 8px #888888; object-fit:cover;" >
                <a href="discount.php" style="text-decoration: none; color: black;">
                    <img class="zoom" style="width:20%; display: flex; margin-top:15%; justify-content: center;" src="../Images/discount-icon.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text zoom" style=" font-size: 18px; margin-top:15%; text-align: center;"><b>Discount</b></p>
                    </div>
                </a>
                
            </div>
        </div>-->
        
    </body>
</html>
