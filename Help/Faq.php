<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        
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
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            /* Button used to open the chat form - fixed at the bottom of the page */
            .open-button {
              background-color: #555;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              opacity: 0.8;
              position: fixed;
              bottom: 23px;
              right: 28px;
              width: 280px;
            }

            /* The popup chat - hidden by default */
            .chat-popup {
              display: none;
              position: fixed;
              bottom: 0;
              right: 15px;
              border: 3px solid #f1f1f1;
              z-index: 9;
            }

            /* Add styles to the form container */
            .form-container {
              max-width: 300px;
              padding: 10px;
              background-color: white;
            }

            /* Full-width textarea */
            .form-container textarea {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background: #f1f1f1;
              resize: none;
              min-height: 200px;
            }

            /* When the textarea gets focus, do something */
            .form-container textarea:focus {
              background-color: #ddd;
              outline: none;
            }

            /* Set a style for the submit/send button */
            .form-container .btn {
              background-color: #04AA6D;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              width: 100%;
              margin-bottom:10px;
              opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
              background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
              opacity: 1;
            }
            
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
                                <a class="nav-link" href="T&C.php" style="color: white; font-size: 20px;">T&C</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Faq.php" style="color: white; font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Worker/login.php" style="color: white; font-size: 20px;">Worker</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!--Section: FAQ-->
        <section>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
            <p class="text-center mb-5">
                Find the answers for the most frequently asked questions below
            </p>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> A simple question?</h6>
                    <p>
                        <strong><u>Absolutely!</u></strong> We work with top payment companies which guarantees your safety and security. All billing information is stored on our payment processing partner.
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> A question that is longer then the previous one?</h6>
                    <p>
                        <strong><u>Yes, it is possible!</u></strong> You can cancel your subscription anytime in your account. Once the subscription is cancelled, you will not be charged next month.
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> A simple question?</h6>
                    <p>
                        Currently, we only offer monthly subscription. You can upgrade or cancel your monthly account at any time with no further obligation.
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> A simple question?</h6>
                    <p>
                        Yes. Go to the billing section of your dashboard and update your payment information.
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> Can I request refund on deposit?</h6>
                    <p>
                        <strong><u>Unfortunately no</u>.</strong> We do not issue full or partial refunds for any reason.
                    </p>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> Another question that is longer than usual</h6>
                    <p>
                        Of course! We’re happy to offer a free plan to anyone who wants to try our service.
                    </p>
                </div>
            </div>
        </section>
        <!--Section: FAQ-->

        <div class="dropdown-menu p-4 text-muted" style="max-width: 200px;">
            <p>
                Some example text that's free-flowing within the dropdown menu.
            </p>
            <p class="mb-0">
                And this is more example text.
            </p>
        </div>

        <h2>Popup Chat Window</h2>
        <p>Click on the button at the bottom of this page to open the chat form.</p>
        <p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

        <button class="open-button" onclick="openForm()">Chat</button>

        <div class="chat-popup" id="myForm">
            <form action="../Livechat/userchat.php" class="form-container">
                <h1>Chat</h1>
                
                <label for="msg"><b>Message</b></label>
                

                <button  type="submit" class="btn"  >Go to Livechat</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
        </script>
        
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

