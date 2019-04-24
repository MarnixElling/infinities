<?php

include_once 'header.php';
include_once 'sidebar.php';
if ($_SESSION['admin'] != 1) {
    echo 'krijg de kanker';
    header('location: profile.php');
} else {
    ?>
    <h2> Welkom <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></h2>
<?php
}
?>
<style>
    h2 {
        text-align: center;
    }
</style>
