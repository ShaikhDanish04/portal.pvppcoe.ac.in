<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal_pvpp";
$iv = '1234567891011122';


// $servername = "localhost";
// $username = "pvppcuwv";
// $password = "l!#7%V6!tZ0S";
// $dbname = "pvppcuwv_portal_pvpp";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: Please " . $conn->connect_error);
}

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'shaikh.danish44444@gmail.com'; // email
$mail->Password = 'dilafroz'; // password
$mail->setFrom('shaikh.danish44444@gmail.com', 'PVPP Portal'); // From email and name


session_start();
date_default_timezone_set('Asia/Kolkata');

?>