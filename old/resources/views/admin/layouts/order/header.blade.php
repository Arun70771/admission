<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Nowa – Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template"
    />

    <!-- Title -->
    <title> SCRS </title>


    <!-- ICONS CSS -->
    <link href="{{url('admin/assets/plugins/icons/icons.css')}}" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{url('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />



    <!-- INTERNAL Select2 css -->
    <link href="{{url('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />

    <!-- INTERNAL Data table css -->
    <link href="{{url('admin/assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />


    <!-- STYLES CSS -->
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>


</head>

<body class="ltr main-body app horizontal">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{url('admin/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
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
                            <a href="{{url('admin/home')}}" class="header-logo">
                                <img src="https://www.scrs.in/uploads/logo_(2).png" class="mobile-logo logo-1" alt="logo">
                                <img src="https://www.scrs.in/uploads/logo_(2).png" class="mobile-logo dark-logo-1" alt="logo">
                            </a>
                        </div>
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left" ></i></a>
                            <a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
                        </div>
                        <div class="logo-horizontal">
                            <a href="{{url('admin/home')}}" class="header-logo">
                                <img src="https://www.scrs.in/uploads/logo_(2).png" class="mobile-logo logo-1" alt="logo">
                                <img src="https://www.scrs.in/uploads/logo_(2).png" class="mobile-logo dark-logo-1" alt="logo">
                            </a>
                        </div>
                        <div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">
                            <input class="form-control" placeholder="Search..." type="search">
                            <button class="btn"><span class="material-symbols-outlined">
                                search
                                </span></button>
                        </div>
                    </div>
                    <div class="main-header-right">

                        <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                <ul class="nav nav-item header-icons navbar-nav-right ms-auto">

                                    <li class="dropdown nav-item main-header-notification d-flex">
                                        <a class="new nav-link" data-bs-toggle="dropdown" href="javascript:void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"/></svg>
                                            <span class=" pulse"></span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="menu-header-content text-start border-bottom">
                                                <div class="d-flex">
                                                    <h6 class="dropdown-title mb-1 tx-15 font-weight-semibold">Notifications</h6>
                                                    <span class="badge badge-pill badge-warning ms-auto my-auto float-end">Mark All Read</span>
                                                </div>
                                                <p class="dropdown-title-text subtext mb-0 op-6 pb-0 tx-12 ">You have 4 unread Notifications</p>
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
                                                <a class="d-flex p-3  border-bottom" href="mail.html">
                                                    <div class="notifyimg bg-purple">
                                                        <i class="fab fa-delicious text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">Updates Available</h5>
                                                        <div class="notification-subtext">2 days ago</div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>
                                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                                    <div class="notifyimg bg-success">
                                                        <i class="fa fa-cart-plus text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">New Order Received</h5>
                                                        <div class="notification-subtext">1 hour ago</div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>
                                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                                    <div class="notifyimg bg-warning">
                                                        <i class="far fa-envelope-open text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">New review received</h5>
                                                        <div class="notification-subtext">1 day ago</div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>
                                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                                    <div class="notifyimg bg-danger">
                                                        <i class="fab fa-wpforms text-white"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">22 verified registrations</h5>
                                                        <div class="notification-subtext">2 hour ago</div>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>
                                                <a class="d-flex p-3 border-bottom" href="mail.html">
                                                    <div class="">
                                                        <i class="far fa-check-square text-white notifyimg bg-primary"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5 class="notification-label mb-1">Project has been approved</h5>
                                                        <span class="notification-subtext">4 hour ago</span>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="las la-angle-right text-end text-muted"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="dropdown-footer">
                                                <a class="btn btn-primary btn-sm btn-block" href="mail.html">VIEW ALL</a>
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
															<svg xmlns="http://www.w3.org/2000/svg" height="24px" class="header-icon-svgs" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
														</button>
													</span>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
                                        <a class="new nav-link profile-user d-flex" href="#" data-bs-toggle="dropdown"><img alt="" src="assets/images/2.jpg" class=""></a>
                                        <div class="dropdown-menu">
                                            <div class="menu-header-content p-3 border-bottom">
                                                <div class="d-flex wd-100p">
                                                    <div class="main-img-user"><img alt="" src="assets/images/2.jpg" class=""></div>
                                                    <div class="ms-3 my-auto">
                                                        <h6 class="tx-15 font-weight-semibold mb-0">SCRS</h6>
                                                    </div>
                                                </div>
                                            </div>
                                           <a class="dropdown-item" href="{{url('/admin/change-password')}}"><i class="far fa-arrow-alt-circle-left"></i> Change Password</a>
                                            <a class="dropdown-item" href="{{url('/admin/logout')}}"><i class="far fa-arrow-alt-circle-left"></i> Sign Out</a>
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
                        <a class="header-logo active" href="{{url('admin/home')}}">
                            <img src="assets/images/logo.png" class="main-logo  desktop-logo" alt="logo">
                            <img src="assets/img/brand/logo-white.png" class="main-logo  desktop-dark" alt="logo">
                            <img src="assets/img/brand/favicon.png" class="main-logo  mobile-logo" alt="logo">
                            <img src="assets/img/brand/favicon-white.png" class="main-logo  mobile-dark" alt="logo">
                        </a>
                    </div>
                    <div class="main-sidemenu  container">
                        <div class="slide-left disabled active d-none" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">

                        
                        <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/home')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></svg><span class="side-menu__label">Dashboard</span></a>
                            </li>

                           
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg><span class="side-menu__label">SCRS Modules</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a class="sub-side-menu__item" href="{{url('admin/banner')}}"><span>Banner Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/category')}}"><span>Category Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/homegallery')}}"><span>Home Page Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/pages')}}"><span>Page Manager</span></a></li>

                                    <!-- <li><a class="sub-side-menu__item" href="{{url('admin/pages/order')}}"><span>Page Order List</span></a></li> -->
                                    <!-- <li><a class="sub-side-menu__item" href="{{url('admin/profile')}}"><span>Profile</span></a></li> -->
                                    
                                    <li><a class="sub-side-menu__item" href="{{url('admin/event')}}"><span>Event Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/awards')}}"><span>Awards Manager</span></a></li>
                                    <!-- <li><a class="sub-side-menu__item" href="{{url('admin/series')}}"><span>Series Manager</span></a></li> -->
                                    <li><a class="sub-side-menu__item" href="{{url('admin/gallery')}}"><span>Gallery Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/scrs-users')}}"><span>Scrs Users</span></a></li>

                                </ul>
                            </li>

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/conference')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"/></svg><span class="side-menu__label">Conference</span></a>
                            </li>


                            <li class="side-item side-item-category">Conference Modules</li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 7h-1.209A4.92 4.92 0 0 0 19 5.5C19 3.57 17.43 2 15.5 2c-1.622 0-2.705 1.482-3.404 3.085C11.407 3.57 10.269 2 8.5 2 6.57 2 5 3.57 5 5.5c0 .596.079 1.089.209 1.5H4c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zm-4.5-3c.827 0 1.5.673 1.5 1.5C17 7 16.374 7 16 7h-2.478c.511-1.576 1.253-3 1.978-3zM7 5.5C7 4.673 7.673 4 8.5 4c.888 0 1.714 1.525 2.198 3H8c-.374 0-1 0-1-1.5zM4 9h7v2H4V9zm2 11v-7h5v7H6zm12 0h-5v-7h5v7zm-5-9V9.085L13.017 9H20l.001 2H13z"/></svg><span class="side-menu__label">Conference Modules</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                <li><a class="sub-side-menu__item" href="{{url('admin/conference_banner')}}"><span>Banner Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/conference_category')}}"><span>Category Manager</span></a></li>
                                    <!-- <li><a class="sub-side-menu__item" href="{{url('admin/conference_homepage')}}"><span>Home Page Manager</span></a></li> -->
                                    <li><a class="sub-side-menu__item" href="{{url('admin/conference_pages')}}"><span>Page Manager</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/pages/order')}}"><span>Page Order Manager</span></a></li>
                                
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/committee')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"/></svg><span class="side-menu__label">Committee</span></a></li>
                          
                           <li class="side-item side-item-category">Speakers</li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/speakers')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg><span class="side-menu__label">Speakers</span></a>
                            </li>

                            <li class="side-item side-item-category">Mail</li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/members-mail')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg><span class="side-menu__label">Mail</span></a>
                                <ul class="slide-menu">
                                    <li><a class="sub-side-menu__item" href="{{url('admin/members-mail')}}"><span>Members Mail</span></a></li>
                                    <li><a class="sub-side-menu__item" href="{{url('admin/mail-format')}}"><span>Mail Format</span></a></li>                                
                                </ul>
                            </li>
                          
                            <li class="side-item side-item-category">News</li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/news')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"/></svg><span class="side-menu__label">News</span></a>
                            </li>


                            <li class="side-item side-item-category">Payments</li>
                            <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/payment')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"/></svg><span class="side-menu__label">Payments</span></a>
                            </li>

                            <li class="side-item side-item-category">Documents</li>
                            <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="{{url('admin/document')}}"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"/></svg><span class="side-menu__label">Documents</span></a>
                            </li>





                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </aside>
            </div>
            <!-- main-sidebar -->

        </div>