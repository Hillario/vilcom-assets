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
 * view_staff.php --> Admin part
 *
 * This file enables admin to view and update staff
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select from the user table
 $selectQuery="SELECT * FROM user";
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
                                <h4 class="mb-sm-0">VIEW STAFF</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">View staff</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>View</strong> and <b>Update</b> staff
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">All Staff</h5>
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
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Role</th>
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
                                                <td><?php echo $row['user_id'];?></td>
                                                <td><?php echo $row['first_name'];?></td>
                                                <td><?php echo $row['last_name'];?></td> 
                                                <td><?php echo $row['email'];?></td>                                               
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
                                  //select department from ID
                                  $office_user_id=$row['department_id'];
                                  $userQuery="SELECT name from department where department_id=$office_user_id";
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
                                   <?php
                                  //select role from ID
                                  $office_user_id=$row['role_id'];
                                  $userQuery="SELECT name from role where role_id=$office_user_id";
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
                                  <td><?php echo $row['updated_at'];?></td>                                                                    
                                                
                                                <td>
                                                <div class="dropdown d-inline-block">
                                                    <form method="post" action="update_staff.php"><input type="hidden" name="myUserId"  value="<?php echo $row['user_id'];?>">
                                                        <button name="add_items" id="add_items" class="btn btn-info" type="submit">
                                                        <i class="ri-refresh-fill align-bottom me-1"></i>Update
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