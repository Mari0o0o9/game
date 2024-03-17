<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    function reset_pass() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            $sql_email  = "SELECT * 
                            FROM user 
                            WHERE email='$email'";
            $result_email = $conn -> query($sql_email);

            if (!$email) {
                return "Incorrect email address.";
                exit();
            } elseif ($result_email -> num_rows == 0) {
                return "There is no such email.";
                exit();
            } elseif ($password1 !== $password2) {
                return "The passwords are not the same.";
                exit();
            } else {
                $pass_hash = password_hash($password1, PASSWORD_DEFAULT);

                $sql_update = "UPDATE user 
                                SET password = '$pass_hash' 
                                WHERE email = '$email'";
                if ($conn -> query($sql_update)) {
                    return "Password changed successfully." . header("refresh:1.5; url=login.php");
                    exit();
                } else {
                    return "An error occurred while changing your password.";
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
        <h1>Password change</h1>
        <a href="../php/login.php" id="back">
            <input type="button" value="Back">
        </a>
        <form method="post">
            <p>
                <label for="email" class="material-symbols-outlined">person</label>
                <input type="text" name="email" id="email" placeholder="Enter Email..." required>
            </p>
            <p>
                <label for="password1" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password1" id="password1" class="pass" placeholder="Enter the password..." required>
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <label for="password2" class="material-symbols-outlined labelPass">password</label>
                <input type="password" name="password2" id="password2" class="pass" placeholder="Repeat password..." required>
                <span class="material-symbols-outlined visPass">visibility_off</span>
            </p>
            <p>
                <input type="submit" value="Change Password">
            </p>
            <p id="value"><?=reset_pass();?></p>
        </form>
    </main>
<script src="../js/password.js"></script>
</body>
</html>
<?php $conn -> close();?>