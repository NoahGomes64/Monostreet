import {Case} from './Case.js'

export default class Partie {
    //Constructor
    constructor(listeDesJoueurs) {
        this.numeroTour = 1;
        this.listeDesJoueurs = listeDesJoueurs;
    }

    //Getter
    get NumeroTour(){
        return this.numeroTour;
    }

    get ListeDesJoueurs(){
        return this.listeDesJoueurs;
    }

    //Setter
    set NumeroTour(nvNumeroTour){
        return this.numeroTour = nvNumeroTour;
    }

    set ListeDesJoueurs(nvListeJoueurs){
        return this.listeDesJoueurs = nvListeJoueurs;
    }

    //Méthodes
    tourSuivant(){
        this.numeroTour ++;
    }
}

export {Partie}