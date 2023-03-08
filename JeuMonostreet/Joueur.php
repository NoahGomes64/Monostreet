<?php
include("pion.php");
class Joueur {
    
    private Pion $_monPion;
    private $_monArgent;
    private Propriete $_listePropriete=[];
    private bool $_faitFaillite;
    private bool $_estLibre;

    public function setPion(Pion $nvPion){
        $this->_monPion = $nvPion;
    }
    public function getPion(){
        return $this->_monPion;
    }
    public function setArgent($nvArgent){
        $this->_monArgent = $nvArgent;
    }
    public function getArgent(){
        return $this->_monArgent;
    }
    public function avancer(){
        
    }
    public function allerEnPrison(){
        
    }
}
?>