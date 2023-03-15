<?php
session_start();
/**
 * @file jeu.php 
 * @brief le fichier du demarrage du deroulement
 * @autor 
 * version 
 * date 
 * 
 * */


include("rechercheDeRue/creationPlateau.php");
require 'connexionBD.php';

$leCode = $_GET['code'];

//On initialose $pdo a connexion
$pdo = $connection;

if (strlen($leCode) == 4) {
    $stmt = $pdo->prepare("SELECT * FROM Partie WHERE codePartie=:codePartie");
    $stmt->bindValue(':codePartie', $leCode);
    $stmt->execute();
    
    $row_cnt = $stmt->rowCount();
    $bonCode = true;
} else {
    echo "<h1>Desolé, tu n'as pas reussi a drop notre database</h1></br>";
    $bonCode = false;
}

?>    
<!DOCTYPE html>
<html>

    <style>
        body{
            display: grid;
            padding-left : 5em;
            grid-template-columns: 26% 74%;
        }
    div{
        padding-top : 12em;
    }
    </style>
    <head>
		<title>MONOSTREET | Jeu</title>
        <link rel="shortcut icon" href="images/logo.PNG" />
	</head>
    <body>
    <?php
    if ($bonCode && $row_cnt == 1) {
        $stmt = $pdo->prepare("SELECT * FROM Partie WHERE codePartie=:codePartie");
        $stmt->bindValue(':codePartie', $leCode);
        $stmt->execute();
        $ligne = $stmt->fetch();
        $laListeRues=creerPlateau($ligne['ville']);
    }
    else {
        echo "partie non trouvé";
        echo "<a href='pageJouer/jouer.php'><button>Chercher une autre partie</button></a>";
    }
    ?>

    <canvas id="myCanvas" width="987" height="987"></canvas>
    <style>
        canvas {
	        border: 1px solid black;
        }
    </style>

    <button id="btnJouer">Jouer</button>

    <script type="module" src="JeuMonostreet/main.js"></script>


    <button id="lancerDes"></button>

    <p id="gagnant"></p>

        <script>
 
        </script>

    </body>
</html>