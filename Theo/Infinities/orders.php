<?php
include 'adminheader.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    header('location: index.php');
} else {
    ?>
<head>

<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

</head>

<body>

<div class="switch-tabs" style="display: inline-block;width: calc(100% - 300px);">


    <div class="switch-tabs-body mb-50">

        <div id="event" class="switch-content">

            <?php

include 'db.php';

    $result = mysqli_query($mysqli, 'SELECT * FROM `order`');

    echo "<table cellpadding='10' align='center'>";

    echo
    '<tr><th>Voornaam</th> 
    <th>Achternaam</th> 
    <th>Telefoon</th> 
    <th>Straat</th> 
    <th>Huisnummer</th> 
    <th>Postcode</th> 
    <th>Plaats</th> 
    <th>Betaald</th> 
    <th>Evenement</th>
    <th>Aantal</th> 
    <th>Datum</th> 
    </tr>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';

        echo '<td>'.$row['voornaam'].'</td>';

        echo '<td>'.$row['achternaam'].'</td>';

        echo '<td>'.$row['telefoon'].'</td>';

        echo '<td>'.$row['straat'].'</td>';

        echo '<td>'.$row['huisnummer'].'</td>';

        echo '<td>'.$row['postcode'].'</td>';

        echo '<td>'.$row['plaats'].'</td>';

        echo '<td>'.$row['betaald'].'</td>';

        echo '<td>'.$row['event'].'</td>';

        echo '<td>'.$row['aantal'].'</td>';

        echo '<td>'.$row['date'].'</td>';

        echo '</tr>';
    }

    echo '</table>'; ?>
        </div>
  </div>
  </div>

</body>

</html>
<?php
}
?>
