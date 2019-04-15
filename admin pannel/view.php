<!DOCTYPE html>

<html>

<head>

<title>View Records</title>

</head>

<body>

<?php

include('connect.php');

$result = mysqli_query($conn, "SELECT * FROM customer");

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>username</th> <th>email</th> <th>wachtwoord</th> <th>edit</th> <th>delete</th> <th>insert</th></tr>";

while($row = mysqli_fetch_array( $result )) {

echo "<tr>";

echo '<td>' . $row['id'] . '</td>';

echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

echo '<td><a href="insert.php?id=' . $row['id'] . '">insert</a></td>';

echo "</tr>";

}

echo "</table>";

?>

</body>

</html>
