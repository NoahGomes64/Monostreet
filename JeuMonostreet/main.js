import {Joueur} from './Joueur.js'
import {Pion} from './Pion.js'
import {De} from './De.js'
import Partie from './Partie.js';

function jeuMonostreet(nbJoueur){
    //INITIALISATION
    // faire joueurs
    const joueur1 = new Joueur();
    const joueur2 = new Joueur();
    const joueur3 = new Joueur();
    const joueur4 = new Joueur();
    liste4Joueurs = [joueur1, joueur2, joueur3, joueur4];

    var nom1 = "Test1";
    var nom2 = "Test2";
    listePseudo = [nom1, nom2];

    var couleur1 = "yellow";
    var couleur2 = "red";
    listeCouleurs = [couleur1, couleur2];

    listeDesJoueurs = [];
    for (let index = 0; index < nbJoueur; index++) {
        liste4Joueurs[index].nom = listePseudo[index];
        liste4Joueurs[index].monPion = new Pion(listeCouleurs[index]);
        listeDesJoueurs.push(liste4Joueurs[index]);
    }

    // La Partie
    const laPartie = new Partie();

    //PARTIE
    while (true) {
        // Condition de sortie
        compteurJoueurNonElimine = 0;
        listeDesJoueurs.forEach(joueur => {
            if (!(joueur.estElimine)) {
                compteurJoueurNonElimine ++;
            }
        });
        if (compteurJoueurNonElimine == 1) {
            break;
        }

        //affichage des pions
        listeDesJoueurs.forEach(joueur => {
            joueur.monPion.afficher();
        });

        listeDesJoueurs.forEach(joueur => {
            //Deplacement
            joueur.seDeplacer(leDe.lancer)
        });
    }

    //FIN DE PARTIE
}
