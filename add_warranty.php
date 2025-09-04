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
 * add_warranty.php 
 *
 * This file enables admin add warranty information to office equipment
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve User ID
if(isset($_POST['WarrantyEquipmentId']))
{
    $_SESSION['warrantyequipmentid']=$_POST['WarrantyEquipmentId'];
}

$warrantyequipmentid=($_SESSION['warrantyequipmentid']);

$warrantyQuery="SELECT equipment_id, system_name FROM office_equipment WHERE equipment_id=$warrantyequipmentid";
$selectQuery=$db->select($warrantyQuery);
foreach($selectQuery as $row)
{
    $equipmentid=$row["equipment_id"];
    $equipment_name=$row['system_name'];                
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    
    $startdate = @trim($_POST['startdate']);
    $enddate = @trim($_POST['enddate']);
    $warranty_type = @trim($_POST['warranty_type']);
    $warranty_details = @trim($_POST['warranty_details']);
    $warranty_contact = @trim($_POST['warranty_contact']);
    $warranty_provider = @trim($_POST['warranty_provider']);             
    
    if (isset($_POST['startdate'])) $startdate = $_POST['startdate'];
    if (isset($_POST['enddate'])) $enddate = $_POST['enddate'];
    if (isset($_POST['warranty_type'])) $warranty_type = $_POST['warranty_type'];
    if (isset($_POST['warranty_details'])) $warranty_details = $_POST['warranty_details'];
    if (isset($_POST['warranty_contact'])) $warranty_contact = $_POST['warranty_contact'];
    if (isset($_POST['warranty_provider'])) $warranty_provider = $_POST['warranty_provider'];       
    
    $error = array();    
    if (empty($_POST["startdate"])) {
        $error[] = 'Please enter the start date';
    }
    if (empty($_POST["enddate"])) {
        $error[] = 'Please enter the end date';
    }
    if (empty($_POST["warranty_type"])) {
        $error[] = 'Please enter the warranty type';
    }
    if (empty($_POST["warranty_details"])) {
        $error[] = 'Please enter the warranty details';
    }
    if (empty($_POST["warranty_contact"])) {
        $error[] = 'Please enter the warranty contact';
    }
    if (empty($_POST["warranty_provider"])) {
        $error[] = 'Please enter the warranty provider';
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
                        <h4 class="mb-sm-0">ADD WARRANTY INFORMATION</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add warranty information for <?php echo $equipment_name;?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Add </strong>warranty information for <?php echo $equipment_name;?>
            </div>

            <!-- Add office equipment warranty form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add office equipment warranty form</h4>
                                </div>
                                 <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                        
                                        <div class="mt-3">
                                                <label class="form-label">Start Date</label>
                                                <div>                                                    
                                                    <input name="startdate" type="date" class="form-control" id="startdate">
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">End Date</label>
                                                <div>                                                    
                                                    <input name="enddate" type="date" class="form-control" id="enddate">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Warranty Type</label>
                                                <div class="form-icon">
                                                <select name="warranty_type" id="warranty_type" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Manufacturer Warranty">Manufacturer Warranty</option>
                                                    <option value="Extended Warranty">Extended Warranty</option>
                                                    <option value="On-Site Warranty">On-Site Warranty</option>
                                                    <option value="Parts-Only Warranty">Parts-Only Warranty</option>
                                                    <option value="Limited Warranty">Limited Warranty</option>
                                                    <option value="Lifetime Warranty">Lifetime Warranty</option>
                                                    <option value="Service Contract">Service Contract</option>
                                                    <option value="RMA Warranty">RMA Warranty</option>
                                                    <option value="Third-Party Warranty">Third-Party Warranty</option>
                                                    <option value="Software Warranty">Software Warranty</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>
                                           
                                        </div>

                                        <div class="col-lg-6">
                                            

                                            <div class="mt-3">
                                                <label class="form-label">Warranty Details</label>
                                                <div class="form-icon">
                                                        <input name="warranty_details" id="warranty_details" type="text" class="form-control form-control-icon" placeholder="Enter warranty details">
                                                        <i class="ri-book-read-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Warranty Contact</label>
                                                <div class="form-icon">
                                                        <input name="warranty_contact" id="warranty_contact" type="text" class="form-control form-control-icon" placeholder="Enter details of the warranty contact">
                                                        <i class="ri-contacts-book-3-line"></i>
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Warranty Provider</label>
                                                <div class="form-icon">
                                                        <input name="warranty_provider" id="warranty_provider" type="text" class="form-control form-control-icon" placeholder="Enter details of the warranty provider">
                                                        <i class="ri-home-office-line"></i>
                                                    </div>
                                            </div>  
                                        </div>

                                        <div class="text-end">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                                 </form>
                                 <?php                     

                        //  form operations
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-primary">
                            <i class="ri-megaphone-line"></i>
        <strong>Heads Up! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {                                
                                $insertQuery = "INSERT INTO `equipment_warranty` (`equipment_warranty_id`, `start_date`, `end_date`, `warranty_provider`, `warranty_type`, `warranty_details`, `warranty_contact`, `equipment_id`) VALUES (NULL, '".$startdate."', '".$enddate."', '".$warranty_provider."', '".$warranty_type."', '".$warranty_details."', '".$warranty_contact."', '".$equipmentid."');";
                                $db->insert($insertQuery);
                                header('Location:view_equipment_warranty.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Warranty information has been added
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

                    <!-- Add office equipment warranty form-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php
    include "footer.php";
    ?>