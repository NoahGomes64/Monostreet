import Joueur from '/Joueur.js'
 
const joueur = new Joueur();
 
document.getElementById('ShowJoueur').innerHTML=`
  name: ${joueur.monArgent} <br/>
  unit price: ${joueur.estLibre} € <br/>
`