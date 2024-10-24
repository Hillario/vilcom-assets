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
 * update_logistics.php
 *
 * This file enables the admin to update logistics assets.
 * 
 * @author Hillary Chesaro
 */

 include "header.php";

  //temporarily suppress warnings
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

  //Retrieve User ID
  if(isset($_POST['myLogisticsId']))
  {
      $_SESSION['logisticsid']=$_POST['myLogisticsId'];
  
  }
  
  $logisticsid=($_SESSION['logisticsid']);
  
  $requestQuery="SELECT * FROM logistics WHERE logistics_id=$logisticsid";
  $selectQuery=$db->select($requestQuery);
  foreach($selectQuery as $row)
  {
      $sasset_description=$row['asset_description'];
      $smodel=$row['model'];      
      $sacquisition_date=$row['acquisition_date'];
      $sreleased_date=$row['released_date'];      
      $scost=$row['cost'];
      $slocation=$row['location'];     
      $sserial_no=$row['serial_no'];
      $sinsurance_info=$row['insurance_info'];      
      $sinsurance_expiry=$row['insurance_expiry'];
      
  }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
    $asset_description = @trim($_POST['asset_description']);
    $model = @trim($_POST['model']);
    $acquisition_date = @trim($_POST['acquisition_date']);
    $released_date = @trim($_POST['released_date']);
    $cost = @trim($_POST['cost']);
    $location = @trim($_POST['location']);
    $serial_no = @trim($_POST['serial_no']);
    $insurance_info = @trim($_POST['insurance_info']);
    $insurance_expiry = @trim($_POST['insurance_expiry']);
    $comments = @trim($_POST['comments']);
    $type = @trim($_POST['type']);
    $status = @trim($_POST['status']);
    $staff = @trim($_POST['staff']);    
    $department = @trim($_POST['department']);
    
    if (isset($_POST['asset_description'])) $asset_description = $_POST['asset_description'];
    if (isset($_POST['model'])) $model = $_POST['model'];
    if (isset($_POST['acquisition_date'])) $acquisition_date = $_POST['acquisition_date'];
    if (isset($_POST['released_date'])) $released_date= $_POST['released_date'];
    if (isset($_POST['cost'])) $cost = $_POST['cost'];
    if (isset($_POST['location'])) $location = $_POST['location'];
    if (isset($_POST['serial_no'])) $serial_no = $_POST['serial_no'];
    if (isset($_POST['insurance_info'])) $insurance_info = $_POST['insurance_info'];
    if (isset($_POST['insurance_expiry'])) $insurance_expiry = $_POST['insurance_expiry'];
    if (isset($_POST['comments'])) $comments = $_POST['comments'];
    if (isset($_POST['type'])) $type = $_POST['type'];
    if (isset($_POST['status'])) $status = $_POST['status'];    
    if (isset($_POST['staff'])) $staff = $_POST['staff'];    
    if (isset($_POST['department'])) $department = $_POST['department'];

    $error = array();
    if (empty($_POST["asset_description"])) {
        $error[] = 'Please enter the asset_description';
    }
    if (empty($_POST["model"])) {
        $error[] = 'Please enter the model';
    }
    if (empty($_POST["acquisition_date"])) {
        $error[] = 'Please select the acquisition_date';
    }
    if (empty($_POST["released_date"])) {
        $error[] = 'Please select the released_date';
    }
    if (empty($_POST["cost"])) {
        $error[] = 'Please enter the cost';
    }
    if (empty($_POST["location"])) {
        $error[] = 'Please enter the location';
    }
    if (empty($_POST["serial_no"])) {
        $error[] = 'Please enter the serial_no';
    }
    if (empty($_POST["insurance_info"])) {
        $error[] = 'Please enter the insurance_info';
    }
    if (empty($_POST["insurance_expiry"])) {
        $error[] = 'Please enter the insurance_expiry';
    }
    if (empty($_POST["comments"])) {
        $error[] = 'Please enter the comments';
    }
    if (empty($_POST["type"])) {
        $error[] = 'Please select the type';
    }
    if (empty($_POST["status"])) {
        $error[] = 'Please choose the status';
    }
    if (empty($_POST["department"])) {
        $error[] = 'Please select the department';
    }    
}
 }

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
                                <h4 class="mb-sm-0">UPDATE LOGISTICS</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                        <li class="breadcrumb-item active">Update Logistics</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="alert alert-info" role="alert">
                        <strong>Update</strong> <?php echo $sasset_description;?>
                    </div>

                    <!-- Add office equipment form-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">update <?php echo $sasset_description;?></h4>
                                </div>
                                <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                        <div class="mt-3">
                                                            <label class="form-label">Choose Staff</label>
                                                            <div class="form-icon">
                                                                <select name="staff" id="staff" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $squery = "SELECT * FROM user";
                                                                    $ssquery = $db->select($squery);
                                                                    foreach ($ssquery as $row) {
                                                                        echo '<option value="' . $row['user_id'] . '">' . $row['first_name']." ".$row['last_name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                            <div>
                                                <label class="form-label">Asset Description</label>
                                                <div class="form-icon">
                                                        <input name="asset_description" type="text" class="form-control form-control-icon" id="asset_description" placeholder="<?php echo $sasset_description;?>" value="<?php echo $sasset_description;?>">
                                                        <i class="ri-menu-unfold-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Model</label>
                                                <div class="form-icon">
                                                        <input name="model" type="text" class="form-control form-control-icon" id="model" placeholder="<?php echo $smodel;?>" value="<?php echo $smodel;?>">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Acquisition Date</label>
                                                <div>                                                    
                                                    <input name="acquisition_date" type="date" class="form-control" id="acquisition_date" value="<?php echo $sacquisition_date;?>">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Released Date</label>
                                                <div>                                                    
                                                    <input name="released_date" type="date" class="form-control" id="released_date" value="<?php echo $sreleased_date;?>">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Cost</label>
                                                <div class="form-icon">
                                                        <input name="cost" type="number" class="form-control form-control-icon" id="cost" placeholder="<?php echo $scost;?>" value="<?php echo $scost;?>">
                                                        <i class="ri-wallet-3-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Location/Region</label>
                                                <div class="form-icon">
                                                        <input name="location" type="text" class="form-control form-control-icon" id="location" placeholder="<?php echo $slocation;?>" value="<?php echo $slocation;?>">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>                                         

                                            

                                           
                                        </div>

                                        <div class="col-lg-6">

                                        <div class="mt-3">
                                                            <label class="form-label">Choose Department</label>
                                                            <div class="form-icon">
                                                                <select name="department" id="department" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $squery = "SELECT * FROM department";
                                                                    $ssquery = $db->select($squery);
                                                                    foreach ($ssquery as $row) {
                                                                        echo '<option value="' . $row['department_id'] . '">' . $row['name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                <label class="form-label">Status</label>
                                                <div class="form-icon">
                                                <select name="status"class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Active" selected>Active</option>
                                                    <option value="Inactive">Inactive</option>                                                    
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div>
                                                <label class="form-label">Plate Number</label>
                                                <div class="form-icon">
                                                        <input name="serial_no" type="text" class="form-control form-control-icon" id="serial_no" placeholder="<?php echo $sserial_no;?>" value="<?php echo $sserial_no;?>">
                                                        <i class="ri-scroll-to-bottom-line"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Insurance Information</label>
                                                <div class="form-icon">
                                                        <input name="insurance_info" type="text" class="form-control form-control-icon" id="insurance_info" placeholder="<?php echo $sinsurance_info;?>" value="<?php echo $sinsurance_info;?>">
                                                        <i class="ri-cpu-fill"></i>
                                                    </div>
                                            </div>

                                            
                                            <div class="mt-3">
                                                <label class="form-label">Type</label>
                                                <div class="form-icon">
                                                <select name="type" id="type" class="form-select mb-3" aria-label="Default select example">
                                                    <option value="Comprehensive" selected>Comprehensive</option>
                                                    <option value="TPO">TPO</option>
                                                    <option value="Commercial">Commercial</option>                                                     
                                                </select>                                                        
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Insurance Expiry Date</label>
                                                <div>                                                    
                                                    <input name="insurance_expiry" type="date" class="form-control" id="insurance_expiry" value="<?php echo $sinsurance_expiry;?>">
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Comments/Notes</label>
                                                <div class="form-icon">
                                                        <textarea name="comments" class="form-control form-control-icon" id="comments"></textarea>                                                        
                                                    </div>
                                            </div>
                                        </div>
                                            
                                          
                                        </div>

                                        <!-- Update button -->
            <div class="text-left">
                <button type="submit" name="update" class="btn btn-info">Update Vehicle</button>
            </div>

            <!-- Delete button -->
            <div class="text-left mt-2">
                <button type="submit" name="delete" class="btn btn-danger">Delete Vehicle</button>
            </div>
                                    </div>
                                </div>
                                </form>
                                <!-- end card body -->
                                <?php

if (isset($_POST['update'])) {
                                //Function to calculate current value from depreciation rate
                                function calculateDepreciatedValue($purchaseCost, $purchaseDate, $depreciationRate) {
                                    $years = (date('Y') - date('Y', strtotime($purchaseDate))) + ((date('m') - date('m', strtotime($purchaseDate))) / 12);
                                    $currentValue = $purchaseCost * pow((1 - $depreciationRate), $years);
                                    return round($currentValue, 2);
                                }
                                
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-info">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {
                                                                $depreciation_rate=0.25;
                                                                $current_value=calculateDepreciatedValue($cost,$acquisition_date,$depreciation_rate);                                                            
                                                                $insertQuery = "UPDATE `logistics` SET `asset_description`='".$asset_description."', `model`='".$model."', `acquisition_date`='".$acquisition_date."', `released_date`='".$released_date."', `cost`='".$cost."', `location`='".$location."', `status`='".$status."', `serial_no`='".$serial_no."', `insurance_info`='".$insurance_info."', `type`='".$type."', `insurance_expiry`='".$insurance_expiry."', `comments`='".$comments."', `current_value`='".$current_value."', `depreciation_rate`='".$depreciation_rate."', `user_id`='".$staff."', `department_id`='".$department."', `updated_at`= current_timestamp() WHERE `logistics`.`logistics_id` = '".$logisticsid."';";
                                                                $db->insert($insertQuery);
                                                                header('Location:view_logistics.php');
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Logistics has been updated
									</div>';
                                                            } 
                                                        }
                                                    }

                                                    if (isset($_POST['delete'])) {
                                                        // Delete equipment from the database
                                                        $deleteQuery = "DELETE FROM `logistics` WHERE `logistics_id` = '$logisticsid'";
                                                        $db->insert($deleteQuery);
                                                        header('Location:view_logistics.php');
                                                        echo '<div class="alert alert-danger"><strong>Success!</strong> Logistics has been deleted.</div>';
                                                    }

                                                    ?>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <!-- Add office equipment form-->

              
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
            <?php
            include "footer.php";
            ?>