<?php

/**
 * vilcom networks Vilcom Staff Portal
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
 * signin.php
 *
 * This is the sign in page of the system
 * 
 * @author Hillary Chesaro
 */

//include MySQL API
include "api/MySql.php";
//include session manager API
include "api/session_manager.php";

//instantiate the database
$db = new MySql();

if (loggedin()) {
    header('Location:index.php');
} else {
    $message = '';
    $user = "";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $dbQuery = "SELECT * FROM user WHERE email='$email'";
        $countQuery = "SELECT COUNT(*) as userCount from user where email='$email'";
        $countSelect = $db->select($countQuery);
        foreach ($countSelect as $row) {
            $userCount = $row['userCount'];
        }
        if (!empty($email) && !empty($password)) {
            $dbSelect = $db->select($dbQuery);
            if ($userCount == 0) {
                $message = "invalid email/password combination";
            } else if ($userCount == 1) {
                foreach ($dbSelect as $row) {
                    $userf = $row['first_name'];
                    $userl = $row['last_name'];
                    $ml = $row['email'];
                    $role_id = $row['role_id'];
                    $hashedPassword = $row['password'];
                    $user_id = $row['user_id'];
                }
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['userf'] = $userf;
                    $_SESSION['userl'] = $userl;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['ml'] = $ml;
                    $_SESSION['role_id'] = $role_id;
                    if($role_id==4)
                    {
                        header('Location:staff/index.php');
                    }elseif($role_id==3)
                    {
                        header('Location:hod/index.php');
                    }elseif($role_id==2)
                    {
                        header('Location:management/index.php');
                    }elseif($role_id==1)
                    {
                        header('Location:index.php');
                    }elseif($role_id==5)
                    {
                        header('Location:audit/index.php');
                    }
                    
                } else {
                    $message = "invalid email/password combination";
                }
            }
        } else {
            $message = "Please Input Email or Password to Continue";
        }
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
                                                    <h5 class="mb-0">Welcome!</h5>
                                                    <p class="text-muted mt-2">VILCOM STAFF PORTAL</p>
                                                </div>

                                                <div class="mt-4">
                                                    <form action="" method="POST" class="auth-input">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Email</label>
                                                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter company email">
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password">
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="form-check form-check-primary fs-16 py-2">
                                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                                            <div class="float-end">
                                                                <a href="#" class="text-muted text-decoration-underline fs-14">Forgot your password?</a>
                                                            </div>
                                                            <label class="form-check-label fs-14" for="remember-check">
                                                                Remember me
                                                            </label>
                                                        </div>

                                                        <div class="mt-2">
                                                            <button class="btn btn-info w-100" type="submit">Log In</button>
                                                        </div>

                                                    </form>
                                                    <?php
                                                    if (($message != "")) {
                                                        echo '<div class="alert alert-danger">										
										<strong>Error Imminent! </strong>' . $message . ' 
									</div>';
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

    <!-- password-addon init -->
    <script src="assets/js/pages/password-addon.init.js"></script>

</body>

</html>