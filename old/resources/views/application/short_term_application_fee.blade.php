@extends('layouts.main')
@section('content')
    <style>
        .align-right {
            float: right;
        }

        .jumbo-padding {
            padding: 20px 25px !important;
        }

        #content {
            margin-top: 100px;

        }

        .content {
            background: #fff;
            padding: 2rem;
            margin-bottom: 40px;

        }

        .badge {
            background: none;
            font-size: 1.5rem;
            color: #000;

        }

        .payment-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <div class="content-container p-5 bg-light" id="content">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('warning'))
                <div class="alert alert-danger">{{ Session::get('warning') }} </div>
            @endif


            <div class="content">
                <div class="page-header">
                    <h2>Short-Term Courses – Online</h2>
                    <h5>Type: Certificate Courses</h5>
                    <h5>Duration: 3 Months</h5>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5 style="padding: 2rem 1rem; background-color: #fd516e; color: #fff;">Eligibility:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <!-- <span class="badge">14</span> -->
                                <p>Students pursuing bachelor’s degree and above
                                <p>
                            </li>
                            <li class="list-group-item">
                                <p>Working professionals</p>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-6">

                        <h5 class="bg-primary" style="padding: 2rem 1rem;">Programme Fee:</h5>
                        <ul class="list-group">
                            @if ($admission_office->concession == 'inservice_faculty')
                                <li class="list-group-item">
                                    <p>25% Concession for In-service faculty members of SAARC nations.
                                        (<strong>₹7,470/-</strong>)</p>
                                </li>
                                <li class="list-group-item">
                                    <p> ₹7,470 per course
                                    <p>
                                </li>
                            @elseif($admission_office->concession == 'sau_alumni')
                                <li class="list-group-item">
                                    <p>25% Concession for SAU alumni.
                                        (<strong>₹7,470/-</strong>)</p>
                                </li>
                                <li class="list-group-item">
                                    <p> ₹7,470 per course
                                    <p>
                                </li>
                            @elseif($admission_office->concession == 'sau_students')
                                <li class="list-group-item">
                                    <p>50% Concession for SAU Students(<strong>₹4,980/-</strong>)</p>
                                </li>
                                <li class="list-group-item">
                                    <p> ₹4,980 per course
                                    <p>
                                </li>
                            @elseif($admission_office->concession == 'full_payment')
                                <li class="list-group-item">
                                    <p>Course Fee(<strong>₹9,960/-</strong>)</p>
                                </li>
                                <li class="list-group-item">
                                    <p> ₹9,960 per course
                                    <p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @if (!isset($applicationFee->payment) || $applicationFee->payment != 'Success')
                    <button type="button" class="btn btn-primary text-right" id="payButton">Pay Now</button>
                @endif


                <script>
                    document.getElementById("payButton").onclick = function() {
                        // Make an AJAX request to get the encrypted payment URL
                        fetch("{{ route('short.payment.url') }}")
                            .then(response => response.json())
                            .then(data => {
                                window.location.href = data.url;
                            })
                            .catch(error => console.error("Error generating payment URL:", error));
                    };
                </script>




                <!-- This box will appear after payment proccess successful or failure  -->

                @if ($applicationFee)
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <h5 style="padding: 2rem 1rem; background-color: #f08f77; color: #fff;">Payment Status:</h5>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item payment-section">
                                    <strong>Payment Status</strong>
                                    @if ($applicationFee->payment == 'Failed')
                                        <span class="label label-danger">Failed</span>
                                    @else
                                        <span class="label label-success">Success</span>
                                    @endif
                                </li>
                                <li class="list-group-item payment-section">
                                    <strong>Transaction ID</strong>
                                    <span>{{ $applicationFee->reference_no }}</span>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item payment-section">
                                    <strong>Transaction Date</strong>
                                    <span>{{ $applicationFee->created_at }}</span>
                                </li>
                                <li class="list-group-item payment-section">
                                    <strong>Transaction Amount</strong>
                                    <span>{{ $applicationFee->amount }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
