<?php
session_start();

require '../connexionBD.php';
include("../rechercheDeRue/main.php");
$lesRues = listeDeRues1("../rechercheDeRue/Oloron80.csv");
$listeParNom = [];
foreach ($lesRues as $nomDeRues) {
    $listeParNom[] = $nomDeRues[1];
    }
?>
<?php



if(isset($_POST['envoieCodePartie'])){
  header("Location: ../jeu.php?code=".$_POST['codePartie']);
}


?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="POLITIQUE DE CONFIDENTIALITE">
    <meta name="description" content="">
    <title>MONOSTREET | Jouer</title>
    <link rel="shortcut icon" href="images/logo.PNG" />
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Copie-de-confidentialite.css" media="screen">
    
    <meta name="generator" content="Nicepage 5.4.10, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "WebSite3965907",
		"logo": "images/logo.PNG"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Copie de confidentialite">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-black u-clearfix u-header u-sticky u-header" id="sec-e5d6"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="../index.php" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/retour.png" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-ba94">
      <div class="u-clearfix u-sheet u-valign-bottom-xs u-sheet-1">
        <h1 class=" u-hover-feature u-text u-text-default u-title u-text-1">jouer</h1>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-valign-top u-container-layout-2">
                  <div class="u-container-layout u-container-layout-1">
                  <h3 class="u-hover-feature u-text u-text-default u-text-3">Vous pouvez seulement rejoindre une partie sans être authentifié !</h3>             
                  </div>
                  
                 
                </div>
              </div>
              
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-top u-container-layout-2">
                  <h1 class="u-hover-feature u-text u-text-default u-text-3">REJOINDRE UNE PARTIE</h1>
                  <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-form-2">
                    <form method="POST" action="" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px;">
                      <div class="u-form-email u-form-group u-label-top">
                        <label for="email-709f" class="u-label u-label-4">Code de la partie</label>
                        <input type="text" placeholder="Entrez un code" id="email-709f" name="codePartie" class="u-border-1 u-border-white u-input u-input-rectangle u-radius-50 u-white u-input-3" required="">
                      </div>
                      <div class="u-align-left u-form-group u-form-submit u-label-top">
                        
                      </div>
                      
                    
                  </div>
                  
                  <button type="submit" name="envoieCodePartie" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">Rejoindre</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      
      
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUS DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="../pageConfidentialite/confidentialite.php">
        <span>Politique de confidentialite</span>
      </a>
    </section>
  
</body></html>