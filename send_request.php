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
 * send_request.php --> Staff Part
 *
 * This file enables admin/HOD to send request for approval by management
 * 
 * @author Hillary Chesaro
 */

include "header.php";

require 'vendor/autoload.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve Request ID
if(isset($_POST['myRequestId']))
{
    $_SESSION['requestid']=$_POST['myRequestId'];

}

$requestid=($_SESSION['requestid']);

$requestQuery="SELECT * FROM request WHERE request_id=$requestid";
$selectQuery=$db->select($requestQuery);
foreach($selectQuery as $row)
{
    $itemName=$row['item_name'];
    $desc=$row['description'];
    $uid=$row['user_id'];
}

//select staff
$staffQuery= "SELECT first_name, last_name FROM user WHERE user_id=$uid";
$selectStaff=$db->select($staffQuery);
foreach($selectStaff as $rowstaff){
    $fname=$rowstaff['first_name'];
    $lname=$rowstaff['last_name'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['send'])) {     
    $item_name = @trim($_POST['item_name']);
    $description = @trim($_POST['description']);
    $priority = @trim($_POST['priority']);          
        
    
    if (isset($_POST['item_name'])) $item_name = $_POST['item_name'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['priority'])) $priority = $_POST['priority'];          
    
    
    $error = array();    
    if (empty($_POST["item_name"])) {
        $error[] = 'Please check item name';
    }
    if (empty($_POST["description"])) {
        $error[] = 'Please check description';
    }
    if (empty($_POST["priority"])) {
        $error[] = 'Please check priority';
    }
  }
  
  //post for update description
  if (isset($_POST['updatedescription'])) {
    $description = @trim($_POST['description']);

    if (isset($_POST['description'])) $description = $_POST['description'];

    $error = array();    
    if (empty($_POST["description"])) {
        $error[] = 'Please check description';
    }
  }
  
  //post for update status
  if (isset($_POST['updatestatus'])) {

    $status = @trim($_POST['status']);

    if (isset($_POST['status'])) $status = $_POST['status'];

    $error = array();    
    if (empty($_POST["status"])) {
        $error[] = 'Please check status';
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
                        <h4 class="mb-sm-0">SEND REQUEST</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Send Request</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Send</strong> <?php echo $itemName;?> for approval by management
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Send this request for approval</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Equipment Name</label>
                                            <div class="form-icon">
                                            <input name="item_name" type="text" class="form-control bg-light border-0" id="item_name" placeholder="<?php echo $itemName;?>" readonly="readonly" value="<?php echo $itemName;?>">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Priority(Ensure priority is set to high before sending)</label>
                                                <div class="form-icon">
                                                <select name="priority" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Low" selected>Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Critical">Critical</option>
                                                    <option value="Urgent">Urgent</option>                                                                                                        
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="status" class="form-select mb-3" aria-label="Default select example">                                                    
                                                    <option value="Received">Completed</option>
                                                    <option value="Rejected">Rejected</option>                                                                                                                                                            
                                                </select>                                                        
                                                    </div>
                                            </div> 

                                        <div class="mt-3">
                                                <label class="form-label">Description(Append your comment here and update before sending)</label>
                                                <div class="form-icon">
                                                <textarea name="description" class="form-control bg-light border-0" id="description" placeholder="<?php echo $desc;?>"><?php echo $desc;?></textarea>                                                       
                                                    </div>
                                            </div>


                                    </div>

                                    <div class="text-left">
                                        <button type="submit" name="updatedescription" class="btn btn-warning">Update Description</button>
                                    </div>

                                    <div class="text-left">
                                        <button type="submit" name="updatestatus" class="btn btn-success">Update Status</button>
                                    </div>

                                    <div class="text-left">
                                        <button type="submit" name="send" class="btn btn-info">Send</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <?php                     

                        //  form operations
                        if (isset($_POST['send'])) {
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {
                                //send email notification to management

                                function send_Email_Management($recipientEmail, $subject, $message) {
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
                                $recipient='peter.kipkoech@vilcom.co.ke';//email address for management peter.kipkoech@vilcom.co.ke
$subject="Approve new equipment request";
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
                <h2 style="color: #333;">Dear Peter Kipkoech,</h2>
                <p style="font-size: 16px; color: #555;">
                  A new equipment with name <strong>'.$itemName.'</strong> and description <strong>'.$desc.'</strong> has been requested by <strong>'.$fname.' '.$lname.'</strong>.
                  Kindly assist in approving the request.
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
                                send_Email_Management($recipient,$subject,$message); 

                                $insertQuery = "UPDATE `request` SET `priority` = '".$priority."' WHERE `request`.`request_id` = '".$requestid."';";
                                $db->insert($insertQuery);
                                header('Location:view_request.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Request has been sent for approval, monitor status for confirmation
    </div>';
                            }
                        }
                      }
                      
                      //update description
                      if (isset($_POST['updatedescription'])) {
                        $insertQueryDescription = "UPDATE `request` SET `description` = '".$description."' WHERE `request`.`request_id` = '".$requestid."';";
                                $db->insert($insertQueryDescription);
                                header('Location:view_request.php');  
                      }

                      //update status
                      if (isset($_POST['updatestatus'])) {
                         $insertQueryStatus = "UPDATE `request` SET `status` = '".$status."' WHERE `request`.`request_id` = '".$requestid."';";
                                $db->insert($insertQueryStatus);
                                header('Location:view_request.php');                                
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