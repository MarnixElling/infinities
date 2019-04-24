<?php

function renderForm($id, $first_name, $last_name, $email, $password, $error)
{
    ?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

if ($error != '') {
    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
} ?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>voornaam: *</strong> <input type="text" name="firstname" value="<?php echo $first_name; ?>"/><br/>

<strong>achternaam: *</strong> <input type="text" name="lastname" value="<?php echo $last_name; ?>"/><br/>

<strong>email: *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br/>

<strong>wachtwoord: *</strong> <input type="text" name="wachtwoord" value="<?php echo $password; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php
}

include 'db.php';

if (isset($_POST['submit'])) {
    if (is_numeric($_POST['id'])) {
        $id = $_POST['id'];

        $first_name = mysqli_real_escape_string($mysqli, $_POST['firstname']);

        $last_name = mysqli_real_escape_string($mysqli, $_POST['lastname']);

        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        $password = mysqli_real_escape_string($mysqli, $_POST['wachtwoord']);

        if ($first_name == '' || $last_name == '' || $email == '' || $password == '') {
            $error = 'ERROR: Please fill in all required fields!';

            renderForm($id, $first_name, $last_name, $email, $password, $error);
        } else {
            mysqli_query($mysqli, "UPDATE customer SET first_name='$first_name', last_name='$last_name', email='$email', password='$password' WHERE id='$id'")

or die(mysql_error());

            header('view.php');
        }
    } else {
        echo 'Error!';
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];

        $result = mysqli_query($mysqli, "SELECT * FROM customer WHERE id=$id")

or die(mysql_error());

        $row = mysqli_fetch_array($result);

        if ($row) {
            $first_name = $row['first_name'];

            $last_name = $row['last_name'];

            $email = $row['email'];

            $password = $row['password'];

            renderForm($id, $first_name, $last_name, $email, $password, '');
        } else {
            echo 'No results!';
        }
    } else {
        echo 'Error!';
    }
}

?>

