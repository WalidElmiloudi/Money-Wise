<?php

$host     = "localhost";
$user     = "root";
$password = "";
$db       = "smart_wallet";

$conn = new mysqli($host, $user, $password, $db);

$id = $_GET['id'];
$target = $_GET['target'];

$conn->query("DELETE FROM $target WHERE id = '$id'");

header("Location: $target.php");
exit;
?>