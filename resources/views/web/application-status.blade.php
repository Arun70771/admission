@extends('web.layouts.main')
@section('content')

        <div class="container mb-4">
                @include('web.include.loggedin')
            <div class="row">
                <!-- Sidebar -->
                
                @include('web.include.nav')

                <!-- Main Content -->
                <main class="col-md-8 ms-sm-auto col-lg-9 ps-md-4 mt-4">
                    <div class="card">
                        <div class="card-header fs-6 text-white">
                            <strong>Preview of Uploaded Documents</strong>
                        </div>
                        <div class="p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Step</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Application Form Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Application Form 
                                                </td>
                                                <td data-label="Status">
                                                    <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->application_form == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->application_form == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>

                                            <!-- Choose Programme and Course Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Choose Programme and Course
                                                </td>
                                                
                                               

                                                <td data-label="Status">
                                                    <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->programme_course == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->programme_course == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>

                                            <!-- Mode of Admission Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Modes of Admission
                                                </td>
                                                <td data-label="Status">
                                                    <i
                                                    class="bi bi-check-circle-fill @if($step_status && $step_status->mode_admission == 1) text-success @else text-danger @endif fw-bold"                                                    ></i>
                                                    @if($step_status && $step_status->mode_admission == 1) Completed @else Not Completed @endif
                                                    </i>
                                                </td>
                                            </tr>

                                            <!-- Educational Details Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Educational Details
                                                </td>
                                                <td data-label="Status">
                                                    <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->educational_details == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->educational_details == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>

                                            <!-- Upload Documents Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Upload Documents
                                                </td>
                                                <td data-label="Status">
                                                <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->upload_documents == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->upload_documents == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>

                                            <!-- Preview & Final Submit Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Preview & Final Submit
                                                </td>
                                                <td data-label="Status">
                                                <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->preview_finalsubmit == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->preview_finalsubmit == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>

                                            <!-- Pay Registration Fee Step -->
                                            <tr>
                                                <td
                                                    scope="row"
                                                    data-label="Step"
                                                >
                                                    Pay Registration Fee
                                                </td>
                                                <td data-label="Status">
                                                <i
                                                        class="bi bi-check-circle-fill @if($step_status && $step_status->pay_fee == 1) text-success @else text-danger @endif fw-bold"
                                                    ></i>
                                                    @if($step_status && $step_status->pay_fee == 1) Completed @else Not Completed @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 30px">
                                <h5 style="color: #28a745">
                                    Registration Successful!
                                </h5>
                                <p style="font-size: 16px">
                                    Thank you for registering with us. Your
                                    registration has been successfully
                                    completed.
                                </p>
                                <p
                                    style="
                                        font-size: 16px;
                                        color: #007bff;
                                    "
                                >
                                    Please note down your
                                    Registration Number for
                                    future reference:
                                </p>
                                <p
                                    style="
                                        font-size: 20px;
                                        color: #007bff;
                                    "
                                >                                    Registration Number:
                                    <strong class="text-danger"
                                        >D{{ str_pad((100000+Auth::id()), 6, '0', STR_PAD_LEFT) }}</strong
                                    >
                                </p>
                                @if(empty($step_status) || $step_status->payment_complate !="1")
                                    <h4 style="font-size: 1.3rem;" class="text-danger">
                                        Kindly fill out the remaining fields in the
                                        form to complete your registration process.
                                    </h4>
                                @endif 
                            </div>
                            <div class="col-12 text-center mt-3">
                                
                          
                            @if (!$step_status || $step_status->preview_finalsubmit != 1)
                                <a href="{{ route('application-form') }}" class="btn btn-info">
                                    Application Form
                                </a>
                            @elseif (!$step_status || $step_status->pay_fee == 0)
                                <a href="{{ route('index.payment') }}" class="btn btn-info">
                                    Registration Fee
                                </a>
                            @elseif ($step_status && $step_status->payment_complate == 1)
                                <a href="{{ route('application-pdf') }}" class="btn btn-success" target="_blank">
                                    Download Application Pdf
                                </a>
                            @else
                                <p class="text-muted">All steps completed or no action required.</p>
                            @endif




                                @if(!$step_status || $step_status->payment_complate == 1)
                                
                                <table class="mt-4">
                                            <tbody><tr class="bg-dark">
                                                <th colspan="6" class="text-white fw-bold">Fee Payment</th>
                                            </tr>
                                            <!--tr class="bg-white">
                                                <th colspan="6" class="text-danger fw-bold"> Note: .</th>
                                            </tr-->
                                        </tbody></table>
                             

                                        @php
                                        $paymentArray = json_decode($payment_response, true);

                                        if ($paymentArray && isset($paymentArray['payment_response'])) {
                                            $response = json_decode($paymentArray['payment_response'], true);

                                            if (isset($response['mandatory_fields'])) {
                                                $mandatory_fields = $response['mandatory_fields'];

                                                if (!empty($mandatory_fields)) {
                                                    $mandatory_parts = explode("|", $mandatory_fields);

                                                    if (isset($mandatory_parts[2])) {
                                                        $amount = $mandatory_parts[2];
                                                    } else {
                                                        $amount = null;
                                                    }
                                                } else {
                                                    $amount = null; 
                                                }
                                            } else {
                                                $amount = null; // Or some default value or error message
                                            }
                                        } else {
                                            $amount = null; // Or some default value or error message
                                        }
                                    @endphp


                                            @if ($paymentArray && isset($paymentArray['payment_response'])) 
                                            <table>
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Transaction ID</th>
                                                                <th scope="col">Transaction Amount</th>
                                                                <th scope="col">Transaction Status</th>
                                                                <th scope="col">Transaction Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td> {{ $payment_response->tracking_id }} </td>
                                                                    <td> ₹{{$amount}}</td>
                                                                    <td>{{ $payment_response->payment }}</td>
                                                                    <td>{{ $payment_response->created_at }}</td> 
                                                                </tr>
                                                        </tbody>
                                                    </table>

                                            @endif   


                                @endif    


                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

@endsection