<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    include 'db.php';

    $productID = (int) mysqli_real_escape_string($mysqli, $_GET['id']);

    $sql = "SELECT * FROM event WHERE id = $productID";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
    <div class='product'>
        <img class="product_details" src="<?php echo $row['image']; ?>" alt="<?php echo $row['naam']; ?>">
        <p>Naam: <?php echo $row['naam']; ?></p>
        <p>Beschrijving: <?php echo $row['detail']; ?></p><br>
        <a href='order.php?id=<?php echo $row['id']; ?>'>Bestellen</a>
    </div>
    <?php
        }
    } else {
        echo 'Product niet gevonden';
    }
    $mysqli->close();
}
