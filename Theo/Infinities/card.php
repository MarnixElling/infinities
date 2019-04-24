<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" media="screen" href="maincss/stylemain.css">
        <title>Document</title>
    </head>
    <body>
        <?php

        require_once 'db.php';
        session_start();

        $test = 'SELECT * FROM event';
        $result = $mysqli->query($test);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

        <div id=card>
            <img src="img/<?php echo $row['image']; ?>" alt="<?php echo $row['naam']; ?>" style="width:100%">
            <h6><?php echo $row['naam']; ?></h6>
            <p><?php echo $row['datum']; ?>  <?php echo $row['tijd']; ?></p>
            <p><?php echo $row['locatie']; ?></p>
            <p class="price">&#8364; <?php echo $row['prijs']; ?></p>
            <p><?php echo $row['plaatsen']; ?></p>
            <p>
            <a href="detail.php?id=<?php echo $row['id']; ?>">Edit </a>
        </div>

        <?php
            }
        } else {
            echo 'We zijn uitverkocht.';
        }

        if (isset($_SESSION['email'])) {
            echo 'Welkom '.$_SESSION['email'];
        } else {
            echo 'je bent niet ingelogd';
        }
        ?>

    </body>
</html>