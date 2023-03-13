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

//Donc on vire et on ajoute
//require '../connexionBD.php';

// Si l'utilisateur est deja connecter il ne pourra plus aller se connecter vers cette page on resolvera ;)
/*
if (isset($_SESSION['user_id'])) {
    //Redirection vers la page de bienvenue
    header("Location: ../index.php");
    exit();
}
*/
//Mais on inclu le fichier de config au lieu de connexion bd
require_once "config.php";

// On initialise des variables de message d'erreur et de succès
$message = "";
$success = "";

//Traitement du form
if (isset($_POST['login'])) {
    // On reccupere des données du form
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validation des données
    if (empty($email) || empty($password)) {
        $message = "Veuillez remplir tous les champs.";
    } else {
        // On verifie si l'utilisateur existe dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM compte WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mdp'])) {
            // On verifie maintenant si l'utilisateur est administrateur
            if ($user['estPrivilegie'] == 1) {
                // On creer la session et on redicrection l'admin vers la page d'administration
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['last_activity'] = time();
                $_SESSION['estPrivilegie'] = 1;
                //Redirection ;)
                header("Location: ../administrateur.php");
                exit();
            } elseif ($user['estPrivilegie'] == 0) {
                // Création de la session et redirection vers la page d'accueil
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['last_activity'] = time();
                $_SESSION['estPrivilegie'] = 0;
                //Vers fonctionnalite dedide aux utilisateur cad page d'accueil
                header("Location: ../index.php");
                exit();
            }
        } else {
            $message = "Adresse e-mail ou mot de passe incorrect.";
        }
    }
}
?>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MONOSTREET | Connexion</title>
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
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-864e">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">CONNEXION</h1>
          <!----Affichage des message d'erreur (pas neccessairement important)--->

          <?php if (!empty($message)) : ?>
              <p><?php echo $message; ?></p>
          <?php endif; ?>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-19-lg u-size-19-xl u-size-23-md u-size-23-sm u-size-23-xs u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h2 class="u-text u-text-2">PAS DE COMPTE ?</h2>

                    <!---Balise a ok impl-->
                  <a href="../pageInscription/inscription.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-1">inscription</a>

                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-37-md u-size-37-sm u-size-37-xs u-size-41-lg u-size-41-xl u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <div class="u-expanded-width u-form u-form-1">

                      <!-Formulaire-->
                      <!--Pas besoin de rajouter une action a cause des session action="connexion.php"  -->
                    <form style="padding: 10px;" method="post">
                        <!--Email-->
                      <div class="u-form-group u-form-name">
                        <label for="email" class="u-label u-label-1">ADRESSE EMAIL</label>
                          <input type="email" placeholder="Saisir votre email" id="email" name="email" class="u-input u-input-rectangle u-radius-46 u-white u-input-1" required="required">
                      </div>
                      </div>
                        <!--mot de passe--->
                      <div class="u-form-group">
                        <!--<label for="email-1eed" class="u-label u-label-2">MOT DE PASSE</label> ??---->
                          <label for="password" class="u-label u-label-2">MOT DE PASSE</label>
                          <input type="password" placeholder="Saisir votre mot de passe" id="password" name="password" class="u-input u-input-rectangle u-radius-46 u-white u-input-2" required>
                      </div>
                     <br>
                      <button type="submit" name="login" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">SE CONNECTER</button> <!--Pourquoi repeter connexion 2 fois--->
                    </form>
                  </div>
                  
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
      <a class="u-link" href="../pageConfidentialite/confidentialite.php">
        <span>Politique de confidentialite</span>
      </a>
    </section>
</body></html>
