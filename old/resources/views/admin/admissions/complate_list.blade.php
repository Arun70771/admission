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

      
            <!-- row  -->
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                               <div>
                             
                            
                            <table class="table  table-bordered text-nowrap mb-0" id="example">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>U.Id</th>
                                        <th>programme</th>
                                        <th>content</th>
                                        <!-- <th>educational_degrees</th>
                                        <th>Other Documents</th> -->
                                        <th>Certificaes</th>
                                        <!-- <th>Status</th>
                                        <th>Edit</th> -->
                                        <th>Delete</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                @forelse($data as $key=>$value)
                                <tr>
                                    <td>{{ $data->firstItem() + $key }}</td>
                                    <td>  {{$value->id}} </td>
                                    <td>
                                    {{$value->name}}    <br>
                                    {{$value->email}}   <br>
                                    {{$value->address}} <br>
                                    
                                    {{ $value->programme}}
                                        @if($value->programme == 'b-tech')
                                          ( {{$value->btech_programmes}} )
                                        @elseif($value->programme == 'm-tech')
                                        ( {{$value->mtech_programmes}} )
                                        @elseif($value->programme == 'Masters')
                                        ( {{$value->master_programmes}} )
                                        @elseif($value->programme == 'PhD')
                                        ( {{$value->Phd_programmes}} )
                                        @endif

                                    </td>
                                    <td>{{ $value->content }}</td>  
                                    <!-- <td>
                                 

                                        <img src='{{url("public/uploads/$value->image_path")}}' width="100px" height="100px">
                                    </td> -->


                                    <!-- <td>
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->national_fellowship_offer_letter}}">national_fellowship_offer_letter</a>   <br> 
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->government_funding_offer_letter}}">government_funding_offer_letter</a>   <br> 
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->noc}}">noc</a>   <br> 
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->photo_identity_card}}">photo_identity_card</a>   <br> 
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->national_fellowship_offer_letter}}">national_fellowship_offer_letter</a>   <br> 
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->short_cv}}">short_cv</a>      <br>
                                        <a href="http://admissions.sau.ac.in/public/uploads/{{$value->candidate_signatures}}">candidate_signatures</a>      <br>
                                    </td> -->
                                    <td>
                                         <a href="http://admissions.sau.ac.in/index.php/generate-pdf/{{ $value->id }}">Certificaes</a>
                                         <br>
                                         <a href="http://admissions.sau.ac.in/index.php/admin/documents/{{ $value->id }}">Documents</a>
                                         <br>
                                         <a href="http://admissions.sau.ac.in/index.php/admin/documents/{{ $value->id }}">    isUploaded : {{ isUploaded( $value->id) }}              </a>                   
                                        </td>                                  
                                    <!-- <td>
                                    <a class="btn btn-primary" href='{{ route("admission_edit",$value->id) }}' ><i class="zmdi zmdi-edit"></i></a> </td> -->
                                    <td> <a class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete the data');" href='{{ url("admin/Admissions/del/$value->id") }}' role="button">Delete</a> 
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Records Found.</td>
                                </tr>

                                @endforelse
                                </tbody>
                               
                                
                               
                                    
                                 

                                </table>
                            </div>

                     </div>

                        
                    </div>

                    <div class="col-12">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <script>
        $('.toggle-class').click(function() {
            var Admissions_id = $(this).data('Admissions_id'); 
            var status = $(this).data('status'); 
           
            $.ajax({
                type: "get",
                url: '{{route('change_Admissions_status')}}',
                data: {'status':status,'Admissions_id': Admissions_id},
                success: function(data){
                    if(data.status == 'success'){
                        location.reload();
                    }
                }
            });
        })
    </script>
@endsection
