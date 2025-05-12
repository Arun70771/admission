@extends('admin.layouts.main')
@section('mid-content')

        <!-- main-content -->
        <div class="main-content horizontal-content">
            <!-- container -->
            <div class="main-container container-fluid">
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sales</li>
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-7 col-md-6 col-sm-12">
                                                <div class="text-justified align-items-center">
                                                    <h3 class="text-dark font-weight-semibold mb-2 mt-0">Hi, Welcome Back <span class="text-primary">    SAU Admissions 2024-25 </span></h3>
                                                    <button class="btn btn-primary shadow">Upgrade Now</button>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                                                <div class="chart-circle float-md-end mt-4 mt-md-0" data-value="0.85" data-thickness="8" data-color=""><canvas width="100" height="100"></canvas>
                                                    <div class="chart-circle-value circle-style">
                                                        <div class="tx-18 font-weight-semibold">85%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <!-- </div> -->
                </div>
                <!-- row closed -->
                <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <h5> <a href="http://admissions.sau.ac.in/index.php/admin/admissionslist">  <b style="color:red">  Total Registration  {{$is_complate+$is_not_complate}} </b> </a>  || 
                                 <a href="http://admissions.sau.ac.in/index.php/admin/admissions_complate_list"><b style="color:green">Total in Completed  {{$is_complate}}   </b> </a> ||    
                                 <a href="http://admissions.sau.ac.in/index.php/admin/admissions_in_complate_list"><b style="color:blue">  Total in Processed {{$is_not_complate}} </b></a></h5>
                            <br><br><br>
                    </div>                        
                </div>                        
              
                 <!-- row -->
                 <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Course Reports</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">In-Processed</th>
                                            <th scope="col">Complete</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!--tr>
                                            <th scope="row">1</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/mathematics')}}">M.Sc in Mathematics</a>	</td>
                                            <td>{{$m_sc_mathematics_not_complate}}</td>
                                            <td>{{$m_sc_mathematics_complate}}</td>
                                            <td>{{$m_sc_mathematics_complate+$m_sc_mathematics_not_complate}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/Computer Science')}}">M.Sc in Computer Science</a>	</td>
                                            <td>{{$m_sc_cs_complate}}</td>
                                            <td>{{$m_sc_cs_not_complate}}</td>
                                            <td>{{$m_sc_cs_not_complate+$m_sc_cs_complate}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/Biotechnology')}}">M.Sc in Biotechnology</a>	</td>
                                            <td>{{course_ncomplate('Biotechnology')}}</td>
                                            <td>{{course_complate('Biotechnology')}}</td>
                                            <td>{{course_complate('Biotechnology')+course_ncomplate('Biotechnology')}}</td>
                                        </tr>


                                        <tr>
                                        <th scope="row">4</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/Economics')}}">M.A in Economics</a>	</td>
                                            <td>{{course_ncomplate('Economics')}}</td>
                                            <td>{{course_complate('Economics')}}</td>
                                            <td>{{course_complate('Economics')+course_ncomplate('Economics')}}</td>
                                        </tr>

                                        <th scope="row">5</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/International Relations')}}">M.A in International Relations</a>	</td>
                                            <td>{{course_ncomplate('Economics')}}</td>
                                            <td>{{course_complate('Economics')}}</td>
                                            <td>{{course_complate('Economics')+course_ncomplate('Economics')}}</td>
                                        </tr>
                                        <th scope="row">6</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/Sociology')}}">M.A in Sociology</a>	</td>
                                            <td>{{course_ncomplate('Sociology')}}</td>
                                            <td>{{course_complate('Sociology')}}</td>
                                            <td>{{course_complate('Sociology')+course_ncomplate('Sociology')}}</td>
                                        </tr>
                                        <th scope="row">7</th>
                                            <td><a style="color:blue" href="{{url('admin/reports/LLM')}}">M.A in Legal Studies</a>	</td>
                                            <td>{{course_ncomplate('LLM')}}</td>
                                            <td>{{course_complate('LLM')}}</td>
                                            <td>{{course_complate('LLM')+course_ncomplate('LLM')}}</td>
                                        </tr-->
                                        
                                        <th scope="row">1</th>
                                            <td><a style="color:blue" href="#">Short-Term Courses</a>	</td>
                                            <td><?=Short_Term_CoursesInProcess()?> </td>
                                            <td><?=Short_Term_CoursesComplete()?></td>
                                            <td><?=Short_Term_CoursesInProcess()+Short_Term_CoursesComplete()?></td>
                                        </tr>
                                        <th scope="row">2</th>
                                            <td><a style="color:blue" href="#">Online MS Programmes in Data Science and Artificial Intelligence</a>	</td>
                                            <td><?=Masters202402InProcess()?> </td>
                                            <td><?=Masters202402Complete()?></td>
                                            <td><?=Masters202402InProcess() + Masters202402Complete() ?></td>
                                        </tr>

                                        <th scope="row">3</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Mathematics')}}">PhD in Mathematics</a>	</td>
                                            <td>{{phd_course_ncomplate('Mathematics')}}</td>
                                            <td>{{phd_course_complate('Mathematics')}}</td>
                                            <td>{{phd_course_complate('Mathematics')+phd_course_ncomplate('Mathematics')}}</td>
                                        </tr>
                                        <th scope="row">4</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Computer Science')}}">PhD in Computer Science</a>	</td>
                                            <td>{{phd_course_ncomplate('Computer Science')}}</td>
                                            <td>{{phd_course_complate('Computer Science')}}</td>
                                            <td>{{phd_course_complate('Computer Science')+phd_course_ncomplate('Computer Science')}}</td>
                                        </tr>
                                        <th scope="row">5</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Biotechnology')}}">PhD in Biotechnology</a>	</td>
                                            <td>{{phd_course_ncomplate('Biotechnology')}}</td>
                                            <td>{{phd_course_complate('Biotechnology')}}</td>
                                            <td>{{phd_course_complate('Biotechnology')+phd_course_ncomplate('Biotechnology')}}</td>
                                        </tr>
                                        <th scope="row">6</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Economics')}}">PhD in Economics</a>	</td>
                                            <td>{{phd_course_ncomplate('Economics')}}</td>
                                            <td>{{phd_course_complate('Economics')}}</td>
                                            <td>{{phd_course_complate('Economics')+phd_course_ncomplate('Economics')}}</td>
                                        </tr>
                                        <th scope="row">7</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/International Relations')}}">PhD in International Relations</a>	</td>
                                            <td>{{phd_course_ncomplate('International Relations')}}</td>
                                            <td>{{phd_course_complate('International Relations')}}</td>
                                            <td>{{phd_course_complate('International Relations')+phd_course_ncomplate('International Relations')}}</td>
                                        </tr>
                                        <th scope="row">8</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Sociology')}}">PhD in Sociology</a>	</td>
                                            <td>{{phd_course_ncomplate('Sociology')}}</td>
                                            <td>{{phd_course_complate('Sociology')}}</td>
                                            <td>{{phd_course_complate('Sociology')+phd_course_ncomplate('Sociology')}}</td>
                                        </tr>
                                        <th scope="row">9</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/Legal Studies')}}">PhD in Legal Studies</a>	</td>
                                            <td>{{phd_course_ncomplate('Legal Studies')}}</td>
                                            <td>{{phd_course_complate('Legal Studies')}}</td>
                                            <td>{{phd_course_complate('Legal Studies')+phd_course_ncomplate('Legal Studies')}}</td>
                                        </tr>




                                        <!--th scope="row">15</th>
                                            <td><a style="color:blue" href="{{url('admin/phd_reports/btech_reports')}}">B.Tech.</a>	</td>
                                            <td>{{btech_not()}}</td>
                                            <td>{{btech()}}</td>
                                            <td>{{btech()+btech_not()}}</td>
                                        </tr>
                                        <th scope="row">16</th>
                                           <td><a style="color:blue" href="{{url('admin/phd_reports/mtech_reports')}}">M.Tech.</a>	</td>
                                            <td>{{mtech_not()}}</td>
                                            <td>{{mtech()}}</td>
                                            <td>{{mtech()+mtech_not()}}</td>
                                        </tr-->
                                        <th scope="row">Total</th>
                                            <td></td> 
                                            <td><b>{{$is_not_complate}}</b></td>
                                            <td><b>{{$is_complate}}</b></td>
                                            <td><b>{{$is_complate+$is_not_complate}}</b></td>
                                        </tr>
                                    </tbody>
                                    </table>

                            
                                    </div>
                                </div>
                <!-- row closed -->




                                <!-- row -->
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total in Processed (PhD)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CountryName</th>
                                            <th scope="col">PhD in Mathematics</th>
                                            <th scope="col">PhD in Computer Science</th>
                                            <th scope="col">PhD in Biotechnology</th>
                                            <th scope="col">PhD in Economics</th>
                                            <th scope="col">PhD in International Relations</th>
                                            <th scope="col">PhD in Sociology</th>
                                            <th scope="col">PhD in Legal Studies</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Afghanistan</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','93')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','93')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','93') + countryInProcessed('PhD', 'Computer Science','93') + countryInProcessed('PhD', 'Biotechnology','93') +
                                                countryInProcessed('PhD', 'Economics','93') +  countryInProcessed('PhD', 'International Relations','93') + countryInProcessed('PhD', 'Sociology','93') +
                                                countryInProcessed('PhD', 'Legal Studies','93') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pakistan</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','92')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','92')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','92') + countryInProcessed('PhD', 'Computer Science','92') + countryInProcessed('PhD', 'Biotechnology','92') +
                                                countryInProcessed('PhD', 'Economics','92') +  countryInProcessed('PhD', 'International Relations','92') + countryInProcessed('PhD', 'Sociology','92') +
                                                countryInProcessed('PhD', 'Legal Studies','92') }}</td>
                                        </tr>                                        
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maldives</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','960')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','960')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','960') + countryInProcessed('PhD', 'Computer Science','960') + countryInProcessed('PhD', 'Biotechnology','960') +
                                                countryInProcessed('PhD', 'Economics','960') +  countryInProcessed('PhD', 'International Relations','960') + countryInProcessed('PhD', 'Sociology','960') +
                                                countryInProcessed('PhD', 'Legal Studies','960') }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Sri Lanka</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','94')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','94')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','94') + countryInProcessed('PhD', 'Computer Science','94') + countryInProcessed('PhD', 'Biotechnology','94') +
                                                countryInProcessed('PhD', 'Economics','94') +  countryInProcessed('PhD', 'International Relations','94') + countryInProcessed('PhD', 'Sociology','94') +
                                                countryInProcessed('PhD', 'Legal Studies','94') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Nepal</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','977')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','977')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','977') + countryInProcessed('PhD', 'Computer Science','977') + countryInProcessed('PhD', 'Biotechnology','977') +
                                                countryInProcessed('PhD', 'Economics','977') +  countryInProcessed('PhD', 'International Relations','977') + countryInProcessed('PhD', 'Sociology','977') +
                                                countryInProcessed('PhD', 'Legal Studies','977') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bhutan</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','975')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','975')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','975') + countryInProcessed('PhD', 'Computer Science','975') + countryInProcessed('PhD', 'Biotechnology','975') +
                                                countryInProcessed('PhD', 'Economics','975') +  countryInProcessed('PhD', 'International Relations','975') + countryInProcessed('PhD', 'Sociology','975') +
                                                countryInProcessed('PhD', 'Legal Studies','975') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bangladesh</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','880')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','880')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','880') + countryInProcessed('PhD', 'Computer Science','880') + countryInProcessed('PhD', 'Biotechnology','880') +
                                                countryInProcessed('PhD', 'Economics','880') +  countryInProcessed('PhD', 'International Relations','880') + countryInProcessed('PhD', 'Sociology','880') +
                                                countryInProcessed('PhD', 'Legal Studies','880') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>India</td>
                                            <td><?=countryInProcessed('PhD', 'Mathematics','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'Computer Science','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'Biotechnology','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'Economics','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'International Relations','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'Sociology','91')?></td>
                                            <td><?=countryInProcessed('PhD', 'Legal Studies','91')?></td>
                                            <td>{{ countryInProcessed('PhD', 'Mathematics','91') + countryInProcessed('PhD', 'Computer Science','91') + countryInProcessed('PhD', 'Biotechnology','91') +
                                                countryInProcessed('PhD', 'Economics','91') +  countryInProcessed('PhD', 'International Relations','91') + countryInProcessed('PhD', 'Sociology','91') +
                                                countryInProcessed('PhD', 'Legal Studies','91') }}</td>
                                        </tr>
                                    </tbody>
                                   </table>
                                  </div>
                                </div>
                <!-- row closed -->



                                <!--div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total Complete  (PhD)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CountryName</th>
                                            <th scope="col">PhD in Mathematics</th>
                                            <th scope="col">PhD in Computer Science</th>
                                            <th scope="col">PhD in Biotechnology</th>
                                            <th scope="col">PhD in Economics</th>
                                            <th scope="col">PhD in International Relations</th>
                                            <th scope="col">PhD in Sociology</th>
                                            <th scope="col">PhD in Legal Studies</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Afghanistan</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','93')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','93')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','93')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','93')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','93')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','93')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','93')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','93') + countryComplate('PhD', 'Computer Science','93') + countryComplate('PhD', 'Biotechnology','93') +
                                                countryComplate('PhD', 'Economics','93') +  countryComplate('PhD', 'International Relations','93') + countryComplate('PhD', 'Sociology','93') +
                                                countryComplate('PhD', 'Legal Studies','93') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pakistan</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','92')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','92')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','92')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','92')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','92')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','92')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','92')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','92') + countryComplate('PhD', 'Computer Science','92') + countryComplate('PhD', 'Biotechnology','92') +
                                                countryComplate('PhD', 'Economics','92') +  countryComplate('PhD', 'International Relations','92') + countryComplate('PhD', 'Sociology','92') +
                                                countryComplate('PhD', 'Legal Studies','92') }}</td>
                                        </tr>                                        
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maldives</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','960')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','960')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','960')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','960')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','960')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','960')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','960')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','960') + countryComplate('PhD', 'Computer Science','960') + countryComplate('PhD', 'Biotechnology','960') +
                                                countryComplate('PhD', 'Economics','960') +  countryComplate('PhD', 'International Relations','960') + countryComplate('PhD', 'Sociology','960') +
                                                countryComplate('PhD', 'Legal Studies','960') }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Sri Lanka</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','94')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','94')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','94')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','94')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','94')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','94')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','94')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','94') + countryComplate('PhD', 'Computer Science','94') + countryComplate('PhD', 'Biotechnology','94') +
                                                countryComplate('PhD', 'Economics','94') +  countryComplate('PhD', 'International Relations','94') + countryComplate('PhD', 'Sociology','94') +
                                                countryComplate('PhD', 'Legal Studies','94') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Nepal</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','977')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','977')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','977')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','977')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','977')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','977')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','977')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','977') + countryComplate('PhD', 'Computer Science','977') + countryComplate('PhD', 'Biotechnology','977') +
                                                countryComplate('PhD', 'Economics','977') +  countryComplate('PhD', 'International Relations','977') + countryComplate('PhD', 'Sociology','977') +
                                                countryComplate('PhD', 'Legal Studies','977') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bhutan</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','975')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','975')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','975')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','975')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','975')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','975')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','975')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','975') + countryComplate('PhD', 'Computer Science','975') + countryComplate('PhD', 'Biotechnology','975') +
                                                countryComplate('PhD', 'Economics','975') +  countryComplate('PhD', 'International Relations','975') + countryComplate('PhD', 'Sociology','975') +
                                                countryComplate('PhD', 'Legal Studies','975') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bangladesh</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','880')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','880')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','880')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','880')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','880')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','880')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','880')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','880') + countryComplate('PhD', 'Computer Science','880') + countryComplate('PhD', 'Biotechnology','880') +
                                                countryComplate('PhD', 'Economics','880') +  countryComplate('PhD', 'International Relations','880') + countryComplate('PhD', 'Sociology','880') +
                                                countryComplate('PhD', 'Legal Studies','880') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>India</td>
                                            <td><?=countryComplate('PhD', 'Mathematics','91')?></td>
                                            <td><?=countryComplate('PhD', 'Computer Science','91')?></td>
                                            <td><?=countryComplate('PhD', 'Biotechnology','91')?></td>
                                            <td><?=countryComplate('PhD', 'Economics','91')?></td>
                                            <td><?=countryComplate('PhD', 'International Relations','91')?></td>
                                            <td><?=countryComplate('PhD', 'Sociology','91')?></td>
                                            <td><?=countryComplate('PhD', 'Legal Studies','91')?></td>
                                            <td>{{ countryComplate('PhD', 'Mathematics','91') + countryComplate('PhD', 'Computer Science','91') + countryComplate('PhD', 'Biotechnology','91') +
                                                countryComplate('PhD', 'Economics','91') +  countryComplate('PhD', 'International Relations','91') + countryComplate('PhD', 'Sociology','91') +
                                                countryComplate('PhD', 'Legal Studies','91') }}</td>
                                        </tr>
                                    </tbody>
                                    </table>

                            
                                    </div>
                                </div-->




                             <!-- <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total in Processed (Master’s)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CountryName</th>
                                            <th scope="col">M.Sc in Mathematics</th>
                                            <th scope="col">M.Sc in Computer Science</th>
                                            <th scope="col">M.Sc in Biotechnology</th>
                                            <th scope="col">M.A. in Economics</th>
                                            <th scope="col">M.A. in International Relations</th>
                                            <th scope="col">M.A. in Sociology</th>
                                            <th scope="col">M.A. in Legal Studies</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Afghanistan</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','93')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','93')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','93') + countryInProcessed('PhDD', 'Computer Science','93') + countryInProcessed('PhDD', 'Biotechnology','93') +
                                                countryInProcessed('PhDD', 'Economics','93') +  countryInProcessed('PhDD', 'International Relations','93') + countryInProcessed('PhDD', 'Sociology','93') +
                                                countryInProcessed('PhDD', 'Legal Studies','93') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pakistan</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','92')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','92')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','92') + countryInProcessed('PhDD', 'Computer Science','92') + countryInProcessed('PhDD', 'Biotechnology','92') +
                                                countryInProcessed('PhDD', 'Economics','92') +  countryInProcessed('PhDD', 'International Relations','92') + countryInProcessed('PhDD', 'Sociology','92') +
                                                countryInProcessed('PhDD', 'Legal Studies','92') }}</td>
                                        </tr>                                        
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maldives</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','960')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','960')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','960') + countryInProcessed('PhDD', 'Computer Science','960') + countryInProcessed('PhDD', 'Biotechnology','960') +
                                                countryInProcessed('PhDD', 'Economics','960') +  countryInProcessed('PhDD', 'International Relations','960') + countryInProcessed('PhDD', 'Sociology','960') +
                                                countryInProcessed('PhDD', 'Legal Studies','960') }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Sri Lanka</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','94')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','94')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','94') + countryInProcessed('PhDD', 'Computer Science','94') + countryInProcessed('PhDD', 'Biotechnology','94') +
                                                countryInProcessed('PhDD', 'Economics','94') +  countryInProcessed('PhDD', 'International Relations','94') + countryInProcessed('PhDD', 'Sociology','94') +
                                                countryInProcessed('PhDD', 'Legal Studies','94') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Nepal</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','977')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','977')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','977') + countryInProcessed('PhDD', 'Computer Science','977') + countryInProcessed('PhDD', 'Biotechnology','977') +
                                                countryInProcessed('PhDD', 'Economics','977') +  countryInProcessed('PhDD', 'International Relations','977') + countryInProcessed('PhDD', 'Sociology','977') +
                                                countryInProcessed('PhDD', 'Legal Studies','977') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bhutan</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','975')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','975')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','975') + countryInProcessed('PhDD', 'Computer Science','975') + countryInProcessed('PhDD', 'Biotechnology','975') +
                                                countryInProcessed('PhDD', 'Economics','975') +  countryInProcessed('PhDD', 'International Relations','975') + countryInProcessed('PhDD', 'Sociology','975') +
                                                countryInProcessed('PhDD', 'Legal Studies','975') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bangladesh</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','880')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','880')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','880') + countryInProcessed('PhDD', 'Computer Science','880') + countryInProcessed('PhDD', 'Biotechnology','880') +
                                                countryInProcessed('PhDD', 'Economics','880') +  countryInProcessed('PhDD', 'International Relations','880') + countryInProcessed('PhDD', 'Sociology','880') +
                                                countryInProcessed('PhDD', 'Legal Studies','880') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>India</td>
                                            <td><?=countryInProcessed('PhDD', 'Mathematics','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Computer Science','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Biotechnology','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Economics','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'International Relations','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Sociology','91')?></td>
                                            <td><?=countryInProcessed('PhDD', 'Legal Studies','91')?></td>
                                            <td>{{ countryInProcessed('PhDD', 'Mathematics','91') + countryInProcessed('PhDD', 'Computer Science','91') + countryInProcessed('PhDD', 'Biotechnology','91') +
                                                countryInProcessed('PhDD', 'Economics','91') +  countryInProcessed('PhDD', 'International Relations','91') + countryInProcessed('PhDD', 'Sociology','91') +
                                                countryInProcessed('PhDD', 'Legal Studies','91') }}</td>
                                        </tr>
                                    </tbody>
                                   </table>
                                  </div>
                                </div>
       
                          <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total Complete  (Master’s)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">CountryName</th>
                                            <th scope="col">M.Sc in Mathematics</th>
                                            <th scope="col">M.Sc in Computer Science</th>
                                            <th scope="col">M.Sc in Biotechnology</th>
                                            <th scope="col">M.A. in Economics</th>
                                            <th scope="col">M.A. in International Relations</th>
                                            <th scope="col">M.A. in Sociology</th>
                                            <th scope="col">M.A. in Legal Studies</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Afghanistan</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','93')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','93')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','93')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','93')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','93')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','93')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','93')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','93') + countryComplate('PhDD', 'Computer Science','93') + countryComplate('PhDD', 'Biotechnology','93') +
                                                countryComplate('PhDD', 'Economics','93') +  countryComplate('PhDD', 'International Relations','93') + countryComplate('PhDD', 'Sociology','93') +
                                                countryComplate('PhDD', 'Legal Studies','93') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pakistan</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','92')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','92')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','92')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','92')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','92')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','92')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','92')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','92') + countryComplate('PhDD', 'Computer Science','92') + countryComplate('PhDD', 'Biotechnology','92') +
                                                countryComplate('PhDD', 'Economics','92') +  countryComplate('PhDD', 'International Relations','92') + countryComplate('PhDD', 'Sociology','92') +
                                                countryComplate('PhDD', 'Legal Studies','92') }}</td>
                                        </tr>                                        
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Maldives</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','960')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','960')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','960')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','960')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','960')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','960')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','960')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','960') + countryComplate('PhDD', 'Computer Science','960') + countryComplate('PhDD', 'Biotechnology','960') +
                                                countryComplate('PhDD', 'Economics','960') +  countryComplate('PhDD', 'International Relations','960') + countryComplate('PhDD', 'Sociology','960') +
                                                countryComplate('PhDD', 'Legal Studies','960') }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Sri Lanka</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','94')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','94')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','94')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','94')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','94')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','94')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','94')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','94') + countryComplate('PhDD', 'Computer Science','94') + countryComplate('PhDD', 'Biotechnology','94') +
                                                countryComplate('PhDD', 'Economics','94') +  countryComplate('PhDD', 'International Relations','94') + countryComplate('PhDD', 'Sociology','94') +
                                                countryComplate('PhDD', 'Legal Studies','94') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Nepal</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','977')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','977')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','977')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','977')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','977')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','977')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','977')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','977') + countryComplate('PhDD', 'Computer Science','977') + countryComplate('PhDD', 'Biotechnology','977') +
                                                countryComplate('PhDD', 'Economics','977') +  countryComplate('PhDD', 'International Relations','977') + countryComplate('PhDD', 'Sociology','977') +
                                                countryComplate('PhDD', 'Legal Studies','977') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Bhutan</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','975')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','975')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','975')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','975')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','975')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','975')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','975')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','975') + countryComplate('PhDD', 'Computer Science','975') + countryComplate('PhDD', 'Biotechnology','975') +
                                                countryComplate('PhDD', 'Economics','975') +  countryComplate('PhDD', 'International Relations','975') + countryComplate('PhDD', 'Sociology','975') +
                                                countryComplate('PhDD', 'Legal Studies','975') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Bangladesh</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','880')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','880')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','880')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','880')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','880')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','880')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','880')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','880') + countryComplate('PhDD', 'Computer Science','880') + countryComplate('PhDD', 'Biotechnology','880') +
                                                countryComplate('PhDD', 'Economics','880') +  countryComplate('PhDD', 'International Relations','880') + countryComplate('PhDD', 'Sociology','880') +
                                                countryComplate('PhDD', 'Legal Studies','880') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>India</td>
                                            <td><?=countryComplate('PhDD', 'Mathematics','91')?></td>
                                            <td><?=countryComplate('PhDD', 'Computer Science','91')?></td>
                                            <td><?=countryComplate('PhDD', 'Biotechnology','91')?></td>
                                            <td><?=countryComplate('PhDD', 'Economics','91')?></td>
                                            <td><?=countryComplate('PhDD', 'International Relations','91')?></td>
                                            <td><?=countryComplate('PhDD', 'Sociology','91')?></td>
                                            <td><?=countryComplate('PhDD', 'Legal Studies','91')?></td>
                                            <td>{{ countryComplate('PhDD', 'Mathematics','91') + countryComplate('PhDD', 'Computer Science','91') + countryComplate('PhDD', 'Biotechnology','91') +
                                                countryComplate('PhDD', 'Economics','91') +  countryComplate('PhDD', 'International Relations','91') + countryComplate('PhDD', 'Sociology','91') +
                                                countryComplate('PhDD', 'Legal Studies','91') }}</td>
                                        </tr>
                                    </tbody>
                                    </table>

                            
                                    </div>
                                </div> -->














            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->



        <!-- Audio Modal -->

        <!-- modal -->

        @endsection
