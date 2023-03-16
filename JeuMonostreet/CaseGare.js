import {CasePropriete} from './CasePropriete.js'

export default class CaseGare extends CasePropriete {
    //Constructor
    constructor(numeroCase, nomCase) {
        super(numeroCase, nomCase, 200);
        this.niveauAmelioration = 0;
        this.valeurRevenue = 25;
        this.valeurPropriete = this.valeurAchat;
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
        this.niveauAmelioration = nvNiveauAmelioration;
    }

    set ValeurRevenue(nvValeurRevenue){
        this.valeurRevenue = nvValeurRevenue;
    }

    set ValeurPropriete(nvValeurPropriete){
        this.valeurPropriete = nvValeurPropriete;
    }

    //Méthodes
    mettreAJourRevenue(nbGare){
        this.valeurRevenue *= nbGare;
    }

    calculerValeur(){
        return this.prixAchat*(7/10);
    }

    executer(joueur){
        return this.afficher(joueur);
    }

}

export {CaseGare}