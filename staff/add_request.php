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
 * add_request.php --> Staff Part
 *
 * This file enables staff to request for equipment
 * 
 * @author Hillary Chesaro
 */

include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = trim($_POST['item_name']);
    $description = trim($_POST['description']);


    if (isset($_POST['item_name'])) $item_name = $_POST['item_name'];
    if (isset($_POST['description'])) $description = $_POST['description'];


    $error = array();
    if (empty($_POST["item_name"])) {
        $error[] = 'Please enter the equipment name';
    }
    if (empty($_POST["description"])) {
        $error[] = 'Please enter description of the equipment';
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
                        <h4 class="mb-sm-0">ADD REQUEST</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Request</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Seamlessly</strong> request for equipment
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Add request form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Equipment Name</label>
                                            <div class="form-icon">
                                                <input type="text" name="item_name" class="form-control form-control-icon" id="item_name" placeholder="Enter equipment name">
                                                <i class="ri-drag-drop-line"></i>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                                <label class="form-label">Equipment description and Justification</label>
                                                <div class="form-icon">
                                                        <textarea name="description" class="form-control form-control-icon" id="description"></textarea>                                                        
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
                                $insertQuery = "INSERT INTO `request` (`request_id`, `item_name`, `description`, `status`, `priority`, `user_id`, `updated_at`) VALUES (NULL, '".$item_name."', '".$description."', 'Pending', 'Medium', '".$user_id."', CURRENT_TIMESTAMP);";
                                $db->insert($insertQuery);
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Request has been sent, go to view request to track
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