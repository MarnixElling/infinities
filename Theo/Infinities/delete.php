<?php

include 'db.php';
$id = $_REQUEST['id'];
$query = "DELETE FROM event WHERE id=$id";
$result = mysqli_query($mysqli, $query) or die(mysql1_error());
header('Location: view.php');
