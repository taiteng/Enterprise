

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
        
        <title>Covent</title>
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
        
        <p style="margin-top:10%; font-size: 20px; color:black; text-align: center;"><b>DISCOUNT - The Management for the Welfare</b></p>
        <button type="button" class="btn btn-success btn-rounded" style="margin-left:45%;">Create a Discount</button>
        
        
        
        <div class="row" style="margin-top:2%; width:100%; padding:30px;">
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">15%</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                </div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
        </div>
        
    </body>
</html>

