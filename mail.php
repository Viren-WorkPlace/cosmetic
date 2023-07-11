<?php
require 'PHPMailer/includes/Exception.php';
require 'PHPMailer/includes/PHPMailer.php';
require 'PHPMailer/includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP Configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'viren@ammc.ca';
$mail->Password = 'qidjzvprdnuxiviw';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Sender and Recipient
$mail->setFrom('viren@ammc.ca', 'cosmetic');
$mail->addAddress('viren@ammc.ca', 'Website');

// Email Content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = 'Greetings,<br><br>
The following client has a question:<br>
Details of the client:<br>
Name: '.$name.'<br>
Email: '.$email.'<br>
Message: '.$message.'<br>';

$sent = $mail->send();
// Send Email
// Send email 
if (!$sent) { 
    echo 'var response = { status: "error", message: "Error: Failed to send message." };';
} else { 
   echo 'var response = { status: "success", message: "Your message has been sent. Thank you!" };';
}

// Return JSON response
echo json_encode($response);
?>