<?php 
session_start();

include("../Back_End/db_conn.php");
include("../Back_End/function.php");

$sid = random_id_gen(24);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap plugin -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
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
            .policylink{ 
                font-size: 15px;
                color: cyan;
            }
            .policylink:hover{
                background-color: lightgoldenrodyellow;
                border-radius: 25px;
                border: 2px solid lightgoldenrodyellow;
            }
            .layoutForm{
                border-radius: 15px;
                background-color: whitesmoke;
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
        
        <title>Service Details</title>
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
        
        <h1 style="margin-top:110px">Service Details</h1>
        
        <form class="was-validated" action="../Back_End/API/create.php" method="POST">
            <div class="container layoutForm">
                <div class="row">
                    <div class="col">
                        <div class="mt-2">
                            <label class="form-label">Site's Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Address:</label>
                            <textarea type="text" class="form-control" name="address" required></textarea>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Site's Size:</label>
                            <input type="text" class="form-control" name="size" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mt-2">
                            <label class="form-label">User Name:</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Contact:</label><br>
                            <input class="form-control" name="contact" type="number" id="contact" required> 
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="example@example.com" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <div class="control">
                            <label class="form-label">Type of Service:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="birthday" name="type" value="birthday" required>
                                <label class="form-check-label" for="birthday">Birthday</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="wedding" name="type" value="wedding" required>
                                <label class="form-check-label" for="wedding">Wedding</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="farewell" name="type" value="farewell" required>
                                <label class="form-check-label" for="farewell">Farewell</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="christmas" name="type" value="christmas" required>
                                <label class="form-check-label" for="christmas">Christmas</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="newyear" name="type" value="newyear" required>
                                <label class="form-check-label" for="newyear">New Year Eve</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="deepavali" name="type" value="deepavali" required>
                                <label class="form-check-label" for="deepavali">Deepavali</label><br>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="raya" name="type" value="raya" required>
                                <label class="form-check-label" for="raya">Hari Raya Aidilfitri</label><br>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Description of Event:</label>
                            <textarea type="text" class="form-control" rows="4" name="description" required></textarea>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Date of Event:</label>
                            <input type="text" class="form-control" name="date" placeholder="Format: DD/MM/YYYY" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Duration of Event:</label>
                            <input type="text" class="form-control" name="time" placeholder="Format: 00:00am" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Number of People:</label><br>
                            <input class="form-control" type="number" id="noppl" name="noppl" min="1" required>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Event Inquiries:</label><br>
                            <div class="form-group row mt-1">
                                <label for="nochair" class="col-sm-2 col-form-label">Chairs:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="nochair" name="nochair" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="nobabychair" class="col-sm-2 col-form-label">Baby Chairs:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="nobabychair" name="nobabychair" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="notable" class="col-sm-2 col-form-label">Tables:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="notable" name="notable" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="nocup" class="col-sm-2 col-form-label">Cups:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="nocup" name="nocup" min="0" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="nocutlery" class="col-sm-2 col-form-label">Cutlery Sets:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="nocutlery" name="nocutlery" min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Food & Drinks:</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select id="selectFND" class="form-control" name="selectFND" onchange="createFNDDisplay()" required>
                                        <option disabled selected value>Please select a food & drinks vendor (Comes with a package)</option>
                                        <option value="eNo">E&O Hotel</option>
                                        <option value="view">The View</option>
                                        <option value="es">ESoon Fast Food</option>
                                        <option value="light">The Light</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" id="noFND" name="noFND" min="1" placeholder="Please input the required quantity" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <textarea class="form-control" rows="5" id="displayFND" name="displayFND" disabled></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="selectDeco" class="form-label">Event Decorative:</label>
                            <select id="selectDeco" class="form-control" name="selectDeco" onchange="createDecoDisplay()" required>
                                <option disabled selected value>Please select a decorative pack (Price calculated based on site's size)</option>
                                <option value="basic">Basic Pack</option>
                                <option value="luxury">Luxury Pack</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <input class="form-control" type="text" id="displayDeco" name="displayDeco" disabled/>
                        </div>
                        <div class="mt-2">
                            <label for="selectFun" class="form-label">Event Entertainment:</label>
                            <select id="selectFun" class="form-control" name="selectFun" required>
                                <option disabled selected value>Please select an entertainment</option>
                                <option value="none">None</option>
                                <option value="clown">Clown</option>
                                <option value="magician">Magician</option>
                                <option value="both">Both (Clown & Magician)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input class="form-control" type="hidden" value="<?php echo $sid; ?>" name="sid" id="sid" />
                <input class="form-control" type="hidden" value="00" name="totalprice" id="totalprice" />
                <div class="form-check mb-2 mt-5">
                    <input class="form-check-input" type="checkbox" id="policycheck" name="policycheck" required>
                    <label class="form-check-label" for="policycheck">
                        I have read and agree to the 
                        <a class="policylink" href="../Help_Front_End/Policy.php">
                            Terms & Condition
                        </a>
                        .
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col mt-3 mb-4">
                        <button type="submit"  class="btn btn-outline-danger btn-lg btn-block">Get Quotation</button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="mt-3" style="text-align: center;">
            <a href="quotation.php">
                <button type="button" class="btn btn-outline-danger">Shortcut</button>
            </a>
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
        <hr>
        
        <script>
            var input = document.querySelector("#contact");
            window.intlTelInput(input, {
                separateDialCode: true,
                preferredCountries: ["my", "us", "jp"]
            });
            
            function createFNDDisplay(){
                var d = document.getElementById("selectFND");
                var displayText = d.options[d.selectedIndex].text;
                
                if(displayText === "E&O Hotel"){
                    outputText = "Pork Chop (1 per person)\n\
Cheesy Wedges (4 servings per person)\n\
Orange & Apple (2 per person)\n\
Matcha Ice Cream(2 scoops per person)\n\
Lemonade & Tea (5 cups per person)";
                }
                else if(displayText === "The View"){
                    outputText = "Lamb Steak (1 per person)\n\
Ratatouille (4 servings per person)\n\
Avocado & Pear (2 per person)\n\
Chocolate Ice Cream(2 scoops per person)\n\
Lemonade & Tea (5 cups per person)";
                }
                else if(displayText === "ESoon Fast Food"){
                    outputText = "Fish N Chips (1 per person)\n\
Cheesy Wedges (4 servings per person)\n\
Orange & Apple (2 per person)\n\
Vanilla Ice Cream(2 scoops per person)\n\
Lemonade & Tea (5 cups per person)";
                }
                else if(displayText === "The Light"){
                    outputText = "Beef Steak (1 per person)\n\
Ratatouille (4 servings per person)\n\
Avocado & Pear (2 per person)\n\
Strawberry Ice Cream(2 scoops per person)\n\
Lemonade & Tea (5 cups per person)";
                }
                
                document.getElementById("displayFND").value = outputText;
            }
            
            function createDecoDisplay(){
                var d = document.getElementById("selectDeco");
                var displayText = d.options[d.selectedIndex].text;
                
                if(displayText === "Luxury Pack"){
                    outputText = "Balloons, Curtains, Blinds, Flowers, Lightings, Word Decor, Backdrops, Centerpieces, Confetties, Wall Decor, Banners, Streamers";
                }
                else{
                    outputText = "Balloons, Curtains, Flowers, Word Decor, Confetties, Wall Decor, Streamers";
                }
                
                document.getElementById("displayDeco").value = outputText;
            }

        </script>
    </body>
</html>