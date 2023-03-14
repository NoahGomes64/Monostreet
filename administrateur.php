<?php
// On verifie que l'utilisateur est connecté en tant qu'administrateur
session_start();


require_once "connexionBD.php";
$stmt->prepare("SELECT nom FROM compte WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
$nom = $user['nom'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Administrateur</title>
</head>
<body>
<h1>Bienvenue Administrateur : <?php echo $nom; ?></h1>
<p>Vous êtes connecté en tant qu'administrateur. Vous avez accès à certaines fonctionnalités réservées aux administrateurs.</p>
<p>
    <a href="gestion_sauvegarde.php">Gestion des sauvegardes</a> |
    <a href="gestion_utilisateur.php">Gestion des utilisateurs</a> |
    <a href="index.php">Se déconnecter</a>
</p>
</body>
</html>
