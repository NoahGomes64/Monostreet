import {ctx} from '../jeu.php'
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

    afficher(){
        ctx.fillStyle = this.couleur;
        if (this.position >= 0 && this.position <= 10) {
            ctx.fillRect(this.position*100, 0, 100, 100);
        }
        else if (this.position > 10 && this.position <= 20) {
            ctx.fillRect(1000, (this.position-10)*100, 100, 100);
        }
        else if (this.position > 20 && this.position <= 30){
            ctx.fillRect(1000 - ((this.position-20)*100), 1000, 100, 100);
        }
        else if(this.position > 30 && this.position <= 39) {
            ctx.fillRect(0, 1000 - ((this.position-30)*100), 100, 100);
        }
        
    }
}

export{Pion}