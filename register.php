<?php
require 'config.php';

$name = htmlspecialchars(trim($_POST['firstname']))." ".htmlspecialchars(trim($_POST['lastname']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$hashedPassword = password_hash($password,PASSWORD_DEFAULT);

$card_holder = $name;

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
':name' => $name,
':email' => $email,
':password' => $hashedPassword
]);

$result = $conn->prepare("SELECT id From users WHERE email = :email");
$result ->execute([
  ':email' => $email 
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

header("Location: index.php");
exit;

?>