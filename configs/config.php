<?php

$conn = new PDO("mysql:host=localhost;dbname=smart_wallet", "root", "");

session_set_cookie_params([
  'httponly' => true,
  'secure'   => false,
  'samesite' => 'Strict'
]);
session_start();

?>