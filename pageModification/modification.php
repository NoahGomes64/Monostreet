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



$stmt = $connection->prepare("SELECT email FROM compte WHERE id=:id");
$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
$stmt->execute();
$email = $stmt->fetch();
$stmt = $connection->prepare("SELECT photo FROM compte WHERE id=:id");
$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
$stmt->execute();
$photo = $stmt->fetch();
$ok=false;

// si le bouton "Enregistré" est cliqué
if(isset($_POST['enregistrer'])){
  $pseudoDispo=true;
  $adresseDispo=true;
  $changementPseudo=true;
  $changementEmail=true;
 
    $pseudo=$_POST['pseudo'];
    $pseudo=htmlentities($pseudo);

    $stmt = $connection->prepare("SELECT * FROM compte WHERE nom=:nom");
    $stmt->bindParam(':nom', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
      $result=$stmt->fetch();
      if ($result[1]==$_SESSION['pseudo']){
        $pseudoDispo=true;
        $changementPseudo=false;
      }
      else {
        $message='Pseudo déjà utilisé';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        $pseudoDispo = false;
      }
    }
    
    
    $stmt = $connection->prepare("SELECT * FROM compte WHERE email=:email");
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
      $result=$stmt->fetch();
      if ($result[4]==$email[0]){
        $adresseDispo=true;
        $changementEmail=false;
      }
      else{
        $message='Adresse email déjà utilisée';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        $adresseDispo = false;
      }
      
    }
    if ( $changementEmail==false && $changementPseudo==false && ($_FILES['profil']['name'])==""){


      header ('location: ../index.php');
    }
    else{
      if ($pseudoDispo && $adresseDispo) {
        if(($_FILES['profil']['name'])!=""){
          
        $dossier = 'upload/';
        $fichier = basename($_FILES['profil']['name']);
        $taille_maxi = 500000;
        $taille = filesize($_FILES['profil']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG');
        $extension = strrchr($_FILES['profil']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
        }
        if($taille>$taille_maxi)
        {
             $erreur = 'Le fichier est trop volumineux... Choisissez une image plus petite !';
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
                  $image="upload/";
                  $image .= $fichier;
      
                  $id=$_SESSION['id'];   
      
          
              
              $stmt = $connection->prepare("UPDATE compte SET photo= :photo WHERE id=$id");
              $stmt->bindParam(':photo',$image, PDO::PARAM_STR);
      
              $stmt->execute();
      
              $stmt = $connection->prepare("SELECT photo FROM compte WHERE id=$id");
      
      $stmt->execute();
      $photoNouvelle = $stmt->fetch();
      $id=$_SESSION['id'];
      if ($photo[0]!="images/default.png"){
          unlink($photo[0]);
      }
      
          
              
              $stmt = $connection->prepare("UPDATE compte SET nom= :nom ,email= :email WHERE id=$id");
              $stmt->bindParam(':nom', $_POST['pseudo'], PDO::PARAM_STR);
              $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
              $stmt->execute();
              $_SESSION['pseudo'] = $_POST['pseudo'];
              //$_SESSION['mdp'] = $_POST['mdp'];
      $ok = true;
      
      
             }
             else //Sinon (la fonction renvoie FALSE).
             {
                  echo 'Echec de l\'upload ! Veuillez reessayer';
             }
        }
        else
        {
             echo $erreur;
        }
      
        
        }
      if(($_FILES['profil']['name'])==""){
       
        $id=$_SESSION['id'];
      
        
            
            $stmt = $connection->prepare("UPDATE compte SET nom= :nom ,email= :email WHERE id=$id");
            $stmt->bindParam(':nom', $_POST['pseudo'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            //$_SESSION['mdp'] = $_POST['mdp'];
            $ok=true;
      
      }
      
            if($ok==true)
            {
              $objetMail='Confirmation changement adresse mail';
              $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
              <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family:arial, "helvetica neue", helvetica, sans-serif">
              <head>
              <meta charset="UTF-8">
              <meta content="width=device-width, initial-scale=1" name="viewport">
              <meta name="x-apple-disable-message-reformatting">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta content="telephone=no" name="format-detection">
              <title>INSCRIPTION</title><!--[if (mso 16)]>
              <style type="text/css">
              a {text-decoration: none;}
              </style>
              <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
              <xml>
              <o:OfficeDocumentSettings>
              <o:AllowPNG></o:AllowPNG>
              <o:PixelsPerInch>96</o:PixelsPerInch>
              </o:OfficeDocumentSettings>
              </xml>
              <![endif]--><!--[if !mso]><!-- -->
              <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"><!--<![endif]-->
              <style type="text/css">
              #outlook a {
              padding:0;
              }
              .es-button {
              mso-style-priority:100!important;
              text-decoration:none!important;
              }
              a[x-apple-data-detectors] {
              color:inherit!important;
              text-decoration:none!important;
              font-size:inherit!important;
              font-family:inherit!important;
              font-weight:inherit!important;
              line-height:inherit!important;
              }
              .es-desk-hidden {
              display:none;
              float:left;
              overflow:hidden;
              width:0;
              max-height:0;
              line-height:0;
              mso-hide:all;
              }
              @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px!important; text-align:center!important } h2 { font-size:24px!important; text-align:center!important } h3 { font-size:20px!important; text-align:center!important } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important; text-align:center!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:24px!important; text-align:center!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:center!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button, button.es-button { font-size:18px!important; display:inline-block!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
              </style>
              </head>
              <body style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
              <div class="es-wrapper-color" style="background-color:#FFFFFF"><!--[if gte mso 9]>
              <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
              <v:fill type="tile" color="#ffffff"></v:fill>
              </v:background>
              <![endif]-->
              <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF">
              <tr>
              <td valign="top" style="padding:0;Margin:0">
              <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
              <tr>
              <td align="center" style="padding:0;Margin:0">
              <table bgcolor="#fad939" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:510px">
              <tr>
              <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
              <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" valign="top" style="padding:0;Margin:0;width:470px">
              <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" height="40" style="padding:0;Margin:0"></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table>
              <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
              <tr>
              <td align="center" style="padding:0;Margin:0">
              <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:510px" cellspacing="0" cellpadding="0" align="center" bgcolor="#FAD939">
              <tr>
              <td align="left" style="padding:0;Margin:0">
              <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:510px">
              <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" style="padding:0;Margin:0;position:relative"><img class="adapt-img" src="https://dhviis.stripocdn.email/content/guids/bannerImgGuid/images/image16781980543921613.png" alt title width="510" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table>
              <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
              <tr>
              <td align="center" style="padding:0;Margin:0">
              <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FAD939;border-radius:0 0 50px 50px;width:510px">
              <tr>
              <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
              <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" valign="top" style="padding:0;Margin:0;width:470px">
              <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:Poppins, sans-serif;font-size:38px;font-style:normal;font-weight:bold;color:#5d541d">Veuillez confirmer votre nouvelle adresse mail</h1></td>
              </tr>
              <tr>
              <td align="center" style="padding:0;Margin:0;padding-top:40px;padding-bottom:40px"><h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:Poppins, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#5D541D"></h3><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Poppins, sans-serif;line-height:27px;color:#5D541D;font-size:18px"><br></p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Poppins, sans-serif;line-height:27px;color:#5D541D;font-size:18px">Pour terminer votre modification d\'adresse mail, veuillez confirmer celle-ci. Cela garantit que vous êtes bien à l\'origine de ce changement.</p></td>
              </tr>
              <tr>
              <td align="center" style="padding:0;Margin:0"><!--[if mso]><a href="https://monostreet.alwaysdata.net/validationInscription?id=" target="_blank" hidden>
              <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" esdevVmlButton href="https://monostreet.alwaysdata.net"
              style="height:49px; v-text-anchor:middle; width:265px" arcsize="50%" stroke="f" fillcolor="#8928c6">
              <w:anchorlock></w:anchorlock>
              <center style="color:#ffffff; font-family:Poppins, sans-serif; font-size:16px; font-weight:400; line-height:16px; mso-text-raise:1px">Confirmer votre adresse mail</center>
              </v:roundrect></a>
              <![endif]--><!--[if !mso]><!-- --><span class="msohide es-button-border" style="border-style:solid;border-color:#2CB543;background:#8928c6;border-width:0px;display:inline-block;border-radius:30px;width:auto;mso-hide:all"><a href=https://monostreet.alwaysdata.net/pageValidation/connexion.php class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:16px;display:inline-block;background:#8928c6;border-radius:30px;font-family:Poppins, sans-serif;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;padding:15px 35px 15px 35px;border-color:#8928c6">Confirmer l\'adresse mail</a></span><!--<![endif]--></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              <tr>
              <td align="left" style="Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:40px">
              <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="left" style="padding:0;Margin:0;width:470px">
              <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
              <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Poppins, sans-serif;line-height:21px;color:#5D541D;font-size:14px">MERCI !<br>L\'EQUIPE MONOSTREET</p></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table></td>
              </tr>
              </table>
              
              </div>
              </body>
              </html>';
              
              $entete  = 'MIME-Version: 1.0' . "\r\n";
              $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
              
              if ($changementEmail==false){
               
                header ('location: ../index.php');
              }
              else{
                mail($_POST['email'],$objetMail,$message,$entete);
                $stmt = $connection->prepare("UPDATE compte SET validationInscription=0 WHERE id=$id");
                $stmt->execute();
                header ('location: ../index.php');
              }
            }
        }
     
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
     <input type="hidden" name="MAX_FILE_SIZE" value="500000">
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
        <p class="u-small-text u-text u-text-variant u-text-1">MONOSTREET 2023 TOUS DROITS RESERVES</p>
      </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="../pageConfidentialite/confidentialite.php">
          <span>Politique de confidentialite</span>
        </a>
      </section>
  
</body></html>