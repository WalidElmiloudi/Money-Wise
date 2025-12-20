<?php

require 'config.php';

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];
$userID = $_SESSION['userID'];

$pdo = $conn->query("SELECT c.id FROM cards c JOIN users u WHERE c.user_id = {$_SESSION['userID']} AND c.statut = 'main'");
$card = $pdo->fetch(PDO::FETCH_ASSOC);

$conn->query("INSERT INTO expences (montant,description,category,card_id) VALUES ('$amount','$description','$type','{$card['id']}')");

header("Location: expences.php");
exit;
?>