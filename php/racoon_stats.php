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

    if (!isset($_GET['class']) || !in_array($_GET['class'], ["Archer", "Barbarian", "Knight", "Paladin", "Thief", "Wizard"])) {
        header("Location: login.php");
        exit();
    }
    
    $racoonClass = $_GET['class'];
    $_SESSION['class'] = $racoonClass;

    function racoon() {
        global $conn;
        global $racoonClass;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $health = $_POST['health'];
            $intelligance = $_POST['intelligence'];
            $strength = $_POST['strength'];
            $agility = $_POST['agility'];
            $mana = $_POST['mana'];
            $defense = $_POST['defense'];

            $user_id = $_SESSION["id"];

            $sql_insert_racoon = "INSERT INTO racoon (user_id, racoon, racoon_name) 
                                    VALUES ('$user_id', '$racoonClass', '$name')";
            
            if ($conn -> query(($sql_insert_racoon))) {
                $racoon_id = $conn -> insert_id;

                $sql_insert_stats = "INSERT INTO racoon_stats (racoon_id, health, intelligence, strength, agility, mana, defense)
                                        VALUES ('$racoon_id', '$health', '$intelligance', '$strength', '$agility', '$mana', '$defense')";
                
                if ($conn -> query($sql_insert_stats)) {
                    echo "Stworzyłeś Szopa.";
                    header("Location: game.php");
                    exit();
                } else {
                    return "Error: " . $sql_insert_stats . "<br>" . $conn -> error;
                    exit();
                }
            } else {
                return "Błąd podczas tworzenia szopa. Spróbuj ponownie.";
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
            <div class="container">
                <input type="text" name="name" id="name" placeholder="Imie szopa..." required>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="health" class="material-symbols-outlined">favorite</label>
                    <div>Health</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="health" id="health" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="intelligence" class="material-symbols-outlined">neurology</label>
                    <div>Intelligence</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="intelligence" id="intelligence" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="strength" class="material-symbols-outlined">swords</label>
                    <div>Strength</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="strength" id="strength" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="agility" class="material-symbols-outlined">sprint</label>
                    <div>Agility</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="agility" id="agility" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="mana" class="material-symbols-outlined">water_drop</label>
                    <div>Mana</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="mana" id="mana" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <div class="container">
                <div class="container_name">
                    <label for="defense" class="material-symbols-outlined">shield</label>
                    <div>Defense</div>
                </div>
                <div class="container_points">
                    <div class="material-symbols-outlined minus">remove</div>
                    <input type="number" name="defense" id="defense" class="inputPoints" readonly value="0">
                    <div class="material-symbols-outlined plus">add</div>
                </div>
            </div>
            <p>
                <input type="number" id="pointsValue" class="inputPoints" value="10" readonly>
            </p>
            <div id="value"></div>
            <p>
                <input type="submit" value="Stwórz Szopa" id="submitButton">
            </p>
            <div id="function"><?=racoon();?></div>
        </form>
    </main>
    <a href="./racoon.php" id="back">
        <input type="button" value="Wróć">
    </a>
<script src="../js/racoonStats.js"></script>
</body>
</html>
<?php
$conn -> close();
ob_end_flush();
?>