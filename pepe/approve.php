<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require ('vendor/autoload.php');
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'pinponsuhuomorinsola@gmail.com';                   
    $mail->Password   = '08055068262';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;        
    $mail->SMTPDebug = 0;                           
    $mail->setFrom('pinponsuhuj@gmail.com', 'Pinponsuhu Joseph');
    $mail->addAddress('pinponsuhuj@gmail.com', 'Joe User');     
    $mail->addAddress('pinponsuhuj@gmail.com');               
    $mail->addReplyTo('pinponsuhuj@gmail.com', 'Information');
    $mail->addCC('pinponsuhuj@gmail.com');
    $mail->addBCC('pinponsuhuj@gmail.com'); 
    $mail->isHTML(true);                                
    $mail->Subject = 'Lagos State ministry of science and technology';
    $mail->Body    = '
    <h1>You have been invited for an interview.</p>
    ' ;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>