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

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>naam: *</strong> <input type="text" name="naam" value="<?php echo $naam; ?>"/><br/>

<strong>locatie: *</strong> <input type="text" name="locatie" value="<?php echo $locatie; ?>"/><br/>

<strong>prijs: *</strong> <input type="text" name="prijs" value="<?php echo $prijs; ?>"/><br/>

<strong>datum: *</strong> <input type="text" name="datum" value="<?php echo $datum; ?>"/><br/>

<strong>image: *</strong> <input type="text" name="image" value="<?php echo $image; ?>"/><br/>

<strong>plaatsen: *</strong> <input type="text" name="plaatsen" value="<?php echo $plaatsen; ?>"/><br/>

<strong>detail: *</strong> <input type="text" name="detail" value="<?php echo $detail; ?>"/><br/>

<strong>tijd: *</strong> <input type="text" name="tijd" value="<?php echo $tijd; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php
}

include 'db.php';

if (isset($_POST['submit'])) {
    if (is_numeric($_POST['id'])) {
        $id = $_POST['id'];

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

