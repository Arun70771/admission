@extends('web.layouts.main')
@section('content')
        <div class="container my-5">
            <div class="row">
                <!-- Main Content -->
                <main class="col-md-8 mx-auto">
                
                <div class="mx-auto mb-4" style="max-width: 1200px">
                    <a href="{{route('application-status')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Dashbaord</a>
                </div>

                    <div class="card shadow border-0">
                        <div class="card-body text-center">
                            <div class="d-flex align-items-center justify-content-center flex-column">
                                <div class="fs-1 text-success me-2 py-1 px-3 rounded-circle" style="background: #3ef7a7b5">&#10004;</div>
                                <h2 class="text-success mb-0">Payment Successful</h2>
                            </div>
                            <p class="text-muted mt-2">Your payment has been processed! Details of the transaction are included below.</p>
                            
                            <hr>
                            <table class="my-4 table-bordered">
                                <thead class="bg-white">
                                    <tr>
                                        <!-- <th scope="col">Transaction ID</th>
                                        <th scope="col">Transaction Amount</th> -->
                                        <th scope="col">Transaction Date</th>
                                        <th scope="col">Transaction Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Application Form Step -->
                                    <tr>
                                       
                                        <td data-label="Transaction Date">
                                        {{ now()->format('d-m-Y') }}
                                        </td>
                                        <td data-label="Transaction Status">
                                        Successful
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                           
                        </div>
                    </div>

                    <div class="text-center my-4">
                        <p class="text-danger fw-bold">Note: Please save this receipt for future reference.</p>
                    </div>

                    </div>
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning">
                                Print Receipt
                            </button>
                        </div>
                    </div>
                </main>
            </div>
        </div>

@endsection