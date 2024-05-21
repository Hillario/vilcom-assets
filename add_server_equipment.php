<?php

/**
 * vilcom networks invoice management system
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
 * add_server_equipment.php
 *
 * This file enables the admin to add server equipment.
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
                                <h4 class="mb-sm-0">ADD SERVER EQUIPMENT</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Server Equipment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> add server equipment with ease
                    </div>

                    <!-- Add office equipment form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add server equipment form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">System Name</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter System Name">
                                                        <i class="ri-menu-unfold-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">System Manufacturer</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter System Manufacturer">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">System Model</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter System Model">
                                                        <i class="ri-shapes-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Installed RAM</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Installed RAM">
                                                        <i class="ri-ram-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Serial Number</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Serial Number">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                            </div>                                            

                                            <div class="mt-3">
                                                <label class="form-label">Purchase Cost</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Purchase Cost">
                                                        <i class="ri-wallet-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Origin</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Vilcom</option>
                                                    <option value="1">Geonet</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>

                                           
                                        </div>

                                        <div class="col-lg-6">
                                            <div>
                                                <label class="form-label">System SKU</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter System SKU">
                                                        <i class="ri-scroll-to-bottom-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Processor</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Processor">
                                                        <i class="ri-cpu-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">BaseBoard Product</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter BaseBoard Product">
                                                        <i class="ri-artboard-2-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Storage Medium</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Storage Medium">
                                                        <i class="ri-hard-drive-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Charger</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter Charger">
                                                        <i class="ri-battery-charge-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Date Issued</label>
                                                <div>                                                    
                                                    <input type="date" class="form-control" id="exampleInputdate">
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

                    <!-- Add office equipment form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>