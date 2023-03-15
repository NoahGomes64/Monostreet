import {Case} from './Case.js'

export default class CasePropriete extends Case{
    //Constructor
    constructor(numeroCase, nomCase, valeurAchat) {
        super(numeroCase, nomCase, valeurAchat);
        this.valeurAchat = valeurAchat;
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
        this.afficher(joueur);
    }

    afficher(joueur) {
        //var txt;
        if (confirm("Voulez vous acheter :\n" + this.nomCase + ", " + this.valeurAchat)) {
          //txt = "You buy it!";
            joueur.acheter(this);
        } else {
          //txt = "You don't buy it!";
        }
        //document.getElementById("demo").innerHTML = txt;*/
    }

}

export {CasePropriete}