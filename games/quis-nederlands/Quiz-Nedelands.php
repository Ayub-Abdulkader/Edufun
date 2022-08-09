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
	<title>Edufun - Grammatica Nedelands</title>
	<meta property="og:site_name" content="Edufun">
	<link rel="shortcut icon" type="image/png" href="../../img/icon.png">
	<meta property="og:image" content="../../img/icon.png">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
	<link rel="stylesheet" href="quiz-nederlands.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
				<p><i class="fa fa-book" aria-hidden="true"></i> Grammatica Nedelands </p>
			</div>
			<div id="games-text">
				<div id="game">
					<div class="start_btn start_btn_pv">
						<button>Persoonsvorm en Engelse leenwoorden</button>
						<a href="leaderboard.php"><button class="leaderboard">LeaderBoard</button></a>
					</div>
					<div class="quiz_box quiz_box_pv">
						<header>
							<div class="title"><?php echo $_SESSION["useruid"]; ?></div>
							<div class="timer">
								<div class="time_left_txt_pv">Tijd over</div>
								<div class="timer_sec_pv">14</div>
							</div>
							<div class="time_line_pv"></div>
						</header>
						<section class="ss">
							<div class="que_text_pv">
							</div>
							<div class="option_list_pv">
							</div>
						</section>

						<footer>
							<div class="total_que_pv">
							</div>
							<button class="next_btn_pv">Volgende vraag ➜</button>
						</footer>
					</div>

					<div class="result_box_pv">
						<div class="complete_text_pv">Jaaaa! Je hebt de quiz voltooid! <i class="fa fa-hand-peace-o" aria-hidden="true"></i></div>
						<div class="score_text_pv">
						</div>
						<div class="buttons_pv">
							<button class="quit_pv">Quiz afsluiten</button>
							<form id="fupForm" name="form1" method="post">
								<input type="button" name="save" class="btn btn-primary" value="Bewaren" id="butsave">
							</form>
							<a href="leaderboard.php"><button class="leaderboard">LeaderBoard</button></a>
						</div>
					</div>
				</div>
			</div>
	</section>
	<script src="../../script.js"></script>
	<script src="quiz.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>

</html>