<?php

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPhone = $_POST['userPhone'];

// Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPmailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ii3421366@gmail.com';                     // SMTP username
    $mail->Password   = '65a1sf56f1a65';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ii3421366@gmail.com', 'Ivan');
    $mail->addAddress('panyruk1992@gmail.com', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта';
    $mail->Body    = "Имя пользователя: ${userName}, его телефон: ${userPhone}, его Email: ${userEmail}";

    if ($mail->send()) {
      echo "ok";
    } else {
        echo "Письмо не отправлено. Есть ошибка. Код ошибки: {$mail->ErrorInfo}";
    }
    



} catch (Exception $e) {
    echo "Письмо не отправлено. Есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}

?>