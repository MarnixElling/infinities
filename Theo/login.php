<?php

require_once 'connect.php';
include_once 'header.php';

session_start();
if (isset($_SESSION['email'])) {
    echo 'Ingelogd';
} else {
    if (isset($_POST['submit'])) {
        if ($rows === 0) {
            exit('deze gebruiker bestaat niet');
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['customerID'] = $row['id'];
            while ($row = $result->fetch_assoc()) {
                $_SESSION['customerID'] = $row['id'];
            }
            header('Location: index.php');
        }
    }
}
