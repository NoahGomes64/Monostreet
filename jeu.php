<?php
/**
 * @file jeu.php 
 * @brief le fichier du demarrage du deroulement
 * @autor 
 * version 
 * date 
 * 
 * */

include("rechercheDeRue/main.php");

session_start();
require 'connexionBD.php';


$leCode = $_GET['code'];
if (strlen($leCode) == 4) {
    $result = mysqli_query($connection, "SELECT * FROM Partie WHERE codePartie='$leCode'");

    /* Get the number of rows in the result set */
    $row_cnt = mysqli_num_rows($result);
    $bonCode = true;
}
else {
    echo "<h1>Desolé, tu n'as pas reussi a drop notre database</h1></br>";
    $bonCode = false;
}


?>
<!DOCTYPE html>
<html>
    <style>
        body{
            display: grid;
            padding-left : 5em;
            grid-template-columns: 26% 74%;
        }

        div{
            padding-top : 12em;
        }
    </style>
    <body>
        <?php
        if ($bonCode && $row_cnt == 1) {
            trouverParcours($_SESSION['rueDeDepart'],false);
        }
        else {
            echo "partie non trouvé";
            echo "<a href='playGame.php?'><button>Chercher une autre partie</button></a>";
        }
        

        ?>
    </body>
</html>    
