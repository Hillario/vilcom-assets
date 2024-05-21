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
 * add_network_repairs.php
 *
 * This file enables the admin to add network equipment repairs.
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
                                <h4 class="mb-sm-0">ADD NETWORK EQUIPMENT REPAIR</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Add Network Equipment Repair</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Seamlessly</strong> add network equipment repair with ease
                    </div>

                    <!-- Add office equipment repair form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Add network equipment repair form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">                                             
                                     

                                        <div class="mt-3">
                                                <label class="form-label">Select Network Equipment</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>HP 830 G6</option>
                                                    <option value="1">Dell Monitor</option>                                                                                                       
                                                </select>                                                        
                                                    </div>
                                            </div>
                                          
                                        
                                       

                                            <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Pending Assessment</option>
                                                    <option value="1">Under Inspection</option>
                                                    <option value="1">Awaiting parts</option>
                                                    <option value="1">In Repair</option>
                                                    <option value="1">Repaired</option>
                                                    <option value="1">Testing</option>
                                                    <option value="1">Ready for Pickup</option>
                                                    <option value="1">Completed</option>
                                                    <option value="1">Not Repairable</option>
                                                    <option value="1">Replacement Recommended</option>
                                                    <option value="1">On Hold</option>
                                                    <option value="1">Canceled</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <label class="form-label">Priority</label>
                                                <div class="form-icon">
                                                <select class="form-select mb-3" aria-label="Default select example">
                                                    <option selected>Low</option>
                                                    <option value="1">Medium</option>
                                                    <option value="1">High</option>
                                                    <option value="1">Critical</option>
                                                    <option value="1">Urgent</option>                                                                                                        
                                                </select>                                                        
                                                    </div>
                                            </div> 

                                            <div class="mt-3">
                                                <label class="form-label">Due Date</label>
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

                    <!-- Add office equipment repair form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>