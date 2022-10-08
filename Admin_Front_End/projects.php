<?php
session_start();
include "../Back_End/db_conn.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../Admin_Front_End/admin_js/tableProject.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
           .my-custom-scrollbar {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: auto;
            }
            .table-wrapper-scroll-y {
            display: block;
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
        
        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-top:10%; padding:20px;">
            <table  class="table table-bordered table-striped mb-0">
                <thead>
                    <tr align="center">
                        <th scope="col">Service ID</th>
                        <th scope="col">Task/Description</th>
                        <th scope="col">Person-In-Charge</th>
                        <th scope="col">Status</th>
                        <th scope="col">Quotation</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="projects">
                    <script src="../Admin_Back_End/displayProject.js"></script>
                </tbody>
            </table>
        </div>
        
        <?php
        $service_id = "";
        if(isset($_GET["service_id"])){
            $service_id = $_GET["service_id"];
        }?>
        
        <!-- Modal -->
        <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Task Assign</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    
                    <!--MODAL POP UP FOR ASSIGN EMPLOYEE-->
                    <?php
                    $service_id = "";
                    if(isset($_GET["service_id"])){
                        $service_id = $_GET["service_id"];
                    }
                    
                    $sql = "SELECT username FROM accounts";
                    $result = $conn->query($sql);
                    
                    echo '<form action="../Admin_Back_End/handle_assignProject.php?id='.$serviceId.'" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Employee</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                  
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            <option name=username>'.$row["username"].'</option>;
                                        }

                                    }
                                </select>
                                <div id="emailHelp" class="form-text">Assign an employee to in charge of this project</div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>';

                    ?>
                    
                    
                    
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                $()
            });
        </script>
        
        
    </body>
</html>

