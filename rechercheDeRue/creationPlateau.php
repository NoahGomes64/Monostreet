<?php
include("main.php");

function creerPlateau($laRue){
    $listeRues = trouverParcours($laRue,false);
    $listeDesNomsDeRues = [];
    foreach ($listeRues as $rue) {
        $listeDesNomsDeRues[] = $rue->getNomRue();
    }

    $toutesLesRues = "";
    foreach ($listeRues as $rue) {
        $toutesLesRues=$toutesLesRues.$rue->getNomRue().",";
    }

    return $toutesLesRues;
}

//$listeRues = creerPlateau("ADOUE                     ");


?>
<!--<!DOCTYPE html>
<html>
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
                var x = "?php echo $listeRues; ?>";
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
                console.log(tabDeRues);
                for (let index = 0; index < tabDeRues.length; index++) {
                    tabDeRuesSansEspace.push(tabDeRues[index].trim());
                }
                console.log(tabDeRuesSansEspace);

                //affichage des cases colorées
                ctx.font = "30px Arial";
                
                var compteur = 0;
                for (let index1 = 0; index1 < tabDeRues.length; index1++) {
                    for (let index2 = 0; index2 < tabDesCouleursCases[index1].length; index2++) {
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

                var prison = new Image();
                prison.src = "prison.jpg";
                ctx.drawImage(prison, 0, 0); 

                

                //ctx.font = "30px Verdana";
                // Create gradient
                //var gradient = ctx.createLinearGradient(0, 0, c.width, 0);
                //gradient.addColorStop("0"," magenta");
                //gradient.addColorStop("0.5", "blue");
                //gradient.addColorStop("1.0", "red");
                // Fill with gradient
                //ctx.fillStyle = gradient;
                //ctx.fillText("Big smile!", 10, 90);

            }
 
        </script>
    </body>
	<head>
		<title>Monostreet</title>
	</head>
	<body>
	</body>
</html>-->