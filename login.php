<?php
require 'config.php';
session_start();

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
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings              
     $mail->isSMTP();
    $mail->Host       = 'smtp-relay.brevo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '9e1934001@smtp-brevo.com';
    $mail->Password   = 'bskd3kqludBgTAm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('walidelmiloudi20@gmail.com', 'Money Wise');
    $mail->addAddress($email, $_SESSION['username']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
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
