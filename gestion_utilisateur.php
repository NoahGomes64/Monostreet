<?php
// On verifie si l'utilisateur est administrateur
session_start();
/*
if (!isset($_SESSION['user_id']) || $_SESSION['estPrvilegie'] != 1) {
    header("Location: index.php");
    exit();
}
*/

// Récupérer la liste de tous les utilisateurs
require_once('connexionBD.php');

$stmt = $connection->prepare("SELECT * FROM compte");
$stmt->execute();


$users = $stmt->fetch();
var_dump($users);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
</head>
<body>
<h1>Gestion des utilisateurs</h1>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Adresse e-mail</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user):
        var_dump($user); ?>
        <tr>
            <td><?php echo $user['nom']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['estPrivilegie']; ?></td>
            <td>
                <a href="modifier_utilisateur.php?id=<?php echo $user['id']; ?>">Modifier</a>
                <a href="supprimer_utilisateur.php?id=<?php echo $user['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<p><a href="administrateur.php">Retour à la page d'administration</a></p>
</body>
</html>
