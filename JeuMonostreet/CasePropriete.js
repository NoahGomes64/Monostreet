import {Case} from './Case.js'

export default class CasePropriete extends Case{
    //Constructor
    constructor(numeroCase, nomCase, valeurAchat) {
        super(numeroCase, nomCase, valeurAchat);
        this.valeurAchat = valeurAchat;
        this.proprietaire = null;
    }

    //Getter
    get NumeroCase(){
        return this.numeroCase;
    }

    //Setter
    set NumeroCase(nvNumeroCase){
        this.numeroCase = nvNumeroCase;
    }

    //Méthodes
    executer(joueur){
        return this.afficher(joueur);
    }

    afficher(joueur) {
        //var txt;
        if (this.proprietaire == null) {
            if (confirm(joueur.nom +",\nVoulez vous acheter :\n" + this.nomCase + ", " + this.valeurAchat)) {
                //txt = "You buy it!";
                joueur.acheter(this);
            } else {
                //txt = "You don't buy it!";
            }
        }
        else {
            joueur.payer(this.proprietaire, this.valeurAchat)
        }
        return this.nomCase;
        
        //document.getElementById("demo").innerHTML = txt;*/
    }

}

export {CasePropriete}