@extends('web.layouts.main')
@section('content')
        <section>
            <div class="container my-5">
                <div class="row login-container mx-auto">
                    <!-- Left Section: Sign-In Form -->
                    <div class="col-lg-6 left-section">
                    @include('web.include.error')
                        <h4 class="text-center mb-0 fw-bold" style="color: #0d4c91;">
                            Candidates Sign-In
                        </h4>
                        <p class="text-center text-warning" style="font-size: 1rem; font-weight: bold;">Admissions 2025-26</p>
                        <p class="text-center mb-3 fw-bold" style="font-size: 0.8rem;">Through Direct Mode</p>

                        <form action="{{ route('login.submit') }}" method="POST">
                            
                        @csrf
                          
                            <div class="mb-3">
                                <label class="form-label"
                                    ><i class="bi bi-person"></i> Email Id</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Email Id"
                                    name="email" 
                                    value="{{old('email')}}"
                                />
                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    ><i class="bi bi-lock"></i> Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Enter Password"
                                    name="password"
                                />
                            </div>

                            <!--div class="mb-3">
                                <label class="form-label"
                                    ><i class="bi bi-shield-lock"></i> Security
                                    Pin
                                    <small class="text-muted"
                                        >(Case Sensitive)</small
                                    ></label
                                >
                                <div class="captcha-box">
                                    <img
                                        src="https://dummyimage.com/100x40/cccccc/000000.png&text=QX9143"
                                        alt="Captcha"
                                    />
                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary btn-sm"
                                    >
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                </div>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    placeholder="Enter Security Pin"
                                />
                            </div-->

                            <button
                                type="submit"
                                class="btn btn-primary btn-custom mt-3"
                            >
                                <i class="bi bi-box-arrow-in-right"></i> Sign In
                            </button>
                            <div class="text-center mt-2">
                                <a href="{{route('forgot')}}" class="text-decoration-none"
                                    >Forgot Password?</a
                                >
                            </div>
                        </form>

                        <hr />

                        <a
                            href="{{url('registration-form')}}"
                            class="btn btn-success btn-custom"
                        >
                            <i class="bi bi-person-plus"></i> Fresh Candidate Registration
                        </a>
                    </div>

                    <!-- Right Section: Important Instructions -->
                    <div class="col-lg-6 right-section p-4 rounded-r-3 shadow-sm">
                        <h4 class="text-center mb-4 text-white">
                            <i class="bi bi-info-circle"></i> Important
                            Instructions
                        </h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i
                                    class="bi bi-check-circle-fill check-mark"
                                ></i>
                                Keep your password secure and do not share it
                                with anyone.
                            </li>
                            <li class="mb-2">
                                <i
                                    class="bi bi-check-circle-fill check-mark"
                                ></i>
                                Never respond to emails asking for your login
                                credentials.
                            </li>
                            <li class="mb-2">
                                <i
                                    class="bi bi-check-circle-fill check-mark"
                                ></i>
                                Do not share OTPs sent for password reset.
                            </li>
                            <li class="mb-2 fs-6">
                                <i
                                    class="bi bi-check-circle-fill check-mark"
                                ></i>
                                Always log out and close all browser windows
                                after use.
                            </li>
                            <li class="mb-2 fs-6">
                                <i
                                    class="bi bi-check-circle-fill check-mark"
                                ></i>
                                Candidates applying through the Direct Mode must pay the Application/Registration Fee for each programme separately. However, in the Entrance Mode, candidates applying for programmes that share the same entrance test are required to pay the fee for one programme only.
                            </li>
                        </ul>
                        <p class="text-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <strong>Note:</strong> Candidates must go through the <a class="text-warning" href="http://ae.sau.ac.in/modes-of-admission/">modes of admission</a> before applying.
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection

