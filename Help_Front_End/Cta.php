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
            td   {text-align: center;
                  min-width:300px;}
            
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
                        <img src="../Images/coventco.png" alt="logo" onclick="location.href='../Front_End/home.php'"/>
                    </a>
                    <div class="d-flex flex-row bd-highlight mb-3 justify-content-end">
                        <ul class="navbar-nav nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../Front_End/home.php" style="color: white; font-size: 20px;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Policy.php" style="color: white; font-size: 20px;">Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Faq.php" style="color: white; font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Login.php" style="color: white; font-size: 20px;">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="my-4">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10 col-12 ">
                        <div class="row px-3 pt-3 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border smooth-shadow-sm">
                            <div class="col-lg-6 p-4 p-md-6 pt-lg-0">
                                <h1 class="display-4 fw-bold lh-1 mb-3">Get to know Latest Promotion</h1>
                                <p class="lead mb-5">
                                    Provide us email address to get the latest promotion
                                </p>
                                <form class="row">
                                    <div class="mb-3 col-md-7 col-12">
                                        <input type="email" class="form-control" placeholder="Enter Email" required="">
                                    </div>
                                    <div class="d-grid mb-3 col-md-5 col-12 ps-md-0">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 offset-lg-1 p-0 overflow-hidden shadow-lg rounded-end-md">
                                <img class="rounded-top-md card-img-size-600" src="../images/coupon.png" alt="" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <p>
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
                    <p><i class="fas fa-home mr-3"></i>1-Z, Lebuh Bukit Jambul, Bukit Jambul, 11900 Bayan Lepas, Pulau Pinang</p>
                    <p><i class="fas fa-envelope mr-3"></i> covent@abc.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 012 3456 789</p>
                    <p><i class="fas fa-print mr-3"></i> + 987 6543 210</p>
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