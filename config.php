<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "smart_wallet";

$conn = new PDO('mysql:host='.$host.';dbname='.$db.'',$user,$password);

session_set_cookie_params([
  'httponly' => true,
  'secure'   => false,
  'samesite' => 'Strict'
]);
session_start();

?>