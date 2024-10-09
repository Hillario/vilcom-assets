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
 * view_equipment_repair.php --> Admin part
 *
 * This file enables admin to view and track all repairs.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the office equipment table
 $selectQuery="SELECT * FROM equipment_repair";
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
                                <h4 class="mb-sm-0">VIEW REPAIRS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View repairs</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Track</b> repairs
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Repairs</h5>
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
                                                <th data-ordering="false">System Name</th>
                                                <th data-ordering="false">Staff</th>
                                                <th data-ordering="false">Status</th>
                                                <th data-ordering="false">Priority</th>
                                                <th>Due Date</th>
                                                <th>Updated At</th>                                               
                                                
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
                                                <td><?php echo $row['equipment_repair_id'];?></td>
                                                <?php
                                  //select system name from ID
                                  $office_user_id=$row['equipment_id'];
                                  $userQuery="SELECT system_name from office_equipment where equipment_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['system_name'].'</td>';
                                  }
                                  ?>
                                  <?php
                                  //select staff from ID
                                  $equipment_id=$row['equipment_id'];
                                  $userQuery="SELECT U.first_name,U.last_name FROM equipment_repair as R, office_equipment as E, user as U WHERE R.equipment_id=E.equipment_id AND E.user_id=U.user_id AND R.equipment_id=$equipment_id;";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }
                                  ?>
                                  
                                                <td><?php echo $row['status'];?></td>
                                                <?php
                                  if($row['priority']=='Low')
                                  {
                                    echo '<td><span class="badge bg-primary">'.$row['priority'].'</span></td>';                                    
                                  }else if($row['priority']=='Medium')
                                  {
                                    echo '<td><span class="badge bg-info">'.$row['priority'].'</span></td>';
                                  }else if($row['priority']=='High')
                                  {
                                    echo '<td><span class="badge bg-warning">'.$row['priority'].'</span></td>';
                                  }
                                  else
                                  {
                                    echo '<td><span class="badge bg-danger">'.$row['priority'].'</span></td>';
                                  }
                                  ?>  
                                                <td><?php echo $row['due_date'];?></td>                                               
                                                
                                                                  
                                 
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                   
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