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
  <title>MONEYWISE-FINANCE TRACKER | EXPENCES PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
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
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="dashboard.php">Dashboard</a></h1>
        <h1 class=" text-4xl font-bold text-[#021c3b]"><a href="incomes.php">Incomes</a></h1>
      </div>
    </div>
  </section>
  <main id="expences" class="w-full h-full flex flex-col xl:flex-row  gap-4">
    <div class="hidden w-[30%] bg-white h-full xl:flex flex-col justify-center gap-8 pl-4">
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
        <h1 class=" text-4xl font-bold  px-4 py-2 w-fit text-white bg-gray-800 rounded-full"><a
            href="#.php">Payements</a></h1>
        <div class="flex flex-col h-full items-start gap-2 py-2">
          <h2
            class=" text-2xl font-bold text-gray-500 pl-10  px-4 py-2 w-fit  hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 ">
            <a href="cards.php"> Bank Cards</a>
          </h2>
          <h2
            class=" text-2xl font-bold text-gray-500 pl-10 px-4 py-2 w-fit   hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 ">
            <a href="incomes.php"> Incomes</a>
          </h2>
          <h2
            class="text-2xl font-bold   px-4 py-2 pl-10 w-fit   scale-110 text-gray-800 rounded-full">
            <a href="#"> Expences</a>
          </h2>
        </div>
      </div>
      <h1 class=" text-4xl font-bold text-[#021c3b]  px-4 py-2 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white"><a href="transactions.php">Transactions</a></h1>
 <hr class="w-50 border-2">
      <h1 class="text-4xl font-bold text-[#021c3b] py-2 px-4 w-fit hover:bg-gray-500 hover:scale-110 hover:text-gray-800 rounded-full ease-in-out duration-150 active:bg-gray-800 active:text-white flex items-center justify-center cursor-pointer"><i class="fi fi-rs-sign-out-alt"></i><a href="logout.php">LOGOUT</a></h1>    </div>
    <div class ="w-full h-full bg-[#f2f4f7] flex justify-center items-center">
       <div class = "w-[90%] h-[90%] bg-white rounded-lg flex flex-col justify-center gap-2 items-center p-4">
          <div class="w-full flex flex-row justify-between xl:px-10 2xl:px-0">
          <h1 class="text-3xl  xl:text-4xl text-[#021c3b] font-bold self-start">Expences</h1>
           <div class="relative 2xl:hidden">
            <i id="sortBtn" class="fi fi-br-bars-sort"></i>
            <div id="sort" class="w-30 h-30 bg-gray-200 rounded-md shadow-lg absolute right-0 hidden">
                <form class="h-full flex flex-col justify-around items-center" action="sort.php?target=expences" method="post">
                  <label for="sort" class="text-base font-bold self-start pl-5">Sort By:</label>
                  <select name="sort" class="bg-white rounded-sm cursor-pointer text-[12px] w-20">
                    <option value="Amount">Amount</option>
                    <option value="Date">Date</option>
                  </select>
                  <button type="submit" class="py-1 px-2 w-10 bg-black text-white font-bold text-xs rounded-md cursor-pointer">Sort</button>
                </form>
            </div>
          </div>
          <div class="w-[50%] hidden 2xl:flex items-center px-10">
            <form class="w-full flex flex-row gap-2 items-center" action="sort.php?target=expences" method="post">
                  <label for="sort" class="text-xl font-bold self-start">Sort By:</label>
                  <select name="sort" class="bg-[#f2f4f7] rounded-sm cursor-pointer text-sm w-30">
                    <option value="Amount">Amount</option>
                    <option value="Date">Date</option>
                  </select>
                  <button type="submit" class="py-1 px-2 bg-black text-white font-bold text-base rounded-md cursor-pointer">Sort</button>
                </form>

            </form>
          </div>
          <div class="relative xl:hidden">
              <i id="filterBtn" class="fi fi-rr-filter"></i>
              <div id="filter" class="w-30 h-40 xl:w-50 xl:h-60 bg-gray-200 absolute right-0 rounded-md shadow-lg hidden">
   <form class="h-full flex flex-col gap-2 p-2 xl:justify-around" action="filter.php?target=expences" method = "post">
              <label for="category" class="text-xs font-bold xl:text-lg">Category :</label>
              <select class="bg-white rounded-sm cursor-pointer text-[12px]" name="category" id="categoryFilter">
                <option value="All" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "All" ? "selected" : "");}?>>All</option>
                <option value="Housing" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Housing" ? "selected" : "");}?>
                        title="Rent or mortgage payments, property taxes, and homeowner's or renter's insurance.">Housing</option>
                <option value="Utilities" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Utilities" ? "selected" : "");}?> title="Electricity, water, gas, internet, and phone bills.">Utilities</option>
                <option value="Food" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Food" ? "selected" : "");}?> title="Groceries and meals prepared at home.">Food</option>
                <option value="Transportation" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Transportation" ? "selected" : "");}?>
                        title="Car payments, fuel, public transit passes, maintenance, insurance, and parking fees.">
                          Transportation</option>
                <option value="Healthcare" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Healthcare" ? "selected" : "");}?>
                        title="Insurance premiums, out-of-pocket medical costs, prescriptions, and dental care.">Healthcare</option>
                <option value="Debt Payments" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Debt Payments" ? "selected" : "");}?> title="Student loans, credit card payments, and other loans.">Debt Payments</option>
                <option value="Personal Care" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Personal Care" ? "selected" : "");}?> title="Toiletries, haircuts, and grooming services.">Personal Care</option>
                <option value="Clothing" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Clothing" ? "selected" : "");}?> title="New apparel and shoes.">Clothing</option>
                <option value="Entertainment and Recreation" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Entertainment and Recreation" ? "selected" : "");}?> title="Streaming services, hobbies, movies, or dining out.">Entertainment and Recreation</option>
                <option value="Family and Pet Care" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Family and Pet Care" ? "selected" : "");}?> title="Childcare, pet food, and veterinary costs.">Family and Pet Care</option>
                <option value="Miscellaneous" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Miscellaneous" ? "selected" : "");}?> title="Gifts, travel, household supplies, and other irregular costs.">Miscellaneous</option>
                <option value="Other" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Other" ? "selected" : "");}?> title="Other causes of expence">Other</option>
              </select>
              <label for="date" class="text-xs font-bold xl:text-lg">Date :</label>
              <select class="bg-white rounded-sm cursor-pointer" name="date" id="dateFilter">
                <option value="All"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "All" ? "selected" : "");}?> >All</option>
                <option value="CURMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURMONTH" ? "selected" : "");}?>>This Month</option>
                <option value="LASMONTH"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASMONTH" ? "selected" : "");}?>>Last Month</option>
                <option value="CURYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURYEAR" ? "selected" : "");}?>>This Year</option>
                <option value="LASYEAR"<?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASYEAR" ? "selected" : "");}?>>Last Year</option>
              </select>
              <button type="submit" class="py-1 px-2 text-xs xl:text-base bg-blue-500 text-white font-bold rounded-md cursor-pointer">Apply</button>
            </form>
              </div>
          </div>
          <div class="hidden 2xl:flex w-full  flex-row items-center justify-end gap-2">
            <h1 class="text-xl font-bold">Filter : </h1>
            <form class="flex items-center gap-2" action="filter.php?target=expences" method = "post">
              <label for="category" class="text-lg font-bold">Category :</label>
              <select class="bg-[#f2f4f7] rounded-md cursor-pointer" name="category" id="categoryFilter">
                <option value="All" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "All" ? "selected" : "");}?>>All</option>
                <option value="Housing" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Housing" ? "selected" : "");}?>
                        title="Rent or mortgage payments, property taxes, and homeowner's or renter's insurance.">Housing</option>
                <option value="Utilities" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Utilities" ? "selected" : "");}?> title="Electricity, water, gas, internet, and phone bills.">Utilities</option>
                <option value="Food" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Food" ? "selected" : "");}?> title="Groceries and meals prepared at home.">Food</option>
                <option value="Transportation" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Transportation" ? "selected" : "");}?>
                        title="Car payments, fuel, public transit passes, maintenance, insurance, and parking fees.">
                          Transportation</option>
                <option value="Healthcare" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Healthcare" ? "selected" : "");}?>
                        title="Insurance premiums, out-of-pocket medical costs, prescriptions, and dental care.">Healthcare</option>
                <option value="Debt Payments" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Debt Payments" ? "selected" : "");}?> title="Student loans, credit card payments, and other loans.">Debt Payments</option>
                <option value="Personal Care" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Personal Care" ? "selected" : "");}?> title="Toiletries, haircuts, and grooming services.">Personal Care</option>
                <option value="Clothing" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Clothing" ? "selected" : "");}?> title="New apparel and shoes.">Clothing</option>
                <option value="Entertainment and Recreation" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Entertainment and Recreation" ? "selected" : "");}?> title="Streaming services, hobbies, movies, or dining out.">Entertainment and Recreation</option>
                <option value="Family and Pet Care" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Family and Pet Care" ? "selected" : "");}?> title="Childcare, pet food, and veterinary costs.">Family and Pet Care</option>
                <option value="Miscellaneous" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Miscellaneous" ? "selected" : "");}?> title="Gifts, travel, household supplies, and other irregular costs.">Miscellaneous</option>
                <option value="Other" <?php if (isset($_SESSION['category'])) {echo($_SESSION['category'] === "Other" ? "selected" : "");}?> title="Other causes of expence">Other</option>
              </select>
              <label for="date" class="text-lg font-bold">Date :</label>
              <select class="bg-[#f2f4f7] rounded-md cursor-pointer" name="date" id="dateFilter">
                <option value="All" <?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "All" ? "selected" : "");}?>>All</option>
                <option value="CURMONTH" <?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURMONTH" ? "selected" : "");}?>>This Month</option>
                <option value="LASMONTH" <?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASMONTH" ? "selected" : "");}?>>Last Month</option>
                <option value="CURYEAR" <?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "CURYEAR" ? "selected" : "");}?>>This Year</option>
                <option value="LASYEAR" <?php if (isset($_SESSION['date'])) {echo($_SESSION['date'] === "LASYEAR" ? "selected" : "");}?>>Last Year</option>
              </select>
              <button type="submit" class="py-1 px-2 bg-blue-500 text-white font-bold rounded-md cursor-pointer">Apply</button>
            </form>
          </div>
        </div>
          <div class="w-[90%]  h-[90%] flex flex-col items-center py-2 shadow-lg">
           <div class="w-full grid grid-cols-10 grid-rows-1">
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Amount</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Category</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Description</div>
            <div class="col-span-2 border-b border-r text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Registiration date</div>
            <div class="col-span-2 border-b text-[8px] 2xl:text-2xl text-center font-bold break-words xl:text-base py-2">Actions</div>
           </div>
           <div class="w-full h-full  overflow-scroll [scrollbar-width:none]">
                     <div class="w-full grid grid-cols-10 grid-rows-1 py-2 px-1 bg-[#f2f4f7]">
                       <?php $id     = 0;
                       if(isset($_SESSION['filteredArray'])){
                        foreach($_SESSION['filteredArray'] as $row){
                          
                      $id = $row['id'];
                  ?>
            <div class="col-span-2 text-green-600  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words"><?php echo $row['montant'] ?>$</div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex justify-center"><?php echo $row['category'] ?></div>
            <div class="col-span-2  text-[7px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words "><?php echo $row['description'] ?></div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex items-center justify-center"><?php echo $row['date'] ?></div>
            <div class="col-span-2  text-start font-bold border-b border-black  p-1 break-words flex justify-center xl:justify-around gap-1">
              <button id="btn" onclick="deleteModal(<?php echo $id ?>,'expences')"
            class=" text-red-500 font-bold text-[7px] xl:text-base 2xl:text-xl cursor-pointer">
            delete
        </button>
        <button onclick="editModal(<?php echo $id ?>,<?php echo $row['montant'] ?>,'<?php echo $row['description'] ?>','expences','<?php echo $row['category'] ?>')" class="text-green-500 font-bold text-[7px] xl:text-base 2xl:text-xl  cursor-pointer">
            edit
        </button>
            </div>
            <?php  
          }
            } else{        
              $result = $conn->query("SELECT e.* FROM expences e join cards c on e.card_id = c.id WHERE c.user_id = {$_SESSION['userID']} AND c.statut = 'main'");
                unset($_SESSION['backup']);
                  while ($expence = $result->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['backup'][] = $expence;
                      $id = $expence['id'];
                  ?>
            <div class="col-span-2 text-green-600  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words"><?php echo $expence['montant'] ?>$</div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex justify-center"><?php echo $expence['category'] ?></div>
            <div class="col-span-2  text-[7px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words "><?php echo $expence['description'] ?></div>
            <div class="col-span-2  text-[8px] xl:text-base 2xl:text-xl text-start font-bold border-b border-black  p-1 break-words flex items-center justify-center"><?php echo $expence['date'] ?></div>
            <div class="col-span-2  text-start font-bold border-b border-black  p-1 break-words flex justify-center xl:justify-around gap-1">
              <button id="btn" onclick="deleteModal(<?php echo $id ?>,'expences')"
            class=" text-red-500 font-bold text-[7px] xl:text-base 2xl:text-xl cursor-pointer">
            delete
        </button>
        <button onclick="editModal(<?php echo $id ?>,<?php echo $expence['montant'] ?>,'<?php echo $expence['description'] ?>','expences','<?php echo $row['category'] ?>')" class="text-green-500 font-bold text-[7px] xl:text-base 2xl:text-xl  cursor-pointer">
            edit
        </button>
            </div>
            <?php }
                }
                if(isset($_SESSION['filteredArray'])){
                  $_SESSION['backup'] = $_SESSION['filteredArray'];
                }
                unset($_SESSION['filteredArray']);
                 ?>
           </div>
          </div>
        </div>
        <div class="w-full flex justify-between px-16">
          <button id="addExpenceBtn" class="px-2 py-2 text-white font-bold text-xl bg-red-500 rounded-md xl:order-1 xl:text-2xl cursor-pointer">Add an
          expence</button>
          <button id="openCLModal" class="px-2 py-2 text-white font-bold text-xl bg-black rounded-md xl:order-1 xl:text-2xl cursor-pointer">Manage Category Limits</button>
        </div>
          
       </div>
       
    </div>
    <section id="expenceAddModal"
      class="overlay fixed w-full h-full bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center"
      aria-hidden="true">
      <div
        class="w-[80%] h-[60%] xl:w-[50%] 2xl:w-[40%] bg-slate-100 rounded-md shadow-xl flex items-center justify-center relative">
        <form class="flex flex-col w-full h-full items-center justify-center gap-3 2xl:gap-5" action="expenceHandler.php" method="post">
          <label for="amount" class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Amount
            :</label>
          <input class="py-2 pl-2 w-[80%] bg-white rounded-md" type="number" name="amount" id="amount" step="0.01"
            title="ex : x.xx">
          <label for="category"
            class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Category</label>
          <select class="py-2 pl-2 w-[80%] bg-white rounded-md" name="category" id="category">
            <option value="Housing"
              title="Rent or mortgage payments, property taxes, and homeowner's or renter's insurance.">Housing</option>
            <option value="Utilities" title="Electricity, water, gas, internet, and phone bills.">Utilities</option>
            <option value="Food" title="Groceries and meals prepared at home.">Food</option>
            <option value="Transportation"
              title="Car payments, fuel, public transit passes, maintenance, insurance, and parking fees.">
              Transportation
            </option>
            <option value="Healthcare"
              title="Insurance premiums, out-of-pocket medical costs, prescriptions, and dental care.">Healthcare
            </option>
            <option value="Debt Payments" title="Student loans, credit card payments, and other loans.">Debt Payments
            </option>
            <option value="Personal Care" title="Toiletries, haircuts, and grooming services.">Personal Care</option>
            <option value="Clothing" title="New apparel and shoes.">Clothing</option>
            <option value="Entertainment and Recreation" title="Streaming services, hobbies, movies, or dining out.">
              Entertainment and Recreation</option>
            <option value="Family and Pet Care" title="Childcare, pet food, and veterinary costs.">Family and Pet Care
            </option>
            <option value="Miscellaneous" title="Gifts, travel, household supplies, and other irregular costs.">
              Miscellaneous</option>
            <option value="Other" title="Other causes of expence">Other</option>
          </select>
          <label for="description"
            class="text-xl font-bold text-[#021c3b] self-start pl-8 xl:pl-16 2xl:pl-20">Description
            : </label>
          <textarea class="py-1 pl-2 w-[80%] h-40 bg-white resize-none rounded-md" name="description"
            id="description"></textarea>
          <button type="submit" class="py-1 px-2 bg-red-600 text-white rounded-md xl:text-xl font-bold cursor-pointer">ADD</button>
        </form>
        <button id="closeExpenceModal"
          class="w-10 h-10 bg-red-500 text-white text-xl font-bold rounded-full absolute -top-2 -right-2 xl:text-2xl cursor-pointer">X</button>
      </div>
    </section>
    <section id="categoryLimitsModal" class="overlay fixed w-full h-full bg-black/20 backdrop-filter backdrop-blur-xs hidden justify-center items-center" aria-hidden="true">
                <div class="w-180 h-150 bg-white rounded-md flex flex-col items-center pt-4 gap-4">
                  <div class="w-[90%] flex justify-between">
                    <h1 class="text-3xl font-bold">Category Limits</h1>
                    <button id="closeCLModal"
        class="text-xl border-2 pt-1 px-1 rounded-xs font-bold cursor-pointer hover:bg-black hover:text-white"><i
          class="fi fi-sr-cross"></i></button>
                  </div>
                  <div class="w-[90%] h-[80%] bg-[#e2e2e2] flex flex-col pt-2 items-center gap-2 overflow-y-auto [scrollbar-width:none] scroll-smooth rounded-md">
                    <?php

                    $pdo = $conn->query("SELECT * FROM category_limits c WHERE c.user_id = {$_SESSION['userID']} ");
                    $results = $pdo->fetchAll(PDO::FETCH_ASSOC);
                    foreach($results as $result){

                      ?>
                      <div class="w-[90%] h-15 shrink-0 bg-white rounded-md flex items-center  justify-around">
                         <h1 class="text-2xl font-bold">Category : <span class="text-base"><?= $result['category'] ?></span></h1>
                         <h1 class="text-2xl font-bold">Limit : <span class="text-green-400 text-base"><?= $result['limit_amount'] ?> $</span></h1>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                  <button id="addCategoryLimit" class="py-1 px-2 bg-black text-2xl text-white font-bold rounded-md cursor-pointer">+ Add Category Limit</button>
                </div>
                <div id="addCLModal" class="overlay w-full h-full bg-black/40 backdrop-filter backdrop-blur-xs fixed hidden justify-center items-center" aria-hidden="true">
                <div class="w-[30%] h-[40%] bg-white rounded-md flex flex-col items-center gap-4 py-3">
                  <div class="w-[85%] flex justify-between px-3">
                    <h1 class="text-3xl font-bold">Add Category Limit</h1>
                    <button id="closeaddCLModal"
        class="text-xl border-2 pt-1 px-1 rounded-xs font-bold cursor-pointer hover:bg-black hover:text-white"><i
          class="fi fi-sr-cross font-bold text-xl"></i></button>
                  </div>
                  <form class="flex flex-col w-[80%] gap-4" action="category_limit_handler.php" method="post">
                    <label class="text-2xl font-bold " for="Category">Choose Category :</label>
                    <select class="py-3 px-4 w-full bg-[#e9e9e9] rounded-md text-2xl" name="Category" id="category">
            <option value="Housing"
              title="Rent or mortgage payments, property taxes, and homeowner's or renter's insurance.">Housing</option>
            <option value="Utilities" title="Electricity, water, gas, internet, and phone bills.">Utilities</option>
            <option value="Food" title="Groceries and meals prepared at home.">Food</option>
            <option value="Transportation"
              title="Car payments, fuel, public transit passes, maintenance, insurance, and parking fees.">
              Transportation
            </option>
            <option value="Healthcare"
              title="Insurance premiums, out-of-pocket medical costs, prescriptions, and dental care.">Healthcare
            </option>
            <option value="Debt Payments" title="Student loans, credit card payments, and other loans.">Debt Payments
            </option>
            <option value="Personal Care" title="Toiletries, haircuts, and grooming services.">Personal Care</option>
            <option value="Clothing" title="New apparel and shoes.">Clothing</option>
            <option value="Entertainment and Recreation" title="Streaming services, hobbies, movies, or dining out.">
              Entertainment and Recreation</option>
            <option value="Family and Pet Care" title="Childcare, pet food, and veterinary costs.">Family and Pet Care
            </option>
            <option value="Miscellaneous" title="Gifts, travel, household supplies, and other irregular costs.">
              Miscellaneous</option>
            <option value="Other" title="Other causes of expence">Other</option>
          </select>
          <label class="text-2xl font-bold " for="limitAmount">Enter The Limit :</label>
          <input class="py-3 px-4 w-full bg-[#e9e9e9] rounded-md text-2xl" name="limitAmount" type="number" step="0.01" placeholder="Amount">
          <button class="py-2 text-3xl font-bold bg-black text-white rounded-md cursor-pointer" type="submit">ADD</button>
                  </form>
                </div>
                </div>
    </section>
  </main>
  <div id="toatContainer" class="fixed w-80 right-0 h-full lex flex-col pt-2">
                    
    </div>
  <?php
  if(isset($_SESSION['message'])){
    ?>
    <script>
    function toast(message){
      const toastContainer = document.getElementById("toatContainer");
      const toast = document.createElement("div");
      toast.innerHTML = `
      <div class="w-[90%] h-20 rounded-md bg-red-500 flex items-center p-2 shadow-lg">
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
    toast("<?= $_SESSION['message'] ?>");
  </script>
  <?php
  unset($_SESSION['message']);
  }
  ?>
  <script src="script.js"></script>
</body>
</html>