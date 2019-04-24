<?php

function renderForm($id, $naam, $locatie, $prijs, $datum, $image, $plaatsen, $detail, $tijd, $error)
{
    ?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

if ($error != '') {
    echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
} ?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<h1><?php echo $naam; ?></h1>

<img src="img/<?php echo $image; ?>" alt="<?php echo $naam; ?>" style="width:100%">

<p><?php echo $locatie; ?></p><p><?php echo $datum; ?></p><p><?php echo $tijd; ?></p><p><?php echo $plaatsen; ?></p>

<p><?php echo $detail; ?></p>

</div>

</form>

</body>

</html>

<?php
}

include 'db.php';

if (isset($_POST['submit'])) {
    if (is_numeric($_POST['id'])) {
        $naam = mysqli_real_escape_string($mysqli, $_POST['naam']);

        $locatie = mysqli_real_escape_string($mysqli, $_POST['locatie']);

        $prijs = mysqli_real_escape_string($mysqli, $_POST['prijs']);

        $datum = mysqli_real_escape_string($mysqli, $_POST['datum']);

        $image = mysqli_real_escape_string($mysqli, $_POST['image']);

        $plaatsen = mysqli_real_escape_string($mysqli, $_POST['plaatsen']);

        $detail = mysqli_real_escape_string($mysqli, $_POST['detail']);

        $tijd = mysqli_real_escape_string($mysqli, $_POST['tijd']);

        if ($naam == '' || $locatie == '' || $prijs == '' || $datum == '' || $image == '' || $plaatsen == '' || $detail == '' || $tijd == '') {
            $error = 'ERROR: Please fill in all required fields!';

            renderForm($id, $naam, $locatie, $prijs, $datum, $image, $plaatsen, $detail, $tijd, $error);
        } else {
            mysqli_query($mysqli, "UPDATE event SET naam='$naam', locatie='$locatie', prijs='$prijs', datum='$datum', image='$image', plaatsen='$plaatsen',  detail='$detail', tijd='$tijd' WHERE id='$id'")

or die(mysql_error());

            header('view.php');
        }
    } else {
        echo 'Error!';
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];

        $result = mysqli_query($mysqli, "SELECT * FROM event WHERE id=$id")

or die(mysql_error());

        $row = mysqli_fetch_array($result);

        if ($row) {
            $naam = $row['naam'];

            $locatie = $row['locatie'];

            $prijs = $row['prijs'];

            $datum = $row['datum'];

            $image = $row['image'];

            $plaatsen = $row['plaatsen'];

            $detail = $row['detail'];

            $tijd = $row['tijd'];

            renderForm($id, $naam, $locatie, $prijs, $datum, $image, $plaatsen, $detail, $tijd, '');
        } else {
            echo 'No results!';
        }
    } else {
        echo 'Error!';
    }
}

?>

