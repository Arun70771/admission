@extends('web.layouts.main')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <section>
            <div class="container my-5">
                <div class="mx-auto mb-4" style="max-width: 1200px">
                    <a href="/" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
                </div>

                <div class="registration-form-container mx-auto">
                    <h4 class="text-center fw-bold mb-0" style="color: #0d4c91;">Registration Form</h4>
                    <p class="text-center text-warning" style="font-size: 1rem; font-weight: bold;">Admissions 2025-26</p>
                    <p class="text-center mb-3 fw-bold" style="font-size: 0.8rem;">Through Direct Mode</p>

                    @include('web.include.error')     

                    <form 
                            @if(isset($registration) && $registration)
                                action="{{ route('register.update', ['encodedId' => $encodedId]) }}"
                            @else
                                action="{{ route('register.store') }}"
                            @endif
                                                    method="post">
                                    @csrf
                                            @if(isset($registration) && $registration)
                                    @method('PUT') 
                                @endif

                        <div class="row">
                            <!-- Left Section: Personal Details -->
                            <div class="col-lg-12 p-4 pb-0" style="background-color:#f8f8f8;">
                                <h5 class="mb-3" style="color: #0d4c91;">Personal Details</h5>
                                <hr>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                            >Name of the Candidate (as per the 10th
                                            standard certificate)</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter your name"
                                            name="candidate_name"
                                            value="{{ old('candidate_name') ?? ($registration->candidate_name ?? '') }}"
                                        />
                                        @error('candidate_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                            >Date of Birth</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            name="dob"
                                            id="dob"
                                            value="{{ old('dob') ?? ($registration->dob ?? '') }}"
                                        />
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                            >Father's Name/Mother's Name/Guardian’s Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Please wirte any one"
                                            name="father_name"
                                            value="{{ old('father_name') ?? ($registration->father_name ?? '') }}"

                                        />
                                        @error('father_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="Male" {{ old('gender') == 'Male' || ($registration->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' || ($registration->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') == 'Other' || ($registration->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                            >Nationality</label
                                        >
                                        <select
                                            class="form-select"
                                            id="nationalitySelect"
                                            name="nationality"
                                        >
                                        <option value="Afghanistan" {{ old('nationality') == 'Afghanistan' || ($registration->nationality ?? '') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Bangladesh" {{ old('nationality') == 'Bangladesh' || ($registration->nationality ?? '') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Bhutan" {{ old('nationality') == 'Bhutan' || ($registration->nationality ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="India" {{ old('nationality') == 'India' || ($registration->nationality ?? '') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Maldives" {{ old('nationality') == 'Maldives' || ($registration->nationality ?? '') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Nepal" {{ old('nationality') == 'Nepal' || ($registration->nationality ?? '') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        <option value="Pakistan" {{ old('nationality') == 'Pakistan' || ($registration->nationality ?? '') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Sri Lanka" {{ old('nationality') == 'Sri Lanka' || ($registration->nationality ?? '') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>

                                        <option value="Albania" {{ old('nationality') == 'Albania' || ($registration->nationality ?? '') == 'Albania' ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ old('nationality') == 'Algeria' || ($registration->nationality ?? '') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                        <option value="Andorra" {{ old('nationality') == 'Andorra' || ($registration->nationality ?? '') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ old('nationality') == 'Angola' || ($registration->nationality ?? '') == 'Angola' ? 'selected' : '' }}>Angola</option>
                                        <option value="Antigua & Deps" {{ old('nationality') == 'Antigua & Deps' || ($registration->nationality ?? '') == 'Antigua & Deps' ? 'selected' : '' }}>Antigua & Deps</option>
                                        <option value="Argentina" {{ old('nationality') == 'Argentina' || ($registration->nationality ?? '') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ old('nationality') == 'Armenia' || ($registration->nationality ?? '') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                        <option value="Australia" {{ old('nationality') == 'Australia' || ($registration->nationality ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ old('nationality') == 'Austria' || ($registration->nationality ?? '') == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ old('nationality') == 'Azerbaijan' || ($registration->nationality ?? '') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ old('nationality') == 'Bahamas' || ($registration->nationality ?? '') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ old('nationality') == 'Bahrain' || ($registration->nationality ?? '') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Barbados" {{ old('nationality') == 'Barbados' || ($registration->nationality ?? '') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ old('nationality') == 'Belarus' || ($registration->nationality ?? '') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ old('nationality') == 'Belgium' || ($registration->nationality ?? '') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ old('nationality') == 'Belize' || ($registration->nationality ?? '') == 'Belize' ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ old('nationality') == 'Benin' || ($registration->nationality ?? '') == 'Benin' ? 'selected' : '' }}>Benin</option>
                                        <option value="Bhutan" {{ old('nationality') == 'Bhutan' || ($registration->nationality ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ old('nationality') == 'Bolivia' || ($registration->nationality ?? '') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia Herzegovina" {{ old('nationality') == 'Bosnia Herzegovina' || ($registration->nationality ?? '') == 'Bosnia Herzegovina' ? 'selected' : '' }}>Bosnia Herzegovina</option>
                                        <option value="Botswana" {{ old('nationality') == 'Botswana' || ($registration->nationality ?? '') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ old('nationality') == 'Brazil' || ($registration->nationality ?? '') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Brunei" {{ old('nationality') == 'Brunei' || ($registration->nationality ?? '') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                        <option value="Bulgaria" {{ old('nationality') == 'Bulgaria' || ($registration->nationality ?? '') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina" {{ old('nationality') == 'Burkina' || ($registration->nationality ?? '') == 'Burkina' ? 'selected' : '' }}>Burkina</option>
                                        <option value="Burundi" {{ old('nationality') == 'Burundi' || ($registration->nationality ?? '') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cambodia" {{ old('nationality') == 'Cambodia' || ($registration->nationality ?? '') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ old('nationality') == 'Cameroon' || ($registration->nationality ?? '') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ old('nationality') == 'Canada' || ($registration->nationality ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Cape Verde" {{ old('nationality') == 'Cape Verde' || ($registration->nationality ?? '') == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="Central African Rep" {{ old('nationality') == 'Central African Rep' || ($registration->nationality ?? '') == 'Central African Rep' ? 'selected' : '' }}>Central African Rep</option>
                                        <option value="Chad" {{ old('nationality') == 'Chad' || ($registration->nationality ?? '') == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ old('nationality') == 'Chile' || ($registration->nationality ?? '') == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ old('nationality') == 'China' || ($registration->nationality ?? '') == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Colombia" {{ old('nationality') == 'Colombia' || ($registration->nationality ?? '') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ old('nationality') == 'Comoros' || ($registration->nationality ?? '') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo" {{ old('nationality') == 'Congo' || ($registration->nationality ?? '') == 'Congo' ? 'selected' : '' }}>Congo</option>
                                        <option value="Congo {Democratic Rep}" {{ old('nationality') == 'Congo {Democratic Rep}' || ($registration->nationality ?? '') == 'Congo {Democratic Rep}' ? 'selected' : '' }}>Congo {Democratic Rep}</option>
                                        <option value="Costa Rica" {{ old('nationality') == 'Costa Rica' || ($registration->nationality ?? '') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Croatia" {{ old('nationality') == 'Croatia' || ($registration->nationality ?? '') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ old('nationality') == 'Cuba' || ($registration->nationality ?? '') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ old('nationality') == 'Cyprus' || ($registration->nationality ?? '') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ old('nationality') == 'Czech Republic' || ($registration->nationality ?? '') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ old('nationality') == 'Denmark' || ($registration->nationality ?? '') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ old('nationality') == 'Djibouti' || ($registration->nationality ?? '') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ old('nationality') == 'Dominica' || ($registration->nationality ?? '') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ old('nationality') == 'Dominican Republic' || ($registration->nationality ?? '') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="East Timor" {{ old('nationality') == 'East Timor' || ($registration->nationality ?? '') == 'East Timor' ? 'selected' : '' }}>East Timor</option>
                                        <option value="Ecuador" {{ old('nationality') == 'Ecuador' || ($registration->nationality ?? '') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ old('nationality') == 'Egypt' || ($registration->nationality ?? '') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ old('nationality') == 'El Salvador' || ($registration->nationality ?? '') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ old('nationality') == 'Equatorial Guinea' || ($registration->nationality ?? '') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ old('nationality') == 'Eritrea' || ($registration->nationality ?? '') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ old('nationality') == 'Estonia' || ($registration->nationality ?? '') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                        <option value="Ethiopia" {{ old('nationality') == 'Ethiopia' || ($registration->nationality ?? '') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Fiji" {{ old('nationality') == 'Fiji' || ($registration->nationality ?? '') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ old('nationality') == 'Finland' || ($registration->nationality ?? '') == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ old('nationality') == 'France' || ($registration->nationality ?? '') == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Gabon" {{ old('nationality') == 'Gabon' || ($registration->nationality ?? '') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ old('nationality') == 'Gambia' || ($registration->nationality ?? '') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ old('nationality') == 'Georgia' || ($registration->nationality ?? '') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ old('nationality') == 'Germany' || ($registration->nationality ?? '') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ old('nationality') == 'Ghana' || ($registration->nationality ?? '') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Greece" {{ old('nationality') == 'Greece' || ($registration->nationality ?? '') == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Grenada" {{ old('nationality') == 'Grenada' || ($registration->nationality ?? '') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guatemala" {{ old('nationality') == 'Guatemala' || ($registration->nationality ?? '') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ old('nationality') == 'Guinea' || ($registration->nationality ?? '') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ old('nationality') == 'Guinea-Bissau' || ($registration->nationality ?? '') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ old('nationality') == 'Guyana' || ($registration->nationality ?? '') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ old('nationality') == 'Haiti' || ($registration->nationality ?? '') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ old('nationality') == 'Honduras' || ($registration->nationality ?? '') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hungary" {{ old('nationality') == 'Hungary' || ($registration->nationality ?? '') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ old('nationality') == 'Iceland' || ($registration->nationality ?? '') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                        <option value="Indonesia" {{ old('nationality') == 'Indonesia' || ($registration->nationality ?? '') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ old('nationality') == 'Iran' || ($registration->nationality ?? '') == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq" {{ old('nationality') == 'Iraq' || ($registration->nationality ?? '') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland {Republic}" {{ old('nationality') == 'Ireland {Republic}' || ($registration->nationality ?? '') == 'Ireland {Republic}' ? 'selected' : '' }}>Ireland {Republic}</option>
                                        <option value="Israel" {{ old('nationality') == 'Israel' || ($registration->nationality ?? '') == 'Israel' ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ old('nationality') == 'Italy' || ($registration->nationality ?? '') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Ivory Coast" {{ old('nationality') == 'Ivory Coast' || ($registration->nationality ?? '') == 'Ivory Coast' ? 'selected' : '' }}>Ivory Coast</option>
                                        <option value="Jamaica" {{ old('nationality') == 'Jamaica' || ($registration->nationality ?? '') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ old('nationality') == 'Japan' || ($registration->nationality ?? '') == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Jordan" {{ old('nationality') == 'Jordan' || ($registration->nationality ?? '') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ old('nationality') == 'Kazakhstan' || ($registration->nationality ?? '') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ old('nationality') == 'Kenya' || ($registration->nationality ?? '') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ old('nationality') == 'Kiribati' || ($registration->nationality ?? '') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea North" {{ old('nationality') == 'Korea North' || ($registration->nationality ?? '') == 'Korea North' ? 'selected' : '' }}>Korea North</option>
                                        </select>
                                        @error('nationalitySelect')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Right Section: Contact & Security -->
                            <div class="col-lg-12 p-4 pb-0" style="background-color:#f8f8f8;">
                                <h5 class="mb-3" style="color: #0d4c91;">Contact Details</h5>
                                <hr>
                                <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                placeholder="Enter your email"
                                                name="email"
                                                value="{{ old('email') ?? ($registration->email ?? '') }}"
                                            />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                    
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label"
                                                >Mobile No</label
                                            >
                                            <!-- pattern="[0-9]{10}" -->
                                            <input type="tel" id="mobile" 
                                                   name="mobile" class="form-control" 
                                                   placeholder="Enter 10-digit number" 
                                                    value="{{ old('mobile') ?? ($registration->mobile ?? '') }}"
                                                >
                                            <p
                                                id="validationResult"
                                                class="mt-2"
                                            ></p>
                                            @error('mobile')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                
                            </div>
                            <div class="col-md-12 p-4" style="background-color:#f8f8f8;">
                                <h5 class="mb-3" style="color: #0d4c91;">Choose Your Password</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label">Password</label>
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control"
                                                placeholder="Choose a password"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                            />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >Confirm Password</label
                                            >
                                            <input
                                                type="password"
                                                name="password_confirmation"
                                                class="form-control"
                                                placeholder="Confirm your password"
                                            />
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-md-6">
                                            <div class="
                                            
                                            g-recaptcha" data-sitekey="6Le6JoYqAAAAANrJ2X_Lxbn1Qc1GPiW32X4tPl0V"> </div>
                                    </div> -->


                                </div>
                            </div>
                        </div>
                        <div class="text-center d-flex justify-content-center flex-column gap-3 align-items-center">
                            <button
                                type="submit"
                                class="btn btn-primary mt-3 fs-6"
                            >
                                <i class="bi bi-person-check"></i> Register
                            </button>
                            <span>
                                Already have an account?
                                <a
                                    href="{{route('sign-in')}}"
                                    class="btn btn-link text-warning text-decoration-none p-0 fs-6"
                                >
                                     Sign In
                                </a>
                            </span>
                            
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

        <!-- <script>
            // Fetch countries from the REST Countries API
            fetch("https://restcountries.com/v3.1/all")
                .then((response) => response.json())
                .then((data) => {
                    // Get the country select dropdown element
                    const countrySelect =
                        document.getElementById("nationalitySelect");

                    // Clear the existing option
                    countrySelect.innerHTML = "";

                    // Add default option
                    const defaultOption = document.createElement("option");
                    defaultOption.text = "Select Country";
                    defaultOption.value = "";
                    countrySelect.appendChild(defaultOption);

                    // Populate the dropdown with countries from the API response
                    data.forEach((country) => {
                        const option = document.createElement("option");
                        option.value = country.name.common;
                        option.text = country.name.common;
                        countrySelect.appendChild(option);
                    });
                })
                .catch((error) => {
                    console.error("Error fetching countries:", error);
                    // Handle the error gracefully
                    const countrySelect =
                        document.getElementById("countrySelect");
                    countrySelect.innerHTML =
                        "<option>Error loading countries</option>";
                });
        </script> -->

        <!-- <script>
            fetch("https://restcountries.com/v3.1/all")
                .then((response) => response.json())
                .then((data) => {
                    const select = document.getElementById("countryCode");
                    data.forEach((country) => {
                        if (country.idd?.root) {
                            const option = document.createElement("option");
                            const countryCode =
                                country.idd.root +
                                (country.idd.suffixes
                                    ? country.idd.suffixes[0]
                                    : "");
                            option.value = countryCode;
                            option.textContent = `${country.name.common} (${countryCode})`;
                            select.appendChild(option);
                        }
                    });
                })
                .catch((error) =>
                    console.log("Error fetching country codes:", error)
                );
        </script> -->
        <script>
            function validatePhoneNumber() {
                const phoneInput = document
                    .getElementById("phoneNumber")
                    .value.trim();
                const countryCode =
                    document.getElementById("countryCode").value;
                const validationResult =
                    document.getElementById("validationResult");

                if (!phoneInput) {
                    validationResult.innerHTML = "";
                    return;
                }

                try {
                    const fullPhoneNumber = countryCode + phoneInput;
                    const parsedNumber =
                        libphonenumber.parsePhoneNumber(fullPhoneNumber);

                    if (parsedNumber.isValid()) {
                        validationResult.innerHTML = `✅ Valid: ${parsedNumber.formatInternational()}`;
                        validationResult.style.color = "green";
                    } else {
                        validationResult.innerHTML = "❌ Invalid phone number!";
                        validationResult.style.color = "red";
                    }
                } catch (error) {
                    validationResult.innerHTML =
                        "❌ Invalid phone number format!";
                    validationResult.style.color = "red";
                }
            }

            // Validate on input change and country selection
            document
                .getElementById("phoneNumber")
                .addEventListener("input", validatePhoneNumber);
            document
                .getElementById("countryCode")
                .addEventListener("change", validatePhoneNumber);
        </script>

@endsection