<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $applications_form->candidate_name }} Application - Form </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        p{
            text-transform: capitalize;
        }
        .wrapper {
            width: 100%;
            margin: auto;
            transform: scale(0.95, 0.98);
            /* padding: 2rem; */
        }

        .header-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
            padding: 10px 0;
            border-bottom: 2px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        table, th, td {
            border: 1px solid #b9b9b9;
        }
        th, td {
            text-align: left;
            font-size: 12px;
            padding: 6px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            width: 100px;
            height: auto;
            border: 1px solid#dddddd;
        }
        .bg-color {
            background-color: #0e4c92 !important; /* Ensure background colors stay */
            color: white !important;
        }

        h5 {
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .instruction{
            margin: 2rem 0;
        }

        .instruction ol{
            list-style: decimal;
            margin-left: 2rem;
        }

        .instruction li{
            margin: 0.5rem 0;
            list-style: decimal;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact; /* For Safari/Chrome */
                print-color-adjust: exact; /* Standard */
            }
        }

        @media print {
            body {
                color: black; /* Ensure text prints clearly */
                background-color: white; /* Ensure backgrounds don't disappear */
                padding-top: 50px; /* Adjust based on header height */
                padding-bottom: 50px;
            }
            
            table {
                border-collapse: collapse;
                width: 100%;
            }

            table, td, th {
                border: 1px solid #a4a4a4; /* Ensure table borders are visible */
                text-transform: uppercase;
            }

            .bg-color {
                background-color: #0e4c92 !important; /* Ensure background colors stay */
                color: white !important;
            }

            /* Hide unnecessary elements in print */
            .no-print {
                display: none !important;
            }

            @page {
                size: A4; /* Set page size */
                margin: 5mm 2mm; /* Adjust margins to avoid overlap */
            }

            /* Footer */
            .print-footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                font-size: 12px;
                display: flex;
                justify-content: space-between;;
            }
        }

    </style>
</head>
<body>
    <div class="wrapper">
            <table style="border-bottom: 2px solid #00408D; border-top: none; border-left: none; border-right: none;">
                <tr style="border: none">
                    <td style="border: none;"><img src="{{ public_path('web/images/sau-logo-vertical.png') }}" alt="sau Logo" style="height: 80px;"></td>
                    <td style="width: 90%; border: none">
                        <div style="text-align: center;">
                            <h3 style="margin: 0; font-size: 24px; font-weight: bold;">SOUTH ASIAN UNIVERSITY</h3>
                            <p style="margin: 5px 0; font-size: 14px; font-weight: bold;">
                                (A University established by SAARC Nations)
                            </p>
                            <p style="margin: 0; font-size: 14px; font-weight: bold;">
                                Rajpur Road, Maidan Garhi, New Delhi 110068
                            </p>
                        </div>
                    </td>
                    <td style="border: none"><img src="{{ public_path('web/images/saarc_logo.png') }}" alt="saarc Logo" style="height: 80px;"></td>
                </tr>
            </table>

            <table style="border: none;">
                <tr>
                    <td style="text-align: right; border: none;">
                        <p><strong>Date: {{ \Carbon\Carbon::parse($applications_form->created_at)->format('d-m-Y') }}</strong></p>
                    </td>
                </tr>
            </table>
        

            <table style="width: 100%; border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td colspan="5"><h5>Personal Details</h5></td>
                </tr>
                <tr>
                    <td><strong>Registration No.</strong></td>
                    <td>D{{ str_pad((100000+Auth::id()), 6, '0', STR_PAD_LEFT) }}</td>
                    <td><strong>Name of the Candidate</strong></td>
                    <td>{{ $applications_form->candidate_name ?? '' }}</td>
                    <!-- Image column spanning all rows -->
                    <td rowspan="4" style="text-align: center; padding: 2.5px 5px;">
                        <img src="{{ public_path($passport_photograph) }}" style="height: 120px; width: auto; margin-bottom: 5px;" alt="Candidate Photo">
                        <br>
                        <img style="height: 40px; display: block; margin: auto;" 
                        src="{{ public_path($signatures) }}" 
                             alt="Signature">
                    </td>
                </tr>
                <tr>
                    <td><strong>Father Name / Mother Name / Guardian’s Name</strong></td>
                    <td>{{ $applications_form->father_name }}</td>   
                    <td><strong>Gender</strong></td>
                    <td>{{ $applications_form->gender }}</td>
                </tr>
                <tr>
                    <td><strong>Date of Birth</strong></td>
                    <td>{{ $applications_form->dob }}</td>
                    <td><strong>Nationality</strong></td>
                    <td>{{ $applications_form->nationality }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $registration_form->email }}</td>
                    <td><strong>Mobile No.</strong></td>
                    <td>{{ $registration_form->mobile }}</td>
                </tr>
                <!-- Empty row at the bottom -->
                <!-- <tr>
                    <td colspan="5" style="height: 20px;"></td>
                </tr> -->
            </table> 

            <table  border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td colspan="6"><h5>Academic Qualification Details</h5></td>
                </tr>
                <tr>
                    <td><strong>Name of the Degree</strong></td>
                    <td width="15%">10th</td>
                    <td><strong>Name of the Board</strong></td>
                    <td>{{ $educational_detail->board_10th }}</td>
                    <td><strong>Percentage</strong></td>
                    <td width="10%">{{ $educational_detail->marks_10th }}</td>
                </tr>
                <tr>
                    <td><strong>Name of the Degree</strong></td>
                    <td width="15%">12th</td>
                    <td><strong>Name of the Board</strong></td>
                    <td>{{ $educational_detail->board_12th }}</td>
                    <td><strong>Percentage</strong></td>
                    <td width="10%">{{ $educational_detail->marks_12th }}</td>
                </tr>

                @if($programme->programme=='masters' || $programme->programme=='phd' || $programme->programme=='executivePhd')  

                    <tr>
                        <td><strong>Name of the Degree</strong></td>
                        <td width="15%">Bachelors</td>
                        <td><strong>Name of the Board/University</strong></td>
                        <td>{{ $educational_detail->board_bachelors }}</td>
                        <td><strong>Percentage</strong></td>
                        <td width="10%">{{ $educational_detail->marks_bachelors }}</td>
                    </tr>
                @endif
                @if($programme->programme=='phd' || $programme->programme=='executivePhd')

                    <tr>
                        <td><strong>Name of the Degree</strong></td>
                        <td width="15%">Masters</td>
                        <td><strong>Name of the Board/University</strong></td>
                        <td>{{ $educational_detail->board_masters }}</td>
                        <td><strong>Percentage</strong></td>
                        <td width="10%">{{ $educational_detail->marks_masters }}</td>
                    </tr>
                @endif
            </table>
    
            <table  border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td colspan="4"><h5>Applied For Programme</h5></td>
                </tr>
                <tr>
                    <td width="10%"><strong>SNO.</strong></td>
                    <td width="30%"><strong>Programme Name</strong></td>
                    <td width="30%"><strong>Mode of Admission</strong></td>
                    <td width="30%"><strong>Course Name</strong></td>
                </tr>
                @foreach($course as $key => $courses)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ ucfirst($programme->programme) }}</td>
                    <td>{{$mode_admission->mode_of_admission}}</td>
                    <td>{{ $courses->course_name }}</td>
                </tr>
                @endforeach
            </table>
        
            <!-- <table  border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td colspan="2"><h5>Contact Details</h5></td>
                </tr>
                <tr>
                    <td width="40%"><strong>House No./Street Name</strong></td>
                    <td width="60%">{{ $applications_form->correspondence_house }}</td>
                </tr>
                <tr>
                    <td><strong>City/Town/Village</strong></td>
                    <td>{{ $applications_form->correspondence_city }}</td>
                </tr>
                <tr>
                    <td><strong>District</strong></td>
                    <td>{{ $applications_form->correspondence_district }}</td>
                </tr>
                
                <tr>
                    <td><strong>State</strong></td>
                    <td>{{ $applications_form->correspondence_state }}</td>
                </tr>
                <tr>
                    <td><strong>PIN/ZIP Code</strong></td>
                    <td>{{ $applications_form->correspondence_zip }}</td>
                </tr>
                <tr>
                    <td><strong>Country</strong></td>
                    <td>{{ $applications_form->correspondence_country }}</td>
                </tr>
            </table> -->

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
                    <table  border-collapse: collapse;" border="1">
                        <tr class="bg-color">
                            <td colspan="4"><h5>Fee Payment Details</h5></td>
                        </tr>
                        <tr>
                            <td width="30%"><strong>Transaction ID</strong></td>
                            <td width="30%"><strong>Transaction Amount</strong></td>
                            <td width="30%"><strong>Transaction Status</strong></td>
                            <td width="30%"><strong>Transaction Date</strong></td>
                        </tr>
                        <tr>
                            <td>  {{ $payment_response->tracking_id }} </td>
                            <td>INR {{$amount}} </td>
                            <td> {{ $payment_response->payment }} </td>
                            <td> {{ $payment_response->created_at }}</td>
                        </tr>
                    </table>
                @endif    

            <table  border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td colspan="3"><h5>Uploaded Documents</h5></td>
                </tr>
                @foreach($document_upload as $key => $document)
                <tr>
                    <td colspan="3">{{ucwords(str_replace('_', ' ', $document->document_type))}}</td>
                </tr>
                @endforeach 

            </table>
            <table  border-collapse: collapse;" border="1">
                <tr class="bg-color">
                    <td><h5>Declaration</h5></td>
                </tr>
                <tr>
                    <td>I hereby declare that the information furnished by me is correct to the best of my knowledge and belief. Further, I have gone through the Modes of Admission and the eligibility criteria of the programme(s) that i am applying for.</td>
                </tr>
            </table>
    </div>
</body>
</html>
