<?php
// connect to database
require_once('connect.php');
if(isset($_POST['submit'])){
 $firstname = $_POST['field_firstname'];
 $infixname = $_POST['field_infixname'];
 $lastname = $_POST['field_lastname'];
 $email = $_POST['field_email'];
 $password = $_POST['field_password'];
 $sql = "INSERT INTO customer
     (firstname, infixname, lastname, email, password)
     VALUES('$firstname', '$infixname', '$lastname','$email', '$password')";
 if ($conn->query($sql) === TRUE) {
   header('location: login.php');
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
}
// close database connection
$conn->close();
?>

<style>
 label {
   width: 100px;
   display: inline-block;
 }
</style>
<form method="post">
 <label for="fname">Naam</label>
 <input type="text" name="field_firstname" id="fname" placeholder="Voornaam" required />
 <input type="text" name="field_infixname" placeholder="Tussenvoegsel" />
 <input type="text" name="field_lastname" placeholder="Achternaam" required /><br>
 <label for="email">E-mailadres</label>
 <input type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input type="submit" name="submit" value="Registreren" />
</form>
