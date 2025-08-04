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
 * office_asset_update.php 
 *
 * This file enables admin update office assets
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve User ID
if(isset($_POST['myAssetId']))
{
    $_SESSION['assetid']=$_POST['myAssetId'];
}

$assetid=($_SESSION['assetid']);

$departmentQuery="SELECT * FROM office_asset WHERE asset_id=$assetid";
$selectQuery=$db->select($departmentQuery);
foreach($selectQuery as $row)
{
    $itemname=$row['item_name'];
    $description=$row['description'];
    $placement=$row['placement'];
    $quantity=$row['quantity'];
    $acquisition_cost=$row['acquisition_cost'];            
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    if (isset($_POST['update'])) {
    $pitemname = @trim($_POST['pitemname']);
    $pdescription = @trim($_POST['pdescription']);
    $pplacement = @trim($_POST['pplacement']);
    $pquantity = @trim($_POST['pquantity']);
    $pdepartment = @trim($_POST['pdepartment']);
    $pacquisition_date = @trim($_POST['pacquisition_date']);
    $pacquisition_cost = @trim($_POST['pacquisition_cost']);              
    
    if (isset($_POST['pitemname'])) $pitemname = $_POST['pitemname'];
    if (isset($_POST['pdescription'])) $pdescription = $_POST['pdescription'];
    if (isset($_POST['pplacement'])) $pplacement = $_POST['pplacement'];
    if (isset($_POST['pquantity'])) $pquantity = $_POST['pquantity'];
    if (isset($_POST['pdepartment'])) $pdepartment = $_POST['pdepartment'];
    if (isset($_POST['pacquisition_date'])) $pacquisition_date = $_POST['pacquisition_date'];
    if (isset($_POST['pacquisition_cost'])) $pacquisition_cost = $_POST['pacquisition_cost'];       
    
    $error = array();    
    if (empty($_POST["pitemname"])) {
        $error[] = 'Please enter the name of the asset';
    }
    if (empty($_POST["pdescription"])) {
        $error[] = 'Please enter the description of the asset';
    }
    if (empty($_POST["pplacement"])) {
        $error[] = 'Please enter the placement of the asset';
    }
    if (empty($_POST["pquantity"])) {
        $error[] = 'Please enter the quantity of the asset';
    }
    if (empty($_POST["pdepartment"])) {
        $error[] = 'Please choose the department';
    }
    if (empty($_POST["pacquisition_date"])) {
        $error[] = 'Please choose the acquisition date';
    }
    if (empty($_POST["pacquisition_cost"])) {
        $error[] = 'Please enter the acquisition cost';
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
                        <h4 class="mb-sm-0">UPDATE OFFICE ASSET</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Update <?php echo $itemname;?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Update</strong> <?php echo $itemname;?>
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Update office asset form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                    <div class="mt-3">
                                                <label class="form-label">Item Name</label>
                                                <div class="form-icon">
                                                        <input name="pitemname" type="text" class="form-control form-control-icon" id="pitemname" placeholder="<?php echo $itemname;?>" value="<?php echo $itemname;?>">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Description</label>
                                                <div class="form-icon">
                                                        <textarea name="pdescription" class="form-control form-control-icon" id="pdescription"></textarea>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Placement</label>
                                                <div class="form-icon">
                                                        <input name="pplacement" type="text" class="form-control form-control-icon" id="pplacement" placeholder="<?php echo $placement;?>" value="<?php echo $placement;?>">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Quantity</label>
                                                <div class="form-icon">
                                                        <input name="pquantity" type="number" class="form-control form-control-icon" id="pquantity" placeholder="<?php echo $quantity;?>" value="<?php echo $quantity;?>">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Acquisition Date</label>
                                                <div>                                                    
                                                    <input name="pacquisition_date" type="date" class="form-control" id="pacquisition_date">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Acquisition Cost</label>
                                                <div class="form-icon">
                                                        <input name="pacquisition_cost" type="number" class="form-control form-control-icon" id="pacquisition_cost" placeholder="<?php echo $acquisition_cost;?>" value="<?php echo $acquisition_cost;?>">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                            <label class="form-label">Choose Department</label>
                                                            <div class="form-icon">
                                                                <select name="pdepartment" id="pdepartment" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $squery = "SELECT * FROM department";
                                                                    $ssquery = $db->select($squery);
                                                                    foreach ($ssquery as $row) {
                                                                        echo '<option value="' . $row['department_id'] . '">' . $row['name']. '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                    </div>

                                    <!-- Update button -->
            <div class="text-left">
                <button type="submit" name="update" class="btn btn-info">Update Office Asset</button>
            </div>

            <!-- Delete button -->
            <div class="text-left mt-2">
                <button type="submit" name="delete" class="btn btn-danger">Delete Office Asset</button>
            </div>
                                </div>
                            </div>
                        </form>
                        <?php                       
                        
                        //  form operations
                        if (isset($_POST['update'])) {
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {                                
                                $insertQuery = "UPDATE `office_asset` SET `item_name` = '".$pitemname."', `description` = '".$pdescription."', `placement` = '".$pplacement."', `quantity` = '".$pquantity."', `acquisition_date` = '".$pacquisition_date."', `acquisition_cost` = '".$pacquisition_cost."', `department_id` = '".$pdepartment."' WHERE `office_asset`.`asset_id` = '".$assetid."';";
                                $db->insert($insertQuery);
                                header('Location:office_asset_view.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Office Asset has been updated
    </div>';
                            }
                        }
                    }

                    if (isset($_POST['delete'])) {
                        // Delete department from the database
                        $deleteQuery = "DELETE FROM `office_asset` WHERE `asset_id` = '$assetid'";
                        $db->insert($deleteQuery);
                        header('Location:office_asset_view.php');
                        echo '<div class="alert alert-danger"><strong>Success!</strong> Office Asset has been deleted.</div>';
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