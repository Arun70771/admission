function showFlaglist() {
    $("#txtCountryCodeli").show();
}

function fnMobileCodeReplace(mcode) {

    $("#txtCountryCode").val(' + ' + mcode);
    $(".md-input .CCode#txtCountryCode").slideToggle();
}


$(document).ready(function () {
    $ = jQuery.noConflict();
    $("body").click(function (e) {
        // alert(e.target.className);
        if (e.target.className == "md-input CCode") {
            // alert("do't hide");
        }
        else {
            //$(".login-panel").hide();

            $(".C_list").hide();
        }
    });

    

    $("input[type='number']").keydown(function () { $(this).data("old", $(this).val()); });
    $("input[type='number']").keyup(function () { var maxlenth = $(this).attr("maxlength"); if ($(this).val().length <= maxlenth && $(this).val().length >= 0 && $.isNumeric($(this).val()) == true); else $(this).val($(this).data("old")); });


    $(".numericOnly").keypress(function (event) { if ((event.which != 46 || $(this).val().indexOf('.') == -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) { event.preventDefault(); } });

    $(".numericwithdecimal").keypress(function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) { event.preventDefault(); }
        var text = $(this).val();
        if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2)) { event.preventDefault(); }
    });

    $(".numericwithplus").keypress(function (e) { if (String.fromCharCode(e.keyCode).match(/[^0-9,+]/g)) return false; });
    $('input').focusout(function () { this.value = this.value.toLocaleUpperCase(); });
    $('textarea').focusout(function () { this.value = this.value.toLocaleUpperCase(); });


});

function OnError(xhr, errorType, exception) {

    $("#loderimg").css("display", "none");
    //
    var responseText;
    $("#dialog").html("");
    var msg = "";
    try {
        responseText = JSON.parse(xhr.responseText);
        $("#dialog").append("<div><b>" + errorType + " " + exception + "</b></div>");
        $("#dialog").append("<div><u>Exception</u>:<br /><br />" + responseText.ExceptionType + "</div>");
        $("#dialog").append("<div><u>StackTrace</u>:<br /><br />" + responseText.StackTrace + "</div>");
        $("#dialog").append("<div><u>Message</u>:<br /><br />" + responseText.Message + "</div>");
        // msg = errorType + " " + exception + "\n" + "Exception:  " + responseText.ExceptionType + "\n"


    } catch (e) {
        responseText = xhr.responseText;
        $("#dialog").html(responseText);
        // msg = responseText;
    }
    exception = exception == null ? "" : exception;

    if (exception != "")
        writeToFile($("#dialog").html() + " Error Type :" + errorType + " Exception :" + exception);

    $("#dialog").show();

}
function GetParameterValues(param) {
    // //// debugger;
    var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < url.length; i++) {
        var urlparam = url[i].split('=');
        if (urlparam[0].toLowerCase() == param.toLowerCase()) {
            return urlparam[1];
        }
    }
};

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function htmlEncode(value) {
    return $('<div/>').text(value).html();
};

function htmlDecode(value) {
    return $('<div/>').html(value).text();
};

function writeToFile(msg) {
    //alert(msg);
    var URL = window.location.href;
    $.ajax({
        type: "POST",
        url: '../OnlineForms/SaveERrror',
        data: { "message": encodeURIComponent(msg), "URL": URL },
        dataType: 'json',
        async: true,
        success: function (response) {
            // alert("error saved");
        },
        error: function (e) {
            //    swal('ERROR: ' + e.val);
        }
    });
}


function SendOTPOnVeriyMobile(LNO) {
    if (LNO == "") {
        swal("Invalid Call of OTP function"); return false;
    }
    else {

        $.ajax({
            type: "POST",
            url: 'GetMobileOTP',
            data: { "LNO": LNO },
            dataType: 'json',
            async: true,
            success: function (status) {
                var Data = JSON.parse(status);
                var table = Data.Table[0];

                if (table != null) {
                    if (table.Status != null && table.Status != "" && table.Status == "1") {
                        window.location.href = "VerifyMob?LNO=" + LNO;
                    }
                    else {
                        swal("", table.MSG, "error");
                    }
                }
                else {
                    swal("ERROR!", "In server please try after some time", "error");
                }
            },
            error: OnError
        });
    }
};

function SendLinkToVeriyEmail(LNO, SEmail) {
    if (LNO == "") {
        swal("Invalid Call of Email Link function"); return false;
    }
    else {

        $.ajax({
            type: "POST",
            url: 'GetVerifyEmailLink',
            data: { "LNO": LNO, "SEmail": SEmail },
            dataType: 'json',
            async: true,
            success: function (status) {
                var Data = JSON.parse(status);
                var table = Data.Table[0];

                if (table != null) {
                    if (table.Status != null && table.Status != "" && (table.Status == "1" || table.Status == "2")) {

                        swal({ title: "", text: table.MSG, type: "success", showCancelButton: false, confirmButtonClass: "btn-danger", confirmButtonText: "Ok !", closeOnConfirm: false },
                            function () { window.location.reload(); });
                    }
                    else {
                        swal({ title: "", text: table.MSG, type: "error", showCancelButton: false, confirmButtonClass: "btn-danger", confirmButtonText: "Ok !", closeOnConfirm: false },
                            function () {
                                window.location.reload();
                            });
                    }

                }
                else {
                    swal("ERROR!", "In server, please try after some time", "error");
                }
            },
            error: OnError
        });
    }
};

function vwFormTypeChange(val,formno)
{
    $('#FormTypeChange').show();
    $('#hidformno').val(formno);
    $("#ddlFormTypeChange option[value='" + val + "']").remove();
    
}


    $(document).ready(function () {
        $ = jQuery.noConflict();
        $(document).ajaxStart(function () { $("#loderimg").css("display", "block"); });
        $(document).ajaxComplete(function () { $("#loderimg").css("display", "none"); });

        $("#txtCountryCode").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: 'SearchCountryCodeWithFlag', type: "POST", async: false, dataType: "json",
                    data: { term: request.term, Intl: $('#hIntl').val() },
                    success: function (data) {
                        var parsed = JSON.parse(data);
                        var newArray = new Array(parsed.length);
                        var i = 0;
                        parsed.forEach(function (entry) {
                            var newObject = {
                                label: entry.sCountryName, value: entry.imobileCode, FlagURL: entry.sFlagURL
                            };
                            newArray[i] = newObject; i++;
                        });
                        response(newArray);
                    }
                })
            },
            minLength: 2,
            focus: function (event, ui) {
                event.preventDefault();
                $(this).val(ui.item.value);
            },
            select: function (event, ui) {
                event.preventDefault();
                $(this).val(ui.item.value);
            },
            change: function (event, ui) {
                if (ui.item == null || ui.item == undefined) {
                    $("#txtCountryCode").val('');
                }
                else {
                    if (ui.item.value == "+91") {
                        $('#MobileNo').attr("maxlength", "10");
                    }
                    else {
                        $('#MobileNo').attr("maxlength", "15");
                    }
                }

            }
        });

        $('#hIntl').val(GetParameterValues('INTNL'));

        //if ($('#hIntl').val() == 0)
        //{
        //    $('#txtCountryCode').attr("disabled", true)

        //}
        //else {
        //    $('#txtCountryCode').attr("disabled", false)
        //}


        var MSG = unescape(GetParameterValues('MSG'));    
        if (MSG != "" && MSG.toLowerCase() != "undefined") {
            swal({ title: "", text: MSG, type: "success", showCancelButton: false, confirmButtonClass: "btn-danger", confirmButtonText: "Ok !", closeOnConfirm: false },
                function () { window.location.href = "SignIn"; });
        }

        $("#txtCountryCode").each(function () {
            var $proj = $(this);
            $proj.data("ui-autocomplete")._renderItem = function (ul, item) {
                var $li = $('<li>'), $img = $('<img>');
                $img.attr({ src: "../cflags/" + item.FlagURL + ".png", alt: item.label });
                $li.attr('data-value', item.label);
                $li.append('<a>');
                $li.find('a').append($img).append(item.label);
                return $li.appendTo(ul);
            };
        });


        $("#SignUpform").validate({
            rules: {
                Name: {
                    required: true
                },
                CandidateEmail: {
                    required: true
                }
            },
            errorPlacement: function (error, element) {
        
                error.insertBefore(element);
            },
            showErrors: function (errorMap, errorList) {            
                var msg = "Your form contains " + this.numberOfInvalids() + " errors, see details below.<br/>"
                $.each(errorMap, function (key, value) {
                    msg += key + ": " + value + "<br/>";
                });
                $("#errormessages").html(msg);

                if (this.numberOfInvalids() > 0) {                
                    $("#errormessages").attr("class", "alert alert-danger");
                    $("#errormessages").show();
                } else {
                    $("#errormessages").hide();
                }
            }
        });




        $("#SignInform").validate({
            rules: {
                Name: {
                    required: true
                },
                CandidateEmail: {
                    required: true
                }
            },
            errorPlacement: function (error, element) {

                error.insertBefore(element);
            },
            showErrors: function (errorMap, errorList) {
                var msg = "Your form contains " + this.numberOfInvalids() + " errors, see details below.<br/>"
                $.each(errorMap, function (key, value) {
                    msg += key + ": " + value + "<br/>";
                });
                $("#errormessages").html(msg);

                if (this.numberOfInvalids() > 0) {
                    $("#errormessages").attr("class", "alert alert-danger");
                    $("#errormessages").show();
                } else {
                    $("#errormessages").hide();
                }
            }
        });

        $('#BtnSignUp').click(function () {
                
            if ($("#SignUpform").valid()) {
               // debugger;
                var chkAgree = $('#chkAgree').is(":checked");
                var HCapchaAns = $('#HCapchaAns').val();

                var txtCandidateName = $('#CandidateName').val();

                var txtCountryCode = $('#txtCountryCode').val();            
                var txtMobile = $('#MobileNo').val();
                var txtCandidateEmail = $('#CandidateEmail').val();
                var txtCapchaAns = $('#MathCaptchaAnswer').val();

                var sReferral = GetParameterValues('WCID');
                var CampusID = GetParameterValues('CampusID');
                //var Lateral = GetParameterValues('ltrl');
                var utm_source = GetParameterValues('utm_source');
                var utm_medium = GetParameterValues('utm_medium');
                var utm_campaign = GetParameterValues('utm_campaign');


                var JEE = GetParameterValues('JEE');
                var AIEEE = GetParameterValues('AIEEE');
                var CD = GetParameterValues('CD');            
                var INTNL = $("#hIntl").val();
                var DTLS = GetParameterValues('DTLS');            

                if (txtCandidateName == "") { swal("Oops!", "Please fill candidate name", "error"); return false; }
                else if (txtCountryCode == "") { swal("Oops!", "Please select Country Code", "error"); return false; }
                else if (txtMobile == "") { swal("Oops!", "Please Fill Mobile No ", "error"); return false; }
                else if (txtMobile.length < 10) { swal("Oops!", "Please check your Mobile No.", "error"); return false; }
                else if (txtCandidateEmail == "") { swal("Oops!", "Please Fill Candidate Email", "error"); return false; }
                else if (!validateEmail(txtCandidateEmail)) { swal("Oops!", "Invalid email address!", "error"); return false; }
                else if (txtCapchaAns == "") { swal("Oops!", "Please Fill Capcha Code", "error"); return false; }

                else if (!chkAgree) {
                
                    swal("Oops!", "I authorize Amity to contact me with notifications/updates via call/email/SMS/whatsapp which overrights DND/NDNC registration.?", "error");

                    return false;
                }
                else if (HCapchaAns != txtCapchaAns) {

                    swal("Oops!", 'Incorrect captcha code entered!', "error");
                    return false;
                }
                else {

                    $.ajax({
                        type: "POST",
                        url: 'SignUpPost',
                        data: {
                            "txtCandidateName": txtCandidateName, "txtCountryCode": txtCountryCode, "txtMobile": txtMobile, "txtCandidateEmail": txtCandidateEmail,
                            "sReferral": sReferral, "CampusID": CampusID, "utm_source": utm_source, "utm_medium": utm_medium, "utm_campaign": utm_campaign, "CourseCode": CD, "JEE": JEE,
                            "AIEEE": AIEEE, "INTNL": INTNL, "DTLS": DTLS

                        },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var Data = JSON.parse(status);
                            var table = Data.Table[0];

                            if (table != null) {
                                if (table.Status != null && table.Status != "" && table.Status == "1") {

                                    if (txtCountryCode == "+91")
                                        window.location.href = "VerifyMob?LNO=" + table.sLoginNo;
                                    else
                                        window.location.href = "CandidateProfile?LNO=" + table.sLoginNo;
                                    // SendOTPOnVeriyMobile(table.sLoginNo);
                                }
                                else {

                                    swal({ title: "", text: table.MSG, type: "success", showCancelButton: false, confirmButtonClass: "btn-danger", confirmButtonText: "Ok !", closeOnConfirm: false },
                                        function () { window.location.href = "SignIn"; });
                                }
                            }
                            else {
                                swal('ERROR: In server, please try after some time ');
                            }
                        },
                        error: OnError
                    });
                }
            }
            else {
                debugger;
         
                //$(".SignUpClass").css("border-color", "red");
                ValidationCheck_SignUp();
            }
        
        
        });

        $('#BtnSignIn').click(function () {

            if ($("#SignInform").valid()) {
                var txtMobile = $('#MobileNo').val();
                var txtPassword = $('#txtPassword').val();
                if (txtMobile == "") { swal("Oops", "Please Fill Mobile No ", "error"); return false; }
                else if (txtMobile.length < 10) { swal("Oops", "Invalid Mobile No.", "error"); return false; }
                else if (txtPassword == "") { swal("Oops", "Please Fill Password ", "error"); return false; }
                else {

                    $.ajax({
                        type: "POST",
                        url: 'SignInPost',
                        data: { "txtMobile": txtMobile, "txtPassword": txtPassword },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var Data = JSON.parse(status);
                            var table = Data.Table[0];

                            if (table != null) {
                                if (table.Status != null && table.Status != "" && table.Status == "1") {
                                    window.location.href = "CandidateProfile?LNO=" + table.sLoginNo;
                                }
                                else {
                                    swal("Oops", table.MSG, "error");
                                    // window.location.href = "Profile?LNO=" + table.sLoginNo;
                                }
                            }
                            else {
                                swal('ERROR: In server, please try after some time ');
                            }
                        },
                        error: OnError
                    });
                }
            }
            else {
                ValidationCheck_SignIn();
            }
        });

        $('#btnIndian').click(function () {
            //$('#txtCountryCode').attr("disabled", true)
            $('#hIntl').val("0");
            $('.LoginViaMobileOTP').show();
            $('#txtCountryCode').val("+91");
            $('#MobileNo').attr("maxlength", "10");
        });
        $('#btnInternational').click(function () {
            $("#txtCountryCode option:contains(Indian)").attr('selected', 'selected');
           // $('#txtCountryCode').attr("disabled", false)
            $('#hIntl').val("1")
            $('.LoginViaMobileOTP').hide();
            $('#txtCountryCode').val("");
            $('#MobileNo').attr("maxlength","15");
            
        });
        $('#BtnVerifyMob').click(function () {

            if ($("#VerifyMobform").valid()) {
                var MobileOTP_LNO = $('#MobileOTP_LNO').val();
                var MobileOTP = $('#MobileOTP').val(); 
                if (MobileOTP == "") { swal("Oops!", "Please Fill Mobile OTP ","error"); return false; }
                else if (MobileOTP.length < 4) { swal("Oops!", "Invalid Mobile OTP.","error"); return false; }
                else if (MobileOTP_LNO == "") { swal("Oops!", "Please Fill Mobile OTP ","error"); return false; }
                else {

                    $.ajax({
                        type: "POST",
                        url: 'VerifyMobPost',
                        data: { "LNO": MobileOTP_LNO, "OTP": MobileOTP },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var Data = JSON.parse(status);
                            var table = Data.Table[0];

                            if (table != null) {
                                if (table.Status != null && table.Status != "" && table.Status == "1") {
                                    swal({ title: "", text: "Thank You for registering with Amity University", type: "success", showCancelButton: false, confirmButtonClass: "btn-danger", confirmButtonText: "Ok !", closeOnConfirm: false },
                                        function () { window.location.href = "CandidateProfile?LNO=" + table.sLoginNo; });
                                }
                                else {
                                    swal("", table.MSG, "error");
                                }
                            }
                            else {
                                swal('ERROR: In server, please try after some time ');
                            }
                        },
                        error: OnError
                    });
                }
            }
        });

        $('#BtnResendOTP').click(function () {
            var MobileOTP_LNO = $('#MobileOTP_LNO').val();
            SendOTPOnVeriyMobile(MobileOTP_LNO);
        });

        $('#BtnGetPassword').click(function () {

            if ($("#FPform").valid()) {
                var FPMobileNo = $('#FPMobileNo').val();
                if (FPMobileNo == "") { swal("Oops!", "Please Fill Mobile No", "error"); return false; }
                else if (FPMobileNo.length < 10) { swal("Oops!", "Invalid Mobile No.", "error"); return false; }
                else {

                    $.ajax({
                        type: "POST",
                        url: 'GetPasswordPost',
                        data: { "FPMobileNo": FPMobileNo },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var Data = JSON.parse(status);
                            var table = Data.Table[0];

                            if (table != null) {
                                if (table.Status != null && table.Status != "" && table.Status == "1") {
                                    swal({
                                        title: "Done",
                                        text: table.MSG,
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Ok !",
                                        closeOnConfirm: false
                                    },
                                        function () {
                                            window.location.href = "SignIn";
                                        });
                                }
                                else {
                                    swal("", table.MSG, "error");
                                }
                            }
                            else {
                                swal('ERROR: In server, please try after some time ');
                            }
                        },
                        error: OnError
                    });
                }
            }

            else {
                ValidationCheck_FPass();
            }
        });


        //LeadsSquare Functions Starts
     
        function leadsquaredCreateLeadWithActivity(AccessKey, SecretKey, FirstName, LastName, EmailAddress, Mobile, mx_Programme,
            mx_Campus, mx_Form_Number, Step, mx_City, SourceName, SubSourceName, ActivityEvent,
            utm_source, mx_PageURL, mx_UID, mx_AIC_Coupon_Code, mx_Application_Password, mx_Session) {
            // // debugger;
            var currentdate = new Date();
            var datetime = currentdate.getFullYear() + "-" + ("0" + (currentdate.getMonth() + 1)).slice(-2) + "-" + ("0" + currentdate.getDate()).slice(-2) + " " + ("0" + currentdate.getHours()).slice(-2) + ":" + ("0" + currentdate.getMinutes()).slice(-2) + ":" + ("0" + currentdate.getSeconds()).slice(-2);

            //var MXCProspectId = $("#ProspectID").val()
            // var MXCProspectId = $("input[name='ProspectID']").val();
            var strProspectId = ""
            //if (MXCProspectId != "") {
            //    strProspectId = '{ "Attribute": "ProspectID", "Value": "' + MXCProspectId + '" },';
            //}

            var source = "Direct Traffic";
            //var referrer = document.referrer;

            //if (referrer.indexOf("google") > -1) {
            //    source = "Organic Search"
            //}
            //else if (referrer.indexOf("bing") > -1) {
            //    source = "Organic Search"
            //}
            ////else if (referrer.indexOf("amity") > -1) {
            ////    source = "Direct Traffic"
            ////}
            //else if (referrer.length > 0) {
            //    source = "Referral Sites"
            //}

            if (SourceName.toLowerCase() == "application form") {
                SourceName = SourceName;
                source = "Direct Traffic";
                // SourceName = "";
            }
            else {
                source = SourceName;
            }

            if (SubSourceName.toLowerCase() == "") {
                SubSourceName = SourceName;
            }


            //// debugger;


            var ApiData = '[{ "Attribute": "FirstName", "Value": "' + FirstName + '" },' + strProspectId + '{ "Attribute": "LastName", "Value": "' + LastName + '" },{ "Attribute": "EmailAddress", "Value": "' + EmailAddress + '" },{ "Attribute": "Phone", "Value": "' + Mobile + '" },{ "Attribute": "mx_Course2", "Value": "' + mx_Programme + '" },{ "Attribute": "mx_Campus", "Value": "' + mx_Campus + '" },{ "Attribute": "Source", "Value": "' + source + '" },{ "Attribute": "mx_Sub_Source", "Value": "' + SourceName + '" },{ "Attribute": "mx_Sub_Source_2", "Value": "' + SubSourceName + '" },{ "Attribute": "mx_Form_Number", "Value": "' + mx_Form_Number + '" },{ "Attribute": "mx_City", "Value": "' + mx_City + '" },{ "Attribute": "mx_UTM_Source", "Value": "' + utm_source + '" },{ "Attribute": "mx_PageURL", "Value": "' + mx_PageURL + '" },{ "Attribute": "mx_UID", "Value": "' + mx_UID + '" },{ "Attribute": "mx_AIC_Coupon_Code", "Value": "' + mx_AIC_Coupon_Code + '" },{ "Attribute": "mx_Application_Password", "Value": "' + mx_Application_Password + '" } ,{ "Attribute": "mx_Session", "Value": "' + mx_Session + '" } ]';
            //
            // var ApiData = '[{"Attribute": "FirstName", "Value": "' + FirstName + '" },' + strProspectId + ' { "Attribute": "LastName", "Value": "' + LastName + '" },{ "Attribute": "EmailAddress", "Value": "' + EmailAddress + '" }, { "Attribute": "Phone", "Value": "' + Mobile + '" },{ "Attribute": "mx_Course2", "Value": "' + mx_Programme + '" },{ "Attribute": "mx_Campus", "Value": "' + mx_Campus + '" },{ "Attribute": "Source", "Value": "' + source + '" },{ "Attribute": "mx_Sub_Source_2", "Value": "' + SourceName + '" },{ "Attribute": "mx_Form_Number", "Value": "' + mx_Form_Number + '" },{ "Attribute": "mx_City", "Value": "' + mx_City + '" }]';
            // var ApiData = '[{"Attribute": "FirstName", "Value": "' + FirstName + '" },' + strProspectId + ' { "Attribute": "LastName", "Value": "' + LastName + '" },{ "Attribute": "EmailAddress", "Value": "' + EmailAddress + '" }, { "Attribute": "Phone", "Value": "' + Mobile + '" },{ "Attribute": "mx_Course2", "Value": "' + mx_Programme + '" },{ "Attribute": "mx_Campus", "Value": "' + mx_Campus + '" },{ "Attribute": "Source", "Value": "' + source + '" },{ "Attribute": "mx_Sub_Source", "Value": "' + SourceName + '" },{ "Attribute": "mx_Form_Number", "Value": "' + mx_Form_Number + '" },{ "Attribute": "mx_City", "Value": "' + mx_City + '" }]';
            // var ApiData = '[{"Attribute": "FirstName", "Value": "' + FirstName + '" },{ "Attribute": "ProspectID", "Value": "' + MXCProspectId + '" },{ "Attribute": "LastName", "Value": "' + LastName + '" },{ "Attribute": "EmailAddress", "Value": "' + EmailAddress + '" }, { "Attribute": "Phone", "Value": "' + Mobile + '" },{ "Attribute": "mx_Course2", "Value": "' + mx_Programme + '" },{ "Attribute": "mx_Campus", "Value": "' + mx_Campus + '" },{ "Attribute": "mx_Sub_Source", "Value": "' + SourceName + '" },{ "Attribute": "mx_Form_Number", "Value": "' + mx_Form_Number + '" },{ "Attribute": "mx_City", "Value": "' + mx_City + '" }]';

            // alert(ApiData)
            var ApiUrl = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=" + AccessKey + "&secretKey=" + SecretKey;
            $.ajax({
                url: ApiUrl,
                type: "POST",
                data: ApiData,
                contentType: 'application/json',
                success: function (data) {
                    // alert("1:- " + data);

                    var Leadresult = JSON.stringify(data);
                    //  alert("obj :    " + Leadresult)
                    var LeadMsg = JSON.parse(Leadresult).Message;
                    //  alert(JSON.stringify(LeadMsg));
                    var ProspectID = JSON.parse(JSON.stringify(LeadMsg)).RelatedId;
                    //  alert("ProspectID :    " + ProspectID);
                    writeToFileLeadSquare("URL :- " + ApiUrl + " Data :- " + ApiData, JSON.stringify(data));
                    //leadsquaredActivity(AccessKey, SecretKey, ProspectID, Step, ActivityEvent)
                    updateLeadStage(AccessKey, SecretKey, ProspectID, Step);
                },
                error: function (xhr, errorType, exception) {
                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                }
            });
        }

        function leadsquaredActivity(AccessKey, SecretKey, ProspectId, ActivityName, ActivityEvent) {
            // alert('went to activity post');
            var currentdate = new Date();
            var datetime = currentdate.getFullYear() + "-" + ("0" + (currentdate.getMonth() + 1)).slice(-2) + "-" + ("0" + currentdate.getDate()).slice(-2) + " " + ("0" + currentdate.getHours()).slice(-2) + ":" + ("0" + currentdate.getMinutes()).slice(-2) + ":" + ("0" + currentdate.getSeconds()).slice(-2);
            var ApiData = '{"RelatedProspectId": "' + ProspectId + '","ActivityEvent": "' + ActivityEvent + '","ActivityNote": "' + ActivityName + '","ActivityDateTime": "' + datetime + '", "Fields": [{"SchemaName": "mx_Custom_1","Value": "' + ActivityName + '"}]}';
            var ApiUrl = "https://api-in21.leadsquared.com/v2/ProspectActivity.svc/Create?accessKey=" + AccessKey + "&secretKey=" + SecretKey;
            $.ajax({
                url: ApiUrl,
                type: "POST",
                //async: true,
                data: ApiData,
                contentType: 'application/json',
                success: function (data) {
                    // alert("2:- " + data);
                    writeToFileLeadSquare("URL :- " + ApiUrl + " Data :- " + ApiData, JSON.stringify(data));
                    // alert('Activity saved Successfully');
                },
                error: function (xhr, errorType, exception) {
                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                }
            });
        }

        function updateLeadStage(AccessKey, SecretKey, ProspectID, step) {

            var ApiData = '[{\"Attribute\": \"ProspectStage\",\"Value\": \"' + step + '\"}]';
            var ApiUrl = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Update?accessKey=" + AccessKey + "&secretKey=" + SecretKey + "&leadId=" + ProspectID + "&postUpdatedLead=true";
            $.ajax({
                url: ApiUrl,
                type: "POST",
                //async: true,
                data: ApiData,
                contentType: 'application/json',
                success: function (data) {
                    // alert("3:- " + data);
                    writeToFileLeadSquare("URL :- " + ApiUrl + " Data :- " + ApiData, JSON.stringify(data));
                    // alert('Activity saved Successfully');
                },
                error: function (xhr, errorType, exception) {
                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                }
            });
        }


        function leadsquaredActivityUpdate(AccessKey, SecretKey, ProspectID, mx_City, mx_Program_Type, ActivityEvent, mx_Programme) {
            var strmx_Program_Type = ''
            if (mx_Program_Type != "") {
                strmx_Program_Type = '{\"Attribute\": \"mx_Program_Type\",\"Value\": \"' + mx_Program_Type + '\"},';
            }

            var ApiData = '[{\"Attribute\": \"mx_City\",\"Value\": \"' + mx_City + '\"}, ' + strmx_Program_Type + '  {\"Attribute\": \"mx_Course2\", \"Value\": \"' + mx_Programme + '\"}]';
            var ApiUrl = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Update?accessKey=" + AccessKey + "&secretKey=" + SecretKey + "&leadId=" + ProspectID + "&postUpdatedLead=true";
            $.ajax({
                url: ApiUrl,
                type: "POST",
                //async: true,
                data: ApiData,
                contentType: 'application/json',
                success: function (data) {
                    // alert("3:- " + data);
                    writeToFileLeadSquare("URL :- " + ApiUrl + " Data :- " + ApiData, JSON.stringify(data));
                    // alert('Activity saved Successfully');
                },
                error: function (xhr, errorType, exception) {
                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                }
            });
        }

        function LeadSquareRequest(UID, Step) {
            $.ajax({
                type: "POST",
                url: '../OnlineForms/GetDataForLead',
                data: { "UID": UID },
                dataType: 'json',
                async: true,
                success: function (result) {
                    //debugger;
                    var obj = JSON.parse(result);
                    if (obj.length > 0) {
                        //alert(obj[0]["iCampusID"]);
                        if (obj[0]["iCampusID"] == "1" || obj[0]["iCampusID"] == "4" || obj[0]["iCampusID"] == "5" || obj[0]["iCampusID"] == "6" ||
                            obj[0]["iCampusID"] == "24" || obj[0]["iCampusID"] == "35" || obj[0]["iCampusID"] == "36" || obj[0]["iCampusID"] == "39" ||
                            obj[0]["iCampusID"] == "43" || obj[0]["iCampusID"] == "47") {
                            var AccessKey = obj[0]["AccessKey"];
                            var SecretKey = obj[0]["SecretKey"];
                            var FirstName = obj[0]["sFirstName"];
                            var LastName = '';
                            var EmailAddress = obj[0]["sEmail"];
                            var Mobile = obj[0]["sMobile"];
                            var mx_Programme = obj[0]["ProgramName"];
                            var mx_Campus = obj[0]["sCampusName"];
                            var mx_Form_Number = obj[0]["iformno"];
                            var mx_City = obj[0]["sCity"];
                            var mx_Program_Type = obj[0]["ProgramType"];
                            var ActivityEvent = obj[0]["ActivityEvent"];
                            var SourceName = obj[0]["sSourceName"];
                            var utm_source = obj[0]["utm_source"];
                            var utm_medium = obj[0]["utm_medium"];
                            var utm_campaign = obj[0]["utm_campaign"];
                            var mx_PageURL = obj[0]["CampaignURL"];
                            var mx_UID = obj[0]["sUserGenNo"];
                            var mx_AIC_Coupon_Code = obj[0]["AIC_Coupon_Code"];
                            var SubSourceName = obj[0]["sSubSourceName"];
                            var mx_Application_Password = obj[0]["sPwd"];
                            var mx_Session = obj[0]["mx_Session"];

                            var ApiData = ' { "Parameter": {"LookupName": "mx_Form_Number","LookupValue": "' + mx_Form_Number + '","SqlOperator": "="},"Columns": {"Include_CSV": "ProspectID,FirstName, LastName, EmailAddress,CreatedOn,Source"},"Sorting": {"ColumnName": "CreatedOn","Direction":"1"},"Paging": {"PageIndex": 1,"PageSize": 100}}';
                            var ApiUrl = "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.Get?accessKey=" + AccessKey + "&secretKey=" + SecretKey;


                            $.ajax({
                                url: ApiUrl,
                                type: "POST",
                                async: true,
                                data: ApiData,
                                contentType: 'application/json; charset=utf-8',
                                success: function (Result) {
                                    //debugger;
                                    var source = JSON.stringify(Result);
                                    var obj = JSON.parse(source);

                                    writeToFileLeadSquare("URL :- " + ApiUrl + " obj length:" + obj.length + " Data :- " + ApiData, source);

                                    if (obj.length > 0) {
                                        var ProspectID = obj[0]["ProspectID"];

                                        if (Step == "Program / Campus Details Filled") {
                                            leadsquaredActivityUpdate(AccessKey, SecretKey, ProspectID, mx_City, mx_Program_Type, ActivityEvent, mx_Programme)
                                        }
                                        // leadsquaredActivity(AccessKey, SecretKey, ProspectID, Step, ActivityEvent);
                                        updateLeadStage(AccessKey, SecretKey, ProspectID, Step);

                                    }
                                    else {
                                        leadsquaredCreateLeadWithActivity(AccessKey, SecretKey, FirstName, LastName, EmailAddress, Mobile, mx_Programme, mx_Campus, mx_Form_Number, Step,
                                            mx_City, SourceName, SubSourceName, ActivityEvent, utm_source, mx_PageURL, mx_UID, mx_AIC_Coupon_Code, mx_Application_Password, mx_Session);
                                    }
                                },
                                error: function (xhr, errorType, exception) {
                                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                                }
                            });
                        }
                    }
                },
                error: function (xhr, errorType, exception) {
                    OnErrorLeadSquare(xhr, errorType, exception, "URL :- " + ApiUrl + " Data :- " + ApiData);
                }
            });

        }

        function setCookie(key, value, expiry) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }

        function eraseCookie(key) {
            var keyValue = getCookie(key);
            setCookie(key, keyValue, '-1');
        }

        function OnError(xhr, errorType, exception) {

            $("#loderimg").css("display", "none");
            //
            var responseText;
            $("#dialog").html("");
            var msg = "";
            try {
                responseText = JSON.parse(xhr.responseText);
                $("#dialog").append("<div><b>" + errorType + " " + exception + "</b></div>");
                $("#dialog").append("<div><u>Exception</u>:<br /><br />" + responseText.ExceptionType + "</div>");
                $("#dialog").append("<div><u>StackTrace</u>:<br /><br />" + responseText.StackTrace + "</div>");
                $("#dialog").append("<div><u>Message</u>:<br /><br />" + responseText.Message + "</div>");
                // msg = errorType + " " + exception + "\n" + "Exception:  " + responseText.ExceptionType + "\n"


            } catch (e) {
                responseText = xhr.responseText;
                $("#dialog").html(responseText);
                // msg = responseText;
            }
            exception = exception == null ? "" : exception;

            if (exception != "")
                writeToFile($("#dialog").html() + " Error Type :" + errorType + " Exception :" + exception);

            $("#dialog").show();

        }

        function OnErrorLeadSquare(xhr, errorType, exception, Req) {

            $("#loderimg").css("display", "none");
            //
            var responseText;
            $("#dialog").html("");
            var msg = "";
            try {
                responseText = JSON.parse(xhr.responseText);
                $("#dialog").append("<div><b>" + errorType + " " + exception + "</b></div>");
                $("#dialog").append("<div><u>Exception</u>:<br /><br />" + responseText.ExceptionType + "</div>");
                $("#dialog").append("<div><u>StackTrace</u>:<br /><br />" + responseText.StackTrace + "</div>");
                $("#dialog").append("<div><u>Message</u>:<br /><br />" + responseText.Message + "</div>");
                // msg = errorType + " " + exception + "\n" + "Exception:  " + responseText.ExceptionType + "\n"


            } catch (e) {
                responseText = xhr.responseText;
                $("#dialog").html(responseText);
                // msg = responseText;
            }
            exception = exception == null ? "" : exception;

            writeToFileLeadSquare(Req, $("#dialog").html() + " Error Type :" + errorType + " Exception :" + exception)

            //  $("#dialog").show();

        }

        function writeToFile(msg) {
            //alert(msg);
            var URL = window.location.href;
            $.ajax({
                type: "POST",
                url: '../OnlineForms/SaveERrror',
                data: { "message": encodeURIComponent(msg), "URL": URL },
                dataType: 'json',
                async: true,
                success: function (response) {
                    // alert("error saved");
                },
                error: function (e) {
                    //    swal('ERROR: ' + e.val);
                }
            });
        }


        function writeToFileLeadSquare(Request, Response) {
            //

            var URL = window.location.href;
            $.ajax({
                type: "POST",
                url: '../OnlineForms/SaveLeadSquareLog',
                data: { "req": encodeURIComponent(Request), "res": encodeURIComponent(Response) },
                dataType: 'json',
                async: true,
                success: function (response) {
                    // alert("error saved");
                },
                error: function (e) {
                    //    swal('ERROR: ' + e.val);
                }
            });
        }

    
        //LeadsSquare Functions Ends
        $('.closebtn').click(function () {
            $('#FormTypeChange').hide();
        });

        $('#BtnNFWithoutData').click(function () {
            debugger;
            // swal({ title: "Are you sure?", text: "Your want to create new form !!", type: "warning", showCancelButton: true, confirmButtonClass: "btn-success", confirmButtonText: "Yes !", closeOnConfirm: false },
            //     function () {
            var txtCandidateName = $('#spanName').val();
            var txtCountryCode = $('#spanCountryCode').val();
            var txtMobile = $('#spanMobile').val();
            var txtCandidateEmail = $('#spanEmail').val();


            var sReferral = $("#Referral").val();
            var CampusID = $("#RefCampusID").val();
            var Lateral = $("#Lateral").val();
            var utm_source = $("#Utm_Source").val();
            var utm_medium = $("#Utm_Medium").val();
            var utm_campaign = $("#Utm_Campaign").val();
            var sType = $("#ddlFormType").val();        
            Lateral = sType == "2" ? "1" : Lateral;
      

            if (txtCandidateName == "") { swal("Please Fill Candidate Name"); return false; }
            else if (txtMobile == "") { swal("Please Fill Mobile No "); return false; }
            else if (txtMobile.length < 10) { swal("Invalid Mobile No."); return false; }
            else if (txtCandidateEmail == "") { swal("Please Fill Candidate Email"); return false; }
            else if (!validateEmail(txtCandidateEmail)) { swal("Invalid email address!"); return false; }
            else if (sType == "0") { swal("Please select applying for !"); return false; }
            else {
                if (sType == "3") { 
                    $.ajax({
                        type: "POST",
                        url: '../OnlineFormsPhd/SaveBasicDetailPhd',
                        data: {
                            "txtCandidateName": txtCandidateName, "txtCountryCode": txtCountryCode, "txtMobile": txtMobile,
                            "txtCandidateEmail": txtCandidateEmail, "sReferral": sReferral, "CampusID": CampusID
                        },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var obj = JSON.parse(status);
                            if (obj.length > 0)
                            {

                                if (CampusID != "") {

                                    // LeadSquareRequest(obj[0].UserGenNO, 'Ph.D: Basic Details Filled');
                                }
                            
                           
                         
                                window.location.href = "../OnlineFormsPhd/ProgramAndCampusphd?UID=" + obj[0].UserGenNO;
                            
                            }
                            else {
                                swal('ERROR: In server please try after some time ');
                            }
                        },
                        error: OnError
                    });
              
                }
                else {
                    $.ajax({
                        type: "POST",
                        url: '../OnlineForms/SaveBasicDetail',
                        data: {
                            "txtCandidateName": txtCandidateName, "txtCountryCode": txtCountryCode, "txtMobile": txtMobile, "txtCandidateEmail": txtCandidateEmail,
                            "sReferral": sReferral, "CampusID": CampusID, "utm_source": utm_source, "utm_medium": utm_medium,
                            "utm_campaign": utm_campaign, "Lateral": Lateral
                        },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            var Data = JSON.parse(status);
                            var table = Data.Table[0];
                            if (table != null) {
                                var url = "../OnlineForms/DirectLoginToInc?UID=" + table.sUserGenNo + "&AccessKey=AKIAJP2wLVwTO3IU2yN2WQ";
                                window.open(url, '_blank');
                                window.location.reload();
                            }
                            else {
                                swal('ERROR: In server, please try after some time ');
                            }


                        },
                        error: OnError
                    });
                }

          
            }
            // });
        });


        $('#btnChangeFormType').click(function () {
            
            
    


            var FormNo = $('#hidformno').val();
            var sType = $("#ddlFormTypeChange").val();

            if (sType == "0") { swal("Please choose Form Type"); return false; }
            else {
                swal({ title: "Are you sure?", text: "You want to change Form Type as '" + $("#ddlFormTypeChange option:selected").text() + "'  !!", type: "", showCancelButton: true, confirmButtonClass: "btn-success", confirmButtonText: "Yes !", closeOnConfirm: false },
                function () {
                    $.ajax({
                        type: "POST",
                        url: '../Candidate/FormTypeChange',
                        data: {
                            "FormNo": FormNo, "FormType": sType
                        },
                        dataType: 'json',
                        async: true,
                        success: function (status) {
                            debugger;
                            var obj = JSON.parse(status);
                            var table = obj.Table[0];
                            if (table != null) {
                                swal(table.msg);
                                $('#FormTypeChange').hide();                                
                                var url = "../OnlineForms/DirectLoginToInc?UID=" + table.sUserGenNo + "&AccessKey=AKIAJP2wLVwTO3IU2yN2WQ";
                                window.location.href = url;
                            }
                            else {
                                swal('ERROR: In server please try after some time ');
                            }
                        },
                        error: OnError
                    });

                });


            }
             
        });


        $('#BtnNFWithPreviousData').click(function () {

            swal({
                title: "Start another application?",type: "", showCancelButton: true, confirmButtonClass: "btn-success", confirmButtonText: 'Yes',
                cancelButtonText: "No",closeOnConfirm: false },
                function () {
                    var txtOldFormNo = $('#OldFormNo').val();
                    var txtOldPWD = $('#OldPWD').val();
                    var sReferral = $('#Referral').val();
                    var sType = $("#ddlFormType").val();


                    if (txtOldFormNo == "") { swal("Please enter form no"); return false; }
                    if (isNaN(txtOldFormNo) == true) { swal("Invalid Form No"); return false; }
                    if (txtOldPWD == "") { swal("Please enter password"); return false; }
                    else if (sType == "0") { swal("Please select applying for !"); return false; }
                    else {
                        $.ajax({
                            type: "POST",
                            url: '../OnlineForms/CopyPreviousDetail',
                            data: { "sReferral": sReferral, "txtOldFormNo": txtOldFormNo, "txtOldPWD": txtOldPWD, "sType": sType},
                            dataType: 'json',
                            async: true,
                            success: function (status) {

                                var Data = JSON.parse(status);
                                var table = Data.Table[0];
                                if (table != null) {
                                    var url = "../OnlineForms/DirectLoginToInc?UID=" + table.sUserGenNo + "&AccessKey=AKIAJP2wLVwTO3IU2yN2WQ";
                                    window.open(url, '_blank');
                                    window.location.reload();
                                }
                                else {
                                    swal('Invalid Login');
                                }
                            },
                            error: OnError
                        });
                    }

                });
        });

        var LNO = GetParameterValues('LNO');

        if (LNO != undefined && LNO != null && LNO != "") {

            var url = window.location.href.toLowerCase();

            var CPurl = url.indexOf("candidateprofile", 0)
            if (CPurl >= 0) {

                $('#btnResendVerificationEmail').click(function () {
                    var txtCandidateEmail = $('#txtCandidateEmail').val();
                    if (txtCandidateEmail == "") { swal("Please Fill Candidate Email"); return false; }
                    else if (!validateEmail(txtCandidateEmail)) { swal("Invalid email address!"); return false; }
                    else {
                        SendLinkToVeriyEmail(LNO, txtCandidateEmail);
                    }
                });

            }

            var veriymoburl = url.indexOf("verifymob", 0)
            if (veriymoburl >= 0) {

                $('#BtnResendOTP').delay(300000).show(0);

                $.ajax({
                    type: "POST",
                    url: 'GetCandidateProfile',
                    data: { "LNO": LNO },
                    dataType: 'json',
                    success: function (status) {

                        var Data = JSON.parse(status);
                        var table = Data.Table[0];
                        if (table != null) {
                            $("#spanEmail").html(table.sEmail);
                        }
                        else {
                            window.location.href = "SignUp";
                        }

                    },
                    error: OnError
                });
            }

            var MAurl = url.indexOf("myapplication", 0)
            if (MAurl >= 0) {




            }
        }
        else if (LNO == undefined || LNO == null || LNO != "") {

            var url = window.location.href.toLowerCase();
            url = url.indexOf("candidateprofile", 0)
            if (url >= 0) { window.location.href = "SignIn"; }
        }


        function ValidationCheck_SignUp()
        {
            debugger;
            if ($("#CandidateName").val() == "") {
                $("#CandidateName").css("border-color", "red");
            }
            else {
            
            
                $("#CandidateName").css("border-color", "white");
            
            
            }

            if ($("#txtCountryCode").val() == "")
            {
                $("#txtCountryCode").css("border-color", "red");
            }

            else { $("#txtCountryCode").css("border-color", "white"); }


            if ($("#MobileNo").val() == "")
            {
                $("#MobileNo").css("border-color", "red");
            }

            else { $("#MobileNo").css("border-color", "white"); }

            if ($("#CandidateEmail").val() == "") {
                $("#CandidateEmail").css("border-color", "red");
            }
            else {
                $("#CandidateEmail").css("border-color", "white");
            }
       
            if ($('#MathCaptchaAnswer').val() == "") {

                $("#MathCaptchaAnswer").css("border-color", "red");
            }
            else { $("#MathCaptchaAnswer").css("border-color", "white"); }

            if ($('#chkAgree').prop('checked')) {


        
                debugger;
                $('input[type="checkbox"]').css('border-color', 'white');
          
            }

            else {
            
                $('#chkAgree').css('outline-color', 'red');
                $('#chkAgree').css('outline-style', 'solid');
                $('#chkAgree').css('outline-width', 'thin');
                document.getElementById("chkAgree").style.borderColor = "red";
            }
        }


        function ValidationCheck_SignIn() {


            if ($('#MobileNo').val() == "") {
                $('#MobileNo').css("border-color", "red");
            }
            else { $('#MobileNo').css("border-color", "white"); }

            if ($('#txtPassword').val()=="")
            {
                $('#txtPassword').css("border-color", "red");
            }

            else { $('#txtPassword').css("border-color", "white");}
        
        
        }

        function ValidationCheck_FPass() {

            if ($('#FPMobileNo').val() == "") {

                $('#FPMobileNo').css("border-color", "red")
            }
            else {
                $('#FPMobileNo').css("border-color", "white")
            }
        }

    });





