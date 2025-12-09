<?php

session_start();

$host     = "localhost";
$user     = "root";
$password = "";
$db       = "smart_wallet";

$conn = new mysqli($host, $user, $password, $db);

$amount = $_POST['amount'];
$type = $_POST['category'];
$description = $_POST['description'];
$userID = $_SESSION['userId'];

$conn->query("INSERT INTO expences (montant,description,category,userID) VALUES ('$amount','$description','$type','$userID')");

header("Location: expences.php");
exit;
?>