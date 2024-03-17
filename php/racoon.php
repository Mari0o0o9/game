<?php
    session_start();
    if (!isset($_SESSION["logged"]) || !isset($_SESSION["login"]) || !isset($_SESSION["id"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racoon | Racoon Forest</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/racoon.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <main>
        <h1>Select Character</h1>
        <div>
            <a href="../php/racoon_stats.php?class=Archer" class="classRacoon">
                <strong>Archer</strong>
                <div class="image-container">
                    <img src="../img/racoon/Archer.jpeg" alt="Archer">
                </div>
            </a>
            <a href="../php/racoon_stats.php?class=Barbarian" class="classRacoon">
                <strong>Barbarian</strong>
                <div class="image-container">
                    <img src="../img/racoon/Barbarian.jpeg" alt="Barbarian">
                </div>
            </a>
            <a href="../php/racoon_stats.php?class=Knight" class="classRacoon">
                <strong>Knight</strong>
                <div class="image-container">
                    <img src="../img/racoon/Knight.jpeg" alt="Knight">
                </div>
            </a>
            <a href="../php/racoon_stats.php?class=Paladin" class="classRacoon">
                <strong>Paladin</strong>
                <div class="image-container">
                    <img src="../img/racoon/Paladin.jpeg" alt="Paladin">
                </div>
            </a>
            <a href="../php/racoon_stats.php?class=Thief" class="classRacoon">
                <strong>Thief</strong>
                <div class="image-container">
                    <img src="../img/racoon/Thief.jpeg" alt="Thief">
                </div>
            </a>
            <a href="../php/racoon_stats.php?class=Wizard" class="classRacoon">
                <strong>Wizard</strong>
                <div class="image-container">
                    <img src="../img/racoon/Wizard.jpeg" alt="Wizard">
                </div>
            </a>
        </div>
    </main>
    <div id="info">
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Raccoons Archers are adept at using bows and arrows from a distance.
                Their agility and tracking skills make them excellent guards and hunters.
                Their agility allows them to avoid enemy attacks, and their accurate shots make them dangerous opponents from a distance.
            </div>
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Barbarians are mighty warriors who draw strength from their fierce anger.
                They are usually guided by their primal instincts, which makes them tenacious and determined in battle.
                Their physical abilities and ability to ignore pain make them ideal frontline warriors, entering combat without fear.
            </div>
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Knights are brave warriors who cultivate the principles of honor and justice.
                Armed with heavy armor and powerful swords, they provide solid cover for their allies.
                Their defensive skills and ability to deal powerful blows make them irreplaceable defenders of the kingdom.
            </div>
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Paladins are cleric warriors who combine physical power with divine magic.
                They are dedicated to justice and goodness, using their skills in both physical and spiritual warfare.
                Paladins can heal wounds, protect allies, and strike with luminous power.
            </div>
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Thieves are masters of stealth, deception and precise hidden attacks. They have camouflage skills that make them difficult to notice.
                They are great spies and specialists in information smuggling.
                The thief's abilities also include picking locks, disarming traps and avoiding confrontations where another warrior would have to use force.
            </div>
            <div class="classInfo">
                <strong>Description:</strong> <br>
                Wizards use powerful magic that controls the elements and reality.
                They are a source of unimaginable power, able to both destroy enemies and heal the wounds of allies.
                The wizard's abilities include fire, ice and lightning spells, as well as the ability to manipulate time and space.
            </div>
        </div>
<script src="../js/classInfo.js"></script>
</body>
</html>