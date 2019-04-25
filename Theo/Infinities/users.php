<?php

include_once 'adminheader.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    echo 'krijg de kanker';
    header('location: profile.php');
} else {
    include_once 'db.php';
    $result = mysqli_query($mysqli, 'SELECT * FROM event'); ?>
<div id="admin" class="switch-content" style="display: inline-block;width: calc(100% - 300px);">

<?php

include 'db.php';

    $result = mysqli_query($mysqli, 'SELECT * FROM customer where admin= 1');

    echo "<table cellpadding='10' align='center'>";
    echo '<h2>Admin Accounts</h2>';
    echo '<tr><th>naam</th> <th>achternaam</th> <th>email</th> <th>password</th><th></th><th></th></tr>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';

        echo '<td>'.$row['first_name'].'</td>';

        echo '<td>'.$row['last_name'].'</td>';

        echo '<td>'.$row['email'].'</td>';

        echo '<td>'.$row['password'].'</td>';

        echo '<td><a href="edituser.php?id='.$row['id'].'">Bewerken </a></td>';

        echo '<td><a href="deleteuser.php?id='.$row['id'].'">Verwijderen </a></td>';

        echo '</tr>';
    }

    echo '</table>';

    echo "<table align='center'>";

    echo '</table>'; ?>

</div>

<div id="user" class="switch-content"  style="display: inline-block; width: calc(100% - 300px);">

<?php

include 'db.php';

    $result = mysqli_query($mysqli, 'SELECT * FROM customer where admin=0');

    echo "<table cellpadding='10' align='center'>";

    echo '<h2>Gebruiker Accounts</h2>';

    echo '<tr><th>naam</th> <th>achternaam</th> <th>email</th> <th>password</th><th></th><th></th></tr>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';

        echo '<td>'.$row['first_name'].'</td>';

        echo '<td>'.$row['last_name'].'</td>';

        echo '<td>'.$row['email'].'</td>';

        echo '<td>'.$row['password'].'</td>';

        echo '<td><a href="edituser.php?id='.$row['id'].'">Edit </a></td>';

        echo '<td><a href="deleteuser.php?id='.$row['id'].'">Delete </a></td>';

        echo '</tr>';
    }

    echo '</table>';

    echo "<table align='center'>";

    echo '<tr><a class="insert" href="insertuser.php?id='.$row['id'].'">insert</a></tr>';

    echo '</table>'; ?>

</div>
<?php
}
?>