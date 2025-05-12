@extends('web.layouts.main')
@section('content')

        <div class="container mb-4">
            @include('web.include.loggedin')
            <div class="row">
                <!-- Sidebar -->
                @include('web.include.nav')

                <!-- Main Content -->
                <main class="col-md-8 ms-sm-auto col-lg-9 ps-md-4 mt-4">

                    @include('web.include.error')
    
                   
                                        

                        <div class="card">
                        
    
                            <div class="card-header fs-6 text-white">
                                <strong>Courses fee</strong>
                            </div>


                            <!---------------------------------------------HTML------------------------------------------------------------->

        <div class="page-header" style="padding:15px">
            <h4>MS (Data Science and Artificial Intelligence) – Online</h4>
            <h5>Type: Certificate Courses</h5>
            <h5>Duration: Each course is of 3 months</h5>
        </div>

        <div class="row"  style="padding:15px">
            <div class="col-md-12 text-danger text-bold" style="margin-bottom: 1rem">
                <p class="text-bold" style="font-size: 1rem">Note: Final payment should only be made by those who have
                    received the official offer letter. Only individuals who are eligible for the program will
                    receive the offer letter.</p>
            </div>
            <div class="col-md-6">
                <h5 style="padding: 2rem 1rem; background-color: #fd516e; color: #fff;">Eligibility:</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <!-- <span class="badge">14</span> -->
                        <p>B.Tech./B.E. in any branch
                        </p><p>
                    </p></li>
                    <li class="list-group-item">
                        <p>UG in any subject with a minimum of two courses in mathematics</p>
                    </li>
                    <li class="list-group-item">
                        <p>M.Sc./ MS in any subject with a minimum of two courses in mathematics at UG or PG level
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>MCA</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5 class="bg-primary" style="padding: 2rem 1rem;">Programme Fee:</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <!-- <span class="badge">14</span> -->
                        <p>Course Fee – USD 550 / INR 45,600 (per semester)
                        </p><p>
                    </p></li>
                    <li class="list-group-item">
                        <p>Admission Fee – USD 200 / INR 17,600 (One time)</p>
                    </li>
                    <li class="list-group-item">
                        <p>Student Aid Fund – USD 10 / INR 830 (per semester)</p>
                    </li>
                    <li class="list-group-item">
                        

                                                            <p>Total Fee: USD 760 / INR 64,030 (per semester)</p>
                        
                    </li>
                </ul>
            </div>
        </div>


        

   

        <!-- This box will appear after payment proccess successful or failure  -->
                            <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                    <h5 style="padding: 2rem 1rem; background-color: #f08f77; color: #fff;">Payment Status:</h5>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item payment-section">
                            <strong>Payment Status</strong>
                                                                    <span class="label label-success">Success </span>
                                                            </li>
                        <li class="list-group-item payment-section">
                            <strong>Transaction ID</strong>
                            <span>467004</span>
                        </li>

                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item payment-section">
                            <strong>Transaction Date</strong>
                            <span>2024-12-05 17:59:05</span>
                        </li>
                        <li class="list-group-item payment-section">
                            <strong>Transaction Amount</strong>
                            <span>64030</span>
                        </li>
                    </ul>
                </div>
            </div>
      
<!---------------------------------------------HTML -------------------------------------------------------------->

    
                                  
                        </div>
                    </main>
            </div>
        </div>
@endsection
