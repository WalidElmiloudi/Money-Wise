
<?php

require 'config.php';
if(!$_SESSION['userID']){
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
  <main class="w-full h-full flex flex-col xl:flex-row gap-4 items-center">
    <div class="hidden w-[20%] bg-white h-full xl:flex flex-col justify-center gap-10 pl-4">
      <div class="w-full flex flex-col pl-4 gap-2">
        <h1 class="text-3xl font-bold"><?= $_SESSION['username'] ?></h1>
        <hr class="w-45 border-2">
        <div class="w-full flex justify-between items-center pr-5">
          <h1 class="text-2xl font-bold">ID : <?= $_SESSION['userID'] ?></h1>
          <button class="py-1 px-1 border cursor-pointer" onclick="copyTextToClipboard('<?= $_SESSION['userID'] ?>')"><i class="fi fi-rs-copy-alt"></i></button>
        </div>
        
      </div>
      <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="home.php">Home</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="dashboard.php">Dashboard</a></h1>
        <div class="w-full">
          <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="cards.php">Payements</a></h1>
        <div class="hidden flex-col h-full items-start gap-2 py-2">
          <h2 class=" text-2xl font-bold text-gray-500  px-4 py-2 w-fit   hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="incomes.php"> Incomes</a></h2>
          <h2 class=" text-2xl font-bold text-gray-500   px-4 py-2 w-fit  hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="expences.php"> Expences</a></h2>
        </div>
    </div>
<h1 class="text-4xl font-bold text-white bg-gray-800 rounded-full py-2 px-4 w-fit"><a href="#">Transactions</a></h1>
 <hr class="w-50 border-2">
      <h1 class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer"><i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a></h1>    </div>
    <div class="w-full h-full xl:py-1 flex flex-col items-center gap-4">
      <h1 class="text-5xl font-bold text-[#021c3b] pl-17 self-start">Transactions :</h1>
      <div class="w-[90%] h-[90%] bg-white rounded-md flex flex-col justify-center items-center gap-5">
        <div class="w-[90%] h-[80%] bg-[#e5e5e5] rounded-md flex flex-col items-center">
            <div class="w-full h-10 grid grid-cols-10 bg-white">
                <div class="border col-span-2 flex justify-center items-center"><h1 class="text-xl font-bold">Transaction ID</h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold">FROM</h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold">TO</h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold">Amount</h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold">Transaction Date</h1></div>
            </div>
            <div class="w-full h-full flex flex-col overflow-auto [scrollbar-width:none]">
              <?php

              $pdo = $conn->query("SELECT * FROM transactions t WHERE t.sender_id = {$_SESSION['userID']} OR t.reciever_id = {$_SESSION['userID']}");
              $results = $pdo->fetchAll(PDO::FETCH_ASSOC);
              if($results){
                foreach($results as $transaction){
                  $pdo = $conn->query("SELECT * FROM users u WHERE u.id = {$transaction['sender_id']}");
                  $sender = $pdo->fetch(PDO::FETCH_ASSOC);
                  $pdo = $conn->query("SELECT * FROM users u WHERE u.id = {$transaction['reciever_id']}");
                  $reciever = $pdo->fetch(PDO::FETCH_ASSOC);
                  ?>

                  <div class="w-full h-10 grid grid-cols-10 bg-white">
                <div class="border col-span-2 flex justify-center items-center"><h1 class="text-xl font-bold"><?= $transaction['id'] ?></h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold"><?php echo $sender['name'] === $_SESSION['username']?'You': $sender['name']?></h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold"><?php echo $reciever['name'] === $_SESSION['username']?'You': $reciever['name']?></h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold"><?= $transaction['amount'] ?> $</h1></div>
                <div class="border flex justify-center items-center col-span-2"><h1 class="text-xl font-bold"><?= $transaction['date'] ?></h1></div>
            </div>

                  <?php
                }
              }?>
            </div>
        </div>
        <button id="openChooseToModal" class="py-4 w-[90%] bg-black text-white text-4xl font-bold rounded-md cursor-pointer">Make A Transaction</button>
      </div>
    </div>
  </main>
  <?php
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  ?>
  <section id="chooseToModal" class="overlay fixed bg-black/20 backdrop-filter backdrop-blur-xs w-full h-full hidden justify-center items-center" aria-hidden="true">
    <div class="w-[60%] h-[75%] bg-white rounded-md flex flex-col items-center justify-center gap-5 relative">
     <form id="searchForm" class="w-full flex justify-between px-14 items-center">
      <input class="w-200 py-2 pl-2 border border-black bg-[#f4f3f3] rounded-md text-2xl font-bold" type="search" name="user_info" placeholder = "Enter Reciever Full Name Or ID">
      <button class="py-2 px-4 bg-black text-white rounded-md text-2xl font-bold cursor-pointer" type="submit">SEARCH</button>
     </form>
     <div class="w-[90%] h-[80%] bg-[#e5e5e5] rounded-md">
        <div class="w-full h-10 bg-white grid grid-cols-4">
          <div class="col-span-1 border border-r-0 flex justify-center items-center"><h1 class="text-2xl font-bold">ID</h1></div>
          <div class="col-span-2 border flex justify-center items-center"><h1 class="text-2xl font-bold">NAME</h1></div>
          <div class="col-span-1 border flex justify-center items-center"><h1 class="text-2xl font-bold"></h1></div>
        </div>
        <div id="resultsContainer" class="w-full h-full overflow-auto [scrollbar-width:none]">
        </div>
     </div>
     <button id="closeChooseToModal" class="text-2xl font-bold py-1 px-2 border-2 absolute top-1 right-1 cursor-pointer hover:bg-black hover:text-white">X</button>
    </div>
  </section>
  <div id="toatContainer" class="fixed w-80 right-0 h-full lex flex-col pt-2">
                    
    </div>
  <?php
  if(isset($_SESSION['message'])){
    ?>
    <script>
    function toast(message,color){
      const toastContainer = document.getElementById("toatContainer");
      const toast = document.createElement("div");
      toast.innerHTML = `
      <div class="w-[90%] h-20 rounded-md ${color} flex items-center p-2 shadow-lg">
                      <h1 class="text-white text-xl font-bold">
    ${message}
                      </h1>
                    </div>
      `;
      toastContainer.appendChild(toast);
      setTimeout(() => {
        toastContainer.removeChild(toast);
      },3000);
    }
    <?php
    foreach($_SESSION['message'] as $message){
    ?>
    toast("<?= $message['text']?>","<?= $message['color']?>");
    <?php
    }
    ?>
  </script>
  <?php
  unset($_SESSION['message']);
  }
  ?>
  <script> const csrfToken = "<?= $_SESSION['csrf_token']  ?>"; </script>
  <script src="script.js"></script>
</body>