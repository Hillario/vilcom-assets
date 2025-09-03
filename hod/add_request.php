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
 * add_request.php --> Staff Part
 *
 * This file enables staff to request for equipment
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 require '../vendor/autoload.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = trim($_POST['item_name']);
    $description = trim($_POST['description']);


    if (isset($_POST['item_name'])) $item_name = $_POST['item_name'];
    if (isset($_POST['description'])) $description = $_POST['description'];


    $error = array();
    if (empty($_POST["item_name"])) {
        $error[] = 'Please enter the equipment name';
    }
    if (empty($_POST["description"])) {
        $error[] = 'Please enter description of the equipment';
    }
}

?>

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ADD REQUEST</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Request</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Seamlessly</strong> request for equipment
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Add request form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Equipment Name</label>
                                            <div class="form-icon">
                                                <input type="text" name="item_name" class="form-control form-control-icon" id="item_name" placeholder="Enter equipment name">
                                                <i class="ri-drag-drop-line"></i>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Equipment description and Justification</label>
                                                <div class="form-icon">
                                                        <textarea name="description" class="form-control form-control-icon" id="description"></textarea>                                                        
                                                    </div>
                                            </div>


                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php                     

                        //  form operations
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-danger">
                            <i class="ri-megaphone-line"></i>
        <strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {
                                function send_Email_HOD($recipientEmail, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->SMTPDebug = 0; // or 3 for even more detail 0 to disable 2 for default
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

        //Add CC
        $mail->addCC('rodgers.momanyi@vilcom.co.ke');
        $mail->addCC('hillary.chesaro@vilcom.co.ke');
        $mail->addCC('kelvin.nderitu@vilcom.co.ke');

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
                                //set email variables
                                $recipient=$mymail;
$subject="A new request has been submitted";
$message='
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Request Notification</title>
    <style>
      @media only screen and (max-width: 600px) {
        .container {
          width: 100% !important;
          padding: 15px !important;
        }
      }
    </style>
  </head>
  <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
      <tr>
        <td align="center">
          <table class="container" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 90%; background-color: #ffffff; padding: 30px; border-radius: 10px;">
            <tr>
              <td>
                <h2 style="color: #333;">Dear '.$un1.' '.$un2.',</h2>
                <p style="font-size: 16px; color: #555;">
                  Your request for a new equipment with name <strong>'.$item_name.'</strong> and description <strong>'.$description.'</strong> has been successfully <strong>submitted</strong>.
                  You will receive another notification once it is approved.
                </p>
                <br />
                <div style="text-align: center;">
                  <p>
                    <a href="https://vilcom.co.ke/" style="display: inline-block; margin: 5px; text-decoration: none; color: #007BFF;">Visit our website</a><br />
                    <a href="https://portal.vilcom.ke/signin.php" style="display: inline-block; margin: 5px; text-decoration: none; color: #007BFF;">Log in to your account</a><br />
                    <a href="mailto:kelvin.nderitu@vilcom.co.ke" style="display: inline-block; margin: 5px; text-decoration: none; color: #007BFF;">Get support</a>
                  </p>
                </div>
                <p style="text-align: center; font-size: 13px; color: #666;">
                  This notification was automatically generated by the Vilcom Inventory Management System (IMS).
                </p>
                <hr style="margin: 30px 0;" />
                <p style="text-align: center; font-size: 13px; color: #999;">
                  &copy; ' . date('Y') . ' Vilcom Networks Limited, All Rights Reserved.
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
';                                
                                //send email
                                send_Email_HOD($recipient,$subject,$message);                                    
                                // Include your database configuration
                                //Escape characters supported
try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute the statement
    $sql = "INSERT INTO `request` (`item_name`, `description`, `status`, `priority`, `user_id`, `updated_at`) 
            VALUES (:item_name, :description, 'Pending', 'Medium', :user_id, CURRENT_TIMESTAMP)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':item_name', $item_name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Get the last inserted ID if needed
    //$lastInsertId = $pdo->lastInsertId();
    //echo "Insert successful! ID: " . $lastInsertId;
    echo '<div class="alert alert-info">										
        <strong>Success! </strong>Request has been sent, go to view request to track
    </div>';
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());}
                            }
                        }

                        ?>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- Add office equipment warranty form-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php
    include "footer.php";
    ?>