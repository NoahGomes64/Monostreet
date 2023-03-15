import {Joueur} from './Joueur.js'
import {Pion} from './Pion.js'
import {De} from './De.js'
import { CaseRue } from './CaseRue.js';
import { CaseGare } from './CaseGare.js';
import { Partie } from './Partie.js';
import { CasePropriete } from './CasePropriete.js';
import { CaseNonAchetable } from './CaseNonAchetable.js';
import { CaseCarteChance } from './CaseCarteChance.js';

console.log("okkkkkkkkkkkkkkkkkkkk");
function jeuMonostreet(nbJoueur, listeDesRues){
    //INITIALISATION
    // Dé
    const de1 = new De();
    const de2 = new De();

    //Creation du Plateau
    var plateau = [new CaseNonAchetable(0,"Depart"), new CasePropriete(1, listeDesRues[0], 200), new CaseCarteChance(2, "chance"), new CasePropriete(3, "case3", 200),
  new CaseNonAchetable(4, "Rien"), new CaseGare(5, "gare de lyon", 200), new CasePropriete(6, "Case6", 200), new CaseCarteChance(7,"Chance"),
  new CasePropriete(8, "Case8", 200), new CasePropriete(9, "Case9", 200), new CaseNonAchetable(10, "Prison"), new CaseNonAchetable(11, "Prison"),
  new CasePropriete(12, "Case8", 200), new CasePropriete(13, "Case9", 200), new CaseNonAchetable(14, "Prison"), new CaseNonAchetable(15, "Prison"),
  new CasePropriete(16, "Case8", 200), new CasePropriete(17, "Case9", 200), new CaseNonAchetable(18, "Prison"), new CaseNonAchetable(19, "Prison"),
  new CasePropriete(20, "Case8", 200), new CasePropriete(21, "Case9", 200), new CaseNonAchetable(22, "Prison"), new CaseNonAchetable(23, "Prison"),
  new CasePropriete(24, "Case8", 200), new CasePropriete(25, "Case9", 200), new CaseNonAchetable(26, "Prison"), new CaseNonAchetable(27, "Prison"),
  new CasePropriete(28, "Case8", 200), new CasePropriete(29, "Case9", 200), new CaseNonAchetable(30, "Prison"), new CaseNonAchetable(31, "Prison"),
  new CasePropriete(32, "Case8", 200), new CasePropriete(33, "Case9", 200), new CaseNonAchetable(34, "Prison"), new CaseNonAchetable(35, "Prison"),
  new CasePropriete(36, "Case8", 200), new CasePropriete(37, "Case9", 200), new CaseNonAchetable(38, "Prison"), new CaseNonAchetable(39, "Prison")];

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
    console.log(joueur1.monArgent);

    // La Partie
    const laPartie = new Partie(listeDesJoueurs);

    //PARTIE
    //affichage des pions
    listeDesJoueurs.forEach(joueur => {
      joueur.monPion.afficher();
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
            joueur.monPion.afficher();
            console.log(joueur.monArgent);
            plateau[joueur.monPion.position].executer(joueur);
            sleep(2000);
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


jeuMonostreet(2,["ok","ok","ok"]);
