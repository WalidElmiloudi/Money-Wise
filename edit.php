<?php

require 'config.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));

$id = $_GET['id'];
$target = $_GET['target'];

$pdo = $conn->prepare("UPDATE $target SET montant=:montant, category=:category, description=:description WHERE id = '$id' ");
$pdo->execute([
  ':montant'=> $amount,
  ':category'=>$type,
  ':description'=>$description
]);

header("Location: $target.php");
exit;
?>