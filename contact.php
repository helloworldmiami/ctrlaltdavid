<?php

require_once "vendor/autoload.php";
require_once('PHPMailer/PHPMailerAutoload.php');


//PHPMailer Object
$mail = new PHPMailer;



$tel = $_REQUEST['tel'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mthd = $_REQUEST['mthd'];

//From email address and name
$mail->From = "$email";
$mail->FromName = "$name";

//To address and name
$mail->addAddress("david@sfldesigners.com", "Recepient Name");
$mail->addAddress("David Martin"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("fullstackmiami@sfldesigners.com", "Reply");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "$mthd $name";
$mail->Body = "$name<br/>$email<br/>$tel<br/>$mthd";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
     ob_clean();
       header('Location: thanks.html');
       exit();
}


?>