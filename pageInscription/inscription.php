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
require '../connexionBD.php';

// si le bouton "Connexion" est cliqué
if(isset($_POST['connexion'])){
  // vérification que les champs "Pseudo" et "Mot de passe" ne sont pas vides
  if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
    $Pseudo = strip_tags($_POST['pseudo']);
    $MotDePasse = password_hash(strip_tags($_POST['mdp']),PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
    
    try {
      $stmt = $connection->prepare("SELECT * FROM compte WHERE nom = :nom AND mdp = :mdp");
      $stmt->bindParam(':nom', $Pseudo, PDO::PARAM_STR);
      $stmt->bindParam(':mdp', $MotDePasse, PDO::PARAM_STR);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        $_SESSION['pseudo'] = $Pseudo;
        $_SESSION['mdp'] = $MotDePasse;
        header ('location: ../index.php');
      } else {
        echo "Mauvais identifiants fournis";
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}

// si le bouton "Inscription" est cliqué
if(isset($_POST['inscription'])){
  // vérification que les champs "Email", "Pseudo", "Mot de passe" et "Confirmation du mot de passe" ne sont pas vides
  if (!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdpConfirm'])) {
    $adresseDispo = true;
    $MotDePasseHash = password_hash(strip_tags($_POST['mdp']),PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
    $stmt = $connection->prepare("SELECT * FROM compte WHERE email=:email");
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $message='Adresse email déjà utilisée';
      echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
      $adresseDispo = false;
    }

    $pseudoDispo = true;
    $stmt = $connection->prepare("SELECT * FROM compte WHERE nom=:nom");
    $stmt->bindParam(':nom', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $message='Pseudo déjà utilisé';
      echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
      $pseudoDispo = false;
    }
    
    if ($pseudoDispo && $adresseDispo) {
        // si le pseudo et l'adresse email sont disponibles, on peut inscrire le nouvel utilisateur
        $stmt = $connection->query("SELECT MAX(id) as max_id FROM compte");
        $max = $stmt -> fetch(PDO::FETCH_ASSOC);

        $compteur = $max['max_id'];
        $compteur ++;
        $stmt = $connection->prepare("INSERT INTO compte (id, nom, mdp, estPrivilegie, email) VALUES (:id, :nom, :mdp, :estPrivilegie, :email)");
        $stmt->bindParam(':id', $compteur, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $MotDePasseHash, PDO::PARAM_STR);
        $stmt->bindValue(':estPrivilegie', 0, PDO::PARAM_INT);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['mdp'] = $MotDePasseHash;
        header ('location: ../index.php');
  }
}
}


?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MONOSTREET | Inscription</title>
    <link rel="shortcut icon" href="images/logo.PNG" />
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="Page-2.css" media="screen">

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
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-black u-clearfix u-header u-sticky u-header" id="sec-e5d6"><div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
        <a href="../index.php" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600">
          <img src="images/retour.png" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">
      .u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
        borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
      }
</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-864e">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">INSCRIPTION</h1>
        <div class="u-expanded-width-xs u-form u-form-1">
          <form action="inscription.php" style="padding: 10px;" method="post">
            <div class="u-form-group u-form-group-1">
              <label for="text-443c" class="u-label u-label-1">ADRESSE MAIL</label>
              <input type="email" placeholder="Saisir votre adresse mail" id="text-443c" name="email" class="u-input u-input-rectangle u-radius-46 u-white u-input-1" required="required">
            </div>
            <div class="u-form-group u-form-name u-form-group-2">
              <label for="name-1eed" class="u-label u-label-2">PSEUDO</label>
              <input type="text" placeholder="Saisir votre pseudo" id="name-1eed" name="pseudo" class="u-input u-input-rectangle u-radius-46 u-white u-input-2" required="required">
            </div>
            <div class="u-form-group u-form-group-3">
              <label for="email-1eed" class="u-label u-label-3">MOT DE PASSE</label>
              <input placeholder="Saisir votre mot de passe" id="email-1eed" name="mdp" class="u-input u-input-rectangle u-radius-46 u-white u-input-3" required="required" type="password">
            </div>
            <div class="u-form-group u-form-group-4">
              <label for="text-1100" class="u-label u-label-4">CONFIRMATION DU MOT DE PASSE</label>
              <input type="password" placeholder="Saisir de nouveau votre mot de passe" id="text-4ab2" name="mdpConfirm" class="u-input u-input-rectangle u-radius-46 u-white u-input-4" required="required">
            </div>
           <br>
            <button type="submit" name="inscription" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">inscription</button>
          </form>
        </div>

 
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-98d6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUS DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="../pageConfidentialite/confidentialite.php">
        <span>Politique de confidentialite</span>
      </a>
    </section>
  
</body>
</html>
