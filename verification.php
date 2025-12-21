<?php
require 'config.php';

$code = $_POST['verification_code'];

if($code == $_SESSION['verification_code']){
  $card_holder = $_SESSION['name'];

function card_number_generator($length =16){
 $min = 10**($length-1);
 $max = (10**$length)-1;
 $account_number = random_int($min,$max);
 return (string)$account_number;
}

$card_number_unspaced = card_number_generator(16);
$card_number = wordwrap($card_number_unspaced,4," ",true);

$expiration_date =date('Y-m-t', strtotime('+10 years'));
$ccv = random_int(100,999);
$isItMain = 'main';

$pdo = $conn->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
$pdo->execute([
':name' => $_SESSION['name'],
':email' => $_SESSION['email'],
':password' => $_SESSION['hashedPassword']
]);

$result = $conn->prepare("SELECT id From users WHERE email = :email");
$result ->execute([
  ':email' => $_SESSION['email'] 
]);

$user = $result->fetch(PDO::FETCH_ASSOC);


$pdo = $conn->prepare("INSERT INTO cards (user_id,statut,card_holder,card_number,expiration_date,CCV) VALUES (:user_id,:statut,:card_holder,:card_number,:expiration_date,:CCV)");
$pdo->execute([
':user_id' => $user['id'],
':statut' => $isItMain,
':card_holder' => $card_holder,
':card_number' => $card_number,
':expiration_date' => $expiration_date,
':CCV' => $ccv
]);
session_unset();
header("Location: index.php");
exit;
} else{
  $_SESSION['validate'] = false;
  header("Location: verification-form.php");
    exit;
}


?>