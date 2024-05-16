<?php

/**
 * vilcom networks assets information management system
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
 * signin.php
 *
 * This is the sign in page of the system
 * 
 * @author Hillary Chesaro
 */
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Vilcom Networks | Assets IMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Vilcom Assets Information Management System" name="description" />
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
                                        <a href="index.html">
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
                                                            <p class="text-muted mt-2">Vilcom Assets Information Management System</p>
                                                        </div>
                                                    
                                                        <div class="mt-4">
                                                            <form action="" class="auth-input">
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                                                </div>
                                        
                                                                <div class="mb-2">
                                                                    <label for="userpassword" class="form-label">Password</label>
                                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                                   </div>
                                                                </div>
                    
                                                                <div class="form-check form-check-primary fs-16 py-2">
                                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                                    <div class="float-end">
                                                                        <a href="auth-resetpassword.html" class="text-muted text-decoration-underline fs-14">Forgot your password?</a>
                                                                    </div>
                                                                    <label class="form-check-label fs-14" for="remember-check">
                                                                        Remember me
                                                                    </label>
                                                                </div>
                    
                                                                <div class="mt-2">
                                                                    <button class="btn btn-info w-100" type="submit">Log In</button>
                                                                </div>                 
                                                                
                    
                                                                <div class="mt-4 text-center">
                                                                    <p class="mb-0">Don't have an account ? <a href="signup.php" class="fw-medium text-info text-decoration-underline"> Signup now </a> </p>
                                                                </div>
                                                            </form>
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
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">Dive into a world of streamlined efficiency with the Vilcom Assets Information Management System. Seamlessly track, manage, and optimize your organization's assets with precision and ease. Experience the next level of asset management today.</p>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="carousel-item">
                                                                            <div class="testi-contain text-center">
                                                                                <h5 class="fs-20 text-white mb-0">“Elevate Your Workflow”</h5>
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                Integrate your assets seamlessly into your workflow with the Vilcom Assets Information Management System. Say goodbye to tedious manual processes and hello to increased productivity and efficiency. Empower your team to achieve more with intuitive asset management solutions.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="carousel-item">
                                                                            <div class="testi-contain text-center">
                                                                                <h5 class="fs-20 text-white mb-0">“Insight-driven Decision Making”</h5>
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                Secure the future of your organization with intelligent insights from the Vilcom Assets Information Management System. Harness the power of data-driven decisions and strategic planning to propel your business forward. Unlock unparalleled visibility and control over your assets today.
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
                                            <script>document.write(new Date().getFullYear())</script> Vilcom Networks Limited.
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