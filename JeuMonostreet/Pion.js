export default class Pion {
    //Constructeur
    constructor(couleur) {
        this.position = 0;
        this.couleur = couleur;
    }

    //Getter
    get Position(){
        return this.position;
    }

    get Couleur(){
        return this.couleur;
    }

    //Setter
    set Position(nvPosition){
        this.position = nvPosition;
    }

    set Couleur(nvCouleur){
        this.couleur = nvCouleur;
    }

    //Methodes
    avancer(nbCase){
        this.position = (this.position + nbCase)%40;
    }

    allerA(numCase){
        this.position = numCase;
    }

    allerEnPrison(){
        this.position = 10;
    }
}

export{Pion}