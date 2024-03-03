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
        <form method="post">
            <p>
                <label for="login" class="material-symbols-outlined">person</label>
                <input type="text" name="login" id="login" placeholder="Podaj Login...">
            </p>
            <p>
                <label for="password" class="material-symbols-outlined">password</label>
                <input type="password" name="password" id="password" placeholder="Podaj Hasło...">
            </p>
            <p>
                <input type="submit" value="Login">
            </p>
        </form>
    </main>
</body>
</html>