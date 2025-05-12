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
                            <strong>Pay Registration Fee</strong>
                        </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Payment Instructions -->
                                    <div class="p-4">
                                        <div class="alert alert-info">
                                            <h6 class="fw-bold">Payment Instructions:</h6>
                                            <ul class="mb-0">
                                                <li>Ensure that your internet connection is stable before proceeding with payment.</li>
                                                <li>Do not refresh or close the browser window during the payment process.</li>
                                                <li>After successful payment, keep a screenshot or save the receipt for future reference.</li>
                                                <li>If the amount is deducted but the payment is not successful, verify with your bank before retrying.</li>
                                            </ul>
                                        </div>

                                        <table class="table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Programme Name</th>
                                                    <th>Course Name</th>
                                                    <th>Fee Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                    @php
                                                        // Calculate total fee amount
                                                        $totalFee = count($courses) * 1740;
                                                    @endphp

                                                    @foreach($courses as $course)
                                                        <tr>
                                                            <td data-label="Programme Name">{{ ucfirst($programme->programme) }}</td>
                                                            <td data-label="Course Name">{{ ucwords(str_replace('-', ' ', $course->course_name))}}</td>
                                                            <td data-label="Fee Amount">1740 /-</td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="2"><strong>Total Fee Amount</strong></td>
                                                        <td><strong>{{ $totalFee }} /-</strong></td>
                                                    </tr>
                                            </tbody>

                                        </table>
                                        <div class="col-12 mt-3">
                                        
                                            <button type="submit" class="btn btn-primary" id="payButton"> Pay Registration Fee</button>

                                        </div>
                                
                                        @if($payment_responses->isNotEmpty())       
                                                <table class="mt-4">
                                                    <tr class="bg-dark">
                                                        <th colspan="6" class="text-white fw-bold">Fee Payment Attempts</th>
                                                    </tr>
                                                    <tr class="bg-white">
                                                        <th colspan="6" class="text-danger fw-bold"> 
                                                            Note: Your previous payment attempts are listed below. If your payment was deducted but not successful, you can verify it with your bank before retrying.
                                                        </th>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Application No</th>
                                                            <th>Payment Mode</th>
                                                            <th>Fee Amount</th>
                                                            <th>Transaction ID</th>
                                                            <th>Status</th>
                                                            <th>Txn Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($payment_responses as $payment_response)
                                                            
                                                        @php
                                                            $paymentData = json_decode($payment_response->payment_response, true);
                                                            $ReferenceNo = $paymentData['ReferenceNo'] ?? 'N/A';
                                                            $mandatoryFields = $paymentData['mandatory_fields'] ?? '';
                                                            $mandatoryFieldsArray = explode('|', $mandatoryFields);
                                                            $feeAmount = $mandatoryFieldsArray[2] ?? 'N/A';
                                                        @endphp
                                                        <tr>
                                                                <td data-label="Application No">D{{ str_pad((100000+Auth::id()), 6, '0', STR_PAD_LEFT) }}</td>
                                                                <td data-label="Payment Mode">Online</td>
                                                                <td data-label="Fee Amount">{{$feeAmount}}</td>
                                                                <td data-label="Transaction ID">{{ $ReferenceNo }}</td>
                                                                <td data-label="Status">
                                                                    <span class="text-success">{{ $payment_response->payment }}</span>
                                                                </td>
                                                                <td data-label="Txn Date">{{ $payment_response->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                               
                                    </div>
                                </div>
                            </div>
                    </div>
                </main>
            </div>
        </div>

    

        <script>
                                    document.getElementById("payButton").onclick = function() {
                                        // Make an AJAX request to get the encrypted payment URL
                                        fetch("https://admissions.sau.ac.in/panel/sau-generate-payment-url")
                                            .then(response => response.json())
                                            .then(data => {
                                                window.location.href = data.url;
                                            })
                                            .catch(error => console.error("Error generating payment URL:", error));
                                    };
                            </script>
@endsection
