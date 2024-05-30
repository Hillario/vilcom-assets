<?php

/**
 * vilcom networks asset information management system
 *
 * PHP version 8.2.12
 *
 * @category    Frontend + Backend
 * @package     vilcom-assets
 * @author      Hillary Chesaro
 * @license     Vilcom Networks
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

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_date = trim($_POST['incident_date']);
    $type_of_incident = trim($_POST['type_of_incident']);
    $source = trim($_POST['source']);
    $process = trim($_POST['process']);
    $priority = trim($_POST['priority']);
    $status = trim($_POST['status']);
    $description = trim($_POST['description']);
    $root_cause = trim($_POST['root_cause']);
    $action_plan = trim($_POST['action_plan']);
    $date_action_completed = trim($_POST['date_action_completed']);
    $equipment = trim($_POST['equipment']);
    
    if (isset($_POST['incident_date'])) $incident_date = $_POST['incident_date'];
    if (isset($_POST['type_of_incident'])) $type_of_incident = $_POST['type_of_incident'];
    if (isset($_POST['source'])) $source = $_POST['source'];
    if (isset($_POST['process'])) $process= $_POST['process'];
    if (isset($_POST['priority'])) $priority = $_POST['priority'];
    if (isset($_POST['status'])) $status = $_POST['status'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['root_cause'])) $root_cause = $_POST['root_cause'];
    if (isset($_POST['action_plan'])) $action_plan = $_POST['action_plan'];
    if (isset($_POST['date_action_completed'])) $date_action_completed = $_POST['date_action_completed'];
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
    if (empty($_POST["priority"])) {
        $error[] = 'Please enter the priority';
    }
    if (empty($_POST["status"])) {
        $error[] = 'Please enter the status';
    }
    if (empty($_POST["description"])) {
        $error[] = 'Please enter the description';
    }
    if (empty($_POST["root_cause"])) {
        $error[] = 'Please enter the root cause';
    }
    if (empty($_POST["action_plan"])) {
        $error[] = 'Please enter the action plan';
    }
    if (empty($_POST["date_action_completed"])) {
        $error[] = 'Please enter the date action was completed';
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

                                            <div class="mt-3">
                                                <label class="form-label">Action Plan</label>
                                                <div class="form-icon">
                                                        <input name="action_plan" type="text" class="form-control form-control-icon" id="action_plan" placeholder="Enter Action Plan">
                                                        <i class="ri-hard-drive-3-fill"></i>
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
                                                <label class="form-label">Priority</label>
                                                <div class="form-icon">
                                                <select name="priority" id="priority" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Low" selected>Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Critical">Critical</option>                                                                                                                                                        
                                                </select>                                                        
                                                    </div>
                                            </div>
                                        
                                            <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="type_of_incident" id="type_of_incident" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Reported</option>
                                                    <option value="1">In Review</option>
                                                    <option value="1">Under Investigation</option>
                                                    <option value="1">Repair In Progress</option>
                                                    <option value="1">Awaiting Parts</option>
                                                    <option value="1">Resolved</option>
                                                    <option value="1">Closed</option>
                                                    <option value="1">Pending User Action</option>
                                                    <option value="1">Escalated</option>
                                                    <option value="1">Unable To Repair</option>
                                                    <option value="1">Replacement Issued</option>
                                                    <option value="1">Awaiting Approval</option>                                                                                                         
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Description</label>
                                                <div class="form-icon">
                                                        <input name="description" type="text" class="form-control form-control-icon" id="description" placeholder="Enter the description">
                                                        <i class="ri-cpu-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Root Cause</label>
                                                <div class="form-icon">
                                                        <input name="root_cause" type="text" class="form-control form-control-icon" id="root_cause" placeholder="Enter the root cause">
                                                        <i class="ri-artboard-2-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Date of Action Plan</label>
                                                <div>                                                    
                                                    <input name="date_action_completed" type="date" class="form-control" id="date_action_completed">
                                                </div>
                                            </div>  

                                                                                        
                                                                                    
                                        </div>

                                        <div class="text-end">
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
                                                                $insertQuery = "INSERT INTO `office_equipment` (`equipment_id`, `system_name`, `system_manufacturer`, `system_model`, `system_sku`, `processor`, `baseboard_product`, `installed_ram`, `storage_medium`, `serial_number`, `charger`, `mouse_assigned`, `date_issued`, `purchase_cost`, `origin`, `user_id`, `updated_at`) VALUES (NULL, '".$system_name."', '".$system_manufacturer."', '".$system_model."', '".$system_sku."', '".$processor."', '".$baseboard_product."', '".$installed_ram."', '".$storage_medium."', '".$serial_number."', '".$charger."', '".$mouse_assigned."', '".$date_issued."', '".$purchase_cost."', '".$origin."', '".$staff."', current_timestamp());";
                                                                $db->insert($insertQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Office equipment has been added
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