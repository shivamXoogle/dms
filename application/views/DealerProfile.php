<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Microtek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url();?>assets/css/Style2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
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
                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
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
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">It will seem like simplified English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours
                                                            ago</p>
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
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-4.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend of mine
                                                            occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours
                                                            ago</p>
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
                                <button type="button" class="btn header-item waves-effect"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="<?php echo base_url();?>assets/images/users/avatar-2.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1">Sarna Auto Electric Works</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="<?php echo base_url().'Welcome/DealerProfile'?>"><i
                                            class="bx bx-user font-size-16 align-middle me-1"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="<?php echo base_url().'Welcome/CreditNote'?>"><i
                                            class="bx bx-wallet font-size-16 align-middle me-1"></i>
                                        Credit Note</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        Logout</a>
                                </div>
                            </div>



                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="<?php echo base_url();?>assets/customImg/microtek.png" alt=""
                                            height="30">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?php echo base_url();?>assets/customImg/microtek.png" alt=""
                                            height="20">
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="<?php echo base_url();?>assets/customImg/microtek.png" alt=""
                                            height="30">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?php echo base_url();?>assets/customImg/microtek.png" alt=""
                                            height="20">
                                    </span>
                                </a>
                            </div>

                            <button type="button"
                                class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
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
                            <img src="<?php echo base_url();?>assets/customImg/sharma-battery-house-gurgaon-1w9ztu2fxk.webp"
                                alt="" class="avatar-md mx-auto rounded-circle">
                        </div>

                        <div class="mt-3">

                            <a href="#" class="text-dark fw-medium font-size-16">Sarna Auto Electric Works</a>
                            <p class="text-body mt-1 mb-0 font-size-13">Administrator</p>

                        </div>
                    </div>

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
                                    <li><a href="<?php echo base_url().'Welcome/ServiceRequestView';?>">Service Requests</a></li>
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
                                <h4 class="page-title mb-0 font-size-18">Dealer Profile</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to Profile</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Edit</button>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="dealerProfile">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" name="name" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" name="email" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Entity Name</label>
                                                    <input type="text" class="form-control" name="EntityName" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Type of Distributor</label>
                                                    <input type="text" class="form-control" name="DistributorType"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea type="text" rows="3" class="form-control" name="aboutMe"
                                                        readonly></textarea>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Address</label>
                                                    <textarea type="text" rows="3" name="address" class="form-control"
                                                        readonly></textarea>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Type of Distributor</label>
                                                    <input type="text" class="form-control" name="DistributorType"
                                                        readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Type of Entity</label>
                                                    <input type="text" readonly class="form-control" name="EntityType">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
                <!-- End Page-content -->


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
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-1.jpg"
                        class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-2.jpg"
                        class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="<?php echo base_url();?>assets/images/layouts/layout-3.jpg"
                        class="img-fluid img-thumbnail" alt="">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="EditdealerProfile">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="hidden" name="_id" id="dealerID">
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Entity Name</label>
                                                    <input type="text" class="form-control" name="EntityName" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Type of Distributor</label>
                                                    <select class="form-control" name="DistributorType" required>
                                                        <option value="Siver">Siver</option>
                                                        <option value="Gold">Gold</option>
                                                        <option value="Platinum">Platinum</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea type="text" rows="3" class="form-control" name="aboutMe"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Address</label>
                                                    <textarea type="text" rows="3" name="address" class="form-control"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Mobile</label>
                                                    <input type="text" class="form-control" name="mobile" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>Type of Entity</label>
                                                    <select class="form-control" name="EntityType" required>
                                                        <option value="Prop">Prop</option>
                                                        <option value="Partnership">Partnership</option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center mt-3 container">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <?php 

    if(isset($_SESSION['dealerDetails']))
    {
       //echo json_encode($_SESSION['userDetails']);
       $Userdata = json_encode($_SESSION['dealerDetails']);
       //echo $Userdata;
    }
    else
    $Userdata = 'Not Set';

?>
    <script>
        const userDataFromSessions = '<?php echo  $Userdata ;?>';
        const base_url = '<?php echo base_url() ?>';
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script
        src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script
        src="<?php echo base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script>

    <script src="<?php echo base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/customJS/dealer.js"></script>
</body>


<!-- Mirrored from themesbrand.com/qovex/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 27 Apr 2021 02:18:15 GMT -->

</html>