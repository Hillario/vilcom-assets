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
 * add_equipment_repair.php
 *
 * This file enables the admin to add office equipment repairs.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipment= trim($_POST['equipment']);   
    $status = trim($_POST['status']);
    $priority = trim($_POST['priority']);   
    $due_date = trim($_POST['due_date']);
    
            
    if (isset($_POST['equipment'])) $equipment = $_POST['equipment'];
    if (isset($_POST['status'])) $status = $_POST['status'];
    if (isset($_POST['priority'])) $priority = $_POST['priority'];
    if (isset($_POST['due_date'])) $due_date = $_POST['due_date'];          
    
    
    $error = array();
    if (empty($_POST["equipment"])) {
        $error[] = 'Please choose equipment';
    }    
    if (empty($_POST["status"])) {
        $error[] = 'Please choose status';
    }
    if (empty($_POST["priority"])) {
        $error[] = 'Please choose priority';
    }
    if (empty($_POST["due_date"])) {
        $error[] = 'Please select the due date';
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
                                <h4 class="mb-sm-0">ADD OFFICE EQUIPMENT REPAIR</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Office Equipment Repair</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> add office equipment repair with ease
                    </div>

                    <!-- Add office equipment repair form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add office equipment repair form</h4>
                                </div>
                                <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">

                                        <div class="mt-3">
                                                            <label class="form-label">Choose equipment from incident</label>
                                                            <div class="form-icon">
                                                                <select name="equipment" id="equipment" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $squery = "SELECT system_name, E.equipment_id FROM office_equipment as E, equipment_incident as I WHERE E.equipment_id=I.equipment_id AND I.status='Approved';";
                                                                    $ssquery = $db->select($squery);
                                                                    foreach ($ssquery as $row) {
                                                                        echo '<option value="' . $row['equipment_id'] . '">' . $row['system_name'].'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                          
                                        
                                       

                                            <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="status" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Pending Assessment" selected>Pending Assessment</option>
                                                    <option value="Under Inspection">Under Inspection</option>
                                                    <option value="Awaiting parts">Awaiting parts</option>
                                                    <option value="In Repair">In Repair</option>
                                                    <option value="Repaired">Repaired</option>
                                                    <option value="Testing">Testing</option>
                                                    <option value="Ready for Pickup">Ready for Pickup</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Not Repairable">Not Repairable</option>
                                                    <option value="Replacement Recommended">Replacement Recommended</option>
                                                    <option value="On Hold">On Hold</option>
                                                    <option value="Canceled">Canceled</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Priority</label>
                                                <div class="form-icon">
                                                <select name="priority" id="priority" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Low" selected>Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Critical">Critical</option>
                                                    <option value="Urgent">Urgent</option>                                                                                                        
                                                </select>                                                        
                                                    </div>
                                            </div> 

                                            <div class="mt-3">
                                                <label class="form-label">Due Date</label>
                                                <div>                                                    
                                                    <input name="due_date" type="date" class="form-control" id="exampleInputdate">
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
                                $insertQuery = "INSERT INTO `equipment_repair` (`equipment_repair_id`, `status`, `priority`, `due_date`, `equipment_id`, `updated_at`) VALUES (NULL, '".$status."', '".$priority."', '".$due_date."', '".$equipment."', CURRENT_TIMESTAMP);";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Repair has been added, update according to action plan from incident
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

                    <!-- Add office equipment repair form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>