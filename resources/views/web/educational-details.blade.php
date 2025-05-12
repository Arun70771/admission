@extends('web.layouts.main')
@section('content')
@php
    use App\Models\StepStatus;
    use Illuminate\Support\Facades\Auth;
    $isEditMode = StepStatus::where('application_id', Auth::id())
                    ->where('edit_mode', 1)
                    ->exists();
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
                            <strong>Educational Details</strong>
                        </div>

                    @php
                        $courseNames = ['MS-Data-Science-and-AI', 'MCA', 'MBA'];
                         $bachelors_courseExists = $courses->pluck('course_name')->intersect($courseNames)->isNotEmpty();
                    @endphp



                        @if($action=='add')
                            <form action="{{ route('store.educational-details') }}" method="post" class="p-4">
                                @csrf
                        @else
                        <form action="{{ route('update.educational-details', $data->id) }}" method="post" class="p-4">
                            @csrf
                            @method('PUT')
                        @endif    

                    


                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" width="30%">
                                            Name of the Degree
                                        </th>
                                        <th scope="col" width="30%">
                                            Passing Status
                                        </th>
                                        <th scope="col" width="30%">
                                            Passing Year
                                        </th>
                                        <th scope="col" width="30%">
                                            Specialization
                                        </th>
                                        <th scope="col" width="35%">
                                            Board/University
                                        </th>
                                        <th scope="col" width="40%">
                                            Percentage <br />
                                            <span style="font-size: 0.6rem"
                                                >(in case of CGPA, convert it to
                                                percentage using the conversion
                                                formula)</span
                                            >
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <td data-label="Name of the Degree">
                                            10th<span class="text-danger">*</span>
                                        </td>
                                        <td data-label="Passing Status">
                                            <select name="" class="form-select">
                                                <option value="Passed">Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year"><input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_10th"
                                                    value="{{old('passing_year_10th') ??  ($data ? $data->passing_year_10th : '')}}"
                                                    
                                                />
                                        </td>

                                        <td data-label="Specialization" class="bg-gray ps-3">
                                            <span class="text-dark">N/A</span>
                                        </td>

                                        <td data-label="Board/University">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="board_10th"
                                                value="{{ old('board_10th') ?? ($data ? $data->board_10th : '') }}"
                                                
                                            />
                                        </td>
                                        <td
                                            data-label="Percentage (in case of CGPA, convert it to percentage using the conversion formula)"
                                        >
                                            <input
                                                type="number"
                                                step="0.01" min="0" max="100"
                                                class="form-control"
                                                name="marks_10th"
                                                value="{{ old('marks_10th') ?? ($data ? $data->marks_10th : '') }}"
                                                
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Degree Name">12th<span class="text-danger">*</span></td>
                                        <td data-label="Passing Status">
                                            <select name="passing_status_12th" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Apearing" {{ old('passing_status_12th') == 'Apearing' || ($data && $data->passing_status_12th == 'Apearing') ? 'selected' : '' }}>Apearing</option>
                                                <option value="Passed" {{ old('passing_status_12th') == 'Passed' || ($data && $data->passing_status_12th == 'Passed') ? 'selected' : '' }}>Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_12th"
                                                    value="{{old('passing_year_12th') ??  ($data ? $data->passing_year_12th : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Specialization">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="specialization_12th"
                                                     value="{{old('specialization_12th') ??  ($data ? $data->specialization_12th : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Board/University">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="board_12th"
                                                 value="{{old('board_12th') ??  ($data ? $data->board_12th : '')}}"
                                                
                                            />
                                        </td>
                                        <td
                                            data-label="Percentage (in case of CGPA, convert it to percentage using the conversion formula)"
                                        >
                                            <input
                                                type="number"
                                                step="0.01" min="0" max="100"
                                                class="form-control"
                                                name="marks_12th"
                                                value="{{old('marks_12th') ??  ($data ? $data->marks_12th : '')}}"
                                                
                                            />
                                        </td>
                                    </tr>

                                @php
                                    $courses_name = [];
                                
                                    foreach ($courses as $key => $course) {
                                        $courses_name[] = $course->course_name;
                                    }
                                    $ms_course = ['MS-Data-Science-and-AI-Virtual-Campus', 'MCA-Virtual-Campus', 'MBA-Virtual-Campus'];
                                    $ms_course_exists = !empty(array_intersect($ms_course, $courses_name));
                                @endphp

                                @if($programme->programme=='masters' || $programme->programme=='phd' || $programme->programme=='executivePhd' || $bachelors_courseExists || $ms_course_exists)    
                                    <tr>
                                        <td data-label="Degree Name">
                                            Bachelor’s<span class="text-danger">*</span>
                                        </td>
                                        <td data-label="Passing Status">
                                            <select name="passing_status_bachelor" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Apearing" {{ old('passing_status_bachelor') == 'Apearing' || ($data && $data->passing_status_bachelor == 'Apearing') ? 'selected' : '' }}>Apearing</option>
                                                <option value="Passed" {{ old('passing_status_bachelor') == 'Passed' || ($data && $data->passing_status_bachelor == 'Passed') ? 'selected' : '' }}>Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_bachelor"
                                                   value="{{old('passing_year_bachelor') ??  ($data ? $data->passing_year_bachelor : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Specialization">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="specialization_bachelor"
                                                    value="{{old('specialization_bachelor') ??  ($data ? $data->specialization_bachelor : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Board/University">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="board_bachelors"
                                                value="{{old('board_bachelors') ??  ($data ? $data->board_bachelors : '')}}"
                                            />
                                        </td>
                                        <td
                                            data-label="Percentage (in case of CGPA, convert it to percentage using the conversion formula)"
                                        >
                                            <input
                                                type="number"
                                                step="0.01" min="0" max="100"
                                                class="form-control"
                                                name="marks_bachelors"
                                                
                                                value="{{old('marks_bachelors') ??  ($data ? $data->marks_bachelors : '')}}"
                                            />
                                        </td>
                                    </tr>
                               @endif

                               @if($programme->programme=='phd' || $programme->programme=='executivePhd')
                                <tr>
                                        <td data-label="Degree Name">
                                            Master’s<span class="text-danger">*</span>
                                        </td>
                                        <td data-label="Passing Status">
                                            <select name="passing_status_master" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Apearing" {{ old('passing_status_master') == 'Apearing' || ($data && $data->passing_status_master == 'Apearing') ? 'selected' : '' }}>Apearing</option>
                                                <option value="Passed" {{ old('passing_status_master') == 'Passed' || ($data && $data->passing_status_master == 'Passed') ? 'selected' : '' }}>Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_master"
                                                     value="{{old('passing_year_master') ??  ($data ? $data->passing_year_master : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Specialization">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="specialization_master"
                                                     value="{{old('passing_year_master') ??  ($data ? $data->passing_year_master : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Board/University">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="board_masters"
                                                value="{{old('board_masters') ??  ($data ? $data->board_masters : '')}}"
                                                
                                            />
                                        </td>
                                        <td
                                            data-label="Percentage (in case of CGPA, convert it to percentage using the conversion formula)"
                                        >
                                            <input
                                                type="number"
                                                step="0.01" min="0" max="100"
                                                class="form-control"
                                                name="marks_masters"
                                                value="{{old('marks_masters') ??  ($data ? $data->marks_masters : '')}}"
                                                
                                            />
                                        </td>
                                    </tr>
                                    @endif    
                                    <!--tr>
                                        <td scope="row" data-label="SNO.">5</td>
                                        <td data-label="Degree Name">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="Add New"
                                                placeholder="Add New"
                                            />
                                        </td>
                                        <td data-label="Board/University">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="board_masters"
                                                placeholder="Required for PhD applicants only"
                                            />
                                        </td>
                                        <td
                                            data-label="Percentage (in case of CGPA, convert it to percentage using the conversion formula)"
                                        >
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="marks_masters"
                                                placeholder="Enter Percentage (required for PhD applicants only)"
                                            />
                                        </td>
                                    </tr-->
                                </tbody>
                            </table>

                            @foreach ($exams as $exam => $status)

                            @php
                                $qualifying_data = \App\Models\ScoreModeOfAdmission::where('application_id', Auth::id())
                                    ->where('qualifying_name', $exam)
                                    ->first();
                            @endphp
                        
                            <input type="hidden" name="qualifying_name[]" value='{{ $exam }}'>
                        
                            @if ($status)
                                <table class="table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="30%">
                                                {{ $exam }}
                                            </th>
                                            <th scope="col" width="25%">
                                                Passing Status
                                            </th>
                                            <th scope="col" width="25%">
                                                Passing Year / Session
                                            </th>
                                            <th scope="col" width="20%">
                                                Score
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="{{ $exam }}">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="qualifying_name_of_degree[]"
                                                    placeholder="Please Enter {{ $exam }} Name"
                                                    value="{{ $exam ?? ($qualifying_data->qualifying_name_of_degree ?? '') }}"
                                                />
                                                @error('qualifying_name_of_degree')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                        
                                            <td data-label="Passing Status">
                                                <select name="qualifying_passing_status[]" class="form-select">
                                                    <option value="Passed" 
                                                        {{ old('qualifying_passing_status') == 'Passed' || ($qualifying_data && $qualifying_data->qualifying_passing_status == 'Passed') ? 'selected' : '' }}>
                                                        Passed
                                                    </option>
                                                    <option value="Apearing" 
                                                        {{ old('qualifying_passing_status') == 'Apearing' || ($qualifying_data && $qualifying_data->qualifying_passing_status == 'Apearing') ? 'selected' : '' }}>
                                                        Appearing
                                                    </option>
                                                </select>
                                                @error('qualifying_passing_status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                        
                                            <td data-label="Passing Year / Session">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="qualifying_passing_year[]"
                                                    value="{{ $qualifying_data->qualifying_passing_year ?? ''  }}"
                                                    placeholder="Passing Year"
                                                />
                                                @error('qualifying_passing_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                        
                                            <td data-label="Score">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="qualifying_score[]"
                                                    placeholder="Enter Score"
                                                    value="{{ $qualifying_data->qualifying_score ?? '' }}"
                                                />
                                                @error('qualifying_score')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        @endforeach

                        
                        

                            @if($national_eligibility_test)

                            <table class="table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col" width="30%">
                                            National Eligibility Test
                                        </th>
                                        <th scope="col" width="25%">
                                            Passing Status
                                        </th>
                                        <th scope="col" width="25%">
                                            Passing Year / Session
                                        </th>
                                        <th scope="col" width="20%">
                                            Score <br />
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="National Eligibility Test">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="national_eligibility_name"
                                                
                                                value="{{old('national_eligibility_name') ??  ($data ? $data->national_eligibility_name : '')}}"
                                            />
                                        </td>
                                        <td data-label="Passing Status">
                                            <select name="passing_status_national" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Apearing" {{ old('passing_status_national') == 'Apearing' || ($data && $data->passing_status_national == 'Apearing') ? 'selected' : '' }}>Apearing</option>
                                                <option value="Passed" {{ old('passing_status_national') == 'Passed' || ($data && $data->passing_status_national == 'Passed') ? 'selected' : '' }}>Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year / Session">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_national"
                                                   value="{{old('passing_year_national') ??  ($data ? $data->passing_year_national : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Score">
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="score_national"
                                                
                                                value="{{old('score_national') ??  ($data ? $data->score_national : '')}}"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                        
                         @endif   




                         @if($marks_qualifying_examination)
                            <table class="table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col" width="30%">
                                            Marks of Qualifying Examination
                                        </th>
                                        <th scope="col" width="25%">
                                            Passing Status
                                        </th>
                                        <th scope="col" width="25%">
                                            Passing Year / Session
                                        </th>
                                        <th scope="col" width="20%">
                                            Score <br />
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Marks of Qualifying Examination">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="marks_name_of_degree"
                                                    
                                                    value="{{old('marks_name_of_degree') ??  ($data ? $data->marks_name_of_degree : '')}}"
                                                />
                                        </td>
                                        <td data-label="Passing Status">
                                            <select name="passing_status_qualifying" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Apearing" {{ old('passing_status_qualifying') == 'Apearing' || ($data && $data->passing_status_qualifying == 'Apearing') ? 'selected' : '' }}>Apearing</option>
                                                <option value="Passed" {{ old('passing_status_qualifying') == 'Passed' || ($data && $data->passing_status_qualifying == 'Passed') ? 'selected' : '' }}>Passed</option>
                                            </select>
                                        </td>
                                        <td data-label="Passing Year / Session">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    name="passing_year_qualifying"
                                                   value="{{old('passing_year_qualifying') ??  ($data ? $data->passing_year_qualifying : '')}}"
                                                    
                                                />
                                        </td>
                                        <td data-label="Score">
                                            <input
                                                type="number"
                                                step="0.01" min="0" max="100"
                                                class="form-control"
                                                name="score_qualifying"
                                                
                                                value="{{old('score_qualifying') ??  ($data ? $data->score_qualifying : '')}}"

                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check ms-4">
                                                        <input class="form-check-input" type="radio" value="1" name="upload_score" id="flexRadioDefault1"
                                                            {{ (old('upload_score', $data ? $data->upload_score : '') == 1) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Upload Score Card/Marksheet
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check ms-4">
                                                        <input class="form-check-input" type="radio" value="0" name="upload_score" id="flexRadioDefault2" 
                                                             {{ (old('upload_score', $data ? $data->upload_score : '') == 0) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            To be updated later
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif

                            <!-- <button
                                type="button"
                                id="add-row"
                                onclick="addNewRow()"
                            >
                                Add New
                            </button> -->
                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-3">
                                <a
                                    href="{{route('index.mode-of-admissions')}}"
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
       @endsection