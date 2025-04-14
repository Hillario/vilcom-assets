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
        
    
    if (isset($_POST['proot_cause'])) $proot_cause = $_POST['proot_cause'];        
    
    
    $error = array();    
    if (empty($_POST["proot_cause"])) {
        $error[] = 'Please check the root cause';
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
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $priority;?>" readonly="readonly">                                                
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
                                                <label class="form-label">Action plan to be taken</label>
                                                <div class="form-icon">
                                                <textarea name="" class="form-control bg-light border-0" id="" placeholder="<?php echo $action_plan;?>" readonly="readonly"><?php echo $action_plan;?></textarea>                                                       
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                            <label class="form-label">Date action plan is to be completed </label>
                                            <div class="form-icon">
                                            <input name="" type="text" class="form-control bg-light border-0" id="" placeholder="<?php echo $date_action_completed;?>" readonly="readonly">                                                
                                            </div>
                                        </div>




                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">Approve</button>
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
                                $insertQuery = "UPDATE `equipment_incident` SET `status` = 'Approved' WHERE `equipment_incident`.`equipment_incident_id` = '".$incidentid."';";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Incident has been approved for repair, monitor status for confirmation and tracking
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