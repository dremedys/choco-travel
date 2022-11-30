<?php
    session_start();
    require_once "db.php";
    $count_rows = 0;
    if(isset($_SESSION['flight_id'])){
        $flight = mysqli_query($conn, "SELECT * FROM flights WHERE id='" . $_SESSION['flight_id'] . "'");
        echo $_SESSION['flight_id'];
        try {
            $count_rows = (mysqli_num_rows($flight));
        } catch (\Throwable $th) {
            $count_rows = 0;
        }
    }
    function luhn_check($number) {
        $number=preg_replace('/\D/', '', $number);
        $number_length=strlen($number);
        $parity=$number_length % 2;
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
            $digit=$number[$i];
            if ($i % 2 == $parity) {
                $digit*=2;
                if ($digit > 9) {
                    $digit-=9;
                }
            }
            $total+=$digit;
        }
        return ($total % 10 == 0) ? TRUE : FALSE;
    }
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

    <?php if($count_rows != 0) : ?>
        <?php foreach($flight as $fl):?>
            <div class="">
                <p><?php
                    $company = mysqli_query($conn, "SELECT * FROM companies WHERE id='" . $fl['company_id'] . "'");
                    $cnt_company = 0;
                    try {
                        $cnt_company = (mysqli_num_rows($company));
                    } catch (\Throwable $th) {
                        $cnt_company = 0;
                    }
                    if($cnt_company != 0){
                        foreach($company as $cp){
                            echo $cp['name'];
                        }
                    }
                ?></p>
                <p>Цена <?php
                    $_SESSION['price'] = $fl['price'];
                    echo $fl['price']
                ?> KZT</p>
                <div>
                    <?php
                        $firstName = mysqli_query($conn, "SELECT * FROM cities WHERE id='" . $fl['from_id'] . "'");
                        $secondName = mysqli_query($conn, "SELECT * FROM cities WHERE id='" . $fl['to_id'] . "'");
                        $cnt_first = 0;
                        $cnt_second = 0;
                        try {
                            $cnt_first = (mysqli_num_rows($firstName));
                            $cnt_second = (mysqli_num_rows($secondName));
                        } catch (\Throwable $th) {
                            $cnt_first = 0;
                            $cnt_second = 0;
                        }
                        if($cnt_first != 0 && $cnt_second != 0){
                            foreach($firstName as $fs){
                                echo "<div>".$fs["name"]."</div><br/>";
                            }
                            foreach($secondName as $ss){
                                echo "<div>".$ss["name"]."</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif ?>
    <div>
        <form action="tickets.php" method="POST">
            <label>
                Credit Card
                <input
                    id="card"
                    name="card"
                    type="text"
                    placeholder="Введите карту"
                />
                <p id="isValid" name="valid"></p>
            </label>
            <input 
                type="submit" 
                value="Отправить"
            />
        </form>
    </div>
</div>
<script>
    const card = document.getElementById("card");
    let s = '';
    let s2 = '';
    const change = card.addEventListener('change', (e) => {
        s = e.target.value;
        console.log(s);
        creditCardValidation(s);
    });

    setInterval(() => {
        s2 = s;
        console.log(s2 === s);
    }, 3000);
    setInterval(() => {
        if(s2 === s){
            window.location.reload();
        }
    }, (60000));

    function creditCardValidation(creditCradNum)
    {
        let checksum = 0; // running checksum total
        let j = 1; // takes value of 1 or 2

        for (let i = creditCradNum.length - 1; i >= 0; i--) {
            let calc = 0;
            calc = Number(creditCradNum.charAt(i)) * j;
            if (calc > 9) {
                checksum = checksum + 1;
                calc = calc - 10;
            }
            checksum = checksum + calc;
            if (j == 1) {
                j = 2;
            } else {
                j = 1;
            }
        }
    
        //Check if it is divisible by 10 or not.
        if(checksum % 10 == 0){
            document.getElementById("isValid").innerHTML="invalid";
            return false;
        }else {
            const regexp = /^(?:(4[0-9]{12}(?:[0-9]{3})?)|(5[1-5][0-9]{14})|(6(?:011|5[0-9]{2})[0-9]{12})|(3[47][0-9]{13})|(3(?:0[0-5]|[68][0-9])[0-9]{11})|((?:2131|1800|35[0-9]{3})[0-9]{11}))$/;
            var isValid = false;

            if (regexp.test(creditCradNum)) {
                console.log("asda")
                document.getElementById("isValid").innerHTML="valid";
                isValid = true;
                return true;
            }
            document.getElementById("isValid").innerHTML="invalid";
            return false;
        }
    }



</script>
<script src="./js/index.js"></script>
<script src="./js/main-layout.js"></script>
</body>
</html>