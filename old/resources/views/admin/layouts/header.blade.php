<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Nowa – Laravel Bootstrap 5 admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template" />
    <!-- Title -->
    <title> Admissions 2024-25 </title>
    <!-- ICONS CSS -->
    <link href="https://scrs.in/admin/assets/plugins/icons/icons.css" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="https://scrs.in/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- INTERNAL Select2 css -->
    <link href="https://scrs.in/admin/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <!-- INTERNAL Data table css -->
    <link href="https://scrs.in/admin/assets/plugins/datatable/css/dataTables.bootstrap5.css" rel="stylesheet" />


    <!-- STYLES CSS -->
    <link href="https://scrs.in/admin/assets/css/style.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet"
        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({
                height: 350,
                width: 700,
                disableResizeEditor: true,
            });
            $("#summernote1").summernote({
                height: 350,
                width: 700,
                disableResizeEditor: true,
            });
            //$('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
</head>

<body class="ltr main-body app horizontal">
    <!-- Loader -->
    <div id="global-loader">
        <img src="https://scrs.in/admin/assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div>

            <!-- main-header -->
            <div class="main-header sticky nav nav-item hor-header">
                <div class=" main-container container-fluid">
                    <div class="main-header-left ">
                        <div class="responsive-logo">
                            <a href="http://admissions.sau.ac.in/index.php/admin/home" class="header-logo">
                                <img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                                    class="mobile-logo logo-1" alt="logo">
                                <img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                                    class="mobile-logo dark-logo-1" alt="logo">
                            </a>
                        </div>
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="javascript:void(0);"><i
                                    class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
                        </div>
                        <div class="logo-horizontal">
                            <a href="http://admissions.sau.ac.in/index.php/admin/home" class="header-logo">
                                <img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                                    class="mobile-logo logo-1" alt="logo">
                                <img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                                    class="mobile-logo dark-logo-1" alt="logo">
                            </a>
                        </div>
                        <div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">


                            <form method="post" action="{{ '/index.php/admin/search' }}">
                                @csrf
                                <input class="form-control" placeholder="Search..." type="search" name="search"
                                    value="{{ old('search') }}">
                                <button class="btn"><span class="material-symbols-outlined">
                                        search
                                    </span></button>

                            </form>


                        </div>
                    </div>
                    <div class="main-header-right">

                        <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                <ul class="nav nav-item header-icons navbar-nav-right ms-auto">

                                    <li class="dropdown nav-item main-header-notification d-flex">
                                        <a class="new nav-link" data-bs-toggle="dropdown" href="javascript:void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                width="24" height="24" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z" />
                                            </svg>
                                            <span class=" pulse"></span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="menu-header-content text-start border-bottom">
                                                <div class="d-flex">
                                                    <h6 class="dropdown-title mb-1 tx-15 font-weight-semibold">
                                                        Notifications</h6>
                                                    <span
                                                        class="badge badge-pill badge-warning ms-auto my-auto float-end">Mark
                                                        All Read</span>
                                                </div>
                                                <p class="dropdown-title-text subtext mb-0 op-6 pb-0 tx-12 ">You have 4
                                                    unread Notifications</p>
                                            </div>
                                            <div class="main-notification-list Notification-scroll">
                                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                                    <div class="notifyimg bg-pink">
                                                        <i class="far fa-folder-open text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">New files available</h5>
                                                        <div class="notification-subtext">10 hour ago</div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>


                                            </div>
                                            <div class="dropdown-footer">
                                                <a class="btn btn-primary btn-sm btn-block" href="mail.html">VIEW
                                                    ALL</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-link search-icon d-lg-none d-block">
                                        <form class="navbar-form" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                    <button type="reset" class="btn btn-default">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-default nav-link resp-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                            class="header-icon-svgs" viewBox="0 0 24 24"
                                                            width="24px" fill="#000000">
                                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                                            <path
                                                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
                                        <a class="new nav-link profile-user d-flex" href="#"
                                            data-bs-toggle="dropdown"><img alt="" src="assets/images/2.jpg"
                                                class=""></a>
                                        <div class="dropdown-menu">
                                            <div class="menu-header-content p-3 border-bottom">
                                                <div class="d-flex wd-100p">
                                                    <div class="main-img-user"><img alt=""
                                                            src="assets/images/2.jpg" class=""></div>
                                                    <div class="ms-3 my-auto">
                                                        <h6 class="tx-15 font-weight-semibold mb-0">
                                                            {{ session()->get('adminuser')->name }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="dropdown-item"
                                                href="http://admissions.sau.ac.in/index.php/admin/login-panel"><i
                                                    class="far fa-arrow-alt-circle-left"></i> Sign Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main-header -->

            <!-- main-sidebar -->
            <div class="sticky">
                <aside class="app-sidebar ps horizontal-main">
                    <div class="main-sidebar-header active">
                        <a class="header-logo active" href="http://admissions.sau.ac.in/index.php/admin/pages">
                            <img src="assets/images/logo.png" class="main-logo  desktop-logo" alt="logo">
                            <img src="assets/img/brand/logo-white.png" class="main-logo  desktop-dark"
                                alt="logo">
                            <img src="assets/img/brand/favicon.png" class="main-logo  mobile-logo" alt="logo">
                            <img src="assets/img/brand/favicon-white.png" class="main-logo  mobile-dark"
                                alt="logo">
                        </a>
                    </div>
                    <div class="main-sidemenu  container">
                        <div class="slide-left disabled active d-none" id="slide-left"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">

                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide"
                                    href="http://admissions.sau.ac.in/index.php/admin/admissionslist"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z" />
                                    </svg><span class="side-menu__label">Admissions List</span></a></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide"
                                    href="http://admissions.sau.ac.in/index.php/admin/short-term-course-list"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z" />
                                    </svg><span class="side-menu__label">Short Term Course List</span></a></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide"
                                    href="http://admissions.sau.ac.in/index.php/admin/masters-list"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z" />
                                    </svg><span class="side-menu__label">Masters List</span></a></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide"
                                    href="http://admissions.sau.ac.in/index.php/admin/phd-list"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z" />
                                    </svg><span class="side-menu__label">PhD List</span></a></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide"
                                    href="{{ route('application_fees') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z" />
                                    </svg><span class="side-menu__label">Final Fees Payments</span></a></li>







                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </aside>
            </div>
            <!-- main-sidebar -->

        </div>
