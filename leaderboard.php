<?php
include 'dbConnection.php';
session_start();
if (!isset($_SESSION["useruid"])) {
	header("location: login.php");
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
	<link rel="shortcut icon" type="image/png" href="img/icon.png">
	<meta property="og:image" content="img/icon.png">
    <link rel="stylesheet" href="games/rekenen/score.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script src="https://kit.fontawesome.com/c8f092cc07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>LeaderBoard</title>
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
							<a href="index"><i class="fa fa-home" aria-hidden="true"></i> Edufun </a>
						</li>
						<li class="menu-item">
							<a href="games.php"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
						</li>
						<li class="menu-item active">
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
				<p><i class="fa fa-trophy fa-spin" style="font-size:30px; color:#4470c2" aria-hidden="true"></i> for all games </p>
			</div>
    <div class="leaderboard">
    <h1>
        <svg class="ico-cup">
            <use xlink:href="#cup"></use>
        </svg>
        LEADERBOARDS
    </h1>
    <ol>
            <?php
            $sql = "SELECT usersUid, score, SUM(score) AS total_score FROM ( SELECT usersUid, score FROM `quiz-score` UNION ALL SELECT usersUid, score FROM quiz_score) AS t GROUP BY usersUid ORDER BY SUM(score) DESC LIMIT 20;";
            $result = mysqli_query($conn, $sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                ?>
                    <li>
                        <mark><?php echo $row['usersUid']?></mark>
                        <small><?php echo $row['total_score']?></small>
                    </li>
            <?php
                }
            } else {
                echo "0 results";	
            }
            mysqli_close($conn);
            ?>
    </ol>
</div>


<svg style="display: none;">
    <symbol id="cup" x="0px" y="0px" width="25px" height="26px" viewBox="0 0 25 26" enable-background="new 0 0 25 26" xml:space="preserve">
        <path fill="#F26856" d="M21.215,1.428c-0.744,0-1.438,0.213-2.024,0.579V0.865c0-0.478-0.394-0.865-0.88-0.865H6.69
	C6.204,0,5.81,0.387,5.81,0.865v1.142C5.224,1.641,4.53,1.428,3.785,1.428C1.698,1.428,0,3.097,0,5.148
	C0,7.2,1.698,8.869,3.785,8.869h1.453c0.315,0,0.572,0.252,0.572,0.562c0,0.311-0.257,0.563-0.572,0.563
	c-0.486,0-0.88,0.388-0.88,0.865c0,0.478,0.395,0.865,0.88,0.865c0.421,0,0.816-0.111,1.158-0.303
	c0.318,0.865,0.761,1.647,1.318,2.31c0.686,0.814,1.515,1.425,2.433,1.808c-0.04,0.487-0.154,1.349-0.481,2.191
	c-0.591,1.519-1.564,2.257-2.975,2.257H5.238c-0.486,0-0.88,0.388-0.88,0.865v4.283c0,0.478,0.395,0.865,0.88,0.865h14.525
	c0.485,0,0.88-0.388,0.88-0.865v-4.283c0-0.478-0.395-0.865-0.88-0.865h-1.452c-1.411,0-2.385-0.738-2.975-2.257
	c-0.328-0.843-0.441-1.704-0.482-2.191c0.918-0.383,1.748-0.993,2.434-1.808c0.557-0.663,1-1.445,1.318-2.31
	c0.342,0.192,0.736,0.303,1.157,0.303c0.486,0,0.88-0.387,0.88-0.865c0-0.478-0.394-0.865-0.88-0.865
	c-0.315,0-0.572-0.252-0.572-0.563c0-0.31,0.257-0.562,0.572-0.562h1.452C23.303,8.869,25,7.2,25,5.148
	C25,3.097,23.303,1.428,21.215,1.428z M5.238,7.138H3.785c-1.116,0-2.024-0.893-2.024-1.99c0-1.097,0.908-1.99,2.024-1.99
	c1.117,0,2.025,0.893,2.025,1.99v2.06C5.627,7.163,5.435,7.138,5.238,7.138z M18.883,21.717v2.553H6.118v-2.553H18.883
	L18.883,21.717z M13.673,18.301c0.248,0.65,0.566,1.214,0.947,1.686h-4.24c0.381-0.472,0.699-1.035,0.947-1.686
	c0.33-0.865,0.479-1.723,0.545-2.327c0.207,0.021,0.416,0.033,0.627,0.033c0.211,0,0.42-0.013,0.627-0.033
	C13.195,16.578,13.344,17.436,13.673,18.301z M12.5,14.276c-2.856,0-4.93-2.638-4.93-6.273V1.73h9.859v6.273
	C17.43,11.638,15.357,14.276,12.5,14.276z M21.215,7.138h-1.452c-0.197,0-0.39,0.024-0.572,0.07v-2.06
	c0-1.097,0.908-1.99,2.024-1.99c1.117,0,2.025,0.893,2.025,1.99C23.241,6.246,22.333,7.138,21.215,7.138z" />
</symbol>
</svg>
</div>
</section>
<br>
	<script src="script.js"></script>
    <script src="math.js"></script>
</body>
</html>