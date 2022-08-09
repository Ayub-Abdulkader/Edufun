<?php
include '../../dbConnection.php';
session_start();
if (!isset($_SESSION["useruid"])) {
	header("location: ../../login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="Edufun">
    <meta property="og:image" content="../../img/icon.png">
    <link rel="shortcut icon" type="image/png" href="../../img/icon.png">
    <link rel="stylesheet" href="score.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
	<script src="https://kit.fontawesome.com/c8f092cc07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
	
    <title>Edufun - Rekenen</title>
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
					<a href="../logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
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
							<a href="../../leaderboard"><i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard </a>
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
				<p><i class="fa fa-calculator" aria-hidden="true"></i> Rekenen </p>
			</div>
            <div class="containerdiv">
                <div id="home" class="flex-colum flex-center">
                    <h1>Ready for some math?</h1>
                    <a class="btn" href="math.php">Play</a>
                    <a class="btn" id="highscore-btn" href="highscore.php">High Scores<i class="fas fa-crown"></i></a>
                </div>
            </div>
		</div>
	</section>
	<script src="../../script.js"></script>
</body>
</html>