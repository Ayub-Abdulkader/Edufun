<?php
include '../../dbConnection.php';
session_start();
if (isset($_POST['postscore'])) {
    $score = $_POST['postscore'];
    //echo $score;
    $userid = $_SESSION['userid'];
    $userName = $_SESSION['useruid'];
    $games = "math";

    $sql = "SELECT * FROM `quiz-score` WHERE `usersId` = '$userid'";
    $insertsql = "INSERT INTO `quiz-score`(`usersId`, `usersUid`, `score`, `games`) 
    VALUES ('$userid', '$userName', '$score', '$games')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $insertsql)) {
        echo "score saved!";
    } else {
        echo "not inserted";
    }
    mysqli_close($conn);
} else {
    echo "sorry! something went wrong";
}
