<?php
include_once 'header.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    echo 'krijg de kanker';
    header('location: profile.php');
} else {
    ?>
<head>

<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">

<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

</head>

<body>

<div class="switch-tabs" style="display: inline-block;width: calc(100% - 300px);">


    <div class="switch-tabs-body mb-50">

        <div id="event" class="switch-content">

            <?php

include 'db.php';

    $result = mysqli_query($mysqli, 'SELECT * FROM event');

    echo "<table cellpadding='10' align='center'>";

    echo '<tr><th>Naam</th> <th>Locatie</th> <th>Prijs</th> <th>Datum</th> <th>Foto</th> <th>Plaatsen</th> <th>Details</th> <th>Tijd</th> <th></th> <th></th> </tr>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';

        echo '<td>'.$row['naam'].'</td>';

        echo '<td>'.$row['locatie'].'</td>';

        echo '<td>'.$row['prijs'].'</td>';

        echo '<td>'.$row['datum'].'</td>';

        echo '<td>'.$row['image'].'</td>';

        echo '<td>'.$row['plaatsen'].'</td>';

        echo '<td>'.$row['detail'].'</td>';

        echo '<td>'.$row['tijd'].'</td>';

        echo '<td><a href="edit.php?id='.$row['id'].'">Bewerken</a></td>';

        echo '<td><a href="delete.php?id='.$row['id'].'">Verwijderen</a></td>';

        echo '</tr>';
    }

    echo '</table>';

    echo "<table align='center'>";

    echo '<tr><a class="insert" href="insert.php?id='.$row['id'].'">insert</a></tr>';

    echo '</table>'; ?>

        </div>
  </div>
  </div>

</body>

</html>
<?php
}
?>
