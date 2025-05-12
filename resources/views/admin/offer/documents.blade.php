@extends('admin.layouts.main')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Virtual Campus Course Report</h4>
                </div>
            </div>
            <div class="col-12 my-2">
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('admin.offer.documents') }}" method="GET">
                            <label for="searchInput" class="form-label">Search</label>
                            <div class="form-group d-flex" style="gap: 10px;">
                                <input type="text" class="form-control" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or mobile">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Payment Status Filter -->
                    <div class="col-md-2">
                        <form method="GET" action="{{ route('admin.offer.documents') }}">
                            <div class="form-group">
                                <label for="paymentStatusSelect">Payment Status</label>
                                <select class="form-control mt-2" id="paymentStatusSelect" name="payment_status" onchange="this.form.submit()">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ request('payment_status') === '1' ? 'selected' : '' }}>Completed</option>
                                    <option value="0" {{ request('payment_status') === '0' ? 'selected' : '' }}>In Progress</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <div class="form-group row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="startDate" placeholder="Start Date">
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="endDate" placeholder="End Date">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="d-flex justify-content-end" style="margin-top: 1.8rem;">
                        <button class="btn btn-primary btn-sm" id="applyFilters">Apply Filters</button>
                        <div class="dropdown ml-3 toolbar-item">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownexport">
                            <a class="dropdown-item" href="#" onclick="exportToExcel()">Export as Excel</a>
                            <!-- <a class="dropdown-item" href="#">Export as DOCX</a>
                            <a class="dropdown-item" href="#">Export as CDR</a> -->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
         
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ implode(', ', $programmes) }}</h4>

                            <!-- Enrolled Students Section -->
                            <div class="enrollment-info">
                                <table class="table table-bordered text-center course-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Registration No.</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Country</th>
                                            <th>Registration Status</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student-list">
                                        @forelse($students as $key => $student)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>D{{ str_pad((100000 + $student->application_id), 6, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $student->candidate_name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->mobile }}</td>
                                                <td>{{ $student->nationality }}</td>
                                                <td class="{{ $student->pay_fee == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $student->pay_fee == 1 ? 'Completed' : 'In Progress' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.reports.applicant.application_id', ['application_id' => $student->application_id]) }}" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-muted text-center">No students enrolled for this course.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            
    </div>
</div>

@endsection