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
 * view_support_machine.php
 *
 * This file enables the admin to view all support machines.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the support machines table
 $selectQuery="SELECT * FROM support_machines";
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
                                <h4 class="mb-sm-0">VIEW SUPPORT MACHINES</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View Support Machines</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Update</b> Support Machines
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Support Machines</h5>
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
                                                <th>ID</th>                                                
                                                <th>Staff</th>
                                                <th>Asset Description</th>
                                                <th>Model</th>
                                                <th>Location</th>
                                                <th>Comments</th>
                                                <th>Cost</th>
                                                <th>Department</th>                                                                                                                                                
                                                <th>Acquisition Date</th>
                                                <th>Released Date</th>                                                
                                                <th>Status</th>                                                
                                                <th>Serial Number</th>
                                                <th>Insurance Info</th>
                                                <th>Type</th>
                                                <th>Insurance Expiry</th>                                                                                                
                                                <th>Depreciation Rate</th>
                                                <th>Current Value</th>                         
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
                                                <td><?php echo $row['support_machine_id'];?></td>                                                
                                                <?php
                                  //select staff from ID
                                  $office_user_id=$row['user_id'];
                                  $userQuery="SELECT first_name, last_name from user where user_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  if ($userSelect) {
                                    foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }
                                  }else{
                                    echo '<td>Unknown</td>';
                                  }

                                  
                                  ?>
                                  <td><?php echo $row['asset_description'];?></td>
                                  <td><?php echo $row['model'];?></td>
                                  <td><?php echo $row['location'];?></td>
                                  <td><?php echo $row['comments'];?></td>
                                  <td><?php echo $row['cost'];?></td>

<?php
                                  //select department from ID
                                  $office_user_id=$row['department_id'];
                                  $userQuery="SELECT name FROM department WHERE department_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  if ($userSelect) {
                                    foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['name'].'</td>';
                                  }
                                  }else{
                                    echo '<td>Unknown</td>';
                                  }

                                  
                                  ?>
                                                
                                                
                                                
                                                <td><?php echo $row['acquisition_date'];?></td>
                                                <td><?php echo $row['released_date'];?></td>
                                                
                                                <td><?php echo $row['status'];?></td>
                                                <td><?php echo $row['serial_no'];?></td>
                                                <td><?php echo $row['insurance_info'];?></td>
                                                <td><?php echo $row['type'];?></td>
                                                <td><?php echo $row['insurance_expiry'];?></td>
                                                 
                                  
                                  <td><?php echo $row['depreciation_rate'];?></td>
                                  <td><?php echo $row['current_value'];?></td>
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