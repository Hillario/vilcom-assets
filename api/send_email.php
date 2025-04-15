<?php

/**
 * Vilcom IMS
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Saro  Labs
 * @link        https://github.com/Hillario/vilcom-assets.git
 */

/**
 * send_email.php --> Function to send emails
 *
 * This file enables admin to add a role
 * 
 * @author Hillary Chesaro
 */

 require '../vendor/autoload.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 function sendEmail($recipientEmail, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->SMTPDebug = 2; // or 3 for even more detail
        $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host       = 'admin.vilcom-net.co.ke';  // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreply@vilcom.ke'; // SMTP username
        $mail->Password   = 'Z5mqEEZtnjgrpkQJCMxY'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Headers
        $mail->setFrom('noreply@hosting.vilcom-net.co.ke', 'Vilcom IMS');
        $mail->addAddress($recipientEmail);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send Email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Email sending failed: {$mail->ErrorInfo}";
    }
}

?>