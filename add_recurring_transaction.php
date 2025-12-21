<?php

require 'config.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['type']));
$category = htmlspecialchars(trim($_POST['category']));

$pdo = $conn->prepare("INSERT INTO recurring_transactions (user_ID,amount,type,category) VALUES (:user_ID,:amount,:type,:category)");
$pdo->execute([
  ':user_ID'=>$_SESSION['userID'],
  ':amount'=>$amount,
  ':type'=>$type,
  ':category'=>$category
]);

header("Location: cards.php");
exit;

?>