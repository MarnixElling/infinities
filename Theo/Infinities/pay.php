<head>
    <link rel="stylesheet" href="css/global.css">
</head>
<?php

include 'db.php';
include 'include/checkout.inc.php';
require_once './config.php';
session_start(); ?>

<form action="charge.php" method="post" style="margin: 0;float: left;">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable_key']; ?>"
    data-description="Betaal je kaartjes"
    data-amount="<?php echo $_SESSION['total'] * 100; ?>"
    data-locale="auto"
    data-currency="eur">
    </script>
</form>
<?php

    $_SESSION['voornaam_c'] = $mysqli->escape_string($_POST['voornaam']);
    $_SESSION['achternaam_c'] = $mysqli->escape_string($_POST['achternaam']);
    $_SESSION['email_c'] = $mysqli->escape_string($_POST['email']);
    $_SESSION['telefoon_c'] = $mysqli->escape_string($_POST['telefoon']);
    $_SESSION['straat_c'] = $mysqli->escape_string($_POST['straat']);
    $_SESSION['huisnummer_c'] = $mysqli->escape_string($_POST['huisnummer']);
    $_SESSION['postcode_c'] = $mysqli->escape_string($_POST['postcode']);
    $_SESSION['plaats_c'] = $mysqli->escape_string($_POST['plaats']);
    $_SESSION['land_c'] = $mysqli->escape_string($_POST['land']);
