<?php
// error_reporting(E_ALL);

// if (isset($_POST['mail_submit'])) {

//     require("phpmailer/class.phpmailer.php");
//     $mail = new PHPMailer();
//     $mail->IsSMTP(); // set mailer to use SMTP
//     $mail->SMTPDebug  = 2; 
//     $mail->From = "shaikh.danish44444@gmail.com";
//     $mail->FromName = "Danish";
//     $mail->Host = "smtp.gmail.com"; // specif smtp server
//     $mail->SMTPSecure = ""; // Used instead of TLS when only POP mail is selected
//     $mail->Port = 465; // Used instead of 587 when only POP mail is selected
//     $mail->SMTPAuth = true;
//     $mail->Username = "shaikh.danish44444@gmail.com"; // SMTP username
//     $mail->Password = "dilafroz"; // SMTP password

//     $mail->AddAddress($_POST['user_email'], $_POST['user_name']); //replace myname and mypassword to yours

//     $mail->AddReplyTo("shaikh.danish44444@gmail.com", "Danish");
//     $mail->WordWrap = 50; // set word wrap

//     // $mail->AddAttachment("index.php"); // add attachments
//     //$mail->AddAttachment("c:/temp/11-10-00.zip");

//     $mail->IsHTML(true); // set email format to HTML
//     $mail->Subject = 'New Test';
//     $mail->Body = 'Please follow this link : <a href="www.pvppcoe.ac.in">Click Here</>';

//     if ($mail->Send()) {
//         echo "Send mail successfully to " . $_POST['user_name'];
//     } else {
//         echo "Send mail fail";
//     }
// }
?>

<?php
// $fp = fsockopen('tls://smtp.gmail.com:465');
// if (!$fp) {
//     echo 'Unable to connect';
// } else {
//     $response = fgets($fp, 256);
//     echo 'Response: ' . $response;
// }
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

if (isset($_POST['mail_submit'])) {
    $mail = new PHPMailer;
    $mail->isSMTP(); 
    $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is deprecated
    $mail->SMTPAuth = true;
    $mail->Username = 'shaikh.danish44444@gmail.com'; // email
    $mail->Password = 'dilafroz'; // password
    $mail->setFrom('shaikh.danish44444@gmail.com', 'Danish'); // From email and name
    $mail->addAddress('shaikh.danish4444@gmail.com', 'Danish'); // to email and name
    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->msgHTML("test body"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
    
    if(!$mail->send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "Message sent!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail using php</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="user_name" placeholder="User Name" required>
        <input type="email" name="user_email" placeholder="Email" required>
        <input type="submit" value="Mail" name="mail_submit">
    </form>

</body>

</html>