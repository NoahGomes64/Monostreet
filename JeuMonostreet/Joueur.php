<?php
include("pion.php");
class Joueur {
    private Pion $_monPion;
    private $_monArgent;
    private Propriete $_listePropriete = [];
    private bool $_faitFaillite;
    private bool $_estLibre;
    private bool $_estElimine;
    public const ARGENT_CASE_DEPART = 200;

    //Constructeur
    function __construct(){
        $this->_monArgent = 1500;
        $this->_listePropriete = [];
        $this->_faitFaillite = false;
        $this->_estLibre = true;
        $this->_estElimine = false;
    }

    //Getter
    public function getMonPion(){
        return $this->_monPion;
    }
    public function getMonArgent(){
        return $this->_monArgent;
    }
    public function getListePropriete(){
        return $this->_listePropriete;
    }
    public function getFaitFaillite(){
        return $this->_faitFaillite;
    }
    public function getEstLibre(){
        return $this->_estElimine;
    }
    public function getEstElimine(){
        return $this->_estElimine;
    }

    //Setter
    public function setMonPion($nvPion){
        $this->_monPion = $nvPion;
    }
    public function setMonArgent($nvArgent){
        $this->_monArgent = $nvArgent;
    }
    public function setListePropriete($nvListePropriete){
        $this->_listePropriete = $nvListePropriete;
    }
    public function setFaitFaillite($nvFaitFaillite){
        $this->_faitFaillite = $nvFaitFaillite;
    }
    public function setEstLibre($nvEstLibre){
        $this->_estLibre = $nvEstLibre;
    }
    public function setEstElimine($nvEstElimine){
        $this->_estElimine = $nvEstElimine;
    }

    //Methodes
    public function debiter($valeurADebiter){
        $this->_monArgent -= $valeurADebiter;
    }
    public function crediter($valeurACrediter){
        $this->_monArgent += $valeurACrediter;
    }
    public function payer(Joueur $unJoueur, $valeurAPayer){
        if ($this->_monArgent - $valeurAPayer < 0) {
            return false;
        }
        else {
            $this->debiter($valeurAPayer);
            $unJoueur->crediter($valeurAPayer);
        }
    }

    public function seDeplacer($numeroCase){
        $this->_monPion->seDeplacer($numeroCase);
        if ($this->_monPion->getPosition() > $numeroCase) {
            $this->crediter(ARGENT_CASE_DEPART);
        }
    }

    public function acheter(Propriete $unePropriete){
        if ($this->_monArgent - $unePropriete->_prixAchat < 0) {
            return false;
        }
        else {
            $this->debiter($unePropriete->_prixAchat);
            $this->_listePropriete[] = $unePropriete;
            $unePropriete->setProprietaire($this);
        }
    }

    public function acheterMaison(CaseRue $uneRue){
        if ($this->_monArgent - $uneRue->_prixMaison < 0) {
            return false;
        }
        else {
            $this->debiter($uneRue->_prixMaison);
            $uneRue->ameliorer();
        }
    }

    public function vendre(Propriete $unePropriete){
        unset($this->_listePropriete[array_search($unePropriete, $this->_listePropriete)]);
        $this->crediter($unePropriete->);
    }
}
?>