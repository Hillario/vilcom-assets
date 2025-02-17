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
 * send_incident.php --> Admin Part
 *
 * This file enables admin/HOD to send incident for approval by management
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve Incident ID
if(isset($_POST['myIncidentId']))
{
    $_SESSION['incidentid']=$_POST['myIncidentId'];

}

$incidentid=($_SESSION['incidentid']);

$requestQuery="SELECT * FROM equipment_incident WHERE equipment_incident_id=$incidentid";
$selectQuery=$db->select($requestQuery);
foreach($selectQuery as $row)
{
    $incident_date=$row['incident_date'];
    $type_of_incident=$row['type_of_incident'];
    $source=$row['source'];
    $priority=$row['priority'];
    $status=$row['status'];
    $description=$row['description'];
    $root_cause=$row['root_cause'];
    $action_plan=$row['action_plan'];
    $date_action_completed=$row['date_action_completed'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $proot_cause = @trim($_POST['proot_cause']);
    $paction_plan = @trim($_POST['paction_plan']);   
    $pdate_action_completed = @trim($_POST['pdate_action_completed']);
    $ppriority = @trim($_POST['ppriority']);      
        
    
    if (isset($_POST['proot_cause'])) $proot_cause = $_POST['proot_cause'];
    if (isset($_POST['paction_plan'])) $paction_plan = $_POST['paction_plan'];
    if (isset($_POST['pdate_action_completed'])) $pdate_action_completed = $_POST['pdate_action_completed'];
    if (isset($_POST['ppriority'])) $ppriority = $_POST['ppriority'];          
    
    
    $error = array();    
    if (empty($_POST["proot_cause"])) {
        $error[] = 'Please check the root cause';
    }
    if (empty($_POST["paction_plan"])) {
        $error[] = 'Please check the action plan';
    }
    if (empty($_POST["pdate_action_completed"])) {
        $error[] = 'Please check the date of action completed';
    }
    if (empty($_POST["ppriority"])) {
        $error[] = 'Please check the ppriority';
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
                        <h4 class="mb-sm-0">SEND INCIDENT</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Send Incident</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Send</strong> incident for repair approval by management
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Send this incident for approval</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Date of Incident</label>
                                            <div class="form-icon">
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $incident_date;?>" readonly="readonly">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Type of Incident</label>
                                            <div class="form-icon">
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $type_of_incident;?>" readonly="readonly">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Source</label>
                                            <div class="form-icon">
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $source;?>" readonly="readonly">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Priority</label>
                                                <div class="form-icon">
                                                <select name="ppriority" class="form-select mb-3" aria-label="Default select example">
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
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $status;?>" readonly="readonly">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Incident description and Justification</label>
                                                <div class="form-icon">
                                                <textarea name="" class="form-control bg-light border-0" id="" placeholder="<?php echo $description;?>" readonly="readonly"><?php echo $description;?></textarea>                                                       
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                            <label class="form-label">Root Cause</label>
                                            <div class="form-icon">
                                            <input name="proot_cause" type="text" class="form-control bg-light border-0" id="proot_cause" placeholder="<?php echo $root_cause;?>" readonly="readonly" value="<?php echo $root_cause;?>">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Update action plan that needs to be taken</label>
                                                <div class="form-icon">
                                                <textarea name="paction_plan" class="form-control bg-light border-0" id="paction_plan"></textarea>                                                       
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Date action plan is to be completed</label>
                                                <div>                                                    
                                                    <input name="pdate_action_completed" type="date" class="form-control" id="pdate_action_completed">
                                                </div>
                                            </div>




                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php                     

                        //  form operations
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {                                
                                $insertQuery = "UPDATE `equipment_incident` SET `priority` = '".$ppriority."', `root_cause` = '".$proot_cause."', `action_plan` = '".$paction_plan."', `date_action_completed` = '".$pdate_action_completed."' WHERE `equipment_incident`.`equipment_incident_id` = '".$incidentid."';";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Incident has been sent for repair approval, monitor status for confirmation
    </div>';
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