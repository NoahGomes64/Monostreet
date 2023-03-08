<?php
include("../rechercheDeRue/Rue.php");

 class CasePlateau{
    protected $_numeroCase;
    protected $_nomCase;
    
    function __construct($num,$nom){
        $this->_numeroCase= $num;
        $this->_nomCase= $nom;
    }

    public function getNumero(){
        return $this->_numeroCase;
    }
    public function setNumero($nvNumero){
        $this->_numeroCase = $nvNumero;
    }
    public function getNom(){
        return $this->_nomCase;
    }
    public function setNom($nvNom){
        $this->_nomCase = $nvNom;
    }
    
}
?>