<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])){
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;  
        $mail->isSMTP();      
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;  
        $mail->Username = 'shtraveltrips@gmail.com';  
        $mail->Password = 'wkbw oyaa jcfa nena'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port = 587;  

        $mail->setFrom('shtraveltrips@gmail.com', 'Booking Confirmation');
        $mail->addAddress($_POST["email"]);  

        $mail->isHTML(true);  
        $mail->Subject = $_POST["subject"];
        $mail->Body    = $_POST["message"];

        $mail->send();
        header('Location: booking_success.php?name=');
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
