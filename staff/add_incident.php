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
    $serial_number = trim($_POST['serial_number']);
    $charger = trim($_POST['charger']);
    $mouse_assigned = trim($_POST['mouse_assigned']);
    $date_issued = trim($_POST['date_issued']);
    $purchase_cost = trim($_POST['purchase_cost']);
    $origin = trim($_POST['origin']);
    $staff = trim($_POST['staff']);
    
    if (isset($_POST['system_name'])) $system_name = $_POST['system_name'];
    if (isset($_POST['system_manufacturer'])) $system_manufacturer = $_POST['system_manufacturer'];
    if (isset($_POST['system_model'])) $system_model = $_POST['system_model'];
    if (isset($_POST['system_sku'])) $system_sku= $_POST['system_sku'];
    if (isset($_POST['processor'])) $processor = $_POST['processor'];
    if (isset($_POST['baseboard_product'])) $baseboard_product = $_POST['baseboard_product'];
    if (isset($_POST['installed_ram'])) $installed_ram = $_POST['installed_ram'];
    if (isset($_POST['storage_medium'])) $storage_medium = $_POST['storage_medium'];
    if (isset($_POST['serial_number'])) $serial_number = $_POST['serial_number'];
    if (isset($_POST['charger'])) $charger = $_POST['charger'];
    if (isset($_POST['mouse_assigned'])) $mouse_assigned = $_POST['mouse_assigned'];
    if (isset($_POST['date_issued'])) $date_issued = $_POST['date_issued'];
    if (isset($_POST['purchase_cost'])) $purchase_cost = $_POST['purchase_cost'];
    if (isset($_POST['origin'])) $origin = $_POST['origin'];
    if (isset($_POST['staff'])) $staff = $_POST['staff'];
    $error = array();
    if (empty($_POST["system_name"])) {
        $error[] = 'Please enter the system name';
    }
    if (empty($_POST["system_manufacturer"])) {
        $error[] = 'Please enter the system manufacturer';
    }
    if (empty($_POST["system_model"])) {
        $error[] = 'Please enter the system model';
    }
    if (empty($_POST["system_sku"])) {
        $error[] = 'Please enter the system sku';
    }
    if (empty($_POST["processor"])) {
        $error[] = 'Please enter the processor';
    }
    if (empty($_POST["baseboard_product"])) {
        $error[] = 'Please enter the baseboard product';
    }
    if (empty($_POST["installed_ram"])) {
        $error[] = 'Please enter the installed RAM';
    }
    if (empty($_POST["storage_medium"])) {
        $error[] = 'Please enter the storage medium';
    }
    if (empty($_POST["serial_number"])) {
        $error[] = 'Please enter the serial number';
    }
    if (empty($_POST["charger"])) {
        $error[] = 'Please enter the charger details';
    }
    if (empty($_POST["mouse_assigned"])) {
        $error[] = 'Please select if mouse is assigned';
    }
    if (empty($_POST["date_issued"])) {
        $error[] = 'Please choose the date of issue';
    }
    if (empty($_POST["purchase_cost"])) {
        $error[] = 'Please enter the purchase cost';
    }
    if (empty($_POST["origin"])) {
        $error[] = 'Please choose the origin of equipment';
    }
    if (empty($_POST["staff"])) {
        $error[] = 'Please choose staff';
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
                                <h4 class="mb-sm-0">ADD OFFICE EQUIPMENT</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Office Equipment</li>
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
                                                                <select name="staff" id="staff" class="form-select mb-3" aria-label="Default select example">
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
                                            <div>
                                                <label class="form-label">System Name</label>
                                                <div class="form-icon">
                                                        <input name="system_name" type="text" class="form-control form-control-icon" id="system_name" placeholder="Enter System Name">
                                                        <i class="ri-menu-unfold-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">System Manufacturer</label>
                                                <div class="form-icon">
                                                        <input name="system_manufacturer" type="text" class="form-control form-control-icon" id="system_manufacturer" placeholder="Enter System Manufacturer">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">System Model</label>
                                                <div class="form-icon">
                                                        <input name="system_model" type="text" class="form-control form-control-icon" id="system_model" placeholder="Enter System Model">
                                                        <i class="ri-shapes-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Installed RAM</label>
                                                <div class="form-icon">
                                                        <input name="installed_ram" type="text" class="form-control form-control-icon" id="installed_ram" placeholder="Enter Installed RAM">
                                                        <i class="ri-ram-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Serial Number</label>
                                                <div class="form-icon">
                                                        <input name="serial_number" type="text" class="form-control form-control-icon" id="serial_number" placeholder="Enter Serial Number">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Mouse Assigned</label>
                                                <div class="form-icon">
                                                <select name="mouse_assigned" id="mouse_assigned" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Yes" selected>Yes</option>
                                                    <option value="No">No</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Purchase Cost</label>
                                                <div class="form-icon">
                                                        <input name="purchase_cost" type="number" class="form-control form-control-icon" id="purchase_cost" placeholder="Enter Purchase Cost">
                                                        <i class="ri-wallet-3-fill"></i>
                                                    </div>
                                            </div>

                                           
                                        </div>

                                        <div class="col-lg-6">
                                        <div class="mt-3">
                                                <label class="form-label">Origin</label>
                                                <div class="form-icon">
                                                <select name="origin" id="origin" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Vilcom" selected>Vilcom</option>
                                                    <option value="Geonet">Geonet</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            <div>
                                                <label class="form-label">System SKU</label>
                                                <div class="form-icon">
                                                        <input name="system_sku" type="text" class="form-control form-control-icon" id="system_sku" placeholder="Enter System SKU">
                                                        <i class="ri-scroll-to-bottom-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Processor</label>
                                                <div class="form-icon">
                                                        <input name="processor" type="text" class="form-control form-control-icon" id="processor" placeholder="Enter Processor">
                                                        <i class="ri-cpu-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">BaseBoard Product</label>
                                                <div class="form-icon">
                                                        <input name="baseboard_product" type="text" class="form-control form-control-icon" id="baseboard_product" placeholder="Enter BaseBoard Product">
                                                        <i class="ri-artboard-2-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Storage Medium</label>
                                                <div class="form-icon">
                                                        <input name="storage_medium" type="text" class="form-control form-control-icon" id="storage_medium" placeholder="Enter Storage Medium">
                                                        <i class="ri-hard-drive-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Charger</label>
                                                <div class="form-icon">
                                                        <input name="charger" type="text" class="form-control form-control-icon" id="charger" placeholder="Enter Charger">
                                                        <i class="ri-battery-charge-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Date Issued</label>
                                                <div>                                                    
                                                    <input name="date_issued" type="date" class="form-control" id="date_issued">
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