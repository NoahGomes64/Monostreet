


<?php

composer require league/oauth2-google

use League\OAuth2\Client\Provider\Google;
$provider = new Google([
    'clientId'     => '142969523582-6uugr4dv8qv8k66ktkq6i9e8hsduls4u.apps.googleusercontent.com',
    'clientSecret' => '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',
    'redirectUri'  => 'https://example.com/callback-url',
]);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '..PHPMailer/src/PHPMailer.php';
require '..PHPMailer/src/SMTP.php';





//Import PHPMailer classes into the global namespace


require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
//to view proper logging details for success and error messages
// $mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'monostreetGame@gmail.com';   //email
$mail->Password = 'sfhwixilawdwjryv';   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";


//sender information
$mail->setFrom('FROM_EMAIL_ADDRESS', 'FROM_NAME');

//receiver email address and name
$mail->addAddress('RECEPIENT_EMAIL_ADDRESS', 'RECEPIENT_NAME'); 

// Add cc or bcc   
// $mail->addCC('email@mail.com');  
// $mail->addBCC('user@mail.com');  
 
 
$mail->isHTML(true);
 
$mail->Subject = 'PHPMailer SMTP test';
$mail->Body    = "<h4> PHPMailer the awesome Package </h4>
<b>PHPMailer is working fine for sending mail</b>
    <p> This is a tutorial to guide you on PHPMailer integration</p>";

// Send mail   
if (!$mail->send()) {
    echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
?>