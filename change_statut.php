<?php
require 'config.php';
  $card_id = $_GET['cardID'];

  $pdo = $conn->query("UPDATE cards SET statut = 'secondary'");
  $pdo = $conn->query("UPDATE cards SET statut = 'main' WHERE id = $card_id");

  header("Location: cards.php");
  exit;
?>