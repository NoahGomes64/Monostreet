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
    <canvas id="myCanvas" width="987" height="987"></canvas>
        <script>
            tabDesCouleursCases = [['red','white','red','red','white','yellow','white','yellow','yellow'],
                                    ['pink','pink','white','pink','white','white','purple','white','purple'],
                                    ["rgb(0,32,255)",'white',"rgb(0,32,255)",'white','white',"rgb(173,216,230)",'white',"rgb(173,216,230)","rgb(173,216,230)"],
                                    ['green','white','green','green','white',"rgb(223,175,44)",'white',"rgb(223,175,44)","rgb(223,175,44)"]];            
            
                window.onload = function() {
                var canvas = document.getElementById('myCanvas');
                var ctx = canvas.getContext('2d');
                
                ctx.fillStyle = "rgb(0,0,0)";
                ctx.fillRect(1, 1, 150, 150);
                ctx.fillRect(1, 836, 150, 150);
                ctx.fillRect(836, 1, 150, 150);
                ctx.fillRect(836, 836, 150, 150);

                //affichage des cases
                for (let index = 0; index < 9; index++) {
                    ctx.fillStyle = 'blue';
                    ctx.fillRect(152 + (index *76), 1, 75, 150);
                    ctx.fillRect(152 + (index *76), 836, 75, 150);
                    ctx.fillRect(836, 152 + (index *76), 150, 75);
                    ctx.fillRect(1, 152 + (index *76), 150, 75);
                }

                //affichag des cases colorées
                for (let index1 = 0; index1 < tabDesCouleursCases.length; index1++) {
                    for (let index2 = 0; index2 < tabDesCouleursCases[index1].length; index2++) {
                        switch (index1) {
                            case 1:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(101, 152 + (index2 *76), 50, 75);
                                break;
                        
                            case 2:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(836, 152 + (index2 *76), 50, 75);
                                break;

                            case 3:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(152 + (index2 *76), 836, 75, 50);
                                break;
                            
                            case 4:
                                ctx.fillStyle = tabDesCouleursCases[index1][index2];
                                ctx.fillRect(152 + (index2 *76), 101, 75, 50);
                                break;
                        }
                    }
                    
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