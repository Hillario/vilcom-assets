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
 * approve_incident.php --> Management Part
 *
 * This file enables Management to approve incident for repair
 * 
 * @author Hillary Chesaro
 */

include "header.php";

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//temporarily suppress warnings
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve Incident ID
if (isset($_POST['myIncidentId'])) {
    $_SESSION['incidentid'] = $_POST['myIncidentId'];
}

$incidentid = ($_SESSION['incidentid']);

$requestQuery = "SELECT * from equipment_incident as I, office_equipment as E WHERE I.equipment_id=E.equipment_id AND I.equipment_incident_id=$incidentid";
$selectQuery = $db->select($requestQuery);
foreach ($selectQuery as $row) {
    $incident_date = $row['incident_date'];
    $type_of_incident = $row['type_of_incident'];
    $source = $row['source'];
    $priority = $row['priority'];
    $status = $row['status'];
    $description = $row['description'];
    $root_cause = $row['root_cause'];
    $action_plan = $row['action_plan'];
    $date_action_completed = $row['date_action_completed'];
    $uid = $row['user_id'];
    $equipmentid = $row['equipment_id'];
}

//select staff
$staffQuery = "SELECT first_name, last_name, email FROM user WHERE user_id=$uid";
$selectStaff = $db->select($staffQuery);
foreach ($selectStaff as $rowstaff) {
    $fname = $rowstaff['first_name'];
    $lname = $rowstaff['last_name'];
    $recipientEmail = $rowstaff['email'];
}

//select equipment
$equipmentQuery = "SELECT system_name FROM office_equipment WHERE equipment_id=$equipmentid;";
$selectEquipment = $db->select($equipmentQuery);
foreach ($selectEquipment as $rowequipment) {
    $equipmentname = $rowequipment['system_name'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve']) || isset($_POST['reject'])) {
        $comments = @trim($_POST['comments']);


        if (isset($_POST['comments'])) $comments = $_POST['comments'];


        $error = array();
        if (empty($_POST["comments"])) {
            $error[] = 'Please write a comment. If none, input NA';
        }
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
                        <h4 class="mb-sm-0">APPROVE INCIDENT</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Approve Incident</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Approve</strong> incident for repair
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Approve this incident for repair</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Date of Incident</label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $incident_date; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Type of Incident</label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $type_of_incident; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Source</label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $source; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Priority</label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $priority; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Status</label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $status; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Incident description and Justification</label>
                                            <div class="form-icon">
                                                <textarea name="" class="form-control bg-light border-0" id="" placeholder="<?php echo $description; ?>" readonly="readonly"><?php echo $description; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Root Cause</label>
                                            <div class="form-icon">
                                                <input name="proot_cause" type="text" class="form-control bg-light border-0" id="proot_cause" placeholder="<?php echo $root_cause; ?>" readonly="readonly" value="<?php echo $root_cause; ?>">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Action plan to be taken</label>
                                            <div class="form-icon">
                                                <textarea name="" class="form-control bg-light border-0" id="" placeholder="<?php echo $action_plan; ?>" readonly="readonly"><?php echo $action_plan; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Date action plan is to be completed </label>
                                            <div class="form-icon">
                                                <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $date_action_completed; ?>" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Comments</label>
                                            <div class="form-icon">
                                                <textarea name="comments" class="form-control bg-light border-0" id="comments"></textarea>
                                            </div>
                                        </div>




                                    </div>

                                    <!-- Approve button -->
                                    <div class="text-left">
                                        <button type="submit" name="approve" class="btn btn-info">Approve</button>
                                    </div>

                                    <!-- Reject button -->
                                    <div class="text-left mt-2">
                                        <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php

                        if (isset($_POST['approve'])) {

                            //  form operations
                            if (isset($error)) {
                                if (!empty($error)) {
                                    echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                                } else {
                                    //send email notification to all stakeholders notifying that incident has been approved

                                    function send_Email_All_Incident($recipientEmail, $subject, $message)
                                    {
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
                                            $mail->addCC('peter.kipkoech@vilcom.co.ke');
                                            $mail->addCC('elvis.chirchir@vilcom.co.ke');
                                            $mail->addCC('solomon.mutua@vilcom.co.ke');
                                            $mail->addCC('hillary.chesaro@vilcom.co.ke');
                                            $mail->addCC('kelvin.nderitu@vilcom.co.ke');
                                            $mail->addCC('systems@vilcom.co.ke');
                                            $mail->addCC('admin@vilcom.co.ke');

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
                                    $recipient = $recipientEmail; //email of staff requesting the item
                                    $subject = "Incident for an equipment investigated and approved";
                                    $message = '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Incident Approval Notification</title>
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
                <h2 style="color: #333;">Dear ' . $fname . ' ' . $lname . ',</h2>
                <p style="font-size: 16px; color: #555;">
                  Your incident report for an equipment with name <strong>' . $equipmentname . '</strong> and type of incident <strong>' . $type_of_incident . '</strong> has been <strong>Investigated & Approved</strong>.
                  Confirm and track the action plan for a swift resolution. <strong>Comments: </strong>'.$comments.'.
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
                                    send_Email_All_Incident($recipient, $subject, $message);
                                    $insertQuery = "UPDATE `equipment_incident` SET `status` = 'Approved', `comments` = '".$comments."' WHERE `equipment_incident`.`equipment_incident_id` = '" . $incidentid . "';";
                                    $db->insert($insertQuery);
                                    echo '<div class="alert alert-info">										
        <strong>Success! </strong>Incident has been approved for repair, monitor status for confirmation and tracking
    </div>';
                                }
                            }
                        }

                        if (isset($_POST['reject'])) {

                            //  form operations
                            if (isset($error)) {
                                if (!empty($error)) {
                                    echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                                } else {
                                    //send email notification to all stakeholders notifying that incident has been approved

                                    function send_Email_All_Incident($recipientEmail, $subject, $message)
                                    {
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
                                            $mail->addCC('peter.kipkoech@vilcom.co.ke');
                                            $mail->addCC('rodgers.momanyi@vilcom.co.ke');
                                            $mail->addCC('solomon.mutua@vilcom.co.ke');
                                            $mail->addCC('hillary.chesaro@vilcom.co.ke');
                                            $mail->addCC('kelvin.nderitu@vilcom.co.ke');
                                            $mail->addCC('systems@vilcom.co.ke');
                                            $mail->addCC('admin@vilcom.co.ke');

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
                                    $recipient = $recipientEmail; //email of staff requesting the item
                                    $subject = "Incident for an equipment investigated and rejected";
                                    $message = '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Incident Approval Notification</title>
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
                <h2 style="color: #333;">Dear ' . $fname . ' ' . $lname . ',</h2>
                <p style="font-size: 16px; color: #555;">
                  Your incident report for an equipment with name <strong>' . $equipmentname . '</strong> and type of incident <strong>' . $type_of_incident . '</strong> has been <strong>Investigated & Rejected</strong>.
                  Check the comments why it has been rejected for a swift resolution. <strong>Comments: </strong>'.$comments.'.
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
                                    send_Email_All_Incident($recipient, $subject, $message);
                                    $insertQuery = "UPDATE `equipment_incident` SET `status` = 'Rejected', `comments` = '".$comments."' WHERE `equipment_incident`.`equipment_incident_id` = '" . $incidentid . "';";
                                    $db->insert($insertQuery);
                                    echo '<div class="alert alert-info">										
        <strong>Success! </strong>Incident has been approved for repair, monitor status for confirmation and tracking
    </div>';
                                }
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