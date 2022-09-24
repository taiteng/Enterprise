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
            form {text-align: center;}
            
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
        
        <title>Payment</title>
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
                                <a class="nav-link" href="../Help_Front_End/Login.php" style="color: white; font-size: 20px;">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <h1 style="margin-top:110px">Payment</h1>
        
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="paypal@your-web-domain.com">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="item_name" value="Enter Item Name">
            <input type="hidden" name="amount" value="39.00">
            <input type="hidden" name="shipping" value="4.99">
            <input type="hidden" name="custom" value="">
            <input type="hidden" name="return" value="http://your-web-domain.com/thanks-payment.htm">
            <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online"> 
        </form>
        
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