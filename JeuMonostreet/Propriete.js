export default class Propriete {
    //Constructor
    constructor(nom, positionPlateau, prixAchat) {
        this.nom = nom;
        this.positionPlateau = positionPlateau;
        this.prixAchat = prixAchat;
        this.proprietaire = null;

    }

    //Getter
    get NumeroCase(){
        return this.numeroCase;
    }

    get NomCase(){
        this.nomCase;
    }


    //Setter
    set NumeroCase(nvNumeroCase){
        this.numeroCase = nvNumeroCase;
    }

    set NomCase(nvNomCase){
        this.nvNomCase = nvNomCase;
    }


    //Méthodes

}

export {Propriete}