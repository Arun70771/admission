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

            <div class="row">
                <div class="col-md-12 bg-white p-5">
                    <h5>Update Payment Status</h5>
                    <form action="{{ route('application_fees_update', $applicationFee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Payment Status</label>
                                    <select name="payment" id="payment" class="form-select">
                                        <option value="" disabled>Select Payment</option>
                                        <!-- Populate the options -->
                                        <option value="Failed" {{ old('payment', $applicationFee->payment) === 'Failed' ? 'selected' : '' }}>Failed</option>
                                        <option value="Success" {{ old('payment', $applicationFee->payment) === 'Success' ? 'selected' : '' }}>Success</option>
                
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $applicationFee->amount) }}" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>



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
@endsection


