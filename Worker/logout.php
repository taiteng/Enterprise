<?php
session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['name']);
unset($_SESSION['id']);

// Redirect to the login page:
header('Location: login.php');
