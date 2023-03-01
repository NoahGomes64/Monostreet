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
$stmt = $connection->prepare("SELECT photo FROM compte WHERE nom=:nom");
$stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
$stmt->execute();
$photo = $stmt->fetch();

?>



<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="modification du profil">
    <meta name="description" content="">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Page-1.css" media="screen">
   
    <meta name="generator" content="Nicepage 5.5.0, nicepage.com">
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
          <img src="images/retour.PNG" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-7434">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-hover-feature u-text u-text-default u-title u-text-1">profil</h1>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-2">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-2">
                    <div class="u-container-layout u-valign-middle u-container-layout-2">
                      <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="../pageModification/<?php echo $photo[0]?>" alt="" data-image-width="1280" data-image-height="1280">
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3">
                      <h1 class="u-text u-text-default u-text-2">Bienvenue</h1>
                      <h2 class="u-hover-feature u-text u-text-default u-text-3">Pseudo:&nbsp;<?php echo $_SESSION['pseudo']?><br>
                      </h2>
                      <h2 class="u-hover-feature u-text u-text-default u-text-4">Adresse&nbsp;Mail:<br><?php echo $email[0]?></h2>
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-4">
                      <a href="../pageModification/modification.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1">modifier le profil</a>
                      <a href="../pageHistorique/historique.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">historique des parties</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="../deconnexion.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-3">deconnexion<br>
        </a>
      </div>
      
      
      
    </section>
    <style class="u-overlap-style">.u-overlap:not(.u-sticky-scroll) .u-header {
background-color: #000000 !important
}</style>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUT DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="../pageConfidentialite/confidentialite.php">
          <span>Politique de confidentialite</span>
        </a>
      </section>
  
</body></html>