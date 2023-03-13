
<?php

session_start();

// On verifie si user est defini et si l'utilisatuer a le role admin
//Si ce n'est pas le cas redirection vers connexion.php?
if (!isset($_SESSION['id']) || $_SESSION['estPrivilegie'] !== 1) {
    header("Location: ../pageConnexion/connexion.php");
    exit();
}


// Récupération du nom de l'utilisateur connecté
$stmt = $pdo->prepare("SELECT nom FROM compte WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch();
$nom = $user['nom'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
</head>
<body>
<h1>Bienvenue Administrateur : <?php echo $nom; ?></h1>
<p>Vous êtes connecté en tant qu'administrateur. Vous avez accès à certaines fonctionnalités réservées aux administrateurs.</p>
</body>
</html>
