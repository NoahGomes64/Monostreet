<?php
include('Joueur.php');
class Propriete {
    private $_nom;
    private $_positionPlateau;
    private $_prixAchat;
    private Joueur $_proprietaire;
    

    //Constructeur
    function __construct($nom, $positionPlateau, $prixAchat)
    {
        $this->_nom = $nom;
        $this->_positionPlateau = $positionPlateau;
        $this->_prixAchat = $prixAchat;
        $this->_proprietaire = null;
    }

    //Getter
    public function getNom(){
        return $this->_nom;
    }

    public function getPositionCarte(){
        return $this->_positionPlateau;
    }

    public function getProprietaire(){
        return $this->_proprietaire;
    }

    //Setter
    public function setNom($nvNom){
        $this->_nom = $nvNom;
    }

    public function setPositionCarte($nvPosition){
        $this->_positionCarte = $nvPosition;
    }

    public function setProprietaire($nvProprietaire){
        $this->_proprietaire = $nvProprietaire;
    }


    //Méthodes
    
}
?>