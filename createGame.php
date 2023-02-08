<?php
/**
 * @file CreateGame.php 
 * @brief fichier de parametrage de la partie 
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */
$connection = mysqli_connect("mysql-monostreet.alwaysdata.net","298407_guillaume","monostreet64!!","monostreet_utilisateur",3306);

$asciiA = 65;
$asciiZ = 90;
$numAscii;
$code = "";

for ($i=0; $i < 4; $i++) { 
    $numAscii = rand($asciiA, $asciiZ);
    $code = $code.chr($numAscii);
}

$sql = "SELECT * FROM Partie";
$result = mysqli_query($connection, $sql);
$compteur = mysqli_num_rows($result);
$compteur ++;

$sql = "INSERT INTO Partie VALUES ('$compteur', '4', '400', 'bonjour', '4', '$code', '1', '1', 'oloron')";

mysqli_query($connection, $sql);

header("Location: jeu.php?code=$code");


?>