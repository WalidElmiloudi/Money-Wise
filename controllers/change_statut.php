<?php
require 'config.php';
  $card_id = $_GET['cardID'];

  $pdo = $conn->query("UPDATE cards SET statut = 'secondary' WHERE cards.user_id = {$_SESSION['userId']}");
  $pdo = $conn->query("UPDATE cards SET statut = 'main' WHERE id = $card_id");

  header("Location: cards.php");
  exit;
?>