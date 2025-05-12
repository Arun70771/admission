@extends('web.layouts.main')
@section('content')

        <section>
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="registration-form-container mx-auto text-center">
                            <form action="review-registration.html">
                                <h3 class="mb-2 fw-bold">New Password</h3>
                                <div class="alert alert-success" role="alert">
                                    Please create a new password that you don't use on any other site
                                  </div>
                                <!-- 4 Input Boxes for Verification Code -->
                                <div class="my-3">
                                    <input type="email" class="form-control" placeholder="Create New Password" required>
                                    <input type="email" class="form-control my-3" placeholder="Confirm Password" required>
                                    <button type="submit" class="btn btn-primary w-100 my-2 fs-6">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection