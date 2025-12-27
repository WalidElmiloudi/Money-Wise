<?php
require 'config.php';

$user_info = $_POST['user_info'];
$userID = $_SESSION['userID'];

if(is_numeric($user_info)){
$pdo = $conn->prepare("SELECT * FROM users u WHERE u.id = :user_id AND u.id != $userID");
$pdo->execute([
  ':user_id' => $user_info,
]);
$results = $pdo->fetchAll(PDO::FETCH_ASSOC);
} else{
  $pdo = $conn->prepare("SELECT * FROM users u WHERE u.name = :user_name AND u.name != '{$_SESSION['username']}'");
  $pdo->execute([
  ':user_name' => $user_info,
]);
$results = $pdo->fetchAll(PDO::FETCH_ASSOC);
}


foreach($results as $user){
  ?>
  
  <div class="w-full h-10 bg-white grid grid-cols-4">
          <div class="col-span-1 border border-r-0 flex justify-center items-center"><h1 class="text-2xl font-bold"><?= $user['id'] ?></h1></div>
          <div class="col-span-2 border flex justify-center items-center"><h1 class="text-2xl font-bold"><?= $user['name'] ?></h1></div>
          <div class="col-span-1 border flex justify-center items-center"><button userId="<?= $user['id'] ?>" userName="<?= $user['name'] ?>" class="chooseBtn text-blue-600 text-2xl cursor-pointer hover:text-blue-900">Choose</button></div>
        </div>
  <?php
}
?>