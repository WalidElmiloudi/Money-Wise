<?php
require 'config.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = htmlspecialchars(trim($_SESSION['userID']));

$pdo = $conn->query("SELECT c.id FROM cards c JOIN users u WHERE c.user_id = $userID AND c.statut = 'main'");
$card = $pdo->fetch(PDO::FETCH_ASSOC);

$conn->query("INSERT INTO incomes (montant,description,category,card_id) VALUES ('$amount','$description','$type','{$card['id']}')");

header("Location: incomes.php");
exit;
?>