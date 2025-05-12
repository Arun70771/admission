



<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Materia - Admin Template">
    <meta name="keywords" content="materia, webapp, admin, dashboard, template, ui">
    <meta name="author" content="solutionportal">
    <!-- <base href="/"> -->

    <title>Amity University Online Application Portal</title>

    <!-- Icons -->
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.css">
    

    <!-- Plugins -->
    <link rel="stylesheet" href="styles/plugins/waves.css">
    <link rel="stylesheet" href="styles/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="styles/plugins/select2.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-slider.css">
    <link rel="stylesheet" href="styles/plugins/bootstrap-datepicker.css">
    <link rel="stylesheet" href="styles/plugins/summernote.css">

    <!-- Css/Less Stylesheets -->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/main.min.css">
    <link rel="stylesheet" href="styles/flaticon.css">
    <link rel="stylesheet" href="styles/Flaticon.ttf">
    <link rel="stylesheet" href="styles/intlTelInput.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- css & js for sweet alert  -->
    <script src="scripts/sweet-alert.js"></script>
    <link href="Content/sweetalert/sweet-alert.css" rel="stylesheet" />

    <script src="scripts/jquery-1.9.1.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <script src='scripts/CPLY.js#Nc172724a-6f32-4504-8051-e4e46e046804'></script>
    <style type="text/css">
        #dialog {
            overflow: auto;
            font-size: 10pt !important;
            font-weight: normal !important;
            margin: 10px;
        }

            #dialog div {
                margin-bottom: 15px;
            }

        .showSweetAlert h2 {
            text-transform: initial !important;
        }
    </style>

</head>
<body id="app" class="app off-canvas">


    <div id="loderimg" class="loading">
        <img src="Images/document-loader.gif" alt="">
    </div>
    <!-- header -->
    <header class="site-head" id="site-head">
        <ul class="list-unstyled left-elems">
            <!-- nav trigger/collapse -->
            <li>
                <a href="javascript:;" class="nav-trigger ion ion-drag"></a>
            </li>
            <!-- #end nav-trigger -->
            <!-- Search box -->
            <li>
                <div class=" hidden-xs">
                    <b style="color: #fff; text-transform: uppercase">
                        Admission 2024 |
                        <span id="spnAdmHeading">Application Form</span>
                    </b>
                </div>
            </li>
            <!-- #end search-box -->
            <!-- site-logo for mobile nav -->
            <li>
                <div class="site-logo visible-xs">
                    <a href="javascript:;" class="text-uppercase h3">
                        <span class="text">
                            <img src="img/logo.png" width="125" height="47" alt="">
                        </span>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled right-elems">

            <!-- sidebar contact -->
            <li class="form_no">
                Welcome  <span>LALIT</span>
            </li>

        </ul>

    </header>

    <!-- #end header -->
    <!-- main-container -->
    <div class="main-container clearfix">
        <!-- main-navigation -->
        <aside class="nav-wrap" id="site-nav" data-perfect-scrollbar>

            <div class="nav-head">
                <!-- site logo -->
                <a href="javascript:void(0);" class="site-logo text-uppercase">
                    <i>
                        <img src="img/full-logo.png" style="margin-left: 12px;" alt="">
                    </i>
                    <!--  <i> <img src="img/logo-icon.png" alt=""></i>
                    <span class="text">
                        <img src="img/au.png" alt="" style="max-width:70%">
                    </span>
                     <span style="font-size:32px">AMITY</span> <br> UNIVERSITY</span>-->
                </a>
            </div>




            <!-- Site nav (vertical) -->

            <nav class="site-nav clearfix" role="navigation">


                <!-- navigation -->
                <ul class="list-unstyled clearfix nav-list mb15 side_navbar" id="menu">
                    <li>
                        <a href="MyApplication?LNO=6E230887-DBBF-4723-8839-D224FA4EF52F">
                            <i class="ion"> <i class="ion-person"></i> </i>
                            <span class="text">My Applications </span>
                        </a>

                        
                    </li>
                    <li>
                        <a href="CandidateProfile?LNO=6E230887-DBBF-4723-8839-D224FA4EF52F">
                            <i class="ion"> <i class="ion-email"></i> </i>
                            <span class="text">My Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="Logout">
                            <i class="ion"> <i class="ion-android-phone-portrait"></i> </i>
                            <span class="text" id="BtnLogout">Logout</span>
                        </a>
                    </li>
                </ul>
                <!-- #end navigation -->
            </nav>

            <!-- nav-foot -->
            <footer class="nav-foot">
                <p>2015 &copy; <span>AKC Data Systems</span></p>
            </footer>

        </aside>


        <!-- content-here -->
        <div class="content-container" id="content">
            <!-- dashboard page -->

            <div class="page page-dashboard">
                <div class="page-wrap">
                    <style>
                        .fa {
                            font-size: 30px !important;
                            line-height: 1.1 !important;
                        }
                    </style>
                    <div class="row">

                        <div class="panel panel-default panel-hovered panel-stacked mb20">
                            <div class="panel-heading">My Profile</div>
                            <div class="panel-body">

                                <form role="form" id="Basicform" class="form-horizontal">
                                    <div class="disconnected_info alert alert-info">
                                        <div class="form-group name_sec">
                                            <label class="col-md-3 col-xs-12 control-label">
                                                Name <span class="text-danger">*</span><span class="name_info"></span>
                                            </label>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon ion ion-person"></span>
                                                    <input type="text" class="form-control  required" id="txtCandidateName" readonly="readonly" maxlength="50" name="txtCandidateName"
                                                           value="LALIT" placeholder="Full Name">
                                                </div>
                                                <p class="text-danger text-right xsmall">(as in candidate's class X mark sheet or equivalent)</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Mobile<span class="text-danger">*</span></label>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <div class="btn-group dropdown">
                                                            <div class="btn  dropdown-toggle  btn-primary  ">
                                                                <label id="txtCountryCode">+91</label>
                                                                <span class="caret"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control numericOnly required" readonly="readonly" id="txtMobile"
                                                           value="7503322444" maxlength="15" name="txtMobile" placeholder="Mobile No.">
                                                </div>
                                                <!-- #end btn-group-vertical -->
                                            </div>
                                            <span class="col-md-3 col-xs-12"><i class="fa fa-check fa-5x text-success"></i> Verified </span>
                                        </div>




                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">E-mail: <span class="text-danger">*</span></label>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ion ion-email"></span>
                                                        <input type="email" id="txtCandidateEmail" class="form-control required"
                                                               value="GUPTA.LALIT.111@GMAIL.COM" maxlength="50" name="txtCandidateEmail" placeholder="Enter email here...">

                                                    </div>
                                                </div>

                                                <span class="col-md-2 col-xs-12"><i class="fa fa-times fa-5x text-danger"></i> Not verified **</span>
                                                <span class="col-md-3 col-xs-12"><a href="CandidateProfile?LNO=6E230887-DBBF-4723-8839-D224FA4EF52F"><i class="fa fa-refresh fa-5x text-info" style="font-size: 20PX!important;    margin-top: 10px;"></i>  Verify Status</a></span>

                                            </div>
                                            <div class="form-group">

                                                <div class="col-md-4 col-xs-12 col-md-offset-3">
                                                    <button type="button" class="btn btn-success btn-xs" id="btnResendVerificationEmail">Resend Verification Email</button>
                                                </div>
                                                <label class="col-md-12 col-xs-12 control-label">
                                                    <p>
                                                        **Please Check your email and click on “Verify Email Address” to verify the emailID. Also please check junk email folder. Please check if you have correctly entered your emailID and change if required. Click “Resend verification Email” button below to send the email again.

                                                    </p>
                                                </label>


                                            </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"></label>
                                            <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-xs-12">
                                                            <a href="MyApplication?LNO=6E230887-DBBF-4723-8839-D224FA4EF52F" class="btn btn-success btn-xs" id="btnStart"> Start Application</a>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dialog"></div>
        </div>
    </div>
    <!-- #end main-container -->
    <!-- theme settings -->
    <div class="site-settings clearfix hidden-xs" style="display:none">
        <div class="settings clearfix">
            <div class="trigger ion ion-settings left"></div>
            <div class="wrapper left">
                <ul class="list-unstyled other-settings">
                    <li class="clearfix mb10">
                        <div class="left small">Nav Horizontal</div>
                        <div class="md-switch right">
                            <label>
                                <input type="checkbox" id="navHorizontal">
                                <span>&nbsp;</span>
                            </label>
                        </div>


                    </li>
                    <li class="clearfix mb10">
                        <div class="left small">Fixed Header</div>
                        <div class="md-switch right">
                            <label>
                                <input type="checkbox" id="fixedHeader">
                                <span>&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="clearfix mb10">
                        <div class="left small">Nav Full</div>
                        <div class="md-switch right">
                            <label>
                                <input type="checkbox" id="navFull">
                                <span>&nbsp;</span>
                            </label>
                        </div>
                    </li>
                </ul>
                <hr />
                <ul class="themes list-unstyled" id="themeColor">
                    <li data-theme="theme-zero" class="active"></li>
                    <li data-theme="theme-one"></li>
                    <li data-theme="theme-two"></li>
                    <li data-theme="theme-three"></li>
                    <li data-theme="theme-four"></li>
                    <li data-theme="theme-five"></li>
                    <li data-theme="theme-six"></li>
                    <li data-theme="theme-seven"></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #end theme settings -->

    <script src="scripts/vendors.js"></script>
    <script src="scripts/plugins/screenfull.js"></script>
    <script src="scripts/plugins/perfect-scrollbar.min.js"></script>
    <script src="scripts/plugins/waves.min.js"></script>
    <script src="scripts/plugins/select2.min.js"></script>
    <script src="scripts/plugins/bootstrap-colorpicker.min.js"></script>
    <script src="scripts/plugins/bootstrap-slider.min.js"></script>
    <script src="scripts/plugins/summernote.min.js"></script>
    
    <script src="scripts/app.js"></script>
    <script src="scripts/form-elements.init.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/jquery.validate.min.js"></script>
    <link href="styles/screen.css" rel="stylesheet" />
    <!-- Start date 28022017-->

</body>

</html>

