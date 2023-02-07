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




?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Inscription</title>
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
		"url": "/",
		"logo": "images/logo.PNG"
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
        <h1 class="u-text u-text-default u-title u-text-1">INSCRIPTION</h1>
        <div class="u-form u-form-1">
          <form action="inscription.php" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px;" method="post">
            <div class="u-form-group u-form-group-1">
              <label for="text-f5ff" class="u-label u-label-1">ADRESSE MAIL</label>
              <input type="text" id="text-f5ff" name="email" class="u-input u-input-rectangle u-radius-46 u-white u-input-1" placeholder="Saisir votre adresse mail">
            </div>
            <div class="u-form-group u-form-name">
              <label for="name-1eed" class="u-label u-label-2">PSEUDO</label>
              <input type="text" placeholder="Saisir votre pseudo" id="name-1eed" name="pseudo" class="u-input u-input-rectangle u-radius-46 u-white u-input-2" required="">
            </div>
            <div class="u-form-group">
              <label for="email-1eed" class="u-label u-label-3">MOT DE PASSE</label>
              <input placeholder="Saisir votre mot de passe" id="email-1eed" name="mdp" class="u-input u-input-rectangle u-radius-46 u-white u-input-3" required="required" type="text">
            </div>
            <div class="u-form-group u-form-group-4">
              <label for="text-4ab2" class="u-label u-label-4">CONFIRMATION DU MOT DE PASSE</label>
              <input type="text" placeholder="Saisir de nouveau votre mot de passe" id="text-4ab2" name="mdpConfirm" class="u-input u-input-rectangle u-radius-46 u-white u-input-4">
            </div>
            <button type="submit" name="inscription" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">inscription</button>
          </form>
        </div>
        
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUT DROITS RESERVES</p>
      </div></footer>
    
  
</body>
<?php
//si le bouton "Connexion" est cliqué 
if(isset($_POST['inscription'])){
  echo "ok";
  // on vérifie que le champ "Pseudo" n'est pas vide
  // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien
  if (!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdpConfirm'])) {
    $adresseDispo = true;
    $connection = mysqli_connect("lakartxela","garricastres_bd","garricastres_bd","garricastres_bd");
    $query = 'SELECT email FROM compte';
    $result = $connection->query($query);
    foreach ($result as $row) {
      if ($row == $_POST['email']) {
        echo "adresse email deja utilisée";
        $adresseDispo = false;
      }
    }
    $pseudoDispo = true;
    $query = 'SELECT nom FROM compte';
    $result = $connection->query($query);
    foreach ($result as $row) {
      if ($row == $_POST['pseudo']) {
        echo "Pseudo invalide";
        $pseudoDispo = false;
      }
    }
    if ($pseudoDispo && $adresseDispo) {
      $sql = "SELECT * FROM compte";
      $result = mysqli_query($connection, $sql);
      $compteur = mysqli_num_rows($result);
      $compteur ++;
      $sql = "INSERT INTO compte VALUES ('$compteur', 'ok', 'ok', '0', 'ok')";
      mysqli_query($connection, $sql);
    }
  }
  else {
    if (empty($_POST['email'])) {
      echo "Le champs E-mail est vide";
    }
    if (empty($_POST['pseudo'])) {
      echo "Le champs pseudo est vide";
    }
    if (empty($_POST['mdp'])) {
      echo "Le champs Mot de Passe est vide";
    }
    if (empty($_POST['mdpConfirm'])) {
      echo "Vous n'avez pas confirmé votre mdp";
    }
  }
}
?>
</html>