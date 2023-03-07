<?php
include("pion.php");
class Joueur {
    private $_nom;
    private Pion $_monPion;
    private $_monArgent;
    private $_position;
    private Propriete $_listePropriete=[];
    private bool $_faitFaillite;
    private bool $_estLibre;
    private const CAGNOTTE_DE_DEBUT = 1500;


    //Getter
    public function getNom(){
        return $this->_nom;
    }
    
    public function getPion(){
        return $this->_monPion;
    }

    public function getArgent(){
        return $this->_monArgent;
    }

    public function getPosition(){
        return $this->_position;
    }

    public function getListePropriete(){
        return $this->_listePropriete;
    }

    public function getFaitFaillite(){
        return $this->_faitFaillite;
    }

    public function getEstLibre(){
        return $this->_estLibre;
    }
    

    //Setter
    public function setNom($nvNom){
        $this->_nom = $nvNom;
    }
    
    public function setPion($nvPion){
        return $this->_monPion;
    }

    public function setArgent($nvArgent){
        return $this->_monArgent;
    }

    public function setPosition($nvPosition){
        $this->_position = $nvPosition;
    }

    public function setListePropriete($nvPropriete){
        $this->_listePropriete = $nvPropriete;
    }

    public function setFaitFaillite($nvFaillite){
        $this->_faitFaillite = $nvFaillite;
    }

    public function setEstLibre($nvLibre){
        $this->_estLibre = $nvLibre;
    }


    //Methodes
    public function allerEnPrison(){
        $this->_estLibre = false;
    }

    public function sortirDePrison() {
        $this->_estLibre = true;
    }

    public function debiter($valeurADebiter) {
        if ($this->_monArgent - $valeurADebiter >= 0){
            $this->_monArgent -= $valeurADebiter;
        }
        else {
            
        }
    }

    public function crediter($valeurACrediter){
        $this->_monArgent += $valeurACrediter;
    }

    public function acheter(){

    }
}
?>