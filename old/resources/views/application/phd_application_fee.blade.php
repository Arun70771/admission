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
            <div class="content">
                <div class="page-header">
                    <h2>PhD Degree Programme Application Fee</h2>
                    <!-- <h5>Type: Certificate Courses</h5>
                    <h5>Duration: Each course is of 3 months</h5> -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-danger text-bold" style="margin-bottom: 1rem">
                        <p class="text-bold" style="font-size: 2rem">Note: Final payment should only be made by those who have
                            received the official offer letter. Only individuals who are eligible for the program will
                            receive the offer letter.</p>
                    </div>
                   <!-- <div class="col-md-6">
                        <h5 style="padding: 2rem 1rem; background-color: #fd516e; color: #fff;">Eligibility:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <p>PhD Degree Programme Application Fee</p>
                            </li>
                            
                        </ul>
                    </div>
                     <div class="col-md-6">
                        <h5 class="bg-primary" style="padding: 2rem 1rem;">Programme Fee:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                               
                                <p>Course Fee – USD 550 / INR 45,600 (per semester)
                                <p>
                            </li>
                            <li class="list-group-item">
                                <p>Admission Fee – USD 200 / INR 17,600 (One time)</p>
                            </li>
                            <li class="list-group-item">
                                <p>Student Aid Fund – USD 10 / INR 830 (per semester)</p>
                            </li>
                            <li class="list-group-item">
                                @if ($admission_office->concession != 'full_payment_ms')
                                    <del>Total Fee: USD 760 / INR 64,030 (per semester)</del>
                                @endif


                                @if ($admission_office->concession == 'inservice_faculty_ms')
                                    In-service faculty members of SAARC nations <strong>(INR 52,630/-)</strong>
                                @elseif($admission_office->concession == 'sau_students_alumni_ms')
                                    SAU students and alumni <strong>(INR 52,630/-)</strong>
                                @elseif($admission_office->concession == 'full_payment_ms')
                                    <p>Total Fee: USD 760 / INR 64,030 (per semester)</p>
                                @endif

                            </li>
                        </ul>
                    </div> -->
                </div>


                @if (!isset($applicationFee->payment) || $applicationFee->payment != 'Success')
                    <button type="button" class="btn btn-primary text-right" id="payButton">Pay Now</button>
                @endif


                <script>
                    document.getElementById("payButton").onclick = function() {
                        // Make an AJAX request to get the encrypted payment URL
                        fetch("{{ route('phd.payment.url') }}")
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
                                        <span class="label label-success">Success </span>
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
