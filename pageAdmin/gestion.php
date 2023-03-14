<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="modification du profil">
    <meta name="description" content="">
    <title>MONOSTREET | Administration</title>
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
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/logo.PNG" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-7434">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-hover-feature u-text u-text-default u-title u-text-1">GESTION DES UTILISATEURS</h1>
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="25%">
              <col width="15%">
              <col width="35%">
              <col width="25%">
            </colgroup>
            <thead class="u-align-center u-custom-font u-font-roboto u-table-header u-table-header-1">
              <tr style="height: 53px;">
                <th class="u-border-2 u-border-palette-3-base u-table-cell">NOM</th>
                <th class="u-border-2 u-border-palette-3-base u-table-cell">ADRESSE&nbsp;<br>E-MAIL
                </th>
                <th class="u-border-2 u-border-palette-3-base u-table-cell">RÔLE</th>
                <th class="u-border-2 u-border-palette-3-base u-table-cell">ACTIONS</th>
              </tr>
            </thead>
            <tbody class="u-table-body">
            <?php foreach ($stmt as $user):
         ?>
              <tr style="height: 44px;">
                <td class="u-border-2 u-border-palette-3-base u-table-cell"><?php echo $user["nom"]; ?></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"><?php echo $user["email"]; ?></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"><?php if($user["estPrivilegie"]==0){
                  
                  echo "Utilisateur";
                }
                else{
                  echo "Administrateur";
                }  ?></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"><a href="modifier_utilisateur.php?id=<?php echo $user["id"]; ?>">Modifier</a>
                <a href="supprimer_utilisateur.php?id=<?php echo $user["id"]; ?>">Supprimer</a></td>
              </tr>
              <tr style="height: 25px;">
                <td class="u-border-2 u-border-palette-3-base u-table-cell"></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"></td>
                <td class="u-border-2 u-border-palette-3-base u-table-cell"></td>
              </tr>

             
       
    <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a href="https://nicepage.one" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1">RETOUR PAGE ADMINISTRATION</a>
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