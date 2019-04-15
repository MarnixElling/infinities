<?php
$servername = 'localhost';
$username = 'root';
$password = ''; // vul hier jouw eigen wachtwoord in; kan ook leeg zijn
$dbname = 'webshop';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die('Connection failed: ' . $conn->connect_error);
}
?>
