@php     use App\Models\StepStatus;
$step_status = StepStatus::where('application_id',Auth::id())->first();
$preview_finalsubmit = StepStatus::where('application_id', Auth::id())->where('preview_finalsubmit', 1)->exists();
$payment_complate = StepStatus::where('application_id',Auth::id())->where('payment_complate',1)->first();

@endphp



<nav id="sidebar" class="col-md-4 col-lg-3 sidebar d-md-block">
                    <button class="close-btn" onclick="toggleSidebar()">
                        &times;
                    </button>



                    <div class="sidebar-item mb-4">
                        <div class="card">
                            <div class="card-header text-white">
                                <strong>Available Services </strong>
                            </div>

                            @if($step_status && $step_status->edit_mode)


                            <!--  ----------- Start Edit Mode - ----------  -->



                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item">
                                    <i class="bi bi-speedometer text-success"></i>
                                    <a href="{{route('application-status')}}" class="text-decoration-none ">
                                        Dashboard</a>
                                </li>
                    
                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <a href="{{ route('application-form') }}" class="text-decoration-none ">
                                        Application Form</a>
                                </li>


                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <a href="{{route('programme.index')}}" class="text-decoration-none"> Choose Programme and Course</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <a href="{{route('index.mode-of-admissions')}}" class="text-decoration-none"> Modes of Admission</a>
                                </li>


                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <a href="{{route('index.educational-details')}}" class="text-decoration-none"> Educational Details</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <a @if($step_status && $step_status->upload_documents ) href="{{route('index.file-upload')}}" @else href="#" data-bs-toggle="tooltip" 
                                       data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none"> Upload Documents</a>
                                </li>
                       
                                <li class="list-group-item">
                                    <i class="bi bi-upload text-success"></i>
                                    <a href="{{route('index.preview')}}" class="text-decoration-none">  Preview & Final Submit</a>
                                </li>

                                {{-- <li class="list-group-item">
                                    <i class="bi bi-credit-card text-success"
                                    ></i>
                                    <a @if($step_status && $step_status->pay_fee ) href="{{route('index.payment')}}" @else href="#" data-bs-toggle="tooltip" 
                                       data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none">   Pay Registration Fee</a>
                                </li> --}}

                            </ul>




                            <!--  ------------ End Edit Mode  ----------  -->

                            @else
                           

                                    <ul class="list-group list-group-flush">
                                        
                                        <li class="list-group-item">
                                            <i class="bi bi-speedometer @if($step_status && $step_status->application_form) text-success @else text-danger @endif"></i>

                                            <a href="{{route('application-status')}}" class="text-decoration-none ">
                                                Dashboard</a
                                            >
                                        </li>

                                        @if(!$step_status || $step_status->payment_complate != 1)

                                        @if(!$preview_finalsubmit)

                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-check-circle-fill @if($step_status && $step_status->application_form) text-success @else text-danger @endif"
                                            ></i>
                                            <a href="{{ $preview_finalsubmit ? route('index.payment') : route('application-form') }}" class="text-decoration-none ">
                                                Application Form</a>
                                        </li>


                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-check-circle-fill @if($step_status && $step_status->programme_course) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->programme_course) href="{{route('programme.index')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none"> Choose Programme and Course</a>
                                        </li>

                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-check-circle-fill @if($step_status && $step_status->mode_admission ) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->mode_admission ) href="{{route('index.mode-of-admissions')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none"> Modes of Admission</a>
                                        </li>


                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-check-circle-fill @if($step_status && $step_status->educational_details ) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->educational_details ) href="{{route('index.educational-details')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none"> Educational Details</a>
                                        </li>

                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-check-circle-fill @if($step_status && $step_status->upload_documents ) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->upload_documents ) href="{{route('index.file-upload')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none"> Upload Documents</a>
                                        </li>

                                        @endif


                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-upload @if($step_status && $step_status->preview_finalsubmit ) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->preview_finalsubmit ) href="{{route('index.preview')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none">  Preview & Final Submit</a>
                                        </li>

                                        <li class="list-group-item">
                                            <i
                                                class="bi bi-credit-card @if($step_status && $step_status->pay_fee ) text-success @else text-danger @endif"
                                            ></i>
                                            <a @if($step_status && $step_status->pay_fee ) href="{{route('index.payment')}}" @else href="#" data-bs-toggle="tooltip" 
                                            data-bs-placement="top"  title="Please complete the previous step" @endif class="text-decoration-none">   Pay Registration Fee</a>
                                        </li>
                                        
                                        @endif
                                    </ul>

                        @endif    



                        </div>
                    </div>
     

                    <!--div class="sidebar-item mb-4">
                        <div class="card">
                            <div class="card-header text-white">
                                <strong>Verify Email Id & Mobile Number </strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i
                                        class="bi bi-check-circle-fill text-dark"
                                    ></i>
                                    <a href="#" class="text-decoration-none">
                                        Mobile Number Verified</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <i
                                        class="bi bi-check-circle-fill text-dark"
                                    ></i>
                                    <a href="#" class="text-decoration-none">
                                        Email Id Verified</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div-->

                    <div class="sidebar-item mb-4">
                        <div class="card">
                            <div class="card-header text-white">
                                <strong>Contact Us</strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="bi bi-envelope text-dark"></i>
                                    <a href="#" class="text-decoration-none">
                                        technical@sau.int</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-envelope text-dark"></i>
                                    <a href="#" class="text-decoration-none">
                                        admission@sau.int</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-phone text-dark"></i>
                                    <a href="#" class="text-decoration-none">
                                        011-35656600</a
                                    >
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-geo text-dark"></i>
                                    <a href="#" class="text-decoration-none">
                                        Rajpur Road, Maidan Garhi, <br />New
                                        Delhi 110068</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>