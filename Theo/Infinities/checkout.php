<?php
    include 'header.php';
    include 'db.php';
    require_once './config.php';
    $check = empty($_SESSION['total']);
    if (empty($_SESSION['total'])) {
        header('location: cart.php');
    }
?>
<html>

<head>
	<title></title>
    <link rel="stylesheet" href="css/stylecheckout.css">
    <link rel="stylesheet" href="css/global.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initail-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
	<div id="container">
        <form action="pay.php" method="post">
			<fieldset>
				<div id="text">
					<h2>G E G E V E N S</h2>
				</div>
				<div id="vakjes">
					<p>
						<input type="text" name="voornaam" id="voornaam" placeholder="Voornaam*" required>
					</p>
					<p>
						<input type="text" name="achternaam" id="achternaam" placeholder="Achternaam*" required>
					</p>
					<p>
						<input type="text" name="email" id="email" placeholder="Emailadres*" required>
					</p>
					<p>
						<input type="text" name="telefoon" id="Telefoonnummer" placeholder="Telefoonnummer*" required>
					</p>
					<p>
						<input type="text" name="straat" id="Straatnaam" placeholder="Straatnaam*" required>
					</p>
					<p>
						<input type="text" name="huisnummer" id="Huisnummer" placeholder="Huisnummer*" required>
					</p>
					<p>
						<input type="text" name="postcode" id="postcode" placeholder="Postcode*" required>
					</p>
					<p>
						<input type="text" name="plaats" id="plaats" placeholder="Plaats*" required>
					</p>
					<p>
						<input type="text" name="land" id="land" placeholder="Land*" required>
					</p>
					<div class="left">
						<?php
						$pname = $_SESSION['pname'];
						$sql = "SELECT * FROM event WHERE naam = '$pname'";
						$result = $mysqli->query($sql);
					
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						echo 'Je kaartje(s): <b>'. $pname . ',</b> Aantal: <b>'. $_SESSION['pquantity'] . '</b><br>';
							}
						}
						?>
					</div>
					<div id="prijs">
						<?php
                            echo 'Totale Prijs: <b>'.$_SESSION['total']. '</b>';
                        ?>
					</div>
					<button id="submit" type="submit" name="betaal">Naar betaling</button>
				</div>
				<div class="details_checkout">
					<?php ?>
				</div>
			</fieldset>
        </form>
	</div>
</body>

</html>