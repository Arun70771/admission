@extends('admin.layouts.main')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Bachelor Course Report</h4>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <div class="row g-3">
                <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">Total Paid</h6>
                            <h4 class="fw-bold">232</h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-success text-white">↑ 12.95%</span>
                                <small class="text-muted ms-2">Compared to last month</small>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">Total Unpaid</h6>
                            <h4 class="fw-bold">2323</h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-danger text-white">↑ 12.95%</span>
                                <small class="text-muted ms-2">Compared to last month</small>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">In Process</h6>
                            <h4 class="fw-bold">100</h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-info text-white">↑ 12.95%</span>
                                <small class="text-muted ms-2">Compared to last month</small>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 p-3">
                            <h6 class="text-muted">Offer Letter</h6>
                            <h4 class="fw-bold">22</h4>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-warning text-white">↑ 12.95%</span>
                                <small class="text-muted ms-2">Compared to last month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3 col mb-sm-2">
                        <label for="searchInput" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email...">
                    </div>
                    <div class="col-md-3 col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Category</label>
                            <select class="form-control form-control mt-2" id="exampleFormControlSelect3">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <div class="form-group row">
                            <div class="col-md-6 col mb-sm-4 mb-2">
                                <input type="date" class="form-control" id="startDate" placeholder="Start Date">
                            </div>
                            <div class="col-md-6 col">
                                <input type="date" class="form-control" id="endDate" placeholder="End Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col mb-sm-1 mb-3 d-flex justify-content-end align-items-center">
                        <div class="d-flex justify-content-end align-items-center">
                            <button class="btn btn-primary btn-sm" id="applyFilters">Apply Filters</button>
                            <div class="dropdown ml-3 toolbar-item">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownexport">
                                <a class="dropdown-item" href="#">Export as PDF</a>
                                <a class="dropdown-item" href="#">Export as DOCX</a>
                                <a class="dropdown-item" href="#">Export as CDR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" style="overflow-x: auto;">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> Sno. </th>
                                <th> Course Name</th>
                                <th> Total </th>
                                <th> Paid </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> MSc Applied Mathematics / MSc Mathematics </td>
                                <td> 2 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> MSc Biotechnology </td>
                                <td> 2 </td>
                                <td> 1 </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> MA International Relations </td>
                                <td> 8 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> LLM (Master of Laws) </td>
                                <td> 6 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td> PhD Mathematics </td>
                                <td> 4 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 6 </td>
                                <td> PhD Biotechnology </td>
                                <td> 1 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 7 </td>
                                <td> PhD International Relations </td>
                                <td> 1 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 8 </td>
                                <td> PhD Sociology </td>
                                <td> 2 </td>
                                <td> 1 </td>
                            </tr>
                            <tr>
                                <td> 9 </td>
                                <td> PhD Legal Studies </td>
                                <td> 2 </td>
                                <td> 1 </td>
                            </tr>
                            <tr>
                                <td> 10 </td>
                                <td> B.Tech. (CSE) / Dual Degree B.Tech.- M.Tech. (CSE)/B.Tech (Mathematics and Computing) </td>
                                <td> 11 </td>
                                <td> 1 </td>
                            </tr>
                            <tr>
                                <td> 11 </td>
                                <td> M.Tech Computer Science </td>
                                <td> 2 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 12 </td>
                                <td> MS Climate Change and Sustainability </td>
                                <td> 1 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 13 </td>
                                <td> Integrated BS-MS (Interdisciplinary Sciences) </td>
                                <td> 1 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 14 </td>
                                <td> PhD Physics </td>
                                <td> 1 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td> 15 </td>
                                <td> PhD Media, Arts and Design </td>
                                <td> 2 </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><strong>2324</strong></td>
                                <td><strong>224</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection