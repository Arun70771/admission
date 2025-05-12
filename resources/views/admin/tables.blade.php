@extends('admin.layouts.main')
@section('content')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Heading</h4>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                    <div class="col-md-3">
                        <label for="searchInput" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email...">
                    </div>
                    <div class="col-md-3">
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
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
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
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p class="card-description"> Add class <code>.table-bordered</code> </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> First name </th>
                          <th> Progress </th>
                          <th> Amount </th>
                          <th> Deadline </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1 </td>
                          <td> Herman Beck </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 2 </td>
                          <td> Messsy Adam </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $245.30 </td>
                          <td> July 1, 2015 </td>
                        </tr>
                        <tr>
                          <td> 3 </td>
                          <td> John Richards </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $138.00 </td>
                          <td> Apr 12, 2015 </td>
                        </tr>
                        <tr>
                          <td> 4 </td>
                          <td> Peter Meggik </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                        </tr>
                        <tr>
                          <td> 5 </td>
                          <td> Edward </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 160.25 </td>
                          <td> May 03, 2015 </td>
                        </tr>
                        <tr>
                          <td> 6 </td>
                          <td> John Doe </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 123.21 </td>
                          <td> April 05, 2015 </td>
                        </tr>
                        <tr>
                          <td> 7 </td>
                          <td> Henry Tom </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> $ 150.00 </td>
                          <td> June 16, 2015 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          @endsection