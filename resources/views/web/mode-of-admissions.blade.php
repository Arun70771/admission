@extends('web.layouts.main')
@section('content')

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
                            <strong>Modes of Admission</strong>
                        </div>

                        @if($action=='add')
                            <form action="{{ route('store.mode-of-admissions') }}" method="post" class="p-4">
                                @csrf
                        @else
                        <form action="{{ route('update.mode-of-admissions', $mode->id) }}" method="post" class="p-4">
                            @csrf
                            @method('PUT')
                        @endif    


                            @if($programme->programme=='bachelors')
                                @foreach($courses as $course)

                                        @php
                                            $JEE_Mains = \App\Models\ModeOfAdmission::where('programme', $course->course_name)
                                                        ->where('application_id', Auth::id())
                                                        ->where('mode_of_admission', 'JEE Mains')
                                                        ->exists();
                                            $CUET_UG = \App\Models\ModeOfAdmission::where('programme', $course->course_name)
                                                        ->where('application_id', Auth::id())
                                                        ->where('mode_of_admission', 'CUET UG')
                                                        ->exists();
                                            $NEET = \App\Models\ModeOfAdmission::where('programme', $course->course_name)
                                                        ->where('application_id', Auth::id())
                                                        ->where('mode_of_admission', 'NEET')
                                                        ->exists();
                                            $NLET = \App\Models\ModeOfAdmission::where('programme', $course->course_name)
                                                        ->where('application_id', Auth::id())
                                                        ->where('mode_of_admission', 'National Level Eligibility Test')
                                                        ->exists();
                                            $MQE = \App\Models\ModeOfAdmission::where('programme', $course->course_name)
                                                        ->where('application_id', Auth::id())
                                                        ->where('mode_of_admission', 'Marks of Qualifying Examination')
                                                        ->exists();
                                        @endphp


                                    <div class="row">
                                        <!-- Programme Betchlors Name Dropdown -->
                                        <div class="col-md-6 mb-3 order-0">
                                            <label class="form-label"
                                                >Select Programme
                                                <span class="text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <select
                                                class="form-control"
                                                id="programme"
                                                name="programme[]"
                                                onchange="updateModeOfAdmission()"
                                                
                                            >
                                            <option value="{{ $course->course_name }}">{{ ucwords(str_replace('-', ' ', $course->course_name)) }}</option> 
                                            
                                            </select>
                                        </div>

                                        <!-- Dropdowns for Mode of Admission for each Programme -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"
                                                >Select Mode of Admission
                                                </label>
                                            <select
                                                class="form-control"
                                                name="mode_of_admission[]"
                                                id="bachelors-mode-of-admission"
                                            >
                                                <option value="">Select Mode of Admission</option>
                                                
                                                @if($application_form->nationality=='India')
                                                    <option value="JEE Mains" @if($JEE_Mains) selected @endif >JEE Mains</option>
                                                    <option value="CUET UG" @if($CUET_UG) selected @endif >CUET UG</option>
                                                    <option value="NEET" @if($NEET) selected @endif >NEET</option>
                                                @elseif($application_form->nationality=='Afghanistan' || $application_form->nationality=='Bhutan' || $application_form->nationality=='Maldives' || $application_form->nationality=='Nepal' || $application_form->nationality=='Pakistan' || $application_form->nationality=='Sri Lanka' ) 
                                                            
                                                    <option value="National Level Eligibility Test" @if($NLET) selected @endif >National Level Eligibility Test</option>
                                                    <option value="Marks of Qualifying Examination" @if($MQE) selected @endif >Marks of Qualifying Examination</option>
                                                @else
                                                <option value="Marks of Qualifying Examination" @if($MQE) selected @endif >Marks of Qualifying Examination</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    @endforeach  



                                @elseif($programme->programme=='masters')
                                
                                @foreach($courses as $course)
                                    <div class="row">
                                        <!-- Programme Masters Name Dropdown -->
                                        <div class="col-md-6 mb-3 order-0">
                                            <label class="form-label"
                                                >Programme
                                                <span class="text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <select
                                                class="form-control"
                                                id="programme"
                                                name="programme[]"
                                                onchange="updateModeOfAdmission()"
                                                
                                            ><option value="{{ $course->course_name }}">{{ ucwords(str_replace('-', ' ', $course->course_name)) }}</option>  
                                            </select>
                                        </div>


                                        @php
                                            $cuet_pg = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'CUET PG')->exists();
                                            $GATE = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'GATE')->exists();
                                            $CAT = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'CAT')->exists();
                                            $GMAT = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'GMAT')->exists();
                                            $CMAT = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'CMAT')->exists();
                                            $MAT = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'MAT')->exists();
                                            $XAT = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'XAT')->exists();
                                            $NLET = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'National Level Eligibility Test')->exists();
                                            $MQE = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'Marks of Qualifying Examination')->exists();
                                        @endphp

                                        <!-- Dropdowns for Mode of Admission for each Programme -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"
                                                >Select Mode of Admission </label
                                            >
                                            <select
                                                class="form-control"
                                                id="masters-mode-of-admission"
                                                 name="mode_of_admission[]" >
                                                <option value="">Select Mode of Admission </option>

                                                @if($application_form->nationality=='India')

                                                  @if($course->course_name == 'ms-executive-mba')
                                                    <option value="Professional Experience" selected > Professional Experience</option>
                                                  @else  
                                                    <option value="CUET PG" @if($cuet_pg) selected @endif > CUET PG</option>
                                                    <option value="GATE"    @if($GATE) selected @endif >GATE</option>
                                                    <option value="CAT"     @if($CAT) selected @endif >CAT</option>
                                                    <option value="XAT"     @if($XAT) selected @endif >XAT</option>
                                                    <option value="XAT"     @if($XAT) selected @endif >XAT</option>
                                                    <option value="MAT"     @if($MAT) selected @endif >MAT</option>
                                                    <option value="CMAT"    @if($CMAT) selected @endif >CMAT</option>
                                                    <option value="GMAT"    @if($GMAT) selected @endif >GMAT</option>
                                                  @endif  

                                               
                                                @elseif($application_form->nationality=='Afghanistan' || $application_form->nationality=='Bhutan' || $application_form->nationality=='Maldives' || $application_form->nationality=='Nepal' || $application_form->nationality=='Pakistan' || $application_form->nationality=='Sri Lanka' ) 
                                                         
                                                            <option value="National Level Eligibility Test" @if($NLET) selected @endif >National Level Eligibility Test</option>
                                                            <option value="Marks of Qualifying Examination" @if($MQE) selected @endif >Marks of Qualifying Examination</option>
                                                @else
                                                            <option value="Marks of Qualifying Examination" @if($MQE) selected @endif >Marks of Qualifying Examination</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                  @endforeach  


                               @elseif($programme->programme=='phd' || $programme->programme=='executivePhd')  
                                @foreach($courses as $course)

                                @php
                                        $JRF = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'JRF')->exists();
                                        $funded_government = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'funded_government')->exists();
                                        $salaried = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'salaried')->exists();
                                        $national_fellowship = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'national_fellowship')->exists();
                                        $government_agency = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'government_agency')->exists();
                                        $national_level_eligibility_test = \App\Models\ModeOfAdmission::where('programme', $course->course_name)->where('application_id', Auth::id())->where('mode_of_admission', 'National Level Eligibility Test')->exists();
                                      
                                @endphp


                                        <div class="row">
                                            <!-- Programme phd Name Dropdown -->
                                            <div class="col-md-6 mb-3 order-0">
                                                <label class="form-label"
                                                    >Select Programme  
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    class="form-control"
                                                    id="programme"
                                                    name="programme[]"
                                                    onchange="updateModeOfAdmission()"
                                                    
                                                >
                                                <option value="{{ $course->course_name }}">{{ ucwords(str_replace('-', ' ', $course->course_name)) }}</option>
                                                    
                                                </select>
                                            </div>

                                            <!-- Dropdowns for Mode of Admission for each Programme -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label"
                                                    >Select Mode of Admission</label
                                                >
                                                <select
                                                    class="form-control"
                                                    id="phd-mode-of-admission"
                                                     name="mode_of_admission[]"
                                                >
                                                    <option value="">Select Mode of Admission</option>


                                                    @if($application_form->nationality=='India')
                                                            <option value="JRF" @if($JRF) selected @endif>UGC NET/CSIR - JRF</option>
                                                            <option value="funded_government" @if($funded_government) selected @endif>Funded by any Government agency to pursue PhD</option>
                                                            <option value="salaried" @if($salaried) selected @endif>Salaried and can get a leave from my organization for at least the period until the course work is completed</option>
                                                            <option value="any-other">Any Other</option>
                                                        @elseif($application_form->nationality=='Afghanistan' || $application_form->nationality=='Bhutan' || $application_form->nationality=='Maldives' || $application_form->nationality=='Nepal' || $application_form->nationality=='Pakistan' || $application_form->nationality=='Sri Lanka' ) 
                                                            
                                                            <option value="national_fellowship" @if($national_fellowship) selected @endif>National fellowship tests in different SAARC countries on the basis of their respective National Entrance Tests</option>
                                                            <option value="government_agency" @if($government_agency) selected @endif>Funded by any Government agency to pursue PhD</option>
                                                            <option value="salaried" @if($salaried) selected @endif>Salaried and can get a leave from my organization for at least the period until the course work is completed</option>
                                                            <option value="any-other">Any Other</option>

                                                    @else
                                                        <option value="National Level Eligibility Test" @if($national_level_eligibility_test) selected @endif>National Level Eligibility Test</option>
                                                        <option value="funded_government" @if($funded_government) selected @endif>Funded by any Government agency to pursue PhD</option>
                                                        <option value="salaried" @if($salaried) selected @endif>Salaried and can get a leave from my organization for at least the period until the course work is completed</option>
                                                        <option value="any-other">Any Other</option>
                                                    @endif
                                                   
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        @endforeach     
                                        
                                @elseif($programme->programme=='VirtualCampus')  
                            
                                    @foreach($courses as $course)
                                        <div class="row">
                                            <!-- Programme phd Name Dropdown -->
                                            <div class="col-md-6 mb-3 order-0">
                                                <label class="form-label"
                                                    >Select Programme  
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <select
                                                    class="form-control"
                                                    id="programme"
                                                    name="programme[]"
                                                    onchange="updateModeOfAdmission()"   
                                                >
                                                <option value="{{ $course->course_name }}">{{ ucwords(str_replace('-', ' ', $course->course_name)) }}</option>
                                              </select>
                                            </div>

                                            <!-- Dropdowns for Mode of Admission for each Programme -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label"
                                                    >Select Mode of Admission</label
                                                >
                                                <select
                                                    class="form-control"
                                                    id="phd-mode-of-admission"
                                                     name="mode_of_admission[]"
                                                >
                                                <option value="Online" selected >Online</option>                                                 
                                                </select>
                                            </div>
                                        </div>
                                        @endforeach             
                                @endif        
                            
    

                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-3">
                                <a
                                    href="{{route('programme.index')}}"
                                    class="btn btn-danger"
                                >
                                    Previous
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Save & Next
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <!-- Toast Notification -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div
                id="courseToast"
                class="toast"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
            >
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Course Selection</strong>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="toast"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="toast-body fw-bold">
                    You can only select up to 2 courses.
                </div>
            </div>
        </div>


@php
    use App\Models\StepStatus;
    use Illuminate\Support\Facades\Auth;
    $isEditMode = StepStatus::where('application_id', Auth::id())
                    ->where('edit_mode', 1)
                    ->exists();
@endphp
@if($isEditMode)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('input, textarea, select, button');
            inputs.forEach(input => input.setAttribute('disabled', 'true'));
        });
    </script>
@endif


@endsection
