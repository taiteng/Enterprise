<!DOCTYPE html>
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
            p    {color: white;}
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
                        <img src="../Images/coventco.png" alt="logo" onclick="location.href='home.php'"/>
                    </a>
                    <div class="d-flex flex-row bd-highlight mb-3 justify-content-end">
                        <ul class="navbar-nav nav">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php" style="color: white; font-size: 20px;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Policy.php" style="color: white; font-size: 20px;">Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" style="color: white; font-size: 20px;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" style="color: white; font-size: 20px;">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<br><!-- comment -->
    <br>
    <br>
    <br><!-- comment -->
    <br>
    <br>
<!-- Accordion Example -->
<div class="row">
  
  .col-md-6</div>
  <div class="col-md-3">.col-md-3</div>
</div>
<div class="accordion" id="accordionExample">
 <div class="accordion-item">
    <div class="col-md-3">.col-md-3</div> 
    <div class="col-md-6">
    <h2 class="accordion-header" id="headingOne">
       <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Accordion Item #1
       </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show"
       aria-labelledby="headingOne" data-bs-parent="#accordionExample">
       <div class="accordion-body">
          <strong>This is the first item's accordion
          body.</strong>
          It is hidden by default, until the collapse
          plugin adds the appropriate classes that we
          use to style each element. These classes
          control the overall appearance, as well as
          the showing and hiding via CSS transitions.
          You can modify any of this with custom CSS
          or overriding our default variables. It's
          also worth noting that just about any HTML
          can go within the
          <code>.accordion-body</code>, though the
          transition does limit overflow.
       </div>
    </div>
    </div>    
 </div>
 <div class="accordion-item">
     <div class="col-md-6">
    <h2 class="accordion-header" id="headingTwo">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Accordion Item #2
       </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
       data-bs-parent="#accordionExample">
       <div class="accordion-body">
          <strong>This is the second item's accordion
          body.</strong>
          It is hidden by default, until the collapse
          plugin adds the appropriate classes that we
          use to style each element. These classes
          control the overall appearance, as well as
          the showing and hiding via CSS transitions.
          You can modify any of this with custom CSS
          or overriding our default variables. It's
          also worth noting that just about any HTML
          can go within the
          <code>.accordion-body</code>, though the
          transition does limit overflow.
       </div>
    </div>  
    </div>
 </div>
     
 <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       Accordion Item #3
       </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse"
       aria-labelledby="headingThree" data-bs-parent="#accordionExample">
       <div class="accordion-body">
          <strong>This is the third item's accordion
          body.</strong>
          It is hidden by default, until the collapse
          plugin adds the appropriate classes that we
          use to style each element. These classes
          control the overall appearance, as well as
          the showing and hiding via CSS transitions.
          You can modify any of this with custom CSS
          or overriding our default variables. It's
          also worth noting that just about any HTML
          can go within the
          <code>.accordion-body</code>, though the
          transition does limit overflow.
       </div>
    </div>
 </div>
</div>
<div class="row">
  <div class="col-md-3">.col-md-3</div>
  <div class="">.col-md-6</div>
  <div class="col-md-3">.col-md-3</div>
</div>
<form>
  <!-- Name input -->
  <div class="form-outline mb-1 col-md-6">
    <input type="text" id="form4Example1" class="form-control" />
    <label class="form-label" for="form4Example1">Name</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form4Example2" class="form-control" />
    <label class="form-label" for="form4Example2">Email address</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
    <label class="form-label" for="form4Example3">Message</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
    <label class="form-check-label" for="form4Example4">
      Send me a copy of this message
    </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
</form>
        
<html>

<!DOCTYPE html>
<html>
    
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<br>
<br><!-- comment -->
<div class="w3-container">
  <h2>Borders</h2>

  <div class="w3-panel w3-border">
    <p>I have borders.</p>
  </div>
  
  <div class="w3-panel w3-border-left">
    <p>I have only a left border.</p>
  </div>
  
  <div class="w3-panel w3-border-right">
    <p>I have only a right border.</p>
  </div>
  
  <div class="w3-panel w3-border-top w3-border-bottom">
    <p>I have top and bottom borders.</p>
  </div>

</div>

<div class="container-fluid">
  ...dddddddddddddddddddddd
</div>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
</style>
</head>
<body>

<h2>Popup Chat Window</h2>
<p>Click on the button at the bottom of this page to open the chat form.</p>
<p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
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

</body>
</html>
