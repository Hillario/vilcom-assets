<?php

/**
 * vilcom networks Vilcom Staff Portal
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
 * signup.php
 *
 * This is the sign up page of the system
 * 
 * @author Hillary Chesaro
 */

include "api/MySql.php";

//instantiate database
$db = new MySql();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);
    $passwordconf = trim($_POST['passwordconf']);
    if (isset($_POST['firstname'])) $firstname = $_POST['firstname'];
    if (isset($_POST['lastname'])) $lastname = $_POST['lastname'];
    if (isset($_POST['email'])) $email = $_POST['email'];
    if (isset($_POST['department'])) $department = $_POST['department'];
    if (isset($_POST['role'])) $role = $_POST['role'];
    if (isset($_POST['password'])) $password = $_POST['password'];
    if (isset($_POST['passwordconf'])) $passwordconf = $_POST['passwordconf'];
    $error = array();
    if (empty($_POST["firstname"])) {
        $error[] = 'Please enter your first name';
    }
    if (empty($_POST["lastname"])) {
        $error[] = 'Please enter your last name';
    }
    if (empty($_POST["email"])) {
        $error[] = 'Please enter your email';
    }
    if (empty($_POST["department"])) {
        $error[] = 'Please choose your department';
    }
    if (empty($_POST["role"])) {
        $error[] = 'Please choose your role';
    }
    if (empty($_POST["password"])) {
        $error[] = 'Please enter your password';
    }
    if (empty($_POST["passwordconf"])) {
        $error[] = 'Please confirm your password';
    }
}


?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Vilcom Networks | Staff Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="VILCOM STAFF PORTAL" name="description" />
    <meta content="Vilcom Networks" name="Hillary Chesaro" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="auth-bg 100-vh">
    <div class="bg-overlay bg-light"></div>

    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100 py-0 py-xl-4">

                                <div class="text-center mb-5">
                                    <a href="#">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-dark.png" alt="" height="21">
                                        </span>
                                    </a>
                                </div>

                                <div class="card my-auto overflow-hidden">
                                    <div class="row g-0">
                                        <div class="col-lg-6">
                                            <div class="p-lg-5 p-4">
                                                <div class="text-center">
                                                    <h5 class="mb-0">Sign Up</h5>
                                                    <p class="text-muted mt-2">VILCOM STAFF PORTAL</p>
                                                </div>

                                                <div class="mt-4">
                                                    <form action="" method="POST" class="auth-input" enctype="multipart/form-data">

                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter your first name">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Last Name</label>
                                                            <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Enter your last name">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email " class="form-label">Email</label>
                                                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter company email">
                                                        </div>

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
                                                            <label class="form-label">Choose Role</label>
                                                            <div class="form-icon">
                                                                <select name="role" id="role" class="form-select mb-3" aria-label="Default select example">
                                                                    <?php
                                                                    $squery = "SELECT * FROM role";
                                                                    $ssquery = $db->select($squery);
                                                                    foreach ($ssquery as $row) {
                                                                        echo '<option value="' . $row['role_id'] . '">' . $row['name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password">
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="userpassword" class="form-label">Confirm Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="passwordconf" type="password" class="form-control pe-5 password-input" placeholder="Confirm password" id="passwordconf">
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="fs-16 pb-2">
                                                            <p class="mb-0 fs-14 text-muted fst-italic">By registering you agree to the Vilcom Networks <a href="#" class="text-info text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                                        </div>

                                                        <div class="mt-2">
                                                            <button class="btn btn-info w-100" type="submit">Sign Up</button>
                                                        </div>


                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">You have an account ? <a href="signin.php" class="fw-medium text-info text-decoration-underline"> Signin </a> </p>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    //  form operations
                                                    if (isset($error)) {
                                                        if (!empty($error)) {
                                                            echo '<div class="alert alert-danger">
                                                            <i class="ri-megaphone-line"></i>
										<strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                        } else {
                                                            //password validation
                                                            if (strlen(trim($_POST['password'])) >= 6 && strlen(trim($_POST['passwordconf'])) >= 6 && trim($_POST['password']) == trim($_POST['passwordconf'])) {


                                                                //payment module integration

                                                                //email verification & validation

                                                                //insert query here
                                                                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                                                                $insertQuery = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `status`, `department_id`, `role_id`, `updated_at`) VALUES (NULL, '" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $hashedPassword . "', 'Pending', '" . $department . "', '" . $role . "', CURRENT_TIMESTAMP());";
                                                                $db->insert($insertQuery);
                                                                echo '<div class="alert alert-info">										
										<strong>Success! </strong>Sign Up Complete, Please Sign in.
									</div>';
                                                            } else {
                                                                $error[] = "Check if password matches and is more than 6 characters.";
                                                                echo '<div class="alert alert-danger">										
										<strong>Error Imminent! </strong>' . @implode('</li><li>', $error) . ' 
									</div>';
                                                            }
                                                        }
                                                    }

                                                    ?>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="d-flex h-100 bg-auth align-items-end">
                                                <div class="p-lg-5 p-4">
                                                    <div class="bg-overlay bg-info"></div>
                                                    <div class="p-0 p-sm-4 px-xl-0 py-5">
                                                        <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                                                            <div class="carousel-indicators carousel-indicators-rounded">
                                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                            </div>

                                                            <!-- end carouselIndicators -->
                                                            <div class="carousel-inner mx-auto">
                                                                <div class="carousel-item active">
                                                                    <div class="testi-contain text-center">
                                                                        <h5 class="fs-20 text-white mb-0">“ Unlock the Power of Organized Assets”
                                                                        </h5>
                                                                        <p class="fs-15 text-white-50 mt-2 mb-0">Dive into a world of streamlined efficiency with VILCOM STAFF PORTAL. Seamlessly track, manage, and optimize Vilcom's assets with precision and ease. Experience the next level of asset management today.</p>
                                                                    </div>
                                                                </div>

                                                                <div class="carousel-item">
                                                                    <div class="testi-contain text-center">
                                                                        <h5 class="fs-20 text-white mb-0">“Elevate Your Workflow”</h5>
                                                                        <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                            Integrate your assets seamlessly into your workflow with VILCOM STAFF PORTAL. Say goodbye to tedious manual processes and hello to increased productivity and efficiency. Empower your team to achieve more with intuitive asset management solutions.
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="carousel-item">
                                                                    <div class="testi-contain text-center">
                                                                        <h5 class="fs-20 text-white mb-0">“Insight-driven Decision Making”</h5>
                                                                        <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                            Secure the future with intelligent insights from VILCOM STAFF PORTAL. Harness the power of data-driven decisions and strategic planning to propel Vilcom forward. Unlock unparalleled visibility and control over assets today.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end carousel-inner -->
                                                        </div>
                                                        <!-- end review carousel -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="mt-5 text-center">
                                    <p class="mb-0 text-muted">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Vilcom Networks Limited.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/plugins.js"></script>

</body>


</html>