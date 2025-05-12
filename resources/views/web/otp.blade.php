@extends('web.layouts.main')
@section('content')

        <section>
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="registration-form-container mx-auto text-center">
                                   
                        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                            
                                    <form action="{{route('verifyOtp')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="otp" id="otpInput"> <!-- Hidden field for combined OTP -->
                                            <input type="hidden" name="application_id" value="{{request()->segment(2)}}">

                                            <h5 class="mb-2 fw-bold">Account Verification</h5>
                                            <p>Enter the 4-digit verification code that was sent to your registered email address</p>

                                            <div class="d-flex justify-content-between gap-2 my-4 w-50 mx-auto">
                                                <input type="text" class="form-control text-center otp-input" maxlength="1" required>
                                                <input type="text" class="form-control text-center otp-input" maxlength="1" required>
                                                <input type="text" class="form-control text-center otp-input" maxlength="1" required>
                                                <input type="text" class="form-control text-center otp-input" maxlength="1" required>
                                            </div>

                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                <button type="submit" class="btn btn-primary my-2 fs-6" onclick="combineOtp()">Verify Your Account</button>
                                                <a href="#" id="resendOtpButton" onclick="resendOtp()" class="btn-link text-decoration-none">Didn't Receive Code? Resend</a>
                                                <!-- <a href="{{route('login')}}" class="btn-link text-decoration-none">Login</a>
                                                <a href="{{route('login')}}" class="btn-link text-decoration-none">Register</a> -->
                                            </div>
                                        </form>

                                    <script>
                                    function combineOtp() {
                                        const otpInputs = document.querySelectorAll('.otp-input');
                                        let otp = '';
                                        otpInputs.forEach(input => otp += input.value);
                                        document.getElementById('otpInput').value = otp;
                                    }
                                </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
    function resendOtp() {
        const application_id = '{{ request()->segment(2) }}'; // Retrieve the application ID from the URL

        fetch('/resend-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token in the headers
            },
            body: JSON.stringify({ application_id: application_id })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Failed to resend OTP');
            }
        })
        .then(data => {
            alert('New OTP sent successfully!');
        })
        .catch(error => {
            alert('Failed to resend OTP. Please try again.');
        });
    }
</script>



 @endsection