<?php
/**
 * @file jeu.php 
 * @brief le fichier du demarrage du deroulement
 * @autor 
 * version 
 * date 
 * 
 * */


include("rechercheDeRue/creationPlateau.php");

session_start();

$leCode = $_GET['code'];

try {
    $pdo = new PDO("mysql:host=lakartxela;dbname=garricastres_bd", "garricastres_bd", "garricastres_bd");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
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
} catch (PDOException $e) {
    echo $e->getMessage();
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
    <body>
    <?php
    if ($bonCode && $row_cnt == 1) {
        creerPlateau($_SESSION['rueDeDepart']);
    }
    else {
        echo "partie non trouvé";
        echo "<a href='playGame.php?'><button>Chercher une autre partie</button></a>";
    }
    ?>
    </body>
</html>