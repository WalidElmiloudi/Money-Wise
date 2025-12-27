<?php

    require 'config.php';
    if (! $_SESSION['userID']) {
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
    <div class="hidden w-[20%] bg-white h-full xl:flex flex-col justify-center gap-8 pl-4">
      <div class="w-full flex flex-col pl-4 gap-2">
        <h1 class="text-3xl font-bold"><?= $_SESSION['username'] ?></h1>
        <hr class="w-45 border-2">
        <div class="w-full flex justify-between items-center pr-5">
          <h1 class="text-2xl font-bold">ID : <?= $_SESSION['userID'] ?></h1>
          <button class="py-1 px-1 border cursor-pointer" onclick="copyTextToClipboard('<?= $_SESSION['userID'] ?>')"><i class="fi fi-rs-copy-alt"></i></button>
        </div>
        
      </div>
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
      <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="transactions.php">Transactions</a></h1>
      <hr class="w-50 border-2">
      <h1
        class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer">
        <i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a>
      </h1>
    </div>
    <div class="w-full h-full bg-[#f2f4f7] flex justify-center items-center">
      <div class="w-[95%] h-[95%] bg-[#e5e5e5] rounded-lg grid grid-cols-6 grid-rows-2 gap-4 p-2">
        <div class="bg-white rounded-md col-span-2 row-span-1 flex flex-col items-center justify-around">
          <div class="flex flex-col gap-2 self-start px-10">
            <h1 class="text-4xl font-bold ">My Card</h1>
            <hr class="w-50 border-2">
          </div>
          <div class="w-[85%] h-[55%] grid grid-rows-4 p-2 gap-1 bg-gradient-to-r from-gray-500 to-gray-400 rounded-xl">
            <?php
              $pdo = $conn->query("SELECT * FROM cards c WHERE c.user_id = {$_SESSION['userID']} AND c.statut = 'main'");
              $card = $pdo->fetch(PDO::FETCH_ASSOC);
              ?>
            <div class=" flex items-center">
              <h1 class="text-white font-bold text-2xl">MONEYWISE</h1>
            </div>
            <div class=" flex items-center">
              <div
                class="w-16 h-12 border rounded-md bg-gradient-to-t from-yellow-100 to-yellow-400 grid grid-cols-3 grid-rows-4">
                <div class="border row-span-2 rounded-tl-sm"></div>
                <div class="border"></div>
                <div class="border row-span-2 rounded-tr-sm"></div>
                <div class="border row-span-2 "></div>
                <div class="border row-span-2 rounded-bl-sm"></div>
                <div class="border row-span-2 rounded-br-sm"></div>
                <div class="border "></div>
              </div>
            </div>
            <div class=" flex items-center">

              <h1 class="text-white font-bold text-3xl">
                <?php echo $card['card_number'] ?>
              </h1>
            </div>
            <div class=" flex items-center justify-between">
              <h1 class="text-white font-bold text-xl">
                <?php echo $card['card_holder'] ?>
              </h1>
              <h1 class="text-white font-bold text-xl">
                <?php echo date("m/y",strtotime($card['expiration_date'])) ?>
              </h1>
            </div>
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
        <div class="bg-[#f5f5f5] rounded-md col-span-2 row-span-1 grid grid-rows-3 p-4 gap-4">
          <?php

              $pdo =$conn->query("SELECT SUM(i.montant)  AS total FROM incomes i WHERE i.card_id = {$card['id']} ");
              $result = $pdo->fetch(PDO::FETCH_ASSOC);
              $total_incomes = $result['total'];

              $pdo =$conn->query("SELECT SUM(e.montant)  as total FROM expences e WHERE e.card_id = {$card['id']} ");
              $result = $pdo->fetch(PDO::FETCH_ASSOC);
              $total_expences = $result['total'];

              $balance =  $total_incomes - $total_expences;

              $conn->query("UPDATE cards c SET balance = $balance WHERE c.id = {$card['id']} ");

              $pdo =$conn->query("SELECT SUM(i.montant)  as total FROM incomes i WHERE i.card_id = {$card['id']} AND MONTH(date) = MONTH(CURDATE())");
              $result = $pdo->fetch(PDO::FETCH_ASSOC);
              $month_incomes = $result['total'];

              $pdo =$conn->query("SELECT SUM(e.montant)  as total FROM expences e WHERE e.card_id = {$card['id']} AND MONTH(date) = MONTH(CURDATE())");
              $result = $pdo->fetch(PDO::FETCH_ASSOC);
              $month_expences = $result['total'];
            ?>
          <div class="bg-white row-span-1 rounded-md flex flex-col justify-center gap-4 pl-2">
          <h2 class="text-4xl font-bold text-[#021c3b]">
            Balance :
          </h2>
          <h1 class="text-5xl font-bold text-blue-900">
            <?= $balance>0 ? $balance:'0.00' ?> $
          </h1>
          </div>
          <div class="bg-white row-span-1 rounded-md flex flex-col justify-center gap-4 pl-2">
            <h2 class="text-4xl font-bold text-[#021c3b]">
            THis Month Incomes :
          </h2>
          <h1 class="text-5xl font-bold text-green-900">
            <?= $month_incomes>0?$month_incomes:'0.00' ?> $
          </h1>
          </div>
          <div class="bg-white row-span-1 rounded-md flex flex-col justify-center gap-4 pl-2">
            <h2 class="text-4xl font-bold text-[#021c3b]">
            THis Month Expences :
          </h2>
          <h1 class="text-5xl font-bold text-red-900">
            <?= $month_expences > 0?$month_expences:0 ?> $
          </h1>
          </div>


        </div>
        <div class="bg-white rounded-md col-span-2 row-span-2 flex justify-center items-center">
          <h1 class="text-2xl font-bold text-[#021c3b] 2xl:text-4xl animate-pulse">Available Soon</h1>
        </div>
        <div class="bg-[#f5f5f5] rounded-md col-span-4 row-span-1 grid grid-cols-3 gap-5 p-5">
          <div class="border-4 bg-white border-green-700 col-span-1 rounded-md flex flex-col items-center justify-center gap-8">
            <h1 class="text-4xl font-bold self-start pl-2">Total Incomes :</h1>
            <div class="w-[95%] h-25 border-4 border-green-500 rounded-md flex items-center pl-2">
                <h2 class="text-3xl font-bold text-green-600">
                  <?= $total_incomes > 0?$total_incomes:0 ?> $
                </h2>
            </div>
            <h1 class="text-3xl font-bold self-start pl-2">See All Incomes :</h1>
            <a href="incomes.php"><button class="py-3 px-2 text-4xl text-white font-bold bg-green-600 rounded-md cursor-pointer">Go To Incomes</button></a>
          </div>
          <div class="border-4 bg-white border-red-700 col-span-1 rounded-md flex flex-col items-center justify-center gap-8">
            <h1 class="text-3xl font-bold self-start pl-2">Total Expences :</h1>
            <div class="w-[95%] h-25 border-4 border-red-500 rounded-md flex items-center pl-2">
                <h2 class="text-3xl font-bold text-red-600">
                  <?= $total_expences > 0?$total_expences:0 ?> $
                </h2>
            </div>
            <h1 class="text-3xl font-bold self-start pl-2">See All Expences :</h1>
            <a href="expences.php"><button class="py-3.5 px-5 text-3xl text-white font-bold bg-red-600 rounded-md cursor-pointer">Go To Expences</button></a>
          </div>
          <div class="border-4 bg-white col-span-1 rounded-md px-2 pt-2 flex flex-col items-center justify-center gap-9">
            <h1 class="text-3xl font-bold  pl-2 self-start">Transactions :</h1>
            <button id="openaddRTModal"
              class="py-4 px-1 bg-black text-white text-lg rounded-md font-bold cursor-pointer">+Add Reccuring
              Transactions</button>
              <button id="openRTDModal"
              class="py-4 px-2.5 bg-black text-white text-lg rounded-md font-bold cursor-pointer">See Reccuring
              Transactions</button>
              <a href="transactions.php"><button
              class="py-4 px-3.5 bg-black text-white text-2xl rounded-md font-bold cursor-pointer">Make A
              Transaction</button></a>
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
      <form class="flex flex-col w-[80%] h-[80%] gap-6" action="addCard.php" method="post">
        <label for="card_number" class="text-2xl font-bold">Card Number :</label>
        <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" name="card_number" type="number" placeholder="XXXX XXXX XXXX XXXX" maxlength="16" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        <label for="cardholder_name" class="text-2xl font-bold">Cardholder Name :</label>
        <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" name="cardholder_name" type="text"
          placeholder="Enter Cardholder Name">
        <div class="w-full flex justify-between">
          <div class="flex flex-col gap-2">
            <label for="expiration_date" class="text-xl font-bold">Expiration Date :</label>
            <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="month" name="expiration_date">
          </div>
          <div class="flex flex-col gap-2 mb-5">
            <label for="ccv" class="text-xl font-bold">CCV :</label>
            <input class="bg-gray-100 py-2 pl-1 text-xl font-bold rounded-md" type="number" name="ccv" placeholder="XXX" maxLength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0,this.maxLength)">
          </div>

        </div>

        <button class="bg-black text-white py-2 text-2xl font-bold rounded-md cursor-pointer" type="submit">Add
          Card</button>
      </form>
    </div>
  </section>
  <section id="displayCardsModal"
    class="overlay bg-black/20 backdrop-filter backdrop-blur-xs fixed w-full h-full hidden justify-center items-center"
    aria-hidden="true">
    <div class="w-[25%] h-[70%] bg-white rounded-xl flex justify-center items-center relative">
      <div
        class="w-110 h-150 bg-[#f6f6f6] rounded-md flex flex-col items-center pt-2 gap-2 overflow-auto [scrollbar-width:none]">
        <?php
                $pdo = $conn->query("SELECT *
                                     FROM cards c 
                                     WHERE c.user_id = {$_SESSION['userID']}
                                     ORDER BY c.statut");
                $cards = $pdo->fetchAll(PDO::FETCH_ASSOC);
                foreach($cards as $card){ 
              ?>
        <div>
          <div class="w-100 h-90 rounded-md bg-white flex flex-col items-center justify-center gap-6 relative">
            <div
              class="w-[85%] h-[60%] justify-center items-center grid grid-rows-4 bg-gradient-to-r from-gray-500 to-gray-400 rounded-xl">
              <div class=" flex items-center">
                <h1 class="text-white font-bold text-2xl">MONEYWISE</h1>
              </div>
              <div class=" flex items-center">
                <div
                  class="w-16 h-12 border rounded-md bg-gradient-to-t from-yellow-100 to-yellow-400 grid grid-cols-3 grid-rows-4">
                  <div class="border row-span-2 rounded-tl-sm"></div>
                  <div class="border"></div>
                  <div class="border row-span-2 rounded-tr-sm"></div>
                  <div class="border row-span-2 "></div>
                  <div class="border row-span-2 rounded-bl-sm"></div>
                  <div class="border row-span-2 rounded-br-sm"></div>
                  <div class="border "></div>
                </div>
              </div>
              <div class=" flex items-center">

                <h1 class="text-white font-bold text-3xl">
                  <?php echo $card['card_number'] ?>
                </h1>
              </div>
              <div class=" flex items-center justify-between">
                <h1 class="text-white font-bold text-xl">
                  <?php echo $card['card_holder'] ?>
                </h1>
                <h1 class="text-white font-bold text-xl">
                  <?php echo date("m/y",strtotime($card['expiration_date'])) ?>
                </h1>
              </div>
              <div class="w-[90%] h-[80%] rounded-xl"></div>
            </div>
            <h1 class="text-3xl font-bold self-start pl-8">Balance : <span class="text-2xl"><?php echo ($card['balance'] > 0 ? $card['balance'] : '0.00') ;?> $</span>
              
            </h1>
            <a href="change_statut.php?cardID=<?php echo $card['id'] ?>"><button class="w-8 h-8 border-2  border-black rounded-full absolute top-1 right-1 cursor-pointer text-white text-xl font-bold pt-1 <?php if($card['statut']==='main') echo "bg-green-600"?>">
              <?php if($card['statut']==='main') echo "<i class='fi fi-br-check'></i>"?>
            </button></a>
            
          </div>
        </div>
        <?php } ?>
      </div>
      <button id="closeCardDisplayModal"
        class="text-xl border-2 pt-1 px-1 font-bold cursor-pointer absolute top-1 right-1 hover:bg-black hover:text-white"><i
          class="fi fi-sr-cross"></i></button>
    </div>

  </section>
  <section id="addRTModal"
    class="overlay w-full h-full fixed bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center"
    aria-hidden="true">
    <div class="w-[20%] py-4 bg-white rounded-md relative flex flex-col justify-center items-center">
      <button id="closeRTModal"
        class="text-xl border-2 pt-1 px-1 rounded-xs font-bold cursor-pointer hover:bg-black hover:text-white self-end mr-10"><i
          class="fi fi-sr-cross"></i></button>
      <form class="flex flex-col w-[80%] h-full gap-5" action="add_recurring_transaction.php" method="post">
        <label class="text-2xl font-bold" for="amount">Enter The Amount :</label>
        <input class="text-xl bg-[#e2e2e2] py-2 pl-2 rounded-md" type="number" name="amount" step="0.01"
          placeholder="Amount">
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
  <section id="RTDisplayModal" class="overlay fixed bg-black/20 backdrop-filter backdrop-blur-xs w-full h-full hidden items-center justify-center" aria-hidden="true" >
                  <div class="w-200 h-150 bg-white rounded-md flex flex-col items-center justify-center gap-5">
                    <div class="w-full h-10 flex items-center justify-between px-10 ">
                      <h1 class="text-4xl font-bold self-start">Reccuring Transactions :</h1>
                      <button id="closeRTDModal"
        class="text-xl border-2 pt-1 px-1 rounded-xs font-bold cursor-pointer hover:bg-black hover:text-white "><i
          class="fi fi-sr-cross"></i></button>
                    </div>
                    <div class="w-180 h-120 bg-[#e5e5e5] rounded-md">
                        <div class="w-full grid grid-cols-3 bg-white">
                          <div class="flex justify-center border"><h1 class="text-2xl font-bold">Amount</h1></div>
                          <div class="flex justify-center border border-l-0"><h1 class="text-2xl font-bold">Type</h1></div>
                          <div class="flex justify-center border border-l-0"><h1 class="text-2xl font-bold">Category</h1></div>
                        </div>
                        <div class="w-full h-full flex flex-col gap-2 overflow-auto [scrollbar-width:none] pt-2 px-1">
                      <?php
                      $pdo = $conn->query("SELECT * FROM recurring_transactions r WHERE r.user_ID = {$_SESSION['userID']}");
                      $results = $pdo->fetchAll(PDO::FETCH_ASSOC);
                      if($results){
                        foreach($results as $result){
                          ?>
                            <div class="w-full grid grid-cols-3 bg-white py-2">
                              <div>
                                <h1 class="text-xl font-bold flex justify-center"><?= $result['amount'] ?> $</h1>
                              </div>
                              <div>
                                <h1 class="text-xl font-bold flex justify-center"><?= $result['type'] ?></h1>
                              </div>
                              <div>
                                <h1 class="text-xl font-bold flex justify-center"><?= $result['category'] ?></h1>
                              </div>
                            </div>
                          <?php
                        }
                      }
                    ?>
                    </div>
                    </div>
                    
                  </div>
  </section>
  <script src="script.js"></script>
</body>

</html>