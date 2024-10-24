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
 * view_equipment.php
 *
 * This file enables the admin to view all office equipments.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

 //select department from user
 $departmentQuery="SELECT department_id FROM user WHERE user_id=$user_id";
 $selectDepartment=$db->select($departmentQuery);
 foreach($selectDepartment as $row)
 {
    $departmentid=$row['department_id'];
 }

  //select from the office equipment table
  $selectQuery="SELECT * FROM office_equipment as E, user as U,department as D WHERE E.user_id=U.user_id AND D.department_id=U.department_id AND D.department_id=$departmentid;";
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
                                    <h5 class="card-title mb-0">Department Office Equipments</h5>
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
                                                <th>System Name</th>
                                                <th>Staff</th>
                                                <th>Department</th>
                                                <th>System Model</th>
                                                <th>Serial Number</th>                                                
                                                <th>Processor</th>
                                                <th>System Manufacturer</th>
                                                <th>BaseBoard Product</th>
                                                <th>Installed RAM</th>
                                                <th>Storage Medium</th>
                                                <th>System SKU</th>
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

                                  if ($userSelect) {
                                    foreach($userSelect as $row1)
                                  {
                                    echo '<td>'.$row1['first_name'].' '.$row1['last_name'].'</td>';
                                  }

                                  }else{
                                    echo '<td>Unknown</td>';
                                  }
                                  
                                  ?>

<?php
                                  //select department from ID
                                  $office_user_id=$row['user_id'];
                                  $userQuery="SELECT D.name FROM department D, user U WHERE D.department_id=U.department_id AND U.user_id=$office_user_id";
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
                                                
                                                <td><?php echo $row['system_model'];?></td>
                                                <td><?php echo $row['serial_number'];?></td>
                                                <td><?php echo $row['processor'];?></td>
                                                <td><?php echo $row['system_manufacturer'];?></td>
                                                <td><?php echo $row['baseboard_product'];?></td>
                                                <td><?php echo $row['installed_ram'];?></td>
                                                <td><?php echo $row['storage_medium'];?></td>
                                                <td><?php echo $row['system_sku'];?></td>
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
                                                    <form method="post" action="update_equipment.php"><input type="hidden" name="myEquipmentId"  value="<?php echo $row['equipment_id'];?>">
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