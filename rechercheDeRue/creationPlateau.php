<?php
include("main.php");


function creerPlateau($laRue){
    $listeRues = trouverParcours($laRue,false);

}

creerPlateau("ADOUE                     ");

?>
<!DOCTYPE html>
<html>
    <style>
        canvas {
	        border: 1px solid black;
        }
    </style>
    <script>
        window.onload = function() {
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');

            // Nous allons insérer nos tests ici
        }
    </script>
	<head>
		<title>Monostreet</title>
	</head>
	<body>
    <canvas id="canvas">Votre navigateur ne supporte pas HTML5, veuillez le mettre à jour pour jouer.</canvas>
	</body>
</html>