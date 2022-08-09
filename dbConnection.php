<?php
$servername = "localhost";
// $username = "edufun";
// $password = "D5px_3j5";
$username = "root";
$password = "";
$db = "edufun";
$conn = new mysqli($servername, $username, $password, $db); 

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}