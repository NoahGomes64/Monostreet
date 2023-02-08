<?php
/**
 * @file CreateGame.php 
 * @brief fichier de parametrage de la partie 
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */
require 'connexionBD.php';
$asciiA = 65;
$asciiZ = 90;
$numAscii;
$code = "";

for ($i=0; $i < 4; $i++) { 
    $numAscii = rand($asciiA, $asciiZ);
    $code = $code.chr($numAscii);
}

$sql = "SELECT * FROM Partie";

try {
    $pdo = new PDO("mysql:host=lakartxela;dbname=garricastres_bd", "garricastres_bd", "garricastres_bd");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $pdo->query("SELECT COUNT(*) FROM Partie");
    $compteur = $result->fetchColumn();
    $compteur ++;

    $sql = "INSERT INTO Partie VALUES (:compteur, 4, 400, 'bonjour', 4, :code, 1, 1, 'oloron')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':compteur', $compteur, PDO::PARAM_INT);
    $stmt->bindValue(':code', $code, PDO::PARAM_STR);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

header("Location: jeu.php?code=$code");


?>