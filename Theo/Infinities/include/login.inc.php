<?php

/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM customer WHERE email='$email'");

if ($result->num_rows == 0) { // User doesn't exist
    header('location: error.php');
} else { // User exists
    $user = $result->fetch_assoc();

    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['admin'] = $user['admin'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        if ($user['admin'] == 1) {
            header('location: admin.php');
        } else {
            header('location: index.php');
        }

        header('location: index.php');
    } else {
        $_SESSION['message'] = 'Fout wachtwoord, probeer opnieuw!';
        header('location: error.php');
    }
}
