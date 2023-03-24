<?php
// On verifie si l'utilisateur est administrateur
session_start();
require '../connexionBD.php';


if (isset($_POST['sauvegarder'])) {
  // Nom du fichier de sauvegarde
  $backup_file = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

  // on a ajouté le nom de la table utilisateurs à la commande de sauvegarde, ce qui permet de ne sauvegarder que les données de cette table.
  $command = "mysqldump --user=" . $username . " --password=" . $password . " --host=" . $host . " " . $dbname . " utilisateurs > " . $backup_file;

  // Exécution de la commande
  system($command);

  echo "<p>La base de données a été sauvegardée dans le fichier $backup_file</p>";
  echo "<a href='' download=$backup_file>Telecharger</a>";

}


// Vérification si l'utilisateur a cliqué sur le bouton restaurer
if (isset($_POST['restaurer'])) {
  // Vérification si un fichier de sauvegarde a été sélectionné
  if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] == 0) {
      // Récupération du fichier de sauvegarde
      $backup_file = $_FILES['backup_file']['tmp_name'];

      // Commande de restauration de la base de données
      $command = "mysql --user=" . $username . " --password=" . $password . " --host=" . $host . " " . $dbname . " < " . $backup_file;

      // Exécution de la commande
      system($command);

      echo "<p>La base de données a été restaurée à partir du fichier $backup_file</p>";
  } else {
      echo "<p>Veuillez sélectionner un fichier de sauvegarde valide</p>";
  }
}

?>



<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="modification du profil">
    <meta name="description" content="">
    <title>MONOSTREET | Administration</title>
    <link rel="shortcut icon" href="images/logo.PNG" />
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.6.8, nicepage.com">
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
        <h1 class="u-hover-feature u-text u-text-default u-title u-text-1">administration</h1>
        <h2 class="u-text u-text-default u-text-2">BIENVENUE :  <?php echo $_SESSION['pseudo']; ?></h2>
        <h3 class="u-align-center u-text u-text-default u-text-white u-text-3">Sur cette page vous pouvez sauvegarder et restaurer la base de données</h3>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <form action="" method="POST">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">

                <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs u-container-layout-1">
                  <button type="submit" name="sauvegarder" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1">SAUVEGARDER</button>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs u-container-layout-2">
                <button type="submit" name="restaurer" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">RESTAURER</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
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