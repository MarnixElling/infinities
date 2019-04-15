<?php

function renderForm($id, $username, $email, $password, $error)

{

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>username: *</strong> <input type="text" name="username" value="<?php echo $username; ?>"/><br/>

<strong>email: *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br/>

<strong>password: *</strong> <input type="text" name="password" value="<?php echo $password; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}

include('connect.php');

if (isset($_POST['submit']))

{

if (is_numeric($_POST['id']))

{

$id = $_POST['id'];

$username = mysqli_real_escape_string($conn, $_POST['username']);

$email = mysqli_real_escape_string($conn, $_POST['email']);

$password = mysqli_real_escape_string($conn, $_POST['password']);

if ($username == '' || $email == '' || $password == '')

{

$error = 'ERROR: Please fill in all required fields!';

renderForm($id, $username, $email, $password, $error);

}

else

{

mysqli_query($conn, "UPDATE customer SET username='$username', email='$email', password='$password' WHERE id='$id'")

or die(mysqli_error());

header("view.php");

}

}

else

{

echo 'Error!';

}

}

else

{

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM customer WHERE id=$id")

or die(mysql_error());

$row = mysqli_fetch_array($result);

if($row)

{

$username = $row['username'];

$email = $row['email'];

$password = $row['password'];

renderForm($id, $username, $email, $password, '');

}

else

{

echo "No results!";

}

}

else

{

echo 'Error!';

}

}

?>

