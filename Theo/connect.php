<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'infinities';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn ->connect_error) {
    die('Fout bij verbinden' . $conn->connect_error);
} 