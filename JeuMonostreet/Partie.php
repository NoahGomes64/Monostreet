<?php
class Partie
{
    private $_numeroTour;

    //Constructeur
    function __construct(){
        $this->_numeroTour = 1;
    }

    //Getter
    public function getNumeroTour(){
        return $this->_numeroTour;
    }

    //Setter
    public function setNumeroTour($nvTour){
        $this->_numeroTour = $nvTour;
    }

    //Methodes
    public function tourSuivant(){
        $this->_numeroTour ++;
    }
}

?>