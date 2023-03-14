import {CaseNonAchetable} from './CaseNonAchetable.js'
import {CarteChance} from './CarteChance.js'

export default class CaseCarteChance extends CaseNonAchetable{
    //Constructor
    constructor(numeroCase, nomCase) {
        super(numeroCase, nomCase);
        this.listeDesCartes = [
            new CarteChance(300, 0), new CarteChance(0, 0),
            new CarteChance(200, 0), new CarteChance(0, 10),
            new CarteChance(1000, 0), new CarteChance(0, 15),
            new CarteChance(500, 0), new CarteChance(0, 26),
            new CarteChance(1200, 0), new CarteChance(0, 36),
            new CarteChance(-400, 0), new CarteChance(0, 39),
            new CarteChance(-300, 0), new CarteChance(0, 19)
        ];
    }

    //Getter
    get NumeroCase(){
        return this.numeroCase;
    }

    get Argent(){
        return this.argent;
    }

    get Deplacement(){
        return this0deplacement;
    }

    //Setter
    set NumeroCase(nvNumeroCase){
        this.numeroCase = nvNumeroCase;
    }

    set Argent(nvArgent){
        this.argent = nvArgent;
    }

    set Deplacement(nvDeplacement){
        this.deplacement = nvDeplacement;
    }

    //Méthodes
    executer(joueur){
        this.tirerCarte(joueur);
    }
    
    tirerCarte(joueur){
        var min=0; 
        var max=13;  
        var carte = Math.floor(Math.random() * (max + 1 - min)) + min;
        this.listeDesCartes[carte].jouerCarte(joueur);
    }

}

export {CaseCarteChance}