<?php
/**
 * @file profil.php 
 * @brief fichier permettant a etablire la connexion et deconnexion des utilisateur depuis leur profil
 * @autor Guillaume Arricastre
 * version 
 * date 
 * 
 * */
session_start();
require '../connexionBD.php';


$stmt = $connection->prepare("SELECT email FROM compte WHERE nom=:nom");
$stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
$stmt->execute();
$email = $stmt->fetch();

// si le bouton "Enregistré" est cliqué
if(isset($_POST['confirmer'])){

  $stmt = $connection->prepare("SELECT id FROM compte WHERE nom=:nom");
    $stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
    $stmt->execute();
    $id=$stmt->fetch();
    $MotDePasse = password_hash(strip_tags($_POST['mdp']),PASSWORD_DEFAULT);

    if (password_verify($_POST['bonMdp'], $MotDePasse)){

    
        
        $stmt = $connection->prepare("UPDATE compte SET mdp= :mdp WHERE id=$id[0]");
        $stmt->bindParam(':mdp', $MotDePasse, PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['mdp'] = $MotDePasse;
        header ('location: ../index.php');
    }
    else{
      echo "Les mots de passe ne correspondent pas";
    }
  }






?>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="modification du profil">
    <meta name="description" content="">
    <title>MONOSTREET | Modification</title>
    <link rel="shortcut icon" href="images/logo.PNG" />
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Page-1.css" media="screen">
    
    <meta name="generator" content="Nicepage 5.5.0, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "WebSite3965907",
		"logo": "images/logo.PNG"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 1">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-black u-clearfix u-header u-sticky u-header" id="sec-e5d6"><div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
        <a href="../index.php" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/retour.png" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-7434">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-hover-feature u-text u-text-default u-title u-text-1">modification du mot de passe</h1>
        <div class="u-form u-form-1">
          <form  method="POST" action="nouveauMdp.php" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="email" name="form" style="padding: 10px;">
            <div class="u-form-group u-form-name">
              <label for="name-c594" class="u-label u-label-1">Nouveau mot de passe</label>
              <input type="password" placeholder="Saisir votre nouveau mot de passe" id="name-c594" name="mdp" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-50 u-white" required="">
            </div>
            <div class="u-form-email u-form-group">
              <label for="email-c594" class="u-label u-label-2">Confirmation du nouveau mot de passe</label>
              <input type="password" placeholder="Confirmer votre nouveau mot de passe" id="email-c594" name="bonMdp" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-50 u-white" required="">
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              
            </div>
            
          
        </div>
        
        <button type="submit" name="confirmer" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">CONFIRMER</button>
      </div>
    </form>
      
      
    </section>
    <style class="u-overlap-style">.u-overlap:not(.u-sticky-scroll) .u-header {
background-color: #000000 !important
}</style>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUS DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="../pageConfidentialite/confidentialite.php">
          <span>Politique de confidentialite</span>
        </a>
      </section>
  
</body></html>