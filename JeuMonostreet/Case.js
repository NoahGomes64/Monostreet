export default class Case {
    //Constructor
    constructor(numeroCase, nomCase) {
        this.numeroCase = numeroCase;
        this.nomCase = nomCase;
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