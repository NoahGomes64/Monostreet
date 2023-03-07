<?php
class De {
    
    private $_valeur;

    public function setValeur($nouvValeur){
        $this->valeur = $nouvValeur;
    }

    public function getValeur(){
        return $this->_valeur;
    }
    
    public function lancerDe(){
        $this.setValeur(rand(1,6));
    }
}
?>