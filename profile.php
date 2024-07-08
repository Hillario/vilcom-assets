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
 * profile.php --> Staff Part
 *
 * This file enables staff to change their password
 * 
 * @author Hillary Chesaro
 */

include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = trim($_POST['password']);
    $confpassword = trim($_POST['confpassword']);


    if (isset($_POST['password'])) $password = $_POST['password'];
    if (isset($_POST['confpassword'])) $confpassword = $_POST['confpassword'];


    $error = array();
    if (empty($_POST["password"])) {
        $error[] = 'Please enter your new password';
    }
    if (empty($_POST["confpassword"])) {
        $error[] = 'Please confirm your password';
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
                        <h4 class="mb-sm-0">STAFF PROFILE</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Staff Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Manage</strong> your profile
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Change password form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">Enter your new password</label>
                                            <div class="form-icon">
                                                <input type="password" name="password" class="form-control form-control-icon" id="password" placeholder="Enter your new password">
                                                <i class="ri-git-repository-private-line"></i>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="form-icon">
                                                <input type="password" name="confpassword" class="form-control form-control-icon" id="confpassword" placeholder="Confirm your password">
                                                <i class="ri-git-repository-private-line"></i>
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
                                                            //password validation
                                                            if (strlen(trim($_POST['password'])) >= 6 && strlen(trim($_POST['confpassword'])) >= 6 && trim($_POST['password']) == trim($_POST['confpassword'])) {


                                                                //payment module integration

                                                                //email verification & validation

                                                                //insert query here
                                                                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                                                                $insertQuery = "UPDATE `user` SET `password` = '".$hashedPassword."', `status` = 'Approved' WHERE `user`.`user_id` = '".$user_id."';";
                                                                $db->insert($insertQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Password has been updated.
									</div>';
                                                            } else {
                                                                $error[] = "Check if password matches and is more than 6 characters.";
                                                                echo '<div class="alert alert-danger">										
										<strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                            }
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