<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="solutionportal">
    <!-- <base href="/"> -->
    <title>SAU University Online Admission Application Form</title>
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/bootstrap-colorpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/bootstrap-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/summernote.css') }}">
    <!-- Css/Less Stylesheets -->
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/Flaticon.ttf') }}">
    <link rel="stylesheet" href="{{ asset('styles/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- css & js for sweet alert  -->
    <script src="{{ asset('scripts/sweet-alert.js') }}"></script>
    <link href="{{ asset('Content/sweetalert/sweet-alert.css') }}" rel="stylesheet" />
    <script src="{{ asset('scripts/jquery-1.9.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

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
            <li> . </li>
            <!-- #end nav-trigger -->
            <!-- Search box -->
            <li>
                <div class=" hidden-xs">
                    <b style="color: #fff; text-transform: uppercase">Admission 2025-26 | <span
                            id="spnAdmHeading">Application Form</span></b>
                </div>
            </li>
            <!-- #end search-box -->
            <!-- site-logo for mobile nav -->
            <li>
                <div class="site-logo visible-xs">
                    <a href="{{ url('/step1') }}" class="text-uppercase h3">
                        <span class="text"><img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif"
                                width="125" height="47" alt="Sau"></span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled right-elems">
            <!-- sidebar contact -->
            <li class="form_no">
                Form No : SAU-A&E-2025-26-{{ 900000 + Session::get('user')->id }}<span id="headerfno"></span>
            </li>
            <li id="LiHelpLine" style="display:none;">
                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#HelpLine">Helpline</a>
            </li>
            <li id="liLogout">
                <a class="btn btn-danger btn-xs" href="{{ url('/logout') }}">Logout</a>
            </li>
        </ul>
    </header>
    <div class="modal fade" id="HelpLine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="close-btn" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">If you have any Query, <br /> please contact us at:</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="HelpEmailId  ">
                            Email : <span id="HelpEmail"> </span>
                        </div>
                        <div class="HelpTelePhoneNumber">
                            Tel: <span id="HelpPhoneNumber"> </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- #end header -->
    <!-- main-container -->
    <div class="main-container clearfix">
        <!-- main-navigation -->
        <aside class="nav-wrap" id="site-nav" data-perfect-scrollbar>
            <div class="nav-head">
                <!-- site logo -->
                <a href="{{ url('step1') }}" class="site-logo text-uppercase">
                    <i>
                        <img src="http://admissions.sau.ac.in/img/full-logo.png"
                            style="margin-left: 12px;width: 50%;"alt="">
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
                    <ul class="list-unstyled clearfix nav-list mb15 side_navbar" id="menu">
                        @if ($data->is_complate == 1)
                            <li @if (Request::segment(1) == 'step1') class="active" @endif><a
                                    style="{{ $data->step >= 0 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step1') }}"><i class="ion"> 1</i><span
                                        class="text">Application Form</span></a></li>

                            
                                        @php
                                            $admissionOffice = \App\Models\AdmissionOffice::find($data->id);
                                        @endphp
                                            @if ($admissionOffice && $admissionOffice->final_payment == '1' && $admissionOffice->concession != 'not_eligible')
                                                @if ($data->programme == 'short_term')
                                                    <li><a href="{{ url('short_term_application_fee') }}"><i class="ion"> 2</i><span
                                                                class="text"> Short-Term Courses <br>Application Fee</span></a></li>
                                                @elseif($data->programme == 'Masters')
                                                    <li><a href="{{ url('ms_application_fee') }}"><i class="ion"> 2</i><span
                                                                class="text"> Master’s Degree Programme <br>Application Fee</span></a>
                                                    </li>
                                                @elseif($data->programme == 'PhD')
                                                <li><a href="{{ url('phd_application_fee') }}"><i class="ion"> 2</i><span
                                                            class="text"> PhD Degree Programme <br>Application Fee</span></a>
                                                </li>    
                                                @endif
                                                
                                            @endif


                        @else
                            <li @if (Request::segment(1) == 'step1') class="active" @endif><a
                                    style="{{ $data->step >= 0 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step1') }}"><i class="ion"> 1</i><span
                                        class="text">Program</span></a></li>
                            <li @if (Request::segment(1) == 'step2') class="active" @endif><a
                                    style="{{ $data->step >= 2 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step2') }}"><i class="ion"> 2</i><span class="text">Personal
                                        Details</span></a></li>
                            <li @if (Request::segment(1) == 'step3') class="active" @endif><a
                                    style="{{ $data->step >= 3 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step3') }}"><i class="ion"> 3</i><span
                                        class="text">Education Details</span></a></li>
                            <li @if (Request::segment(1) == 'step4') class="active" @endif><a
                                    style="{{ $data->step >= 4 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step4') }}"><i class="ion"> 4</i><span class="text">Further
                                        Information</span></a></li>
                            <li @if (Request::segment(1) == 'step5') class="active" @endif><a
                                    style="{{ $data->step >= 4 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step5') }}"><i class="ion"> 5</i><span class="text">Upload
                                        Documents</span></a></li>
                            <li @if (Request::segment(1) == 'step6') class="active" @endif><a
                                    style="{{ $data->step >= 4 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step6') }}"><i class="ion"> 6</i><span class="text">Upload
                                        Others Documents</span></a></li>
                            <li @if (Request::segment(1) == 'step7') class="active" @endif><a
                                    style="{{ $data->step >= 4 ? '' : 'pointer-events: none' }}"
                                    href="{{ url('step7') }}"><i class="ion"> 7</i><span class="text">Pay
                                        Registration Fee</span></a></li>
                        @endif

                    </ul>
                </ul>
                <!-- #end navigation -->

                <div class="alert alert-info" role="alert" style="margin-top: 2rem;font-size: 14px;">
                    <p><strong>Technical Support:</strong><br>Email: <a
                            href="mailto:technical@sau.int">technical@sau.int</a></p>
                    <p><strong>Admission Support:</strong><br>Email: <a
                            href="mailto:admission@sau.int">admission@sau.int</a></p>
                </div>



            </nav>
            <!-- nav-foot -->
            <footer class="nav-foot">
                <p> &copy; <span>SAU ADMISSION {{ date('Y') }}</span></p>
            </footer>
        </aside>

        @yield('content')


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

        <script src="{{ asset('scripts/vendors.js') }}"></script>
        <script src="{{ asset('scripts/plugins/screenfull.js') }}"></script>
        <script src="{{ asset('scripts/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('scripts/plugins/waves.min.js') }}"></script>
        <script src="{{ asset('scripts/plugins/select2.min.js') }}"></script>
        <script src="{{ asset('scripts/plugins/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('scripts/plugins/bootstrap-slider.min.js') }}"></script>
        <script src="{{ asset('scripts/plugins/summernote.min.js') }}"></script>
        <script src="{{ asset('scripts/app.js') }}"></script>
        <script src="{{ asset('scripts/form-elements.init.js') }}"></script>
        <script src="{{ asset('scripts/script.js') }}"></script>
        <script src="{{ asset('scripts/jquery.validate.min.js') }}"></script>
        <link href="{{ asset('styles/screen.css') }}" rel="stylesheet" />
        <script src="https://admissions.sau.ac.in/addmission.js"></script>
        <script src="https://admissions.sau.ac.in/addmission2.js"></script>
</body>


</html>
