<?php
require 'config.php';

$code = $_POST['verification_code'];

if($code == $_SESSION['verification_code']){
  session_regenerate_id(true);
  $_SESSION['validate'] = true;
  header("Location: home.php");
    exit;
} else{
  $_SESSION['validate'] = false;
  header("Location: verification-form.php");
    exit;
}


?>