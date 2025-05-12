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
                <div class="page-header bold" >
                    <h2>Cancellation of Admission & Refund Form 2024</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('handle_application_refund') }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Enter your email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Father's Name</label>
                                        <input type="text" class="form-control" id="father_name" name="father_name" value="@if(!empty($data) && isset($data->father_name)){{ $data->father_name }}@endif" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Date of birth</label>
                                        <input type="text" class="form-control" id="dob" name="dob" value="@if(!empty($data) && isset($data->dob)){{ $data->dob }}@endif" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="@if(!empty($data) && isset($data->country)){{ $data->country }}@endif" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Refund Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" value="@if(!empty($applicationFee) && isset($applicationFee->amount)){{ $applicationFee->amount }}@endif" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Reason of withdrawal</label>
                                        <input type="text" class="form-control" id="reason_of_withdrawal" name="reason_of_withdrawal" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection