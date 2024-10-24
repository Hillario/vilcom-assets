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
 * view_network_equipment.php
 *
 * This file enables the admin to view all network equipments.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the office equipment table
 $selectQuery="SELECT * FROM network_equipment";
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
                                <h4 class="mb-sm-0">VIEW NETWORK EQUIPMENTS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View Network Equipments</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Update</b> network equipments
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Network Equipments</h5>
                                </div>
                                <div class="card-body">
                                    <table id="buttons-datatables" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 10px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th data-ordering="false">ID</th>
                                                <th data-ordering="false">Designation</th>
                                                <th data-ordering="false">System Name</th>
                                                <th data-ordering="false">System Manufacturer</th>
                                                <th data-ordering="false">System Model</th>
                                                <th>System SKU</th>
                                                <th>Processor</th>
                                                <th>BaseBoard Product</th>
                                                <th>Installed RAM</th>
                                                <th>Storage Medium</th>
                                                <th>Serial Number</th>
                                                <th>Charger</th>                                                
                                                <th>Date Issued</th>
                                                <th>Date Of Purchase</th>
                                                <th>Depreciation Rate</th>
                                                <th>Current Value</th>
                                                <th>Purchase Cost</th>
                                                <th>Origin</th>                                                
                                                <th>Updated_At</th>                                                
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
                                                <td><?php echo $row['network_id'];?></td>
                                                <td><?php echo $row['designation'];?></td>
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
                                  <td><?php echo $row['date_issued'];?></td>
                                  <td><?php echo $row['date_of_purchase'];?></td>
                                  <td><?php echo $row['depreciation_rate'];?></td>
                                  <td><?php echo $row['current_value'];?></td>
                                  <td><?php echo $row['purchase_cost'];?></td>
                                  <td><?php echo $row['origin'];?></td>                                  
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                                
                                                
                                            </tr>
                                            <?php
                          }
                      }
                      else
                      {
                          echo "<tr><td colspan='23' class='text-center'>Oops :( No Data Found</td></tr>";
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