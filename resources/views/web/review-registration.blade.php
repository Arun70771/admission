@extends('web.layouts.main')
@section('content')

        <section>
            <div class="container my-5">
                <div class="registration-form-container mx-auto">
                    <h4 class="text-center fw-bold mb-4">
                        Review Your Details
                    </h4>
                    @include('web.include.error')
                        
                    <form action="{{route('send-otp')}}" method="post" id="reviewForm">
                        @csrf
                        
                        <input type="hidden" id="application_id" name="application_id" value="{{$registration->id}}">

                        <div class="row">
                            <!-- Left Section: Personal Details -->
                            <div class="col-md-12">
                                <h5 class="mb-3">Personal Details</h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label"
                                        >Name of the Candidate</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="candidate_name"
                                        value="{{$registration->candidate_name}}"
                                        disabled
                                    />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        >Father's Name, Mother's Name, or Guardian's Name (Any One)</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="father_name"
                                        value="{{$registration->father_name}}"
                                        disabled
                                    />
                                </div>

                                
                            </div>

                            <!-- Right Section: Contact & Security -->
                            <div class="col-lg-6">
                               

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"
                                            >Date of Birth</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="dob"
                                            value="{{$registration->dob}}"
                                            disabled
                                        />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="gender"
                                            value="{{$registration->gender}}"
                                            disabled
                                        />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        >Nationality</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nationality"
                                        value="{{$registration->nationality}}"
                                        disabled
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mb-3">Contact Details</h5>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    value="{{$registration->email}}"
                                    disabled
                                />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile No</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{$registration->mobile}}"
                                    id="mobile"
                                    disabled
                                />
                            </div>
                            <div class="col-md-12 d-flex gap-2 align-items-start mt-2">
                                <input type="checkbox" style="width: 1.2rem; height: 1.2rem;" class="form-check" required>
                                <label for="">I hereby declare that all the information provided by me is correct. By clicking the submit button, I acknowledge that no further changes can be made, and I will proceed to the next steps of registration.</label>
                            </div>
                        </div>


                        <!-- Buttons: Edit and Submit -->
                        <div
                            class="text-center d-flex justify-content-center gap-3 align-items-center"
                        >
                            <a
                                href="{{ url('registration-form/' . $encodedId) }}"
                                type="button"
                                class="btn btn-warning mt-3 fs-6"
                            >
                                Edit
                            </a>
                            <button
                                type="submit"
                                class="btn btn-success mt-3 fs-6"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

      
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/libphonenumber-js/1.9.21/libphonenumber-js.min.js"></script>

@endsection