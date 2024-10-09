<?php

/**
 * Vilcom Staff Portal
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
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
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
                                                <label class="form-label">Priority</label>
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
                                                <label class="form-label">Equipment description and Justification</label>
                                                <div class="form-icon">
                                                <textarea name="description" class="form-control bg-light border-0" id="description" placeholder="<?php echo $desc;?>" readonly="readonly"><?php echo $desc;?></textarea>                                                       
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
                                $insertQuery = "UPDATE `request` SET `priority` = '".$priority."' WHERE `request`.`request_id` = '".$requestid."';";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Request has been sent for approval, monitor status for confirmation
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