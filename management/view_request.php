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
 * view_request.php --> Admin part
 *
 * This file enables admin to view and track the equipment requested.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the office equipment table
 $selectQuery="SELECT * FROM request WHERE priority='High'";
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
                                <h4 class="mb-sm-0">VIEW REQUESTS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View requests</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Track</b> requests
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Requests</h5>
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
                                                <th data-ordering="false">Equipment Name</th>
                                                <th data-ordering="false">Description</th>
                                                <th data-ordering="false">Status</th>
                                                <th data-ordering="false">Priority</th>
                                                <th>Staff</th>
                                                <th>Updated At</th>                                                
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
                                                <td><?php echo $row['request_id'];?></td>
                                                <td><?php echo $row['item_name'];?></td>
                                                <td><?php echo $row['description'];?></td>                                                
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
                                  //select staff from ID
                                  $office_user_id=$row['user_id'];
                                  $userQuery="SELECT first_name, last_name from user where user_id=$office_user_id";
                                  $userSelect=$db->select($userQuery);

                                  foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }
                                  ?>
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                                
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                    <form method="post" action="approve_request.php"><input type="hidden" name="myRequestId"  value="<?php echo $row['request_id'];?>">
                                                        <button name="add_items" id="add_items" class="btn btn-info" type="submit">
                                                        <i class="ri-thumb-up-line align-bottom me-1"></i>Approve
                                                        </button>
                                                    </form>
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