<?php
session_start();
?>
<head>
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/hamburgers.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Infinities</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <a href="index.php" style="width: 241px;text-decoration: none;"><h1>I N F I N I T I E S</h1></a>
        <nav>
            <ul class="default">
                <a href="index.php#events">
                    <li>Evenementen <i class="fas fa-calendar-alt"></i></li>
                </a>
                <a href="cart.php">
                    <li>Winkelwagen <i class="fas fa-shopping-cart"></i></li>
                </a>
                <?php
                    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
                        echo '<a href="login.php"><li>Login / Register <i class="fas fa-sign-in-alt"></i></li></a>';
                    } else {
                        echo '<a href="logout.php"><li>Uitloggen <i class="fas fa-sign-out-alt"></i></li></a>';
                    }
                ?>
            </ul>
            <div class="responsive-ul">
                <ul class="menu">
                    <a href="index.php">
                        <li>Evenementen</li>
                    </a>
                    <a href="cart.php">
                        <li>Winkelwagen</li>
                    </a>
                    <?php
                    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
                        echo '<a href="login.php"><li>Login/Register</li></a>';
                    } else {
                        echo '<a href="logout.php"><li>Uitloggen</li></a>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <button class="hamburger hamburger--spin is-inactive">
                <span class="hamburger-box">
                    <span class="hamburger-inner">
                    </span>
                </span>
            </button>
    </header>
    <script src="js/jquery.js"></script>
</body>
</html>

