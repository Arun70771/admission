@extends('layouts.main')
@section('content')

         <!-- content-here -->
         <div class="content-container" id="content">
            <!-- dashboard page -->
            <div class="page page-dashboard">
               <style>
                  .passport_detail, .suspended, .chronic_ailment {
                  display: none;
                  }
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
                
                     <div class="row">
                        <!-- dashboard header -->
                        <div class="col-md-12">
                           <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                              <div class="left">
                                 <h4 class="mb5 text-light">Upload Documents</h4>
                                 <p class="text-danger upload_info"><small>Note: Each document should be of maximum 2 MB. The format of Photo and Scanned Signatures should be png / jpg while for other documents it should be PDF.</small></p>
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
			
                        @if( Session::has( 'success' ))
                            <div class="alert alert-success">{{ Session::get( 'success' ) }}</div>
                        @elseif( Session::has( 'warning' ))
                            <div class="alert alert-danger">{{ Session::get( 'warning' ) }} </div>
                        @endif   


                     <!-- <div class="row">
                        <div class="col-md-12">
                                
                        
                            <form role="form" method="post" class="form-horizontal" action="{{url('insert5')}}"  enctype="multipart/form-data">
                                    @csrf

                                <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-heading">Educational degrees / certificates and mark sheets </div>
                                    <div class="panel-body">
                                        <div class="form-group document_upload" id="UploadePhoto" >
                                        
                                        <label for="upload">Upload a file</label>
                                        <input type="file" name="files[]" id="upload" accept="image/jpeg,image/png,application/pdf" />       
                                        
                        
                                    <div class="col-lg-12 col-sm-6">
                                            <div id="moreImageUpload"></div>
                                            <br>
                                            <a href="javascript:void(0);" id="attachMore">Attach another file  </a>
                                        </div>
                                        
                                        {{$data->educational_degrees}}


                                        </div>                             
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp; Next</button>
                            </form>                     
                        </div>
                     </div> -->
              
                

                     <div class="row">
                        <div class="col-md-12">

                        <div class="panel panel-default panel-hovered panel-stacked mb30">
                                    <div class="panel-heading text-danger">
                                        <h5>Note: Proof of Eligibility for 25% Concession in MS Program and 25%/50% Concession in Short-Term Program Course Fee</h5>
                                        <ul class="text-danger">
                                            <li>
                                                <span>For in-service faculty members of SAARC nations, please upload your faculty employment certificate or experience certificate.</span> <br/>
                                            </li>
                                            <li>
                                                <span>For SAU students and alumni, please upload your student ID card, enrollment proof, or alumni degree.</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-heading">Educational degrees / certificates and mark sheets / Alumni Certificate (if any) / SAU (Student Id )  </div>

                                    <div class="panel-body">
                                        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group document_upload" id="UploadePhoto" >
                                            <input type="hidden" name="user_id" value="{{Session::get('user')->id}}">
                                
                                            <div class="mb-3">
                                                <label class="form-label" for="inputFile">Select Files:</label>
                                                <input 
                                                    type="file" 
                                                    name="files[]" 
                                                    id="inputFile"
                                                    multiple 
                                                    class="form-control @error('files') is-invalid @enderror">
                                
                                                @error('files')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            </div>
                                
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp; Next</button>
                                            </div>
                                    
                                        </form>


                                        @if($files)
                                            <div class="mt-4">
                                                <h3 class="mb-3">Attached Documents</h3>
                                                <div class="list-group">
                                                    @foreach($files as $key => $file)
                                                        <a href="http://admissions.sau.ac.in/uploads/{{$file->name}}" 
                                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                                        target="_blank">
                                                            <span>Certificate and Mark Sheet {{ $key + 1 }}</span>
                                                            <span class="badge badge-primary badge-pill">Download</span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        
                                </div>


                    </div>
                    </div>



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
      #upload , #photo_identity_card, #passport , #candidate_signatures, #national_fellowship_offer_letter, #government_funding_offer_letter, #noc, #short_cv {
        opacity: 0;
        position: absolute;
        z-index: -1;
      }
    </style>



      @endsection