<?php
/**
 * @file MonoStreet.php 
 * @brief La page d'acceuil du site MonoStreet
 * @autor Guillaume Arricastre, KOFFI jean-jonathan
 * version 
 * date 12/01/2023
 * 
 * */
session_start();
?>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="MONOSTREET">
    <meta name="description" content="">
    <title>MONOSTREET | Accueil</title>
    <link rel="shortcut icon" href="images/logo.PNG" />
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.4.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "WebSite3965907",
		"logo": "images/logo.PNG"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Accueil">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-black u-clearfix u-header u-sticky u-header" id="sec-e5d6"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/logo.PNG" class="u-logo-image u-logo-image-1">
        </a>
        <?php
                if(!isset($_SESSION['pseudo'])){
                  echo "<a href='pageConnexion/connexion.php?' class='u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1'>SE CONNECTER<br>
                  </a>";
                }
                else{
                  echo "<a href='pageProfil/profil.php' class='u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1'>MON COMPTE<br>
                  </a>";
                }
            ?>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="1936" data-image-height="1288" id="sec-dd21">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">MONOSTREET</h1>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <a href="pageJouer/jouer.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1">jouer</a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUS DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="pageConfidentialite/confidentialite.php">
        <span>Politique de confidentialite</span>
      </a>
    </section>
</body></html>