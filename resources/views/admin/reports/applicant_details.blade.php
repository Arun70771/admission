@extends('admin.layouts.main')
@section('content')

        <!-- partial -->
        <div class="main-panel">

          <!--div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Heading</h4>
                </div>
              </div>
              <div class="col-12 my-2">
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
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownexport">
                            <a class="dropdown-item" href="#">Export as PDF</a>
                            <a class="dropdown-item" href="#">Export as DOCX</a>
                            <a class="dropdown-item" href="#">Export as CDR</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div-->

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="font-weight-bold">Student Details - {{$application_form->candidate_name}}</h4>
                            <a href="https://admissions.sau.ac.in/admin/reports/applicant/application-pdf/{{ Request::segment(4) }}" class="btn btn-success" target="_blank">
                                Download Application Pdf
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-md-12">
                                <img style="height: 150px;" class="mb-2" src="{{ asset('storage/' . $passport_photograph) }}" alt="">
                            
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Personal Information</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{$application_form->candidate_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$application_form->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{$application_form->nationality}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{$application_form->dob}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{$application_form->mobile}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Registration Information</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Registration No.</th>
                                        <td>
                                        D{{ str_pad((100000+$application_form->application_id), 6, '0', STR_PAD_LEFT) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td class="text-success">Completed</td>
                                    </tr>
                                    <tr>
                                        <th>Registration Date</th>
                                        <td>{{$application_form->created_at}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold">Educational Details</h5>
                                <table class="table table-bordered">
                                <tr>
                                    <td><strong>Name of the Degree</strong></td>
                                    <td width="15%">10th</td>
                                    <td><strong>Name of the Board</strong></td>
                                    <td>{{ $educational_detail->board_10th ?? '' }}</td>
                                    <td><strong>Percentage</strong></td>
                                    <td width="10%">{{ $educational_detail->marks_10th ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Name of the Degree</strong></td>
                                    <td width="15%">12th</td>
                                    <td><strong>Name of the Board</strong></td>
                                    <td>{{ $educational_detail->board_12th ?? '' }}</td>
                                    <td><strong>Percentage</strong></td>
                                    <td width="10%">{{ $educational_detail->marks_12th ?? '' }}</td>
                                </tr>
                            @if($programme->programme=='masters' || $programme->programme=='phd' || $programme->programme=='executivePhd')    
                                <tr>
                                    <td><strong>Name of the Degree</strong></td>
                                    <td width="15%">Bachelors</td>
                                    <td><strong>Name of the Board/University</strong></td>
                                    <td>{{ $educational_detail->board_bachelors ?? '' }}</td>
                                    <td><strong>Percentage</strong></td>
                                    <td width="10%">{{ $educational_detail->marks_bachelors ?? '' }}</td>
                                </tr>
                                @endif
                                @if($programme->programme=='phd' || $programme->programme=='executivePhd')
                                    <tr>
                                        <td><strong>Name of the Degree</strong></td>
                                        <td width="15%">Masters</td>
                                        <td><strong>Name of the Board/University</strong></td>
                                        <td>{{ $educational_detail->board_masters ?? '' }}</td>
                                        <td><strong>Percentage</strong></td>
                                        <td width="10%">{{ $educational_detail->marks_masters ?? '' }}</td>
                                    </tr>
                               @endif 
                            </table>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold">Applied For Programme</h5>
                                <table class="table table-bordered">
                                
                                <tr>
                                    <th width="10%"><strong>SNO.</strong></th>
                                    <th><strong>Programme Name</strong></th>
                                    <th><strong>Mode of Admission</strong></th>
                                    <th><strong>Course Name </strong></th>
                                </tr>
                             
                              @foreach($courses as $key => $courses)                                
                                <tr>
                                    <td data-label="SNO.">{{$key+1}}</td>
                                    <td data-label="Programme Name">{{ ucfirst($programme->programme) }}</td>
                                    <td data-label="Mode of Admission">{{$mode_admission->mode_of_admission}}</td>
                                    <td data-label="Course Name">{{ $courses->course_name }}</td>
                                </tr>
                              @endforeach
                            </table>
                            </div>
                        </div>


                        
                        <!-- Document Details -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold">Documents</h5>
                                <table class="table table-bordered">
                                <tr>
                                    <th width="10%"><strong>SNO.</strong></th>
                                    <th><strong>Document Name</strong></th>
                                    <th><strong>Preview</strong></th>
                                </tr>

                            @foreach($document_upload as $key => $document)
                                <tr>
                                    <td width="10%" data-label="SNO."><strong>{{ $key+1 }}</strong></td>
                                    <td data-label="Document Name"><strong>{{ucwords(str_replace('_', ' ', $document->document_type))}}</strong></td>
                                    <td data-label="Preview"><strong><a href="{{ asset('storage/' . $document->document_path) }}">(File Link or image)</a></strong></td>
                                </tr>
                              @endforeach 
                            </table>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <!--div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-danger">Delete Student</button>
                                <button class="btn btn-primary ms-2">Edit Details</button>
                            </div>
                        </div-->

                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

@endsection