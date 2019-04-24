<?php
include 'db.php';
include_once 'header.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    echo 'krijg de kanker';
    header('location: profile.php');
} else {
    $status = '';
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $admin = $_REQUEST['admin'];
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $mysqli->escape_string(md5(rand(0, 1000)));
        $username = $mysqli->escape_string($_POST['username']);
        $ins_query = "insert into customer (`admin`,`first_name`,`last_name`,`email`,`password`, `hash`, `username`) values ('$admin','$first_name','$last_name','$email','$password', '$hash', '$username')";
        mysqli_query($mysqli, $ins_query) or die(mysqli_error($mysqli));
        $status = "Successfully.</br></br><a href='users.php'>View Inserted Record</a>";
    } ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New</title>
</head>
<body>
<div class="form">
<p><a href="users.php">view</a></p>

<div>
<h1>Insert new</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="admin" placeholder="Admin, 1 = Ja (default 0)" required /></p>
<p><input type="text" name="first_name" placeholder="Voornaam" required /></p>
<p><input type="text" name="last_name" placeholder="Achternaam" required /></p>
<p><input type="text" name="email" placeholder="E-Mail" required /></p>
<p><input type="text" name="username" placeholder="Gebruikersnaam" required /></p>
<p><input type="password" name="password" placeholder="Wachtwoord" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
<?php
}
?>