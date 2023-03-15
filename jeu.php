<?php
session_start();
/**
 * @file jeu.php 
 * @brief le fichier du demarrage du deroulement
 * @autor 
 * version 
 * date 
 * 
 * */


include("rechercheDeRue/creationPlateau.php");
require 'connexionBD.php';

$leCode = $_GET['code'];

//On initialose $pdo a connexion
$pdo = $connection;

if (strlen($leCode) == 4) {
    $stmt = $pdo->prepare("SELECT * FROM Partie WHERE codePartie=:codePartie");
    $stmt->bindValue(':codePartie', $leCode);
    $stmt->execute();
    
    $row_cnt = $stmt->rowCount();
    $bonCode = true;
} else {
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
    <head>
		<title>MONOSTREET | Jeu</title>
        <link rel="shortcut icon" href="images/logo.PNG" />
	</head>
    <body>
    <?php
    if ($bonCode && $row_cnt == 1) {
        $stmt = $pdo->prepare("SELECT * FROM Partie WHERE codePartie=:codePartie");
        $stmt->bindValue(':codePartie', $leCode);
        $stmt->execute();
        $ligne = $stmt->fetch();
        $laListeRues=creerPlateau($ligne['ville']);
    }
    else {
        echo "partie non trouvé";
        echo "<a href='pageJouer/jouer.php'><button>Chercher une autre partie</button></a>";
    }
    ?>

    <canvas id="myCanvas" width="987" height="987"></canvas>
    <style>
        canvas {
	        border: 1px solid black;
        }
    </style>
        <script>
            tabDesCouleursCases = [['red','white','red','red','white','yellow','white','yellow','yellow'],
                                    ['pink','pink','white','pink','white','white','purple','white','purple'],
                                    ["rgb(0,32,255)",'white',"rgb(0,32,255)",'white','white',"rgb(173,216,230)",'white',"rgb(173,216,230)","rgb(173,216,230)"],
                                    ['green','white','green','green','white',"rgb(223,175,44)",'white',"rgb(223,175,44)","rgb(223,175,44)"]];            
            
                window.onload = function() {
                var canvas = document.getElementById('myCanvas');
                var ctx = canvas.getContext('2d');
                
                //plateau général
                ctx.fillStyle = "black";
                ctx.fillRect(0, 0, 987, 987);

                ctx.fillStyle = "rgb(249,228,183)";
                ctx.fillRect(1, 1, 150, 150);
                ctx.fillRect(1, 836, 150, 150);
                ctx.fillRect(836, 1, 150, 150);
                ctx.fillRect(836, 836, 150, 150);

                //affichage des cases
                for (let index = 0; index < 9; index++) {
                    ctx.fillRect(152 + (index *76), 1, 75, 150);
                    ctx.fillRect(152 + (index *76), 836, 75, 150);
                    ctx.fillRect(836, 152 + (index *76), 150, 75);
                    ctx.fillRect(1, 152 + (index *76), 150, 75);
                }

                //Liste des noms de rues
                var x = "<?php echo $laListeRues; ?>";
                let tabDeRues = [];
                let mot = '';  
                for (let index = 0; index < x.length; index++) {
                    if (x[index] == "," || index == x.lenght-1) {
                        tabDeRues.push(mot);
                        mot = '';
                    } else {
                        mot += x[index];
                    }
                }   
                
                //Suppression des espaces des rues
                tabDeRuesSansEspace = [];
                let mot2 = "";
                var unCompteur = 0;
                //console.log(tabDeRues);
                for (let index = 0; index < tabDeRues.length; index++) {
                    tabDeRuesSansEspace.push(tabDeRues[index].trim());
                }
                //console.log(tabDeRuesSansEspace);

                //affichage des cases colorées
                ctx.font = "30px Arial";
                
                var compteur = 0;
                for (let index1 = 0; index1 < tabDeRuesSansEspace.length; index1++) {
                    for (let index2 = 0; index2 < 9; index2++) {
                        switch (index1) {
                            case 0:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(152 + (index2 *76), 101, 75, 50);
                                if (tabDesCouleursCases[index1][index2] != 'white') {
                                    ctx.fillStyle = 'black';
                                    ctx.fillText(tabDeRuesSansEspace[compteur], 152 + (index2 *76), 101, 75);
                                    compteur += 1;
                                }
                                break;
                        
                            case 1:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(836, 152 + (index2 *76), 50, 75);
                                if (tabDesCouleursCases[index1][index2] != 'white') {
                                    ctx.fillStyle = 'black';
                                    ctx.fillText(tabDeRuesSansEspace[compteur], 886, 227 + (index2 *76), 100);
                                    compteur += 1;
                                }
                                break;

                            case 2:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(760 - (index2 *76), 836, 75, 50);
                                if (tabDesCouleursCases[index1][index2] != 'white') {
                                    ctx.fillStyle = 'black';
                                    ctx.fillText(tabDeRuesSansEspace[compteur], 760 - (index2 *76), 907, 75);
                                    compteur += 1;
                                }
                                break;
                            
                            case 3:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(101, 760 - (index2 *76), 50, 75);
                                if (tabDesCouleursCases[index1][index2] != 'white') {
                                    ctx.fillStyle = 'black';
                                    ctx.fillText(tabDeRuesSansEspace[compteur], 1, 835 - (index2 *76), 100);
                                    compteur += 1;
                                }
                                break;
                        }
                    }
                }

                //ctx.font = "30px Verdana";
                // Create gradient
                //var gradient = ctx.createLinearGradient(0, 0, c.width, 0);
                //gradient.addColorStop("0"," magenta");
                //gradient.addColorStop("0.5", "blue");
                //gradient.addColorStop("1.0", "red");
                // Fill with gradient
                //ctx.fillStyle = gradient;
                //ctx.fillText("Big smile!", 10, 90);

                export {ctx}

            }
 
        </script>

        <button id="btnJouer">Jouer</button>

        <script type="module" src="JeuMonostreet/main.js"></script>


        <button id="lancerDes"></button>

        <p id="gagnant"></p>
    </body>
</html>