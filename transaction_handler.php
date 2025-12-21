<?php

require 'config.php';

if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token'] ){
  header("Location: index.php");
  exit;
}


$reciever_id = $_GET['reciever_id'];
$reciever_name = $_GET['reciever_name'];
$userID = $_SESSION['userID'];
$amount = htmlspecialchars(trim($_POST['amount']));

if($amount <= 0){
 $_SESSION['message'][] = [
    'text'  => 'Amount must be over zero',
    'color' => 'bg-red-500'
];
  header("Location: transactions.php");
exit;
}
$pdo = $conn->prepare("INSERT INTO transactions (amount,reciever_id,sender_id) VALUES (:amount,:reciever_id,:sender_id)");
$pdo->execute([
  ':amount' => $amount,
  ':reciever_id'=>$reciever_id,
  ':sender_id'=>$userID
]);


$pdo = $conn->query("SELECT c.id FROM cards c JOIN users u WHERE c.user_id = $userID AND c.statut = 'main'");
$card = $pdo->fetch(PDO::FETCH_ASSOC);
$pdo = $conn->prepare("INSERT INTO expences (montant,description,category,card_id) VALUES (:montant,:description,:category,'{$card['id']}')");
    $pdo->execute([
      ':montant'=>$amount,
     ':description'=>'Money transaction To '.$reciever_name, 
  ':category'=>'Other'
]);

$pdo = $conn->query("SELECT c.id FROM cards c JOIN users u WHERE c.user_id = $reciever_id AND c.statut = 'main'");
$card = $pdo->fetch(PDO::FETCH_ASSOC);
$conn->query("INSERT INTO incomes (montant,description,category,card_id) VALUES ('$amount','Money transaction from {$_SESSION['username']}','Other','{$card['id']}')");
$pdo = $conn->prepare("INSERT INTO incomes (montant,description,category,card_id) VALUES (:montant,:description,:category,'{$card['id']}')");
    $pdo->execute([
      ':montant'=>$amount,
     ':description'=>'Money transaction from '. $_SESSION['username'], 
  ':category'=>'Other'
]);

header("Location: transactions.php");
exit;
?>