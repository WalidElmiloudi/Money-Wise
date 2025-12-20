<?php

require 'config.php';

$category = htmlspecialchars(trim($_POST['Category']));
$limit_amount =htmlspecialchars(trim($_POST['limitAmount']));

$userID = $_SESSION['userID'];

$pdo = $conn->query("SELECT category FROM category_limits WHERE category = '$category'");
$result = $pdo->fetch(PDO::FETCH_ASSOC);

if(!empty($result)){
  $_SESSION['message'] = $category." Already Has A limit";
  header("Location: expences.php");
  exit;
}

$conn->query("INSERT INTO category_limits (category,limit_amount,user_id) VALUES ('$category','$limit_amount','$userID')");

header("Location: expences.php");
exit;

?>