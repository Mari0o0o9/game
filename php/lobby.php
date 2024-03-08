<?php
    ob_start();
    session_start();

    if (!isset($_SESSION["logged"]) || !isset($_SESSION["login"]) || !isset($_SESSION["id"])) {
        header("Location: login.php");
        exit();
    }

    $conn = new mysqli("localhost", "root", "", "game");
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    function racoon() {
        global $conn;
        
        $user_id = $_SESSION['id'];
        $query = "SELECT *
                FROM racoon
                WHERE user_id = '$user_id'";

        if ($result = $conn -> query($query)) {
            while ($row = $result -> fetch_array()) {
                return "<a href='./game.php' class='racoon'>
                            <div>
                                <h4>Class: $row[racoon]</h4>
                                <h1>Name: $row[racoon_name]</h1>
                            </div>
                            <img src='../img/racoon/$row[racoon].jpeg' alt='$row[racoon]'>
                    </a>";
            }
        } else {
            return "Error: " . $query . "<br>" . $conn -> error;
        }        
    }

    function getLevelUpPoints() {
        global $conn;

        $user_id = $_SESSION['id'];
        $query = "SELECT racoon.*, racoon_stats.*
                    FROM racoon
                    JOIN racoon_stats ON racoon.id = racoon_stats.racoon_id
                    wHERE racoon.user_id = '$user_id'";

        if ($result = $conn -> query($query)) {
            while ($row = $result -> fetch_assoc()) {
                return "<div class='racoon_stats'>
                            <h2>Level: $row[level]</h2>
                            <h4>Health: $row[health]</h4>
                            <h4>Intelligence: $row[intelligence]</h4>
                            <h4>Strength: $row[strength]</h4>
                            <h4>Agility: $row[agility]</h4>
                            <h4>Mana: $row[mana]</h4>
                            <h4>Defense: $row[defense]</h4>
                        </div>";
            }
        } else  {
            die("Error: " . $query . "<br>" . $conn->error);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION["login"]?> | Racoon Forest</title>
    <link rel="stylesheet" href="../css/lobby.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div>
        <div>
            <h1>Witaj <?=$_SESSION["login"]?></h1>
        </div>
        <main>
            <?=racoon();?>
        </main>
    </div>
    <div id="info">
        <?=getLevelUpPoints();?>
    </div>
</body>
</html>
<?php
    $conn -> close();
    ob_end_flush();
?>