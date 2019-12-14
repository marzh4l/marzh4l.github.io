<?php
// include "classes/class.phpmailer.php";
require_once("classes/class.smtp.php");
require_once("classes/class.phpmailer.php");

$mail = new PHPMailer();

// setting

$mail->IsSMTP();  // send via SMTP
$mail->Host     = "smtp.mail.yahoo.com"; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "takwacool@ymail.com";  // SMTP username
$mail->Password = "mar31sal"; // SMTP password

// pengirim
$mail->From     = "takwacool@ymail.com";
$mail->FromName = "yogamarsal";

// penerima
$mail->AddAddress("yogamarz@gmail.com","Elang 526");
$mail->AddCC("yogamarz@gmail.com");
$mail->AddBCC("yogamarz@gmail.com");

// kirim balik
$mail->AddReplyTo("yogamarz@gmail.com","Aryo Sanjaya");

// $mail->WordWrap = 50;                              // set word wrap
// $mail->AddAttachment(getcwd() . "/file1.zip");      // attachment
// $mail->AddAttachment(getcwd() . "/file2.zip", "file_kedua.zip");
$mail->IsHTML(true);                               // send as HTML

$mail->Subject  =  "Ngetes PHP Mailer";
$mail->Body     =  "This research is supported by <b>Google.com</b><br><img src='http://www.google.com/logos/Logo_25wht.gif' />";
$mail->AltBody  =  "This research is supported by Google.com";

if(!$mail->Send())
{
   echo "Message was not sent <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message";
?>