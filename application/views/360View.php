<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Qovex - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jquery.vectormap css -->
        <link href="<?php echo base_url();?>/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
            type="text/css" />
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css"  rel="stylesheet" type="text/css" >
    
        <link href="<?php echo base_url();?>assets/css/icons.min.css"  rel="stylesheet" type="text/css" >
        <link href="<?php echo base_url();?>assets/css/app.min.css"  rel="stylesheet" type="text/css" >

        <!-- Icons Css -->
    </head>

    <body data-layout="detached" data-topbar="colored">
    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-end">

                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown d-none d-sm-inline-block">
                                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img class="" src="<?php echo base_url();?>assets/images/flags/us.jpg" alt="Header Language" height="16">
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="<?php echo base_url();?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Spanish</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="<?php echo base_url();?>assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">German</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="<?php echo base_url();?>assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Italian</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="<?php echo base_url();?>assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Russian</span>
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge rounded-pill bg-danger ">3</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small"> View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">It will seem like simplified English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 " href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="<?php echo base_url();?>assets/images/users/avatar-2.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1">Adminstrator</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
                                            class="bx bx-wrench font-size-16 align-middle me-1"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                                        Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                                </div>
                            </div>

                            

                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?php echo base_url();?>assets/images/logo-dark.png" alt="" height="17">
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?php echo base_url();?>assets/images/logo-light.png" alt="" height="19">
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                                id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                            <!-- App Search-->
                            <form class="app-search d-none d-lg-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="bx bx-search-alt"></span>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="<?php echo base_url();?>assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark fw-medium font-size-16">Adminstrator</a>
                <p class="text-body mt-1 mb-0 font-size-13">UI/UX Designer</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="#" class="waves-effect has-arrow">
                                    <i class="mdi mdi-airplay "></i>
                                    <span>Dashboard</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/Dashboard'?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/productAnnouncement'?>">Products
                                            Announcements</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-calendar-text"></i>
                                    <span>My Details</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/DealerProfile'?>">Dealer Profile</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect has-arrow">
                                    <i class="mdi mdi-inbox-full"></i>
                                    <span>Orders</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/CreateOrder'?>">Create Order</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/Cart'?>">Cart</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/ViewOrder'?>">View Order</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/Invoice'?>">Invoice</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/OutStanding'?>">Outstanding</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/ReturnOrder'?>">Return Order</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/CreditNote'?>">Credit Note</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/DebitNote'?>">Debit Note</a></li>
                                    <li><a href="<?php echo base_url().'Welcome/Warranty'?>">Warranty & Claim</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect has-arrow">
                                    <i class="mdi mdi-calendar-check"></i>
                                    <span>Product Portal</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/ProductPortal'?>">Products</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect has-arrow">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Stocks</span>

                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/Stock';?>">Inventory Products</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect has-arrow">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span>Service Request</span>

                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/Create_Request';?>">Create Request</a></li>
                                </ul>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url().'Welcome/Service_Request';?>">Service Requests</a></li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-sm font-size-20 me-3">
                                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                                <i class="mdi mdi-tag-plus-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-size-16 mt-2">New Orders</div>
                                        </div>
                                    </div>
                                    <h4 class="mt-4">1,368</h4>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="mb-0"><span class="text-success me-2"> 0.28% <i
                                                        class="mdi mdi-arrow-up"></i> </span></p>
                                        </div>
                                        <div class="col-5 align-self-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 62%"
                                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-sm font-size-20 me-3">
                                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                                <i class="mdi mdi-account-multiple-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-size-16 mt-2">Service Request</div>

                                        </div>
                                    </div>
                                    <h4 class="mt-4">2,456</h4>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="mb-0"><span class="text-success me-2"> 0.16% <i
                                                        class="mdi mdi-arrow-up"></i> </span></p>
                                        </div>
                                        <div class="col-5 align-self-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                                    aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card ">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Sales Report</h4>

                                    <div id="line-chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card  bg-info">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">My Achievement Run Rate</h4>

                                    <div id="column-chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table mb-0 table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>OrderStatus</th>
                                                <th>MyAchievement</th>
                                                <th>ServiceRequest</th>
                                                <th>TotalMaterialSoldAmt</th>
                                                <th>TotalMaterialSoldQty</th>
                                                <th>MyAchievementRunRate</th>
                                                <th>PendingCreditNoteScheme</th>
                                                <th>OutstandingAmt</th>
                                                <th>NewProductLaunched</th>
                                                <th>CumulativeGrowth</th>
                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                </div>
                    <!-- end row -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Qovex.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

            </div>

        </div>
        <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url().'assets/libs/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script>

    <script src="<?php echo base_url();?>assets/js/app.js"></script>

    </body>


<!-- Mirrored from themesbrand.com/qovex/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 27 Apr 2021 02:18:15 GMT -->
</html>