<?php
require 'config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->prepare("SELECT * FROM users WHERE email = :email");
$result->execute([':email' => $email]);
  $user = $result->fetch(PDO::FETCH_ASSOC);
  if(password_verify($password,$user['password'])){
    $_SESSION['userID'] =$user['id'];
    $_SESSION['username'] =$user['name'];
    $_SESSION['verification_code'] = random_int(100000,999999);

require 'vendor/autoload.php';


$mail = new PHPMailer(true);

            
     $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '9e1934001@smtp-brevo.com';
    $mail->Password   = 'bskd3kqludBgTAm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                                 

    
    $mail->setFrom('walidelmiloudi20@gmail.com', 'Money Wise');
    $mail->addAddress($email, $_SESSION['username']);     


    $mail->isHTML(true);                                  
    $mail->Subject = 'Verification';
    $mail->Body    = '<h1>'.$_SESSION['verification_code'].'</h1>';
    $mail->AltBody = 'this email is sent via MoneyWise';

    $mail->send();
    header("Location: verification-form.php");
    exit;
  }
header("Location: index.php");
exit;
?>
