<?php

require 'config.php';

$amount = htmlspecialchars(trim($_POST['amount']));
$type = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$userID = $_SESSION['userID'];

$pdo = $conn->query("SELECT c.id FROM cards c JOIN users u WHERE c.user_id = $userID AND c.statut = 'main'");
$card = $pdo->fetch(PDO::FETCH_ASSOC);

$pdo = $conn->prepare("SELECT * FROM category_limits c WHERE c.category = :category AND c.user_id = $userID");
$pdo->execute([
  ':category'=>$type
]);
$result = $pdo->fetch(PDO::FETCH_ASSOC);
if($result){
  $limit_amount = $result['limit_amount'];
  $pdo = $conn->prepare("SELECT sum(e.montant) AS total , e.date FROM expences e LEFT JOIN cards c ON e.card_id = c.id WHERE c.user_id = $userID AND e.category = :category AND MONTH(e.date) = MONTH(CURDATE()) AND YEAR(e.date) = YEAR(CURDATE())");
  $pdo->execute([
  ':category'=>$type
]);
  $expence_amount = $pdo->fetch(PDO::FETCH_ASSOC);
  if($expence_amount['total'] + $amount <= $limit_amount){
    $pdo = $conn->prepare("INSERT INTO expences (montant,description,category,card_id) VALUES (:montant,:description,:category,'{$card['id']}')");
    $pdo->execute([
      ':montant'=>$amount,
     ':description'=>$description, 
  ':category'=>$type
]);
    header("Location: expences.php");
    exit;
  } else{
    $_SESSION['message'] = 'You exceeded '.$type.' limit';
    header("Location: expences.php");
    exit;
  }
}

$pdo = $conn->prepare("INSERT INTO expences (montant,description,category,card_id) VALUES (:montant,:description,:category,'{$card['id']}')");
    $pdo->execute([
      ':montant'=>$amount,
     ':description'=>$description, 
  ':category'=>$type
]);

header("Location: expences.php");
exit;
?>