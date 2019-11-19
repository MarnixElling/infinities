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
  <link rel="stylesheet" href="css/Registration-Form-with-Photo.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<?php
    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['register'])) { //user logging in
                require 'include/register.inc.php';
            }
        }
    } else {
        header('location: index.php');
    }
?>
<body style="background-color:rgb(241,247,252);">
    <div class="register-photo" style="background-color:rgba(255,255,255,0);">
        <div class="form-container" style="max-width:420px;">
            <form method="post">
                <h2 class="text-center"><strong>Registratie</strong></h2>
                <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Gebruikersnaam">
                </div>
                <div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="Voornaam">
                </div>
                <div class="form-group"><input class="form-control" type="text" name="lastname" placeholder="Achternaam">
                </div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-Mailadres">
                </div>
                <div class="form-group"><input class="form-control" type="password" name="password"
                        placeholder="Wachtwoord"></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input"
                                type="checkbox" required>Ik ga akkoord met de algemene voorwaarden</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit"
                        style="background-color:rgb(87,187,144);" name="register">Registreren</button></div><a href="/Infinities/login.php"
                    class="already">Al een account? Log hier in</a>
            </form>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>

</body>
<!-- <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="login.php" method="post" autocomplete="off">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='firstname' />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='lastname' />
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name='email' />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name='password' />
                    </div>

                    <button type="submit" class="button button-block" name="register" />Register</button>

                </form>

            </div> -->
</html>