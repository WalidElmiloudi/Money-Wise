<?php

session_start();

require 'config.php';

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];
$userID = $_SESSION['userId'];

$conn->query("INSERT INTO incomes (montant,description,category,userID) VALUES ('$amount','$description','$type','$userID')");

header("Location: incomes.php");
exit;
?>