<?php
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $userName = $_POST['uid'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwdrepeat'];

  require_once "dbConnection.php";
  require_once "functions.php";

  if (emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat) !== false) {
    header("location: register.php?error=emptyinput");
    exit();
  }
  
  if (invalidUid($userName) !== false) {
   header("location: register.php?error=invaliduid");
   exit();
  }
  if (invalidEmail($email) !== false) {
   header("location: register.php?error=invalidemail");
   exit();
  }
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
   header("location: register.php?error=pwsdontmatch");
   exit();
  }
  if (uidExists($conn, $userName, $email) !== false) {
   header("location: register.php?error=usernametaken");
   exit();
  }

  createUser($conn, $name, $email, $userName, $pwd);
} else {
  header("location: register.php");
  exit();
}
