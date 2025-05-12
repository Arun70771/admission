<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{url('admin/assets/vendors/icheck/skins/all.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:admin/partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="{{route('admin.dashboard')}}">
            <img src="{{ asset('web/images/sau_log.png') }}" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}">
            <img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
         <p class="text-center text-warning">  Admissions 2025-26  -  Through Direct Mode</p>
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{ asset('web/images/sau_log.png') }}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown align-items-center flex-column" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ asset('web/images/sau_log.png') }}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">SAU Admin</p>
                  <p class="font-weight-light text-muted mb-0">admission@sau.int</p>
                </div>               
                <a href="{{route('admin.logout')}}" class="btn btn-danger" style="margin-left: 5rem !important;">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:admin/partials/_sidebar.html -->
        @include('admin.layouts.navbar')

        <!-- partial -->