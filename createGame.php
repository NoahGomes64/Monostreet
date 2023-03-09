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

$asciiA = 65;
$asciiZ = 90;
$numAscii;
$code = "";

for ($i=0; $i < 4; $i++) { 
    $numAscii = rand($asciiA, $asciiZ);
    $code = $code.chr($numAscii);
}
// isConnected() ne passe pas avec PDO
if ($connection->getAttribute(PDO::ATTR_CONNECTION_STATUS) !== 2) {
    echo "Erreur de connexion à la base de données";
    exit();
  }
  

$sql = "SELECT * FROM Partie";
$result = $connection->query($sql);
$compteur = $result->rowCount();
$compteur ++;

$sql = "INSERT INTO Partie VALUES (:compteur, '4', '400', 'bonjour', '4', :code, '1', '1', 'oloron')";
$stmt = $connection->prepare($sql);
$stmt->execute(array(':compteur' => $compteur, ':code' => $code));

header("Location: jeu.php?code=$code");

?>