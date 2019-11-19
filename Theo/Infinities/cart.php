<?php
include_once 'header.php';
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
    header('location: login.php');
} else {
    include 'db.php';
    $status = '';

    if (isset($_POST['action']) && $_POST['action'] == 'remove') {
        if (!empty($_SESSION['shopping_cart'])) {
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($_POST['code'] == $key) {
                    unset($_SESSION['shopping_cart'][$key]);
                    $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
                }
                if (empty($_SESSION['shopping_cart'])) {
                    unset($_SESSION['shopping_cart']);
                }
            }
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'change') {
        foreach ($_SESSION['shopping_cart'] as &$value) {
            if ($value['code'] === $_POST['code']) {
                $value['quantity'] = $_POST['quantity'];
                break; // Stop the loop after we've found the product
            }
        }
    } ?>
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
        <div class="list">
        <?php
if (isset($_SESSION['shopping_cart'])) {
        $total_price = 0; ?>	
<table class="table">
<tbody>
<tr style="height: 40px;" class="markup">
<td>Aantal</td>
<td>Product</td>
<td>Prijs</td>
</tr>	
<?php
    foreach ($_SESSION['shopping_cart'] as $product) {
        ?>
<tr class="values">
<td class="padding" style="width: 30px;padding-right: 50px;padding-left: 10px;">
<form method='post' action=''>
<input type='hidden' name='code' value="<?php
        echo $product['code']; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php
        if ($product['quantity'] == 1) {
            echo 'selected';
        } ?> value="1">1</option>
<option <?php
        if ($product['quantity'] == 2) {
            echo 'selected';
        } ?> value="2">2</option>
<option <?php
        if ($product['quantity'] == 3) {
            echo 'selected';
        } ?> value="3">3</option>
<option <?php
        if ($product['quantity'] == 4) {
            echo 'selected';
        } ?> value="4">4</option>
<option <?php
        if ($product['quantity'] == 5) {
            echo 'selected';
        } ?> value="5">5</option>
</select>
</form>
</td>
<td class="padding" ><?php
        echo '<b>'.$product['name'].'</b>'; ?><br />
</td>
<td class="price"><?php
        echo '<b>€'.$product['price'] * $product['quantity'].'</b>'; ?></td>
<td class="padding" style="width: 30px;padding-right: 10px;padding-left: 10px;" >
<form method='post' action=''>
<input type='hidden' name='code' value="<?php
        echo $product['code']; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'><i class="far fa-trash-alt"></i></button>
</form>
</td>
</tr>
<?php
        $total_price += ($product['price'] * $product['quantity']);
        $_SESSION['total'] = $total_price;
        $_SESSION['pname'] = $product['name'];
        $_SESSION['pquantity'] = $product['quantity'];
    } ?>
<tr>
</tr>
</tbody>
</table>		
  <?php
    } else {
        echo '<h3>Je winkelwagen is leeg!</h3>';
    } ?>
</div>
<div class="bot">
                <span>Totaal: </span><span class="prijs"><?php
                if (!empty($_SESSION['shopping_cart'])) {
                    echo '€'.$total_price;
                    echo '<a href="checkout.php"><button>Afrekenen</button></a>
                    <hr>';
                } else {
                    echo '€0,-';
                } ?></span>
            </div>
</div>
</div>
</div>
</body>
</html>
<?php
}
include_once 'footer.html';
?>