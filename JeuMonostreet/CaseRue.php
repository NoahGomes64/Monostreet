<?php

include("Propriete.php");
include("Joueur.php");
class CaseRue extends Propriete
{
    private $_couleur;
    private $_prixMaison;
    private $_niveauAmelioration;
    private $_valeurRevenue;
    private $_valeurPropriete;
    private const COEF_REVENUE_VIDE = (1/10);
    private const COEF_REVENUE_COULEURS = 2;
    private const COEF_REVENUE_1MAISON = 3;
    private const COEF_REVENUE_2MAISON = 3;
    private const COEF_REVENUE_3MAISON = 2;
    private const COEF_REVENUE_4MAISON = $this->_prixMaison;
    private const NIVEAU_AMELIORATION_MAX = 4;


    //Constructeur
    function __construct($nom, $positionPlateau, $couleur) {
        parent::__construct($nom, $positionPlateau, (40 + 10*$this->_positionPlateau));
        $this->_couleur = $couleur;
        $this->_prixMaison = ($this->_positionPlateau * (3/5));
        $this->_niveauAmelioration = 0;
        $this->_valeurPropriete = $this->_prixAchat;
    }

    //Getter
    public function getCouleur(){
        return $this->_couleur;
    }

    public function getPrixMaison(){
        return $this->_prixMaison;
    }

    public function getNiveauAmelioration(){
        return $this->_niveauAmelioration;
    }

    public function getValeurRevenue(){
        return $this->_valeurRevenue;
    }

    //Setter
    public function setCouleur($nvCouleur){
        $this->_couleur = $nvCouleur;
    }

    public function setPrixMaison($nvPrixMaison){
        $this->_prixMaison = $nvPrixMaison;
    }

    public function setNiveauAmelioration($nvNiveauAmelioration){
        $this->_niveauAmelioration = $nvNiveauAmelioration;
    }

    public function setValeurRevenue($nvValeurRevenue){
        $this->_valeurRevenue = $nvValeurRevenue;
    }

    //Methodes
    public function ameliorer(){
        switch ($this->_niveauAmelioration) {
            case 0:
                $this->_valeurRevenue *= COEF_REVENUE_COULEURS;
                break;
            case 1:
                if ($this->_proprietaire->depenser($this->_prixMaison)) {
                    $this->_valeurRevenue *= COEF_REVENUE_1MAISON;
                    $this->_valeurPropriete += $this->_prixMaison;
                }
                break;
            case 2:
                if ($this->_proprietaire->depenser($this->_prixMaison)) {
                    $this->_valeurRevenue *= COEF_REVENUE_2MAISON;
                    $this->_valeurPropriete += $this->_prixMaison;
                }
                break;
            case 3:
                if ($this->_proprietaire->depenser($this->_prixMaison)) {
                    $this->_valeurRevenue *= COEF_REVENUE_3MAISON;
                    $this->_valeurPropriete += $this->_prixMaison;
                }
                break;
            case 4:
                if ($this->_proprietaire->depenser($this->_prixMaison)) {
                    $this->_valeurRevenue += COEF_REVENUE_4MAISON;
                    $this->_valeurPropriete += $this->_prixMaison;
                }
                break;
            default:
                # code...
                break;
        }
    }
}

?>