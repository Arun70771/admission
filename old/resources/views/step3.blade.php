@extends('layouts.main')
@section('content')

    <!-- content-here -->
    <div class="content-container" id="content">
        <!-- dashboard page -->
        <div class="page page-dashboard">
            <style>
                .passport_detail,
                .suspended,
                .chronic_ailment {
                    display: none;
                }
            </style>
            <style>
                .C_list {
                    height: 210px;
                    overflow: auto;
                }

                .form-horizontal .form-group {
                    margin-left: 0;
                    margin-right: 0;
                }

                /*.checkbox1 {
                                                  position: relative;font-weight: normal;
                                                  cursor: pointer;user-select: none;font-family: Arial,Helvetica,sans-serif;
                                                  font-size: small;    line-height: 27px;letter-spacing: .5px;    margin-right: 20px;
                                                  }
                                                  .checkbox1:before {
                                                  content: "";
                                                  width: 20px;
                                                  height: 20px;
                                                  top: -7px;
                                                  left: -3.9px;
                                                  border: 2px solid #919191;
                                                  box-shadow: 0 1px 1px rgb(0 0 0 / 5%); position:absolute;    border-radius: 100%;
                                                  background-color: #ffffff;
                                                  }
                                                  .checkbox1:after {
                                                  content: "";
                                                  width: 10px;
                                                  height: 10px;
                                                  border-radius: 100%;
                                                  top: 6px;
                                                  left: 5px;
                                                  background: #6a6a6a;
                                                  }*/
            </style>
            <div class="page-wrap">
                <form role="form" class="form-horizontal" id="personalform" method="post" action="{{ url('insert3') }}">
                    @csrf

                    <div class="row">
                        <!-- dashboard header -->
                        <div class="col-md-12">
                            <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                                <div class="left">
                                    <h4 class="mb5 text-light">Education Details</h4>
                                    <input type="hidden" id="UserGenno" />
                                    <input type="hidden" id="hIntl" value="0">
                                </div>
                                <div class="right mt10">
                                    <p class="small text-danger"><strong>*</strong> Denotes mandatory field </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #end row -->


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif(Session::has('warning'))
                        <div class="alert alert-danger">{{ Session::get('warning') }} </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12 col-md-12 fullwidth">
                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">
                                    Details of Senior Secondary Level Education (12th)<br>
                                </div>
                                <div class="panel-body fatherDetails">

                                    <input type="hidden" class="form-control" name="programme"
                                        value="{{ $data->programme ? $data->programme : '' }}">

                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Year of Passing <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <select type="text" class="form-control" name="s_passing">
                                                <option value="">Select</option>
                                                <option {{ $data->s_passing == 'Before 2020' ? 'selected' : '' }}>Before
                                                    2020</option>
                                                <option {{ $data->s_passing == '2020' ? 'selected' : '' }}>2020</option>
                                                <option {{ $data->s_passing == '2021' ? 'selected' : '' }}>2021</option>
                                                <option {{ $data->s_passing == '2022' ? 'selected' : '' }}>2022</option>
                                                <option {{ $data->s_passing == '2023' ? 'selected' : '' }}>2023</option>
                                                <option {{ $data->s_passing == '2024' ? 'selected' : '' }}>2024</option>
                                                @if ($data->programme == 'b-tech')
                                                    <option {{ $data->s_passing == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option {{ $data->s_passing == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    <option {{ $data->s_passing == '2025' ? 'selected' : '' }}>2025
                                                    </option>
                                                    <option {{ $data->s_passing == 'Appearing' ? 'selected' : '' }}>
                                                        Appearing</option>
                                                @endif


                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Marks %age / CGPA
                                            <!--span class="text-danger">*</span--></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="s_cgpa"
                                                value="{{ $data->s_cgpa ? $data->s_cgpa : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Name of School/College <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="s_college_name"
                                                value="{{ $data->s_college_name ? $data->s_college_name : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Name of Board <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="s_board_name"
                                                value="{{ $data->s_board_name ? $data->s_board_name : '' }}">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">Main Subject Studied <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="s_subject"
                                                value="{{ $data->s_subject ? $data->s_subject : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-md-5 control-label">City/Region & Country <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="s_country"
                                                value="{{ $data->s_country ? $data->s_country : '' }}">
                                        </div>
                                    </div>

                                    @if ($data->programme == 'b-tech')
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">JEE Score

                                                <!--span class="text-danger">*</span-->

                                            </label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="jee_score"
                                                    value="{{ $data->jee_score ? $data->jee_score : '' }}">
                                            </div>
                                        </div>
                                    @endif




                                </div>
                            </div>
                        </div>


                        @if ($data->programme == 'm-tech' || $data->programme == 'Masters' || $data->programme == 'PhD')
                            <div class="col-sm-12 col-md-12 fullwidth">
                                <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-heading"> Details of Bachelor’s Level Education<br>
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Title of the Bachelor’s Degree <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="b_title"
                                                    value="{{ $data->b_title ? $data->b_title : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Year / Expected Year of Passing<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select type="text" class="form-control" name="b_passing" checked>
                                                    <option value="">Select</option>
                                                    <option {{ $data->b_passing == 'Before 2020' ? '' : '' }}>Before 2020
                                                    </option>
                                                    <option {{ $data->b_passing == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option {{ $data->b_passing == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option {{ $data->b_passing == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option {{ $data->b_passing == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option {{ $data->b_passing == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    <option {{ $data->b_passing == '2025' ? 'selected' : '' }}>2025
                                                    </option>
                                                    <option {{ $data->s_passing == 'Appearing' ? 'selected' : '' }}>
                                                        Appearing</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Duration of your Bachelor’s degree? <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select type="text" class="form-control" name="b_degree_duration">
                                                    <option value="">Select</option>
                                                    <option {{ $data->b_degree_duration == '2 Years' ? 'selected' : '' }}>2
                                                        Years</option>
                                                    <option {{ $data->b_degree_duration == '3 Years' ? 'selected' : '' }}>3
                                                        Years</option>
                                                    <option {{ $data->b_degree_duration == '4 Years' ? 'selected' : '' }}>4
                                                        Years</option>
                                                    <option {{ $data->b_degree_duration == '5 Years' ? 'selected' : '' }}>5
                                                        Years</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6" style="margin-bottom: 36px;">
                                            <label class="col-md-5 control-label">Examination System <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <label class="radio-inline">
                                                    <input type="radio" name="b_examination" value="Annual"
                                                        {{ $data->b_examination == 'Annual' ? 'checked' : '' }}>
                                                    Annual</label>
                                                &nbsp;
                                                <label class="radio-inline">
                                                    <input type="radio" name="b_examination" value="Semester"
                                                        {{ $data->b_examination == 'Semester' ? 'checked' : '' }}>Semester
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Place of Issue <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="poi"
                                                    value="{{ $data->poi ? $data->poi : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Name of School/College <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="b_college"
                                                    value="{{ $data->b_college ? $data->b_college : '' }}">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Evaluation System <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <label class="radio-inline">
                                                    <input type="radio" name="b_evaluation" value="Percentage"
                                                        onclick="bachelorPercentage();"
                                                        {{ $data->b_evaluation == 'Percentage' ? 'checked' : 'checked' }}>
                                                    Percentage
                                                </label>
                                                &nbsp;
                                                <label class="radio-inline">
                                                    <input type="radio" name="b_evaluation" value="GPA"
                                                        onclick="bachelorGPA();"
                                                        {{ $data->b_evaluation == 'GPA' ? 'checked' : '' }}>GPA
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6" id="bachelorGPA" style="display:none;">
                                            <label class="col-md-3 control-label">What is max GPA <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="b_gpa"
                                                    value="{{ $data->b_gpa ? $data->b_gpa : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Marks %age / CGPA <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="b_cgpa"
                                                    value="{{ $data->b_cgpa ? $data->b_cgpa : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Main Subject Studied <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="b_studied"
                                                    value="{{ $data->b_studied ? $data->b_studied : '' }}">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">City/Region & Country <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="b_country"
                                                    value="{{ $data->b_country ? $data->b_country : '' }}">
                                            </div>
                                        </div>

                                        @if ($data->programme == 'Masters')
                                            <div class="form-group col-md-12">
                                                <label class="col-md-5 control-label">Have you completed your Bachelor’s
                                                    degree? <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <label class="radio-inline"><input type="radio"
                                                            name="bachelor_degree" value="Yes"
                                                            {{ $data->bachelor_degree == 'Yes' ? 'checked' : '' }}>
                                                        Yes</label>
                                                    &nbsp;
                                                    <label class="radio-inline"><input type="radio"
                                                            name="bachelor_degree" value="No"
                                                            {{ $data->bachelor_degree == 'No' ? 'checked' : '' }}>No</label>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($data->programme == 'm-tech')
                                            <div class="form-group col-md-6">
                                                <label class="col-md-5 control-label">GATE Score
                                                    <!--span class="text-danger">*</span-->
                                                </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="gate_score"
                                                        value="{{ $data->gate_score ? $data->gate_score : '' }}">
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        @endif












                        @if ($data->programme == 'PhD')
                            <div class="col-sm-12 col-md-12 fullwidth">
                                <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-heading">Details of Master’s Level Education<br></div>
                                    <div class="panel-body">


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Title of the Master’s Degree <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_title"
                                                    value="{{ $data->m_title ? $data->m_title : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Year / Expected Year of Passing</label>
                                            <div class="col-md-7">
                                                <select type="text" class="form-control" name="m_passing"
                                                    checked="">
                                                    <option value="">Select</option>
                                                    <option {{ $data->m_passing == 'Before 2020' ? 'selected' : '' }}>
                                                        Before 2020</option>
                                                    <option {{ $data->m_passing == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option {{ $data->m_passing == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option {{ $data->m_passing == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option {{ $data->m_passing == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option {{ $data->m_passing == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    <option {{ $data->m_passing == '2025' ? 'selected' : '' }}>2025
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Marks %age / CGPA</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_cgpa"
                                                    value="{{ $data->m_cgpa ? $data->m_cgpa : '' }}">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Name of College and City</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_college" required
                                                    value="{{ $data->m_college ? $data->m_college : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Name of Board</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_board" required
                                                    value="{{ $data->m_board ? $data->m_board : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Main Subject Studied</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_studied" required
                                                    value="{{ $data->m_studied ? $data->m_studied : '' }}">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Duration of your Master’s degree?</label>
                                            <div class="col-md-7">
                                                <select type="text" class="form-control" name="m_degree_duration"
                                                    required>
                                                    <option value="">Select</option>
                                                    <option {{ $data->m_degree_duration == '1 Year' ? 'selected' : '' }}>1
                                                        Year</option>
                                                    <option {{ $data->m_degree_duration == '2 Years' ? 'selected' : '' }}>2
                                                        Years</option>
                                                    <option {{ $data->m_degree_duration == '3 Years' ? 'selected' : '' }}>3
                                                        Years</option>
                                                    <option {{ $data->m_degree_duration == '4 Years' ? 'selected' : '' }}>4
                                                        Years</option>
                                                    <option {{ $data->m_degree_duration == '5 Years' ? 'selected' : '' }}>5
                                                        Years</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Have you completed your Master’s degree?
                                            </label>
                                            <div class="col-md-7">
                                                <label class="radio-inline"><input type="radio" name="master_degree"
                                                        value="Yes" checked=""> Yes</label>
                                                <label class="radio-inline"><input type="radio" name="master_degree"
                                                        value="No">No</label>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Examination System </label>
                                            <div class="col-md-7">
                                                <label class="radio-inline"><input type="radio" name="m_examination"
                                                        value="Annual" checked="" checked=""> Annual</label>
                                                <label class="radio-inline"><input type="radio" name="m_examination"
                                                        value="Semester">Semester</label>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 control-label">Evaluation System</label>
                                            <div class="col-md-7">
                                                <label class="radio-inline"><input type="radio" name="m_evaluation"
                                                        value="Percentage" onclick="PhDPercentage();" checked="">
                                                    Percentage</label>
                                                <label class="radio-inline"><input type="radio" name="m_evaluation"
                                                        value="GPA" onclick="PhDGPA();">GPA</label>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6" id="PhDGPA" style="display:none;">
                                            <label class="col-md-5 control-label">what is max GPA</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="m_gpa"
                                                    value="{{ $data->m_gpa ? $data->m_gpa : '' }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif


                        @if ($data->saarc != 'non-saarc')
                            @if ($data->programme != 'm-tech')
                                @if ($data->programme != 'b-tech')
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <i class="icon-calendar"></i>
                                                <h3 class="panel-heading">Which of the following applies to you? </h3>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <p> <input type="radio" name="fellowship" value="A"
                                                                {{ $data->fellowship == 'A' ? 'checked' : '' }}
                                                                onclick="NationalFellowshipYes();"> A: You have been
                                                            already awarded National fellowship in any SAARC country on the
                                                            basis of the National Entrance Tests.</p>
                                                    </div>

                                                    <div id="NationalFellowship" style="display:none;">

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Name of the National
                                                                Fellowship</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="A_fellowship_name"
                                                                    value="{{ $data->A_fellowship_name ? $data->A_fellowship_name : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Country of
                                                                Fellowship</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="A_fellowship_country"
                                                                    value="{{ $data->A_fellowship_country ? $data->A_fellowship_country : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Year in which National
                                                                Entrance Test was cleared</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="A_fellowship_entrance"
                                                                    value="{{ $data->A_fellowship_entrance ? $data->A_fellowship_entrance : '' }}">
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="col-lg-12 col-sm-12">
                                                        <p><input type="radio" name="fellowship"
                                                                {{ $data->fellowship == 'B' ? 'checked' : '' }}
                                                                value="B" onclick="governmentYes();"> B. You are
                                                            funded by any Government agency to pursue PhD. </p>
                                                    </div>

                                                    <div id="government-agency" style="display:none">

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Country of Funding
                                                                Agency</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="B_funding_agency"
                                                                    value="{{ $data->B_funding_agency ? $data->B_funding_agency : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Name of the Funding
                                                                Agency</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="B_funding_agency_name"
                                                                    value="{{ $data->B_funding_agency_name ? $data->B_funding_agency_name : '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Duration of Funding in
                                                                years</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="B_funding_years_duration"
                                                                    value="{{ $data->B_funding_years_duration ? $data->B_funding_years_duration : '' }}">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-12 col-sm-12">
                                                        <p><input type="radio" name="fellowship"
                                                                {{ $data->fellowship == 'C' ? 'checked' : '' }}
                                                                value="C" onclick="residencyYes();"> C. You are
                                                            salaried and can get a leave from your organization for the two
                                                            year residency period.</p>
                                                    </div>

                                                    <div id="residency" style="display:none">

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Country of
                                                                Employment</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="C_employment_country">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Name of the
                                                                organization</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="C_organization_name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Nature of
                                                                organization</label>
                                                            <div class="col-md-7">
                                                                <select type="text" class="form-control"
                                                                    name="C_organization_nature">
                                                                    <option value="">Select</option>
                                                                    <option>Government</option>
                                                                    <option>Semi-Government</option>
                                                                    <option>Private</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Working in the current
                                                                organization since</label>
                                                            <div class="col-md-7">
                                                                <select type="text" class="form-control"
                                                                    name="C_current_organization_years">
                                                                    <option value="">Select Years</option>
                                                                    <option>1 Years</option>
                                                                    <option>2 Years</option>
                                                                    <option>3 Years</option>
                                                                    <option>4 Years</option>
                                                                    <option>5 Years</option>
                                                                    <option>More Thank 5 Years</option>
                                                                </select>
                                                                <select type="text" class="form-control"
                                                                    name="C_current_organization_month">
                                                                    <option value="">Select Month</option>
                                                                    <option>1 Years</option>
                                                                    <option>2 Years</option>
                                                                    <option>3 Years</option>
                                                                    <option>4 Years</option>
                                                                    <option>5 Years</option>
                                                                    <option>6 Years</option>
                                                                    <option>7 Years</option>
                                                                    <option>8 Years</option>
                                                                    <option>9 Years</option>
                                                                    <option>9 Years</option>
                                                                    <option>10 Years</option>
                                                                    <option>11 Years</option>
                                                                    <option>12 Years</option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-md-5 control-label">Can you get 2 years leave
                                                                from your organization Yes / No</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"
                                                                    name="organization_leave">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif


                    </div>





                    <div id="errormessages"></div>
                    <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp;
                        Next</button>
            </div>
            </form>

            <!-- Start date end 28022017-->
        </div>
        <!-- #end dashboard page -->
    </div>
    </div>
    <!-- #end main-container -->

@endsection
