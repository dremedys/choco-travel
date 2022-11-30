<?php
    session_start();
    require_once "db.php";
    $count_rows = 0;
    $empty= true;
    echo $_SESSION['flight_id']." ",  $_SESSION['user_id'] . " ", $_SESSION['price'] . " ", $_POST['card'] . " ";
    if(isset($_SESSION['flight_id']) && isset($_SESSION['price']) && isset($_SESSION['user_id']) && isset($_POST['card'])){
        mysqli_query($conn, "INSERT INTO tickets(flight_id, user_id, bonuses, card) VALUES ('".$_SESSION['flight_id']."', '" . $_SESSION['user_id'] . "', '" . ($_SESSION['price'])*0.05 ."', '" . $_POST['card'] . "')");
        mysqli_query($conn, "UPDATE flights SET seats_available=seats_available - 1 WHERE id='" . $_SESSION['flight_id'] . "'");
        $res = mysqli_query($conn, "SELECT * FROM tickets WHERE card='" . $_POST['card'] ."'");
        if(!empty($res)){
            $empty = false;
        }
    }
    // INSERT INTO `tickets` (`id`, `flight_id`, `user_id`, `bonuses`, `card`) VALUES ('2', '4', '3', '1000', '378282246310006')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles/common.css" rel="stylesheet"/>
    <link href="styles/payment.css" rel="stylesheet"/>
    
</head>
<body>
<div class="main-layout">
    <?php if($empty == false) :?>
        <div>
            Ваша карта и вы успешно купили билет 
            <?php
                echo $_POST['card']
            ?>
        </div>
    <?php else :?>
        <div>Что то пошло не так</div>
    <?php endif?>
</div>
<script src="./js/index.js"></script>
<script src="./js/main-layout.js"></script>
</body>
</html>