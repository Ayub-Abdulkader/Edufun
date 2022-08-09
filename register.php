<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf8_general_ci">
    <title>Edufun - Sign up</title>
    <meta property="og:site_name" content="Edufun">
    <link rel="shortcut icon" type="image/png" href="img/icon.png">
    <meta property="og:image" content="img/icon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>

<body>
    <header id="header">
        <div class="header">
            <div class="logo">
                <a href="#"><img src="img/logo.png"></a>
            </div>
            <div class="log">
                <?php
                session_start();
                if (isset($_SESSION["useruid"])) {
                    header("location: index");
                    exit();
                }

                if (isset($_SESSION["useruid"])) {
                ?>
                    <a href="logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                <?php
                } else {
                ?>
                    <a href="login" class="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a>
                    <a href="signup" class="signup active"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up</a>
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
                            <a href="index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
                        </li>
                        <li class="menu-item">
                            <a href="games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
                        </li>
                        <li class="menu-item">
                            <a href="Leaderboard"><i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard </a>
                        </li>
                        <li class="menu-item">
                            <a><button type="button" value="dark" onclick="myFunction()"><i class="fa fa-sun-o" style="color: #8f8f8f;"></i></button></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <form class='form' action="signup.php" method="post" autocomplete='off'>
        <div class='control'>
            <h1>
                <i class="fa fa-user-plus" aria-hidden="true"></i> Sign up
            </h1>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {
        ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Vul alle velden in!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "invaliduid") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Kies andere gebruikersnaam!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "invalidemail") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Kies andere email!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "passwordsdontmatch") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Wachtwoorden komen niet overeen!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "stmtfaild") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Er ging iets fout,probeer opnieuw!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "usernametaken") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Gebruikersnaam/email is al gebruikt" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
            <?php
            } else if ($_GET['error'] == "none") {
            ?>
                <div class='control block-cube block-input'>
                    <input type="text" placeholder="Je bent succesvol geregistreerd!" readonly>
                    <div class='bg-top green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg-right green'>
                        <div class='bg-inner'></div>
                    </div>
                    <div class='bg green'>
                        <div class='bg-inner'></div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <div class='control block-cube block-input'>
            <input type="text" placeholder="Naam" name="name" autocomplete="off">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input type="text" placeholder="Gebruiksnaam" name="uid" autocomplete="off">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input type="text" placeholder="Email" name="email" autocomplete="off">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input type="password" placeholder="Wachtwoord" name="pwd">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <div class='control block-cube block-input'>
            <input type="password" placeholder="Confirm Wachtwoord" name="pwdrepeat">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        <button class='btn block-cube block-cube-hover' type="submit" name="submit">
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
            <div class='text'>
                Account aan maken
            </div>
        </button>

    </form>
    <script src="script.js"></script>

</body>

</html>