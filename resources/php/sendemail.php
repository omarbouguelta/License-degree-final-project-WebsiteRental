<?php

require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';
require_once 'PHPMailer-master/src/Exception.php';


// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



// Set the email subject
$subject = 'New contact form submission from ' . $name;

// Set the email message
$body = "Name: $name\nEmail: $email\nMessage:\n$message";




$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'obouguelta@gmail.com';
$mail->Password = 'bklzletrdkrqrjpq';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


$mail->setFrom('NoReplay:HolidayHub@gmail.com', 'HolidayHub');
$mail->addAddress($email, $name);
$mail->Subject = 'Holiday Hub';
$mail->Body = "We received your message and we will be back to you soon";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header('Location: ../views/thank-you.html');
    exit;
}

?>
