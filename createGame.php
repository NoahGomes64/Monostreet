<?php
/**
 * @file CreateGame.php 
 * @brief fichier de paramétrage de la partie 
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */
require 'connexionBD.php';
//On initialose $pdo a connexion
$pdo = $connection;

$asciiA = 65;
$asciiZ = 90;
$numAscii;
$code = "";

for ($i=0; $i < 4; $i++) { 
    $numAscii = rand($asciiA, $asciiZ);
    $code = $code.chr($numAscii);
}
$sql = "SELECT * FROM Partie";
$result = $pdo->query($sql);
$compteur = $result->rowCount();
$compteur ++;

$sql = "INSERT INTO Partie VALUES (:compteur, '4', '400', 'bonjour', '4', :code, '1', '1', 'oloron')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':compteur', $compteur, PDO::PARAM_INT);
$stmt->bindParam(':code', $code, PDO::PARAM_STR);
$stmt->execute();
header("Location: jeu.php?code=$code");

?>
