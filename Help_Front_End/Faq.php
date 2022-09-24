<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button">Worker Page</a>
  <a href="Faq.php" class="w3-bar-item w3-button">FAQ</a>
  <a href="#" class="w3-bar-item w3-button">Live Chat</a>
  <a href="Policy.php" class="w3-bar-item w3-button">Policy</a>
</div>

<div class="w3-main" style="margin-left:200px">
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Frequently Asked Questions</h1>
  </div>
</div>

<div class="w3-container">
  <h3>Responsive Sidebar</h3>
  <p>The sidebar in this example will always be displayed on screens wider than 992px, and hidden on tablets or mobile phones (screens less than 993px wide).</p>
  <p>On tablets and mobile phones the sidebar is replaced with a menu icon to open the sidebar.</p>
  <p>The sidebar will overlay of the page content.</p>
  <p><b>Resize the browser window to see how it works.</b></p>
</div>
   
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html>