@extends('layouts.main')
@section('content')
    @if ($data->is_complate != 1)

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
                    <form role="form" class="form-horizontal" id="personalform" method="post" action="{{ url('insert1') }}">
                        @csrf

                        <div class="row">
                            <!-- dashboard header -->
                            <div class="col-md-12">
                                <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                                    <div class="left">
                                        <h4 class="mb5 text-light">Program</h4>
                                    </div>
                                    <div class="right mt10">
                                        <p class="small text-danger"><strong>*</strong> Denotes mandatory field </p>
                                        <p class="small text-danger">Note: Each document should be of maximum 100 KB. The
                                            format of Photo and Scanned Signatures should be png / jpg while for other
                                            documents it should be PDF.</p>
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
                            <div class="col-md-12">
                                <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-body">
                                        @csrf




                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Programme applying for: <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="ui-radio ui-radio-inline custom_radio">

                                                    <!--div class="checkbox ui-radio-inline">
                                                                                                                                                                                                                                                     <input type="radio" name="programme" id="Programmem" value="b-tech" checked onclick="BTechProgrammes()"
                                                                                                                                                                                                                                                     
                                                                                                                                                                                                                                                     {{ $data->programme == 'b-tech' ? 'checked' : '' }}  >
                                                                                                                                                                                                                                                     <span style="margin-left: 14px">B.Tech (Only with JEE Score)</span>
                                                                                                                                                                                                                                                  </div>

                                                                                                                                                                                                                                                  <div class="checkbox ui-radio-inline">
                                                                                                                                                                                                                                                     <input type="radio" name="programme" id="Programmem" value="m-tech" onclick="MTechProgrammes()" {{ $data->programme == 'm-tech' ? 'checked' : '' }}  >
                                                                                                                                                                                                                                                     <span style="margin-left: 14px"> M.Tech (Only with GATE Score)</span>
                                                                                                                                                                                                                                                  </div-->



                                                    <div class="checkbox ui-radio-inline">
                                                        <input type="radio" name="programme" id="Programmem"
                                                            value="Masters" onclick="MasterProgrammes()"
                                                            {{ $data->programme == 'Masters' ? 'checked' : '' }}>
                                                        <span style="margin-left: 14px">Online MS Programmes in Data Science
                                                            and Artificial Intelligence</span>
                                                    </div>
                                                    <br>
                                                    <div class="checkbox ui-radio-inline">
                                                        <input type="radio" name="programme" id="Programmem"
                                                            value="short_term" onclick="ShortTermProgrammes()"
                                                            {{ $data->programme == 'short_term' ? 'checked' : '' }}>
                                                        <span style="margin-left: 14px"> Short-Term Courses</span>
                                                    </div>
                                                    <br>

                                                    <div class="checkbox ui-radio-inline">
                                                        <input type="radio"
                                                            {{ $data->programme == 'PhD' ? 'checked' : '' }}
                                                            name="programme" id="Programmep" value="PhD"
                                                            onclick="PhDProgrammes()"
                                                            {{ $data->Programme == 'PhD' ? 'checked' : '' }}>
                                                        <span style="margin-left: 14px">PhD Programmes (Only Direct
                                                            Mode)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group" id="Short-Term"
                                            @if ($data->programme == 'short_term') @else style="display:none;" @endif>
                                            <label class="col-md-3 control-label"> Short-Term Courses: <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-5 select_options">
                                                <select name="short_term_programmes" class="form-control">   

                                                   @if($data->short_term_programmes=='')    
                                                    <option value="">Select</option>
                                                   @endif

                                                    {{--  <option value="Communication Design and Graphics" {{ $data->short_term_programmes == 'Communication Design and Graphics' ? 'selected' : '' }}  >Communication Design and Graphics</option>  --}}
                                                    {{--  <option value="Theatrical Arts and Acting Techniques" {{ $data->short_term_programmes == 'Theatrical Arts and Acting Techniques' ? 'selected' : '' }}  >Theatrical Arts and Acting Techniques</option>  --}}
                                                    <option value="Vocal Music and Art of Singing" {{ $data->short_term_programmes == 'Vocal Music and Art of Singing' ? 'selected' : '' }}  >Vocal Music and Art of Singing</option>
                                                    <option value="Fashion Design, Modelling and Styling" {{ $data->short_term_programmes == 'Fashion Design, Modelling and Styling' ? 'selected' : '' }}  >Fashion Design, Modelling and Styling</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group" id="master-programmes"   @if ($data->programme == 'Masters') @else style="display:none;" @endif >
                                                                                                                                                                                                                                            <label class="col-md-3 control-label">Master’s Programmes: <span class="text-danger">*</span></label>
                                                                                                                                                                                                                                            <div class="col-md-5 select_options">
                                                                                                                                                                                                                                               <select name="master_programmes" class="form-control">
                                                                                                                                                                                                                                                        <option value="">Select</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'Applied Mathematics' ? 'selected' : '' }} > Applied Mathematics</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'Biotechnology' ? 'selected' : '' }} > Biotechnology</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'Computer Science' ? 'selected' : '' }} > Computer Science</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'Economics' ? 'selected' : '' }} value="Economics" > Economics (with specialization in Economic Development)</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'International Relations' ? 'selected' : '' }} > International Relations</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'LLM' ? 'selected' : '' }} > LLM</option>
                                                                                                                                                                                                                                                        <option {{ $data->master_programmes == 'Sociology' ? 'selected' : '' }} > Sociology</option>
                                                                                                                                                                                                                                               </select>
                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                         </div> -->


                                        <div class="form-group" id="phd-programmes"
                                            @if ($data->programme == 'PhD') style="display:block;" @else style="display:none;" @endif>
                                            <label class="col-md-3 control-label">PhD Programmes: <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-5 select_options">
                                                <select name="Phd_programmes" class="form-control">
                                                    @if($data->Phd_programmes == '')
                                                        <option value="">Select</option>
                                                    @endif    
                                                    
                                                    <option
                                                        {{ $data->Phd_programmes == 'Biotechnology' ? 'selected' : '' }}>
                                                        Biotechnology</option>
                                                    <option
                                                        {{ $data->Phd_programmes == 'Computer Science' ? 'selected' : '' }}>
                                                        Computer Science</option>
                                                    <option {{ $data->Phd_programmes == 'Economics' ? 'selected' : '' }}>
                                                        Economics</option>
                                                    <option
                                                        {{ $data->Phd_programmes == 'International Relations' ? 'selected' : '' }}>
                                                        International Relations</option>
                                                    <option
                                                        {{ $data->Phd_programmes == 'Legal Studies' ? 'selected' : '' }}>
                                                        Legal Studies</option>
                                                    <option {{ $data->Phd_programmes == 'Mathematics' ? 'selected' : '' }}>
                                                        Mathematics</option>
                                                    <option {{ $data->Phd_programmes == 'Sociology' ? 'selected' : '' }}>
                                                        Sociology</option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group" id="saarc_div"
                                            @if ($data->programme == 'PhD') style="display:block;" @else style="display:none;" @endif>
                                            <label class="col-md-3 col-xs-12 control-label"> Do You belong to a SAARC
                                                Country <span class="text-danger">*</span></label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="ui-radio ui-radio-inline custom_radio">
                                                    <div class="checkbox ui-radio-inline">
                                                        <input type="radio"
                                                            {{ $data->saarc == 'non-saarc' ? 'checked' : '' }}
                                                            name="saarc" id="saarc" value="non-saarc">
                                                        <span style="margin-left: 14px">No</span>
                                                    </div>
                                                    <div class="checkbox ui-radio-inline">
                                                        <input type="radio"
                                                            {{ $data->saarc == 'saarc' ? 'checked' : '' }} name="saarc"
                                                            value="saarc">
                                                        <span style="margin-left: 14px">Yes</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>


                </div>

                <div id="errormessages"></div>
                <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp;
                    Next</button>

                </form>
            </div>

            <!-- Start date end 28022017-->
        </div>
        <!-- #end dashboard page -->
        </div>
        </div>
        <!-- #end main-container -->
    @else
        <!-- content-here -->
        <div class="content-container" id="content">
            <div class="col-xs-12">
                <input type="hidden" id="iCampusID" value="68">
                <input type="hidden" id="SOPFileName" value="">
                <input type="hidden" id="Programtype" value="G">
                <input type="hidden" id="bInternational" value="0">
                <input type="hidden" id="sCType" value="C5">

                <div class="panel panel-default panel-hovered panel-stacked mb30">
                    <div class="panel-heading">Completed<br></div>
                    <div class="panel-body">
                        <p class="text-success">Thank you for submitting SAU Application Form.</p>
                        <ol>
                            <li>Your Application Form No is : <span id="formno"> Form No :
                                    SAU-A&E-2024-{{ 900000 + Session::get('user')->id }}</span></li>
                            <li>
                                <p class="view_print_btn"><a href="http://admissions.sau.ac.in/index.php/generate-pdf"
                                        target="_blank">View/print application form</a></p>
                            </li>
                        </ol>

                        <!--                 <p>In case you are not able to finish the online form now, you can login with the above details at <a href="#">http://amity.edu/forms</a> and continue filling up your online form.</p> -->
                        <p id="paysuccmsg">If you have any questions,
                            email to&nbsp;<a href="mailto:admission@sau.int">admission@sau.int</a> </p>
                    </div>
                </div>


                @if ($data->payment_response)
                    <div class="panel panel-default panel-hovered panel-stacked mb30">
                        <div class="panel-heading">Payment details<br></div>
                        <div class="panel-body">

                            @php
                                $arr = json_decode($data->payment_response, true);

                                if (json_last_error() === JSON_ERROR_NONE) {
                                    echo "<table border='1' class='table table-bordered table-striped'>";
                                    foreach ($arr as $label => $value) {
                                        if (
                                            $label == 'Service_Tax_Amount' ||
                                            $label == 'Processing_Fee_Amount' ||
                                            $label == 'Interchange_Value' ||
                                            $label == 'TDR' ||
                                            $label == 'SubMerchantId' ||
                                            $label == 'RS' ||
                                            $label == 'TPS' ||
                                            $label == 'mandatory_fields' ||
                                            $label == 'optional_fields' ||
                                            $label == 'RSV'
                                        ) {
                                            continue;
                                        }

                                        if ($label == 'Response_Code') {
                                            if ($value == 'E000') {
                                                $value = 'success';
                                            } else {
                                                $value = 'failed';
                                            }
                                        }

                                        echo "<tr>
                                                <td><strong>{$label}</strong></td>
                                                <td>{$value}</td>
                                            </tr>";
                                    }

                                    echo '</table>';
                                } else {
                                    echo 'Error decoding JSON: ' . json_last_error_msg();
                                }

                            @endphp
                        </div>
                    </div>
            </div>
    @endif

    </div>
    </div>
    <style>
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-header {
            background-color: #f8f9fa;
            color: #333;
            padding: 10px;
            text-align: left;
        }

        .custom-cell {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .custom-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .custom-table tr:hover {
            background-color: #e9ecef;
        }
    </style>
    @endif
@endsection
