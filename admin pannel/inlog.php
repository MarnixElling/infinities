<style>
 label {
   width: 100px;
   display: inline-block;
 }
</style>
<form method="post">
 <label for="login">E-mailadres</label>
 <input type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input type="submit" name="login" value="Login" />
</form>

<?php
// connect to database
require_once('connect.php');
session_start();
if(isset($_POST['login'])){
 $email = mysqli_real_escape_string($con, $_POST['field_email']);
 $password = mysqli_real_escape_string($con, $_POST['field_password']);
 $sql = "SELECT * FROM customer WHERE email= ? AND password = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("ss", $email, $password);
 $stmt->execute();
 $result = $stmt->get_result();
 if($result->num_rows === 0) {
     exit('Deze gebruiker bestaat niet');
 } else {
     $_SESSION['email'] = $email;
     header("Location: index.php");
 }
 $stmt->close();
}
// close database connection
$conn->close();
?>

<script>
 function validateForm() {
   if(!validateEmail(document.getElementById("login").value)){
     alert("ongeldig emailadres");
     return false;
   }
 }  
 function validateEmail(email) {
     var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
     return re.test(email);
 }
</script>