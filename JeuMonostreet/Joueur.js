export default class Joueur {
    constructor() {
        this.monPion = null;
        this.monArgent = 1500;
        this.listePropriete = [];
        this.faitFaillite = false;
        this.estLibre = true;
        this.estElimine = false;
    }

    // Getter
    getMonPion() {
      return this.monPion;
    }

    getMonArgent(){
        return this.monArgent;
    }

    getListePropriete(){
        return this.listePropriete;
    }

    getFaitFaillite(){
        return this.faitFaillite;
    }

    getEstLibre(){
        return this.estLibre;
    }

    getEstElimine(){
        return this.estElimine;
    }
  
    // Setter
    setMonPion(nvPion) {
        this.monPion = nvPion;
    }
  
    setMonArgent(nvArgent){
        this.monArgent = nvArgent;
    }
  
    setListePropriete(nvListePropriete){
        this.listePropriete = nvListePropriete;
    }
  
    setFaitFaillite(nvFaitFaillite){
        this.faitFaillite = nvFaitFaillite;
    }
  
    setEstLibre(nvEstLibre){
        this.estLibre = nvEstLibre;
    }
  
    setEstElimine(nvEstElimine){
        this.estElimine = nvEstElimine;
    }

    //Methodes
    debiter(valeurADebiter){
        this.monArgent -= valeurADebiter;
    }

    crediter(valeurACrediter){
        this.monArgent += valeurACrediter;
    }
}