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
        <h1>Wybierz Postać</h1>
        <div>
            <a href="" class="classRacoon">
                <strong>Archer</strong>
                <div class="image-container">
                    <img src="../img/racoon/Archer.jpeg" alt="Archer">
                </div>
            </a>
            <a href="" class="classRacoon">
                <strong>Barbarian</strong>
                <div class="image-container">
                    <img src="../img/racoon/Barbarian.jpeg" alt="Barbarian">
                </div>
            </a>
            <a href="" class="classRacoon">
                <strong>Knight</strong>
                <div class="image-container">
                    <img src="../img/racoon/Knight.jpeg" alt="Knight">
                </div>
            </a>
            <a href="" class="classRacoon">
                <strong>Paladin</strong>
                <div class="image-container">
                    <img src="../img/racoon/Paladin.jpeg" alt="Paladin">
                </div>
            </a>
            <a href="" class="classRacoon">
                <strong>Thief</strong>
                <div class="image-container">
                    <img src="../img/racoon/Thief.jpeg" alt="Thief">
                </div>
            </a>
            <a href="" class="classRacoon">
                <strong>Wizard</strong>
                <div class="image-container">
                    <img src="../img/racoon/Wizard.jpeg" alt="Wizard">
                </div>
            </a>
        </div>
    </main>
    <div id="info">
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Szopy Łucznicy są mistrzami w posługiwaniu się łukami i strzałami z dystansu. 
                Dzięki ich zwinności i umiejętnościom w tropieniu, stanowią doskonałych strażników i łowców. 
                Ich zręczność pozwala im unikać ataków wroga, a celność strzałów sprawia, że są niebezpiecznymi przeciwnikami na odległość.
            </div>
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Barbarzyńcy to potężni wojownicy, którzy czerpią siłę ze swego dzikiego gniewu. 
                Zwykle prowadzą ich pierwotne instynkty, co sprawia, że są nieustępliwi i pełni determinacji w walce. 
                Zdolności fizyczne oraz zdolność do ignorowania bólu sprawiają, że są idealnymi frontowymi wojownikami, wchodzącymi do walki bez strachu.
            </div>
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Rycerze to odważni wojownicy, którzy kultywują zasady honoru i sprawiedliwości. 
                Uzbrojeni w ciężkie zbroje i potężne miecze, stanowią solidną osłonę dla swoich sojuszników. 
                Ich umiejętności obronne oraz zdolność do zadawania potężnych ciosów sprawiają, że są niezastąpionymi obrońcami królestwa.
            </div>
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Paladyni to wojownicy-klerycy, którzy łączą w sobie potęgę fizyczną z boską magią. 
                Są oddani sprawiedliwości i dobru, używając swoich umiejętności zarówno w walce fizycznej, jak i duchowej. 
                Paladyni potrafią leczyć rany, chronić sojuszników oraz zadawać ciosy ze świetlistą mocą.
            </div>
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Złodzieje to mistrzowie skradania się, podstępu i precyzyjnych ataków z ukrycia. Posiadają umiejętności maskowania, dzięki którym są trudni do zauważenia. 
                Są świetnymi szpiegami i specjalistami od przemytu informacji. 
                Zdolności złodzieja obejmują również wyważanie zamków, rozbrajanie pułapek i unikanie konfrontacji tam, gdzie inny wojownik musiałby użyć siły.
            </div>
            <div class="classInfo">
                <strong>Opis:</strong> <br>
                Czarodzieje posługują się potężną magią, kontrolującą żywioły i rzeczywistość. 
                Są źródłem niewyobrażalnej mocy, potrafiącej zarówno niszczyć wrogów, jak i leczyć rany sojuszników. 
                Zdolności czarodzieja obejmują zaklęcia ognia, lodu, błyskawic, a także umiejętność manipulowania czasem i przestrzenią.
            </div>
        </div>
<script src="../js/classInfo.js"></script>
</body>
</html>