<?php
session_start();
include "../Back_End/db_conn.php";
include "../Admin_Back_End/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <link href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
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
            <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #e3242b;">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../Images/coventco_red.png" alt="logo" onclick="location.href='index.php'"/>
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
        
        <div style="margin-top:10%; padding:20px;">
            <table id="projectTable" class="table table-bordered table-striped mb-0" style="width: 100%; box-shadow: 2px 2px 10px #888888;">
                <thead>
                    <tr align="center">
                        <th>Service ID</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Person-In-Charge</th>
                        <th>Status</th>
                        <th>Progress Check</th>
                        <th>Progress Description</th>
                        <th>Quotation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        
        <!-- Edit Modal -->
        <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Task Assign</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="../Admin_Back_End/handle_assignProject.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Employee</label>
                                
                                <input type="hidden" id="service" name="service" value=""/>
                                
                                <select class="form-select" aria-label="Default select example" name="username">
                                    <option id="selectedWorker"></option>
                                    <option>-</option>
                                    <!--MODAL POP UP FOR ASSIGN EMPLOYEE-->
                                    <?php
                                    $sql = "SELECT username FROM accounts";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option>'.$row["username"].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div id="emailHelp" class="form-text">Assign an employee for the task</div>
                                
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
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning: Project Deletion</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="../Admin_Back_End/handle_deleteProject.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Are you sure to delete this project?</label>
                                
                                <input type="hidden" id="deleteService" name="deleteService" value=""/>
                                
                                <b><p id="deleteServiceID"></p></b>
                                <div id="emailHelp" class="form-text">Project cannot be return and will be deleted permanently!</div>
                                
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
        
        <!-- View Progress Description Modal -->
        <div class="modal fade" id="progressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Progress Description</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="mb-3">
                            
                            <label id="progressText" class="form-label"></label>



                        </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Get the Service Details from the bootstrap modal when the "editBtn" or "deleteBtn" is triggered -->
        <!-- Set the value to the HTML input element and passed it to the form-->
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click', '.editBtn', function(){
                    var serviceId = $(this).data('id');
                    //var serviceId = $(this).closest('tr').find('#service_id').text();
                    //var serviceId = $('#service_id').text();
                    var workerName = $('#worker_name').text();

                    $('#service').val(serviceId);
                    $('#selectedWorker').val(workerName);
                });
            });
            
            $(document).ready(function(){
                $(document).on('click', '.deleteBtn', function(){
                    //var serviceId = $(this).closest('tr').find('#service_id').text();
                    var serviceId = $(this).data('id');
                    $('#deleteService').val(serviceId);
                    document.getElementById("deleteServiceID").innerHTML = "Service ID: "+ serviceId;
                });
            });
            
            $(document).ready(function(){
                $(document).on('click', '.viewProgressBtn', function(){
                    var progress_desc = $(this).data('id');
                    
                    if(progress_desc === "-"){
                        $('#progressText').text("No update from the employee");
                    }else{
                        $('#progressText').text(progress_desc);
                    }

                    
                });
            });
            
            $(document).ready(function(){
                var projectDataTable = $('#projectTable').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'serverMethod': 'post',
                    'ajax': {
                        'url':'dataTableAjax.php'
                    },
                    pageLength: 5,
                    'columnDefs': [
                        {
                            "targets": 0, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 2, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 3, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 4, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 5, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 6, // your case first column
                            "className": "text-center",
                       },
                       {
                            "targets": 7, // your case first column
                            "className": "text-center",
                       },
                       {    "searchable": false, 
                                "targets": [6, 7] 
                       },
                        {    "orderable": false,
                             "targets": [5, 6, 7] 
                        }
                    ],
                    'columns': [
                        { data: 'service_id' },
                        { data: 'service_type' },
                        { data: 'service_desc' },
                        { data: 'worker_name' },
                        { data: 'project_status' },
                        { data: 'progress_check' },
                        { data: 'progress_desc' },
                        { data: 'quotation' },
                        { data: 'actions' }
                    ]
                });
            });
            
            
        </script>
        
        <?php
        if(isset($_SESSION['deleteSuccess'])){ ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: 'Project Deleted Successfully'
                });
            </script>
        <?php
            unset($_SESSION['deleteSuccess']);
        }
        ?>
        
        <?php
        if(isset($_SESSION['updateSuccess'])){ ?>
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Task Updated',
                text: 'Task has been updated'
                });
            </script>
        <?php
            unset($_SESSION['updateSuccess']);
        }
        ?>
        
        
        
        
    </body>
</html>

