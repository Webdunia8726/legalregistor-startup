<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // For Composer installations

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'lexntax5@gmail.com'; // SMTP username
    $mail->Password = 'aqak ljua edor ciap
'; // SMTP password (replace with your actual password or app password)
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('lexntax5@gmail.com', 'lexntax'); // Replace with your email and name
    $mail->addAddress('recipient@example.com'); // Add a recipient (replace with recipient email)

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

    // Send email
    $mail->send();

    // Redirect to the Thank You page after successful submission
    header('Location: thankyou.html');
    exit(); // Make sure to call exit after header to stop further script execution
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
