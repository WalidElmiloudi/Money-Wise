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
  <title>MONEYWISE-FINANCE TRACKER | DASHBOARD PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="w-full h-screen flex flex-col bg-slate-100 font-['open_sans']">
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
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="incomes.php">Incomes</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="expences.php">Expences</a></h1>
      </div>
    </div>
  </section>
  <main class="w-full h-full flex flex-col gap-2 relative">
    <div class="border-2 2xl:border-4 bg-white w-10 h-10 2xl:w-15 2xl:h-15 flex justify-center items-center rounded-full absolute right-2 top-0 xl:right-4 xl:top-2" title="Download as pdf">
      <a href="dashboard-pdf.php"><i class="fi fi-br-download text-xl 2xl:text-3xl"></i></a>
    </div>
    <h1 class="text-4xl font-bold text-[#021c3b] pl-2 xl:hidden">Dashboard</h1>
    <div class="w-full h-full grid grid-cols-2 xl:grid-cols-14 grid-rows-8 gap-2 px-2">
      <div class="xl:order-1 hidden xl:flex col-span-3 row-span-8 bg-white shadow-md rounded-md">
        <div class="w-full h-full flex flex-col justify-center gap-10 pl-10">
          <div class="w-full flex flex-col pl-4 gap-2">
        <h1 class="text-3xl font-bold"><?= $_SESSION['username'] ?></h1>
        <hr class="w-45 border-2">
        <div class="w-full flex justify-between items-center pr-5">
          <h1 class="text-2xl font-bold">ID : <?= $_SESSION['userID'] ?></h1>
          <button class="py-1 px-1 border cursor-pointer" onclick="copyTextToClipboard('<?= $_SESSION['userID'] ?>')"><i class="fi fi-rs-copy-alt"></i></button>
        </div>
        
      </div>
          <h1 class=" text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="home.php">Home</a></h1>
          <h1 class=" text-4xl font-bold text-white py-2 px-4 w-fit bg-gray-800 rounded-full"><a href="#">Dashboard</a></h1>
          <div class="w-full">
          <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="cards.php">Payements</a></h1>
        <div class="hidden flex-col h-full items-start gap-2 py-2">
          <h2 class=" text-2xl font-bold text-gray-500  px-4 py-2 w-fit   hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="incomes.php"> Incomes</a></h2>
          <h2 class=" text-2xl font-bold text-gray-500   px-4 py-2 w-fit  hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white ml-10"><a href="expences.php"> Expences</a></h2>
        </div>
        </div>
        <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="transactions.php">Transactions</a></h1>
 <hr class="w-50 border-2">
      <h1 class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer"><i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a></h1>        </div>
      </div>
      <div class="xl:order-2 col-span-1 xl:col-span-4 xl:row-span-2 row-span-2 bg-white shadow-md rounded-md flex justify-center items-center">
          <?php
              $totalIncomes      = 0;
              $_SESSION['monthTotalIncomes'] = 0;
              $monthResult       = $conn->query("SELECT sum(i.montant) AS total , i.date FROM incomes i LEFT JOIN cards c ON i.card_id = c.id WHERE c.user_id = {$_SESSION['userID']} AND MONTH(i.date) = MONTH(CURDATE()) AND YEAR(i.date) = YEAR(CURDATE())");
              if ($monthResult) {
                  $amount            = $monthResult->fetch(PDO::FETCH_ASSOC);
                  $_SESSION['monthTotalIncomes'] = $amount['total']>0 ? $amount['total']:0;
              }
              $result = $conn->query("SELECT SUM(montant) AS total FROM incomes i LEFT JOIN cards c ON i.card_id = c.id WHERE c.user_id = {$_SESSION['userID']}");

              if ($result) {
                  $amount       = $result->fetch(PDO::FETCH_ASSOC);
                  $_SESSION['totalIncomes'] = $amount['total'];
              ?>
                  <div class  = "w-full h-full bg-white  rounded-md flex flex-col justify-around pl-4" >
                  <h1 class   = "text-2xl xl:text-4xl font-bold text-[#021c3b]">Total Incomes:  </h1>
                  <h1 class   = "text-xl xl:text-3xl 2xl:text-4xl font-bold text-green-600" ><?php echo ($amount['total']>0 ? $amount['total'] : 0) ?> $ </h1>
                  </div >
               <?php
                   }

               ?>
      </div>
      <div class="xl:order-3 col-span-1 row-span-2 xl:col-span-4 xl:row-span-2 bg-white shadow-md rounded-md">

              <?php
                  $result             = $conn->query("SELECT sum(e.montant) AS total , e.date FROM expences e LEFT JOIN cards c ON e.card_id = c.id WHERE c.user_id = {$_SESSION['userID']}");
                  $totalExpences      = 0;
                  $_SESSION['monthTotalExpences'] = 0;
                  $monthResult        = $conn->query("SELECT sum(e.montant) AS total , e.date FROM expences e LEFT JOIN cards c ON e.card_id = c.id WHERE c.user_id = {$_SESSION['userID']}  AND MONTH(e.date) = MONTH(CURDATE()) AND YEAR(e.date) = YEAR(CURDATE())");
                  if ($monthResult) {
                      $amount             = $monthResult->fetch(PDO::FETCH_ASSOC);
                      $_SESSION['monthTotalExpences'] = $amount['total']>0 ? $amount['total']:0;
                  }
                  if ($result) {
                      $amount        = $result->fetch(PDO::FETCH_ASSOC);
                      $_SESSION['totalExpences'] = $amount['total'];
                  ?>
                  <div class  = "w-full h-full bg-white  rounded-md flex flex-col justify-around pl-4" >
                  <h1 class   = "text-2xl xl:text-4xl font-bold text-[#021c3b]">Total Expences:  </h1>
                  <h1 class   = "text-xl xl:text-3xl 2xl:text-4xl  font-bold text-red-600 pl-5" ><?php echo ($amount['total']>0 ? $amount['total'] : 0) ?> $ </h1>
                  </div >
               <?php
                   }
                   $_SESSION['balance'] = $_SESSION['totalIncomes'] - $_SESSION['totalExpences'];
               ?>

      </div>
      <div class="xl:order-5 col-span-2 xl:row-span-6 xl:col-span-8 row-span-2 bg-white shadow-md rounded-md">
        <div class="w-full h-full px-4 flex justify-center items-center">
    <canvas class="bg-white rounded-md w-full h-full" id="myChart"></canvas>
</div>

      </div>
      <div class="xl:order-4 col-span-2 xl:col-span-3 xl:row-span-8 row-span-4 bg-slate-200 shadow-md rounded-md grid grid-rows-3 gap-2">
        <div class="col-span-1  rounded-lg bg-white flex flex-col justify-evenly pl-4">
            <h1 class="text-[#021c3b] text-2xl xl:text-3xl 2xl:text-5xl font-bold">Balance :</h1>
            <h2 class="text-[#021c3b] text-3xl xl:text-4xl 2xl:text-5xl font-bold"><?php echo $_SESSION['balance']; ?> $</h2>
        </div>
        <div class="col-span-1   rounded-lg bg-white flex flex-col justify-evenly pl-4">
          <h1 class="text-[#021c3b] text-2xl 2xl:text-4xl font-bold">Month Incomes :</h1>
            <h2 class="text-green-600 text-3xl xl:text-4xl 2xl:text-5xl font-bold"><?php echo $_SESSION['monthTotalIncomes']; ?> $</h2>
        </div>
        <div class="col-span-1  rounded-lg bg-white flex flex-col justify-evenly pl-4">
          <h1 class="text-[#021c3b] text-2xl 2xl:text-4xl font-bold">Month Expences :</h1>
            <h2 class="text-red-600 text-3xl xl:text-4xl 2xl:text-5xl font-bold"><?php echo $_SESSION['monthTotalExpences']; ?> $</h2>
        </div>
      </div>
    </div>
  </main>
  <?php
$monthlyIncomes = [];
$monthlyExpences = [];

for ($m = 1; $m <= 12; $m++) {
    $resIncome = $conn->query("SELECT SUM(montant) AS total FROM incomes i LEFT JOIN cards c ON i.card_id = c.id WHERE c.user_id = {$_SESSION['userID']}  AND MONTH(date)=$m AND YEAR(date)=YEAR(CURDATE())");
    $income = $resIncome->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    $monthlyIncomes[] = $income;

    $resExpence = $conn->query("SELECT SUM(montant) AS total FROM expences e LEFT JOIN cards c ON e.card_id = c.id WHERE c.user_id = {$_SESSION['userID']} AND MONTH(date)=$m AND YEAR(date)=YEAR(CURDATE())");
    $expense = $resExpence->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    $monthlyExpences[] = $expense;
}
?>

  <script>
const monthlyIncomes = <?php echo json_encode($monthlyIncomes); ?>;
const monthlyExpences = <?php echo json_encode($monthlyExpences); ?>;

const ctx = document.getElementById('myChart').getContext('2d');


new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          'Jan','Feb','Mar','Apr','May','Jun',
          'Jul','Aug','Sep','Oct','Nov','Dec'
        ],
        datasets: [
            {
                label: 'Monthly Incomes',
                data: monthlyIncomes,
                borderColor: 'green',
                backgroundColor: 'rgba(0, 128, 0, 0.2)',
                borderWidth: 2,
                tension: 0.3
            },
            {
                label: 'Monthly Expenses',
                data: monthlyExpences,
                borderColor: 'red',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderWidth: 2,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: 'Income vs Expense (12 Months)'
            }
        }
    }
});

</script>


  <script src="script.js"></script>
</body>