<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    include 'db.php';

    $productID = (int) mysqli_real_escape_string($mysqli, $_GET['id']);

    $sql = "SELECT * FROM event WHERE id = $productID";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
 <!DOCTYPE html>
 <html>
 <head>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/details.css" rel="stylesheet" />
    <title>Infinities</title>
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 </head>
 <body>
    <div class="container">
        <div class="festival">
            <div class="front">
                <h1><?php echo $row['naam']; ?></h1>
                <img src="<?php echo $row['image'] ?>" alt="thumbnail" />
            </div>
            <div class="info">
                <span><?php echo $row['detail']; ?></span><br>
                <div class="price">
                    <span>€<?php echo $row['prijs']; ?>,-</span>
                </div>
                <a href="index.php#events"><div class="purchase">
                    <span>+ Winkelwagen <i class="fas fa-shopping-cart"></i></span></a>
                </div>
            </div>
            <div class="detailed">
                <ul>
                    <li>Datum: 
                        <ul>
                            <li><br></li>
                            <li><span>19 Juli 2019</span></li>
                            <li><span>20 Juli 2019</span></li>
                            <li><span>21 Juli 2019</span></li>
                        </ul>
                    </li>
                        <li>Openinstijden: 
                        <ul>
                            <li><br></li>
                            <li><span>Vrijdag: 20:00 t/m 02:00</span></li>
                            <li><span>Zaterdag: 16:00 t/m 02:00</span></li>
                            <li><span>Zondag: 14:00 t/m 12:00</span></li>
                        </ul>
                    </li>
                    <li>Locatie: 
                        <ul>
                            <li><br></li>
                            <li>Utrecht</li>
                            <li>Amsterdamsestraatweg 287D</li>
                            <li>3551 CE</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <hr>
        </div>
    </div>
 </body>
 </html>
 
    <?php
        }
    } else {
        echo 'Product niet gevonden';
    }
    $mysqli->close();
}
?>