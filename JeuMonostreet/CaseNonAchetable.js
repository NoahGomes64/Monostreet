import {Case} from './Case.js'

export default class CaseNonAchetable extends Case{
    //Constructor
    constructor(numeroCase, nomCase) {
        super(numeroCase, nomCase);
    }

    //Getter

    //Setter

    //Méthodes
    executer(){
        return "rien";
    }
}

export {CaseNonAchetable}