<?php
include('Joueur.php');
class Propriete {
    private $_nom;
    private $_positionPlateau;
    private $_prixAPayer;
    

    //Constructeur
    function __construct($nom, $positionPlateau)
    {
        $this->_nom = $nom;
        $this->_positionPlateau = $positionPlateau;
    }

    //Getter
    public function getNom(){
        return $this->_nom;
    }

    public function getPrixAPayer(){
        return $this->_prixAPayer;
    }

    public function getPrixAmelioration(){
        return $this->_prixAmelioration;
    }

    public function getNiveauAmelioration(){
        return $this->_niveauAmelioration;
    }

    public function getProprietaire(){
        return $this->_proprietaire;
    }

    //Setter
    public function setNom($nvNom){
        $this->_nom = $nvNom;
    }

    public function setPrixAPayer($nvPrixAPayer){
        $this->_prixAPayer = $nvPrixAPayer;
    }

    public function setPrixAmelioration($nvPrixAmelioration){
        $this->_prixAmelioration = $nvPrixAmelioration;
    }

    public function setNiveauAmelioration($nvNiveauAmelioration){
        $this->_niveauAmelioration = $nvNiveauAmelioration;
    }

    public function setProprietaire($nvProprietaire){
        $this->_proprietaire = $nvProprietaire;
    }


    //Méthodes
    public function ameliorer(){
        if ($this->_niveauAmelioration != self::AMELIORATION_MAX) {
            if ($this->_proprietaire.debiter($this->_prixAmelioration)) {
                $this->_niveauAmelioration ++;
            }
        }
    }

    
}
?>