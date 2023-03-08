<?php

include("Propriete.php");
include("Joueur.php");
class CaseRue extends Propriete
{
    private $_prixAchat;
    private $_prixMaison;
    private $_niveauAmelioration;
    private $_valeurRevenue;
    private Joueur $_proprietaire;


    //Constructeur
    function __construct($nom, $positionPlateau) {
        parent::__construct($nom, $positionPlateau);
        $this->_prixAmelioration = 
    }

    //Getter
    public function getPrixAchat(){
        return $this->$_prixAchat;
    }
    public function getPrixMaison(){
        return $this->_prixMaison;
    }

    public function getNiveauAmelioration(){
        return $this->_nom;
    }

    public function getValeurRevenue(){
        return $this->$_valeurRevenue;
    }

    public function getProprietaire(){
        return $this->_proprietaire;
    }
    
}

?>