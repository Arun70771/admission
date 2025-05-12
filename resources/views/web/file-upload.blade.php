@extends('web.layouts.main')
@section('content')

@php
    use App\Models\StepStatus;
    use Illuminate\Support\Facades\Auth;
    $isEditMode = StepStatus::where('application_id', Auth::id())
                    ->where('edit_mode', 1)
                    ->exists();
@endphp


    <div class="container mb-4">
        @include('web.include.loggedin')
        
        <div class="row">
            <!-- Sidebar -->
            @include('web.include.nav')

            <!-- Main Content -->
            <main class="col-md-8 ms-sm-auto col-lg-9 ps-md-4 mt-4">
            
            @include('web.include.error')

                            @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header fs-6 text-white">
                        <strong>Preview of Uploaded Documents</strong>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <table class="doc-upload">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="30%">Required Document</th>
                                            <th scope="col" width="30%">Choose File</th>
                                            <th scope="col"  width="10%">Upload</th>
                                            <th scope="col"  width="10%">Preview</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="passport_photograph">
                                        <tr>
                                            <td data-label="Required Document">Passport size photograph <span class="text-danger">*</span>
                                            <small>(The document must be a JPEG, PNG, or JPG file and cannot exceed 500 KB in size.)</small>

                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" name="document" required class="form-control" accept="image/*">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                @if(!$isEditMode)
                                                 <button class="btn btn-info">Upload</button>
                                                @endif

                                            </td>
                                            <td data-table="Preview">
                                                @if($passport_photograph)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $passport_photograph) }}" width="100" class="img-thumbnail">
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>

                                        <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="photo_identity">
                                            <tr>
                                                <td data-label="Required Document">
                                                    Photo identity card <span class="text-danger">*</span>
                                                   <small>(The document must be a JPEG, PNG, or JPG file and cannot exceed 500 KB in size.)</small>
                                                </td>
                                                <td data-label="Choose File">
                                                    <input type="file" name="document" class="form-control" accept="image/*" required>
                                                </td>
                                                <td data-label="Upload" class="text-center">
                                                    @if(!$isEditMode)
                                                     <button type="submit" class="btn btn-info">Upload</button>
                                                    @endif
                                                </td>
                                                <td data-table="Preview">
                                                @if($photo_identity)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $photo_identity) }}" width="100" class="img-thumbnail">
                                                    </div>
                                                @endif
                                                </td>
                                            </tr>
                                        </form>

                                    

                                    <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="signatures">
                                        <tr>
                                            <td data-label="Required Document">Candidate's signatures <span class="text-danger">*</span> <br> 
                                                <small>(The document must be a JPEG, PNG, or JPG file and cannot exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" name="document" class="form-control" required accept="image/*">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                @if(!$isEditMode)
                                                    <button class="btn btn-info">Upload</button>
                                                @endif
                                            </td>
                                            <td data-table="Preview">
                                                @if($signatures)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $signatures) }}" width="100" class="img-thumbnail">
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                        </form>


                        
                                <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="tenth_marksheet_certificate">

                                        <tr>
                                            <td data-label="Required Document">10th Marksheet /Certificate  <span class="text-danger">*</span> <br> 
                                                <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" name="document" required class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                @if(!$isEditMode)
                                                    <button class="btn btn-info">Upload</button>
                                                @endif
                                            </td>
                                            <td data-table="Preview">
                                                @if($tenth_marksheet_certificate)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $tenth_marksheet_certificate) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>

                                    <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="twelfth_marksheet_certificate">

                                        <tr>
                                            <td data-label="Required Document">12th Marksheet /Certificate  
                                                <!-- <span class="text-danger">*</span> <br> 
                                                <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small> -->
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" name="document" required class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                @if(!$isEditMode)
                                                    <button class="btn btn-info">Upload</button>
                                                @endif    
                                            </td>
                                            <td data-table="Preview">
                                                @if($twelfth_marksheet_certificate)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $twelfth_marksheet_certificate) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>

                                    @if($marks_of_qualifying_examination)         
                                        <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="marks_of_qualifying_examination">

                                            <tr>
                                                <td data-label="Required Document">Marks of Qualifying Examination  
                                                    <!-- <span class="text-danger">*</span> <br>  <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small> -->
                                                </td>
                                                <td data-label="Choose File">
                                                    <input type="file" name="document" required class="form-control" accept=".pdf, .doc, .docx">
                                                </td>
                                                <td data-label="Upload" class="text-center">
                                                    <button class="btn btn-info">Upload</button>
                                                </td>
                                                <td data-table="Preview">
                                                    @if($marks_of_qualifying_examination_image)
                                                        <div class="mt-2 text-center">
                                                            <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $marks_of_qualifying_examination_image) }}" class="text-decoration-none">View</a>
                                                        </div>
                                                    @endif
                                                    </td>
                                            </tr>
                                        </form>
                                    @endif  
                                    
                                @php
                                    $courses_name = [];
                                
                                    foreach ($courses as $key => $course) {
                                        $courses_name[] = $course->course_name;
                                    }
                                    $ms_course = ['MS-Data-Science-and-AI-Virtual-Campus', 'MCA-Virtual-Campus', 'MBA-Virtual-Campus'];
                                    $ms_course_exists = !empty(array_intersect($ms_course, $courses_name));
                                @endphp


                                @if(($programme->programme == 'masters' || $programme->programme == 'phd' || $ms_course_exists))

       
                                    <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="bachelors_marksheet_certificate">

                                        <tr>
                                            <td data-label="Required Document">Bachelors Marksheet /Certificate  <span class="text-danger">*</span> <br> 
                                                <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" name="document" required class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>
                                            <td data-table="Preview">
                                                @if($bachelors_marksheet_certificate)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $bachelors_marksheet_certificate) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>
                             @endif   

                             
                        @if($programme->programme=='phd' || $programme->programme=='executivePhd')        
                                    <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="master_marksheet_certificate">

                                        <tr>
                                            <td data-label="Required Document">Master Marksheet /Certificate  <span class="text-danger">*</span> <br> 
                                                <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>
                                            <td data-table="Preview">
                                                @if($master_marksheet_certificate)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $master_marksheet_certificate) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>
                        @endif            
       

                            @if($national_fellowship)
                             <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="offer_letter_fellowship">
                                        <tr>
                                            <td data-label="Required Document">Offer Letter for the award of National Fellowship (if applicable)  <br> 
                                            <small>(The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>
                                            <td data-table="Preview">
                                                @if($offer_letter_fellowship)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $offer_letter_fellowship) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                        </form>
                            @endif


                     
                            @foreach ($documents as $document => $data)
 
                               @if ($data['status'] || $data['image_path'])

                                    <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="{{ str_replace(' ', '_', strtolower($document)) }}">
                                        <tr>
                                            <td data-label="Required Document">
                                                {{ $document }} <br>
                                                <small>(The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload </button>
                                            </td>

                                            <td data-table="Preview">
                                                @if( $data['image_path'])
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $data['image_path']) }}" target="_blank">View 
                                                        </a>
                                                    </div>
                                                @endif

                                                    
                                            </td>
                                        </tr>
                                    </form>
                                @endif
                            @endforeach


              

                            @if($programme->programme=='executivePhd')        

                            <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="document_type" value="Proposed_research_plan_Area_of_interest">

                                    <tr>
                                        <td data-label="Required Document">Proposed research plan/Area of interest                                            <span class="text-danger">*</span> <br> 
                                            <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                        </td>
                                        <td data-label="Choose File">
                                            <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                        </td>
                                        <td data-label="Upload" class="text-center">
                                            <button class="btn btn-info">Upload</button>
                                        </td>
                                        <td data-table="Preview">
                                            @if($Proposed_research_plan_Area_of_interest)
                                                <div class="mt-2 text-center">
                                                    <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $Proposed_research_plan_Area_of_interest) }}" class="text-decoration-none">View</a>
                                                </div>
                                            @endif
                                            </td>
                                    </tr>
                                </form>
                            @endif    



                        @if($programme->programme=='phd' || $programme->programme=='executivePhd')        

                                <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="document_type" value="short_cv">

                                        <tr>
                                            <td data-label="Required Document">Short CV  <span class="text-danger">*</span> <br> 
                                                <small> (The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>
                                            <td data-table="Preview">
                                                @if($short_cv)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $short_cv) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                    </form>

                                    
                                @if($salaried)            
                                <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="offer_letter_government">
                                        <tr>
                                            <td data-label="Required Document">Offer Letter for the award of funds from any government funding agency (if applicable)   <br> 
                                           <small>(The document should be a PDF file and must not exceed 500 KB in size.)</small>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" required accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>
                                            <td data-table="Preview">
                                                @if($offer_letter_government)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $offer_letter_government) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                        </form>

                                    <form action="{{ route('document.uploadPdf') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="document_type" value="noc">
                                        <tr>
                                            <td data-label="Required Document">NOC from the employer on the letterhead in the prescribed format (if employed) (Preview the format here) <SMALL>(The document should be a PDF file and must not exceed 500 KB in size).</SMALL>
                                            </td>
                                            <td data-label="Choose File">
                                                <input type="file" required name="document" class="form-control" accept=".pdf, .doc, .docx">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button class="btn btn-info">Upload</button>
                                            </td>

                                            <td data-table="Preview">
                                                @if($noc)
                                                    <div class="mt-2 text-center">
                                                        <a class="btn btn-success mx-auto" href="{{ asset('storage/' . $noc) }}" class="text-decoration-none">View</a>
                                                    </div>
                                                @endif
                                                </td>
                                        </tr>
                                        </form>

                                    @endif        
                                @endif        





                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 text-center my-3 d-flex justify-content-center gap-1">
                                <a
                                    href="{{route('index.educational-details')}}"
                                    class="btn btn-danger"
                                >
                                    Previous
                                </a>

                            <form action="{{ route('document.next') }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                    <button type="submit" class="btn btn-primary">
                                        @if(!$isEditMode)  
                                            Save & Next
                                        @else
                                            Submit 
                                        @endif        
                                    </button>
                            </form>        

                        </div>
                </div>
            </main>
        </div>
    </div>

    
    @endsection