<?php
    session_start();
    require_once "db.php";
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }  
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password). "'");
        if(!empty($result)){
            // mysqli_query($conn, "UPDATE users SET logTime=NOW() WHERE email = '" . $email. "' and password = '" . md5($password). "'");
            // $result2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password). "'");
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['user_id'] = $row['uid'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                header("Location: index.php");
            }
        }
        else if(empty($result)){
            $error_message = "Incorrect Email or Password!!!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles/login.css" rel="stylesheet"/>
    <link href="styles/index.css" rel="stylesheet"/>
</head>
<body>
    <div class="main-layout_login">
        <img src="https://user.object.pscloud.io/oauth2/clients/images/1647348064/chocotravel_logo.svg"/>
        <div class="login">
            <h2 class="main-card__title">Вход по email</h2>
            <form class="login_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="login_inputs">
                    <input class="input-phone_number" name="email" type="email" placeholder="Введите email"/>
                    <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    <input class="input-phone_number" name="password" type="password" placeholder="Введите пароль"/>
                    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    <span class="text-danger"> 
                        <?php
                            if(isset($error_message)){
                                echo $error_message;
                            }
                        ?>
                    </span>
                </div>
                <div class="forgot_password">
                    <a>
                        Забыли пароль?
                    </a>
                </div>
                <div class="main-card__bottom-btn">
                    <input type="submit" name="login" value="Далее"/>
                    <a href="login-phone.html">
                        <button>
                            Войти по номеру
                        </button>
                    </a>
                </div>
            </form>
            <a href="registration.php">
                <button>
                    Зарегистрироваться
                </button>
            </a>
        </div>
    </div>
</body>
</html>