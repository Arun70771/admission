@extends('web.layouts.main')
@section('content')

        <section>
            <div class="container my-5">
                <div class="card login-container mx-auto">
                    <div class="card-header fs-6 text-white">
                        <strong>Please read carefully</strong>
                    </div>
                    <div class="card-body">
                        <p>Follow these simple steps to create your account:</p>

                        <ol>
                            <li>
                                <strong
                                    >Step 1: Go to the Registration Page</strong
                                ><br />
                                To get started, visit our registration page by
                                clicking on the "Sign Up" button on our
                                homepage.
                            </li>

                            <li>
                                <strong>Step 2: Enter Your Full Name</strong
                                ><br />
                                In the first field, please enter your
                                <em>full name</em> (first and last). This helps
                                us address you correctly on the website.
                            </li>

                            <li>
                                <strong
                                    >Step 3: Provide Your Email Address</strong
                                ><br />
                                Enter your email address in the next field. This
                                will be used to verify your account and to send
                                you important updates. Please make sure the
                                email is valid and active.
                            </li>

                            <li>
                                <strong>Step 4: Choose a Secure Password</strong
                                ><br />
                                Create a strong password for your account. We
                                recommend using at least 8 characters, including
                                a mix of uppercase letters, numbers, and special
                                symbols. This will help keep your account
                                secure.
                            </li>

                            <li>
                                <strong>Step 5: Confirm Your Password</strong
                                ><br />
                                Re-enter your password in the "Confirm Password"
                                field to make sure you typed it correctly.
                            </li>

                            <li>
                                <strong>Step 6: Agree to Our Terms</strong
                                ><br />
                                Before you can register, you must read and agree
                                to our
                                <a href="link-to-terms">Terms of Service</a> and
                                <a href="link-to-privacy">Privacy Policy</a>.
                                Please check the box to confirm your agreement.
                            </li>

                            <li>
                                <strong>Step 7: Complete the CAPTCHA</strong
                                ><br />
                                To prevent automated sign-ups, please complete
                                the CAPTCHA or reCAPTCHA verification (this
                                might be a set of images or a simple challenge)
                                to confirm you're human.
                            </li>

                            <li>
                                <strong>Step 8: Submit the Form</strong><br />
                                Once you've filled in all required fields, click
                                the <strong>Sign Up</strong> button to complete
                                your registration.
                            </li>

                            <li>
                                <strong>Step 9: Verify Your Email</strong><br />
                                After submitting the form, check your inbox for
                                a verification email. Open the email and click
                                on the verification link to activate your
                                account.
                            </li>

                            <li>
                                <strong
                                    >Step 10: Log In to Your New Account</strong
                                ><br />
                                Once your email is verified, you can log in to
                                your new account with your email and password.
                            </li>
                        </ol>
                        <form
                            action="/submit_registration"
                            class="w-50 mx-auto"
                            method="post"
                        >
                            <div class="mb-3 d-flex justify-content-center">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="agreement"
                                        id="agree"
                                        value="agree"
                                        required
                                    />
                                    <label
                                        class="form-check-label text-success"
                                        for="agree"
                                    >
                                        I agree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="agreement"
                                        id="disagree"
                                        value="disagree"
                                    />
                                    <label
                                        class="form-check-label text-danger"
                                        for="disagree"
                                    >
                                        I do not agree
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
@endsection