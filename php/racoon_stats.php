<?php
    session_start();
    if (!isset($_SESSION["logged"]) || !isset($_SESSION["login"]) || !isset($_SESSION["id"])) {
        header("Location: login.php");
    }

    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    if (!isset($_GET['class']) || $_GET['class'] !== "Archer" || $_GET['class'] !== "Barbarian" || $_GET['class'] !== "Archer" || $_GET['class'] !== "Archer" || $_GET['class'] !== "Archer") {
        header("Location: login.php");
    }

    $racoonClass = $_SESSION['class'] = $_GET['class'];
    function racoon() {
        global $conn;

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$racoonClass?> | Racoon Forest</title>
    <link rel="stylesheet" href="../css/racoon_stats.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div id="class">
        <h1><?=$racoonClass?></h1>
        <img src="../img/racoon/<?=$racoonClass?>.jpeg" alt="<?=$racoonClass?>">
    </div>
    <main>
        <form method="post">

        </form>
    </main>
</body>
</html>