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
//Verification de la onnexion a la bd
function connexionBD(){
    $host = "mysql-monostreet.alwaysdata.net";
    $dbname = "monostreet_utilisateur";
    $username = "298407_guillaume";
    $password = "monostreet64!!";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
$pdo = connexionBD();

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
$stmt->execute(array(':compteur' => $compteur, ':code' => $code));

header("Location: jeu.php?code=$code");

?>