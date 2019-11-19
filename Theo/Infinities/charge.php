<?php

header('Location: index.php');
  require_once './config.php';
  include 'db.php';
  session_start();

  $voornaam = $_SESSION['voornaam_c'];
  $achternaam = $_SESSION['achternaam_c'];
  $email = $_SESSION['email_c'];
  $telefoon = $_SESSION['telefoon_c'];
  $straat = $_SESSION['straat_c'];
  $huisnummer = $_SESSION['huisnummer_c'];
  $postcode = $_SESSION['postcode_c'];
  $plaats = $_SESSION['plaats_c'];
  $land = $_SESSION['land_c'];

      $name = $_SESSION['pname'];
      $quantity = $_SESSION['pquantity'];

      $sqlorder = "INSERT INTO `infinities`.`order` (`voornaam`, `achternaam`, `email`, `telefoon`, `straat`, `huisnummer`, `postcode`, `plaats`, `land`, `betaald`, `event`,`aantal`, `date`) 
      VALUES ('$voornaam', '$achternaam', '$email', '$telefoon' ,'$straat', '$huisnummer', '$postcode', '$plaats', '$land', 1, '$name','$quantity', NOW())";
      $addorder = mysqli_query($mysqli, $sqlorder);

      $ordername = $name;
      $cardsql = "SELECT plaatsen FROM event WHERE naam ='$ordername'";
      $query = mysqli_query($mysqli, $cardsql);
      $sqlresult = mysqli_fetch_assoc($query);
      $totalcards = $sqlresult['plaatsen'] - $quantity;
      $update_event = mysqli_query($mysqli, "UPDATE event SET plaatsen ='$totalcards' WHERE naam = '$ordername' ");

      $token = $_POST['stripeToken'];
      $email = $_POST['stripeEmail'];
      $amount = $_SESSION['total'] * 100;

      $customer = \Stripe\Customer::create([
      'email' => $email,
      'source' => $token,
  ]);

      $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount' => $amount,
      'currency' => 'eur',
  ]);
  unset($_SESSION['shopping_cart']);
  exit;
