import {Joueur} from './Joueur.js'
import {Pion} from './Pion.js'
import {De} from './De.js'
import { CaseRue } from './CaseRue.js';
import { CaseGare } from './CaseGare.js';
import { Partie } from './Partie.js';
import { CasePropriete } from './CasePropriete.js';
import { CaseNonAchetable } from './CaseNonAchetable.js';
import { CaseCarteChance } from './CaseCarteChance.js';

const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

var btnlancerDes = document.getElementById('lancerDes');
btnlancerDes.addEventListener("click",lancerTour)


//INITIALISATION
// Dé
const de1 = new De();
const de2 = new De();

//Plateau
const listeDesRues = ["rue1","rue2","rue3", "rue4",
"rue5", "rue6", "rue7", "rue8", "rue9",
"rue10", "rue11", "rue12", "rue13", "rue14",
"rue15", "rue16", "rue17", "rue18", "rue19",
"rue20", "rue21", "rue22"];
var plateau = [new CaseNonAchetable(0,"Depart"), new CaseRue(1, listeDesRues[0], "marron"), new CaseCarteChance(2, "chance"), new CaseRue(3, listeDesRues[1], "marron"),
  new CaseNonAchetable(4, "Rien"), new CaseGare(5, "gare de lyon", 200), new CaseRue(6, listeDesRues[2], "bleu clair"), new CaseCarteChance(7,"Chance"),
  new CaseRue(8, listeDesRues[3], "bleu clair"), new CaseRue(9, listeDesRues[4], "bleu clair"), new CaseNonAchetable(10, "Prison"), new CaseRue(11, listeDesRues[5], "rose"),
  new CaseCarteChance(12,"Chance"), new CaseRue(13, listeDesRues[6], "rose"), new CaseRue(14, listeDesRues[7], "rose"), new CaseGare(15, "gare de montparnasse", 200),
  new CaseRue(16, listeDesRues[8], "orange"), new CaseCarteChance(17,"Chance"), new CaseRue(18, listeDesRues[9], "orange"), new CaseRue(19, listeDesRues[10], "orange"),
  new CaseNonAchetable(20, "Parc Gratuit"), new CaseRue(21, listeDesRues[11], "rouge"), new CaseCarteChance(22,"Chance"), new CaseRue(23, listeDesRues[12], "rouge"),
  new CaseRue(24, listeDesRues[13], "rouge"), new CaseGare(25, "gare de Bordeaux Sainte Jean", 200), new CaseRue(26, listeDesRues[14], "jaune"), new CaseRue(27, listeDesRues[15], "jaune"),
  new CaseNonAchetable(28, "Rien"), new CaseRue(29, listeDesRues[16], "jaune"), new CaseNonAchetable(30, "Aller en prison"), new CaseRue(31, listeDesRues[17], "vert"),
  new CaseRue(32, listeDesRues[18], "vert"), new CaseCarteChance(33, "chance"), new CaseRue(34, listeDesRues[19], "vert"), new CaseGare(35, "gare de Marseille", 200),
  new CaseCarteChance(36, "chance"), new CaseRue(37, listeDesRues[20], "bleu fonce"), new CaseNonAchetable(38, "Rien"), new CaseRue(39, listeDesRues[21], "bleu fonce")];

//Joueurs
var nbJoueur = 2;
const joueur1 = new Joueur();
const joueur2 = new Joueur();
const joueur3 = new Joueur();
const joueur4 = new Joueur();
const liste4Joueurs = [joueur1, joueur2, joueur3, joueur4];

var nom1 = "Joueur1";
var nom2 = "Joueur2";
const listePseudo = [nom1, nom2];

var couleur1 = "yellow";
var couleur2 = "red";
const listeCouleurs = [couleur1, couleur2];

const listeDesJoueurs = [];
for (let index = 0; index < nbJoueur; index++) {
  liste4Joueurs[index].nom = listePseudo[index];
  liste4Joueurs[index].monPion = new Pion(listeCouleurs[index], ctx);
  listeDesJoueurs.push(liste4Joueurs[index]);
}
//console.log(joueur1.nom);

// La Partie
const laPartie = new Partie(listeDesJoueurs);





listeDesJoueurs.forEach(joueur => {
  joueur.monPion.afficher();
});
document.getElementById("argentJ1").innerHTML = "Joueur1 : "+listeDesJoueurs[0].monArgent+"€";
document.getElementById("argentJ2").innerHTML = "Joueur2 : "+listeDesJoueurs[1].monArgent+"€";;
  

var compteurTourJoueur = 0;
function lancerTour(){
  //joueur
  document.getElementById("jouerCarte").innerHTML = "";
  var joueur = listeDesJoueurs[compteurTourJoueur];
  //Tirer De
  de1.valeur = null;
  de2.valeur = null;
  de1.lancerDe();
  de2.lancerDe();

  //Avancer
  console.log(joueur);
  document.getElementById("deplacement").innerHTML = "Vous avez fait " + (de1.Valeur + de2.valeur);
  joueur.avancer(de1.Valeur + de2.valeur);
  console.log(joueur.monPion.position);
  document.getElementById("jouerCarte").innerHTML = plateau[joueur.monPion.position].executer(joueur);

  //afficher argent
  document.getElementById("argentJ1").innerHTML = "Joueur1 : "+listeDesJoueurs[0].monArgent+"€";
  document.getElementById("argentJ2").innerHTML = "Joueur2 : "+listeDesJoueurs[1].monArgent+"€";
  afficherProprieteJ1();
  afficherProprieteJ2();//fin de tour
  if (compteurTourJoueur == nbJoueur - 1) {
    compteurTourJoueur = 0;
    if (laPartie.numeroTour == 4) {
      if (listeDesJoueurs[0].monArgent > listeDesJoueurs[1].monArgent) {
        document.getElementById("gagnant").innerHTML = listeDesJoueurs[0].nom + " a gagné!";
      }
      else if (listeDesJoueurs[1].monArgent > listeDesJoueurs[0].monArgent) {
        document.getElementById("gagnant").innerHTML = listeDesJoueurs[1].nom + " a gagné!";
      }
      else {
        document.getElementById("gagnant").innerHTML = "égalité";
      }
      btnlancerDes.style.opacity = 0;
    }
    laPartie.tourSuivant();
  }
  else {
    compteurTourJoueur ++;
  }

}

function jeuMono(){
  jeuMonostreet(2,["rue1","rue2","rue3", "rue4",
"rue5", "rue6", "rue7", "rue8", "rue9",
"rue10", "rue11", "rue12", "rue13", "rue14",
"rue15", "rue16", "rue17", "rue18", "rue19",
"rue20", "rue21", "rue22"]);
}

function afficherProprieteJ1() {
  var txt = "";
  joueur1.listePropriete.forEach(prop => {
    txt += prop.nomCase + ", ";
  });
  document.getElementById("proprieteJ1").innerHTML = txt;
}

function afficherProprieteJ2() {
  var txt = "";
  joueur2.listePropriete.forEach(prop => {
    txt += prop.nomCase + ", ";
  });
  document.getElementById("proprieteJ2").innerHTML = txt;
}











function jeuMonostreet(nbJoueur, listeDesRues){
    //INITIALISATION
    // Dé
    const de1 = new De();
    const de2 = new De();

    //Creation du Plateau
    var plateau = [new CaseNonAchetable(0,"Depart"), new CaseRue(1, listeDesRues[0], "marron"), new CaseCarteChance(2, "chance"), new CaseRue(3, listeDesRues[1], "marron"),
  new CaseNonAchetable(4, "Rien"), new CaseGare(5, "gare de lyon", 200), new CaseRue(6, listeDesRues[2], "bleu clair"), new CaseCarteChance(7,"Chance"),
  new CaseRue(8, listeDesRues[3], "bleu clair"), new CaseRue(9, listeDesRues[4], "bleu clair"), new CaseNonAchetable(10, "Prison"), new CaseRue(11, listeDesRues[5], "rose"),
  new CaseCarteChance(12,"Chance"), new CaseRue(13, listeDesRues[6], "rose"), new CaseRue(14, listeDesRues[7], "rose"), new CaseGare(15, "gare de montparnasse", 200),
  new CaseRue(16, listeDesRues[8], "orange"), new CaseCarteChance(17,"Chance"), new CaseRue(18, listeDesRues[9], "orange"), new CaseRue(19, listeDesRues[10], "orange"),
  new CaseNonAchetable(20, "Parc Gratuit"), new CaseRue(21, listeDesRues[11], "rouge"), new CaseCarteChance(22,"Chance"), new CaseRue(23, listeDesRues[12], "rouge"),
  new CaseRue(24, listeDesRues[13], "rouge"), new CaseGare(25, "gare de Bordeaux Sainte Jean", 200), new CaseRue(26, listeDesRues[14], "jaune"), new CaseRue(27, listeDesRues[15], "jaune"),
  new CaseNonAchetable(28, "Rien"), new CaseRue(29, listeDesRues[16], "jaune"), new CaseNonAchetable(30, "Aller en prison"), new CaseRue(31, listeDesRues[17], "vert"),
  new CaseRue(32, listeDesRues[18], "vert"), new CaseCarteChance(33, "chance"), new CaseRue(34, listeDesRues[19], "vert"), new CaseGare(35, "gare de Marseille", 200),
  new CaseCarteChance(36, "chance"), new CaseRue(37, listeDesRues[20], "bleu fonce"), new CaseNonAchetable(38, "Rien"), new CaseRue(39, listeDesRues[21], "bleu fonce")];

    // faire joueurs
    const joueur1 = new Joueur();
    const joueur2 = new Joueur();
    const joueur3 = new Joueur();
    const joueur4 = new Joueur();
    const liste4Joueurs = [joueur1, joueur2, joueur3, joueur4];

    var nom1 = "Test1";
    var nom2 = "Test2";
    const listePseudo = [nom1, nom2];

    var couleur1 = "yellow";
    var couleur2 = "red";
    const listeCouleurs = [couleur1, couleur2];

    const listeDesJoueurs = [];
    for (let index = 0; index < nbJoueur; index++) {
        liste4Joueurs[index].nom = listePseudo[index];
        liste4Joueurs[index].monPion = new Pion(listeCouleurs[index]);
        listeDesJoueurs.push(liste4Joueurs[index]);
    }
    console.log(joueur1.nom);

    // La Partie
    const laPartie = new Partie(listeDesJoueurs);

    //PARTIE
    //affichage des pions
    listeDesJoueurs.forEach(joueur => {
      joueur.monPion.afficher(ctx);
    });

    while (true) {
        // première condition de sortie
        var compteurJoueurNonElimine = 0;
        listeDesJoueurs.forEach(joueur => {
            if (!(joueur.estElimine)) {
                compteurJoueurNonElimine ++;
            }
        });
        if (compteurJoueurNonElimine == 1) {
            break;
        }

        //Tour par joueur
        listeDesJoueurs.forEach(joueur => {
          de1.valeur = null;
          de2.valeur = null;
          while (de1.Valeur == de2.Valeur) { // tant qu'il y a doublé
            //Deplacement
            de1.lancerDe();
            de2.lancerDe();

            //console.log("de 1 = ", de1.valeur);
            //console.log("de 2 = ", de2.valeur);

            joueur.avancer(de1.Valeur + de2.valeur);
            joueur.monPion.afficher(ctx);
            console.log(joueur.monPion.position);
            plateau[joueur.monPion.position].executer(joueur);
            joueur.monPion.afficher(ctx);
          }
        });
        
        //Seconde condition de sortie
        if (laPartie.numeroTour == 3) {
          break;
        }

        laPartie.tourSuivant();
        sleep(2000);
    }

    //FIN DE PARTIE
    console.log(joueur1.ListePropriete);
    console.log(joueur1.monArgent);
    console.log(joueur2.ListePropriete);
    console.log(joueur1.monArgent);
}

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}

export {jeuMonostreet}


