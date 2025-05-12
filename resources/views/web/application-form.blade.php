@extends('web.layouts.main')
@section('content')
        <div class="container mb-4">
                @include('web.include.loggedin')
            <div class="row">
                <!-- Sidebar -->
                @include('web.include.nav')

                <!-- Main Content -->
                <main class="col-md-8 ms-sm-auto col-lg-9 ps-md-4 mt-4">
                   
                    @include('web.include.error')
                    

                    <div class="card">
                    

                        <div class="card-header fs-6 text-white">
                            <strong>Application Form</strong>
                        </div>

                        @if($action=='add')
                    
                            <form action="{{ route('store.application-form') }}" method="post" class="p-4">
                                @csrf
                        @else
                        <form action="{{ route('update.application-form', $applications->id) }}" method="post" class="p-4">
                            
                            @csrf
                            @method('PUT')
                        @endif    

                            <!-- Personal Details Section -->
                            <div class="row">
                                <!-- Left Section: Personal Details -->
                                <div class="col-md-12">
                                    <h5 class="primary-heading">
                                        Personal Details
                                    </h5>
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
                                            name="candidate_name"
                                            value="{!! old('candidate_name', $applications?->candidate_name ?? '') !!}"

                                            
                                        />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Father’s Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="father_name"
                                            name="father_name"
                                            value="{{$applications->father_name ?? '' }}"
                                            
                                        />
                                    </div>
                                    <div class="mb-3">
                                            <label class="form-label"
                                                >Mobile No</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="mobile"
                                                name="mobile"
                                                    value="{{$applications->mobile ?? '' }}"  
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
                                                name="dob"
                                                value="{{$applications->dob ?? ''}}"
                                                
                                            />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"
                                                >Gender</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="gender"
                                                name="gender"
                                                 value="{{$applications->gender ?? '' }}"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >Nationality</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nationality"
                                                name="nationality"
                                                value="{{$applications->nationality ?? '' }}"
                                                
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                 value="{{$applications->email ?? '' }}"
                                                
                                            />
                                            <small style="color:red"> Note: Your email ID should match the one used during registration.</small>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Details Section -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5 class="primary-heading">
                                        Correspondence Address Details
                                    </h5>
                                </div>
                                <!-- Correspondence Address -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"
                                        >House No./Street Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="correspondence_house"
                                        name="correspondence_house"
                                        placeholder="Enter your House No./Street Name"
                                        value="{{ old('correspondence_house', $applications->correspondence_house ?? '') }}"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">City/Town/Village</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="correspondence_city"
                                        name="correspondence_city"
                                        placeholder="Enter your City/Town/Village"
                                        value="{{ old('correspondence_city', $applications->correspondence_city ?? '') }}"
                                        required    
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">District</label>
                                    <input
                                    type="text"
                                        class="form-control"
                                        id="correspondence_district"
                                        name="correspondence_district"
                                         value="{{ old('correspondence_district', $applications->correspondence_district ?? '') }}"
                                         required
                                    >
                                        
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Country</label>
                                    <select
                                            class="form-select"
                                            id="correspondence_country"
                                            name="correspondence_country"
                                            required
                                        >
                                        <option value="Afghanistan" {{ old('correspondence_country') == 'Afghanistan' || ($applications->correspondence_country ?? '') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Bangladesh" {{ old('correspondence_country') == 'Bangladesh' || ($applications->correspondence_country ?? '') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Bhutan" {{ old('correspondence_country') == 'Bhutan' || ($applications->correspondence_country ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="India" {{ old('correspondence_country') == 'India' || ($applications->correspondence_country ?? '') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Maldives" {{ old('correspondence_country') == 'Maldives' || ($applications->correspondence_country ?? '') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Nepal" {{ old('correspondence_country') == 'Nepal' || ($applications->correspondence_country ?? '') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        <option value="Pakistan" {{ old('correspondence_country') == 'Pakistan' || ($applications->correspondence_country ?? '') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Sri Lanka" {{ old('correspondence_country') == 'Sri Lanka' || ($applications->correspondence_country ?? '') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="Albania" {{ old('correspondence_country') == 'Albania' || ($applications->correspondence_country ?? '') == 'Albania' ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ old('correspondence_country') == 'Algeria' || ($applications->correspondence_country ?? '') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                        <option value="Andorra" {{ old('correspondence_country') == 'Andorra' || ($applications->correspondence_country ?? '') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ old('correspondence_country') == 'Angola' || ($applications->correspondence_country ?? '') == 'Angola' ? 'selected' : '' }}>Angola</option>
                                        <option value="Antigua & Deps" {{ old('correspondence_country') == 'Antigua & Deps' || ($applications->correspondence_country ?? '') == 'Antigua & Deps' ? 'selected' : '' }}>Antigua & Deps</option>
                                        <option value="Argentina" {{ old('correspondence_country') == 'Argentina' || ($applications->correspondence_country ?? '') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ old('correspondence_country') == 'Armenia' || ($applications->correspondence_country ?? '') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                        <option value="Australia" {{ old('correspondence_country') == 'Australia' || ($applications->correspondence_country ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ old('correspondence_country') == 'Austria' || ($applications->correspondence_country ?? '') == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ old('correspondence_country') == 'Azerbaijan' || ($applications->correspondence_country ?? '') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ old('correspondence_country') == 'Bahamas' || ($applications->correspondence_country ?? '') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ old('correspondence_country') == 'Bahrain' || ($applications->correspondence_country ?? '') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Barbados" {{ old('correspondence_country') == 'Barbados' || ($applications->correspondence_country ?? '') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ old('correspondence_country') == 'Belarus' || ($applications->correspondence_country ?? '') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ old('correspondence_country') == 'Belgium' || ($applications->correspondence_country ?? '') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ old('correspondence_country') == 'Belize' || ($applications->correspondence_country ?? '') == 'Belize' ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ old('correspondence_country') == 'Benin' || ($applications->correspondence_country ?? '') == 'Benin' ? 'selected' : '' }}>Benin</option>
                                        <option value="Bhutan" {{ old('correspondence_country') == 'Bhutan' || ($applications->correspondence_country ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ old('correspondence_country') == 'Bolivia' || ($applications->correspondence_country ?? '') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia Herzegovina" {{ old('correspondence_country') == 'Bosnia Herzegovina' || ($applications->correspondence_country ?? '') == 'Bosnia Herzegovina' ? 'selected' : '' }}>Bosnia Herzegovina</option>
                                        <option value="Botswana" {{ old('correspondence_country') == 'Botswana' || ($applications->correspondence_country ?? '') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ old('correspondence_country') == 'Brazil' || ($applications->correspondence_country ?? '') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Brunei" {{ old('correspondence_country') == 'Brunei' || ($applications->correspondence_country ?? '') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                        <option value="Bulgaria" {{ old('correspondence_country') == 'Bulgaria' || ($applications->correspondence_country ?? '') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina" {{ old('correspondence_country') == 'Burkina' || ($applications->correspondence_country ?? '') == 'Burkina' ? 'selected' : '' }}>Burkina</option>
                                        <option value="Burundi" {{ old('correspondence_country') == 'Burundi' || ($applications->correspondence_country ?? '') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cambodia" {{ old('correspondence_country') == 'Cambodia' || ($applications->correspondence_country ?? '') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ old('correspondence_country') == 'Cameroon' || ($applications->correspondence_country ?? '') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ old('correspondence_country') == 'Canada' || ($applications->correspondence_country ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Cape Verde" {{ old('correspondence_country') == 'Cape Verde' || ($applications->correspondence_country ?? '') == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="Central African Rep" {{ old('correspondence_country') == 'Central African Rep' || ($applications->correspondence_country ?? '') == 'Central African Rep' ? 'selected' : '' }}>Central African Rep</option>
                                        <option value="Chad" {{ old('correspondence_country') == 'Chad' || ($applications->correspondence_country ?? '') == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ old('correspondence_country') == 'Chile' || ($applications->correspondence_country ?? '') == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ old('correspondence_country') == 'China' || ($applications->correspondence_country ?? '') == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Colombia" {{ old('correspondence_country') == 'Colombia' || ($applications->correspondence_country ?? '') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ old('correspondence_country') == 'Comoros' || ($applications->correspondence_country ?? '') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo" {{ old('correspondence_country') == 'Congo' || ($applications->correspondence_country ?? '') == 'Congo' ? 'selected' : '' }}>Congo</option>
                                        <option value="Congo {Democratic Rep}" {{ old('correspondence_country') == 'Congo {Democratic Rep}' || ($applications->correspondence_country ?? '') == 'Congo {Democratic Rep}' ? 'selected' : '' }}>Congo {Democratic Rep}</option>
                                        <option value="Costa Rica" {{ old('correspondence_country') == 'Costa Rica' || ($applications->correspondence_country ?? '') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Croatia" {{ old('correspondence_country') == 'Croatia' || ($applications->correspondence_country ?? '') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ old('correspondence_country') == 'Cuba' || ($applications->correspondence_country ?? '') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ old('correspondence_country') == 'Cyprus' || ($applications->correspondence_country ?? '') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ old('correspondence_country') == 'Czech Republic' || ($applications->correspondence_country ?? '') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ old('correspondence_country') == 'Denmark' || ($applications->correspondence_country ?? '') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ old('correspondence_country') == 'Djibouti' || ($applications->correspondence_country ?? '') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ old('correspondence_country') == 'Dominica' || ($applications->correspondence_country ?? '') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ old('correspondence_country') == 'Dominican Republic' || ($applications->correspondence_country ?? '') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="East Timor" {{ old('correspondence_country') == 'East Timor' || ($applications->correspondence_country ?? '') == 'East Timor' ? 'selected' : '' }}>East Timor</option>
                                        <option value="Ecuador" {{ old('correspondence_country') == 'Ecuador' || ($applications->correspondence_country ?? '') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ old('correspondence_country') == 'Egypt' || ($applications->correspondence_country ?? '') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ old('correspondence_country') == 'El Salvador' || ($applications->correspondence_country ?? '') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ old('correspondence_country') == 'Equatorial Guinea' || ($applications->correspondence_country ?? '') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ old('correspondence_country') == 'Eritrea' || ($applications->correspondence_country ?? '') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ old('correspondence_country') == 'Estonia' || ($applications->correspondence_country ?? '') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                        <option value="Ethiopia" {{ old('correspondence_country') == 'Ethiopia' || ($applications->correspondence_country ?? '') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Fiji" {{ old('correspondence_country') == 'Fiji' || ($applications->correspondence_country ?? '') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ old('correspondence_country') == 'Finland' || ($applications->correspondence_country ?? '') == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ old('correspondence_country') == 'France' || ($applications->correspondence_country ?? '') == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Gabon" {{ old('correspondence_country') == 'Gabon' || ($applications->correspondence_country ?? '') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ old('correspondence_country') == 'Gambia' || ($applications->correspondence_country ?? '') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ old('correspondence_country') == 'Georgia' || ($applications->correspondence_country ?? '') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ old('correspondence_country') == 'Germany' || ($applications->correspondence_country ?? '') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ old('correspondence_country') == 'Ghana' || ($applications->correspondence_country ?? '') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Greece" {{ old('correspondence_country') == 'Greece' || ($applications->correspondence_country ?? '') == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Grenada" {{ old('correspondence_country') == 'Grenada' || ($applications->correspondence_country ?? '') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guatemala" {{ old('correspondence_country') == 'Guatemala' || ($applications->correspondence_country ?? '') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ old('correspondence_country') == 'Guinea' || ($applications->correspondence_country ?? '') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ old('correspondence_country') == 'Guinea-Bissau' || ($applications->correspondence_country ?? '') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ old('correspondence_country') == 'Guyana' || ($applications->correspondence_country ?? '') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ old('correspondence_country') == 'Haiti' || ($applications->correspondence_country ?? '') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ old('correspondence_country') == 'Honduras' || ($applications->correspondence_country ?? '') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hungary" {{ old('correspondence_country') == 'Hungary' || ($applications->correspondence_country ?? '') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ old('correspondence_country') == 'Iceland' || ($applications->correspondence_country ?? '') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                        <option value="Indonesia" {{ old('correspondence_country') == 'Indonesia' || ($applications->correspondence_country ?? '') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ old('correspondence_country') == 'Iran' || ($applications->correspondence_country ?? '') == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq" {{ old('correspondence_country') == 'Iraq' || ($applications->correspondence_country ?? '') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland {Republic}" {{ old('correspondence_country') == 'Ireland {Republic}' || ($applications->correspondence_country ?? '') == 'Ireland {Republic}' ? 'selected' : '' }}>Ireland {Republic}</option>
                                        <option value="Israel" {{ old('correspondence_country') == 'Israel' || ($applications->correspondence_country ?? '') == 'Israel' ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ old('correspondence_country') == 'Italy' || ($applications->correspondence_country ?? '') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Ivory Coast" {{ old('correspondence_country') == 'Ivory Coast' || ($applications->correspondence_country ?? '') == 'Ivory Coast' ? 'selected' : '' }}>Ivory Coast</option>
                                        <option value="Jamaica" {{ old('correspondence_country') == 'Jamaica' || ($applications->correspondence_country ?? '') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ old('correspondence_country') == 'Japan' || ($applications->correspondence_country ?? '') == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Jordan" {{ old('correspondence_country') == 'Jordan' || ($applications->correspondence_country ?? '') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ old('correspondence_country') == 'Kazakhstan' || ($applications->correspondence_country ?? '') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ old('correspondence_country') == 'Kenya' || ($applications->correspondence_country ?? '') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ old('correspondence_country') == 'Kiribati' || ($applications->correspondence_country ?? '') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea North" {{ old('correspondence_country') == 'Korea North' || ($applications->correspondence_country ?? '') == 'Korea North' ? 'selected' : '' }}>Korea North</option>
                                    </select>    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">State</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="correspondence_state"
                                        name="correspondence_state"
                                        placeholder="Enter your State"
                                        value="{{ old('correspondence_state', $applications->correspondence_state ?? '') }}"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"
                                        >PIN/ZIP Code</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="correspondence_zip"
                                        name="correspondence_zip"
                                        placeholder="Enter your PIN/ZIP Code"
                                        value="{{ old('correspondence_zip', $applications->correspondence_zip ?? '') }}"
                                        required
                                    />
                                </div>

                                <!-- Checkbox to Copy Correspondence Address to Permanent Address -->
                                <div class="col-md-12 mb-3 ms-4">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="same_as_correspondence"
                                            onclick="copyAddress()"
                                            
                                        />
                                        <label
                                            class="form-check-label"
                                            for="same_as_correspondence"
                                            >Permanent Address same as
                                            Correspondence Address</label
                                        >
                                    </div>
                                </div>

                                <!-- Permanent Address Section -->
                                <div class="col-md-12 mt-4">
                                    <h5 class="primary-heading">
                                        Permanent Address
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"
                                        >House No./Street Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="permanent_house"
                                        name="permanent_house"
                                        placeholder="Enter your Permanent House No./Street Name"
                                        value="{{ old('permanent_house', $applications->permanent_house ?? '') }}"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"
                                        >City/Town/Village</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="permanent_city"
                                        name="permanent_city"
                                        placeholder="Enter your Permanent City/Town/Village"
                                        value="{{ old('permanent_city', $applications->permanent_city ?? '') }}"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">District</label>
                                    <input

                                        class="form-control"
                                        id="permanent_district"
                                        name="permanent_district"
                                        value="{{ old('permanent_district', $applications->permanent_district ?? '') }}"
                                        required    
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Country</label>


                                    <select
                                            class="form-select"
                                            id="permanent_country"
                                            name="permanent_country"
                                            required
                                        >
                                        <option value="Afghanistan" {{ old('permanent_country') == 'Afghanistan' || ($applications->permanent_country ?? '') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                        <option value="Bangladesh" {{ old('permanent_country') == 'Bangladesh' || ($applications->permanent_country ?? '') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="Bhutan" {{ old('permanent_country') == 'Bhutan' || ($applications->permanent_country ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="India" {{ old('permanent_country') == 'India' || ($applications->permanent_country ?? '') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Maldives" {{ old('permanent_country') == 'Maldives' || ($applications->permanent_country ?? '') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Nepal" {{ old('permanent_country') == 'Nepal' || ($applications->permanent_country ?? '') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                        <option value="Pakistan" {{ old('permanent_country') == 'Pakistan' || ($applications->permanent_country ?? '') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Sri Lanka" {{ old('permanent_country') == 'Sri Lanka' || ($applications->permanent_country ?? '') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>

                                        <option value="Albania" {{ old('permanent_country') == 'Albania' || ($applications->permanent_country ?? '') == 'Albania' ? 'selected' : '' }}>Albania</option>
                                        <option value="Algeria" {{ old('permanent_country') == 'Algeria' || ($applications->permanent_country ?? '') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                        <option value="Andorra" {{ old('permanent_country') == 'Andorra' || ($applications->permanent_country ?? '') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                        <option value="Angola" {{ old('permanent_country') == 'Angola' || ($applications->permanent_country ?? '') == 'Angola' ? 'selected' : '' }}>Angola</option>
                                        <option value="Antigua & Deps" {{ old('permanent_country') == 'Antigua & Deps' || ($applications->permanent_country ?? '') == 'Antigua & Deps' ? 'selected' : '' }}>Antigua & Deps</option>
                                        <option value="Argentina" {{ old('permanent_country') == 'Argentina' || ($applications->permanent_country ?? '') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Armenia" {{ old('permanent_country') == 'Armenia' || ($applications->permanent_country ?? '') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                        <option value="Australia" {{ old('permanent_country') == 'Australia' || ($applications->permanent_country ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Austria" {{ old('permanent_country') == 'Austria' || ($applications->permanent_country ?? '') == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Azerbaijan" {{ old('permanent_country') == 'Azerbaijan' || ($applications->permanent_country ?? '') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ old('permanent_country') == 'Bahamas' || ($applications->permanent_country ?? '') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                        <option value="Bahrain" {{ old('permanent_country') == 'Bahrain' || ($applications->permanent_country ?? '') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                        <option value="Barbados" {{ old('permanent_country') == 'Barbados' || ($applications->permanent_country ?? '') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                        <option value="Belarus" {{ old('permanent_country') == 'Belarus' || ($applications->permanent_country ?? '') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                        <option value="Belgium" {{ old('permanent_country') == 'Belgium' || ($applications->permanent_country ?? '') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Belize" {{ old('permanent_country') == 'Belize' || ($applications->permanent_country ?? '') == 'Belize' ? 'selected' : '' }}>Belize</option>
                                        <option value="Benin" {{ old('permanent_country') == 'Benin' || ($applications->permanent_country ?? '') == 'Benin' ? 'selected' : '' }}>Benin</option>
                                        <option value="Bhutan" {{ old('permanent_country') == 'Bhutan' || ($applications->permanent_country ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                        <option value="Bolivia" {{ old('permanent_country') == 'Bolivia' || ($applications->permanent_country ?? '') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                        <option value="Bosnia Herzegovina" {{ old('permanent_country') == 'Bosnia Herzegovina' || ($applications->permanent_country ?? '') == 'Bosnia Herzegovina' ? 'selected' : '' }}>Bosnia Herzegovina</option>
                                        <option value="Botswana" {{ old('permanent_country') == 'Botswana' || ($applications->permanent_country ?? '') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                        <option value="Brazil" {{ old('permanent_country') == 'Brazil' || ($applications->permanent_country ?? '') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Brunei" {{ old('permanent_country') == 'Brunei' || ($applications->permanent_country ?? '') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                        <option value="Bulgaria" {{ old('permanent_country') == 'Bulgaria' || ($applications->permanent_country ?? '') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Burkina" {{ old('permanent_country') == 'Burkina' || ($applications->permanent_country ?? '') == 'Burkina' ? 'selected' : '' }}>Burkina</option>
                                        <option value="Burundi" {{ old('permanent_country') == 'Burundi' || ($applications->permanent_country ?? '') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                        <option value="Cambodia" {{ old('permanent_country') == 'Cambodia' || ($applications->permanent_country ?? '') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                        <option value="Cameroon" {{ old('permanent_country') == 'Cameroon' || ($applications->permanent_country ?? '') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                        <option value="Canada" {{ old('permanent_country') == 'Canada' || ($applications->permanent_country ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Cape Verde" {{ old('permanent_country') == 'Cape Verde' || ($applications->permanent_country ?? '') == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="Central African Rep" {{ old('permanent_country') == 'Central African Rep' || ($applications->permanent_country ?? '') == 'Central African Rep' ? 'selected' : '' }}>Central African Rep</option>
                                        <option value="Chad" {{ old('permanent_country') == 'Chad' || ($applications->permanent_country ?? '') == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile" {{ old('permanent_country') == 'Chile' || ($applications->permanent_country ?? '') == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="China" {{ old('permanent_country') == 'China' || ($applications->permanent_country ?? '') == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Colombia" {{ old('permanent_country') == 'Colombia' || ($applications->permanent_country ?? '') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Comoros" {{ old('permanent_country') == 'Comoros' || ($applications->permanent_country ?? '') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                        <option value="Congo" {{ old('permanent_country') == 'Congo' || ($applications->permanent_country ?? '') == 'Congo' ? 'selected' : '' }}>Congo</option>
                                        <option value="Congo {Democratic Rep}" {{ old('permanent_country') == 'Congo {Democratic Rep}' || ($applications->permanent_country ?? '') == 'Congo {Democratic Rep}' ? 'selected' : '' }}>Congo {Democratic Rep}</option>
                                        <option value="Costa Rica" {{ old('permanent_country') == 'Costa Rica' || ($applications->permanent_country ?? '') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="Croatia" {{ old('permanent_country') == 'Croatia' || ($applications->permanent_country ?? '') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                        <option value="Cuba" {{ old('permanent_country') == 'Cuba' || ($applications->permanent_country ?? '') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                        <option value="Cyprus" {{ old('permanent_country') == 'Cyprus' || ($applications->permanent_country ?? '') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                        <option value="Czech Republic" {{ old('permanent_country') == 'Czech Republic' || ($applications->permanent_country ?? '') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ old('permanent_country') == 'Denmark' || ($applications->permanent_country ?? '') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Djibouti" {{ old('permanent_country') == 'Djibouti' || ($applications->permanent_country ?? '') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                        <option value="Dominica" {{ old('permanent_country') == 'Dominica' || ($applications->permanent_country ?? '') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                        <option value="Dominican Republic" {{ old('permanent_country') == 'Dominican Republic' || ($applications->permanent_country ?? '') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="East Timor" {{ old('permanent_country') == 'East Timor' || ($applications->permanent_country ?? '') == 'East Timor' ? 'selected' : '' }}>East Timor</option>
                                        <option value="Ecuador" {{ old('permanent_country') == 'Ecuador' || ($applications->permanent_country ?? '') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                        <option value="Egypt" {{ old('permanent_country') == 'Egypt' || ($applications->permanent_country ?? '') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="El Salvador" {{ old('permanent_country') == 'El Salvador' || ($applications->permanent_country ?? '') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ old('permanent_country') == 'Equatorial Guinea' || ($applications->permanent_country ?? '') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ old('permanent_country') == 'Eritrea' || ($applications->permanent_country ?? '') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                        <option value="Estonia" {{ old('permanent_country') == 'Estonia' || ($applications->permanent_country ?? '') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                        <option value="Ethiopia" {{ old('permanent_country') == 'Ethiopia' || ($applications->permanent_country ?? '') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="Fiji" {{ old('permanent_country') == 'Fiji' || ($applications->permanent_country ?? '') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland" {{ old('permanent_country') == 'Finland' || ($applications->permanent_country ?? '') == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ old('permanent_country') == 'France' || ($applications->permanent_country ?? '') == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Gabon" {{ old('permanent_country') == 'Gabon' || ($applications->permanent_country ?? '') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                        <option value="Gambia" {{ old('permanent_country') == 'Gambia' || ($applications->permanent_country ?? '') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                        <option value="Georgia" {{ old('permanent_country') == 'Georgia' || ($applications->permanent_country ?? '') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Germany" {{ old('permanent_country') == 'Germany' || ($applications->permanent_country ?? '') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Ghana" {{ old('permanent_country') == 'Ghana' || ($applications->permanent_country ?? '') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                        <option value="Greece" {{ old('permanent_country') == 'Greece' || ($applications->permanent_country ?? '') == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Grenada" {{ old('permanent_country') == 'Grenada' || ($applications->permanent_country ?? '') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                        <option value="Guatemala" {{ old('permanent_country') == 'Guatemala' || ($applications->permanent_country ?? '') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                        <option value="Guinea" {{ old('permanent_country') == 'Guinea' || ($applications->permanent_country ?? '') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                        <option value="Guinea-Bissau" {{ old('permanent_country') == 'Guinea-Bissau' || ($applications->permanent_country ?? '') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                        <option value="Guyana" {{ old('permanent_country') == 'Guyana' || ($applications->permanent_country ?? '') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                        <option value="Haiti" {{ old('permanent_country') == 'Haiti' || ($applications->permanent_country ?? '') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                        <option value="Honduras" {{ old('permanent_country') == 'Honduras' || ($applications->permanent_country ?? '') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                        <option value="Hungary" {{ old('permanent_country') == 'Hungary' || ($applications->permanent_country ?? '') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="Iceland" {{ old('permanent_country') == 'Iceland' || ($applications->permanent_country ?? '') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                        <option value="Indonesia" {{ old('permanent_country') == 'Indonesia' || ($applications->permanent_country ?? '') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Iran" {{ old('permanent_country') == 'Iran' || ($applications->permanent_country ?? '') == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq" {{ old('permanent_country') == 'Iraq' || ($applications->permanent_country ?? '') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland {Republic}" {{ old('permanent_country') == 'Ireland {Republic}' || ($applications->permanent_country ?? '') == 'Ireland {Republic}' ? 'selected' : '' }}>Ireland {Republic}</option>
                                        <option value="Israel" {{ old('permanent_country') == 'Israel' || ($applications->permanent_country ?? '') == 'Israel' ? 'selected' : '' }}>Israel</option>
                                        <option value="Italy" {{ old('permanent_country') == 'Italy' || ($applications->permanent_country ?? '') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Ivory Coast" {{ old('permanent_country') == 'Ivory Coast' || ($applications->permanent_country ?? '') == 'Ivory Coast' ? 'selected' : '' }}>Ivory Coast</option>
                                        <option value="Jamaica" {{ old('permanent_country') == 'Jamaica' || ($applications->permanent_country ?? '') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                        <option value="Japan" {{ old('permanent_country') == 'Japan' || ($applications->permanent_country ?? '') == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Jordan" {{ old('permanent_country') == 'Jordan' || ($applications->permanent_country ?? '') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                        <option value="Kazakhstan" {{ old('permanent_country') == 'Kazakhstan' || ($applications->permanent_country ?? '') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="Kenya" {{ old('permanent_country') == 'Kenya' || ($applications->permanent_country ?? '') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                        <option value="Kiribati" {{ old('permanent_country') == 'Kiribati' || ($applications->permanent_country ?? '') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                        <option value="Korea North" {{ old('permanent_country') == 'Korea North' || ($applications->permanent_country ?? '') == 'Korea North' ? 'selected' : '' }}>Korea North</option>
                                    </select>    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">State</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="permanent_state"
                                        name="permanent_state"
                                        placeholder="Enter your Permanent State"
                                        value="{{ old('permanent_state', $applications->permanent_state ?? '') }}"
                                        required
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"
                                        >PIN/ZIP Code</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="permanent_zip"
                                        name="permanent_zip"
                                        placeholder="Enter your Permanent PIN/ZIP Code"
                                        value="{{ old('permanent_zip', $applications->permanent_zip ?? '') }}"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Save & Next
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

      
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById("sidebar");
                const body = document.body;
                sidebar.classList.toggle("show");
                // body.classList.toggle("sidebar-open");
            }
        </script>
        <!-- JavaScript to handle the checkbox functionality -->
        <script>
            function copyAddress() {
                var checkBox = document.getElementById(
                    "same_as_correspondence"
                );
                if (checkBox.checked) {
                    // Copy values from Correspondence Address to Permanent Address
                    document.getElementById("permanent_house").value =
                        document.getElementById("correspondence_house").value;
                    document.getElementById("permanent_city").value =
                        document.getElementById("correspondence_city").value;
                    document.getElementById("permanent_district").value =
                        document.getElementById(
                            "correspondence_district"
                        ).value;
                    document.getElementById("permanent_country").value =
                        document.getElementById("correspondence_country").value;
                    document.getElementById("permanent_state").value =
                        document.getElementById("correspondence_state").value;
                    document.getElementById("permanent_zip").value =
                        document.getElementById("correspondence_zip").value;
                } else {
                    // Clear the Permanent Address fields if the checkbox is unchecked
                    document.getElementById("permanent_house").value = "";
                    document.getElementById("permanent_city").value = "";
                    document.getElementById("permanent_district").value = "";
                    document.getElementById("permanent_country").value = "";
                    document.getElementById("permanent_state").value = "";
                    document.getElementById("permanent_zip").value = "";
                }
            }
        </script>



@php
    use App\Models\StepStatus;
    use Illuminate\Support\Facades\Auth;
    $isEditMode = StepStatus::where('application_id', Auth::id())
                    ->where('edit_mode', 1)
                    ->exists();
@endphp
@if($isEditMode)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('input, textarea, select, button');
            inputs.forEach(input => input.setAttribute('disabled', 'true'));
        });
    </script>
@endif


  @endsection