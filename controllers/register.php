<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$_SESSION['name'] = htmlspecialchars(trim($_POST['firstname']))." ".htmlspecialchars(trim($_POST['lastname']));
$_SESSION['email'] = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$_SESSION['hashedPassword'] = password_hash($password,PASSWORD_DEFAULT);
$_SESSION['verification_code'] = random_int(100000,999999);

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer(true);

            
     $mail->isSMTP();
     $mail->Host       = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USER'];
    $mail->Password   = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $_ENV['SMTP_PORT'];                                

    
    $mail->setFrom('walidelmiloudi20@gmail.com', 'Money Wise');
    $mail->addAddress($_SESSION['email'], $_SESSION['name']);     


    $mail->isHTML(true);                                  
    $mail->Subject = 'Verification';
    $mail->Body    = '<h1>'.$_SESSION['verification_code'].'</h1>';
    $mail->AltBody = 'this email is sent via MoneyWise';

    $mail->send();
    header("Location: verification-form.php");
    exit;

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