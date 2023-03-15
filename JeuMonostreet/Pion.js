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

    afficher(ctx){
        ctx.fillStyle = this.couleur;
        if (this.position >= 0 && this.position <= 10) {
            ctx.fillRect(125+this.position*76, 30, 20, 20);
        }
        else if (this.position > 10 && this.position <= 20) {
            ctx.fillRect(920, 125+(this.position-10)*76, 20, 20);
        }
        else if (this.position > 20 && this.position <= 30){
            ctx.fillRect(920 - ((this.position-20)*76), 920, 20, 20);
        }
        else if(this.position > 30 && this.position <= 39) {
            ctx.fillRect(25, 920 - ((this.position-30)*75), 20, 20);
        }
        
    }
}

export{Pion}