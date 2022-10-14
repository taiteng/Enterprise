<?php 
session_start();

include("../Back_End/db_conn.php");
include("../Back_End/function.php");

$service_data = check_service($conn);
$chair_data = check_chair($conn);
$babychair_data = check_babychair($conn);
$table_data = check_table($conn);
$cup_data = check_cup($conn);
$cutlery_data = check_cutlery($conn);
$FND_data = check_FND($service_data['FND_name'], $conn);
$deco_data = check_deco($service_data['deco_name'], $conn);
$fun_data = check_fun($service_data['fun_name'], $conn);

$chairPrice = $chair_data['item_price'] * $service_data['no_chair'];
$babychairPrice = $babychair_data['item_price'] * $service_data['no_babychair'];
$tablePrice = $table_data['item_price'] * $service_data['no_table'];
$cupPrice = $cup_data['item_price'] * $service_data['no_cup'];
$cutleryPrice = $cutlery_data['item_price'] * $service_data['no_cutlery'];
$FNDPrice = $FND_data['pack_price'] * $service_data['no_FND'];
$decoPrice =$deco_data['deco_price'] * $service_data['site_size'];
$funPrice = $fun_data['fun_price'];
$totalPrice = $chairPrice + $babychairPrice + $tablePrice + $cupPrice + $cutleryPrice + $FNDPrice + $decoPrice + $funPrice;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet">
        
        <!-- logo -->
        <link rel="icon" href="../Images/logo.png">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        
        <style>
            body {background-color: white;}
            h1   {color: black;
                  text-align: center;}
            p    {color: black;}
            a    {color: black;
                  text-decoration: none;}
            hr   {color: black;}
            .bLFT{border-left:1px solid lightgrey; 
                  border-right:1px solid lightgrey; 
                  border-top:1px solid lightgrey;}
            .bLF {border-left:1px solid lightgrey; 
                  border-right:1px solid lightgrey;}
            .bLFB{border-left:1px solid lightgrey; 
                  border-right:1px solid lightgrey; 
                  border-bottom:1px solid lightgrey;}
            form {display: inline-block;}
            
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
        
        <title>Quotation</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #e3242b">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../Images/coventco.png" alt="logo" onclick="location.href='home.php'"/>
                    </a>
                    <div class="d-flex flex-row bd-highlight mb-3 justify-content-end">
                        <ul class="navbar-nav nav">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php" style="color: white; font-size: 20px;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Help/T&C.php" style="color: white; font-size: 20px;">T&C</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Help/Faq.php" style="color: white; font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Worker/login.php" style="color: white; font-size: 20px;">Worker</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <h1 style="margin-top:110px">Quotation</h1>
        
        <div class="container shadow-4" style="text-align: center;">
            <table class="table table-borderless table-responsive" style="min-height: 100px;">
                <tr class="body" align="center" style="padding:5px">
                    <td>
                        <table class="table table-borderless table-responsive">
                            <tr class="body bLFT" align="left" style="padding:5px;">
                                <td>
                                    <p>Site's Name:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['site_name']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLF" align="left" style="padding:5px;">
                                <td>
                                    <p>Address:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['site_address']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFB" align="left" style="padding:5px;">
                                <td>
                                    <p>Site's Size:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['site_size'], ' SQ FT'; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFT" align="left" style="padding:5px;">
                                <td>
                                    <p>Type of Service:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['service_type']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLF" align="left" style="padding:5px;">
                                <td>
                                    <p>Description of Event:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['service_desc']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFB" align="left" style="padding:5px;">
                                <td>
                                    <p>Number of Participants:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['no_ppl']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table table-borderless table-responsive">
                            <tr class="body bLFT" align="left" style="padding:5px;">
                                <td>
                                    <p>User Name:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['username']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLF" align="left" style="padding:5px;">
                                <td>
                                    <p>Contact:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['contact']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFB" align="left" style="padding:5px;">
                                <td>
                                    <p>Email:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['email']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFT" align="left" style="padding:5px;">
                                <td>
                                    <p>Date of Event:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['event_date']; ?></p>
                                </td>
                            </tr>
                            <tr class="body bLFB" align="left" style="padding:5px;">
                                <td>
                                    <p>Duration of Event:</p>
                                </td>
                                <td>
                                    <p><?php echo $service_data['event_time']; ?></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="body" align="center" style="padding:5px">
                    <table class="table table-borderless table-responsive">
                        <tr class="body" align="left" style="padding:10px; border:1px solid lightgrey;">
                            <td style="min-width: 300px;">
                                <p>Description</p>
                            </td>
                            <td align="right">
                                <p>Quantity</p>
                            </td>
                            <td align="right">
                                <p>Price (RM)</p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="chairRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo $chair_data['item_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_chair']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $chairPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="babychairRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo $babychair_data['item_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_babychair']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $babychairPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="tableRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo $table_data['item_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_table']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $tablePrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="cupRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo $cup_data['item_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_cup']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $cupPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="cutleryRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo $cutlery_data['item_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_cutlery']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $cutleryPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p>Food & Beverage Pack:</p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="FNDRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo '&nbsp' . '&nbsp' . $FND_data['pack_name']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $service_data['no_FND']; ?></p>
                            </td>
                            <td align="right">
                                <p><?php echo $FNDPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p>Decoration Pack:</p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                        </tr>
                        <tr class="body bLF" name="decoRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo '&nbsp' . '&nbsp' . $deco_data['deco_name']; ?></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p><?php echo $decoPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLF" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p>Entertainment Pack:</p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                        </tr>
                        <tr class="body bLFB" name="funRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo '&nbsp' . '&nbsp' . $fun_data['fun_name']; ?></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p><?php echo $funPrice; ?></p>
                            </td>
                        </tr>
                        <tr class="body bLFB" name="funRow" align="left" style="padding:10px;">
                            <td style="min-width: 300px;">
                                <p><?php echo 'Total Price'; ?></p>
                            </td>
                            <td align="right">
                                <p></p>
                            </td>
                            <td align="right">
                                <p><?php echo $totalPrice; ?></p>
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr class="body" align="center" style="padding:10px">
                    <td>
                        <form action="../Back_End/quotation_accept.php" method="POST">
                            <input type="hidden" name="serviceID" value="<?php echo $service_data['service_id']; ?>">
                            <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                            <button class="btn btn-outline-primary" type="submit">Accept</button>
                        </form>
                    </td>
                    <td>
                        <form action="../Back_End/quotation_reject.php" method="POST">
                            <input type="hidden" name="serviceID" value="<?php echo $service_data['service_id']; ?>">
                            <button class="btn btn-outline-secondary" type="submit">Reject</button>
                        </form>
                    </td>
                </tr>
                <br>
                <br>
                <tr class="body" align="center" style="padding:10px">
                    <form action="../Back_End/pdfDownload.php" method="POST">
                        <input type="hidden" name="serviceID" value="<?php echo $service_data['service_id']; ?>">
                        <button class="btn btn-outline-danger" type="submit">Download PDF</button>
                    </form>
                </tr>
                <br>
                <br>
            </table>
        </div>
        
        <br>
        
        <div>
          <!-- Footer -->
          <footer class="text-center text-lg-start text-white" style="background-color: #800000">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4" style="background-color: #c30010">
              <!-- Left -->
              <div class="me-5">
                <span style="color:white;">Get connected with us on social networks:</span>
              </div>
              <!-- Left -->
              <!-- Right -->
              <div>
                <a href="" class="text-white me-4">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                  <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                  <i class="fab fa-github"></i>
                </a>
              </div>
              <!-- Right -->
            </section>
            <!-- Section: Social media -->
            <!-- Section: Links  -->
            <section class="">
              <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">Covent.Co</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: black; height: 2px"/>
                    <p style="color:white;">
                        Event Planning System. <br>
                        We hope to bring properity and convenience to people.
                    </p>
                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Products</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: black; height: 2px"/>
                    <p>
                      <a href="#!" class="text-white">MDBootstrap</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">MDWordPress</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">BrandFlow</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">Bootstrap Angular</a>
                    </p>
                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Useful links</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: black; height: 2px"/>
                    <p>
                      <a href="#!" class="text-white">Your Account</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">Become an Affiliate</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">Shipping Rates</a>
                    </p>
                    <p>
                      <a href="#!" class="text-white">Help</a>
                    </p>
                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: black; height: 2px"/>
                    <p style="color:white;"><i class="fas fa-home mr-3"></i>1-Z, Lebuh Bukit Jambul, Bukit Jambul, 11900 Bayan Lepas, Pulau Pinang</p>
                    <p style="color:white;"><i class="fas fa-envelope mr-3"></i> covent@abc.com</p>
                    <p style="color:white;"><i class="fas fa-phone mr-3"></i> + 012 3456 789</p>
                    <p style="color:white;"><i class="fas fa-print mr-3"></i> + 987 6543 210</p>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </div>
            </section>
            <!-- Section: Links  -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
              © 2022 Copyright:
              <a class="text-white" href="">COVENT</a>
            </div>
            <!-- Copyright -->
          </footer>
          <!-- Footer -->
        </div>
        <!-- End of .container -->
        
        <!-- Script to call displays -->
        <script src="Z_quotation.js"></script>
    </body>
</html>