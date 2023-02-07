<?php
session_start();
/**
 * @file connexion.php 
 * @brief Page implementant la connexion des utilisateurs
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */

$login_valide_admin = "root";
$pwd_valide_admin = "root";


//si le bouton "Connexion" est cliqué
if(isset($_POST['connexion'])){
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien
    if(empty($_POST['pseudo'])){
        echo "Le champ Pseudo est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])){
            echo "Le champ Mot de passe est vide.";
        } else {
            
            $Pseudo =($_POST['pseudo']); 
            $MotDePasse =($_POST['mdp']);
            //on se connecte à la base de données:

            //on vérifie que la connexion s'effectue correctement:
            //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                
                if ($login_valide_admin == $_POST['pseudo'] && $pwd_valide_admin == $_POST['mdp']) {

                 $_SESSION['pseudo'] = $_POST['pseudo'];
                 $_SESSION['mdp'] = $_POST['mdp'];
                 $CONNEXION=true;

              
                header ('location: ../index.php');
         
                    
            }
            else {
                echo "Mauvais identifiants fournies";
            }
        }
    }
}

?>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Connexion</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Page-2.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.4.6, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "WebSite3965907",
		"url": "/"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 2">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <link rel="canonical" href="/">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-black u-clearfix u-header u-header" id="sec-e5d6"><div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
        <a href="../index.php" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/logo.PNG" class="u-logo-image u-logo-image-1">
        </a>
      </div></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-864e">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">connexion</h1>
        <div class="u-form u-form-1">
          <form action="connexion.php"  style="padding: 10px;" method="post">
            <div class="u-form-group u-form-name">
              <label for="name-1eed" class="u-label u-label-1">LOGIN</label>
              <input type="text" placeholder="Saisir votre login" id="login" name="pseudo" class="u-input u-input-rectangle u-radius-46 u-white u-input-1" required="">
            </div>
            <div class="u-form-group">
              <label for="email-1eed" class="u-label u-label-2">MOT DE PASSE</label>
              <input type="password" placeholder="Saisir votre mot de passe" id="password" name="mdp" class="u-input u-input-rectangle u-radius-46 u-white u-input-2" required="required">
            </div>
           
            <button type="submit" name="connexion" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">CONNEXION</button>
          </form>
        </div>
       
        <h3 class="u-text u-text-default u-text-2">PAS DE COMPTE ?</h3>
        <a href="../pageInscription/inscription.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-3">s'inscrire ?</a>
      </div>
    </section>
    
    

  
</body></html>