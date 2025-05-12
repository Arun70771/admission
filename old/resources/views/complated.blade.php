@extends('layouts.main')
@section('content')
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


                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif(Session::has('warning'))
                        <div class="alert alert-danger">{{ Session::get('warning') }} </div>
                    @endif

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
                        email to&nbsp;<a href="mailto:admission@sau.int">admission@sau.int</a> or call us at Admission
                        Helpline: +91 (11) 20862376.<br></p>
                </div>
            </div>
        </div>
    </div>
@endsection
