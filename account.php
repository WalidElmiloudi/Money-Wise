
<?php

require 'config.php';
if(!$_SESSION['validate']){
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | ACCOUNT PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
</head>

<body class="w-full h-screen flex flex-col bg-slate-100 font-['open_sans']">
  <header class=" w-full justify-between px-3 h-15 flex items-center xl:hidden">
    <i id="menuBg" class="fi fi-br-menu-burger text-3xl text-[#021c3b]"></i>
  </header>
  <section id="menu"
    class="fixed w-full h-full overlay bg-black/20 backdrop-filter backdrop-blur-xs shadow-lg hidden flex-col"
    aria-hidden="true">
    <div class="w-[80%] h-screen bg-white pt-3">
      <div class="w-full flex justify-end pr-3">
        <i id="closeMenu" class="fi fi-br-cross text-3xl text-[#021c3b]"></i>
      </div>
      <div class="w-full h-full flex flex-col justify-center gap-20 pl-10 -mt-5">
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main id="account" class="w-full h-full flex flex-col xl:flex-row gap-4 items-center" aria-hidden="true">
    <div class="hidden w-[20%] bg-white h-full xl:flex flex-col justify-center gap-10 pl-10">
      <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="dashboard.php">Dashboard</a></h1>
        <div class="w-full">
          <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="cards.php">Payements</a></h1>
        <div class="hidden flex-col h-full items-start gap-2 py-2">
          <h2 class=" text-2xl font-bold text-gray-500  px-4 py-2 w-fit   hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="incomes.php"> Incomes</a></h2>
          <h2 class=" text-2xl font-bold text-gray-500   px-4 py-2 w-fit  hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="expences.php"> Expences</a></h2>
        </div>
</div>
      <h1 class=" text-4xl font-bold text-white bg-gray-800 rounded-full py-2 px-4 w-fit "><a href="#">Account</a></h1>
 <hr class="w-50 border-2">
      <h1 class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer"><i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a></h1>    </div>
    <div class="w-full h-full xl:py-1 flex flex-col items-center gap-3">
      <h1 class="text-4xl font-bold text-[#021c3b] pl-5">Account</h1>
      <div class="w-[90%] h-[90%] bg-slate-50 rounded-md">
      </div>
    </div>
  </main>
  <script src="script.js"></script>
</body>