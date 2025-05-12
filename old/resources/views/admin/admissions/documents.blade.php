@extends('admin.layouts.main')

@section('mid-content')
    
    <!-- main-content -->
    <div class="main-content horizontal-content">

        <!-- container -->
        <div class="main-container container">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Admissions</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Admissions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($educational_docs as $key => $educational_doc)
                                    <div class="col-md-3">
                                        <a href="http://admissions.sau.ac.in/uploads/{{ $educational_doc->name }}"
                                            target="_blank">
                                            <h6 class="mt-2">{{ $educational_doc->name }}</h6>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if (!empty($data->candidate_signatures))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->candidate_signatures }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->candidate_signatures }}"
                                                alt="candidate_signatures" style="height: 100px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->short_cv))
                                    <div class="col-md-3">
                                        <a target="_blank" href="http://admissions.sau.ac.in/uploads/{{ $data->short_cv }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->short_cv }}"
                                                alt="short_cv" style="height: 100px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->educational_degrees))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->educational_degrees }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->educational_degrees }}"
                                                alt="educational_degrees" style="height: 100px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->national_fellowship_offer_letter))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->national_fellowship_offer_letter }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->national_fellowship_offer_letter }}"
                                                alt="national_fellowship_offer_letter" style="height: 100px;"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->government_funding_offer_letter))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->government_funding_offer_letter }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->government_funding_offer_letter }}"
                                                alt="government_funding_offer_letter" style="height: 100px;"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->photo_identity_card))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->photo_identity_card }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->photo_identity_card }}"
                                                alt="photo_identity_card" style="height: 100px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($data->passport))
                                    <div class="col-md-3">
                                        <a target="_blank"
                                            href="http://admissions.sau.ac.in/uploads/{{ $data->passport }}">
                                            <img src="http://admissions.sau.ac.in/uploads/{{ $data->passport }}"
                                                alt="passport" style="height: 100px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5">Personal Details</div>

                            <div class="row mt-3">
                                @if (!empty($data->name))
                                    <div class="col-md-3">
                                        <strong>Name</strong>
                                        <p>{{ $data->name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->email))
                                    <div class="col-md-3">
                                        <strong>Email</strong>
                                        <p>{{ $data->email }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->mobile))
                                    <div class="col-md-3">
                                        <strong>Mobile</strong>
                                        <p>{{ $data->mobile }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->dob))
                                    <div class="col-md-3">
                                        <strong>Date of Birth</strong>
                                        <p>{{ $data->dob }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->father_name))
                                    <div class="col-md-3">
                                        <strong>Father Name</strong>
                                        <p>{{ $data->father_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->gender))
                                    <div class="col-md-3">
                                        <strong>Gender</strong>
                                        <p>{{ $data->gender }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->nationality))
                                    <div class="col-md-3">
                                        <strong>Nationality</strong>
                                        <p>{{ $data->nationality }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="h5 mt-2">Adress Details</div>
                            <div class="row mt-3">
                                @if (!empty($data->address))
                                    <div class="col-md-3">
                                        <strong>Address</strong>
                                        <p>{{ $data->address }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->city))
                                    <div class="col-md-3">
                                        <strong>City</strong>
                                        <p>{{ $data->city }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->state))
                                    <div class="col-md-3">
                                        <strong>State</strong>
                                        <p>{{ $data->state }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->country))
                                    <div class="col-md-3">
                                        <strong>Country</strong>
                                        <p>{{ $data->country }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->pin_code))
                                    <div class="col-md-3">
                                        <strong>Pincode</strong>
                                        <p>{{ $data->pin_code }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="h5 bold mt-2">Educational Details</div>

                            <h5 class="text-success" class="mt-3">Details of Senior Secondary Education</h5>
                            <div class="row ps-3">
                                @if (!empty($data->s_passing))
                                    <div class="col-md-3">
                                        <strong>Passing Year</strong>
                                        <p>{{ $data->s_passing }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->s_board_name))
                                    <div class="col-md-3">
                                        <strong>Board Name</strong>
                                        <p>{{ $data->s_board_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->s_college_name))
                                    <div class="col-md-3">
                                        <strong>College Name</strong>
                                        <p>{{ $data->s_college_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->s_cgpa))
                                    <div class="col-md-3">
                                        <strong>CGPA</strong>
                                        <p>{{ $data->s_cgpa }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->s_subject))
                                    <div class="col-md-3">
                                        <strong>Subjects</strong>
                                        <p>{{ $data->s_subject }}</p>
                                    </div>
                                @endif
                            </div>

                            <h5 class="text-success">Details of bachelor's level Education</h5>
                            <div class="row ps-3">
                                @if (!empty($data->b_title))
                                    <div class="col-md-3">
                                        <strong>Title</strong>
                                        <p>{{ $data->b_title }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_passing_year))
                                    <div class="col-md-3">
                                        <strong>Passing Year</strong>
                                        <p>{{ $data->b_passing_year }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_board))
                                    <div class="col-md-3">
                                        <strong>Board Name</strong>
                                        <p>{{ $data->b_board }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_college_name))
                                    <div class="col-md-3">
                                        <strong>College Name</strong>
                                        <p>{{ $data->b_college_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_cgpa))
                                    <div class="col-md-3">
                                        <strong>CGPA</strong>
                                        <p>{{ $data->b_cgpa }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_subject))
                                    <div class="col-md-3">
                                        <strong>Subjects</strong>
                                        <p>{{ $data->b_subject }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_evaluation))
                                    <div class="col-md-3">
                                        <strong>Evaluation</strong>
                                        <p>{{ $data->b_evaluation }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->b_degree_duration))
                                    <div class="col-md-3">
                                        <strong>Degree Duration</strong>
                                        <p>{{ $data->b_degree_duration }}</p>
                                    </div>
                                @endif

                            </div>

                            <h5 class="text-success">Details of Master's level Education</h5>
                            <div class="row ps-3">
                                @if (!empty($data->m_title))
                                    <div class="col-md-3">
                                        <strong>Title</strong>
                                        <p>{{ $data->m_title }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_passing_year))
                                    <div class="col-md-3">
                                        <strong>Passing Year</strong>
                                        <p>{{ $data->m_passing_year }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_board))
                                    <div class="col-md-3">
                                        <strong>Board Name</strong>
                                        <p>{{ $data->m_board }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_college_name))
                                    <div class="col-md-3">
                                        <strong>College Name</strong>
                                        <p>{{ $data->m_college_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_cgpa))
                                    <div class="col-md-3">
                                        <strong>CGPA</strong>
                                        <p>{{ $data->m_cgpa }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_subject))
                                    <div class="col-md-3">
                                        <strong>Subjects</strong>
                                        <p>{{ $data->m_subject }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_evaluation))
                                    <div class="col-md-3">
                                        <strong>Evaluation</strong>
                                        <p>{{ $data->m_evaluation }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->m_degree_duration))
                                    <div class="col-md-3">
                                        <strong>Degree Duration</strong>
                                        <p>{{ $data->m_degree_duration }}</p>
                                    </div>
                                @endif

                            </div>

                            <div class="h5 mt-3">Further Information</div>
                            <div class="row">
                                @if (!empty($data->hostel_facility))
                                    <div class="col-md-3">
                                        <strong>Hostel Facility</strong>
                                        <p>{{ $data->hostel_facility }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->know_about))
                                    <div class="col-md-3">
                                        <strong>How do you know about us</strong>
                                        <p>{{ $data->know_about }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->C_employment_country))
                                    <div class="col-md-12">
                                        <strong>Country of Employment</strong>
                                        <p>{{ $data->C_employment_country }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->C_organization_name))
                                    <div class="col-md-12">
                                        <strong>Designation</strong>
                                        <p>{{ $data->C_organization_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->C_organization_nature))
                                    <div class="col-md-12">
                                        <strong>Organization</strong>
                                        <p>{{ $data->C_organization_nature }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->C_current_organization_years))
                                    <div class="col-md-12">
                                        <strong>Duration</strong>
                                        <p>{{ $data->C_current_organization_years }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->C_current_organization_month))
                                    <div class="col-md-12">
                                        <strong>Salary</strong>
                                        <p>{{ $data->C_current_organization_month }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->A_fellowship_name))
                                    <div class="col-md-12">
                                        <strong>Fellowship Name</strong>
                                        <p>{{ $data->A_fellowship_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->A_fellowship_country))
                                    <div class="col-md-12">
                                        <strong>Fellowship Country</strong>
                                        <p>{{ $data->A_fellowship_country }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->A_fellowship_entrance))
                                    <div class="col-md-12">
                                        <strong>Fellowship Entrance</strong>
                                        <p>{{ $data->A_fellowship_entrance }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->B_funding_agency))
                                    <div class="col-md-12">
                                        <strong>Funding Agency</strong>
                                        <p>{{ $data->B_funding_agency }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->B_funding_agency_name))
                                    <div class="col-md-12">
                                        <strong>Funding Agency Name</strong>
                                        <p>{{ $data->B_funding_agency_name }}</p>
                                    </div>
                                @endif

                                @if (!empty($data->B_funding_years_duration))
                                    <div class="col-md-12">
                                        <strong>Funding Years Duration</strong>
                                        <p>{{ $data->B_funding_years_duration }}</p>
                                    </div>
                                @endif


                            </div>





                        </div>


                    </div>
                </div>
                <!-- /row -->



                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="h5 mt-3">For Admission Office Only</div>
                                    </div>

                                    <input type="hidden" id="id" name="id" value="{{ $data->id }}">

                                    <div class="col-md-6">
                                        <label for="criteria">Eligibility Criteria:</label>
                                        <input type="text" id="criteria" name="criteria"
                                            placeholder="Enter eligibility criteria"
                                            value="{{ $office_data->criteria ?? null }}">

                                    </div>

                                    <div class="col-md-6">
                                        <label for="marks">Marks/CGPA/Division:</label>
                                        <input type="text" id="marks" name="marks"
                                            placeholder="Enter marks/CGPA/division"
                                            value="{{ $office_data->marks ?? null }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" id="check-level-1" name="check_level_1"
                                                @if (optional($office_data)->check_level_1) checked @endif> Eligibility Check Level 1
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" id="check-level-2" name="check_level_2"
                                                @if (optional($office_data)->check_level_2) checked @endif>
                                            Eligibility Check Level 2
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input @if (optional($office_data)->final_payment) checked @endif type="checkbox"
                                                id="final-payment" name="final_payment"> Final Payment
                                        </label>
                                    </div>


                                    @if ($data->programme == 'short_term')
                                        <div class="col-md-12">
                                            <div class="h5 mt-3"> Fee Structure for Short-Term Courses </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="radio" name="concession"
                                                                id="inservice_faculty" value="inservice_faculty"
                                                                @if (isset($office_data) && $office_data->concession == 'inservice_faculty') checked @endif>
                                                            In-service faculty members of SAARC nations. (<strong>INR
                                                                7,470/-</strong>)
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="radio" name="concession" id="sau_alumni"
                                                                value="sau_alumni"
                                                                @if (isset($office_data) && $office_data->concession == 'sau_alumni') checked @endif>
                                                            SAU alumni. (<strong>INR 7,470/-</strong>)
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="radio" name="concession" id="sau_students"
                                                                value="sau_students"
                                                                @if (isset($office_data) && $office_data->concession == 'sau_students') checked @endif>
                                                            <strong>For SAU Students</strong> (<strong>INR
                                                                4,980/-</strong>)
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="radio" name="concession" id="full_payment"
                                                                value="full_payment"
                                                                @if (isset($office_data) && $office_data->concession == 'full_payment') checked @endif>
                                                            <strong>Full Payment</strong> (<strong>INR 9,960 per
                                                                course</strong>)
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="radio" name="concession"
                                                                id="full_payment_ms" value="not_eligible"
                                                                @if (isset($office_data) && $office_data->concession == 'not_eligible') checked @endif>
                                                            <strong>Not Eligible</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                            @elseif ($data->programme == 'Masters')
                                                <div class="col-md-12">
                                                    <div class="h5 mt-3"> Fee Structure for MS (Data Science and Artificial
                                                        Intelligence) </div>
                                                    <div>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>
                                                                    <input type="radio" name="concession"
                                                                        id="inservice_faculty_ms"
                                                                        value="inservice_faculty_ms"
                                                                        @if (isset($office_data) && $office_data->concession == 'inservice_faculty_ms') checked @endif>
                                                                    In-service faculty members of SAARC nations <strong>(INR
                                                                        52,630/-)</strong>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>
                                                                    <input type="radio" name="concession"
                                                                        id="sau_students_alumni_ms"
                                                                        value="sau_students_alumni_ms"
                                                                        @if (isset($office_data) && $office_data->concession == 'sau_students_alumni_ms') checked @endif>
                                                                    SAU students and alumni <strong>(INR 52,630/-)</strong>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>
                                                                    <input type="radio" name="concession"
                                                                        id="full_payment_ms" value="full_payment_ms"
                                                                        @if (isset($office_data) && $office_data->concession == 'full_payment_ms') checked @endif>
                                                                    <strong>Full Payment (INR 64,030)</strong>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>
                                                                    <input type="radio" name="concession"
                                                                        id="full_payment_ms" value="installment_ms"
                                                                        @if (isset($office_data) && $office_data->concession == 'installment_ms') checked @endif>
                                                                    <strong>Installment (INR 41,230)</strong>
                                                                </label>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label>
                                                                    <input type="radio" name="concession"
                                                                        id="full_payment_ms" value="not_eligible"
                                                                        @if (isset($office_data) && $office_data->concession == 'not_eligible') checked @endif>
                                                                    <strong>Not Eligible</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                    @endif



                                    <div class="col-md-3">
                                        <button type="submit" id="admission_office">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="col-md-12">
                                        <label for="from">To:</label>
                                        <input type="hidden" id="from" placeholder="From" name="from"
                                            value="noreply-admission@sau.int">


                                        <input type="text" id="to_email" name="to_email"
                                            value="{{ $data->email }}">

                                        <input type="hidden" id="programme" name="programme"
                                            value="{{ $data->programme }}">
                                        <input type="hidden" id="name" name="name"
                                            value="{{ $data->name }}">



                                    </div>

                                    <div class="col-md-12">
                                        <label for="subject">Subject:</label>
                                        <input type="text" id="subject" placeholder="Subject" name="subject"
                                            value="@if ($data->programme == 'short_term') Admission Offer for Short Term Course at SAU
                                                   @elseif ($data->programme == 'Masters') 
                                                        Admission Offer for MS in Data Science and Artificial Intelligence (Online) at SAU @endif">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="mail_content">Mail Content:</label>
                                        <textarea id="mail_content" name="mail_content">
                                            @if ($data->programme == 'short_term')
<p>Dear&nbsp;{{ $data->name }},</p>
                                                    <p>Greetings from the South Asian University (SAU)!</p>
                                                    <p>Thank you for your interest in the Short Term Course at the South Asian University. We are pleased to inform you that, based on your application and credentials, you meet the admission criteria for this program.</p>
                                                    <p>To confirm your admission, you are required to complete the payment of the <strong>program fee of USD 120 / INR 9,960/-</strong>.</p>
                                                    <p>The fee must be paid <strong>within one week</strong>. For making the payment, kindly log in to the <a href="https://admissions.sau.ac.in/index.php/SignIn">SAU Admissions Portal</a> by using your login credentials.</p>
                                                    <p>We look forward to welcoming you to the SAU Virtual Campus. If you have any questions, please feel free to contact us.</p>
                                                    <p>&nbsp;</p>
                                                    <p><strong>Best wishes,</strong></p>
                                                    <p>Admissions Team</p>
                                                    <p>SAU</p>
@elseif ($data->programme == 'Masters')
<p>Dear {{ $data->name }},<br>Greetings from the South Asian University (SAU)!</p>
                                                    
                                                    <p>Thank you for your interest in the MS in Data Science and Artificial Intelligence - Online Degree Program at the South Asian University. We are pleased to inform you that, based on your application and credentials, you meet the admission criteria for this program.</p>
                                                    <p>As seats are limited, we request you to secure your admission by completing the necessary formalities. This includes the following program fee:</p>
                                                    <ul>
                                                    <li>Course Fee &ndash; USD 550 / INR 45,600 (per semester)</li>
                                                    <li>Admission Fee &ndash; USD 200 / INR 17,600 (One time)</li>
                                                    <li>Student Aid Fund &ndash; USD 10 / INR 830 (per semester)</li>
                                                    </ul>
                                                    <p>The total amount of USD 760/ INR 64,030/-must be paid&nbsp;<strong>within one week&nbsp;</strong>to confirm your admission. For making the payment, kindly log in to the&nbsp;<a href="https://admissions.sau.ac.in/index.php/SignIn">SAU Admissions Portal</a>&nbsp;by using your login credentials.</p>
                                                    <p>We look forward to welcoming you to the SAU Virtual Campus. If you have any questions, please feel free to contact us.</p>
                                                    <p>&nbsp;</p>
                                                    <p><strong>Best wishes,</strong></p>
                                                    <p>Admissions Team</p>
                                                    <p>SAU</p>
@endif
                                        </textarea>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" id="send-admission-offer">Send Admission Offer</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mail_content').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Retrieve content on submission
            $('#send-offer').click(function(e) {
                e.preventDefault();
                const mail_content = $('#mail_content').val();

                console.log(mail_content); // Use this in your AJAX data
            });
        });
    </script>


    <script>
        $('#send-admission-offer').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('sendAdmissionOffer') }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    from: $('#from').val(),
                    subject: $('#subject').val(),
                    mail_content: $('#mail_content').val(),
                    to_email: $('#to_email').val(),
                    name: $('#name').val(),
                    programme: $('#programme').val(),
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                    console.log(response);
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.responseJSON.message || 'Something went wrong!',
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#admission_office').click(function(e) {
                e.preventDefault();

                console.log($('input[name="concession"]:checked').val());

                let data = {
                    // id: $('#id').val(),
                    criteria: $('#criteria').val(),
                    marks: $('#marks').val(),
                    concession: $('input[name="concession"]:checked').val(),
                    check_level_1: $('#check-level-1').is(':checked') ? 1 : 0,
                    check_level_2: $('#check-level-2').is(':checked') ? 1 : 0,
                    final_payment: $('#final-payment').is(':checked') ? 1 : 0,
                    id: $('#id').val() // Optional for updating a record
                };

                $.ajax({
                    url: '{{ route('admission_office_store_update') }}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            html: `
                                    <p>Your data was saved successfully.</p>
                                `,
                            confirmButtonText: 'Great!',
                            footer: '<a href="#">Need help?</a>'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Optional: Additional action when user clicks "OK"
                                console.log('User confirmed success.');
                            }
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to save data.',
                            footer: '<a href="/support">Contact support</a>',
                        });
                    }

                });
            });
        });
    </script>

    <style>
        .note-toolbar {
            flex-wrap: nowrap !important;
            /* Prevent wrapping */
            overflow-x: auto;
            /* Allow horizontal scroll if needed */
            white-space: nowrap;
            /* Prevent text from wrapping */
        }

        .note-toolbar .note-btn-group {
            display: inline-flex !important;
            /* Arrange toolbar groups inline */
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Style for the form container */
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        /* Style for labels */
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        /* Style for text inputs */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Style for checkboxes */
        input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            accent-color: #007bff;
            /* For modern browsers */
        }

        /* Checkbox labels */
        label input[type="checkbox"]+span {
            font-size: 14px;
            vertical-align: middle;
            cursor: pointer;
        }

        /* Style for the submit button */
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }


        /* Style for the radio buttons */
        input[type="radio"] {
            appearance: none;
            /* Remove default radio button styling */
            width: 20px;
            height: 20px;
            border: 2px solid #007bff;
            /* Add a border with a primary color */
            border-radius: 50%;
            /* Make it circular */
            outline: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        /* When the radio button is checked */
        input[type="radio"]:checked {
            background-color: #007bff;
            /* Fill with the primary color */
            border-color: #0056b3;
            /* Change border color */
        }

        /* Add a dot inside the selected radio button */
        input[type="radio"]:checked::after {
            content: '';
            width: 10px;
            height: 10px;
            background-color: white;
            /* Dot color */
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Add hover effect */
        input[type="radio"]:hover {
            border-color: #0056b3;
            /* Darker border on hover */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Glow effect */
        }
    </style>
@endsection
