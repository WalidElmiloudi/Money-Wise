<?php
require 'config.php';

$card_number = (string)htmlspecialchars(trim($_POST['card_number']));
$card_holder= htmlspecialchars(trim($_POST['cardholder_name']));
$expiration_date =htmlspecialchars(trim($_POST['expiration_date'])).'-01';
$CCV = (string)htmlspecialchars(trim($_POST['ccv']));

$pdo = $conn->prepare("INSERT INTO cards (user_id,card_holder,card_number,expiration_date,CCV) VALUES (:user_id,:card_holder,:card_number,:expiration_date,:CCV)");
$pdo->execute([
  ':user_id' => $_SESSION['userID'],
':card_holder' => $card_holder,
':card_number' => wordwrap($card_number,4," ",true),
':expiration_date' => date('Y-m-t',strtotime($expiration_date)),
':CCV' => $CCV
]);

header("Location: cards.php");
exit;
?>