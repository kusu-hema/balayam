<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $parentsname = $_POST['parentsname'] ?? '';
    $phonenumber = $_POST['phonenumber'] ?? '';
    $program = $_POST['program'] ?? '';
    $branches = $_POST['branches'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info.bps2016@gmail.com'; // Your Gmail email address
        $mail->Password = 'dvkwlgsxbgyrbcaz'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('info.bps2016@gmail.com', 'Baalyam  preschool'); // Your Gmail email and name
        $mail->addAddress('info.bps2016@gmail.com', 'Baalyam  preschool'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
            <h1>New Message</h1>
            <p><strong>Parents Name:</strong> $parentsname </p>
            <p><strong>Phone NUmber:</strong>  $phonenumber </p>
            <p><strong>Program:</strong> $program </p>
            <p><strong>Branches:</strong> $branches </p>
        ";

        $mail->send();
        echo '<script>
        window.alert("Message sent successfully");
        window.location.href = "index.html";
      </script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
