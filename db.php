<?php
    $servername = "localhost";
    $database = "web";
    $username = "assan";
    $password = "asd123";
    // Создаем соединение
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // mysqli_close($conn);
?>

