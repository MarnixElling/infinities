<?php

require_once 'connect.php';
if ($conn) {
    if (isset($_SESSION['email'])) {
    } else {
        header('Location: login.php');
    }
    session_start();
}
