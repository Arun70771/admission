@extends('web.layouts.main')
@section('content')

@php use App\Models\StepStatus;
    $step_status = StepStatus::where('application_id',Auth::id())->first();
    $preview_finalsubmit = StepStatus::where('application_id', Auth::id())->where('preview_finalsubmit', 1)->exists();
@endphp

        <div class="container mb-4">
                @include('web.include.loggedin')
            <div class="row">
                <!-- Sidebar -->
                @include('web.include.nav')

                <!-- Main Content -->
                <main class="col-md-8 ms-sm-auto col-lg-9 ps-md-4 mt-4">
                    @include('web.include.error')
                    <div class="card">
                        <div class="card-header fs-6 text-white">
                            <strong>Preview & Final Submit</strong>
                        </div>
                        <div class="ps-4 pt-4">
                            <h5 class="primary-heading">Personal Details</h5>
                        </div>

                        <div class="p-4 pt-0 d-flex gap-2 personal-details">
                            <table style="width: 90%;">
                                <tr>
                                    <td><strong>Application No</strong></td>
                                    <td>D{{ str_pad((100000+Auth::id()), 6, '0', STR_PAD_LEFT) }}</td>
                                    <td><strong>Name of the Candidate</strong></td>
                                    <td>{{ $applications_form->candidate_name ?? '' }}</td>
                                </tr>
                               
                               
                                <tr>
                                    <td><strong>Date of Birth</strong></td>
                                    <td>{{ $applications_form->dob ? date('d-m-Y', strtotime($applications_form->dob)) : '' }}</td>
                                    <td><strong>Nationality</strong></td>
                                    <td>{{ $applications_form->nationality ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Father Name / Mother Name / Guardian’s Name </strong></td>
                                    <td>{{ $applications_form->father_name ?? '' }}</td>
                                    <td><strong>Gender</strong></td>
                                    <td>{{ $applications_form->gender ?? '' }}</td>
                                </tr>
                                
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ $applications_form->email ?? '' }}</td>
                                    <td><strong>Mobile No.</strong></td>
                                    <td>{{ $applications_form->mobile ?? '' }}</td>
                                </tr>
                                
                            </table>
                            <img class="profile" src="{{ asset('storage/' . $passport_photograph) }}" style="height: 140px;width: 140px; margin-left: auto;" alt="">
                        </div>
                        
                        <div class="ps-4">
                            <h5 class="primary-heading">Academic Qualification Details</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table>
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


                               @php
                                    $qualifying_data_collection = \App\Models\ScoreModeOfAdmission::where('application_id', Auth::id())
                                        ->whereIn('qualifying_name', array_keys($exams))
                                        ->get()
                                        ->keyBy('qualifying_name');
                                @endphp

                                @foreach ($exams as $exam => $status)
                                    @php
                                        $qualifying_data = $qualifying_data_collection->get($exam);
                                    @endphp

                                    <input type="hidden" name="qualifying_name[]" value="{{ $exam }}">

                                    @if ($status && !is_null($qualifying_data))
                                        <table class="table-bordered mt-4">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="30%">{{ $exam }}</th>
                                                    <th scope="col" width="25%">Passing Status</th>
                                                    <th scope="col" width="25%">Passing Year / Session</th>
                                                    <th scope="col" width="20%">Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $qualifying_data->qualifying_name_of_degree ?? 'N/A' }}</td>
                                                    <td data-label="Passing Status">{{ $qualifying_data->qualifying_passing_status ?? 'N/A' }}</td>
                                                    <td data-label="Passing Year / Session">{{ $qualifying_data->qualifying_passing_year ?? 'N/A' }}</td>
                                                    <td data-label="Score">{{ $qualifying_data->qualifying_score ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                @endforeach



                               
                            </table>
                        </div>

                        <div class="ps-4">
                            <h5 class="primary-heading">Applied For Programme</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table class="applied-programme">
                                <tr>
                                    <th width="10%"><strong>SNO.</strong></th>
                                    <th><strong>Programme Name</strong></th>
                                    <th><strong>Mode of Admission</strong></th>
                                    <th><strong>Course Name </strong></th>
                                </tr>

                             
                              @foreach($course as $key => $courses)                                
                                <tr>
                                    <td data-label="SNO.">{{$key+1}}</td>
                                    <td data-label="Programme Name">{{ ucfirst($programme->programme) }}</td>
                                    <td data-label="Mode of Admission">{{$mode_admission->mode_of_admission}}</td>
                                    <td data-label="Course Name">{{ $courses->course_name }}</td>
                                </tr>
                              @endforeach
                            </table>
                        </div>

                        <div class="ps-4">
                            <h5 class="primary-heading">Contact Details</h5>
                        </div>
                        <div class="p-4 pt-0">
                        
                            <table>
                                <tr>
                                    <td><strong>House No./Street Name</strong></td>
                                    <td>{{ $applications_form->correspondence_house ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>City/Town/Village</strong></td>
                                    <td>{{ $applications_form->correspondence_city ?? ''  }}</td>
                                </tr>
                                <tr>
                                    <td><strong>District</strong></td>
                                    <td>{{ $applications_form->correspondence_district ?? ''  }}</td>
                                </tr>
                                
                                <tr>
                                    <td><strong>State</strong></td>
                                    <td>{{ $applications_form->correspondence_state ?? ''  }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PIN/ZIP Code</strong></td>
                                    <td>{{ $applications_form->correspondence_zip ?? ''  }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Country</strong></td>
                                    <td>{{ $applications_form->correspondence_country ?? ''  }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="ps-4">
                            <h5 class="primary-heading">Uploaded Documents</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table class="upload-document">
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


                @if($step_status && $step_status->edit_mode)        
                
                @else
                        @if($preview_finalsubmit)
                            <div class="row my-3">
                                <div class="col-12 text-center">
                                    <a href="{{route('index.payment')}}"><button type="submit" class="btn btn-primary">Next</button></a>
                                </div>
                            </div> 
                        @else
                        <form method="post" action="{{route('store.preview')}}">
                            @csrf
                                <div class="ps-4">
                                    <h5 class="primary-heading">Declaration</h5>
                                </div>
                                <div class="p-4 pt-0">
                                    <table style="border: none !important;">
                                        <tr style="border: none !important;">
                                            <td width="4%" style="border: none !important;">
                                                <input style="width: 1.2rem; height: 1.2rem;" type="checkbox" class="form-check" name="declare" @if($step_status->preview_finalsubmit) checked @endif> 
                                            </td>
                                            <td style="border: none !important;">I hereby declare that all the information provided by me in the previous steps is correct. If I click the submit button, I will not be able to make any changes and will proceed to pay the registration fee.</td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Submit Button -->
                                <div class="row p-4 pt-0">
                                    <div class="col-12 text-center mt-3">
                                        <a
                                            href="{{route('index.file-upload')}}"
                                            class="btn btn-danger"
                                        >
                                            Previous
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Save & Final Submit
                                        </button>
                                    </div>
                                </div>


                        </form>    
                        @endif
                @endif        

                    </div>
                </main>
            </div>
        </div>


<style>
            td,th{
                border: 1px solid #ccc;
            }

            @media screen and (max-width: 1200px) {
                table{
                    width: 100%;
                }
                td{
                    width: 100%;
                    text-align: left !important;
                }

                th{
                    display: none !important;
                }

                .personal-details{
                    flex-direction: column;
                    align-items: flex-start;
                }

                .personal-details table{
                    width: 100% !important;
                    order: 1;
                }

                .profile{
                    order: 0;
                    margin-left: 0 !important;
                }

                .applied-programme td,
                .upload-document td{
                    text-align: right !important;
                }
            }
        </style>
@endsection