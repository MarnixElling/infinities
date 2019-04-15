<?php
require('connect.php');

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$username =$_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$ins_query="insert into customer (`username`,`email`,`password`) values ('$username','$email','$password')";
mysqli_query($conn ,$ins_query) or die(mysqli_error($conn));
$status = "Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New</title>
</head>
<body>
<div class="form">
<p><a href="view.php">view</a></p>

<div>
<h1>Insert new</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="username" placeholder="vul username in" required /></p>
<p><input type="text" name="email" placeholder="vul email in" required /></p>
<p><input type="text" name="password" placeholder="vul wachtwoord in" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
