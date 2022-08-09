<?php

session_start();
if (isset($_SESSION["useruid"])) {
  header("location: index");
  exit();
}

if (isset($_POST['submit'])) {
  $userName = $_POST['uid'];
  $pwd = $_POST['pwd'];

  require_once 'dbConnection.php';
  require_once 'functions.php';

  if (emptyInputLogin($userName, $pwd) !== false) {
    header("location: login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $userName, $pwd);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf8_general_ci">
  <title>Edufun - Log in</title>
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
        if (isset($_SESSION["useruid"])) {
        ?>
          <a href="logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
        <?php
        } else {
        ?>
          <a href="login" class="login active"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a>
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
  <form autocomplete='off' class='form' action="login.php" method="POST">
    <div class='control'>
      <h1>
        <i class="fa fa-sign-in" aria-hidden="true"></i> Log in
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
      } else if ($_GET['error'] == "wronglogin") {
      ?>
        <div class='control block-cube block-input'>
          <input type="text" placeholder="Incorrect email/password!" readonly>
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
      <input type="text" name="uid" placeholder="Gebruiksnaam/Email" required autocomplete="off">
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
      <input type="password" name="pwd" placeholder="Wachtwoord" required autocomplete="off">
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
        Log In
      </div>
    </button>
  </form>
  <script src="script.js"></script>
</body>

</html>