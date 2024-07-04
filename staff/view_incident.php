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
 * view_incident.php --> Staff part
 *
 * This file enables staff to view and track incidents reported.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the office equipment table
 $selectQuery="SELECT * from equipment_incident as I, office_equipment as E WHERE i.equipment_id=E.equipment_id AND E.user_id=$user_id;";
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
                                <h4 class="mb-sm-0">VIEW YOUR INCIDENTS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View Incidents</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Track</b> incidents
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Your Incidents</h5>
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
                                                <th data-ordering="false">Incident Date</th>
                                                <th data-ordering="false">Type Of Incident</th>
                                                <th data-ordering="false">Source</th>
                                                <th data-ordering="false">Process</th>
                                                <th>Priority</th>
                                                <th>Status</th>                                                
                                                <th>Description</th>
                                                <th>Root Cause</th>
                                                <th>Action Plan</th>
                                                <th>Date Action Completed</th>
                                                <th>Equipment</th>
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
                                                <td><?php echo $row['equipment_incident_id'];?></td>
                                                <td><?php echo $row['incident_date'];?></td>
                                                <td><?php echo $row['type_of_incident'];?></td>
                                                <td><?php echo $row['source'];?></td>
                                                <td><?php echo $row['process'];?></td>                                                
                                                
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
                                  <?php
                                  if($row['status']=='Pending')
                                  {
                                    echo '<td><span class="badge bg-warning-subtle text-warning ">'.$row['status'].'</span></td>';                                    
                                  }else if($row['status']=='Approved')
                                  {
                                    echo '<td><span class="badge bg-primary-subtle text-primary ">'.$row['status'].'</span></td>';
                                  }else if($row['status']=='Rejected')
                                  {
                                    echo '<td><span class="badge bg-danger-subtle text-danger ">'.$row['status'].'</span></td>';
                                  }
                                  else
                                  {
                                    echo '<td><span class="badge bg-info-subtle text-info ">'.$row['status'].'</span></td>';
                                  }
                                  ?>
                                  <td><?php echo $row['description'];?></td>
                                  <td><?php echo $row['root_cause'];?></td>
                                  <td><?php echo $row['action_plan'];?></td>
                                  <td><?php echo $row['date_action_completed'];?></td>                                  
                                  <?php
                                  //select equipment from ID                                 
                                  $userQuery="SELECT system_name from office_equipment where user_id=$user_id";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['system_name'].'</td>';
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