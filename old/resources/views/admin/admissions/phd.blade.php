@extends('admin.layouts.main')
@section('mid-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
        }

        .nav-tabs .nav-link {
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 0 0 8px 8px;
            background-color: #fff;
        }

        th {
            background-color: #007bff;
            text-align: center;
        }
    </style>


    <!-- main-content -->
    <div class="main-content horizontal-content">

        <!-- container -->
        <div class="main-container container">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Admissions</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Admissions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->


            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">

                        @if(isset($total_final_payment))
                            <h3 style="margin-left: 1rem; margin-top: 1rem;">
                                Total final payments - {{$total_final_payment}}
                            </h3>
                        @endif
                        
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs justify-content-center" id="paymentTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid"
                                    type="button" role="tab" aria-controls="paid" aria-selected="true">
                                    Paid List
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="unpaid-tab" data-bs-toggle="tab" data-bs-target="#unpaid"
                                    type="button" role="tab" aria-controls="unpaid" aria-selected="false">
                                    Unpaid List
                                </button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="paymentTabsContent">

                            <!-- Paid List -->
                            <div class="tab-pane fade show active" id="paid" role="tabpanel"
                                aria-labelledby="paid-tab">
                                <div class="table-responsive ">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="#" class="download-btn btn-primary"
                                            onclick="downloadTable('paidTable', 'paidTable.csv')">Download CSV</a>
                                    </div>


                                    <table id="paidTable"
                                        class="table table-striped table-bordered dataTables_wrapper dt-bootstrap5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Programme</th>
                                                <th>Payment</th>
                                                <th>Offer Letter Status </th>
                                                <th> Criteria </th>
                                                <th> Level 1 </th>
                                                <th> Level 2</th>
                                                <th>Nationality </th>
                                                <th>Name </th>
                                                <th>Email</th>
                                                <th> Mobile</th>
                                                <th> Final payment </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($paids as $key => $paid)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    @if($paid->programme == 'Masters')
                                                        <td>Online MS Programmes in Data Science and Artificial Intelligence</td>
                                                    @elseif($paid->programme == 'PhD')
                                                       <td>{{$paid->Phd_programmes}}</td>
                                                    @elseif($paid->programme == 'short_term')
                                                        <td>{{$paid->short_term_programmes}}</td>
                                                    @endif
                                                    
                                                    <td>
                                                        <?php
                                                        $response = json_decode($paid->payment_response, true);
                                                        
                                                        if (json_last_error() === JSON_ERROR_NONE) {
                                                            if (isset($response['Response_Code'])) {
                                                                $responseCode = $response['Response_Code'];
                                                                if ($responseCode == 'E000' || $responseCode == 'E006') {
                                                                    echo 'Success';
                                                                } else {
                                                                    echo 'Failed';
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        @if ($paid->concession)
                                                            @if ($paid->offer_mail >= '1')
                                                                <i class="fas fa-check-circle" style="color: green;"></i>
                                                            @else
                                                                <i class="fas fa-times-circle" style="color: red;"></i>
                                                            @endif
                                                        @endif
                                                    </td>

                                                    <td>{{ $paid->criteria }}</td>
                                                    <td>
                                                        @if ($paid->check_level_1 == 1)
                                                            <i class="fas fa-check-circle" style="color: green;"></i>
                                                        @else
                                                            <i class="fas fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($paid->check_level_1 == 1)
                                                            <input type="checkbox" class="demoCheckbox"
                                                                data-id="{{ $paid->id }}" name="check_level_2"
                                                                value="{{ $paid->check_level_2 }}"
                                                                {{ $paid->check_level_2 == 1 ? 'checked' : '' }}>
                                                        @endif

                                                    </td>


                                                    @php
                                                        $nationalities = [
                                                            91 => 'India',
                                                            977 => 'Nepal',
                                                            93 => 'Afghanistan',
                                                            880 => 'Bangladesh',
                                                            92 => 'Pakistan',
                                                            374 => 'Armenia',
                                                            975 => 'Bhutan',
                                                            39 => 'Italy',
                                                        ];
                                                        $country =
                                                            $nationalities[$paid->nationality] ?? $paid->nationality;
                                                    @endphp

                                                    <td>{{ $country }}</td>
                                                    <td>{{ $paid->name }} </td>
                                                    <td>{{ $paid->email }}</td>
                                                    <td> {{ $paid->mobile }}</td>
                                                    <td>
                                                        @if($paid->application_fee_status == "Success")
                                                            <i class="fas fa-check-circle" style="color: green;"></i>
                                                        @else
                                                            <i class="fas fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td>


                                                        <a href="https://admissions.sau.ac.in/index.php/generate-pdf/{{ $paid->id }}"
                                                            data-bs-toggle="tooltip" title="Generate Registration Form">
                                                            <button class="btn">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </button>
                                                        </a>

                                                        <a href="https://admissions.sau.ac.in/index.php/admin/documents/{{ $paid->id }}"
                                                            data-bs-toggle="tooltip" title="View Documents">
                                                            <button class="btn btn-danger">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </a>

                                                        @if (true)
                                                            @if ($paid->offer_mail == '1')
                                                                <button class="btn btn-sucess send-offer-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#sendOfferModal"
                                                                    title="Send Offer" data-id="{{ $paid->id }}">
                                                                    <i class="fas fa-paper-plane"></i>
                                                                    Sent
                                                                </button>
                                                            @else
                                                                <button class="btn btn-danger send-offer-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#sendOfferModal"
                                                                    title="Send Offer" data-id="{{ $paid->id }}">
                                                                    <i class="fas fa-paper-plane"></i>
                                                                    Send
                                                                </button>
                                                            @endif
                                                        @endif


                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <!-- Unpaid List -->
                            <div class="tab-pane fade" id="unpaid" role="tabpanel" aria-labelledby="unpaid-tab">
                                <div class="table-responsive">

                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="#" class="download-btn"
                                            onclick="downloadTable('unpaidTable', 'unpaidTable.csv')">Download</a>
                                    </div>

                                    <table id="unpaidTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Payment</th>
                                                <th> Tracking id </th>
                                                <th>Step </th>
                                                <th>Saarc</th>
                                                <th>Nationality </th>
                                                <th>Name </th>
                                                <th>Email</th>
                                                <th> Mobile</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($unpaids as $key => $unpaid)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <?php
                                                        $response = json_decode($unpaid->payment_response, true);
                                                        
                                                        if (json_last_error() === JSON_ERROR_NONE) {
                                                            if (isset($response['Response_Code'])) {
                                                                $responseCode = $response['Response_Code'];
                                                                if ($responseCode == 'E000') {
                                                                    echo 'sccusss';
                                                                } else {
                                                                    echo 'Faild';
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                    <td> {{ $unpaid->tracking_id }} </td>
                                                    <td>{{ $unpaid->step }} </td>
                                                    <td>{{ $unpaid->saarc }}</td>
                                                    <td>{{ $unpaid->nationality }}</td>
                                                    <td>{{ $unpaid->name }} </td>
                                                    <td>{{ $unpaid->email }}</td>
                                                    <td> {{ $unpaid->mobile }}</td>
                                                    <td> <a
                                                            href="https://admissions.sau.ac.in/index.php/generate-pdf/{{ $unpaid->id }}">
                                                            <button class="btn">Reg. Form</button> </a>
                                                        <a
                                                            href="https://admissions.sau.ac.in/index.php/admin/documents/{{ $unpaid->id }}">
                                                            <button class="btn btn-danger">View</button> </a>

                                                        @if ($unpaid->concession)
                                                            <button class="btn btn-danger send-offer-btn"
                                                                data-bs-toggle="modal" data-bs-target="#sendOfferModal"
                                                                title="Send Offer" data-id="{{ $unpaid->id }}">
                                                                <i class="fas fa-paper-plane"></i>
                                                                @if ($unpaid->offer_mail == '1')
                                                                    Sent
                                                                @else
                                                                    Send Offer
                                                                @endif
                                                            </button>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="sendOfferModal" tabindex="-1" aria-labelledby="sendOfferModalLabel"
        aria-hidden="true">
        <div class="modal-dialog custom-modal-size">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendOfferModalLabel">Send Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <table id="offer-details-table" border="1" cellpadding="10" cellspacing="0"
                            style="border-collapse: collapse; width: 100%; text-align: left;">
                            <thead>
                                <tr style="background-color: #f4f4f4;">
                                    <th>Criteria</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Eligibility Criteria</td>
                                    <td id="eligibility-criteria"></td>
                                </tr>
                                <tr>
                                    <td>Enter Eligibility Criteria</td>
                                    <td id="enter-eligibility-criteria"></td>
                                </tr>
                                <tr>
                                    <td>Marks/CGPA/Division</td>
                                    <td id="marks"></td>
                                </tr>
                                <tr>
                                    <td>Eligibility Check Level 1</td>
                                    <td id="check-level-1"></td>
                                </tr>
                                <tr>
                                    <td>Eligibility Check Level 2</td>
                                    <td id="check-level-2"></td>
                                </tr>
                                <tr>
                                    <td>Final Payment</td>
                                    <td id="final-payment"></td>
                                </tr>
                                <tr>
                                    <td>Payment Structure</td>
                                    <td id="concession"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" id="from" placeholder="From" name="from"
                        value="noreply-admission@sau.int">
                    <div class="col-md-12">
                        <label for="to_email">To:</label>
                        <input type="text" id="to_email" name="to_email" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="mail_content">Mail Content:</label>
                        <textarea id="mail_content" name="mail_content" class="form-control"></textarea>
                    </div>
                    <div class="col-md-3 mt-3">
                        <button type="button" class="btn btn-danger send-admission-offer" id="submitOffer">Send
                            Offer</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="location.reload();">Close</button>

                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('.demoCheckbox').on('change', function() {
                const checkbox = $(this); // The checkbox element
                const id = checkbox.data('id'); // Get the data-id attribute
                const currentValue = checkbox.val(); // Get the current value (1 or 0)
                const newValue = currentValue == 1 ? 0 : 1; // Toggle the value (1 -> 0, 0 -> 1)

                // Send AJAX request
                $.ajax({
                    url: '{{ route('updateCheckLevel2') }}', // Replace with your route name
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                        id: id, // Record ID
                        check_level_2: newValue // New value to update
                    },
                    success: function(response) {
                        // Update the checkbox value to the new state
                        checkbox.val(newValue);

                        // Display success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message || 'Status updated successfully!',
                        });
                    },
                    error: function(error) {
                        // Revert the checkbox state if there's an error
                        checkbox.prop('checked', currentValue ==
                            1); // Set back to previous state

                        // Display error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error.responseJSON.message ||
                                'Failed to update status!',
                        });
                    }
                });
            });
        });
    </script>


    <script>
        let selectedId = null;

        $(document).ready(function() {
            $('.send-offer-btn').on('click', function() {
                const id = $(this).data('id');
                selectedId = id;
                $.ajax({
                    url: "{{ route('fetch-offer-details') }}",
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        // Define concession texts
                        const concessionTexts = {
                            inservice_faculty: 'In-service faculty members of SAARC nations. (<strong>INR 7,470/-</strong>)',
                            sau_alumni: 'SAU alumni. (<strong>INR 7,470/-</strong>)',
                            sau_students: '50% Concession for SAU Students (<strong>INR 4,980/-</strong>)',
                            full_payment: 'Full Payment (<strong>INR 9,960 per course</strong>)',
                            inservice_faculty_ms: 'In-service faculty members of SAARC nations (<strong>INR 52,630/-</strong>)',
                            sau_students_alumni_ms: 'SAU students and alumni (<strong>INR 52,630/-</strong>)',
                            full_payment_ms: 'Full Payment (<strong>INR 64,030)</strong>'
                        };

                        // Set concession text
                        $('#concession').html(concessionTexts[response.concession] || 'N/A');

                        // Populate other modal fields
                        $('#eligibility-criteria').text(response.criteria || 'N/A');
                        $('#enter-eligibility-criteria').text(response
                            .enter_eligibility_criteria || 'N/A');
                        $('#marks').text(response.marks || 'N/A');

                        // Update level checks
                        $('#check-level-1').html(response.check_level_1 ?
                            '<i class="fas fa-check-circle" style="color: green;"></i>' :
                            '<i class="fas fa-times-circle" style="color: red;"></i>');
                        $('#check-level-2').html(response.check_level_2 ?
                            '<i class="fas fa-check-circle" style="color: green;"></i>' :
                            '<i class="fas fa-times-circle" style="color: red;"></i>');
                        $('#final-payment').html(response.final_payment ?
                            '<i class="fas fa-check-circle" style="color: green;"></i>' :
                            '<i class="fas fa-times-circle" style="color: red;"></i>');

                        // Populate email and content fields
                        $('#to_email').val(response.to_email);
                        $('#subject').val(response.subject);
                        $('#mail_content').summernote('code', response.mail_content);
                    },
                    error: function() {
                        alert('Failed to fetch details.');
                    }
                });
            });

            // Handle sending the email
            $('#submitOffer').on('click', function() {
                const data = {
                    id: $('#to_email').val(),
                    to_email: $('#to_email').val(),
                    subject: $('#subject').val(),
                    mail_content: $('#mail_content').val(),
                };

                // AJAX request to send the email
                $.ajax({
                    url: '{{ route('sendAdmissionOffer') }}',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        selectedId: selectedId,
                        from: $('#from').val(),
                        subject: $('#subject').val(),
                        mail_content: $('#mail_content').val(),
                        to_email: $('#to_email').val(),
                        name: $('#name').val(),
                        programme: $('#programme').val(),
                    },
                    success: function(response) {
                        $('#sendOfferModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error.responseJSON.message || 'Something went wrong!',
                        });
                    }
                });
            });
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>


    <script>
        function downloadTable(tableId, filename) {
            var table = document.getElementById(tableId);
            var rows = table.rows;
            var csvContent = "";

            for (var i = 0; i < rows.length; i++) {
                var row = [];
                var cols = rows[i].cells;

                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }

                csvContent += row.join(",") + "\n";
            }

            var blob = new Blob([csvContent], {
                type: 'text/csv;charset=utf-8;'
            });
            var link = document.createElement("a");
            link.setAttribute("href", URL.createObjectURL(blob));
            link.setAttribute("download", filename);
            link.style.display = "none";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#paidTable, #unpaidTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'pdfHtml5'
                ],
                paging: false,
                searching: true,
                ordering: true,
                info: true
            });
        });
    </script>




    <style>
        .btn {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            /* Rounded corners */
        }

        .btn:hover {
            background-color: #45a049;
            /* Darker green */
        }

        .btn-danger {
            background-color: #dc3545;
            /* Red */
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            /* Rounded corners */
        }

        .btn-danger:hover {
            background-color: #c82333;
            /* Darker red */
        }

        .download-btn {
            display: block;
            margin: 10px 0;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .custom-modal-size {
            max-width: 90%;
            /* Set the desired width percentage */
            width: 900px;
            /* Or a fixed width */
        }
    </style>
    <!-- main-content closed -->
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mail_content').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Retrieve content on submission
            $('#send-offer').click(function(e) {
                e.preventDefault();
                const mail_content = $('#mail_content').val();

                console.log(mail_content); // Use this in your AJAX data
            });
        });
    </script>



    <style>
        /* Style for the form container */
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        /* Style for labels */
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        /* Style for text inputs */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Style for checkboxes */
        input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            accent-color: #007bff;
            /* For modern browsers */
        }

        /* Checkbox labels */
        label input[type="checkbox"]+span {
            font-size: 14px;
            vertical-align: middle;
            cursor: pointer;
        }
    </style>
@endsection
