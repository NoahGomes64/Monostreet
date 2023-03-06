<?php
//Connexion alwaysData
$host = "mysql-monostreet.alwaysdata.net";
$dbname = "monostreet_utilisateur";
$username = "298407_guillaume";
$password = "monostreet64!!";

try {
  $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
}
?>
