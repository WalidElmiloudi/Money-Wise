<?php

require 'config.php';

$category = htmlspecialchars(trim($_POST['Category']));
$limit_amount =htmlspecialchars(trim($_POST['limitAmount']));

$userID = $_SESSION['userID'];

$pdo = $conn->prepare("SELECT category FROM category_limits WHERE category = :category");
$pdo->execute([
  ':category'=>$category
]);
$result = $pdo->fetch(PDO::FETCH_ASSOC);

if(!empty($result)){
  $_SESSION['message'] = $category." Already Has A limit";
  header("Location: expences.php");
  exit;
}

$pdo = $conn->prepare("INSERT INTO category_limits (category,limit_amount,user_id) VALUES (:category,:limit_amount,:user_id)");
$pdo->execute([
  ':category'=> $category,
  ':limit_amount'=> $limit_amount,
  ':user_id'=> $userID
]);

header("Location: expences.php");
exit;

?>