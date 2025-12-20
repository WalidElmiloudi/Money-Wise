<?php

require 'config.php';

$pdo = $conn->query("SELECT * FROM recurring_transactions");
$results = $pdo->fetchAll(PDO::FETCH_ASSOC);

if($results){
  foreach($results as $result){
    $pdo = $conn->query("SELECT c.id FROM cards c WHERE c.user_id = {$result['user_ID']} AND c.statut = 'main'");
    $card = $pdo->fetch(PDO::FETCH_ASSOC);

    $pdo = $conn->prepare("INSERT INTO {$result['type']} (montant,description,category,card_id) VALUES (:montant,:description,:category,:card_id)");
    $pdo->execute([
      ':montant' => $result['amount'],
      ':description'=>'None',
      ':category'=>$result['category'],
      ':card_id'=>$card['id']
    ]);
  }
}

?>