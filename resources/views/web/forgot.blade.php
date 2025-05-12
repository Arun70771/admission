@extends('web.layouts.main')
@section('content')

        <section>
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="registration-form-container mx-auto text-center">
                            <form action="review-registration.html">
                                <h3 class="mb-2 fw-bold">Forgot Password</h3>
                                <p>Enter Your Email Address</p>
            
                                <!-- 4 Input Boxes for Verification Code -->
                                <div class="my-3">
                                    <input type="email" class="form-control" placeholder="Enter Your Email" required>
                                    <button type="submit" class="btn btn-primary w-100 my-2 fs-6">Verify Your Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endsection