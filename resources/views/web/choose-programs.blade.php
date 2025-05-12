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
                            <strong>Choose Programme and Course</strong>
                        </div>

                        <form class="p-4" action="{{route('store.programme')}}" method="post">
                            @csrf
                            <div class="row">
                                <!-- Programme Name Dropdown -->
                                <div class="col-md-6 mb-3 order-0">
                                    <label class="form-label">Select Programme
                                        <span class="text-danger">*</span></label>

                                        <select class="form-control" id="programme" name="programme" onchange="updateCourses()" required>
                                            <option value="">Select Programme</option>
                                            <option value="bachelors" @if(optional($programme)->programme == 'bachelors') selected @endif >Bachelors</option>
                                            <option value="masters" @if(optional($programme)->programme == 'masters') selected @endif >Masters</option>
                                            <option value="phd" @if(optional($programme)->programme == 'phd') selected @endif >PhD</option>
                                            <option value="executivePhd" @if(optional($programme)->programme == 'executivePhd') selected @endif >Executive PhD</option>
                                            <option value="VirtualCampus" @if(optional($programme)->programme == 'VirtualCampus') selected @endif >Virtual Campus</option>
                                        </select>
                                </div>

                                <div
                                    class="col-md-6 order-1 order-sm-3 order-lg-0"
                                >
                                    <label class="form-label">Registration Fee(₹)</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        disabled
                                        id="course-fee"
                                        name="course_fee"
                                        value="{{$programme->course_fee ?? ''}}"
                                    />
                                </div>

                                <!-- Course Options (Checkboxes) -->
                                <div class="col-md-12 order-2 mb-3">
                                    <label class="form-label"
                                        >Select Courses
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <div id="courses" class="form-check">
                                        <!-- Bachelors Courses (Hidden by default) -->


                                        <div
                                            class="bachelors"
                                            @if(optional($programme)->programme == 'bachelors') 
                                                style="display: grid" 
                                            @else 
                                                style="display: none" 
                                            @endif
                                            >                                           
                                            @php
                                                $selectedCourses = $course->pluck('course_name')->toArray();
                                            @endphp

                                           
                                            @foreach($bachelor_courses as $bachelor_course)
                                                <input
                                                    class="form-check-input course-checkbox"
                                                    type="checkbox"
                                                    value="{{$bachelor_course->slug}}"
                                                    id="{{$bachelor_course->slug}}"
                                                    name="courses[]"
                                                    data-fee="{{$bachelor_course->reg_fee}}"
                                                    {{ in_array($bachelor_course->slug, $selectedCourses) ? 'checked' : '' }}
                                                />
                                                <label class="form-check-label" for="{{$bachelor_course->slug}}">
                                                    {{$bachelor_course->course_name}}
                                                </label>
                                            @endforeach   
                                            


                                        </div>

                                        <!-- Masters Courses (Hidden by default) -->
                                        <div
                                            class="masters"
                                            @if(optional($programme)->programme == 'masters') 
                                                style="display: grid" 
                                            @else 
                                                style="display: none" 
                                            @endif
                                        >
                                        
                                            @php
                                                $selectedCourses = $course->pluck('course_name')->toArray();
                                            @endphp

                                            
                                            @foreach($master_courses as $master_course)
                                                <input
                                                    class="form-check-input course-checkbox"
                                                    type="checkbox"
                                                    value="{{$master_course->slug}}"
                                                    id="{{$master_course->slug}}"
                                                    name="courses[]"
                                                    data-fee="{{$master_course->reg_fee}}"
                                                    {{ in_array($master_course->slug, $selectedCourses) ? 'checked' : '' }}
                                                />
                                                <label class="form-check-label" for="{{$master_course->slug}}">
                                                    {{$master_course->course_name}}
                                                </label>
                                            @endforeach  
                                            

                                        
                                        </div>

                                        <!-- PhD Courses (Hidden by default) -->
                                        <div class="phd" @if(optional($programme)->programme == 'phd') style="display: grid" @else style="display: none" @endif>
                                        @php
                                            $selectedCourses = $course->pluck('course_name')->toArray();
                                        @endphp

                                        
                                        @foreach($php_courses as $php_course)
                                                <input
                                                    class="form-check-input course-checkbox"
                                                    type="checkbox"
                                                    value="{{$php_course->slug}}"
                                                    id="{{$php_course->slug}}"
                                                    name="courses[]"
                                                    data-fee="{{$php_course->reg_fee}}"
                                                    {{ in_array($php_course->slug, $selectedCourses) ? 'checked' : '' }}
                                                />
                                                <label class="form-check-label" for="{{$php_course->slug}}">
                                                    {{$php_course->course_name}}
                                                </label>
                                            @endforeach  

                                        

                                        </div>

                                        <!-- Executive PhD Courses (Hidden by default) -->
                                        <div
                                            class="executivePhd"
                                            style="display: none"
                                        >


                                        @foreach($executive_php_courses as $executive_php_course)
                                                <input
                                                    class="form-check-input course-checkbox"
                                                    type="checkbox"
                                                    value="{{$executive_php_course->slug}}"
                                                    id="{{$executive_php_course->slug}}"
                                                    name="courses[]"
                                                    data-fee="{{$executive_php_course->reg_fee}}"
                                                    {{ in_array($php_course->slug, $selectedCourses) ? 'checked' : '' }}
                                                />
                                                <label class="form-check-label" for="{{$executive_php_course->slug}}">
                                                    {{$executive_php_course->course_name}}
                                                </label>
                                            @endforeach                                              
                                        </div>

                                        <!-- VirtualCampus (Hidden by default) -->
                                     
                                            <div class="VirtualCampus" @if(optional($programme)->programme == 'VirtualCampus') style="display: grid" @else style="display: none" @endif>
                                            @php
                                                $selectedCourses = $course->pluck('course_name')->toArray();
                                            @endphp


                                            @foreach($virtual_campus_courses as $virtual_campus_course)
                                                    <input
                                                        class="form-check-input course-checkbox"
                                                        type="checkbox"
                                                        value="{{$virtual_campus_course->slug}}"
                                                        id="{{$virtual_campus_course->slug}}"
                                                        name="courses[]"
                                                        data-fee="{{$virtual_campus_course->reg_fee}}"
                                                        {{ in_array($virtual_campus_course->slug, $selectedCourses) ? 'checked' : '' }}
                                                    />
                                                    <label class="form-check-label" for="{{$virtual_campus_course->slug}}">
                                                        {{$virtual_campus_course->course_name}}
                                                    </label>
                                                @endforeach                                              
                                            </div>
                                  


                                        



                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-3">
                                <a
                                    href="{{route('application-form')}}"
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

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById("sidebar");
                const body = document.body;
                sidebar.classList.toggle("show");
                // body.classList.toggle("sidebar-open");
            }
        </script>
        <!-- JavaScript -->
        <script>
            let selectedCoursesCount = 0;

            // Function to update the courses based on the selected programme
            function updateCourses() {
                const programme = document.getElementById("programme").value;

                // Hide all courses
                document
                    .querySelectorAll(
                        ".bachelors, .masters, .phd, .executivePhd, .VirtualCampus"
                    )
                    .forEach((el) => (el.style.display = "none"));

                // Show relevant courses based on the programme
                if (programme === "bachelors") {
                    document.querySelector(".bachelors").style.display =
                        "grid";
                    const checkboxes =
                        document.querySelectorAll(".course-checkbox");
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                } else if (programme === "masters") {
                    document.querySelector(".masters").style.display = "grid";
                    const checkboxes =
                        document.querySelectorAll(".course-checkbox");
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                } else if (programme === "phd") {
                    document.querySelector(".phd").style.display = "grid";
                    const checkboxes =
                        document.querySelectorAll(".course-checkbox");
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                } else if (programme === "executivePhd") {
                    document.querySelector(".executivePhd").style.display =
                        "grid";
                    const checkboxes =
                        document.querySelectorAll(".course-checkbox");
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                }else if (programme === "VirtualCampus") {
                    document.querySelector(".VirtualCampus").style.display =
                        "grid";
                    const checkboxes =
                        document.querySelectorAll(".course-checkbox");
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                }


                
            }

            
            // Function to handle the course selection count
            function handleCourseSelection(event) {
                const checkboxes =
                    document.querySelectorAll(".course-checkbox");
                selectedCoursesCount = Array.from(checkboxes).filter(
                    (checkbox) => checkbox.checked
                ).length;

                // If more than 2 courses are selected, uncheck the current checkbox
                if (selectedCoursesCount > 20) {
                    event.target.checked = false;

                    // Show toast message
                    const toast = new bootstrap.Toast(
                        document.getElementById("courseToast")
                    );
                    toast.show();
                }
            }

            // Function to calculate and display the total fee
            function calculateTotalFee() {
                let totalFee = 0;
                const selectedCourses = document.querySelectorAll(
                    ".course-checkbox:checked"
                );

                selectedCourses.forEach((course) => {
                    const fee = parseInt(course.getAttribute("data-fee"));
                    if (isNaN(fee)) {
                        totalFee += 0;
                    } else {
                        totalFee += fee;
                    }
                });

                // Update the course fee input with the calculated total
                document.getElementById(
                    "course-fee"
                ).value = `${totalFee.toLocaleString()}`;
            }

            // Attach event listener to all checkboxes
            document
                .querySelectorAll(".course-checkbox")
                .forEach((checkbox) => {
                    checkbox.addEventListener("change", (event) => {
                        handleCourseSelection(event);
                        calculateTotalFee();
                    });
                });
        </script>

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