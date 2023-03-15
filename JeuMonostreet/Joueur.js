import {Pion} from './Pion.js'
import {CasePropriete} from './CasePropriete.js'

export default class Joueur {
    //Constructeur
    constructor(nom) {
        this.nom = nom;
        this.monPion = null;
        this.monArgent = 1500;
        this.listePropriete = [];
        this.faitFaillite = false;
        this.estLibre = true;
        this.estElimine = false;
    }

    // Getter
    get Nom(){
        return thid.nom;
    }

    get MonPion() {
      return this.monPion;
    }

    get MonArgent(){
        return this.monArgent;
    }

    get ListePropriete(){
        return this.listePropriete;
    }

    get FaitFaillite(){
        return this.faitFaillite;
    }

    get EstLibre(){
        return this.estLibre;
    }

    get EstElimine(){
        return this.estElimine;
    }
  
    // Setter
    set Nom(nvNom){
        this.nom = nvNom;
    }
    
    set MonPion(nvPion) {
        this.monPion = nvPion;
    }
  
    set MonArgent(nvArgent){
        this.monArgent = nvArgent;
    }
  
    set ListePropriete(nvListePropriete){
        this.listePropriete = nvListePropriete;
    }
  
    set FaitFaillite(nvFaitFaillite){
        this.faitFaillite = nvFaitFaillite;
    }
  
    set EstLibre(nvEstLibre){
        this.estLibre = nvEstLibre;
    }
  
    set EstElimine(nvEstElimine){
        this.estElimine = nvEstElimine;
    }

    //Methodes
    debiter(valeurADebiter){
        this.monArgent -= valeurADebiter;
    }

    crediter(valeurACrediter){
        this.monArgent += valeurACrediter;
    }

    payer(unJoueur, valeurAPayer){
        if (this.monArgent - valeurAPayer < 0) {
            return false;
        }
        else {
            this.debiter(valeurAPayer);
            unJoueur.crediter(valeurAPayer);
            return true;
        }
    }

    seDeplacer(numeroCase){
        if (this.monPion.position > numeroCase) {
            this.crediter(200);
        }
        this.monPion.allerA(numeroCase);
    }

    avancer(nbCase){
        if (this.monPion.position + nbCase >= 40) {
            this.crediter(200);
        }
        this.monPion.avancer(nbCase);
    }

    acheter(unePropriete){
        if (this.monArgent - unePropriete.valeurAchat < 0) {
            return false;
        }
        else {
            this.debiter(unePropriete.valeurAchat);
            this.listePropriete.push(unePropriete);
            unePropriete.proprietaire = this;
            return true;
        }
    }

    acheterMaison(uneRue){
        if (this.monArgent - uneRue.prixMaison < 0) {
            return false;
        }
        else {
            this.debiter(uneRue.prixMaison);
            uneRue.ameliorer();
            return true;
        }
    }

    vendre(unePropriete){
        for (let compteur = 0; compteur < this.listePropriete.length; compteur++) {
            if (this.listePropriete[compteur] == unePropriete) {
                this.listePropriete.splice(compteur);
            }
            else {
                compteur ++;
            }
        }
        this.crediter(unePropriete.calculerValeurVente());
    }

}

export {Joueur}