<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // For Composer installations
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php'; // For manual installations

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.example.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'your-email@example.com'; // SMTP username
    $mail->Password = 'your-email-password'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "
        <html>
        <head>
            <title>Contact Form Submission</title>
        </head>
        <body>
            <p><strong>Full Name:</strong> {$_POST['full_name']}</p>
            <p><strong>Email:</strong> {$_POST['email']}</p>
            <p><strong>Mobile Number:</strong> {$_POST['mobile_number']}</p>
            <p><strong>State:</strong> {$_POST['state']}</p>
        </body>
        </html>
    ";

    $mail->send();
    echo 'Your message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
