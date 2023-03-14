import {Case} from './Case.js'

export default class Partie {
    //Constructor
    constructor(listeDesJoueurs) {
        this.numeroTour = 1;
        this.listeDesJoueurs = listeDesJoueurs;
    }

    //Getter
    get NiveauAmelioration(){
        return this.niveauAmelioration;
    }

    get ValeurRevenue(){
        return this.valeurRevenue;
    }

    get ValeurPropriete(){
        return this.valeurPropriete;
    }

    //Setter
    set NiveauAmelioration(nvNiveauAmelioration){
        return this.niveauAmelioration = nvNiveauAmelioration;
    }

    set ValeurRevenue(nvValeurRevenue){
        return this.valeurRevenue = nvValeurRevenue;
    }

    set ValeurPropriete(nvValeurPropriete){
        return this.valeurPropriete = nvValeurPropriete;
    }

    //Méthodes
    mettreAJourRevenue(nbGare){
        this.valeurRevenue *= nbGare;
    }

    calculerValeur(){
        return this.prixAchat*(7/10);
    }

}

export {Partie}