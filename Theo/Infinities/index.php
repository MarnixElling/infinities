<?php
include_once 'header.php';
include 'db.php';
$status = '';
if (isset($_POST['code']) && $_POST['code'] != '') {
    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
        header('location: login.php');
    } else {
        $code = $_POST['code'];
        $result = mysqli_query($mysqli, "SELECT * FROM `event` WHERE `id`='$code'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['naam'];
        $code = $row['id'];
        $price = $row['prijs'];
        $image = $row['image'];

        $cartArray = array(
    $code => array(
    'name' => $name,
    'code' => $code,
    'price' => $price,
    'quantity' => 1,
    'image' => $image, ),
);

        if (empty($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = $cartArray;
            $status = "<div class='box'>Product is toegevoegd aan je winkelwagen!
        <br>";
        } else {
            $array_keys = array_keys($_SESSION['shopping_cart']);
            if (in_array($code, $array_keys)) {
                $status = "<div class='box' style='color:red;'>
            Product zit al in je winkelwagen!</div>";
            } else {
                $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cartArray);
                $status = "<div class='box'>Product zit al in je winkelwagen!</div>";
            }
        }
    }
}

?>
<style>
    body {
        background-color: darkgray;
    }
</style>

<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/content.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Infinities</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="background">
        <img src="images/background.png" alt="background" />
    </div>
    <div class="events"  id="events">
    <?php
    $result = mysqli_query($mysqli, 'SELECT * FROM event');
    while ($row = mysqli_fetch_array($result)) {
        echo '<form method="post" action="index.php#events">';
        echo '<div class="card">';
        echo '<div class="message_box" style="margin:10px 0px;">'.$status.'</div>';
        echo '<div class="title"><span>'.$row['naam'].'</span></div>';
        echo '<img src="'.$row['image'].'" alt="thumbnail" /> <hr><br>';
        echo '<input type="hidden" name="code" value="'.$row['id'].'" />';
        echo '<div class="left"><p>Prijs: </p></div><div class="right">'.$row['prijs'].'</div>';
        echo '<div class="left"><p>Locatie:</p></div><div class="right">'.$row['locatie'].'</div>';
        echo '<div class="left"><p>Datum / Tijd: </p></div><div class="right">'.$row['tijd'].'</div>';
        echo '<div class="left bottom"><p>Verkrijgbare tickets: </p></div><div class="right">'.$row['plaatsen'].'</div>';
        echo '<div class="view">
                <a href="details.php?id='.$row['id'].'"><span>Details <i class="fa fa-info-circle" aria-hidden="true"></i></span></a></div>';
        if ($row['plaatsen'] == 0) {
            echo '<div class="purchase">
                    <button class="buy" type="button" class="buy">Uitverkocht</button>
                </div>';
        } else {
            echo '<div class="purchase">
                    <button class="buy" type="submit" class="buy">Winkelwagen<i class="fas fa-shopping-cart"></i></button>
                </div>';
        }
        echo '</div>';
        echo '</form>';
    }
    ?>
    </div>
</body>
</html>
<?php
include 'footer.html';
