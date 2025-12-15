<?php
require 'config.php';
session_start();

$code = $_POST['verification_code'];

if($code == $_SESSION['verification_code']){
  $_SESSION['validate'] = true;
  header("Location: home.php");
    exit;
} else{
  $_SESSION['validate'] = false;
  header("Location: verification-form.php");
    exit;
}


?>