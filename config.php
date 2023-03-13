<?php
// Ce fichier va contenir les informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'monostreet_utilisateur');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configuration de l'application
define('BASE_URL', 'http://localhost/http://training1/Monostreet/');
define('APP_NAME', 'Monostreet');

// Options de configuration
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ajout de la connexion a la bd
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la bd: ' . $e->getMessage();
    exit();
}
