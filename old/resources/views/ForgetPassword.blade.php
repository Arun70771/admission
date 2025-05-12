<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <base href="/"> -->
    <title>SAU University - Admission Application Portal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('public/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/fonts/font-awesome/css/font-awesome.css')}}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('public/styles/plugins/waves.css')}}">
    <link rel="stylesheet" href="{{asset('public/styles/plugins/perfect-scrollbar.css')}}">

    <!-- Css/Less Stylesheets -->
    <link rel="stylesheet" href="{{asset('public/styles/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/styles/main.min.css')}}">

    <!-- css & js for sweet alert  -->
    <script src="{{asset('public/Scripts/sweet-alert.js')}}"></script>
    <link href="{{asset('public/Content/sweetalert/sweet-alert.css')}}" rel="stylesheet" />

    <script src="{{asset('public/Scripts/jquery-1.9.1.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

   
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800&amp;family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />

    <link href="{{asset('public/NewStyle/all.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('public/NewStyle/style.css')}}" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="{{asset('public/Scripts/CPLY.js')}}"></script>
    <script src="{{asset('public/scripts/vendors.js')}}"></script>
    <script src="{{asset('public/Scripts/jquery.validate.min.js')}}"></script>
    <link href="{{asset('public/styles/screen.css')}}" rel="stylesheet" />
    <link href="{{asset('public/styles/style.css')}}" rel="stylesheet" />
</head>
<body>


    <style type="text/css">

    </style>



    <div class="main-wrapper">
        <div class="meeta-header-section meeta-header-2">
            <!-- Header Middle Start -->
            <div class="header-middle header-sticky">
                <div class="container">
                    <div class="header-wrap">
                        <!-- Header Logo Start -->
                        <div class="header-logo" style="width:100%">
                        <div class="col-md-10"><a href="http://admissions.sau.ac.in/"><img src="{{asset('public/img/sau-university.png')}}" width="250" /></a></div>
                            <a href="http://admissions.sau.ac.in/"><img src="{{asset('public/img/SAARC-logo.png')}}" width="75"/></a>
                        </div>


                        <!-- Header Logo End -->
                    </div>
                </div>
            </div>
            <!-- Header Middle End -->
        </div>
        <!-- Header End -->
        <!-- Offcanvas Start-->
        <div class="offcanvas offcanvas-start" id="offcanvasExample">
            <div class="offcanvas-header">
                <!-- Offcanvas Logo Start -->
                <div class="offcanvas-logo">
                <a href="http://admissions.sau.ac.in/"><img src="{{asset('public/img/sau-university.png')}}" /></a>
                    <a href="http://admissions.sau.ac.in/"><img src="{{asset('public/img/SAARC-logo.png')}}" /></a>
                    
                </div>
                <!-- Offcanvas Logo End -->
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i class="flaticon-close"></i></button>
            </div>
        </div>
        <!-- Offcanvas End -->
        <!-- Hero Section Start  -->
        <div class="meeta-hero-section-4 d-flex align-items-center bannertext">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 order-2 order-md-1">
                    <div class="hero-content">
                            <br><br><br><br><br><br>
                            <div class="hero-date" data-aos-delay="700" data-aos="fade-up">
                            <h1 class="date">SOUTH ASIAN UNIVERSITY</h1>
                                <span class="year" style="display: block;">A University established by SAARC Nations
                                </span>
                            </div>
                            <h2 class="title" data-aos-delay="900" data-aos="fade-up">Admissions 2024-25 </h2>
                        </div>
                        <!-- Hero Content End -->

                    </div>
                    <div class="col-md-5 order-1 order-md-2">
                        <h3 class="pageheading">
                            Application Portal
                        </h3>
                       
                        <div class="hero-form" data-aos-delay="900" data-aos="fade-up">
                            <div class="hero-form-wrap">
                                <div class="heading-wrap text-center">
                                    <p>
                                        <b style="display: block; color: #183e65;font-size: 16px;font-weight: 500;padding-top: 20px;">Forget Password</b>
                                    </p>

                                </div>
                                <form class="form-horizontal" action="http://admissions.sau.ac.in/index.php/forget" method="post" id="SignInform">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="text" id="email" name="email" placeholder="Enter Email" required>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    

                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div id="errormessages"></div>
                                            <!-- Single Form End -->
                                        </div>

                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="form-btn" style="margin-top: 0px;">

                                                <button type="submit" id="BtnSignIn" class="btn-new2">Submit</button>
                                                <br />
                                                <p style="color:#000;font-size: 14px;margin-top: 10px;">New User? <a href="{{url('/')}}" style="color: black;background: #ffc107;font-weight: 600;border-radius: 20px;padding: 1px 10px;">Sign-Up</a></p>

                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Hero Form End -->
                    </div>
                </div>

                <div id="dialog"></div>
            </div>
        </div>







    </div>





    <script src="{{asset('public/NewScript/vendor/modernizr-3.11.7.min.js')}}"></script>
    <script src="{{asset('public/NewScript/popper.min.js')}}"></script>
    <script src="{{asset('public/NewScript/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/NewScript/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('public/NewScript/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/NewScript/waypoints.min.js')}}"></script>
    <script src="{{asset('public/NewScript/aos.js')}}"></script>
    <script src="{{asset('public/NewScript/jquery.nice-select.min.js')}}"></script>


</body>

</html>