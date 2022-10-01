<?php 
session_start();

include("../Back_End/db_conn.php");

?>

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
            body {background-color: white;}
            h1   {color: black;
                  text-align: center;}
            p    {color: black;}
            a    {color: black;
                  text-decoration: none;}
            hr   {color: black;}
            
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
                                <a class="nav-link" href="../Help_Front_End/Policy.php" style="color: white; font-size: 20px;">Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Help_Front_End/Faq.php" style="color: white; font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Help_Front_End/Signup.php" style="color: white; font-size: 20px;">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <h1 style="margin-top:110px">Quotation</h1>
        
        <div class="container" style="text-align: center;">
            <table class="table table-bordered table-responsive" style="min-height: 100px;">
                <tr class="body" align="center" style="padding:5px">
                    <td>
                        <table class="table table-borderless table-responsive">
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Site's Name:</p>
                                </td>
                                <td>
                                    <p>Nani The Fuck</p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Address:</p>
                                </td>
                                <td>
                                    <p>1234, Taman Shibal, <br>
                                       Lorong Shibal, 12345 <br>
                                       Pulau Pinang
                                    </p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Site's Size:</p>
                                </td>
                                <td>
                                    <p>120 ft</p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Type of Service:</p>
                                </td>
                                <td>
                                    <p>Birthday</p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Description of Event:</p>
                                </td>
                                <td>
                                    <p>Need someone to cum. <br>
                                       I've got no frens, <br>
                                       no one to celebrate my birthday. <br>
                                       Hope to add a part-timer fake people package.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table table-borderless table-responsive">
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>User Name:</p>
                                </td>
                                <td>
                                    <p>Shibal Inu</p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Contact:</p>
                                </td>
                                <td>
                                    <p>012 3456 789</p>
                                </td>
                            </tr>
                            <tr class="body" align="left" style="padding:5px">
                                <td>
                                    <p>Email:</p>
                                </td>
                                <td>
                                    <p>shibalInu@gmail.com</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="body" align="center" style="padding:5px">
                    <table class="table table-bordered table-responsive">
                        <tr class="body" align="left" style="padding:10px">
                            <td style="min-width: 300px;">
                                <p>Description</p>
                            </td>
                            <td>
                                <p>Quantity</p>
                            </td>
                            <td>
                                <p>Price</p>
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr align="center" style="padding:10px">
                    <td>
                        <a href="payment.php">
                            <button type="button" class="btn btn-outline-primary">Accept</button>
                        </a>
                    </td>
                    <td>
                        <a href="home.php">
                            <button type="button" class="btn btn-outline-secondary">Reject</button>
                        </a>
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <a href="">
                        <button type="button" class="btn btn-outline-danger">Download PDF</button>
                    </a>
                </tr>
            </table>
        </div>
        
        <?php

        echo '<p>'. $_SESSION['sid'] . '</p>';
        
        ?>
        
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
    </body>
</html>