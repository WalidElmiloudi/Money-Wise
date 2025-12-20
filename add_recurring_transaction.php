<?php

require 'config.php';

$amount = $_POST['amount'];
$type = $_POST['type'];
$category = $_POST['category'];

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