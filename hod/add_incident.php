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
 * add_incident.php
 *
 * This file enables the staff to report an incident.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

  require '../vendor/autoload.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_date = trim($_POST['incident_date']);
    $type_of_incident = trim($_POST['type_of_incident']);
    $source = trim($_POST['source']);
    $process = trim($_POST['process']);    
    $description = trim($_POST['description']);
    $root_cause = trim($_POST['root_cause']);    
    $equipment = trim($_POST['equipment']);
    
    if (isset($_POST['incident_date'])) $incident_date = $_POST['incident_date'];
    if (isset($_POST['type_of_incident'])) $type_of_incident = $_POST['type_of_incident'];
    if (isset($_POST['source'])) $source = $_POST['source'];
    if (isset($_POST['process'])) $process= $_POST['process'];    
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['root_cause'])) $root_cause = $_POST['root_cause'];    
    if (isset($_POST['equipment'])) $equipment = $_POST['equipment'];
    
    $error = array();
    if (empty($_POST["incident_date"])) {
        $error[] = 'Please enter the incident date';
    }
    if (empty($_POST["type_of_incident"])) {
        $error[] = 'Please enter the type of incident';
    }
    if (empty($_POST["source"])) {
        $error[] = 'Please enter the source';
    }
    if (empty($_POST["process"])) {
        $error[] = 'Please enter the process';
    }    
    if (empty($_POST["description"])) {
        $error[] = 'Please enter the description';
    }
    if (empty($_POST["root_cause"])) {
        $error[] = 'Please enter the root cause';
    }    
    if (empty($_POST["equipment"])) {
        $error[] = 'Please select the equipment';
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
                                <h4 class="mb-sm-0">REPORT INCIDENT</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Report incident</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> report equipment incident
                    </div>

                    <!-- Add office equipment form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Report Incident form</h4>
                                </div>
                                <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                        <div class="mt-3">
                                                            <label class="form-label">Choose Equipment</label>
                                                            <div class="form-icon">
                                                                <select name="equipment" id="equipment" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $equipmentQuery = "SELECT * FROM office_equipment WHERE user_id=$user_id";
                                                                    $equipmentSelect = $db->select($equipmentQuery);
                                                                    foreach ($equipmentSelect as $row) {
                                                                        echo '<option value="' . $row['equipment_id'] . '">' . $row['system_name'].'</option>';
                                                                        $equipment_id=$row['equipment_id'];
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="mt-3">
                                                <label class="form-label">Type of Incident</label>
                                                <div class="form-icon">
                                                <select name="type_of_incident" id="type_of_incident" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Hardware Failure" selected>Hardware Failure</option>
                                                    <option value="Software Issue">Software Issue</option>
                                                    <option value="Network Connectivity">Network Connectivity</option>
                                                    <option value="Security Breach">Security Breach</option>
                                                    <option value="Data Loss">Data Loss</option>
                                                    <option value="User Error">User Error</option>
                                                    <option value="Physical Damage">Physical Damage</option>
                                                    <option value="Performance Issue">Performance Issue</option>
                                                    <option value="Power Issue">Power Issue</option>
                                                    <option value="Peripheral Issue">Peripheral Issue</option>
                                                    <option value="Configuration Error">Configuration Error</option>
                                                    <option value="Maintenance Required">Maintenance Required</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Source</label>
                                                <div class="form-icon">
                                                <select name="source" id="source" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Employee Feedback" selected>Employee Feedback</option>
                                                    <option value="Customer Feedback">Customer Feedback</option>
                                                    <option value="Supplier Feedback">Supplier Feedback</option>
                                                    <option value="External Audit Finding">External Audit Finding</option>
                                                    <option value="Internal Audit Finding">Internal Audit Finding</option>
                                                    <option value="Management Review Action Item">Management Review Action Item</option>                                                                                                       
                                                </select>                                                        
                                                    </div>
                                            </div>                                          

                                            

                                            <div class="mt-3">
                                                <label class="form-label">Date of Incident</label>
                                                <div>                                                    
                                                    <input name="incident_date" type="date" class="form-control" id="incident_date">
                                                </div>
                                            </div>                                          
                                            
                                            
                                                                                 

                                           
                                        </div>

                                        <div class="col-lg-6">                                       
                                        
                                            

                                            <div class="mt-3">
                                                <label class="form-label">Description</label>
                                                <div class="form-icon">
                                                        <textarea name="description" class="form-control form-control-icon" id="description"></textarea>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Root Cause</label>
                                                <div class="form-icon">
                                                        <input name="root_cause" type="text" class="form-control form-control-icon" id="root_cause" placeholder="Enter the root cause">
                                                        <i class="ri-questionnaire-line"></i>
                                                    </div>
                                            </div>                                            
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Process</label>
                                                <div class="form-icon">
                                                <select name="process" id="process" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Business Planning Process" selected>Business Planning Process</option>
                                                    <option value="Rollout Process">Rollout Process</option>
                                                    <option value="HR Process">HR Process</option>
                                                    <option value="Tendering Process">Tendering Process</option>
                                                    <option value="Planning and Design">Planning and Design</option>
                                                    <option value="OHS Processes">OHS Processes</option>
                                                    <option value="Shipping">Shipping</option>
                                                    <option value="Support and Maintenance">Support and Maintenance</option>
                                                    <option value="Procurement and Logistics">Procurement and Logistics</option>
                                                    <option value="IMS Process">IMS Process</option>                                                                                                       
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            
                                            

                                                                                        
                                                                                    
                                        </div>

                                        <div class="text-left">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                    </div>
                                </div>
                                </form>
                                <!-- end card body -->
                                <?php
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-danger">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {
                                                            function send_Email_Incident_HOD($recipientEmail, $subject, $message) {
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
$subject="A new incident has been reported";
$message='
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Incident Notification</title>
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
                  Incident for equipment with name <strong>'.$equipment.'</strong> and type of incident <strong>'.$type_of_incident.'</strong> has been successfully <strong>reported</strong>.
                  You will receive another notification once it has been investigated.
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
                                send_Email_Incident_HOD($recipient,$subject,$message);                                                             
                                                                $insertQuery = "INSERT INTO `equipment_incident` (`equipment_incident_id`, `incident_date`, `type_of_incident`, `source`, `process`, `priority`, `status`, `description`, `root_cause`, `action_plan`, `date_action_completed`, `equipment_id`, `updated_at`) VALUES (NULL, '".$incident_date."', '".$type_of_incident."', '".$source."', '".$process."', 'Medium', 'Pending', '".$description."', '".$root_cause."', 'Action plan pending', '".$incident_date."', '".$equipment_id."', CURRENT_TIMESTAMP);";
                                                                $db->insert($insertQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Incident has been reported
									</div>';
                                                            } 
                                                        }                                                    

                                                    ?>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <!-- Add office equipment form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>