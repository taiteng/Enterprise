<?php
session_start();
include "../Back_End/db_conn.php";
include "../Admin_Back_End/config.php";

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <link href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap" rel="stylesheet">
        <link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="homecss.css" rel="stylesheet" type="text/css">
        
        
        <!-- logo -->
        <link rel="icon" href="../Images/logo.png">
        
        <style>
            .my-custom-scrollbar {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: auto;
            }
            
            .table-wrapper-scroll-y {
            display: block;
            }
            
            .button-30 {
              align-items: center;
              appearance: none;
              background-color: #FCFCFD;
              border-radius: 4px;
              border-width: 0;
              box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
              box-sizing: border-box;
              color: #36395A;
              cursor: pointer;
              display: inline-flex;
              font-family: "JetBrains Mono",monospace;
              height: 48px;
              justify-content: center;
              line-height: 1;
              list-style: none;
              overflow: hidden;
              padding-left: 16px;
              padding-right: 16px;
              position: relative;
              text-align: left;
              text-decoration: none;
              transition: box-shadow .15s,transform .15s;
              user-select: none;
              -webkit-user-select: none;
              touch-action: manipulation;
              white-space: nowrap;
              will-change: box-shadow,transform;
              font-size: 18px;
            }

            .button-30:focus {
              box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            }

            .button-30:hover {
              box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
              transform: translateY(-2px);
            }

            .button-30:active {
              box-shadow: #D6D6E7 0 3px 7px inset;
              transform: translateY(2px);
            }
        </style>
        
        
        
	<title>Home Page</title>
        
	
    </head>
    <body class="loggedin">
        <header>
            <nav class="navtop">
            <div>
		<h1>My Projects</h1>
                <a href="worker_home.php"><i class="fas fa-user-circle"></i>Home</a>
		<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
	</nav>
        </header>
        
        
        <div style="padding:20px;">
            <table id="myProjectTable" class="table table-bordered table-striped mb-0" style="width: 100%; box-shadow: 2px 2px 10px #888888; ">
                <thead>
                    <tr align="center">
                        <th>Service ID</th>
                        <th>List of Issues</th>
                        <th>Project Status</th>
                        <th>Progress Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        <!--Progress Modal -->
        <div class="modal fade" id="progressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Task Options - Update Progress</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="../Admin_Back_End/api/project_api/handle_updateProject.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="hidden" id="sid" name="sid" value=""/>
                                <label class="form-label">Progress % Completion:</label>

                                <select class="form-control" id="progressCompletion" name="progressCompletion" required>
                                    <option value="" selected disabled></option>
                                    <option value="10%">10%</option>
                                    <option value="20%">20%</option>
                                    <option value="30%">30%</option>
                                    <option value="40%">40%</option>
                                    <option value="50%">50%</option>
                                    <option value="60%">60%</option>
                                    <option value="70%">70%</option>
                                    <option value="80%">80%</option>
                                    <option value="90%">90%</option>
                                    <option value="100%">100%</option>
                                </select>

                                <br>
                                <label>Project Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="open" selected >Open</option>
                                    <option id="inprogress" value="In-Progress">In-Progress</option>
                                    <option id="closed" value="Closed" style="display:none">Closed</option>
                                </select>

                                <br>
                                <label>Progress Description:</label>
                                
                                <?php
                                $sql = "SELECT progress_desc, progress_check FROM service";
                                ?>
                                
                                <br>
                                <textarea class="form-control" id="progressText" name="progressDesc" rows="3" required></textarea>


                            </div>
                        </div>
                    
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" id="updateButton" class="btn btn-primary" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $('#progressCompletion').change(function() {
                var selected = $(this).val();
                
                if(selected === "100%"){
                    $('#closed').show();
                }else{
                    $('#closed').hide();
                    $('#status').val("In-Progress");
                }
             });
            
            $(document).ready(function(){
                $(document).on('click', '.updateBtn', function(){
                    var serviceId = $(this).data('id');
                    var serviceDesc = $(this).data('bs-id');
                    $('#sid').val(serviceId);
                    $('#progressText').val(serviceDesc);
                    
                });
            });
            
            $(document).ready(function(){
                    var myProjectTable = $('#myProjectTable').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'serverMethod': 'post',
                        'ajax': {
                            'url':'dataTableWorker.php'
                        },
                        pageLength: 5,
                        'columnDefs': [
                           {
                                "targets": 0,
                                "className": "text-center",

                           },
                           {
                                "targets": 2,
                                "className": "text-center",

                           },
                           {
                                "targets": 4,
                                "className": "text-center",
                           },
                           {    "searchable": false, 
                                "targets": [4] 
                           },
                           {    "orderable": false,
                                "targets": [4] 
                           }

                        ],
                        'columns': [
                            { data: 'service_id' },
                            { data: 'service_type' },
                            { data: 'project_status' },
                            { data: 'progress_desc' },
                            { data: 'action' }
                        ]
                    });
                });
        </script>
        
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

