<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include ('PHPMailer.php');
include ('SMTP.php');

$mail = new PHPMailer(True);

$mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
$mail->Host = 'smtp-monostreet.alwaysdata.net'; // Spécifier le serveur SMTP
$mail->SMTPAuth = true; // Activer authentication SMTP
$mail->Username = 'monostreet@alwaysdata.net'; // Votre adresse email d'envoi
$mail->Password = 'monostreet64!!'; // Le mot de passe de cette adresse email
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
$mail->Port = 465;

$mail->setFrom('monostreet@alwaysdata.net', 'Mailer'); // Personnaliser l'envoyeur
$mail->addAddress('noah.gomes47@gmail.com', 'Karim User'); // Ajouter le destinataire

$mail->addReplyTo('info@example.com', 'Information'); // L'adresse de réponse
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');


$mail->isHTML(true); // Paramétrer le format des emails en HTML ou non

$mail->Subject = 'Here is the subject';
$mail->Body = 'This is the HTML message body';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   echo 'Erreur, message non envoyé.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'Le message a bien été envoyé !';
}
?>