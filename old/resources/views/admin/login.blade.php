<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
     <meta name="robots" content="noindex, nofollow">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title> Admissions 2024-25 </title>

    <!-- Favicon -->
    <link rel="icon" href="https://scrs.in/admin/assets/img/brand/favicon.png" type="image/x-icon"/>

    <!-- Icons css -->
    <link href="https://scrs.in/admin/assets/plugins/icons/icons.css" rel="stylesheet">

    <!--  bootstrap css-->
    <link href="https://scrs.in/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    
    <!-- P-scroll bar css-->
    <link href="https://scrs.in/admin/assets/plugins/perfect-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!--- Style css --->
    <link href="https://scrs.in/admin/assets/css/style.css" rel="stylesheet">
    <link href="https://scrs.in/admin/assets/css/style-dark.css" rel="stylesheet">
    <link href="https://scrs.in/admin/assets/css/style-transparent.css" rel="stylesheet">    
</head>
<body class="ltr error-page1">
		
    <div class="bg-primary">

        <div id="global-loader">
            <img src="https://scrs.in/admin/assets/img/loader.svg" class="loader-img" alt="Loader">
        </div>

        <div class="page" >
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-45 justify-content-center">
                            <div class="card-sigin mt-5 mt-md-0">
                                <!-- Demo content-->
                                <div class="main-card-signin d-md-flex">
                                    <div class="wd-100p"><div class="d-flex mb-6">
                                        <a href="{{url('/')}}"><img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif" class="sign-favicon ht-100" alt="logo"></a></div>
                                        <div class="">
                                            <div class="col-12">
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach         
                                                    </ul>
                                                </div>
                                                @endif 
                                                @if(Session::has('message'))
                                                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                                                @endif
                                            </div>
                                        
                                            <div class="main-signup-header">
                                                <div class="panel panel-primary">
                                                <div class="panel-body tabs-menu-body border-0 p-3">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab5">
                                                            <form action="{{url('admin/login-panel')}}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Email </label> 
                                                                    <input class="form-control" placeholder="Enter email" name="email" type="text" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label> 
                                                                    <input class="form-control" placeholder="Enter password" name="password" type="password" required>
                                                                </div>
                                                                <input type="submit" class="btn btn-primary btn-block" value="Sign In">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery min js -->
    <script src="https://scrs.in/admin/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap js -->
    <script src="https://scrs.in/admin/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="https://scrs.in/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Ionicons js -->
    <script src="https://scrs.in/admin/assets/plugins/ionicons/ionicons.js"></script>

    <!-- eva-icons js -->
    <script src="https://scrs.in/admin/assets/plugins/eva-icons/eva-icons.min.js"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="https://scrs.in/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   
    <!-- CUSTOM JS -->
    <script src="https://scrs.in/admin/assets/js/custom.js"></script>

</body>

</html>
