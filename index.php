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
 * index.php
 *
 * This is the homepage of the invoice management system
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
                                <h4 class="mb-sm-0">VILCOM ASSETS INFORMATION MANAGEMENT SYSTEM</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row pb-4 gy-3">
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-primary addMembers-modal"><i class="las la-bullhorn me-1"></i>View Requests</a>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Ksh<span class="counter-value" data-target="559.25">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Assets
                                                <span class="text-success fs-14 mb-0 ms-1">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 %
                                                </span>
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-file-alt fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-primary me-1">2,258</span> <span class="text-muted">Total Assets</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="409.66">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Allocated Assets
                                                <span class="text-danger fs-14 mb-0 ms-1">
                                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +8.09 %
                                                </span>
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-check-square fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-danger me-1">1,958</span> <span class="text-muted">Allocated Assets</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2 text-white"><span class="counter-value" data-target="136.98">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-white-50 mb-0"> Pending Assets
                                                <span class="text-danger fs-14 mb-0 ms-1">
                                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +9.01 %
                                                </span>
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light-subtle text-light  rounded-circle fs-3">
                                                <i class="las la-clock fs-24 text-white"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-danger me-1">338</span> <span class="text-white">Pending Assets</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="84.20">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0"> Network Assets
                                                <span class="text-success fs-14 mb-0 ms-1">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +7.55 %
                                                </span>
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-times-circle fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-primary me-1">502</span> <span class="text-muted">Network Assets</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Scroll - Vertical</h5>
                                </div>
                                <div class="card-body">
                                    <table id="scroll-vertical" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project</th>
                                                <th>Task</th>
                                                <th>Client Name</th>
                                                <th>Assigned To</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>VLZ-452</td>
                                                <td>Symox v1.0.0</td>
                                                <td><a href="#!">Add Dynamic Contact List</a></td>
                                                <td>RH Nichols</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>03 Oct, 2021</td>
                                                <td><span class="badge bg-info-subtle text-info ">Re-open</span></td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-453</td>
                                                <td>Doot - Chat App Template</td>
                                                <td><a href="#!">Additional Calendar</a></td>
                                                <td>Diana Kohler</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-4.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>05 Oct, 2021</td>
                                                <td><span class="badge bg-secondary-subtle text-secondary ">On-Hold</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-454</td>
                                                <td>Qexal - Landing Page</td>
                                                <td><a href="#!">Make a creating an account profile</a></td>
                                                <td>David Nichols</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>27 April, 2022</td>
                                                <td><span class="badge bg-danger-subtle text-danger ">Closed</span></td>
                                                <td><span class="badge bg-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-455</td>
                                                <td>Dorsin - Landing Page</td>
                                                <td><a href="#!">Apologize for shopping Error!</a></td>
                                                <td>Tonya Noble</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>14 June, 2021</td>
                                                <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-456</td>
                                                <td>Minimal - v2.1.0</td>
                                                <td><a href="#!">Support for theme</a></td>
                                                <td>Donald Palmer</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>25 June, 2021</td>
                                                <td><span class="badge bg-danger-subtle text-danger ">Closed</span></td>
                                                <td><span class="badge bg-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-457</td>
                                                <td>Dason - v1.0.0</td>
                                                <td><a href="#!">Benner design for FB & Twitter</a></td>
                                                <td>Jennifer Carter</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>14 Aug, 2021</td>
                                                <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-458</td>
                                                <td>Hybrix v1.6.0</td>
                                                <td><a href="#!">Add datatables</a></td>
                                                <td>James Morris</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-4.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>12 March, 2022</td>
                                                <td><span class="badge bg-primary-subtle text-primary ">Open</span></td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-460</td>
                                                <td>Skote v2.0.0</td>
                                                <td><a href="#!">Support for theme</a></td>
                                                <td>Nancy Martino</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-3.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-10.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-9.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>28 Feb, 2022</td>
                                                <td><span class="badge bg-secondary-subtle text-secondary ">On-Hold</span></td>
                                                <td><span class="badge bg-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-461</td>
                                                <td>Hybrix v1.0.0</td>
                                                <td><a href="#!">Form submit issue</a></td>
                                                <td>Grace Coles</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-9.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-9.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-10.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>07 Jan, 2022</td>
                                                <td><span class="badge bg-success-subtle text-success ">New</span></td>
                                                <td><span class="badge bg-danger">High</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-462</td>
                                                <td>Minimal - v2.2.0</td>
                                                <td><a href="#!">Edit customer testimonial</a></td>
                                                <td>Freda</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>16 Aug, 2021</td>
                                                <td><span class="badge bg-danger-subtle text-danger ">Closed</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-454</td>
                                                <td>Qexal - Landing Page</td>
                                                <td><a href="#!">Make a creating an account profile</a></td>
                                                <td>David Nichols</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>27 April, 2022</td>
                                                <td><span class="badge bg-danger-subtle text-danger ">Closed</span></td>
                                                <td><span class="badge bg-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-455</td>
                                                <td>Dorsin - Landing Page</td>
                                                <td><a href="#!">Apologize for shopping Error!</a></td>
                                                <td>Tonya Noble</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>14 June, 2021</td>
                                                <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-456</td>
                                                <td>Minimal - v2.1.0</td>
                                                <td><a href="#!">Support for theme</a></td>
                                                <td>Donald Palmer</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-2.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>25 June, 2021</td>
                                                <td><span class="badge bg-danger-subtle text-danger ">Closed</span></td>
                                                <td><span class="badge bg-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>VLZ-457</td>
                                                <td>Dason - v1.0.0</td>
                                                <td><a href="#!">Benner design for FB & Twitter</a></td>
                                                <td>Jennifer Carter</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-5.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-6.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-7.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                            
                                                        <a href="javascript: void(0);" class="avatar-group-item" data-img="avatar-8.jpg" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Username">
                                                            <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>14 Aug, 2021</td>
                                                <td><span class="badge bg-warning-subtle text-warning">Inprogress</span></td>
                                                <td><span class="badge bg-info">Medium</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>