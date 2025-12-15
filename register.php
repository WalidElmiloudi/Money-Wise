<?php
require 'config.php';

$name = htmlspecialchars(trim($_POST['firstname']))." ".htmlspecialchars(trim($_POST['lastname']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);



$pdo = $conn->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
$pdo->execute([
':name' => $name,
':email' => $email,
':password' => $hashedPassword
]);


header("Location: index.php");
exit;

?>