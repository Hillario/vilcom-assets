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
 * add_department.php
 *
 * This file enables the admin to add a department.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

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
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">                                                                              

                                            <div class="mt-3">
                                                <label class="form-label">Item Name</label>
                                                <div class="form-icon">
                                                        <input type="test" class="form-control form-control-icon" id="iconInput" placeholder="Enter item name">
                                                        <i class="ri-drag-drop-line"></i>
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Department Description</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter the description of the department">
                                                        <i class="ri-align-item-bottom-line"></i>
                                                    </div>
                                            </div>  

                                           
                                        </div>                                       

                                        <div class="text-end">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                    </div>
                                </div>
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