<?php
include '../../dbConnection.php';
session_start();
if (!isset($_SESSION["useruid"])) {
    header("location: ../../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf8_general_ci">
    <title>Edufun - Wordle</title>
    <meta property="og:site_name" content="Edufun">
    <link rel="shortcut icon" type="image/png" href="../../img/icon.png">
    <meta property="og:image" content="../../img/icon.png">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
    <link rel="stylesheet" href="wordle.css">
</head>

<body>
    <header id="header">
        <div class="header">
            <div class="logo">
                <a href="#"><img src="../../img/logo.png"></a>
            </div>
            <div class="log">
                <?php
                if (isset($_SESSION["useruid"])) {
                ?>
                    <!-- <a href="profile" class="profile"><i class="fa fa-user" aria-hidden="true"></i> <?php echo  $_SESSION["useruid"]; ?></a> -->
                    <a href="../../logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                <?php
                } else {
                ?>
                    <a href="login" class="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a>
                    <a href="signup" class="signup"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a>
                <?php
                }
                ?>

            </div>
        </div>
        <div id="menu">
            <div class="menu">
                <nav class="nav">
                    <ul>
                        <li class="menu-item">
                            <a href="../../index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
                        </li>
                        <li class="menu-item">
                            <a href="../../games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
                        </li>
                        <li class="menu-item">
                            <a href="../../leaderboard.php"><i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard </a>
                        </li>
                        <li class="menu-item">
                            <a><button type="button" value="dark/light" onclick="myFunction1()"><i class="fa fa-sun-o" style="color: #8f8f8f;"></i></button></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section id="games">
        <div class="games-1">
            <div class="games-text">
                <p><i class="fa fa-question-circle" aria-hidden="true"></i> Wordle </p>
            </div>
            <div id="games-text">
                <div id="game">
                    <form id="link" method="post" action="index.php">
                        <input type="submit" name="save" value="Start wordle">
                    </form>
                </div>
            </div>
    </section>

    <script src="../../script.js"></script>
</body>

</html>