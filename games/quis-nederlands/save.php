<?php

include '../../dbConnection.php';
session_start();
$score = $_POST['score'];
$userid = $_SESSION['userid'];
$userName = $_SESSION['useruid'];
$games = "nederlands";

$sql = "SELECT * FROM `quiz_score` WHERE `usersId` = '$userid'";
$insertsql = "INSERT INTO `quiz_score`(`usersId`, `usersUid`, `score`, `games`) 
VALUES ('$userid', '$userName', '$score', '$games')";
$updatesql = "UPDATE `quiz_score` SET `score` = '$score' WHERE `quiz_score`.`usersId` = $userid;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	if (mysqli_query($conn, $insertsql)) {
		echo json_encode(array("statusCode" => 200));
		header("Location: Quiz-Nedelands.php");
	} else {
		echo json_encode(array("statusCode" => 201));
		header("Location: Quiz-Nedelands.php");
	}
}
mysqli_close($conn);
