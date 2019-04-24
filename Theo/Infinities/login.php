<?php
/* Main page with two forms: sign up and log in */
include 'db.php';
session_start();
?>
<html>
<head>
  <title>Sign-Up/Login Form</title>
  <?php //include 'css/css.html';?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infinities</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/fonts/ionicons.min.css">
  <link rel="stylesheet" href="css/Login-Form-Clean.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<?php
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) { //user logging in
            require 'include/login.inc.php';
        }
    }
} else {
    header('location: index.php');
}
?>
<body>
    <div class="login-clean" style="height: 100vh;background-color: #F1F7FC;">
        <form action="login.php" method="post" autocomplete="off">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-list-outline" style="color:rgb(87,187,144);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mailadres">
            </div>
            <div class="form-group"><input class="form-control" type="password" name="password"
                    placeholder="Wachtwoord"></div><a href="forgot.php" class="forgot">wachtwoord vergeten?</a>
            <div class="form-group"><button class="btn btn-primary btn-block" name="login" type="submit"
                    style="background-color:rgb(87,187,144);">Inloggen</button></div>
            <a href="register.php" class="forgot">Nog geen account? Maak hier een account aan</a>
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
