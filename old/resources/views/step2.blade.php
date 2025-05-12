@extends('layouts.main')
@section('content')

    <!-- content-here -->
    <div class="content-container" id="content">
        <!-- dashboard page -->
        <div class="page page-dashboard">
            <style>
                .passport_detail,
                .suspended,
                .chronic_ailment {
                    display: none;
                }
            </style>
            <style>
                .C_list {
                    height: 210px;
                    overflow: auto;
                }

                .form-horizontal .form-group {
                    margin-left: 0;
                    margin-right: 0;
                }

                /*.checkbox1 {
                                                  position: relative;font-weight: normal;
                                                  cursor: pointer;user-select: none;font-family: Arial,Helvetica,sans-serif;
                                                  font-size: small;    line-height: 27px;letter-spacing: .5px;    margin-right: 20px;
                                                  }
                                                  .checkbox1:before {
                                                  content: "";
                                                  width: 20px;
                                                  height: 20px;
                                                  top: -7px;
                                                  left: -3.9px;
                                                  border: 2px solid #919191;
                                                  box-shadow: 0 1px 1px rgb(0 0 0 / 5%); position:absolute;    border-radius: 100%;
                                                  background-color: #ffffff;
                                                  }
                                                  .checkbox1:after {
                                                  content: "";
                                                  width: 10px;
                                                  height: 10px;
                                                  border-radius: 100%;
                                                  top: 6px;
                                                  left: 5px;
                                                  background: #6a6a6a;
                                                  }*/
            </style>
            <div class="page-wrap">
                <form role="form" class="form-horizontal" id="personalform" method="post" action="{{ url('insert2') }}">
                    @csrf
                    <div class="row">
                        <!-- dashboard header -->
                        <div class="col-md-12">
                            <div class="dash-head clearfix mt15 mb20 basic_detail_head">
                                <div class="left">
                                    <h4 class="mb5 text-light">Personal Details</h4>
                                    <input type="hidden" id="UserGenno" />
                                    <input type="hidden" id="hIntl" value="0">
                                </div>
                                <div class="right mt10">
                                    <p class="small text-danger"><strong>*</strong> Denotes mandatory field </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #end row -->


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif(Session::has('warning'))
                        <div class="alert alert-danger">{{ Session::get('warning') }} </div>
                    @endif




                    <div class="row">
                        <div class="col-sm-12 col-md-6 fullwidth">
                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">
                                    Personal Details<br>
                                </div>
                                <div class="panel-body fatherDetails">
                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Nationality<span
                                                class="text-danger">*</span></label>

                                        <div class="col-md-9">
                                            <select name="nationality" id="ns_countrycode" class="form-control"
                                                onclick="fillMobileCode(this);">

                                                <option data-countrycode="IN" value="91"
                                                    {{ $data->nationality == '91' ? 'selected' : '' }}>India (+91)</option>
                                                <option data-countrycode="GB" value="44"
                                                    {{ $data->nationality == '44' ? 'selected' : '' }}>UK (+44)</option>
                                                <option data-countrycode="DZ" value="213"
                                                    {{ $data->nationality == '213' ? 'selected' : '' }}>Algeria (+213)
                                                </option>
                                                <option data-countrycode="AD" value="376"
                                                    {{ $data->nationality == '376' ? 'selected' : '' }}>Andorra (+376)
                                                </option>
                                                <option data-countrycode="AO" value="244"
                                                    {{ $data->nationality == '244' ? 'selected' : '' }}>Angola (+244)
                                                </option>
                                                <option data-countrycode="AI" value="1264"
                                                    {{ $data->nationality == '1264' ? 'selected' : '' }}>Anguilla (+1264)
                                                </option>
                                                <option data-countrycode="AG" value="1268"
                                                    {{ $data->nationality == '1268' ? 'selected' : '' }}>Antigua &amp;
                                                    Barbuda (+1268)</option>
                                                <option data-countrycode="AR" value="54"
                                                    {{ $data->nationality == '54' ? 'selected' : '' }}>Argentina (+54)
                                                </option>
                                                <option data-countrycode="AF" value="93"
                                                    {{ $data->nationality == '93' ? 'selected' : '' }}>Afghanistan (+93)
                                                </option>
                                                <option data-countrycode="AM" value="374"
                                                    {{ $data->nationality == '374' ? 'selected' : '' }}>Armenia (+374)
                                                </option>
                                                <option data-countrycode="AW" value="297"
                                                    {{ $data->nationality == '297' ? 'selected' : '' }}>Aruba (+297)
                                                </option>
                                                <option data-countrycode="AU" value="61"
                                                    {{ $data->nationality == '61' ? 'selected' : '' }}>Australia (+61)
                                                </option>
                                                <option data-countrycode="AT" value="43"
                                                    {{ $data->nationality == '43' ? 'selected' : '' }}>Austria (+43)
                                                </option>
                                                <option data-countrycode="AZ" value="994"
                                                    {{ $data->nationality == '994' ? 'selected' : '' }}>Azerbaijan (+994)
                                                </option>
                                                <option data-countrycode="BS" value="1242"
                                                    {{ $data->nationality == '1242' ? 'selected' : '' }}>Bahamas (+1242)
                                                </option>
                                                <option data-countrycode="BH" value="973"
                                                    {{ $data->nationality == '973' ? 'selected' : '' }}>Bahrain (+973)
                                                </option>
                                                <option data-countrycode="BD" value="880"
                                                    {{ $data->nationality == '880' ? 'selected' : '' }}>Bangladesh (+880)
                                                </option>
                                                <option data-countrycode="BB" value="1246"
                                                    {{ $data->nationality == '1246' ? 'selected' : '' }}>Barbados (+1246)
                                                </option>
                                                <option data-countrycode="BY" value="375"
                                                    {{ $data->nationality == '375' ? 'selected' : '' }}>Belarus (+375)
                                                </option>
                                                <option data-countrycode="BE" value="32"
                                                    {{ $data->nationality == '32' ? 'selected' : '' }}>Belgium (+32)
                                                </option>
                                                <option data-countrycode="BZ" value="501"
                                                    {{ $data->nationality == '501' ? 'selected' : '' }}>Belize (+501)
                                                </option>
                                                <option data-countrycode="BJ" value="229"
                                                    {{ $data->nationality == '229' ? 'selected' : '' }}>Benin (+229)
                                                </option>
                                                <option data-countrycode="BM" value="1441"
                                                    {{ $data->nationality == '1441' ? 'selected' : '' }}>Bermuda (+1441)
                                                </option>
                                                <option data-countrycode="BT" value="975"
                                                    {{ $data->nationality == '975' ? 'selected' : '' }}>Bhutan (+975)
                                                </option>
                                                <option data-countrycode="BO" value="591"
                                                    {{ $data->nationality == '591' ? 'selected' : '' }}>Bolivia (+591)
                                                </option>
                                                <option data-countrycode="BA" value="387"
                                                    {{ $data->nationality == '387' ? 'selected' : '' }}>Bosnia Herzegovina
                                                    (+387)</option>
                                                <option data-countrycode="BW" value="267"
                                                    {{ $data->nationality == '267' ? 'selected' : '' }}>Botswana (+267)
                                                </option>
                                                <option data-countrycode="BR" value="55"
                                                    {{ $data->nationality == '55' ? 'selected' : '' }}>Brazil (+55)
                                                </option>
                                                <option data-countrycode="BN" value="673"
                                                    {{ $data->nationality == '673' ? 'selected' : '' }}>Brunei (+673)
                                                </option>
                                                <option data-countrycode="BG" value="359"
                                                    {{ $data->nationality == '359' ? 'selected' : '' }}>Bulgaria (+359)
                                                </option>
                                                <option data-countrycode="BF" value="226"
                                                    {{ $data->nationality == '226' ? 'selected' : '' }}>Burkina Faso (+226)
                                                </option>
                                                <option data-countrycode="BI" value="257"
                                                    {{ $data->nationality == '257' ? 'selected' : '' }}>Burundi (+257)
                                                </option>
                                                <option data-countrycode="KH" value="855"
                                                    {{ $data->nationality == '855' ? 'selected' : '' }}>Cambodia (+855)
                                                </option>
                                                <option data-countrycode="CM" value="237"
                                                    {{ $data->nationality == '237' ? 'selected' : '' }}>Cameroon (+237)
                                                </option>
                                                <option data-countrycode="CA" value="1"
                                                    {{ $data->nationality == '1' ? 'selected' : '' }}>Canada (+1)</option>
                                                <option data-countrycode="CV" value="238"
                                                    {{ $data->nationality == '238' ? 'selected' : '' }}>Cape Verde Islands
                                                    (+238)</option>
                                                <option data-countrycode="KY" value="1345"
                                                    {{ $data->nationality == '1345' ? 'selected' : '' }}>Cayman Islands
                                                    (+1345)</option>
                                                <option data-countrycode="CF" value="236"
                                                    {{ $data->nationality == '236' ? 'selected' : '' }}>Central African
                                                    Republic (+236)</option>
                                                <option data-countrycode="CL" value="56"
                                                    {{ $data->nationality == '56' ? 'selected' : '' }}>Chile (+56)</option>
                                                <option data-countrycode="CN" value="86"
                                                    {{ $data->nationality == '86' ? 'selected' : '' }}>China (+86)</option>
                                                <option data-countrycode="CO" value="57"
                                                    {{ $data->nationality == '57' ? 'selected' : '' }}>Colombia (+57)
                                                </option>
                                                <option data-countrycode="KM" value="269"
                                                    {{ $data->nationality == '269' ? 'selected' : '' }}>Comoros (+269)
                                                </option>
                                                <option data-countrycode="CG" value="242"
                                                    {{ $data->nationality == '242' ? 'selected' : '' }}>Congo (+242)
                                                </option>
                                                <option data-countrycode="CK" value="682"
                                                    {{ $data->nationality == '682' ? 'selected' : '' }}>Cook Islands (+682)
                                                </option>
                                                <option data-countrycode="CR" value="506"
                                                    {{ $data->nationality == '506' ? 'selected' : '' }}>Costa Rica (+506)
                                                </option>
                                                <option data-countrycode="HR" value="385"
                                                    {{ $data->nationality == '385' ? 'selected' : '' }}>Croatia (+385)
                                                </option>
                                                <option data-countrycode="CU" value="53"
                                                    {{ $data->nationality == '53' ? 'selected' : '' }}>Cuba (+53)</option>
                                                <option data-countrycode="CY" value="90392"
                                                    {{ $data->nationality == '90392' ? 'selected' : '' }}>Cyprus North
                                                    (+90392)</option>
                                                <option data-countrycode="CY" value="357"
                                                    {{ $data->nationality == '357' ? 'selected' : '' }}>Cyprus South (+357)
                                                </option>
                                                <option data-countrycode="CZ" value="42"
                                                    {{ $data->nationality == '42' ? 'selected' : '' }}>Czech Republic (+42)
                                                </option>
                                                <option data-countrycode="DK" value="45"
                                                    {{ $data->nationality == '45' ? 'selected' : '' }}>Denmark (+45)
                                                </option>
                                                <option data-countrycode="DJ" value="253"
                                                    {{ $data->nationality == '253' ? 'selected' : '' }}>Djibouti (+253)
                                                </option>
                                                <option data-countrycode="DM" value="1809"
                                                    {{ $data->nationality == '1809' ? 'selected' : '' }}>Dominica (+1809)
                                                </option>
                                                <option data-countrycode="DO" value="1809"
                                                    {{ $data->nationality == '1809' ? 'selected' : '' }}>Dominican Republic
                                                    (+1809)</option>

                                                <option value="593"
                                                    {{ $data->nationality == '593' ? 'selected' : '' }}>Ecuador (+593)
                                                </option>
                                                <option value="20" {{ $data->nationality == '20' ? 'selected' : '' }}>
                                                    Egypt (+20)</option>
                                                <option value="503"
                                                    {{ $data->nationality == '503' ? 'selected' : '' }}>El Salvador (+503)
                                                </option>
                                                <option value="240"
                                                    {{ $data->nationality == '240' ? 'selected' : '' }}>Equatorial Guinea
                                                    (+240)</option>
                                                <option value="291"
                                                    {{ $data->nationality == '291' ? 'selected' : '' }}>Eritrea (+291)
                                                </option>
                                                <option value="372"
                                                    {{ $data->nationality == '372' ? 'selected' : '' }}>Estonia (+372)
                                                </option>
                                                <option value="251"
                                                    {{ $data->nationality == '251' ? 'selected' : '' }}>Ethiopia (+251)
                                                </option>
                                                <option value="500"
                                                    {{ $data->nationality == '500' ? 'selected' : '' }}>Falkland Islands
                                                    (+500)</option>
                                                <option value="298"
                                                    {{ $data->nationality == '298' ? 'selected' : '' }}>Faroe Islands
                                                    (+298)</option>
                                                <option value="679"
                                                    {{ $data->nationality == '679' ? 'selected' : '' }}>Fiji (+679)
                                                </option>
                                                <option value="358"
                                                    {{ $data->nationality == '358' ? 'selected' : '' }}>Finland (+358)
                                                </option>
                                                <option value="33" {{ $data->nationality == '33' ? 'selected' : '' }}>
                                                    France (+33)</option>
                                                <option value="594"
                                                    {{ $data->nationality == '594' ? 'selected' : '' }}>French Guiana
                                                    (+594)</option>
                                                <option value="689"
                                                    {{ $data->nationality == '689' ? 'selected' : '' }}>French Polynesia
                                                    (+689)</option>

                                               
                                                    <option data-countrycode="GA" value="241" {{ $data->nationality == '241' ? 'selected' : '' }} >Gabon (+241)</option>
<option data-countrycode="GM" value="220" {{ $data->nationality == '220' ? 'selected' : '' }} >Gambia (+220)</option>
<option data-countrycode="GE" value="7880" {{ $data->nationality == '7880' ? 'selected' : '' }} >Georgia (+7880)
</option>
<option data-countrycode="DE" value="49" {{ $data->nationality == '49' ? 'selected' : '' }} >Germany (+49)</option>
<option data-countrycode="GH" value="233" {{ $data->nationality == '233' ? 'selected' : '' }} >Ghana (+233)</option>
<option data-countrycode="GI" value="350" {{ $data->nationality == '350' ? 'selected' : '' }} >Gibraltar (+350)</option>
<option data-countrycode="GR" value="30" {{ $data->nationality == '30' ? 'selected' : '' }} >Greece (+30)</option>
<option data-countrycode="GL" value="299" {{ $data->nationality == '299' ? 'selected' : '' }} >Greenland (+299)</option>
<option data-countrycode="GD" value="1473" {{ $data->nationality == '1473' ? 'selected' : '' }} >Grenada (+1473)
</option>
<option data-countrycode="GP" value="590" {{ $data->nationality == '590' ? 'selected' : '' }}>Guadeloupe (+590)</option>
<option data-countrycode="GU" value="671" {{ $data->nationality == '671' ? 'selected' : '' }}>Guam (+671)</option>
<option data-countrycode="GT" value="502" {{ $data->nationality == '502' ? 'selected' : '' }}>Guatemala (+502)</option>
<option data-countrycode="GN" value="224" {{ $data->nationality == '224' ? 'selected' : '' }}>Guinea (+224)</option>
<option data-countrycode="GW" value="245" {{ $data->nationality == '245' ? 'selected' : '' }}>Guinea - Bissau (+245)
</option>
<option data-countrycode="GY" value="592" {{ $data->nationality == '592' ? 'selected' : '' }}>Guyana (+592)</option>
<option data-countrycode="HT" value="509" {{ $data->nationality == '209' ? 'selected' : '' }}>Haiti (+509)</option>
<option data-countrycode="HN" value="504" {{ $data->nationality == '204' ? 'selected' : '' }}>Honduras (+504)</option>
<option data-countrycode="HK" value="852" {{ $data->nationality == '852' ? 'selected' : '' }}>Hong Kong (+852)</option>
<option data-countrycode="HU" value="36" {{ $data->nationality == '36' ? 'selected' : '' }}>Hungary (+36)</option>
<option data-countrycode="IS" value="354" {{ $data->nationality == '354' ? 'selected' : '' }}>Iceland (+354)</option>
<option data-countrycode="ID" value="62" {{ $data->nationality == '62' ? 'selected' : '' }}>Indonesia (+62)</option>
<option data-countrycode="IR" value="98" {{ $data->nationality == '98' ? 'selected' : '' }}>Iran (+98)</option>
<option data-countrycode="IQ" value="964" {{ $data->nationality == '964' ? 'selected' : '' }}>Iraq (+964)</option>
<option data-countrycode="IE" value="353" {{ $data->nationality == '353' ? 'selected' : '' }}>Ireland (+353)</option>
<option data-countrycode="IL" value="972" {{ $data->nationality == '972' ? 'selected' : '' }}>Israel (+972)</option>
<option data-countrycode="IT" value="39" {{ $data->nationality == '39' ? 'selected' : '' }}>Italy (+39)</option>
<option data-countrycode="JM" value="1876" {{ $data->nationality == '2876' ? 'selected' : '' }}>Jamaica (+1876)</option>
<option data-countrycode="JP" value="81" {{ $data->nationality == '81' ? 'selected' : '' }}>Japan (+81)</option>
<option data-countrycode="JO" value="962" {{ $data->nationality == '962' ? 'selected' : '' }}>Jordan (+962)</option>
<option data-countrycode="KZ" value="7" {{ $data->nationality == '7' ? 'selected' : '' }}>Kazakhstan (+7)</option>
<option data-countrycode="KE" value="254" {{ $data->nationality == '254' ? 'selected' : '' }}>Kenya (+254)</option>
<option data-countrycode="KI" value="686" {{ $data->nationality == '686' ? 'selected' : '' }}>Kiribati (+686)</option>
<option data-countrycode="KP" value="850" {{ $data->nationality == '850' ? 'selected' : '' }}> Korea North (+850)
</option>
<option data-countrycode="KR" value="82" {{ $data->nationality == '82' ? 'selected' : '' }}>Korea South (+82)</option>
<option data-countrycode="KW" value="965" {{ $data->nationality == '965' ? 'selected' : '' }}>Kuwait (+965)</option>
<option data-countrycode="KG" value="996" {{ $data->nationality == '996' ? 'selected' : '' }}>Kyrgyzstan (+996)</option>
<option data-countrycode="LA" value="856" {{ $data->nationality == '856' ? 'selected' : '' }}>Laos (+856)</option>
<option data-countrycode="LV" value="371" {{ $data->nationality == '371' ? 'selected' : '' }}>Latvia (+371)</option>
<option data-countrycode="LB" value="961" {{ $data->nationality == '961' ? 'selected' : '' }}>Lebanon (+961)</option>
<option data-countrycode="LS" value="266" {{ $data->nationality == '266' ? 'selected' : '' }}>Lesotho (+266)</option>
<option data-countrycode="LR" value="231" {{ $data->nationality == '231' ? 'selected' : '' }}>Liberia (+231)</option>
<option data-countrycode="LY" value="218" {{ $data->nationality == '218' ? 'selected' : '' }}>Libya (+218)</option>
<option data-countrycode="LI" value="417" {{ $data->nationality == '417' ? 'selected' : '' }}>Liechtenstein (+417)
</option>
<option data-countrycode="LT" value="370" {{ $data->nationality == '370' ? 'selected' : '' }}>Lithuania (+370)</option>
<option data-countrycode="LU" value="352" {{ $data->nationality == '352' ? 'selected' : '' }}>Luxembourg (+352)</option>
<option data-countrycode="MO" value="853" {{ $data->nationality == '853' ? 'selected' : '' }}>Macao (+853)</option>
<option data-countrycode="MK" value="389" {{ $data->nationality == '389' ? 'selected' : '' }}>Macedonia (+389)</option>
<option data-countrycode="MG" value="261" {{ $data->nationality == '261' ? 'selected' : '' }}>Madagascar (+261)</option>
<option data-countrycode="MW" value="265" {{ $data->nationality == '265' ? 'selected' : '' }}>Malawi (+265)</option>
<option data-countrycode="MY" value="60" {{ $data->nationality == '60' ? 'selected' : '' }}>Malaysia (+60)</option>
<option data-countrycode="MV" value="960" {{ $data->nationality == '960' ? 'selected' : '' }}>Maldives (+960)</option>
<option data-countrycode="ML" value="223" {{ $data->nationality == '223' ? 'selected' : '' }}>Mali (+223)</option>
<option data-countrycode="MT" value="356" {{ $data->nationality == '356' ? 'selected' : '' }}>Malta (+356)</option>
<option data-countrycode="MH" value="692" {{ $data->nationality == '692' ? 'selected' : '' }}>Marshall Islands (+692)
</option>
<option data-countrycode="MQ" value="596" {{ $data->nationality == '596' ? 'selected' : '' }}>Martinique (+596)</option>
<option data-countrycode="MR" value="222" {{ $data->nationality == '222' ? 'selected' : '' }}>Mauritania (+222)</option>
<option data-countrycode="YT" value="269" {{ $data->nationality == '269' ? 'selected' : '' }}>Mayotte (+269)</option>
<option data-countrycode="MX" value="52" {{ $data->nationality == '52' ? 'selected' : '' }}>Mexico (+52)</option>
<option data-countrycode="FM" value="691" {{ $data->nationality == '691' ? 'selected' : '' }}>Micronesia (+691)</option>
<option data-countrycode="MD" value="373" {{ $data->nationality == '373' ? 'selected' : '' }}>Moldova (+373)</option>
<option data-countrycode="MC" value="377" {{ $data->nationality == '377' ? 'selected' : '' }}>Monaco (+377)</option>
<option data-countrycode="MN" value="976" {{ $data->nationality == '976' ? 'selected' : '' }}>Mongolia (+976)</option>
<option data-countrycode="MS" value="1664" {{ $data->nationality == '1664' ? 'selected' : '' }}>Montserrat (+1664)
</option>
<option data-countrycode="MA" value="212" {{ $data->nationality == '212' ? 'selected' : '' }}>Morocco (+212)</option>
<option data-countrycode="MZ" value="258" {{ $data->nationality == '258' ? 'selected' : '' }}>Mozambique (+258)</option>
<option data-countrycode="MN" value="95" {{ $data->nationality == '95' ? 'selected' : '' }}>Myanmar (+95)</option>
<option data-countrycode="NA" value="264" {{ $data->nationality == '264' ? 'selected' : '' }}>Namibia (+264)</option>
<option data-countrycode="NR" value="674" {{ $data->nationality == '674' ? 'selected' : '' }}>Nauru (+674)</option>
<option data-countrycode="NP" value="977" {{ $data->nationality == '977' ? 'selected' : '' }}>Nepal (+977)</option>
<option data-countrycode="NL" value="31" {{ $data->nationality == '31' ? 'selected' : '' }}>Netherlands (+31)</option>
<option data-countrycode="NC" value="687" {{ $data->nationality == '687' ? 'selected' : '' }}>New Caledonia (+687)
</option>
<option data-countrycode="NZ" value="64" {{ $data->nationality == '64' ? 'selected' : '' }}>>New Zealand (+64)</option>
<option data-countrycode="NI" value="505" {{ $data->nationality == '505' ? 'selected' : '' }}>Nicaragua (+505)</option>
<option data-countrycode="NE" value="227" {{ $data->nationality == '227' ? 'selected' : '' }}>Niger (+227)</option>
<option data-countrycode="NG" value="234" {{ $data->nationality == '234' ? 'selected' : '' }}>Nigeria (+234)</option>
<option data-countrycode="NU" value="683" {{ $data->nationality == '683' ? 'selected' : '' }}>Niue (+683)</option>
<option data-countrycode="NF" value="672" {{ $data->nationality == '672' ? 'selected' : '' }}>Norfolk Islands (+672)
</option>
<option data-countrycode="NP" value="670" {{ $data->nationality == '670' ? 'selected' : '' }}>Northern Marianas (+670)
</option>
<option data-countrycode="NO" value="47" {{ $data->nationality == '47' ? 'selected' : '' }}>Norway (+47)</option>
<option data-countrycode="OM" value="968" {{ $data->nationality == '968' ? 'selected' : '' }}>Oman (+968)</option>
<option data-countrycode="PW" value="680" {{ $data->nationality == '680' ? 'selected' : '' }}>Palau (+680)</option>
<option data-countrycode="PA" value="507" {{ $data->nationality == '507' ? 'selected' : '' }}>Panama (+507)</option>
<option data-countrycode="PA" value="92" {{ $data->nationality == '92' ? 'selected' : '' }}>Pakistan (+92)</option>
<option data-countrycode="PG" value="675" {{ $data->nationality == '675' ? 'selected' : '' }}>Papua New Guinea (+675)
</option>
<option data-countrycode="PY" value="595" {{ $data->nationality == '595' ? 'selected' : '' }}>Paraguay (+595)</option>
<option data-countrycode="PE" value="51" {{ $data->nationality == '51' ? 'selected' : '' }}>Peru (+51)</option>
<option data-countrycode="PH" value="63" {{ $data->nationality == '63' ? 'selected' : '' }}>Philippines (+63)</option>
<option data-countrycode="PL" value="48" {{ $data->nationality == '48' ? 'selected' : '' }}>Poland (+48)</option>
<option data-countrycode="PT" value="351" {{ $data->nationality == '351' ? 'selected' : '' }}>Portugal (+351)</option>
<option data-countrycode="PR" value="1787" {{ $data->nationality == '1787' ? 'selected' : '' }}>Puerto Rico (+1787)
</option>
<option data-countrycode="QA" value="974" {{ $data->nationality == '974' ? 'selected' : '' }}>Qatar (+974)</option>
<option data-countrycode="RE" value="262" {{ $data->nationality == '262' ? 'selected' : '' }}>Reunion (+262)</option>
<option data-countrycode="RO" value="40" {{ $data->nationality == '40' ? 'selected' : '' }}>Romania (+40)</option>
<option data-countrycode="RU" value="7" {{ $data->nationality == '7' ? 'selected' : '' }}>Russia (+7)</option>
<option data-countrycode="RW" value="250" {{ $data->nationality == '250' ? 'selected' : '' }}>Rwanda (+250)</option>
<option data-countrycode="SM" value="378" {{ $data->nationality == '378' ? 'selected' : '' }}>San Marino (+378)</option>
<option data-countrycode="ST" value="239" {{ $data->nationality == '239' ? 'selected' : '' }}>Sao Tome &amp; Principe
    (+239)</option>
<option data-countrycode="SA" value="966" {{ $data->nationality == '966' ? 'selected' : '' }}>Saudi Arabia (+966)
</option>
<option data-countrycode="SN" value="221" {{ $data->nationality == '221' ? 'selected' : '' }}>Senegal (+221)</option>
<option data-countrycode="CS" value="381" {{ $data->nationality == '381' ? 'selected' : '' }}>Serbia (+381)</option>
<option data-countrycode="SC" value="248" {{ $data->nationality == '248' ? 'selected' : '' }}>Seychelles (+248)</option>
<option data-countrycode="SL" value="232" {{ $data->nationality == '232' ? 'selected' : '' }}>Sierra Leone (+232)
</option>
<option data-countrycode="SG" value="65" {{ $data->nationality == '65' ? 'selected' : '' }}>Singapore (+65)</option>
<option data-countrycode="SK" value="421" {{ $data->nationality == '421' ? 'selected' : '' }}>Slovak Republic (+421)
</option>
<option data-countrycode="SI" value="386" {{ $data->nationality == '386' ? 'selected' : '' }}>Slovenia (+386)</option>
<option data-countrycode="SB" value="677" {{ $data->nationality == '677' ? 'selected' : '' }}>Solomon Islands (+677)
</option>
<option data-countrycode="SO" value="252" {{ $data->nationality == '252' ? 'selected' : '' }}>Somalia (+252)</option>
<option data-countrycode="ZA" value="27" {{ $data->nationality == '27' ? 'selected' : '' }}>South Africa (+27)</option>
<option data-countrycode="ES" value="34" {{ $data->nationality == '34' ? 'selected' : '' }}>Spain (+34)</option>
<option data-countrycode="LK" value="94" {{ $data->nationality == '94' ? 'selected' : '' }}>Sri Lanka (+94)</option>
<option data-countrycode="SH" value="290" {{ $data->nationality == '290' ? 'selected' : '' }}>St. Helena (+290)</option>
<option data-countrycode="KN" value="1869" {{ $data->nationality == '1869' ? 'selected' : '' }}>St. Kitts (+1869)
</option>
<option data-countrycode="SC" value="1758" {{ $data->nationality == '1758' ? 'selected' : '' }}>St. Lucia (+1758)
</option>
<option data-countrycode="SD" value="249" {{ $data->nationality == '249' ? 'selected' : '' }}>Sudan (+249)</option>
<option data-countrycode="SR" value="597" {{ $data->nationality == '597' ? 'selected' : '' }}>Suriname (+597)</option>
<option data-countrycode="SZ" value="268" {{ $data->nationality == '268' ? 'selected' : '' }}>Swaziland (+268)</option>
<option data-countrycode="SE" value="46" {{ $data->nationality == '46' ? 'selected' : '' }}>Sweden (+46)</option>
<option data-countrycode="CH" value="41" {{ $data->nationality == '41' ? 'selected' : '' }}>Switzerland (+41)</option>
<option data-countrycode="SI" value="963" {{ $data->nationality == '963' ? 'selected' : '' }}>Syria (+963)</option>
<option data-countrycode="TW" value="886" {{ $data->nationality == '886' ? 'selected' : '' }}>Taiwan (+886)</option>
<option data-countrycode="TJ" value="7" {{ $data->nationality == '7' ? 'selected' : '' }}>Tajikstan (+7)</option>
<option data-countrycode="TH" value="66" {{ $data->nationality == '66' ? 'selected' : '' }}>Thailand (+66)</option>
<option data-countrycode="TG" value="228" {{ $data->nationality == '228' ? 'selected' : '' }}>Togo (+228)</option>
<option data-countrycode="TO" value="676" {{ $data->nationality == '676' ? 'selected' : '' }}>Tonga (+676)</option>
<option data-countrycode="TT" value="1868" {{ $data->nationality == '1868' ? 'selected' : '' }}>Trinidad &amp; Tobago
    (+1868)
</option>
<option data-countrycode="TN" value="216" {{ $data->nationality == '216' ? 'selected' : '' }}>Tunisia (+216)</option>
<option data-countrycode="TR" value="90" {{ $data->nationality == '90' ? 'selected' : '' }}>Turkey (+90)</option>
<option data-countrycode="TM" value="7" {{ $data->nationality == '7' ? 'selected' : '' }}>Turkmenistan (+7)</option>
<option data-countrycode="TM" value="993" {{ $data->nationality == '993' ? 'selected' : '' }}>Turkmenistan (+993)
</option>
<option data-countrycode="TC" value="1649" {{ $data->nationality == '1649' ? 'selected' : '' }}>Turks &amp; Caicos
    Islands
    (+1649)</option>
<option data-countrycode="TV" value="688" {{ $data->nationality == '688' ? 'selected' : '' }}>Tuvalu (+688)</option>
<option data-countrycode="UG" value="256" {{ $data->nationality == '256' ? 'selected' : '' }}>Uganda (+256)</option>
<option data-countrycode="GB" value="44" {{ $data->nationality == '44' ? 'selected' : '' }}>UK (+44)</option>
<option data-countrycode="UA" value="380" {{ $data->nationality == '380' ? 'selected' : '' }}>Ukraine (+380)</option>
<option data-countrycode="AE" value="971" {{ $data->nationality == '971' ? 'selected' : '' }}>United Arab Emirates
    (+971)
</option>
<option data-countrycode="UY" value="598" {{ $data->nationality == '598' ? 'selected' : '' }}>Uruguay (+598)</option>
<option data-countrycode="US" value="1" {{ $data->nationality == '1' ? 'selected' : '' }}>USA (+1)</option>
<option data-countrycode="UZ" value="7" {{ $data->nationality == '7' ? 'selected' : '' }}>Uzbekistan (+7)</option>
<option data-countrycode="VU" value="678" {{ $data->nationality == '678' ? 'selected' : '' }}>Vanuatu (+678)</option>
<option data-countrycode="VA" value="379" {{ $data->nationality == '379' ? 'selected' : '' }}>Vatican City (+379)
</option>
<option data-countrycode="VE" value="58" {{ $data->nationality == '58' ? 'selected' : '' }}>Venezuela (+58)</option>
<option data-countrycode="VN" value="84" {{ $data->nationality == '84' ? 'selected' : '' }}>Vietnam (+84)</option>
<option data-countrycode="VG" value="84" {{ $data->nationality == '84' ? 'selected' : '' }}>Virgin Islands - British
    (+1284)</option>
<option data-countrycode="VI" value="84" {{ $data->nationality == '84' ? 'selected' : '' }}>Virgin Islands - US (+1340)
</option>
<option data-countrycode="WF" value="681" {{ $data->nationality == '681' ? 'selected' : '' }}>Wallis &amp; Futuna (+681)
</option>
<option data-countrycode="YE" value="969" {{ $data->nationality == '969' ? 'selected' : '' }}>Yemen (North)(+969)
</option>
<option data-countrycode="YE" value="967" {{ $data->nationality == '967' ? 'selected' : '' }}>Yemen (South)(+967)
</option>
<option data-countrycode="ZM" value="260" {{ $data->nationality == '260' ? 'selected' : '' }}>Zambia (+260)</option>
<option data-countrycode="ZW" value="263" {{ $data->nationality == '263' ? 'selected' : '' }}>Zimbabwe (+263)</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Name <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $data->name ? $data->name : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Email Id<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $data->email ? $data->email : '' }}">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Mobile <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="{{ $data->mobile ? $data->mobile : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9"> <input type="date" class="form-control" name="dob"
                                                value="{{ $data->dob ? $data->dob : '' }}"> </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Father /Mother/Guardian /Spouse Name<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="father_name"
                                                value="{{ $data->father_name ? $data->father_name : '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="ui-radio ui-radio-inline col-md-9 ">
                                            <label class="ui-radio-inline">
                                                <input type="radio" id="radioemp" value="Male" name="gender"
                                                    {{ $data->gender == 'Male' ? 'checked' : '' }}>
                                                <span>Male</span>
                                            </label>
                                            <label class="ui-radio-inline">
                                                <input type="radio" id="radiostu" value="Female" name="gender"
                                                    {{ $data->gender == 'Female' ? 'checked' : '' }}>
                                                <span>Female</span>
                                            </label>
                                            <label class="ui-radio-inline">
                                                <input type="radio" id="radioalu" value="Transgender" name="gender"
                                                    {{ $data->gender == 'Transgender' ? 'checked' : '' }}>
                                                <span>Transgender</span>
                                            </label>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 col-md-6 fullwidth">
                            <div class="panel panel-default panel-hovered panel-stacked mb30">
                                <div class="panel-heading">
                                    Address for Correspondence:<br>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Address<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $data->address ? $data->address : old('address') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">City<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $data->city ? $data->city : old('city') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Pin Code<span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pin_code"
                                                value="{{ $data->pin_code ? $data->pin_code : old('pin_code') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">State <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="state"
                                                value="{{ $data->state ? $data->state : old('state') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-md-3 control-label">Country <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="country"
                                                value="{{ $data->country ? $data->country : old('country') }}">
                                        </div>
                                    </div>


                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>.


                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!------------------------------------Start Permanent Address --------------------------------------------------->
            <div class="row" id="permanent">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-hovered panel-stacked mb30">
                        <div class="panel-heading">Permanent Address (if different from correspondence address):</div>
                        <div class="panel-body">

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Address </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="p_address"
                                        value="{{ $data->p_address ? $data->p_address : old('p_address') }}">
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">City </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="p_city"
                                        value="{{ $data->p_city ? $data->p_city : old('p_city') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Pin Code </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="p_pin_code"
                                        value="{{ $data->p_pin_code ? $data->p_pin_code : old('p_pin_code') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">State </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="p_state"
                                        value="{{ $data->p_state ? $data->p_state : old('p_state') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Country </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="p_country"
                                        value="{{ $data->p_country ? $data->p_country : old('p_country') }}">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------Start Passport Section--------------------------------------------------->

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-hovered panel-stacked mb30">
                        <div class="panel-heading">Details of Passport: (If you have one):</div>
                        <div class="panel-body">


                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Passport No <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="passport_no"
                                        value="{{ $data->passport_no ? $data->passport_no : old('passport_no') }}">
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Date of Issue <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="doi"
                                        value="{{ $data->doi ? $data->doi : old('doi') }}">
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Date of Expiry <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="doe"
                                        value="{{ $data->doe ? $data->doe : old('doe') }}">
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Place of Issue <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="poi"
                                        value="{{ $data->poi ? $data->poi : old('poi') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label">Issuing Authority <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="issuing_authority"
                                        value="{{ $data->issuing_authority ? $data->issuing_authority : old('issuing_authority') }}">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>



            <!------------------------------------End Passport Section--------------------------------------------------->



            <div id="errormessages"></div>
            <button type="submit" class="btn btn-primary waves-effect waves-effect" id="SavePersonal">Save &amp;
                Next</button>
        </div>
        </form>

        <!-- Start date end 28022017-->
    </div>
    <!-- #end dashboard page -->
    </div>
    </div>
    <!-- #end main-container -->


@endsection
