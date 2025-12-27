<?php

require 'config.php';
$category = $_POST['category'];
$date     = $_POST['date'];
$table    = $_GET['target'];
$userID = $_SESSION['userID'];

$_SESSION['category'] = $category;
$_SESSION['date'] = $date;

$_SESSION['filteredArray'] = [];

if ($category != "All") {
    if ($date != "All") {
        switch ($date) {
            case "CURMONTH":$date = date('m');
            $currentYear = date('Y');
                           $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID AND category = '$category' AND (MONTH(t.date) = $date AND YEAR(t.date) = $currentYear) AND c.statut='main'");
                        $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "LASMONTH":$date = (date('m') == 01?12:date('m')-1);
            $currentYear = ($date == 12?date('Y')-1:date('Y'));
                           $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID AND category = '$category' AND (MONTH(t.date) = $date AND YEAR(t.date) = $currentYear) AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "CURYEAR":$date = date('Y');
                                   $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID AND category = '$category' AND YEAR(t.date) = $date AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "LASYEAR":$date = date('Y')-1;
                                   $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID AND category = '$category' AND YEAR(t.date) = $date AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
        }
    } else{
       $result = $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID AND category = '$category' AND c.statut='main'");
      $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
    }

} else {
    if ($date != "All") {
        switch ($date) {
            case "CURMONTH":$date = date('m');
            $currentYear = date('Y');
                           $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID  AND (MONTH(t.date) = $date AND YEAR(t.date) = $currentYear) AND c.statut='main'");
                        $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "LASMONTH":$date = (date('m') == 01?12:date('m')-1);
            $currentYear = ($date == 12?date('Y')-1:date('Y'));
                           $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID  AND (MONTH(t.date) = $date AND YEAR(t.date) = $currentYear) AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "CURYEAR":$date = date('Y');
                                   $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID  AND YEAR(t.date) = $date AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
            case "LASYEAR":$date = date('Y')-1;
                                   $result= $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID  AND YEAR(t.date) = $date AND c.statut='main'");
                $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
                break;
        }
    } else{
       $result = $conn->query("SELECT * FROM $table t  join cards c on t.card_id = c.id WHERE c.user_id = $userID  AND c.statut='main'");
      $_SESSION['filteredArray']=$result->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
header("Location: $table.php");
exit;
?>