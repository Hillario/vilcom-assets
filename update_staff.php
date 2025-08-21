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
 * update_staff.php --> Admin Part
 *
 * This file enables admin/HOD to view and update staff
 * 
 * @author Hillary Chesaro
 */

include "header.php";

 //temporarily suppress warnings
 error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

//Retrieve User ID
if(isset($_POST['myUserId']))
{
    $_SESSION['staffid']=$_POST['myUserId'];

}

$userid=($_SESSION['staffid']);

$requestQuery="SELECT * FROM user WHERE user_id=$userid";
$selectQuery=$db->select($requestQuery);
foreach($selectQuery as $row)
{
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $email=$row['email'];
    $departmentid=$row['department_id'];
    $roleid=$row['role_id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['update'])) {   
    $pfirst_name = @trim($_POST['first_name']);
    $plast_name = @trim($_POST['last_name']);
    $pemail = @trim($_POST['email']);         
    $pdepartmentid = @trim($_POST['department_id']);
    $proleid = @trim($_POST['role_id']);    
    
    if (isset($_POST['first_name'])) $pfirst_name = $_POST['first_name'];
    if (isset($_POST['last_name'])) $plast_name = $_POST['last_name'];
    if (isset($_POST['email'])) $pemail = $_POST['email'];          
    if (isset($_POST['department_id'])) $pdepartmentid = $_POST['department_id'];
    if (isset($_POST['role_id'])) $proleid = $_POST['role_id'];  
    
    $error = array();    
    if (empty($_POST["first_name"])) {
        $error[] = 'Please check first name';
    }
    if (empty($_POST["last_name"])) {
        $error[] = 'Please check last name';
    }
    if (empty($_POST["email"])) {
        $error[] = 'Please check email';
    }
    if (empty($_POST["department_id"])) {
        $error[] = 'Please check department';
    }
    if (empty($_POST["role_id"])) {
        $error[] = 'Please check role';
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
                        <h4 class="mb-sm-0">UPDATE STAFF</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Update Staff</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-info" role="alert">
                <strong>Update</strong> <?php echo $first_name." ".$last_name;?> 
            </div>

            <!-- Add office equipment warranty form-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Update staff form</h4>
                        </div>
                        <form action="" method="POST" class="auth-input" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-6">

                                        <div class="mt-3">
                                            <label class="form-label">First Name</label>
                                            <div class="form-icon">
                                            <input name="first_name" type="text" class="form-control bg-light border-0" id="first_name" placeholder="<?php echo $first_name;?>" value="<?php echo $first_name;?>">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Last Name</label>
                                            <div class="form-icon">
                                            <input name="last_name" type="text" class="form-control bg-light border-0" id="last_name" placeholder="<?php echo $last_name;?>" value="<?php echo $last_name;?>">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Email</label>
                                            <div class="form-icon">
                                            <input name="email" type="email" class="form-control bg-light border-0" id="email" placeholder="<?php echo $email;?>" value="<?php echo $email;?>">                                                
                                            </div>
                                        </div>

                                        <div class="mt-3">
    <label class="form-label">Choose Department</label>
    <div class="form-icon">
        <select name="department_id" id="department_id" class="form-select mb-3" aria-label="Default select example">
            <?php
            // Fetch the default logged-in department
            $defaultQuery = "SELECT * FROM `department` WHERE department_id = $departmentid LIMIT 1";
            $defaultUser = $db->select($defaultQuery);

            if (!empty($defaultUser)) {
                $row = $defaultUser[0];
                echo '<option value="' . $row['department_id'] . '" selected>' . $row['name'] . '</option>';
            }

            // Fetch all other departments except the default one
            $squery = "SELECT * FROM `department` WHERE department_id != $departmentid ORDER BY name ASC";
            $ssquery = $db->select($squery);

            foreach ($ssquery as $row) {
                echo '<option value="' . $row['department_id'] . '">' . $row['name'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>

                                                        <div class="mt-3">
    <label class="form-label">Choose Role</label>
    <div class="form-icon">
        <select name="role_id" id="role_id" class="form-select mb-3" aria-label="Default select example">
            <?php
            // Fetch the default logged-in role
            $defaultQuery = "SELECT * FROM `role` WHERE role_id = 4 LIMIT 1";
            $defaultUser = $db->select($defaultQuery);

            if (!empty($defaultUser)) {
                $row = $defaultUser[0];
                echo '<option value="' . $row['role_id'] . '" selected>' . $row['name'] . '</option>';
            }

            // Fetch all other roles except the default one
            $squery = "SELECT * FROM `role` WHERE role_id != 4 ORDER BY name ASC";
            $ssquery = $db->select($squery);

            foreach ($ssquery as $row) {
                echo '<option value="' . $row['role_id'] . '">' . $row['name'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>

                                       

                                    </div>

                                    <!-- Update button -->
            <div class="text-left">
                <button type="submit" name="update" class="btn btn-info">Update Staff</button>
            </div>

            <!-- Reset Password button -->
            <div class="text-left mt-2">
                <button type="submit" name="reset" class="btn btn-warning">Reset Password</button>
            </div>

            <!-- Delete button -->
            <div class="text-left mt-2">
                <button type="submit" name="delete" class="btn btn-danger">Delete Staff</button>
            </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['update'])) {                        

                        //  form operations
                        if (isset($error)) {
                            if (!empty($error)) {
                                echo '<div class="alert alert-info">
                            <i class="ri-megaphone-line"></i>
        <strong>Take Note! </strong>' . @implode('</li><li>', $error) . ' 
    </div>';
                            } else {                                
                                $insertQuery = "UPDATE `user` SET `first_name` = '".$pfirst_name."', `last_name` = '".$plast_name."', `email` = '".$pemail."', `department_id` = '".$pdepartmentid."', `role_id` = '".$proleid."' WHERE `user`.`user_id` = '".$userid."';";
                                $db->insert($insertQuery);
                                header('Location:view_staff.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Staff has been updated
    </div>';
                            }
                        }
                    }

                    if (isset($_POST['reset'])) {
                         $password="Vilcom@2025";
                        
                        //hash password
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        
                        // Reset password for the staff
                        $resetQuery = "UPDATE `user` SET  `password` = '".$hashedPassword."', `status` = 'Pending' WHERE `user`.`user_id` = '".$userid."';";
                                $db->insert($resetQuery);
                                header('Location:view_staff.php');
                                echo '<div class="alert alert-info">										
        <strong>Success! </strong>Password has been reset
    </div>';
                       
                        
                    }

                    if (isset($_POST['delete'])) {
                        // Delete staff from the database
                        $deleteQuery = "DELETE FROM `user` WHERE `user_id` = '$userid'";
                        $db->insert($deleteQuery);
                        header('Location:view_staff.php');
                        echo '<div class="alert alert-danger"><strong>Success!</strong> Staff has been deleted.</div>';
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