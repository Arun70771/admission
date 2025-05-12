@extends('admin.layouts.main')

@section('mid-content')

<div class="contact-us-backgorund-main">
  <div class="container-fluid box">
      
      
      @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    
              </div>

         <form action="https://scrs.in/admin/add-change-password" method="post" accept-charset="utf-8">
      
      @csrf

<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        	<h3 class="panel-title">Change Password</h3>
	</div>
<div class="panel-body">
    
<div class="col-md-12 col-sm-12">
	
    
    <input type="hidden" value="1" name="id">

    	<div class="form-group col-md-6 col-sm-6">
            <label for="country">Password*</label>
            <input type="password" class="form-control input-sm" name="password" value="" placeholder="password">
               </div>


      	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Password Confirm</label>
           <input type="password" class="form-control input-sm" name="password_confirmation" value="" placeholder="Password Confirm">
        </div>

  




<div class="col-md-6 col-sm-6">
	<div class="form-group col-md-3 col-sm-3">
      <button type="submit" class="btn btn-primary" id="click_form">Submit</button>
	</div>
</div>

</div>
</div>
</div></form>
    @endsection
