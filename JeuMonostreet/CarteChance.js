export default class CarteChance {
    //Constructor
    constructor(argent, deplacement) {
        this.argent = argent;
        this.deplacement = deplacement;
    }

    //Getter
    get Argent(){
        return this.argent;
    }

    get Deplacement(){
        return this0deplacement;
    }

    //Setter
    set Argent(nvArgent){
        this.argent = nvArgent;
    }

    set Deplacement(nvDeplacement){
        this.deplacement = nvDeplacement;
    }

    //Méthodes
    jouerCarte(joueur){
        if (this.argent >= 0) {
            joueur.crediter(this.argent);
        }
        else{
            joueur.debiter(this.argent);
        }
        joueur.seDeplacer(this.deplacement);
    }

}

export {CarteChance}