<?php
include ("Joueur.php");
Interface ICaseCarte {
    
public function initialiserListe();
public function videListe();
}
class CaseCarteChance extends CasePlateau implements ICaseCarte{
    private carteChance $listeCarte=[];
    function __construct($nom, $positionPlateau) {
        parent::__construct($nom, $positionPlateau);
        $this->initialiserListe();
    }
    public function initialiserListe(){

    "Rendez-vous à la Rue de la Paix"
    "Avancer jusqu’à la case départ"
    "Rendez-vous à l’Avenue Henri-Martin. Si vous passez par la case départ, recevez F20 00"
    "Avancez au Boulevard de La Villette. Si vous passez par la case départ, recevez F20 00"
    "Vous êtes imposé pour les réparations de voirie à raison de F4 000 par maison et F11 50 par hôtel."
    "Avancez jusqu’à la Gare de Lyon. Si vous passez par la case départ, recevez F20 00"
    "Vous avez gagné le prix de mots croisés. Recevez F10 00"
    "La banque vous verse un dividende de F5 00"
    "Vous êtes libéré de prison. Cette carte peut être conservée jusqu’à ce qu’elle soit utilisée ou vendue."
    "Reculez de trois cases"
    "Aller en prison. Rendez-vous directement en prison. Ne franchissez pas par la case départ, ne touchez pas F20 00"
    "Faites des réparations dans toutes vos maisons. Versez pour chaque maison F2 500. Versez pour chaque hôtel F10 00"
    "Amende pour excès de vitesse F1 50"
    "Payez pour frais de scolarité F15 00"
    "Amende pour ivresse F2 00"
    "Votre immeuble et votre prêt rapportent. Vous devez toucher F15 00"
    }
    public function videListe(){

    }
}
class CaseCarteCommunaute extends CasePlateau implements ICaseCarte{
    private carteCommunaute $listeCarte=[];
    public function initialiserListe(){
        $newCarte = new carteCommunaute("Placez-vous sur la case départ",100, $leJoueur = new Joueur());
        
        "Erreur de la banque en votre faveur. Recevez F20 00"
        "Payez la note du médecin F5 00"
        "La vente de votre stock vous rapporte F5 00"
        "Vous êtes libéré de prison. Cette carte peut être conservée jusqu’à ce qu’elle soit utilisée ou vendue."
        "Aller en prison. Rendez-vous directement à la prison. Ne franchissez pas par la case départ, ne touchez pas F20 00"
        "Retournez à Belleville"
        "Recevez votre revenu annuel F 10 00"
        "C’est votre anniversaire. Chaque joueur doit vous donner F 1 00"
        "Les contributions vous remboursent la somme de F2 00"
        "Recevez votre intérêt sur l’emprunt à 7% F2 50"
        "Payez votre Police d’Assurance F5 00"
        "Payez une amende de F 1 00 ou bien tirez une carte « CHANCE »"
        "Rendez-vous à la gare la plus proche. Si vous passez par la case départ, recevez F20 00"
        "Vous avez gagné le deuxième Prix de Beauté. Recevez F1 00"
        "Vous héritez F10 00"
    }
    public function videListe(){

    }
}

class carteCommunaute {
    private Joueur $monJoueur;
    private $text;
    private $somme;
    private $deplacer;

    function __construct($nvNom,$nvSomme,Joueur $leJoueur){
        $this->text= $nvNom;
        if ($nvSomme>0 && $nvSomme<=40) {
            $this->somme=0;
            $this->deplacer= $nvSomme;
        }
        else {
            $this->somme=$nvSomme;
            $this->deplacer=0;
        }
        $this->monJoueur=$leJoueur;
    }
    public function getText(){
        return $this->text;
    }
    public function getSomme(){
        return $this->somme;
    }
    public function getDeplacement(){
        return $this->deplacer;
    }
    public function getJoueur(){
        return $this->monJoueur;
    }
    public function setText($nvText){
        $this->text= $nvText;
    }
    public function setSomme($nvSomme){
        $this->somme=$nvSomme;
    }
    public function setDeplacement($nvDeplacer){
        $this->deplacer= $nvDeplacer;
    }
    public function setJoueur(Joueur $nvJoueur){
        $this->monJoueur= $nvJoueur;
    }
    public function deplacer(){
        $this->monJoueur.seDeplacer($this->deplacer);
    }
    public function ajoutArgent(){
        $this->monJoueur.crediter($this->somme);
    }
}
class carteChance {
    private Joueur $monJoueur;
    private $text;
    private $somme;
    private $deplacer;

    function __construct($nvNom,$nvSomme,Joueur $leJoueur){
        $this->text= $nvNom;
        if ($nvSomme>0 && $nvSomme<=40) {
            $this->somme=0;
            $this->deplacer= $nvSomme;
        }
        else {
            $this->somme=$nvSomme;
            $this->deplacer=0;
        }
        $this->monJoueur=$leJoueur;
    }
    public function getText(){
        return $this->text;
    }
    public function getSomme(){
        return $this->somme;
    }
    public function getDeplacement(){
        return $this->deplacer;
    }
    public function getJoueur(){
        return $this->monJoueur;
    }
    public function setText($nvText){
        $this->text= $nvText;
    }
    public function setSomme($nvSomme){
        $this->somme=$nvSomme;
    }
    public function setDeplacement($nvDeplacer){
        $this->deplacer= $nvDeplacer;
    }
    public function setJoueur(Joueur $nvJoueur){
        $this->monJoueur= $nvJoueur;
    }
    public function deplacer(){
        $this->monJoueur.seDeplacer($this->deplacer);
    }
    public function ajoutArgent(){
        $this->monJoueur.crediter($this->somme);
    }
}
?>