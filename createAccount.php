<?php
session_start();
/**
 * @file connexion.php 
 * @brief Page implementant la connexion des utilisateurs
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */

require 'connexionBD.php';


//si le bouton "Connexion" est cliqué
if(isset($_POST['createAccount'])){
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien
    if (empty($_POST['email'])) {
        echo "Le champs E-mail est vide";
    }
    else {
        if (empty($_POST['pseudo'])) {
            echo "Le champs Pseudo est vide";
        }
        else {
            if(empty($_POST['mdp'])){
                echo "Le champ Mot de passe est vide";
            } else {
                if(empty($_POST['mdpConfirm'])){
                    echo "Vous n'avez pas confirmé votre mot de passe";
                }
                else{
                    if ($_POST['mdp'] != $_POST['mdpConfirm']) {
                        echo "Vous avez mal confirmé votre mot de passe";
                    }
                    else {
                        $adresseDispo = true;
                        $query = 'SELECT email FROM compte';
                        $result = $connection->query($query);
                        foreach ($result as $row) {
                            if ($row == $_POST['email']) {
                                echo "adresse email deja utilisée";
                                $adresseDispo = false;
                            }
                        }
                        if ($adresseDispo) {
                            $pseudoDispo = true;
                            $query = 'SELECT nom FROM compte';
                            $result = $connection->query($query);
                            foreach ($result as $row) {
                                if ($row == $_POST['pseudo']) {
                                    echo "Pseudo invalide";
                                    $adresseDispo = false;
                                }
                            }
                        }
                    }
                }
            }
    }}}

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="cssGeneral.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONNEXION</title>
</head>

<header>

<form action="connexion.php" method="post">
        <div class="container">
            <div class="connexion">
                <div class="info-connexion">
                    <h2>Connexion</h2>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pseudo" id="login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="mdp" id="password" placeholder="Mot de passe">
                        </div>
                        
                        <button type="submit" name="connexion">Connexion</button>

                    </form>
                </div>
            </div>
        </div>
</header>


<?php
$connection = mysqli_connect("lakartxela","garricastres_bd","garricastres_bd","garricastres_bd");
$query = 'SELECT nom FROM compte';
$result = $connection->query($query);
foreach ($result as $row) {
    echo "<section id='$row[idPartie]'>";
    echo "$row[idPartie]"."<br/>";
    echo "$row[codePartie]";
    echo "</section>";
    
}
?>

</html>
