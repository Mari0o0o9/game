<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    function login() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $pass = $_POST['password'];

            $sql_login = "SELECT *
                        FROM user
                        WHERE login = '$login'";
            $result_login = $conn -> query($sql_login);

            if (($row = $result_login -> fetch_assoc()) && password_verify($pass, $row['password'])) {
                $_SESSION["logged"] = true;
                $_SESSION["login"] = $login;
                $_SESSION["id"] = $row['id'];

                return htmlspecialchars("Zalogowano pomyślnie." . header("refresh:1.5; url=racoon.php"));
                exit();
            } else {
                return "Nieprawidłowy login lub hasło.";
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Racoon Forest</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <main>
        <h1>Logowanie</h1>
        <a href="../php/register.php" id="back">
            <input type="button" value="Rejestracja">
        </a>
        <a href="../php/reset_password.php" id="reset">
            <input type="button" value="Zmiana hasła">
        </a>
        <form method="post">
            <p>
                <label for="login" class="material-symbols-outlined">person</label>
                <input type="text" name="login" id="login" placeholder="Podaj Login..." required>
            </p>
            <p>
                <label for="password" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password" id="password" class="pass" placeholder="Podaj Hasło..." required>
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <input type="submit" value="Zaloguj się">
            </p>
            <p id="value"><?=login();?></p>
        </form>
    </main>
<script src="../js/password.js"></script>
</body>
</html>
<?php $conn -> close();?>