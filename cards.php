<?php

    require 'config.php';
    if (! $_SESSION['validate']) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MONEYWISE-FINANCE TRACKER | INCOMES PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
</head>

<body class="w-full h-screen flex flex-col bg-slate-100 font-['open_sans'] text-[#021c3b]">
  <header class=" w-full justify-between px-3 h-15 flex items-center xl:hidden">
    <i id="menuBg" class="fi fi-br-menu-burger text-3xl text-[#021c3b]"></i>
    <div class="w-8 h-8 border-2 border-[#021c3b] flex justify-center items-center rounded-full">
      <a href="account.php"><i class="fi fi-sc-user text-xl text-[#021c3b]"></i></a>
    </div>
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
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main class="w-full h-full flex flex-col xl:flex-row gap-4">
    <div class="hidden w-[20%] bg-white h-full xl:flex flex-col justify-center gap-10 pl-10">
      <h1
        class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white">
        <a href="home.php">Home</a>
      </h1>
      <h1
        class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white">
        <a href="dashboard.php">Dashboard</a>
      </h1>
      <div class="w-full">
        <h1 class=" text-4xl font-bold  px-4 py-2 w-fit text-white bg-gray-800 rounded-full"><a
            href="#.php">Payements</a></h1>
        <div class="flex flex-col h-full items-start gap-2 py-2">
          <h2
            class=" text-2xl font-bold   px-4 py-2 pl-10 w-fit   scale-110 text-gray-800 rounded-full ease-in-out duration-150 ">
            <a href="#.php"> Bank Cards</a>
          </h2>
          <h2
            class=" text-2xl font-bold text-gray-500 pl-10 px-4 py-2 w-fit   hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 ">
            <a href="incomes.php"> Incomes</a>
          </h2>
          <h2
            class=" text-2xl font-bold text-gray-500 pl-10  px-4 py-2 w-fit  hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 ">
            <a href="expences.php"> Expences</a>
          </h2>
        </div>
      </div>
      <h1
        class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white">
        <a href="account.php">Account</a>
      </h1>
      <hr class="w-50 border-2">
      <h1
        class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer">
        <i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a>
      </h1>
    </div>
    <div class="w-full h-full bg-[#f2f4f7] flex justify-center items-center">
      <div class="w-[95%] h-[95%] bg-white rounded-lg grid grid-cols-6 grid-rows-2 gap-4 p-2">
        <div class="border rounded-md col-span-2 row-span-1 flex flex-col items-center justify-around">
          <div class="flex flex-col gap-2 self-start px-10">
            <h1 class="text-4xl font-bold ">My Card</h1>
            <hr class="w-50 border-2">
          </div>
          <div
            class="w-[85%] h-[55%] flex justify-center items-center bg-gradient-to-r from-gray-300 to-gray-400 rounded-xl">
            <div class="w-[90%] h-[80%] rounded-xl"></div>
          </div>
          <div class="flex gap-6">
            <button id="addCard"
              class="py-2 px-4 border-4 cursor-pointer hover:bg-black hover:text-white duration-150 ease-in-out rounded-full text-2xl font-bold">ADD
              A CARD</button>
            <button id="allCards"
              class="py-2 px-4 border-4 cursor-pointer hover:bg-black hover:text-white duration-150 ease-in-out rounded-full text-2xl font-bold">YOUR
              CARDS</button>
          </div>
        </div>
        <div class="border rounded-md col-span-2 row-span-1 grid grid-rows-3 p-4 gap-4">
          <div class="border row-span-1 rounded-md"></div>
          <div class="border row-span-1 rounded-md"></div>
          <div class="border row-span-1 rounded-md"></div>


        </div>
        <div class="border rounded-md col-span-2 row-span-2">history</div>
        <div class="border rounded-md col-span-4 row-span-1 grid grid-cols-3 gap-5 p-5">
          <div class="border col-span-1 rounded-md">incomes</div>
          <div class="border col-span-1 rounded-md">expences</div>
          <div class="border col-span-1 rounded-md px-2 pt-2">
            <button id="openaddRTModal" class="py-1 px-1 bg-black text-white text-lg rounded-md font-bold cursor-pointer">+Add Reccuring Transactions</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <section id="addCardModal"
    class="overlay bg-black/20 backdrop-filter backdrop-blur-xs fixed w-full h-full hidden justify-center items-center"
    aria-hidden="true">
    <div class="w-[35%] h-[60%] rounded-xl bg-white flex flex-col items-center justify-center gap-18 p-4 relative">
      <h1 class="text-2xl font-bold self-start pl-16 ">Add credit card or debit card</h1>
      <button id="closeCardModal"
        class="text-xl border-2 pt-1 px-1 font-bold cursor-pointer absolute top-5 right-20 hover:bg-black hover:text-white"><i
          class="fi fi-sr-cross"></i></button>
      <form class="flex flex-col w-[80%] h-[80%] gap-6" action="" method="post">
        <label for="card_number" class="text-2xl font-bold">Card Number :</label>
        <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="tel" placeholder="XXXX XXXX XXXX XXXX">
        <label for="cardholder_name" class="text-2xl font-bold">Cardholder Name :</label>
        <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="text"
          placeholder="Enter Cardholder Name">
        <div class="w-full flex justify-between">
          <div class="flex flex-col gap-2">
            <label for="expiration_date" class="text-xl font-bold">Expiration Date :</label>
            <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="month" name="expiration_date">
          </div>
          <div class="flex flex-col gap-2 mb-5">
            <label for="ccv" class="text-xl font-bold">CCV :</label>
            <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="tel" name="ccv" placeholder="XXX">
          </div>

        </div>

        <button class="bg-black text-white py-2 text-2xl font-bold rounded-md cursor-pointer" type="submit">Add
          Card</button>
      </form>
    </div>
  </section>
  <section id="displayCardsModal"
    class="overlay bg-black/20 backdrop-filter backdrop-blur-xs fixed w-full h-full hidden justify-center items-center" aria-hidden ="true">
    <div class="w-[25%] h-[70%] bg-white rounded-xl flex justify-center items-center relative">
      <div
        class="w-110 h-150 bg-[#f6f6f6] rounded-md flex flex-col items-center pt-2 gap-2 overflow-auto [scrollbar-width:none]">
        <div>
          <div class="w-100 h-90 rounded-md bg-white flex flex-col items-center justify-center gap-6 relative">
            <div
              class="w-[85%] h-[60%] flex justify-center items-center bg-gradient-to-r from-gray-300 to-gray-400 rounded-xl">
              <div class="w-[90%] h-[80%] rounded-xl"></div>
            </div>
            <h1 class="text-3xl font-bold self-start pl-8">Balance :</h1>
            <div class="w-8 h-8 border-2 rounded-full absolute top-1 right-1 cursor-pointer">
            </div>
          </div>
        </div>
      </div>
      <button id="closeCardDisplayModal"
        class="text-xl border-2 pt-1 px-1 font-bold cursor-pointer absolute top-1 right-1 hover:bg-black hover:text-white"><i
          class="fi fi-sr-cross"></i></button>
    </div>
      
  </section>
  <section id="addRTModal" class="overlay w-full h-full fixed bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center" aria-hidden="true">
                <div class="w-[20%] py-4 bg-white rounded-md relative flex flex-col justify-center items-center">
                  <button id="closeRTModal"
        class="text-xl border-2 pt-1 px-1 rounded-xs font-bold cursor-pointer hover:bg-black hover:text-white self-end mr-10"><i
          class="fi fi-sr-cross"></i></button>
                <form class="flex flex-col w-[80%] h-full gap-5" action="" method="post">
                  <label class="text-2xl font-bold" for="amount">Enter The Amount :</label>
                  <input class="text-xl bg-[#e2e2e2] py-2 pl-2 rounded-md" type="number" name="amount" step="0.01" placeholder="Amount">
                  <label class="text-2xl font-bold" for="type">Choose The Type :</label>
                  <select class="text-xl bg-[#e2e2e2] py-2 pl-2 rounded-md" name="type" id="typeSelect">
                    <option value="">Choose</option>
                    <option value="Incomes">Incomes</option>
                    <option value="Expences">Expences</option>
                  </select>
                  <div id="newDiv">
                    
                  </div>
                  <button class="text-2xl font-bold py-2 bg-black text-white rounded-md cursor-pointer" type="submit">ADD</button>
                </form>
                </div>
    </section>
  <script src="script.js"></script>
</body>

</html>