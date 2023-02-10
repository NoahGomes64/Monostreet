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
    <canvas id="myCanvas" width="581" height="581"></canvas>
        <script>
            window.onload = function() {
                var canvas = document.getElementById('myCanvas');
                var ctx = canvas.getContext('2d');
                
                for (let index = 0; index < 11; index++) {
                    ctx.fillStyle = 'blue';
                    ctx.fillRect(10 + (51*index), 10, 50, 50);
                    ctx.fillRect(10, 10 + (51*index), 50, 50);
                    ctx.fillRect(10 + (51*index), 561, 50, 50);
                    ctx.fillRect(10, 10 + (51*index), 50, 50);
                }
            }
        </script>
    </body>
	<head>
		<title>Monostreet</title>
	</head>
	<body>
    <canvas id="canvas">Votre navigateur ne supporte pas HTML5, veuillez le mettre à jour pour jouer.</canvas>
	</body>
</html>