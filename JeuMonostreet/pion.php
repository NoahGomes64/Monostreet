<?php
class Pion {
    private $_position;
    private Couleur $_couleur;

    public function setPosition($nvPosition){
        $this->_position = $nvPosition;
    }
    public function getPosition(){
        return $this->_position;
    }
<<<<<<< HEAD
    public function setCouleur(Couleur $nvCouleur){
        $this->_couleur = $nvCouleur;
=======
    public function setCouleur(Couleur $_couleur){
        $this->_couleur=$_couleur;
>>>>>>> MS1
    }
    public function getCouleur(){
        return $this->_couleur;
    }
    public function avancer(){

    }
    public function allerEnPrison(){

    }
}
?>