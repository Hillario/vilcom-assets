<?php

/**
 * Vilcom IMS
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
 * index.php
 *
 * This is the homepage of the invoice management system
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
                                <h4 class="mb-sm-0">VILCOM IMS-AUDITOR</h4>

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
                            <a href="https://careers.vilcom.ke/" target="_blank" class="btn btn-info addMembers-modal"><i class="las la-clone"></i> HR-Portal</a>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card bg-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <?php
                                            //office count query
                                            $officeCountQuery="SELECT COUNT(*) AS office_count FROM office_equipment;";
                                            $selectOfficeCount=$db->select($officeCountQuery);
                                            foreach($selectOfficeCount as $office_row)
                                            {
                                                $office_equipments=$office_row['office_count'];
                                            }
                                            
                                            //server count query
                                            $serverCountQuery="SELECT COUNT(*) AS server_count FROM server;";
                                            $selectServerCount=$db->select($serverCountQuery);
                                            foreach($selectServerCount as $server_row)
                                            {
                                                $server_equipments=$server_row['server_count'];
                                            }

                                            //network count query
                                            $networkCountQuery="SELECT COUNT(*) AS network_count FROM network_equipment;";
                                            $selectNetworkCount=$db->select($networkCountQuery);
                                            foreach($selectNetworkCount as $network_row)
                                            {
                                                $network_equipments=$network_row['network_count'];
                                            }

                                            //support machines count query
                                            $machineCountQuery="SELECT COUNT(*) AS machine_count FROM support_machines;";
                                            $selectMachineCount=$db->select($machineCountQuery);
                                            foreach($selectMachineCount as $machine_row)
                                            {
                                                $machine_equipments=$machine_row['machine_count'];
                                            }

                                            //logistics count query
                                            $logisticsCountQuery="SELECT COUNT(*) AS logistics_count FROM logistics;";
                                            $selectLogisticsCount=$db->select($logisticsCountQuery);
                                            foreach($selectLogisticsCount as $logistics_row)
                                            {
                                                $logistics_equipments=$logistics_row['logistics_count'];
                                            }



                                            $totalAssets=$office_equipments+$server_equipments+$network_equipments+$machine_equipments+$logistics_equipments;
                                            ?>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="<?php echo $totalAssets;?>"></span></h4>
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
                                            <span class="badge bg-info me-1"><?php echo $totalAssets;?></span> <span class="text-muted">Total Assets</span>
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
                                            <?php
                                            //office repair count query
                                            $officeRepairCountQuery="SELECT COUNT(*) AS office_repair_count FROM equipment_repair;";
                                            $selectOfficeRepairCount=$db->select($officeRepairCountQuery);
                                            foreach($selectOfficeRepairCount as $office_repair_row)
                                            {
                                                $office_equipments_repair=$office_repair_row['office_repair_count'];
                                            }
                                            
                                            //server repair count query
                                            $serverRepairCountQuery="SELECT COUNT(*) AS server_repair_count FROM server_repair;";
                                            $selectServerRepairCount=$db->select($serverRepairCountQuery);
                                            foreach($selectServerRepairCount as $server_repair_row)
                                            {
                                                $server_equipments_repair=$server_repair_row['server_repair_count'];
                                            }

                                            //network repair count query
                                            $networkRepairCountQuery="SELECT COUNT(*) AS network_repair_count FROM network_repair;";
                                            $selectNetworkRepairCount=$db->select($networkRepairCountQuery);
                                            foreach($selectNetworkRepairCount as $network_repair_row)
                                            {
                                                $network_equipments_repair=$network_repair_row['network_repair_count'];
                                            }

                                            $totalRepairs=$office_equipments_repair+$server_equipments_repair+$network_equipments_repair;
                                            ?>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="<?php echo $totalRepairs;?>"></span></h4>
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
                                            <span class="badge bg-danger me-1"><?php echo $totalRepairs;?></span> <span class="text-muted">Total Repairs</span>
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
                                            <?php
                                            //requests query
                                            $requestCountQuery="SELECT COUNT(*) AS requests FROM request;";
                                            $selectRequestCount=$db->select($requestCountQuery);
                                            foreach($selectRequestCount as $request_row)
                                            {
                                                $allRequests=$request_row['requests'];
                                            }
                                            ?>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2 text-white"><span class="counter-value" data-target="<?php echo $allRequests;?>"></span></h4>
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
                                            <span class="badge bg-primary me-1"><?php echo $allRequests;?></span> <span class="text-white">Total Requests</span>
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
                                            <?php
                                            //incidents query
                                            $incidentCountQuery="SELECT COUNT(*) AS incidents FROM equipment_incident;";
                                            $selectIncidentCount=$db->select($incidentCountQuery);
                                            foreach($selectIncidentCount as $incident_row)
                                            {
                                                $allIncidents=$incident_row['incidents'];
                                            }
                                            ?>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="<?php echo $allIncidents;?>"></span></h4>
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
                                            <span class="badge bg-info me-1"><?php echo $allIncidents;?></span> <span class="text-muted">Total Incidents</span>
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
                                    <h5 class="card-title mb-0">Office Equipments</h5>
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