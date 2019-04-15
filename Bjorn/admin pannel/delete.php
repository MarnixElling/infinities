<?php
require('connect.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM customer WHERE id=$id"; 
$result = mysqli_query($conn ,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>