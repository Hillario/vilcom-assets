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
 * update_department.php 
 *
 * This file enables admin update departments
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve User ID
if(isset($_POST['myDepartmentId']))
{
    $_SESSION['departmentid']=$_POST['myDepartmentId'];
}

$departmentid=($_SESSION['departmentid']);

$departmentQuery="SELECT * FROM department WHERE department_id=$departmentid";
$selectQuery=$db->select($departmentQuery);
foreach($selectQuery as $row)
{
    $name=$row['name'];
    $description=$row['description'];            
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    if (isset($_POST['update'])) {
    $pname = @trim($_POST['pname']);
    $pdescription = @trim($_POST['pdescription']);             
    
    if (isset($_POST['pname'])) $pname = $_POST['pname'];
    if (isset($_POST['pdescription'])) $pdescription = $_POST['pdescription'];       
    
    $error = array();    
    if (empty($_POST["pname"])) {
        $error[] = 'Please enter the name of the department';
    }
    if (empty($_POST["pdescription"])) {
        $error[] = 'Please enter the description of the department';
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
                        <h4 class="mb-sm-0">UPDATE DEPARTMENT</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Update <?php echo $name;?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Update</strong> <?php echo $name;?>
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Update department form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                    <div class="mt-3">
                                                <label class="form-label">Department Name</label>
                                                <div class="form-icon">
                                                        <input name="pname" type="text" class="form-control form-control-icon" id="pname" placeholder="<?php echo $name;?>" value="<?php echo $name;?>">
                                                        <i class="ri-align-item-bottom-fill"></i>
                                                    </div>
                                            </div>

                                            <div class="mt-3">
                                                <label class="form-label">Department Description</label>
                                                <div class="form-icon">
                                                        <textarea name="pdescription" class="form-control form-control-icon" id="pdescription"></textarea>                                                        
                                                    </div>
                                            </div>

                                    </div>

                                    <!-- Update button -->
            <div class="text-left">
                <button type="submit" name="update" class="btn btn-info">Update Department</button>
            </div>

            <!-- Delete button -->
            <div class="text-left mt-2">
                <button type="submit" name="delete" class="btn btn-danger">Delete Department</button>
            </div>
                                </div>
                            </div>
                        </form>
                        <?php                       
                        
                        //  form operations
                        if (isset($_POST['update'])) {
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {                                
                                $insertQuery = "UPDATE `department` SET `name` = '".$pname."', `description` = '".$pdescription."' WHERE `department`.`department_id` = '".$departmentid."';";
                                $db->insert($insertQuery);
                                header('Location:view_department.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Department has been updated
    </div>';
                            }
                        }
                    }

                    if (isset($_POST['delete'])) {
                        // Delete department from the database
                        $deleteQuery = "DELETE FROM `department` WHERE `department_id` = '$departmentid'";
                        $db->insert($deleteQuery);
                        header('Location:view_department.php');
                        echo '<div class="alert alert-danger"><strong>Success!</strong> Department has been deleted.</div>';
                    }

                        ?>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- Add office equipment warranty form-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php
    include "footer.php";
    ?>