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
                                <h4 class="fw-bold">Total Registration {{ $data['total_course_count'] }}</h4>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-warning text-white">↑ Total Paid: {{ $data['total_paid'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">Overall Totals</h6>
                            <h4 class="fw-bold">Grand Total Registration: {{ $grandTotalCourseCount }}</h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-success text-white">↑ Grand Total Paid: {{ $grandTotalPaid }}</span>
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
                                        <th>Course Name</th>
                                        <th>Total Students</th>
                                        <th>Paid Students</th>
                                        <th>Country-wise Breakdown</th>
                                    </tr>
                                </thead>

                                @foreach ($data['transformed_lists'] as $course)
                                    <tr>
                                        <td>
                                            <a href="{{ route('reports.course.report', [ $course->slug]) }}">
                                                {{ $course->course_name }}
                                            </a>
                                        </td>
                                        <td>{{ $course->course_count }}</td>
                                        <td>{{ $course->paid }}</td>
                                        

                                        <td>
                                            <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                @foreach ($course->country_wise as $country => $info)
                                                    <span style="background: #007bff; color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                                                        {{ $country }}: {{ $info->total_students }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
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
@endsection