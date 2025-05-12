@extends('admin.layouts.main')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Programme Report</h4>
                </div>
            </div>


            <div class="col-lg-12 mb-4">
                <div class="row g-3">
                    @foreach ($programmeData as $programme => $data)
                        <!-- Dynamic Card -->
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm border-0 p-3">
                                <h6 class="text-muted">{{ $programme }} Programme</h6>
                                <h4 class="fw-bold"> Total Paid: {{ $data['total_paid'] }}</h4>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-warning text-white"  style="font-size: 16px;">Total Registration {{ $data['total_course_count'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">Overall Totals</h6>
                            <h4 class="fw-bold">Grand Total Paid: {{ $grandTotalPaid }} </h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-success text-white"  style="font-size: 16px;">Grand Total Registration: {{ $grandTotalCourseCount }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @foreach ($programmeData as $programme => $data)
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto;">
                    <div class="card-body">
                        <h6>{{ $programme }} Programme</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Total Registration</th>
                                    <th>Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['transformed_lists'] as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route('admin.reports.course.report', ['course' => $item->slug]) }}">{{ $item->course_name }}</a>
                                        </td>
                                        <td>{{ $item->course_count }}</td>
                                        <td>{{ $item->paid }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{ $data['total_course_count'] }}</strong></td>
                                    <td><strong>{{ $data['total_paid'] }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach     
    </div>
</div>


<style>
    /* Container Styling */
  .col-lg-12.mb-4 {
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
  }
  
  /* Card Styling */
  .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
  }
  
  .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1) !important;
  }
  
  /* Card Content */
  .card h6.text-muted {
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 10px;
      color: #6c757d;
  }
  
  .card h4.fw-bold {
      font-size: 22px;
      color: #343a40;
      margin-bottom: 15px;
  }
  
  /* Badge Styling */
  .badge {
      padding: 8px 12px;
      border-radius: 20px;
      font-weight: 500;
      transition: background-color 0.3s ease;
  }
  
  .badge.bg-warning {
      background-color: #ffc107;
      color: #212529 !important;
  }
  
  .badge.bg-success {
      background-color: #28a745;
      color: #ffffff !important;
  }
  
  .badge:hover {
      filter: brightness(110%);
  }
  
  /* Responsive Adjustments */
  @media (max-width: 768px) {
      .card h4.fw-bold {
          font-size: 18px;
      }
  
      .badge {
          font-size: 14px !important;
          padding: 6px 10px;
      }
  
      .col-md-3.mb-4,
      .col-md-6 {
          flex: 0 0 100%;
          max-width: 100%;
      }
  }
  
  /* Spacing and Alignment */
  .d-flex.justify-content-between {
      align-items: center;
      gap: 10px;
  }
  
  .row.g-3 {
      margin: -10px;
  }
  
  .row.g-3 > * {
      padding: 10px;
  }
  </style>



@endsection