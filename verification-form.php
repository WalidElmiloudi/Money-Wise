<?php
require 'config.php';
session_start();
if(!isset($_SESSION['verification_code'])){
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
</head>

<body class="w-full h-screen flex flex-col bg-black font-['open_sans'] items-center justify-center">
  <div class="w-[80%] h-[40%] xl:w-[30%] bg-gray-800 rounded-md flex flex-col items-center justify-around">
    <h1 class="text-2xl font-bold text-white xl:text-3xl 2xl:text-5xl">Verification</h1>
    <form class="flex flex-col items-center justify-around h-50" action="verification.php" method="post">
      <label class="text-xl xl:text-2xl 2xl:text-3xl font-bold text-white" for="verification_code">Enter The Verification Code : </label>
    <input class="bg-gray-600 w-40 h-10 xl:h-15 xl:w-45 text-white font-bold text-2xl text-center rounded-md" type="tel" name="verification_code">
    <button class="py-1 px-2 bg-green-400 text-white text-xl xl:text-2xl font-bold rounded-md" type="submit">ENTER</button>
    </form>
  </div>
  
</body>

</html>