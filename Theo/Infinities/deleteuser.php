<?php

include 'db.php';
$id = $_REQUEST['id'];
$query = "DELETE FROM customer WHERE id=$id";
$result = mysqli_query($mysqli, $query) or die(mysql1_error());
header('Location: view.php');
