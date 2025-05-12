<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <base href="/"> -->
    <title>SAU University - Admission Application Portal </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('styles/plugins/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/plugins/perfect-scrollbar.css') }}">

    <!-- Css/Less Stylesheets -->
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/main.min.css') }}">

    <!-- css & js for sweet alert  -->
    <script src="{{ asset('Scripts/sweet-alert.js') }}"></script>
    <link href="{{ asset('Content/sweetalert/sweet-alert.css') }}" rel="stylesheet" />

    <script src="{{ asset('Scripts/jquery-1.9.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800&amp;family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />

    <link href="{{ asset('NewStyle/all.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('NewStyle/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('NewStyle/style.css') }}" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="{{ asset('Scripts/CPLY.js') }}"></script>
    <script src="{{ asset('scripts/vendors.js') }}"></script>
    <script src="{{ asset('Scripts/jquery.validate.min.js') }}"></script>
    <link href="{{ asset('styles/screen.css') }}" rel="stylesheet" />
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" />




</head>

<body>


    <style type="text/css">
        @media screen and (max-width: 600px) {
            .saarc {
                display: none;
            }

            .pageheading {
                padding: 20px
            }

            .logo {
                width: 200px !important;
            }
        }
    </style>



    <div class="main-wrapper">
        <div class="meeta-header-section meeta-header-2">
            <!-- Header Middle Start -->
            <div class="header-middle header-sticky">
                <div class="container">
                    <div class="header-wrap">
                        <!-- Header Logo Start -->
                        <div class="header-logo" style="width:100%">
                            <div class="col-md-10"><a href="http://admissions.sau.ac.in/"><img class="logo"
                                        src="{{ asset('img/sau-university.png') }}" width="250" /></a></div>
                            <div class="col-md-2 saarc"><a href="http://admissions.sau.ac.in/"><img
                                        src="{{ asset('img/SAARC-logo.png') }}" width="75" /></a></div>
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
                    <div class="col-md-10"><a href="http://admissions.sau.ac.in/"><img
                                src="{{ asset('img/sau-university.png') }}" /></a></div>
                    <div class="col-md-2"><a href="http://admissions.sau.ac.in/"><img
                                src="{{ asset('img/SAARC-logo.png') }}" width="75"
                                style="padding:10px" /></a></div>

                </div>

                <!-- Offcanvas Logo End -->
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i
                        class="flaticon-close"></i></button>
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
                            <h2 class="title" data-aos-delay="900" data-aos="fade-up">Admissions 2025-26 </h2>


                            <div class="alert alert-info" role="alert" style="margin-top: 2rem;font-size: 14px;">
                                <p><strong>Technical Support:</strong><br>Email: <a
                                        href="mailto:technical@sau.int">technical@sau.int</a></p>
                                <p><strong>Admission Support:</strong><br>Email: <a
                                        href="mailto:admission@sau.int">admission@sau.int</a></p>
                            </div>

                        </div>
                        <!-- Hero Content End -->



                    </div>
                    <div class="col-md-5 order-1 order-md-2">
                        <h3 class="pageheading" style="padding:10px">
                            Application Portal
                        </h3>





                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('warning'))
                            <div class="alert alert-danger">{{ Session::get('warning') }} </div>
                        @endif




                        <div class="hero-form" data-aos-delay="900" data-aos="fade-up">
                            <div class="hero-form-wrap">
                                <div class="heading-wrap text-center">
                                    <p>
                                        <b
                                            style="display: block; color: #183e65;font-size: 16px;font-weight: 500;padding-top: 20px;">New
                                            User - Sign Up</b>
                                    </p>


                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                </div>
                                <form class="form-horizontal" action="{{ url('index.php/userRegister') }}"
                                    method="post" id="SignUpform">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="hidden" name="programme"
                                                    value="{{ Request::segment(1) }}">
                                                <input type="text" id="CandidateName" name="name"
                                                    class="SignUpClass" placeholder="Full Name"
                                                    value="{{ old('name') }}">


                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">

                                                <input type="email" id="CandidateEmail" name="email"
                                                    placeholder="Email" class="SignUpClass"
                                                    value="{{ old('email') }}">

                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input class=" CCode SignUpClass" value="+91" id="txtCountryCode"
                                                    style="width: 30%;" placeholder="Country Code" />
                                                <input type="text" id="MobileNo" name="mobile"
                                                    style="width: 68%;" maxlength="10" placeholder="Mobile No"
                                                    class="SignUpClass" value="{{ old('mobile') }}">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="g-recaptcha"
                                                data-sitekey="6Le6JoYqAAAAANrJ2X_Lxbn1Qc1GPiW32X4tPl0V">
                                            </div>
                                        </div>


                                        <!-- <div class="col-sm-12">
                                            <div class="single-form">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAAyCAYAAAAZUZThAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAc7SURBVHhe7d0LUBR1HAfw40RKRZDQVApFExQEUUEhMXyHp+Zghm9GCFF5pqKS8VJkfCWO+YKUwQfNiILlZDaSM4Uv0kmjNBvzhFFyxDTHNykKxF6/u3b3dvf+e7d7u3v3/8z8Z7+zd/e/P/M/7rG7//9fhdm3+JqTyRBZVWy82x+iaJ7m9BkGEbOm6318P4QouF9/7JEA0cClR04gRLvi65qSBhEzx8vSgvchysbD11OCIFqkecOt2RAxC9W3uZIBEZOTO2c6j4CoKvfZOhEihlnfWNWF+RBZnW+s7Q6Rl6Pxv82FaCRk0PchEO2Gs09SKkSr61Yx3AEiZus2zw6bAFFwUX9OWg6RouhgnRdEqwpuyZPd12FMBBt9vOIgmpRy34vxRYrZH6fvPnsXojj6x25zh6goPZvu9YGIkVy7Ff8xRNm5kqseB5Fiq9bD8JtS0cp2FvSFyOpSbVAWRAwzS1b7skVzHI8ZHZYXTPOIdshfVzDzhBQFDIeItfo9uyEHonRWh41Jgmj37ngOnAlRdfrLsp4QMQXZWJb3NkTl2DWxzWCIspJ5+cE8iDZn7qCV0r/72qLAJwv8IIri89r0RRAFpdF6SP6O732w1xCImEwllu4bC1E5OsYM6AIRwzBLLArsxHnCLm3qtx9BFM3+zGJfiHYnLdud9UDCnLhsH4iYJY73yDf8GJZKW48Ezs68PTK2H0TJfOoeyeuTNaLoED4cLqZjnlciIJqjhaNwCly4dTFEueDVfonR20oumKVG3m6x9OsCU8ewFQqHeQn+EA18djU6QpSKyXajiLkXlwhRcPcbCvUDmJjaylRk5+Xmc24QrWrW2nbTIeqcy3sWD1E0ho6oa/FdotvzP3InEUVUvf2LhbjIjt5m0dttJkP7Og8opf8uILddXzAJGDpgj39NV90eY+ROIoqc0duqL3KD0j6U+2Dgrq/TeIiCQukElPugErIuOnrd5CI3KO0zeR/3iB+Ud9ZZrko07ehfnwicHQB0txfUeMRCtgT5+Syti45eN7lITrP7OnlYL2r7UO5j13yqGyWfQ4DcSbqOipzq8w6x5UubVxTWuqHUJRBynUyFL8rj4zO8nej7WAqrygNT+F4zh1w3H89nZdvNuJkVo9eIfk6NIGRHCVmXHlOdTPv4oD8etQjJqO7peYfwSEGZoXeSrqMsIGRdekz1kfeR9ysFvf1K/BtsnqWdxPR4SpnWVB2tz82p196AzAelPmIHYNsve8l/FBKj/xTbfpvm332p/hISSgfdvHemG7GTJ0od5OJy1IsYM8x4W2tBxfU4rttkS33+7KjWDe+2d42tE21CCswYvYNMdlJ1ciLqDz/Oeh+un70MIgrWelqRb2O6XY7obZak3U8dMl6DiDFA6qTQERcDIPJlsm5Epuoxdbsp9McblffqfdMZ9lNcGP5MNzdYmL8bcYjcFM66MOlROujJphOvEjsFRnmOIZpH5l63RamHZ0HB9DiUwqhu+xgXiGyQ6kE1I63KZieSDj17deiWyCjd9Ye+nRqtdpEsvYMs7iQWZj9H8JnCKGKb9PyUc+uGXg+fIkeybWNSReECiHaL3jlidpDJ57m/JFSI2dxNPo/MKK29ypH44BGfH7YUJWX1s1o3LZ7u6SuILRTZqOmVNAUiX+QXm6z+JhQ38q6JfrY73GkxHpyFQNEvJA62+ndhVkR/EaEWJKtGVURClAJrm0tu1JhzTkdsrO0VUklxB8H7ZMNfwXMg2hx6p6AWJbCozRo/j14QrQWpveWdj4g22cRc7xLi6zanbSmTzTo6Flt8Q3eARRIRBdtfgYhhqm3J0SMhytIRzUyb/cRRpJOqXJPvjJixZ/0yiGvjeKk61EZ5K3sNjVhJWSvh6wZ+YzmCjvsZnTA8/9/RL04Jqi2ynK4Uk7fwzVmMyyHIQnOmC+eSwgHqyvYQDaLWH0U+457bVD0JIrLJnqdYl2Tjku442uS8vTsuayVZAYqN1/y2Ruuy5H+lEXUxmPLlg+1vjImrm/tCiIK4+KJEDVE2Jiz7wqx/HKnN8HuKV9RloV0bx3t+5pjR+ZbMBcfP4Z2VlHcr5+afRJkpwl6U/PPNDIgYgvgpn/D6NEt9XOoNEcOoElY5vwVR0RISD3COG3dP2YT8bagh/8UAiOz2lx7AR20wswTXqxf8HRMt+kyFQknb/8tUiEZuVvaV4wlhTChuk/0pY25Sj4WLsi4Lir3Rp1IgGol+kjMQolVdWhrFb5aYvEx1DETJTa9aZvEl0odzd5l7oSJmozpqr3aAiEml1vW0YsY/NM1zxMteK4V69zrdWhhrRvU3dziuVa0bFxIEUVGKh/o5QFS0BwE7ekNEVn5x5zSIBvvu3upyuC6L91l/xWq/Jxxl/LZNcA08Id663yLIHrZF1JOWspTzOFS/VgWFRvvBmxBN2hFUaxPvatYWk7lX9LUdO/w8gZjuldP4pVU2er5LpfoXYK8/sNxuyOkAAAAASUVORK5CYII=" style="background: #dfdfdf; width: 28%; height: 40px; " alt="Image" />
                                                <input type="text" style="width: 70%;" class="md-input required SignUpClass" id="MathCaptchaAnswer" name="Captcha" placeholder="Enter Captcha  Code" required />
                                                <input type="hidden" id="HCapchaAns" value=6>
                                                <input type="hidden" id="hIntl" value="0">
                                            </div>
                                        </div> -->

                                        <div class="col-sm-12" style="border-width:1px;padding-top: 15px;">
                                            <!-- Single Form Start -->
                                            <div class="row">
                                                <div class="ui-checkbox-primary">
                                                    <div class="col-sm-1" style="padding:0px;">
                                                        <input type="checkbox" id="chkAgree" name="term_condition"
                                                            style="width:25px; height:25px; " checked>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <p class="small"
                                                            style="text-align:justify;font-size: 11px;line-height:34px;">
                                                            I authorize SAU to contact me with email.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->

                                            <div id="errormessages">


                                            </div>

                                            <div class="form-btn">
                                                <button class="btn-new2" type="submit"
                                                    id="BtnSignUp">Sign-Up</button>
                                                <br />
                                                <p style="color:#000;font-size: 14px;margin-top: 10px;">If existing
                                                    user -
                                                    <a href="http://admissions.sau.ac.in/index.php/SignIn"
                                                        style="color: black;background: #ffc107;font-weight: 600;border-radius: 20px;padding: 1px 10px;">Sign
                                                        In</a>
                                                </p>

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

    <script src="{{ asset('NewScript/vendor/modernizr-3.11.7.min.js') }}"></script>
    <script src="{{ asset('NewScript/popper.min.js') }}"></script>
    <script src="{{ asset('NewScript/bootstrap.min.js') }}"></script>
    <script src="{{ asset('NewScript/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('NewScript/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('NewScript/waypoints.min.js') }}"></script>
    <script src="{{ asset('NewScript/aos.js') }}"></script>
    <script src="{{ asset('NewScript/jquery.nice-select.min.js') }}"></script>


    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btnnew");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>




</body>

</html>
