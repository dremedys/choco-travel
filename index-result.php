<?php
    session_start();
    require_once "db.php";
    $count_rows = 0;
    $wasBefore = false;
    if(isset($_POST['flight_date']) && date($_POST['flight_date']) >= date("Y-m-d H:i:s")){
        if(isset($_POST['from'])){
            // echo $_POST['from'] . " ", $_POST['to'] . " ", $_POST['type'] . " ", $_POST['flight_date'] . " \n";
            $year = date("Y", strtotime($_POST['flight_date']));
            $month = date("m", strtotime($_POST['flight_date']));
            $day = date("d", strtotime($_POST['flight_date']));
            $strDate = $year . "-" . $month . "-" . $day;
            $results = mysqli_query($conn, "SELECT * from flights where from_id='" . $_POST['from'] . "' and to_id='" . $_POST['to']. "' and flight_date >='" . $strDate . "' and flight_date >= NOW()");
            try {
                $count_rows = (mysqli_num_rows($results));
            } catch (\Throwable $th) {
                $count_rows = 0;
            }
        }
    }
    else {
        $wasBefore = true;
        echo $wasBefore;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choco travel results</title>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles/common.css" rel="stylesheet"/>
    <link href="styles/index.css" rel="stylesheet"/>
    <link href="styles/index-result.css" rel="stylesheet"/>
</head>
<body>
<div class="main-layout">
    <div class="container">
        <?php if ($count_rows != 0) : ?>
            <?php foreach($results as $result) : ?>
                <div class="card">
                    <div class="card__content">
                        <input name="id" disabled value="<?php echo 'Индекс ' . $result['id'] ?>"/>
                        <span><?php echo $result['company_id'] ?></span>
                        <div class="kind">Прямой</div>
                        <div class="time">
                            <?php
                                $seconds = substr($result['durationTime'], -2);
                                $minutes = substr($result['durationTime'], 3, 2);
                                $hours = substr($result['durationTime'], 0, 2);
                                echo $hours . "ч " . $minutes . "мин " . $seconds . "с ";
                            ?>
                        </div>
                        <a href="payment.php" onclick="<?php
                            $_SESSION['flight_id'] = $result['id'];
                        ?>" >Купить за <?php echo $result['price']?> KZT</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div>
                <p>
                    <?php
                        echo "Нет рейсов";
                    ?>
                </p>
            </div>
        <?php endif ?>
    </div>
</div>
<script src="./js/main-layout.js"></script>
</body>
</html>