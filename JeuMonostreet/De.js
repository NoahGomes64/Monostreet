export default class De {
    //Constructor
    constructor() {
        this.valeur = null;
    }

    //Getter
    get Valeur(){
        return this.valeur;
    }

    //Setter
    set Valeur(nvValeur){
        this.valeur = nvValeur;
    }

    //Méthodes
    lancerDe(){
        var min=1; 
        var max=6;  
        this.valeur = Math.floor(Math.random() * (max + 1 - min)) + min; 
    }
}

export {De}