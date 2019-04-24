<?php
include 'db.php';
include_once 'header.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    echo 'krijg de kanker';
    header('location: profile.php');
} else {
    $status = '';
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $naam = $_REQUEST['naam'];
        $locatie = $_REQUEST['locatie'];
        $prijs = $_REQUEST['prijs'];
        $datum = $_REQUEST['datum'];
        $image = $_REQUEST['image'];
        $plaatsen = $_REQUEST['plaatsen'];
        $detail = $_REQUEST['detail'];
        $tijd = $_REQUEST['tijd'];
        $ins_query = "insert into event (`naam`,`locatie`,`prijs`,`datum`,`image`,`plaatsen`,`detail`,`tijd`) values ('$naam','$locatie','$prijs','$datum','$image','$plaatsen','$detail','$tijd')";
        mysqli_query($mysqli, $ins_query) or die(mysqli_error($mysqli));
        $status = "Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
    } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New</title>
</head>
<style>
    input {
        width: 500px;
    }
</style>
<body>
<div class="form">
<p><a href="view.php">view</a></p>

<div>
<h1>Insert new</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="naam" placeholder="vul de naam in van het event" required /></p>
<p><input type="text" name="locatie" placeholder="vul de locatie in van het event" required /></p>
<p><input type="text" name="prijs" placeholder="vul de prijs in van de kaarten" required /></p>
<p><input type="date" name="datum" placeholder="vul de datum wanneer het event is" required /></p>
<p><input type="text" name="image" placeholder="vul de naam van de afbeelding in" required /></p>
<p><input type="text" name="plaatsen" placeholder="vul de aantal plaatsen die er zijn in het event in" required /></p>
<p><input type="text" name="detail" placeholder="vul de info van de detail pagina in" required /></p>
<p><input type="text" name="tijd" placeholder="vul de tijd in van het event" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
<?php
}
?>
