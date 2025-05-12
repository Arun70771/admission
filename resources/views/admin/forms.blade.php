@extends('admin.layouts.main')
@section('content')
        
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Heading</h4>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <form class="forms-sample">
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect3">Small select</label>
                          <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>File upload</label>
                          <input type="file" name="img[]" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputCity1">City</label>
                          <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="Membership">Membership</label>
                            <div class="row">
                              <div class="col-sm-4">
                              <div class="form-radio">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked=""> Free <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-radio">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional <i class="input-helper"></i></label>
                              </div>
                            </div>
                            </div>
                          </div>
                        <div class="form-group">
                          <label for="exampleTextarea1">Textarea</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                        </div>
                      </div>
                    </div>
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
  @endsection