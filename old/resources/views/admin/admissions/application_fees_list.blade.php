@extends('admin.layouts.main')
@section('mid-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <!-- DataTables Buttons CSS -->

    <!-- main-content -->
    <div class="main-content horizontal-content" style="height: 100vh">

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
                    <div class="d-flex justify-content-between align-items-center">
                        <form method="GET" action="{{ route('application_fees') }}" class="my-2 d-flex"
                            style="max-width: 400px;">
                            <!-- Program filter dropdown -->
                            <select name="program" onchange="this.form.submit()" class="form-select">
                                <option value="all" {{ $program == 'all' ? 'selected' : '' }}>All Programs</option>
                                <option value="Short-Term" {{ $program == 'Short-Term' ? 'selected' : '' }}>Short-Term
                                </option>
                                <option value="MS (Data Science and Artificial Intelligence)"
                                    {{ $program == 'MS (Data Science and Artificial Intelligence)' ? 'selected' : '' }}>MS
                                    (Data Science and Artificial Intelligence)</option>
                            </select>

                            <select name="payment_status" onchange="this.form.submit()" class="form-select">
                                <option value="Success" {{ $payment_status == 'Success' ? 'selected' : '' }}>Success
                                </option>
                                <option value="Failed" {{ $payment_status == 'Failed' ? 'selected' : '' }}>Failed</option>
                            </select>


                        </form>

                        <a href="#" class="download-btn btn-primary p-2"
                            onclick="downloadTable('application-data', 'program-data.csv')">Download CSV</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif



                    <div class="card p-4">
                        <table class="table" border="1" id="application-data">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <td>Application ID</td>
                                    <th>Programme</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Name & Email & Phone & Ref Number</th>
                                    <th>Created At</th>
                                    <td>Edit</td>
                                    <th>Delete Entry</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $fee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fee->application_id ?? 'N/A' }} </td>
                                        <td>{{ $fee->programme ?? 'N/A' }}</td>
                                        <td>{{ $fee->amount ?? 'N/A' }}</td>
                                        <td>{{ $fee->payment ?? 'Pending' }}</td>

                                        @php
                                            $decodedPaymentResponse = json_decode($fee['payment_response'], true);
                                            $pos =
                                                strpos(
                                                    $decodedPaymentResponse['mandatory_fields'],
                                                    '|',
                                                    strpos(
                                                        $decodedPaymentResponse['mandatory_fields'],
                                                        '|',
                                                        strpos($decodedPaymentResponse['mandatory_fields'], '|') + 1,
                                                    ) + 1,
                                                ) + 1;
                                            $trimmedString = substr($decodedPaymentResponse['mandatory_fields'], $pos);
                                        @endphp

                                        <td>{{ isset($trimmedString) ? htmlspecialchars($trimmedString) : 'N/A' }}|{{$decodedPaymentResponse['ReferenceNo']}}</td>
                                        <td>{{ $fee->created_at }}</td>
                                        <td><a href="{{ route('application_fees_edit', $fee->id) }}"
                                                class="btn btn-warning">Edit</a></td>
                                        <td>
                                            <form action="{{ route('application_fees_delete', $fee->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center mt-2">
                            {{ $data->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

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
@endsection
