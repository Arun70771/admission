
@extends('admin.layouts.main')
@section('mid-content')

<div class="page">
	<div class="main-content app-content">
		<div class="main-container container-fluid">
                    
			<!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between">
				<div class="left-content">
					<span class="main-content-title mg-b-0 mg-b-lg-1">Add banner</span>
				</div>
				<div class="justify-content-center mt-2">
					<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
						<li class="breadcrumb-item active">
							<a href="{{ route('banner')}}">banner</a></li>
						<li class="breadcrumb-item active">Add banner</li>
					</ol>
				</div>
			</div>

            <div class="col-12">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach         
					</ul>
				</div>
				@endif
			</div>

            <form name="form1" method="post" action="{{route('banner_create')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div><h6 class="card-title mb-1">banner Info</h6><p>&nbsp;</p></div>
							
							<div class="row row-xs align-items-center mg-b-20">
								<div class="col-md-4"><label class="mg-b-10">Name</label></div>
								<div class="col-md-6 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="text" id="heading" required name="heading"  value="{{old('heading')}}" >
								</div>
							</div>

                            <div class="row row-xs align-items-center mg-b-20">
								<div class="col-md-4"><label class="mg-b-10">Link</label></div>
								<div class="col-md-6 mg-t-5 mg-md-t-0">
                                    <input class="form-control" type="text" id="link" required  name="link"  value="{{old('link')}}" >
								</div>
							</div>

						
							
							<div class="row row-xs align-items-center mg-b-20">
								<div class="col-md-4"><label class="mg-b-10">Pic</label></div>
								<div class="col-md-6 mg-t-5 mg-md-t-0">
                                <input class="form-control" type="file" id="image_path" required name="image_path"  >
								</div>
							</div>

                            <div class="row row-xs align-items-center mg-b-20">
								<div class="col-md-4"><label class="mg-b-10">Message</label></div>
								<div class="col-md-6 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" id="summernote" name="content" rows="5" required>{{old('content')}}</textarea>
								</div>
							</div>

                            <div class="row row-xs align-items-center mg-b-20">
								<div class="col-md-4"><label class="mg-b-10">Status</label></div>
								<div class="col-md-6 mg-t-5 mg-md-t-0">
                                    <select class="form-control" name="is_active" required>
                                        <option value="">Choose</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select> 
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="card-body">
					<input class="btn btn-primary pd-x-30 mg-r-5 mg-t-5" type="submit" id="code" value="Submit" >
				</div>
			</div>
			</form>

        </div>
	</div>
</div>
@endsection