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
               <form role="form" class="form-horizontal" id="personalform" method="post" action="{{url('insert4')}}">
                  @csrf
                     <div class="row">
                        <!-- dashboard header -->
                        <div class="col-md-12">
                           <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                              <div class="left">
                                 <h4 class="mb5 text-light">Further Information</h4>
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
			
                @if( Session::has( 'success' ))
                    <div class="alert alert-success">{{ Session::get( 'success' ) }}</div>
                @elseif( Session::has( 'warning' ))
                    <div class="alert alert-danger">{{ Session::get( 'warning' ) }} </div>
                @endif   



                     <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default panel-hovered panel-stacked mb30">
                              <div class="panel-body">
                                 <input type="hidden" id="icampus" />
                               
                                 <div class="form-group">
                                    <label class="col-md-6 col-xs-12 control-label">Would you like to avail of the Hostel facility provided by SAU?:  <span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                       <div class="ui-radio ui-radio-inline custom_radio">
                                          <div class="checkbox ui-radio-inline">
                                             <input type="radio" name="hostel_facility" value="Yes" {{ ($data->hostel_facility=='Yes') ? 'checked' : '' }} >
                                             <span style="margin-left: 24px">Yes</span>
                                          </div>
                                          <div class="checkbox ui-radio-inline">
                                             <input type="radio" name="hostel_facility" value="No" {{ ($data->hostel_facility=='No') ? 'checked' : '' }} >
                                             <span style="margin-left: 24px">No</span>
                                          </div>

                                          (Not Applicable for Online Programmes)

                                       </div>
                                    </div>
                                 </div>
                     


                                 <div class="form-group">
                                    <label class="col-md-6 col-xs-12 control-label">How did you come to know about South Asian University (SAU)?: <span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                      
                  @php 

                  $know=explode(',',$data->know_about); 
                  @endphp
               
               <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="Newspaper" {{ in_array('Newspaper',$know) ? 'checked' : '' }} > Newspaper
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="SAUPoster" {{ in_array('SAUPoster',$know) ? 'checked' : '' }} >  SAU Poster 
              </label>

              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="SocialMedia" {{ in_array('SocialMedia',$know) ? 'checked' : '' }} >  Social Media (Google Search) 
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="Facebook" {{ in_array('Facebook',$know) ? 'checked' : '' }} >  Social Media (Facebook, Twitter, LinkedIn ,Instagram)
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="Educational" {{ in_array('Educational',$know) ? 'checked' : '' }} >  Teacher/Educational Consultant    
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="Relative" {{ in_array('Relative',$know) ? 'checked' : '' }} >    Relative/Friend     
              </label>

       
              <label class="checkbox-inline">
                <input type="checkbox" name="know_about[]" value="Other"  {{ in_array('Other',$know) ? 'checked' : '' }} >    Other     
              </label>           



                                    </div>
                                 </div>


                              
                              </div>
                           </div>
                        </div>
                     </div>
                    
                     
                     <div id="errormessages" ></div>
                  <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp; Next</button>
                  </form>
               </div>
              
               <!-- Start date end 28022017-->
            </div>
            <!-- #end dashboard page -->
         </div>
      </div>
      <!-- #end main-container -->
   

      @endsection