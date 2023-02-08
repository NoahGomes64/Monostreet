<?php
try {
  $connection = new PDO("mysql:host=mysql-monostreet.alwaysdata.net;dbname=monostreet_utilisateur", "298407_guillaume", "monostreet64!!");
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion à la base de données: " . $e->getMessage();
}

?>