import {CasePropriete} from './CasePropriete.js'

export default class CaseRue extends CasePropriete {
    //Constructor
    constructor(numeroCase, nomCase, couleur) {
        super(numeroCase, nomCase, (40 + 10*numeroCase));
        this.couleur = couleur;
        this.prixMaison = numeroCase*(3/5);
        this.niveauAmelioration = 0;
        this.valeurPropriete = prixAchat;
    }

    //Getter
    get Couleur(){
        return this.numeroCase;
    }

    get PrixMaison(){
        return this.prixMaison;
    }

    get NiveauAmelioration(){
        return this.niveauAmelioration;
    }

    get ValeurPropriete(){
        return this.valeurPropriete;
    }

    //Setter
    set Couleur(nvCouleur){
        this.couleur = nvCouleur;
    }

    set PrixMaison(nvPrixMaison){
        this.prixMaison = nvPrixMaison;
    }

    set NiveauAmelioration(nvNiveauAmelioration){
        this.niveauAmelioration = nvNiveauAmelioration;
    }

    set ValeurPropriete(nvValeurPropriete){
        this.valeurPropriete = nvValeurPropriete;
    }

    //Méthodes
    calculerValeur(){
        return 500;
    }

    executer(joueur){
        this.afficher(joueur);
    }

}

export {CaseRue}