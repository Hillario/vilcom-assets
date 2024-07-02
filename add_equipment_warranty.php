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
 * add_equipment_warranty.php
 *
 * This file enables the admin to add office equipment warranties.
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
                                <h4 class="mb-sm-0">ADD OFFICE EQUIPMENT WARRANTY</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Office Equipment Warranty</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> add office equipment warranty with ease
                    </div>

                    <!-- Add office equipment warranty form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add office equipment warranty form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">

                                        <div class="mt-3">
                                                <label class="form-label">Select Staff</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Hillary Chesaro</option>
                                                    <option value="1">Mark Yegon</option>                                                                                                      
                                                </select>                                                        
                                                    </div>
                                            </div>

                                        <div class="mt-3">
                                                <label class="form-label">Select Office Equipment</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>HP 830 G6</option>
                                                    <option value="1">Dell Monitor</option>                                                                                                       
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            
                                        
                                        <div class="mt-3">
                                                <label class="form-label">Start Date</label>
                                                <div>                                                    
                                                    <input type="date" class="form-control" id="exampleInputdate">
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">End Date</label>
                                                <div>                                                    
                                                    <input type="date" class="form-control" id="exampleInputdate">
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="col-lg-6">



                                            <div class="mt-3">
                                                <label class="form-label">Warranty Type</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Manufacturer's Warranty</option>
                                                    <option value="1">Extended Warranty</option>
                                                    <option value="1">On-Site Warranty</option>
                                                    <option value="1">Parts-Only Warranty</option>
                                                    <option value="1">Limited Warranty</option>
                                                    <option value="1">Lifetime Warranty</option>
                                                    <option value="1">Service Contract</option>
                                                    <option value="1">RMA Warranty</option>
                                                    <option value="1">Third-Party Warranty</option>
                                                    <option value="1">Software Warranty</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Warranty Details</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter warranty details">
                                                        <i class="ri-book-read-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Warranty Contact</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter details of the warranty contact">
                                                        <i class="ri-contacts-book-3-line"></i>
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Warranty Provider</label>
                                                <div class="form-icon">
                                                        <input type="email" class="form-control form-control-icon" id="iconInput" placeholder="Enter details of the warranty provider">
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