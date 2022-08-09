<?php
include 'dbConnection.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf8_general_ci">
	<title>Edufun - Home</title>
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
				?>
					<a href="logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
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
						<li class="menu-item active">
							<a href="#"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
						</li>
						<li class="menu-item">
							<a href="games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
						</li>
						<li class="menu-item">
							<a href="leaderboard.php"><i class="fa fa-trophy" aria-hidden="true"></i> Leaderboard </a>
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
				<p><i class="fa fa-gamepad" aria-hidden="true"></i> All Games </p>
			</div>
			<div id="games-text">
				<div id="game">
				<div class="games">
                        <div class="box">
                            <div class="topinfo">
                                <div>Grammatica</div>
                            </div>
                            <a href="games/	quis-nederlands/Quiz-Nedelands">
                                <img class="image" src="img/111.png">
                                <div class="title">
                                    <p> Quiz Nedelands </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="games">
                        <div class="box">
                            <div class="topinfo">
                                <div>Smart</div>
                            </div>
                            <a href="games/rekenen/">
                                <img class="image" src="https://www.gynzy.com/wp-content/uploads/2020/09/Schattend-rekenen-header.jpg">
                                <div class="title">
                                    <p> Rekenen </p>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="games">
                        <div class="box">
                            <div class="topinfo">
                                <div>Woorden</div>
                            </div>
                            <a href="games/wordle/wordle">
                                <img class="image" src="https://www.moustique.be/wp-content/uploads/2022/01/WORLDE.jpg">
                                <div class="title">
                                    <p> Wordle </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>
	<script src="script.js"></script>

</body>

</html>