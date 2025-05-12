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
                <form role="form" method="post" class="form-horizontal" action="{{ url('insert6') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- dashboard header -->
                        <div class="col-md-12">
                            <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                                <div class="left">
                                    <h4 class="mb5 text-light">Upload Others Documents</h4>
                                    <p class="text-danger upload_info"><small>Note: Each document should be of maximum 500
                                            KB. The format of Photo and Scanned Signatures should be png / jpg while for
                                            other documents it should be PDF.</small></p>
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
                        <div class="col-md-12">



                        <div class="panel panel-default panel-hovered panel-stacked mb30">
                            <div class="panel-heading">
                                Photo identity card <span class="text-danger">*</span> 
                                ( <small>Document should be of maximum 500 KB.</small> )
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-md-9 document_upload" id="UploadePhoto">

                                    <label for="photo_identity_card">Photo identity card</label>
                                    <input type="file" name="photo_identity_card" id="photo_identity_card" class="form-control" />
                                </div>
                                @if ($data->photo_identity_card)
                                        <div class="col-md-3">
                                            <a href="https://admissions.sau.ac.in/uploads/{{ $data->photo_identity_card }}" target="_blank" class="btn btn-info">
                                                Preview
                                            </a>
                                        </div>
                                    @endif

                            </div>
                        </div>


                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">Passport size photograph <span class="text-danger">*</span> (
                                    <small> Document should be of maximum 500 KB.
                                    </small>)
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-9 document_upload" id="UploadePhoto">
                                        <label for="passport">Passport size photograph</label>
                                        <input type="file" name="passport" id="passport" />

                                    </div>
                                    
                                    @if ($data->passport)
                                        <div class="col-md-3"> <a href="http://admissions.sau.ac.in/uploads/{{ $data->passport }}" target="_blank" class="btn btn-info">Preview</a>
                                        </div>      
                                    @endif

                                </div>
                            </div>




                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">Candidate's signatures <span class="text-danger">*</span> (
                                    <small> Document should be of maximum 500 KB.
                                    </small>)
                                </div>
                                <div class="panel-body">
                                    <div class="form-group document_upload col-md-9" id="UploadePhoto">
                                        <label for="candidate_signatures">Signatures</label>
                                        <input type="file" name="candidate_signatures" id="candidate_signatures" />
                                    </div>
                                    
                                    @if ($data->candidate_signatures)
                                        <div class="col-md-3"> <a href="http://admissions.sau.ac.in/uploads/{{ $data->candidate_signatures }}" target="_blank" class="btn btn-info">Preview</a>
                                        </div>      
                                    @endif

                                </div>
                            </div>


                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">Short CV ( <small> The document should be a PDF file and must not exceed 500 KB in size.
                                    </small>)</div>
                                <div class="panel-body">
                                    <div class="form-group document_upload col-md-9" id="UploadePhoto">
                                        <label for="short_cv">Short CV</label>
                                        <input type="file" name="short_cv" id="short_cv" />
                                    </div>
                                    @if ($data->short_cv)
                                        <div class="col-md-3"> <a href="http://admissions.sau.ac.in/uploads/{{ $data->short_cv }}" target="_blank" class="btn btn-info">Preview</a>
                                        </div>      
                                    @endif
                                </div>
                            </div>

                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">Offer Letter for the award of National Fellowship (if applicable)<br>
                                    <small>(The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group document_upload col-md-9" id="UploadePhoto">
                                        <label for="national_fellowship_offer_letter">Offer Letter</label>
                                        <input type="file" name="national_fellowship_offer_letter"
                                            id="national_fellowship_offer_letter" />
                                    </div>
                                    @if($data->national_fellowship_offer_letter)
                                        <div class="col-md-3"> <a href="http://admissions.sau.ac.in/uploads/{{ $data->national_fellowship_offer_letter }}" target="_blank" class="btn btn-info">Preview</a>
                                        </div>      
                                    @endif
                                </div>
                            </div>




                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">Offer Letter for the award of funds from any government funding
                                    agency (if applicable)
                                    <br>
                                    <small>(The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group document_upload col-md-9" id="UploadePhoto">

                                        <label for="government_funding_offer_letter">Offer Letter</label>
                                        <input type="file" name="government_funding_offer_letter"
                                            id="government_funding_offer_letter" />
                                    </div>
                                    @if ($data->government_funding_offer_letter)
                                        <div class="col-md-3"> <a
                                                href="https://admissions.sau.ac.in/uploads/{{ $data->government_funding_offer_letter }}"  target="_blank" class="btn btn-info">Preview </a>
                                                </div>
                                        @endif
                                </div>
                            </div>


                            @if ($data->programme == 'PhD')
                                <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-heading">NOC from the employer on the letterhead in the prescribed
                                        format (if employed) <a
                                            href="https://sau.int/wp-content/uploads/2023/02/Format-of-NOC.docx">(Preview
                                            the format here)</a>
                                            <br>
                                            <small>(The document should be a PDF file and must not exceed 500 KB in size).</small>
                                        </div>
                                    <div class="panel-body">

                                        <div class="form-group document_upload col-md-9" id="UploadePhoto">
                                            <label for="noc">NOC from</label>
                                            <input type="file" name="noc" id="noc" />    
                                        </div>

                                        @if ($data->noc)
                                            <div class="col-md-3">  <a href="https://admissions.sau.ac.in/uploads/{{ $data->noc }}"   target="_blank" class="btn btn-info">Preview</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif




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


    <style>
        label {
            cursor: pointer;
            color: #ffffff;
            background-color: #2196f3;
            border-color: #1c94f3;
            padding: 10px 20px;
        }

        #upload,
        #photo_identity_card,
        #passport,
        #candidate_signatures,
        #national_fellowship_offer_letter,
        #government_funding_offer_letter,
        #noc,
        #short_cv {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }
    </style>



@endsection
