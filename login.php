<?php
require 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->prepare("SELECT * FROM users WHERE email = :email");
$result->execute([':email' => $email]);
  $user = $result->fetch(PDO::FETCH_ASSOC);
  if(password_verify($password,$user['password'])){
    session_regenerate_id(true);
    $_SESSION['userID'] =$user['id'];
    $_SESSION['username'] =$user['name'];
    header("Location: home.php");
    exit;
  }
header("Location: index.php");
exit;
?>
