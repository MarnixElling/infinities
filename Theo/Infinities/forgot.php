<?php
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM customer WHERE email='$email'");

    if ($result->num_rows == 0) { // User doesn't exist
        $_SESSION['message'] = "User with that email doesn't exist!";
        header('location: error.php');
    } else { // User exists (num_rows != 0)
        $user = $result->fetch_assoc(); // $user becomes array with user data

        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        .' for a confirmation link to complete your password reset!</p>';

        // Send registration confirmation link (reset.php)
        $to = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header('location: success.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wachtwoord vergeten</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts/ionicons.min.css">
    <link rel="stylesheet" href="css/Login-Form-Clean.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<body style="background-color:rgb(241,247,252);">
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Wachtwoord vergeten</h2>
            <div class="illustration"><i class="icon ion-locked" style="color:#57BB90;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-Mailadres">
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Wachtwoord
            herstellen</button></div>
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
