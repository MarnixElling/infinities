<?php
include_once 'header.php';
?>
<html>
<head>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/cart.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Infinities</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- PLACE HEADER HERE -->
    <div class="progress">
        <span class="current">W I N K E L W A G E N &nbsp; </span><i class="fa fa-circle circle"></i><span class="other"> &nbsp; A F R E K E N E N</span>
    </div>
    <div class="container">
        <div class="left">
            <div class="carts">
                <div class="big">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="small">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <p>Uw winkelwagen</p>
            <span>Hier kunt u zien welke producten u allemaal heeft toegevoegd en in welke hoeveelheid. Eventueel kunt u ook de hoeveelheid aanpassen of producten in het geheel verwijderen. <b>LET OP!</b> wij zijn niet verantwoordelijk voor eventuele fouten die u maakt tijdens het aanpassen van de inhoud van uw winkelwagen.</span>
        </div>
        <div class="right">
            <div class="top">
                <span>Aantal</span>
                <span class="mid">Product</span>
                <span class="rechts">Prijs</span>
            </div>
            <div class="list">
                <div class="product">
                    <?php echo '<pre>'; print_r($_SESSION['shopping_cart']); echo '</pre>';?>
                </div>
            </div>
            <div class="bot">
                <span>Totaal: </span><span class="prijs">€5,00</span>
                <button>Afrekenen</button>
                <hr>
            </div>
        </div>
    </div>
</body>
</html>