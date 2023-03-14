export default class Case {
    //Constructor
    constructor(numeroCase, nomCase, valeurAchat) {
        this.numeroCase = numeroCase;
        this.nomCase = nomCase;
        this.valeurAchat = valeurAchat;
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

export {Case}