<?php
$host = "lakartxela";
$dbname = "garricastres_bd";
$username = "garricastres_bd";
$password = "garricastres_bd";

try {
  $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
}
?>
