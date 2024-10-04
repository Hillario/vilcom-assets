<?php

/**
 * Vilcom Staff Portal
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
 * update_department.php 
 *
 * This file enables admin update departments
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve User ID
if(isset($_POST['myRepairId']))
{
    $_SESSION['repairid']=$_POST['myRepairId'];

}

$repairid=($_SESSION['repairid']);

$requestQuery="SELECT * FROM equipment_repair WHERE equipment_repair_id=$repairid";
$selectQuery=$db->select($requestQuery);
foreach($selectQuery as $row)
{
    $status=$row['status'];
    $priority=$row['priority'];
    $due_date=$row['due_date'];        
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $pstatus = @trim($_POST['pstatus']);
    $ppriority = @trim($_POST['ppriority']);
    $pdue_date = @trim($_POST['pdue_date']);         
    
    if (isset($_POST['pstatus'])) $pstatus = $_POST['pstatus'];
    if (isset($_POST['ppriority'])) $ppriority = $_POST['ppriority'];
    if (isset($_POST['pdue_date'])) $pdue_date = $_POST['pdue_date'];   
    
    $error = array();    
    if (empty($_POST["pstatus"])) {
        $error[] = 'Please check the status of the repair';
    }
    if (empty($_POST["ppriority"])) {
        $error[] = 'Please check the priority of the repair';
    }
    if (empty($_POST["pdue_date"])) {
        $error[] = 'Please check the due date of the repair';
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
                        <h4 class="mb-sm-0">UPDATE REPAIR</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Update Repair</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Update</strong> details for equipment repair
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Update repair form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                    <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="pstatus" class="form-select mb-3" aria-label="Default select example">
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
                                                <label class="form-label">Due Date</label>
                                                <div>                                                    
                                                    <input name="pdue_date" type="date" class="form-control" id="exampleInputdate">
                                                </div>
                                            </div>

                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">Update Repair</button>
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
                                $insertQuery = "UPDATE `equipment_repair` SET `status` = '".$pstatus."', `priority` = '".$ppriority."', `due_date` = '".$pdue_date."' WHERE `equipment_repair`.`equipment_repair_id` = '".$repairid."';";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Equipment repair has been updated
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