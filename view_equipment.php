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
 * view_equipment.php
 *
 * This file enables the admin to view all office equipments.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the office equipment table
 $selectQuery="SELECT * FROM office_equipment";
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
                                <h4 class="mb-sm-0">VIEW OFFICE EQUIPMENTS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View Office Equipments</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Update</b> office equipments
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Office Equipments</h5>
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
                                                <th data-ordering="false">Staff</th>
                                                <th data-ordering="false">System Manufacturer</th>
                                                <th data-ordering="false">System Model</th>
                                                <th>System SKU</th>
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