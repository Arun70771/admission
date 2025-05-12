@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title"> {{$course_details->programme_name}}</h4>
        </div>
      </div>
      <div class="col-12 my-2">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('admin.reports.course.report', $course_details->slug) }}" >
                  <label for="searchInput" class="form-label">Search</label>
                  <div class="form-group d-flex" style="gap: 10px;">
                    <input type="text" class="form-control" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search by name, email...">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                  </div>
                </form>              
            </div>
            <div class="col-md-2">
              <form method="GET" action="{{ route('admin.reports.course.report', $course_details->slug) }}">
                  <div class="form-group">
                      <label for="exampleFormControlSelect3">Payment Status</label>
                      <select class="form-control mt-2" id="exampleFormControlSelect3" name="payment_status" onchange="this.form.submit()">
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
            <h4 class="card-title">{{$course_details->course_name}}</h4>
      
            <!-- Enrolled Students Section -->
            <div class="enrollment-info">
              <table class="table table-bordered text-center" id="course-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Registration No.</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    {{-- <th>Mobile</th> --}}
                    <th>Country</th>
                    <th>Registrations Status</th>
                    <th>View Details</th>
                  </tr>
                </thead>
                <tbody id="student-list">
                  @foreach($applicationForms as $key => $application)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>D{{ str_pad((100000+$application->application_id), 6, '0', STR_PAD_LEFT) }}

                        </td>
                        <td>{{$application->candidate_name}}</td>
                        <td>{{$application->email}}</td>
                        {{-- <td>{{$application->mobile}}</td> --}}
                        <td>{{$application->nationality}}</td>
                        <td class="{{ $application->pay_fee == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $application->pay_fee == 1 ? 'Completed' : 'In Progress' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.reports.applicant.application_id', ['application_id' => $application->application_id]) }}" class="btn btn-primary">View</a>
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
  <!-- content-wrapper ends -->
  <script>
    // function exportToExcel() {
    //     let table = document.getElementById("course-table");
    //     let wb = XLSX.utils.book_new();
    //     let ws = XLSX.utils.table_to_sheet(table);
    //     XLSX.utils.book_append_sheet(wb, ws, "Course Entries");
    //     XLSX.writeFile(wb, "{{$course_details->programme_name}}_data.xlsx");
    // }

    function exportToExcel() {
        let table = document.getElementById("course-table");
        let wb = XLSX.utils.book_new();
        let ws = XLSX.utils.table_to_sheet(table);

        // Convert sheet to JSON and remove unwanted columns
        let jsonSheet = XLSX.utils.sheet_to_json(ws, { header: 1 });

        // Remove "Registrations Status" (6th index) and "View Details" (7th index)
        jsonSheet = jsonSheet.map(row => row.slice(0, 7));

        // Convert JSON back to sheet
        let newWs = XLSX.utils.aoa_to_sheet(jsonSheet);

        // Create and save the Excel file
        XLSX.utils.book_append_sheet(wb, newWs, "Filtered Data");
        XLSX.writeFile(wb, "{{$course_details->programme_name}}_data.xlsx");
    }
  </script>

@endsection