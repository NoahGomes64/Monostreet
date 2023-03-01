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
if(isset($_POST['enregistrer'])){

  $dossier = 'upload/';
  $fichier = basename($_FILES['profil']['name']);
  $taille_maxi = 100000;
  $taille = filesize($_FILES['profil']['tmp_name']);
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['profil']['name'], '.'); 
  //Début des vérifications de sécurité...
  if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
  {
       $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
  }
  if($taille>$taille_maxi)
  {
       $erreur = 'Le fichier est trop gros...';
  }
  if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
  {
       //On formate le nom du fichier ici...
       $fichier = strtr($fichier, 
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
       $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
       if(move_uploaded_file($_FILES['profil']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
       {
            echo 'Upload effectué avec succès !';
            $image="/upload";
            $image .= $fichier;

            $stmt = $connection->prepare("SELECT id FROM compte WHERE nom=:nom");
    $stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
    $stmt->execute();
    $id=$stmt->fetch();

    
        
        $stmt = $connection->prepare("UPDATE compte SET photo= :photo WHERE id=$id[0]");
        $stmt->bindParam(':photo',$image, PDO::PARAM_STR);

        $stmt->execute();

        $stmt = $connection->prepare("SELECT photo FROM compte WHERE nom=:nom");
$stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
$stmt->execute();
$photo = $stmt->fetch();

       }
       else //Sinon (la fonction renvoie FALSE).
       {
            echo 'Echec de l\'upload !';
       }
  }
  else
  {
       echo $erreur;
  }


$adresse="upload/"; //Adresse du dossier sans oublier le / à la fin.
$dossier=Opendir($adresse); //Ouverture du dossier.
while ($Fichier = readdir($dossier)) //On affiche les fichiers les uns après les autres.
{
     //Maintenant, on affiche les fichiers sous forme de liens vers les fichiers 
     //(NB : Les lien sont en target="_blank" ce qui signifie qu'ils ouvrirons une nouvelle page dans votre navigateur !).
     echo '<a href='.$adresse.$Fichier.' target="_blank">'.$Fichier.'</a><br>';
}
closedir($dossier);

  $stmt = $connection->prepare("SELECT id FROM compte WHERE nom=:nom");
    $stmt->bindParam(':nom', $_SESSION['pseudo'], PDO::PARAM_STR);
    $stmt->execute();
    $id=$stmt->fetch();

    
        
        $stmt = $connection->prepare("UPDATE compte SET nom= :nom ,email= :email WHERE id=$id[0]");
        $stmt->bindParam(':nom', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['mdp'] = $_POST['mdp'];


        //header ('location: ../index.php');
  }






?>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="modification du profil">
    <meta name="description" content="">
    <title>Modification du profil</title>
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
          <img src="images/logo.PNG" class="u-logo-image u-logo-image-1">
        </a>
      </div><style class="u-sticky-style" data-style-id="1613">.u-sticky-fixed.u-sticky-1613:before, .u-body.u-sticky-fixed .u-sticky-1613:before {
borders: top right bottom left !important; border-color: #404040 !important; border-width: 2px !important
}</style></header>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1503" data-image-height="1000" id="sec-7434">
      <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">modification du profil</h1>
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
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                  <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="<?php echo $photo[0]?>" alt="" data-image-width="1280" data-image-height="1280">
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-3">
                  <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                    <form method="POST" action="modification.php" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"  enctype="multipart/form-data" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                      
     <!-- On limite le fichier à 10Mo -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     PHOTO DE PROFIL <br>
     <input type="file" name="profil" id="profil">
     <br>
     
                        <label for="name-3c8c" class="u-label">PSEUDO</label>
                        <input type="text" value="<?php echo $_SESSION['pseudo']?>" id="name-3c8c" name="pseudo" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-50 u-white" required="">
                      </div>
                      <div class="u-form-email u-form-group">
                        <label for="email-3c8c" class="u-label">EMAIL</label>
                        <input type="email" value="<?php echo $email[0]?>" id="email-3c8c" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-50 u-white" required="">
                        
                      </div>
                      <div class="u-align-left u-form-group u-form-submit">
                      <a href="../pageNouveauMdp/nouveauMdp.php" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-3">Modification du Mot de Passe ?<br></a>
                      </div>
                     
                    
                  </div>
                </div>
                <br>
               
              </div>
            </div>
          </div>
        </div>
      
        <button type="submit" name="enregistrer" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-5-base u-palette-3-base u-radius-50 u-btn-2">ENREGISTRER</button>

        
      </div>
      </form>
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