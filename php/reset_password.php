<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    function reset() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
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
        <h1>Zmiana Hasła</h1>
        <a href="../php/login.php" id="back">
            <input type="button" value="Wróć">
        </a>
        <form method="post">
            <p>
                <label for="email" class="material-symbols-outlined">person</label>
                <input type="text" name="email" id="email" placeholder="Podaj Email...">
            </p>
            <p>
                <label for="password1" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password1" id="password1" class="pass" placeholder="Podaj Hasło...">
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <label for="password2" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password2" id="password2" class="pass" placeholder="Powtórz Hasło...">
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <input type="submit" value="Zmień Hasło">
            </p>
            <p id="value"></p>
        </form>
    </main>
<script src="../js/password.js"></script>
</body>
</html>