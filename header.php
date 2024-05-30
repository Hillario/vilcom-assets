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
 * header.php
 *
 * This is the header file of the whole website portal
 * 
 * @author Hillary Chesaro
 */

 //include the Database API
 include "api/MySql.php";
 //include the session manager API
 include "api/session_manager.php";

 //instantiate the database
 $db=new MySql();

 if (loggedin()) {
    $user_id=($_SESSION['user_id']);
    $un1=($_SESSION['userf']);
    $un2=($_SESSION['userl']);
    $role_id=($_SESSION['role_id']);   
    $mymail= ($_SESSION['ml']);
}
else{
    header('Location:signin.php');
}


?>


<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Vilcom Networks | Assets IMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- dropzone css -->
    <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

     <!-- multi.js css -->
     <link rel="stylesheet" type="text/css" href="assets/libs/multi.js/multi.min.css" />
    <!-- autocomplete css -->
    <link rel="stylesheet" href="assets/libs/%40tarekraafat/autocomplete.js/css/autoComplete.css">

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="21">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="21">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block me-2">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                                <span class="las la-search search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <!-- item-->
                                    <div class="dropdown-header">
                                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                    </div>

                                    <div class="dropdown-item bg-transparent text-wrap">
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                                    </div>
                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Analytics Dashboard</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Help Center</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                        <span>My account settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Angela Bernier</h6>
                                                    <span class="fs-11 mb-0 text-muted">Manager</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">David Grasso</h6>
                                                    <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Mike Bunch</h6>
                                                    <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="d-flex align-items-center">



                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                       

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle" data-toggle="fullscreen">
                                <i class='las la-expand fs-24'></i>
                            </button>
                        </div>
                                                
                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-primary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='las la-bell fs-24'></i>
                                <span class="position-absolute topbar-badge fs-9 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head rounded-top">
                                    <div class="p-3 bg-primary bg-pattern">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge bg-light-subtle text-light  fs-13"> 4 New</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title bg-info-subtle text-info   text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 fs-14 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                                Optimization <span class="text-secondary">reward</span> is
                                                                ready!
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                            <label class="form-check-label" for="all-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-14 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                                graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                            <label class="form-check-label" for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title bg-danger-subtle text-danger  text-danger rounded-circle fs-16">
                                                            <i class='bx bx-message-square-dots'></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                            <label class="form-check-label" for="all-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-14 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                            <label class="form-check-label" for="all-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-3 text-center view-all">
                                                <button type="button" class="btn btn-soft-success btn-sm waves-effect waves-light">View
                                                    All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="dropdown header-item">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="assets/images/users/user.png" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block fw-medium user-name-text fs-16"><?php echo $un1." ".$un2;?><i class="las la-angle-down fs-12 ms-1"></i></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user fs-15 align-middle me-1"></i> <span key="t-profile">Profile</span></a>                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off fs-15 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="21">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="21">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="index.php">
                                <i class="las la-house-damage"></i> <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Incidents</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#all_incidents" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-exclamation-triangle"></i> <span data-key="t-bootstrap-ui">All Incidents</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="all_incidents">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">                                            
                                            <li class="nav-item">
                                                <a href="view_incident.php" class="nav-link" data-key="t-badges">View Incidents</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Requests</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#all_requests" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-bullhorn"></i> <span data-key="t-bootstrap-ui">All Requests</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="all_requests">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">                                            
                                            <li class="nav-item">
                                                <a href="view_request.php" class="nav-link" data-key="t-badges">View Requests</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Assets</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#office_equipment" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                                <i class="las la-briefcase"></i> <span data-key="t-invoices">Office Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown" id="office_equipment">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="add_equipment.php" class="nav-link" data-key="t-invoice"> Add Equipment </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="view_equipment.php" class="nav-link" data-key="t-add-invoice"> View Equipment </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#network_equipment" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
                                <i class="las la-wifi"></i> <span data-key="t-authentication">Network Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown" id="network_equipment">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="add_network_equipment.php" class="nav-link" data-key="t-signin">Add Equipment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="view_network_equipment.php" class="nav-link" data-key="t-signup">View Equipment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#server_equipment" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
                                <i class="las la-server"></i> <span data-key="t-authentication">Server Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown" id="server_equipment">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="add_server_equipment.php" class="nav-link" data-key="t-signin">Add Equipment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="view_server_equipment.php" class="nav-link" data-key="t-signup">View Equipment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Warranties</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#office_equipment_warranties" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-briefcase"></i> <span data-key="t-bootstrap-ui">Office Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="office_equipment_warranties">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_equipment_warranty.php" class="nav-link" data-key="t-alerts">Add Warranty</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_equipment_warranty.php" class="nav-link" data-key="t-badges">View Warranty</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#network_equipment_warranties" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-wifi"></i> <span data-key="t-bootstrap-ui">Network Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="network_equipment_warranties">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_network_warranty.php" class="nav-link" data-key="t-alerts">Add Warranty</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_network_warranty.php" class="nav-link" data-key="t-badges">View Warranty</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#server_equipment_warranties" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-server"></i> <span data-key="t-bootstrap-ui">Server Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="server_equipment_warranties">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_server_warranty.php" class="nav-link" data-key="t-alerts">Add Warranty</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_server_warranty.php" class="nav-link" data-key="t-badges">View Warranty</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>   
                        
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Repairs</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#office_equipment_repairs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-briefcase"></i> <span data-key="t-bootstrap-ui">Office Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="office_equipment_repairs">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_equipment_repair.php" class="nav-link" data-key="t-alerts">Add Repair</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_equipment_repair.php" class="nav-link" data-key="t-badges">View Repair</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#network_equipment_repairs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-wifi"></i> <span data-key="t-bootstrap-ui">Network Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="network_equipment_repairs">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_network_repairs.php" class="nav-link" data-key="t-alerts">Add Repair</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_network_repairs.php" class="nav-link" data-key="t-badges">View Repair</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#server_equipment_repairs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-server"></i> <span data-key="t-bootstrap-ui">Server Equipment</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="server_equipment_repairs">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_server_repair.php" class="nav-link" data-key="t-alerts">Add Repair</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_server_repair.php" class="nav-link" data-key="t-badges">View Repair</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Invoices</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#invoices" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                                <i class="las la-file-alt"></i> <span data-key="t-invoices">Generate Invoices</span>
                            </a>
                            <div class="collapse menu-dropdown" id="invoices">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="add_invoice.php" class="nav-link" data-key="t-invoice"> Add Invoice </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="view_invoice.php" class="nav-link" data-key="t-add-invoice"> View Invoice </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Staff</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#all_staff" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-users"></i> <span data-key="t-bootstrap-ui">All Staff</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="all_staff">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">                                            
                                            <li class="nav-item">
                                                <a href="view_staff.php" class="nav-link" data-key="t-badges">View Staff</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Departments</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#all_departments" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-cubes"></i> <span data-key="t-bootstrap-ui">All Departments</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="all_departments">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_department.php" class="nav-link" data-key="t-alerts">Add Department</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_department.php" class="nav-link" data-key="t-badges">View Department</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Roles</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#all_roles" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-user-secret"></i> <span data-key="t-bootstrap-ui">All Roles</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="all_roles">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="add_role.php" class="nav-link" data-key="t-alerts">Add Role</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="view_role.php" class="nav-link" data-key="t-badges">View Role</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                      
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->