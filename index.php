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
 * index.php
 *
 * This is the homepage of the invoice management system
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

  //select from the office equipment table
  $selectQuery="SELECT * FROM Office_Equipment";
  $dbSelect=$db->select($selectQuery);

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
                                <h4 class="mb-sm-0">VILCOM STAFF PORTAL-ADMIN</h4>

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
                            <a href="view_request.php" class="btn btn-info addMembers-modal"><i class="las la-bullhorn me-1"></i>View Requests</a>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card bg-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Ksh<span class="counter-value" data-target="559.25">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Assets
                                                
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-layer-group fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-info me-1">2,258</span> <span class="text-muted">Total Assets</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Ksh<span class="counter-value" data-target="409.66">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Repairs
                                                
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-tools fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-danger me-1">1,958</span> <span class="text-muted">Total Repairs</span>
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
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2 text-white">Ksh<span class="counter-value" data-target="136.98">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-white-50 mb-0"> Total Requests
                                                
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light-subtle text-light  rounded-circle fs-3">
                                                <i class="las la-bullhorn fs-24 text-white"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-primary me-1">338</span> <span class="text-white">Total Requests</span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Ksh<span class="counter-value" data-target="84.20">0</span>k</h4>
                                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0"> Total Incidents
                                                
                                            </p>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-light rounded-circle fs-3">
                                                <i class="las la-exclamation-triangle fs-24 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <span class="badge bg-info me-1">502</span> <span class="text-muted">Total Incidents</span>
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
                                    <h5 class="card-title mb-0">All Office Equipments</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th data-ordering="false">ID</th>
                                                <th data-ordering="false">System Name</th>
                                                <th data-ordering="false">System Manufacturer</th>
                                                <th data-ordering="false">System Model</th>
                                                <th data-ordering="false">System SKU</th>
                                                <th>Processor</th>
                                                <th>BaseBoard Product</th>
                                                <th>Installed RAM</th>
                                                <th>Storage Medium</th>
                                                <th>Serial Number</th>
                                                <th>Charger</th>
                                                <th>Mouse Assigned</th>
                                                <th>Date Issued</th>
                                                <th>Date Of Purchase</th>
                                                <th>Depreciation Rate</th>
                                                <th>Current Value</th>
                                                <th>Purchase Cost</th>
                                                <th>Origin</th>
                                                <th>Staff</th>
                                                <th>Category</th>
                                                <th>Updated_At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //check if data exists
                                            if(count($dbSelect)){
                                                foreach($dbSelect as $row){                                            
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                    </div>
                                                </th>
                                                <td><?php echo $row['equipment_id'];?></td>
                                                <td><?php echo $row['system_name'];?></td>
                                                <td><?php echo $row['system_manufacturer'];?></td>
                                                <td><?php echo $row['system_model'];?></td>
                                                <td><?php echo $row['system_sku'];?></td>
                                                <td><?php echo $row['processor'];?></td>
                                                <td><?php echo $row['baseboard_product'];?></td>
                                                <td><?php echo $row['installed_ram'];?></td>
                                                <td><?php echo $row['storage_medium'];?></td>
                                                <td><?php echo $row['serial_number'];?></td>
                                                <td><?php echo $row['charger'];?></td>
                                                <?php
                                  if($row['mouse_assigned']=='Yes')
                                  {
                                    echo '<td><span class="badge bg-primary-subtle text-primary ">'.$row['mouse_assigned'].'</span></td>';                                    
                                  }else
                                  {
                                    echo '<td><span class="badge bg-danger-subtle text-danger ">'.$row['mouse_assigned'].'</span></td>';
                                  }
                                  ?>
                                  <td><?php echo $row['date_issued'];?></td>
                                  <td><?php echo $row['date_of_purchase'];?></td>
                                  <td><?php echo $row['depreciation_rate'];?></td>
                                  <td><?php echo $row['current_value'];?></td>
                                  <td><?php echo $row['purchase_cost'];?></td>
                                  <td><?php echo $row['origin'];?></td>
                                  <?php
                                  //select staff from ID
                                  $office_user_id=$row['user_id'];
                                  $userQuery="SELECT first_name, last_name from user where user_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }
                                  ?>

                                <?php
                                  //select category from ID
                                  $category_id=$row['category_id'];
                                  $categoryQuery="SELECT name from category where category_id=$category_id";
                                  $categorySelect=$db->select($categoryQuery);

                                  foreach($categorySelect as $row1)
                                  {
                                    echo '<td>'.$row1['name'].'</td>';
                                  }
                                  ?>
                                  
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                                
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                            <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                            <li>
                                                                <a class="dropdown-item remove-item-btn">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                          }
                      }
                      else
                      {
                          echo "Oops :( No Data Found";
                      }
                      ?>                                            
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