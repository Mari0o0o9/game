<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    function register() {
        global $conn;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];

            $sql_login = "SELECT *
                            FROM user
                            WHERE login = '$login'";
            $result_login = $conn -> query($sql_login);

            $sql_email = "SELECT *
                            FROM user
                            WHERE email = '$email'";
            $result_email = $conn -> query($sql_email);

            if ($result_login -> num_rows > 0) {
                return "Taki login już istnieje.";
                exit();
            } elseif (!$email) {
                return "Niepoprawny adres e-mail.";
                exit();
            } elseif ($result_email -> num_rows > 0) {
                return "Taki e-mail już istnieje.";
                exit();
            } elseif ($pass1 !== $pass2) {
                return "Podane hasła różnią się.";
                exit();
            } else {
                $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
                $query = "INSERT INTO user (login, email, password) 
                            VALUES ('$login', '$email', '$hashedPassword')";

                if (!$conn -> query($query)) {
                    return "Wystąpił błąd. Spróbuj ponownie później.";
                    exit();
                } else {
                    $id = $conn -> insert_id;
                    $_SESSION["logged"] = true;
                    $_SESSION["login"] = $login;
                    $_SESSION["id"] = $id;
                    return htmlspecialchars("Utworzono konto." . header('refresh: 1.5; url=racoon.php'));
                    exit();
                }
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
        <h1>Rejestracja</h1>
        <a href="../php/login.php" id="back">
            <input type="button" value="Zaloguj się">
        </a>
        <form method="post">
            <p>
                <label for="login" class="material-symbols-outlined">person</label>
                <input type="text" name="login" id="login" placeholder="Podaj Login..." required>
            </p>
            <p>
                <label for="email" class="material-symbols-outlined">email</label>
                <input type="text" name="email" id="email" placeholder="Podaj Email..." required>
            </p>
            <p>
                <label for="password1" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password1" id="password1" class="pass" placeholder="Podaj Hasło..." minlength="8" required>
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <label for="password2" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password2" id="password2" class="pass" placeholder="Powtórz Hasło..." minlength="8" required>
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <input type="submit" value="Zarejestruj się">
            </p>
            <p id="value"><?=register()?></p>
        </form>
    </main>
<script src="../js/password.js"></script>
</body>
</html>
<?php $conn -> close();?>