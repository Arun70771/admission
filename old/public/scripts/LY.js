
$(document).ready(function () {
    $ = jQuery.noConflict();




    //$("input[type='number']").keydown(function () { $(this).data("old", $(this).val()); });
    //$("input[type='number']").keyup(function () {
    //    var maxlenth = $(this).attr("maxlength");
    //    if ($(this).val().length <= maxlenth && $(this).val().length >= 0 && $.isNumeric($(this).val()) == true);
    //    else { $(this).val($(this).data("old")); }
    //});


    $(".numericOnly").keypress(function (event) { if ((event.which != 46 || $(this).val().indexOf('.') == -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) { event.preventDefault(); } });

    $(".numericwithdecimal").keypress(function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (event.which != 0 && event.which != 8))) { event.preventDefault(); }
        var text = $(this).val();
        if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && (event.which != 0 && event.which != 8) && ($(this)[0].selectionStart >= text.length - 2)) { event.preventDefault(); }

    });

    $(".numericwithplus").keypress(function (e) { if (String.fromCharCode(e.keyCode).match(/[^0-9,+]/g)) return false; });
    // $('input').focusout(function () { this.value = this.value.toLocaleUpperCase(); });
    // $('textarea').focusout(function () { this.value = this.value.toLocaleUpperCase(); });
    //.replace(/\(|\)/g, '')

    //$("input[type='number']").keyup(function () {
    //    var VAL = $(this).val();
    //    var number = new RegExp(/[0-9]+\.?[0-9]*/g);

    //    if (VAL.test(number)) {
    //        $(this).val();
    //    }

    //});
    $('input:text').focusout(function () { $(this).val($(this).val().replace(/[\(\)\?\&\>\<\[\]{}'"]/g, ' ').toLocaleUpperCase().trim()); });
    $('textarea').focusout(function () { $(this).val($(this).val().replace(/[\(\)\?\&\>\<\[\]{}'"]/g, ' ').toLocaleUpperCase().trim()); });

    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
            $(element).focus();
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });


    var UID = GetParameterValues('UID');
    var CD = GetParameterValues('CD');

    if (GetParameterValues('ltrl') == "1")
        $("#spnAdmHeading").html("Lateral Application Form");
    else
        $("#spnAdmHeading").html("Application Form");

    var URL = window.location.href;
    debugger;
    if (UID == "undefined") {
        alert("come");
    }
    else {
        $.ajax({
            type: "POST",
            url: '../OnlineForms/LoadFormNo',

            data: { "UID": UID, "URL": URL, 'CD': CD },
            dataType: 'json',
            success: function (status) {
                // debugger;
                var Data = JSON.parse(status);
                // alert(status);
                var table = Data.Table[0];
                var table1 = Data.Table1[0];

                //  alert(Data.Table.length);
                if (table != null) {
                    // alert(Data.Table[1].sMenuName)
                    //$("#headerfno").html(Data.Table[0].iFormNo);
                    var menu = "";

                    for (var slno = 0; slno < Data.Table.length; slno++) {


                        var ActiveClass = Data.Table[slno].ActiveClass != null ? Data.Table[slno].ActiveClass : '';
                        var sURL = Data.Table[slno].sURL != null ? Data.Table[slno].sURL : '';
                        var iStepNo = Data.Table[slno].iStepNo != null ? Data.Table[slno].iStepNo : '';
                        var sMenuName = Data.Table[slno].sMenuName != null ? Data.Table[slno].sMenuName : '';
                        var ActiveStep = Data.Table[slno].ActiveStep != null ? Data.Table[slno].ActiveStep : '';
                        var DoneStep = Data.Table[slno].DoneStep != null ? Data.Table[slno].DoneStep : '';
                        //  alert(Data.Table[1].ActiveStep)
                        menu = menu + "<li " + ActiveClass + ">";
                        // menu = menu + "<a href='" + (UID != null ? sURL : URL) + "'>";
                        menu = menu + '<a href="javascript:void(0)" onClick="javascript:validatePage(\'' + sURL + '\',' + iStepNo + ')">';
                        menu = menu + "<i class='ion'> " + iStepNo + "</i>";
                        menu = menu + "<span class='text'>" + sMenuName + "</span>";
                        menu = menu + ActiveStep
                        menu = menu + DoneStep
                        menu = menu + "</a>";
                        menu = menu + "</li>";

                    };
                    $("#menu").append(menu);
                    // alert(table.ActiveClass);



                }

                if (table1 != null) {
                    $("#headerfno").html(table1.iFormNo);
                    if (table1.FormType == "ON") {
                        $("#spnAdmHeading").html("Application Form");
                    }
                    else {
                        $("#spnAdmHeading").html("Lateral Application Form");
                    }

                    //
                    if (table1.bAmityJEE == "1") {
                        var url = window.location.href;
                        url = url.indexOf("AmityJEE", 0)
                        if (url < 0) {
                            window.location.href = "AmityJEE" + "?UID=" + UID;
                        }
                    }

                    $(".form_no").show();

                    if (table1.Email != null && table1.Email != "" && table1.Email != "null") {
                        $('#HelpEmail').html(table1.Email);
                    }


                    if (table1.Tel != null && table1.Tel != "" && table1.Tel != "null") {
                        $('#HelpPhoneNumber').html(table1.Tel);
                    }

                    if ((table1.Tel != null && table1.Tel != "" && table1.Tel != "null") || (table1.Email != null && table1.Email != "" && table1.Email != "null")) {
                        $('#LiHelpLine').show();
                    }
                    else {
                        $('#LiHelpLine').hide();
                    }
                }
                else {
                    $(".form_no").hide();
                    //
                    var url = window.location.href;
                    url = url.indexOf("UploadeDocs", 0)
                    if (url < 0) {
                        //window.location.href = "BasicInformation";
                        var url = window.location.href;
                        url = url.indexOf("BasicInformation", 0)
                        if (url < 0) {
                            window.location.href = "../OnlineForms/BasicInformation";
                        }
                    }

                }
            },
            error: OnError
        });

    }


});

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


function leadsquaredActivityUpdate(AccessKey, SecretKey, ProspectID, mx_City, mx_Program_Type, ActivityEvent, mx_Programme, mx_Campus) {
    var strmx_Program_Type = ''
    if (mx_Program_Type != "") {
        strmx_Program_Type = '{\"Attribute\": \"mx_Program_Type\",\"Value\": \"' + mx_Program_Type + '\"}, { "Attribute": "mx_Campus", "Value": "' + mx_Campus + '" },';
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
        url: 'GetDataForLead',
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
                    obj[0]["iCampusID"] == "43" || obj[0]["iCampusID"] == "47" || obj[0]["iCampusID"] == "68") {
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
                    debugger;
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
                                    //debugger;
                                    leadsquaredActivityUpdate(AccessKey, SecretKey, ProspectID, mx_City, mx_Program_Type, ActivityEvent, mx_Programme, mx_Campus)
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
        url: 'SaveERrror',
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
        url: 'SaveLeadSquareLog',
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



function validatePage(sURL, iStepNo) {
    //debugger;
    if (sURL == null || sURL == undefined || sURL == "") {
        return false;
    } else {
        var pageURL = $(location).attr("href").match(/[^\/]+$/)[0].split("?")[0];
        if (pageURL.toLowerCase() == "basicinformation") {
            if (sURL.indexOf('?UID') > -1) {
                BasicInformationUpdate(sURL);
            }
            else {
                BasicInformationSave(sURL);
            }
        }
        else if (pageURL.toLowerCase() == "programandcampus") {
            if (iStepNo < 2)
                bindStepWiseURL(sURL)
            else
                SavePAC(sURL);
        }
        else if (pageURL.toLowerCase() == "paymentinformation") {
            if (iStepNo < 3)
                bindStepWiseURL(sURL)
        }
        else if (pageURL.toLowerCase() == "personaldetail") {
            if (iStepNo < 4)
                bindStepWiseURL(sURL)
            else
                SavePersonal(sURL);
        }
        else if (pageURL.toLowerCase() == "educationdetail") {
            if (iStepNo < 5)
                bindStepWiseURL(sURL)
            else
                SaveEducationdt(sURL);
        }
        else if (pageURL.toLowerCase() == "familyinformation") {
            if (iStepNo < 6)
                bindStepWiseURL(sURL)
            else
                SaveFamilyInfo(sURL);
        }
        else if (pageURL.toLowerCase() == "otherinformation") {
            if (iStepNo < 7)
                bindStepWiseURL(sURL)
            else
                OtherInfoSave(sURL);
        }
        else if (pageURL.toLowerCase() == "uploadedocs") {
            if (iStepNo < 8)
                bindStepWiseURL(sURL)
            else
                UploadSave();
        }
        else if (pageURL.toLowerCase() == "thankyou") {
            bindStepWiseURL(sURL);
        }
    }
}



function bindStepWiseURL(sURL) {
    //debugger;
    window.location.href = sURL;
}

/* Basic info*/
function BasicInformationUpdate(sURL) {
    debugger;
    if ($("#Basicform").valid()) {

        var txtCandidateName = isEmpty($('#txtCandidateName').val());
        var txtCountryCode = isEmpty($('#txtCountryCode').text());
        var txtMobile = isEmpty($('#txtMobile').val());
        var txtCandidateEmail = isEmpty($('#txtCandidateEmail').val());
        var txtCouponCode = isEmpty($('#txtCouponCode').val());
        var sReferral = GetParameterValues('WCID');
        var ddlNationality = isEmpty($('#ddlNationality').val());

        if (txtCandidateName == "") { swal("Please Fill Candidate Name"); return false; }
        else if (txtMobile == "") { swal("Please Fill Mobile No "); return false; }
        else if (txtMobile.length < 10) { swal("Invalid Mobile No."); return false; }
        else if (txtCountryCode == "") { swal("Please Select Country Code for Mobile"); return false; }
        else if (txtCandidateEmail == "") { swal("Please Fill Candidate Email"); return false; }
        else if (!validateEmail(txtCandidateEmail)) { swal("Invalid email address!"); return false; }
        else if (ddlNationality == "") { swal("Please Select Nationality"); return false; }
        else {
            $.ajax({
                type: "POST",
                url: 'UpdateBasicDetail',
                data: {
                    "txtCandidateName": txtCandidateName, "txtCountryCode": txtCountryCode, "txtMobile": txtMobile,
                    "txtCandidateEmail": txtCandidateEmail, "UserGenNo": $('#lblUserGenNO').val(), "strnationality": ddlNationality, "CCode": txtCouponCode
                },
                dataType: 'json',
                async: true,
                success: function (response) {
                    if (response == 'Done') {
                        swal(
                            { title: "Basic Detail Saved", type: "success", closeOnConfirm: true },
                            function () {
                                bindStepWiseURL(sURL);
                            })
                    }
                    else { swal("Basic Detail Not Saved"); }
                },
                error: OnError
            });
        }
    }
}

function BasicInformationSave(sURL) {
    debugger;
    if ($("#Basicform").valid()) {
        CheckCC('0');

        var txtCandidateName = isEmpty($('#txtCandidateName').val());
        var txtCountryCode = isEmpty($('#txtCountryCode').text());
        var txtMobile = isEmpty($('#txtMobile').val());
        var txtCandidateEmail = isEmpty($('#txtCandidateEmail').val());
        var ddlNationality = isEmpty($('#ddlNationality').val());

        //var txtOldFormNo = $('#txtPreviousFormNo').val();
        //var txtOldPWD = $('#txtPreviousPWD').val();
        var sReferral = GetParameterValues('WCID');
        var CampusID = GetParameterValues('CampusID');
        var Lateral = GetParameterValues('ltrl');



        var utm_source = GetParameterValues('utm_source');
        var utm_medium = GetParameterValues('utm_medium');
        var utm_campaign = GetParameterValues('utm_campaign');


        var CCode = $("#txtCouponCode").val();

        if (txtCandidateName == "") { swal("Please Fill Candidate Name"); return false; }
        else if (txtMobile == "") { swal("Please Select Country Code for Mobile"); return }
        else if (txtMobile.length < 10) { swal("Invalid Mobile No."); return false; }
        else if (txtCountryCode == "") { swal("Please Select Country Code for Mobile"); return false; }
        else if (txtCandidateEmail == "") { swal("Please Fill Candidate Email"); return false; }
        else if (!validateEmail(txtCandidateEmail)) { swal("Invalid email address!"); return false; }
        else if (ddlNationality == "") { swal("Please Select Nationality"); return false; }

            //if (isEmpty(txtCandidateName) == "") { swal("Please Fill Candidate Name"); return false; }
            //    else if (txtMobile == "") { swal("Please Fill Mobile No "); return false; }
            //    else if (txtMobile.length < 10) { swal("Invalid Mobile No."); return false; }
            //    else if (txtCountryCode == "") { swal("Please Select Country Code for Mobile"); return false; }
            //    else if (txtCandidateEmail == "") { swal("Please Fill Candidate Email"); return false; }
            //    else if (!validateEmail(txtCandidateEmail)) { swal("Invalid email address!"); return false; }
            //    else if (ddlNationality == "") { swal("Please Select Nationality"); return false; }


        else {

            $.ajax({
                type: "POST",
                url: 'SaveBasicDetail',
                //url: '@Url.Action("SaveBasicDetail")',
                data: {
                    "txtCandidateName": txtCandidateName, "txtCountryCode": txtCountryCode, "txtMobile": txtMobile,
                    "txtCandidateEmail": txtCandidateEmail, "sReferral": sReferral, "CampusID": CampusID, "CCode": CCode, "utm_source": utm_source, "utm_medium": utm_medium, "utm_campaign": utm_campaign, "Lateral": Lateral, "strnationality": ddlNationality

                },
                dataType: 'json',
                async: true,
                success: function (status) {
                    //debugger;

                    var Data = JSON.parse(status);
                    var table = Data.Table[0];
                    var table1 = Data.Table1[0];
                    //alert(Data);   already
                    //var obj = JSON.parse(table);   already
                    if (table != null) {

                        if ($('#lblUserGenNO').text() == null || $('#lblUserGenNO').text() == "") {
                            LeadSquareRequest(table.sUserGenNo, 'Form Started: Basic Details Filled');
                            $("#DivMSG").show();
                            $("#DivInput").hide();
                            $('#lblCandName').text(table.sFirstName);
                            $('#lblIformno').text(table.iFormNo);
                            $('#lblUserGenNO').text(table.sUserGenNo);
                            $('#lblpassword').text(table.sPwd);
                            $('#lblPayamount').text(table.AmounttoPay);
                            $.ajax({
                                url: "_AnalyticsCode",
                                type: "GET",
                                contentType: "applicationn/html charset=utf-8",
                                dataType: 'html',
                                success: function (data) {
                                    $("#ScriptDiv").html(data);
                                }
                            });


                        }
                        else {
                            bindStepWiseURL(sURL);

                        }
                    }
                    else {
                        swal('ERROR: In server please try after some time ');
                    }

                    if (table1 != null) {
                        $("#cmpsContactdetails").html("");
                        //  var obj = JSON.parse(table1);
                        $.each(Data.Table1, function (i, option) {
                            var ctdetails = "<div class='col-md-3' style='min-height: 190px;'>";
                            ctdetails = ctdetails + "<h4>" + option.sCampusName + "</h4><p>";
                            if (option.Email != "" && option.Email != null)
                                ctdetails = ctdetails + "email to <a href='mailto:" + option.Email + "' target='_blank'>" + option.Email + "</a>";
                            if (option.Email != "" && option.tel != "") {
                                ctdetails = ctdetails + ",<br> or ";
                            }
                            if (option.tel != "" && option.tel != null)
                                ctdetails = ctdetails + "call us at " + option.tel

                            ctdetails = ctdetails + "</p></div>"

                            $('#cmpsContactdetails').append(ctdetails);
                        });
                    }


                },
                error: OnError


            });
        }
    }
}


function CheckCC(from) {
    var CCode = $("#txtCouponCode").val();

    if (CCode.length == 6) {
        $.ajax({
            type: "POST",
            url: 'CheckCCAvailability',
            data: { "CCode": CCode },
            dataType: 'json',
            async: true,
            success: function (response) {
                if (response == '00') {
                    if (from == '1')
                        swal("Error!!", "Invalid AIC Coupon Code !!", "error");
                    $("#txtCouponCode").parent().parent().parent().addClass("has-error");
                    $("#txtCouponCode").val('');
                }
                else if (response == '01') {
                    if (from == '1')
                        swal("warning!!", "Already Used !!", "Warning");
                    $("#txtCouponCode").parent().parent().parent().addClass("has-warning");
                    $("#txtCouponCode").val('');
                }
                else if (response == '02') {
                    if (from == '1')
                        swal("success!!", "Coupon Code Available!", "success");
                    $("#txtCouponCode").parent().parent().parent().addClass("has-success");
                }
            },
            error: OnError
        })
    }
}

/* Program and Campus Save function*/

function SavePAC(sURL) {

    //debugger;
    //hspixel('track', 'Step2');

    var program1 = isEmpty($('#hidcode1').val());
    var program2 = $('#hidcode2').val();
    var program3 = $('#hidcode3').val();
    var program3 = $('#hidcode3').val();
    var hidPreEdu = isEmpty($('#hidPreEdu').val());
    var hidUnivcode1 = isEmpty($('#hidUnivcode1').val());
    var UnivprogramName = $('#UnivprogramName1').html();

    var hidCampus = $('#hidcmp1').val();
    var hidUnivSpecializationID1 = $('#hidUnivSpecializationID1').val();
    //var selOnlineUnivlevel = $('input[type=radio][name=Univlevel]:checked').val() == undefined ? "" : $('input[type=radio][name=Univlevel]:checked').val();
    var selOnlineUnivlevel = isEmpty($('input[type=radio][name=Univlevel]:checked').val());

    var program4 = "";
    var program5 = "";
    var ddlProgramStartYear = isEmpty($('#ddlProgramStartYear').val());
    var txtSemesterPassed = isEmpty($('#txtSemesterPassed').val());
    var txtSemesterToJoin = isEmpty($('#txtSemesterToJoin').val());
    var strLateral = isEmpty($("#hidFormType").val());
    var ddlPreviousEdu = isEmpty($('#ddlPreviousEdu').val());

    if (hidPreEdu == "0") {
        ddlPreviousEdu = "";
    }
    if (ddlPreviousEdu == "1" || ddlPreviousEdu == "2") {
        ddlProgramStartYear = "";
        txtSemesterPassed = "";
        txtSemesterToJoin = "";
    }
    var varEligibleDualOnlineDegree = "1";
    if (strLateral == "ONL") { varEligibleDualOnlineDegree = "0" }

    if (program1 == "") { swal("Please choose Option 1"); return false; }
   // else if (selOnlineUnivlevel == "" && varEligibleDualOnlineDegree == "1") { swal("Please choose pursue an additional degree simultaneously in Online mode"); return false; }
    //else if (selOnlineUnivlevel == "1" && hidUnivcode1 == "" && varEligibleDualOnlineDegree == "1") { swal("Please choose Program of pursue an additional degree simultaneously in Online mode"); return false; }
    else if (hidPreEdu == "1" && strLateral == "ONL" && ddlPreviousEdu == "0") { swal("Please Select Previous Education"); return false; }
    else if (ddlProgramStartYear == "" && (ddlPreviousEdu == "3" || ddlPreviousEdu == "4" || ddlPreviousEdu == "") && strLateral == "ONL") { swal("Please Enter Program Start year"); return false; }
    else if (txtSemesterPassed == "" && (ddlPreviousEdu == "3" || ddlPreviousEdu == "4" || ddlPreviousEdu == "") && strLateral == "ONL") { swal("Please Enter Semester Passed"); return false; }
    else if (txtSemesterToJoin == "" && (ddlPreviousEdu == "3" || ddlPreviousEdu == "4" || ddlPreviousEdu == "") && strLateral == "ONL") { swal("Please Enter Semester To Join"); return false; }
    else {
        $.ajax({
            type: "POST",
            url: 'SaveProgramDetails',
            data: {
                "program1": program1, "program2": program2, "program3": program3,
                "program4": program4, "program5": program5, "UID": UID,
                "ProgramStartYear": ddlProgramStartYear, "SemesterPassed": txtSemesterPassed, "SemesterToJoin": txtSemesterToJoin, "ddlPreviousEdu": ddlPreviousEdu,
                "UnvProgramMode": selOnlineUnivlevel, "UnvProgramId": hidUnivcode1, "UnvSpecializationID": hidUnivSpecializationID1, "Source": "Application Form", "UnivProgramName": UnivprogramName
            },
            dataType: 'json',
            async: false,
            success: function (response) {

                if (response == 'done') {

                    //alert('1')
                    setTimeout(function () { LeadSquareRequest(UID, 'Form Started: Basic Details Filled'); }, 2000);
                    // alert('2')
                    setTimeout(function () { LeadSquareRequest(UID, 'Program / Campus Details Filled'); }, 2000);
                    //alert('3')
                    setTimeout(function () {
                        swal({ title: "Data Saved Successfully", type: "success", closeOnConfirm: false }, function () {

                            // window.location.href = "PaymentInformation?UID=" + UID;
                            bindStepWiseURL(sURL);
                        })
                    }, 2000)

                }
                else {

                    //alert('4')
                    swal("Data Not Saved Successfully");
                }

            },
            error: OnError
        });
    }
}



/* Personal details Save function*/

function SavePersonal(sURL) {
    debugger;
    if ($("#personalform").valid() && validatePersonal()) {
        var FamilyMember = null;
        if ($("#radioemp").is(":checked")) {
            FamilyMember = "Employee";
        }
        else if ($("#radiostu").is(":checked")) {
            FamilyMember = "Student";
        }
        else if ($("#radioalu").is(":checked")) {
            FamilyMember = "Alumni";
        }
        else {
            FamilyMember = "no";
        }
        var Relation = null;
        if (FamilyMember != "no") {

            if ($("#radioGrant").is(":checked")) {
                Relation = "Grandparent";
            }
            else if ($("#radionParent").is(":checked")) {
                Relation = "Parent";
            }
            else if ($("#radioSpouse").is(":checked")) {
                Relation = "Spouse";
            }
            else if ($("#radioSibling").is(":checked")) {
                Relation = "Sibling";
            }
        }
        var bFatherEmailDoesnothave = null;
        var sFatherEmail = null;
        if ($('#chkFEmail').is(':checked')) {
            bFatherEmailDoesnothave = "1";
            sFatherEmail = null;
        }
        else {
            bFatherEmailDoesnothave = "0";
            sFatherEmail = $("#txtFEmail").val();
        }
        var bFatherMobileDoesnothave = null;
        var sFatherMobileNo = null;
        if ($('#chkFMobile').is(':checked')) {
            bFatherMobileDoesnothave = "1";
            sFatherMobileNo = null;
        }
        else {
            bFatherMobileDoesnothave = "0";
            sFatherMobileNo = $("#txtMobileFather").val();
        }

        var bMotherEmailDoesnothave = null;
        var sMotherEmail = null;
        if ($('#chkMEmail').is(':checked')) {
            bMotherEmailDoesnothave = "1";
            sMotherEmail = null;
        }
        else {
            bMotherEmailDoesnothave = "0";
            sMotherEmail = $("#txtMEmail").val();
        }
        var bMotherMobileDoesnothave = null;
        var sMotherMobileNO = null;
        if ($('#chkMMobile').is(':checked')) {
            bMotherMobileDoesnothave = "1";
            sMotherMobileNO = null;
        }
        else {
            bMotherMobileDoesnothave = "0";
            sMotherMobileNO = $("#txtMobileMother").val();
        }


        var Campus = isEmpty($('#icampus').val());
        var UserGenNo = isEmpty($('#UserGenno').val());
        var rblGender = isEmpty($('input[type=radio][name=rblGender]:checked').val());

        var rblKEA = isEmpty($('input[type=radio][name=rbl_KEA]:checked').val());
        var rblSummerSchool = isEmpty($('input[type=radio][name=rblSummerSchool]:checked').val());

        var iSummerSchoolYear = "";
        if (rblSummerSchool == "1") {

            iSummerSchoolYear = $('#ddlSummerSchoolYEAR').find(":selected").val() == undefined ? null : $('#ddlSummerSchoolYEAR').find(":selected").val();
        }

        if (rblKEA == 1) {

            var rblCategory = isEmpty($("#ddlCastCategory").find('option:selected').text());


            var sKEA_SubCast = isEmpty($("#ddlSubCast").find('option:selected').text());

            var sKEA_AdmOrderNo = isEmpty($("#OrderNo").val());



            if (rblCategory == "Select an option") { swal("Please Select Category "); return false; }
            if (sKEA_SubCast == "Select an option") { swal("Please Select Sub Category "); return false; }
            if (sKEA_AdmOrderNo == "") { swal("Please Enter KEA Admission Order No."); return false; }
        }

        else
        {
            var rblCategory = isEmpty($('input[type=radio][name=rblCategory]:checked').val());
        }


        

        var txtDob = isEmpty($('#txtDob').val());


        var rblpassport = isEmpty($('input[type=radio][name=rblpassport]:checked').val());
        var txtpasportNo = isEmpty($('#txtpasportNo').val());
        var txtpasportdate = isEmpty($('#txtpasportdate').val());

        var txtCline1 = isEmpty($('#txtCline1').val());
        var txtCline2 = isEmpty($('#txtCline2').val());
        var txtCCity = isEmpty($('#txtCCity').val());
        var txtCZip = isEmpty($('#txtCZip').val());
        var ddlCCountry = isEmpty($('#ddlCCountry').val());
        var ddlCState = isEmpty($('#ddlCState').val());
        var txtCStateOther = isEmpty($('#txtCStateOther').val());
        var ddlCCity = isEmpty($('#ddlCCity').val());
        var txtCCityOther = isEmpty(($('#txtCCityOther').val()));

        var chkSame = $("#chkSame").is(":checked");// $('#chkSame').val();
        var txtPline1 = isEmpty($('#txtPline1').val());
        var txtPline2 = isEmpty($('#txtPline2').val());
        var txtPZip = isEmpty($('#txtPZip').val());
        var ddlPCountry = isEmpty($('#ddlPCountry').val());
        var ddlPState = isEmpty($('#ddlPState').val());
        var txtPStateOther = isEmpty($('#txtPStateOther').val());
        var ddlPCity = isEmpty($('#ddlPCity').val());
        var txtPCityOther = isEmpty($('#txtPCityOther').val());

        var txtASAPCCode = isEmpty($('#txtASAPCCode').val());
        var hfASAPCCode = isEmpty($('#hfASAPCCode').val());

        var adm_category = $('input[type=radio][name=adm_category]:checked').val() == undefined ? "" : $('input[type=radio][name=adm_category]:checked').val()
        var Hostel = $('input[type=radio][name=radioHostel]:checked').val() == undefined ? "" : $('input[type=radio][name=radioHostel]:checked').val()
        var HostelType = $('input[type=radio][name=radioHostelType]:checked').val() == undefined ? "" : $('input[type=radio][name=radioHostelType]:checked').val()
        var ddlNationality = isEmpty($('#ddlNationality').val());

        var sFathername = isEmpty($("#txtFName").val());
        var sFatherAge = isEmpty($("#txtFAge").val());
        var sFatherQual = isEmpty($("#ddrpFQuali").val());
        var sFatherEmployeeCategory = isEmpty($("#ddrpFEmploymentCategory").val());
        var sFatherdesig = isEmpty($("#txtFDesignation").val());
        var sFatherOccupation = $("#ddrpFProfession").val();

        var sFatherorg = isEmpty($("#txtFOrganisation").val()) == "" ? isEmpty($("#ddrpFOrganisation").val()) : isEmpty($("#txtFOrganisation").val());

        var sFatherResCountry = $("#ddlFCountryres").val();
        var sMothername = $("#txtMName").val();
        var sMotherAge = $("#txtMAge").val();
        var sMotherQual = $("#ddrpMQuali").val();
        var sMotherEmployeeCategory = $("#ddrpMEmploymentCategory").val();
        var sMotherdesig = $("#txtMdesignation").val();
        var sMotherOccupation = $("#ddrpMProfession").val();
       // debugger;
        //var sMotherorg = isEmpty($("#txtMorganisation").val());
        var sMotherorg = isEmpty($("#txtMorganisation").val()) == "" ? isEmpty($("#ddrpMOrganisation").val()) : isEmpty($("#txtMorganisation").val());

        var sMotherResCountry = $("#ddlMCountryres").val();
        var sFamilyMemberName = $("#txtFamilyName").val();
        var sFamilyRelInst = isEmpty($("#txtInstName").val());
        var sFamilyProgramDesignation = isEmpty($("#txtProgName").val());
        var iDurationYear = isNaN(parseInt($("#dateFrom").val())) == true ? null : parseInt($("#dateFrom").val());
        var iDurationTo = isNaN(parseInt($("#dateTo").val())) == true ? null : parseInt($("#dateTo").val());
        var sFatherCountryCode = isEmpty($("#txtCountryCodeFather").text());
        var sMotherCountryCode = isEmpty($("#txtCountryCodeMother").text());
       // debugger;
        var bFDeceased = $("#hidFDeceased").val();
        var bMDeceased = $("#hidMDeceased").val();
        var bFSingle = $("#hidFSingle").val();
        var bMSingle = $("#hidMSingle").val();

        var FatherDetailCheck = "0";
        var MotherDetailCheck = "0";
        if (bFDeceased == "1") {
            FatherDetailCheck = 0
        }
        else if (bFSingle == "1") {
            FatherDetailCheck = 1
            MotherDetailCheck = 0
        }

        if (bMDeceased == "1") {
            MotherDetailCheck = 0
        }
        else if (bMSingle == "1") {
            MotherDetailCheck = 1
            FatherDetailCheck = 0
        }

        

        if (Campus == "4" || Campus == "5" || Campus == "6" || Campus == "24" || Campus == "35" || Campus == "36" || Campus == "68") {
            if (hfASAPCCode == '') {
                CheckASAPCC('0');
            }
        }

        if (UserGenNo == "") { swal("Please reloade the page"); return false; }
        else if (txtDob == "") { swal("Please Select Date Of birth "); return false; }
        else if (rblGender == "") { swal("Please Select Gender "); return false; }
    else if (rblCategory == "" && Campus==68) { swal("Please Select Category "); return false; }
            //
        else if (sFathername == "" && FatherDetailCheck == "1") { swal("Please Enter Father Name"); return false; }

            //
        else if (rblpassport == "" && Campus == "27") { swal("Please Select Passport "); return false; }
        else if (rblpassport == "0" && Campus == "27") { swal("Passport Details are Required"); return false; }
        else if (rblpassport == "1" && txtpasportNo == "" && Campus == "27") { swal("Please Fill pasport No"); return false; }
        else if (rblpassport == "1" && txtpasportdate == "" && Campus == "27") { swal("Please Fill pasport Validty date"); return false; }

        else if (txtCline1 == "") { swal("Please Fill line1 of Correspondence address "); return false; }
        else if (txtCZip == "") { swal("Please Fill Correspondence Zip "); return false; }
        else if (ddlCCountry == "0") { swal("Please Select Correspondence Country"); return false; }

        else if (ddlCState == "") { swal("Please Select Correspondence State"); return false; }
        else if (ddlCState == "Other" && txtCStateOther == "") { swal("Please Enter Correspondence State If Other"); return false; }

        else if (ddlCCity == "") { swal("Please Select Correspondence City"); return false; }
        else if (ddlCCity == "Other" && txtCCityOther == "") { swal("Please Enter Correspondence City If Other"); return false; }

        else if (txtPline1 == "") { swal("Please Fill line1 of Permanent address "); return false; }
        else if (txtPZip == "") { swal("Please Fill Permanent Zip "); return false; }
        else if (ddlPCountry == "0") { swal("Please Select Permanent Country"); return false; }

        else if (ddlPState == "") { swal("Please Select Permanent State"); return false; }
        else if (ddlPState == "Other" && txtPStateOther == "") { swal("Please Enter Permanent State If Other"); return false; }

        else if (ddlPCity == "") { swal("Please Select Permanent City"); return false; }
        else if (ddlPCity == "Other" && txtPCityOther == "") { swal("Please Enter Permanent City If Other"); return false; }


        else if (ddlNationality == "") { swal("Please Select Nationality"); return false; }
        else if (rblSummerSchool == "") { swal("Please Select Summer School Program Status"); return false; }
            //  else if (adm_category == "") { swal("Please select admission category"); return false; }
            //  else if (Hostel == "") { swal("Please select hostel option"); return false; }
            //  else if (Hostel == "1" && HostelType == "") { swal("Please select hostel type option"); return false; }
        else {
            var today = new Date();
            var birthDate = new Date(process(txtDob));
            var age = today.getFullYear() - birthDate.getFullYear();
            // debugger;
            if (age < 15 || age > 45 || Campus == "4" || Campus == "5" ||
                Campus == "6" || Campus == "24" || Campus == "35" || Campus == "36" || Campus == "68") {
                swal({
                    title: "Are you sure?",
                    text: "Please check and verify your date of birth " + txtDob + " as per Xth marksheet",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    closeOnConfirm: true
                }, function () {
                    savePD(UserGenNo, rblGender, rblCategory, txtDob, rblpassport, txtpasportNo, txtpasportdate,
                        txtCline1, txtCline2, ddlCCity, txtCCityOther, txtCZip, $("#ddlCCountry option:selected").text(), $("#ddlCState option:selected").text(), txtCStateOther,
                        chkSame, txtPline1, txtPline2, ddlPCity, txtPCityOther, txtPZip, $("#ddlPCountry option:selected").text(), $("#ddlPState option:selected").text(), txtPStateOther,
                        ddlNationality, txtASAPCCode, FamilyMember, sFathername, sFatherAge, sFatherQual, sFatherEmployeeCategory, sFatherdesig, sFatherOccupation,
                        sFatherorg, bFatherEmailDoesnothave, sFatherEmail, bFatherMobileDoesnothave, sFatherMobileNo, sFatherResCountry,
                        sMothername, sMotherAge, sMotherQual, sMotherEmployeeCategory, sMotherdesig, sMotherOccupation,
                        sMotherorg, bMotherEmailDoesnothave, sMotherEmail, bMotherMobileDoesnothave, sMotherMobileNO, sMotherResCountry,
                        FamilyMember, sFamilyMemberName, sFamilyRelInst, sFamilyProgramDesignation, iDurationYear, iDurationTo,
                        Relation, sFatherCountryCode, sMotherCountryCode, sURL, rblSummerSchool, iSummerSchoolYear, rblKEA, sKEA_SubCast, sKEA_AdmOrderNo,
                        bFDeceased, bMDeceased, bFSingle, bMSingle
                    );

                });
            }
            else {
                savePD(UserGenNo, rblGender, rblCategory, txtDob, rblpassport, txtpasportNo, txtpasportdate,
                    txtCline1, txtCline2, ddlCCity, txtCCityOther, txtCZip, $("#ddlCCountry option:selected").text(), $("#ddlCState option:selected").text(), txtCStateOther,
                    chkSame, txtPline1, txtPline2, ddlPCity, txtPCityOther, txtPZip, $("#ddlPCountry option:selected").text(), $("#ddlPState option:selected").text(), txtPStateOther,
                    ddlNationality, txtASAPCCode, FamilyMember, sFathername, sFatherAge, sFatherQual, sFatherEmployeeCategory, sFatherdesig, sFatherOccupation,
                    sFatherorg, bFatherEmailDoesnothave, sFatherEmail, bFatherMobileDoesnothave, sFatherMobileNo, sFatherResCountry,
                    sMothername, sMotherAge, sMotherQual, sMotherEmployeeCategory, sMotherdesig, sMotherOccupation,
                    sMotherorg, bMotherEmailDoesnothave, sMotherEmail, bMotherMobileDoesnothave, sMotherMobileNO, sMotherResCountry,
                    FamilyMember, sFamilyMemberName, sFamilyRelInst, sFamilyProgramDesignation, iDurationYear, iDurationTo,
                    Relation, sFatherCountryCode, sMotherCountryCode, sURL, rblSummerSchool, iSummerSchoolYear, rblKEA, sKEA_SubCast, sKEA_AdmOrderNo,
                    bFDeceased, bMDeceased, bFSingle, bMSingle);
            }


        }
    }
}

function savePD(UserGenNo, rblGender, rblCategory, txtDob, rblpassport, txtpasportNo, txtpasportdate,
    txtCline1, txtCline2, ddlCCity, txtCCityOther, txtCZip, ddlCCountry, ddlCState, txtCState,
    chkSame, txtPline1, txtPline2, ddlPCity, txtPCityOther, txtPZip, ddlPCountry, ddlPState, txtPState,
    ddlNationality, txtASAPCCode,
    FamilyMember, sFathername, sFatherAge, sFatherQual, sFatherEmployeeCategory, sFatherdesig, sFatherOccupation,
    sFatherorg, bFatherEmailDoesnothave, sFatherEmail, bFatherMobileDoesnothave, sFatherMobileNo, sFatherResCountry,
    sMothername, sMotherAge, sMotherQual, sMotherEmployeeCategory, sMotherdesig, sMotherOccupation,
    sMotherorg, bMotherEmailDoesnothave, sMotherEmail, bMotherMobileDoesnothave, sMotherMobileNO, sMotherResCountry,
    FamilyMember, sFamilyMemberName, sFamilyRelInst, sFamilyProgramDesignation, iDurationYear, iDurationTo,
    sRelation, sFatherCountryCode, sMotherCountryCode, sURL, rblSummerSchool, iSummerSchoolYear, rblKEA, sKEA_SubCast, sKEA_AdmOrderNo, bFDeceased, bMDeceased, bFSingle, bMSingle) {

    var para = {
        'UserGenNo': UserGenNo,
        'rblGender': rblGender, 'rblCategory': rblCategory, 'txtDob': txtDob, 'rblpassport': rblpassport, 'txtpasportNo': txtpasportNo, 'txtpasportdate': txtpasportdate,
        'txtCline1': txtCline1, 'txtCline2': txtCline2, 'ddlCCity': ddlCCity, 'txtCCityOther': txtCCityOther, 'txtCZip': txtCZip, 'ddlCCountry': ddlCCountry, 'ddlCState': ddlCState, 'txtCState': txtCState,
        'chkSame': chkSame, 'txtPline1': txtPline1, 'txtPline2': txtPline2, 'ddlPCity': ddlPCity, 'txtPCityOther': txtPCityOther, 'txtPZip': txtPZip, 'ddlPCountry': ddlPCountry, 'ddlPState': ddlPState, 'txtPState': txtPState,
        'strnationality': ddlNationality, 'ASAPCCode': txtASAPCCode,
        'FamilyMember': FamilyMember, 'sFathername': sFathername, 'sFatherAge': sFatherAge, 'sFatherQual': sFatherQual,
        'sFatherEmployeeCategory': sFatherEmployeeCategory, 'sFatherdesig': sFatherdesig, 'sFatherOccupation': sFatherOccupation,
        'sFatherorg': sFatherorg, 'bFatherEmailDoesnothave': bFatherEmailDoesnothave, 'sFatherEmail': sFatherEmail,
        'bFatherMobileDoesnothave': bFatherMobileDoesnothave, 'sFatherMobileNo': sFatherMobileNo, 'sFatherResCountry': sFatherResCountry,
        'sMothername': sMothername, 'sMotherAge': sMotherAge, 'sMotherQual': sMotherQual,
        'sMotherEmployeeCategory': sMotherEmployeeCategory, 'sMotherdesig': sMotherdesig, 'sMotherOccupation': sMotherOccupation,
        'sMotherorg': sMotherorg, 'bMotherEmailDoesnothave': bMotherEmailDoesnothave, 'sMotherEmail': sMotherEmail,
        'bMotherMobileDoesnothave': bMotherMobileDoesnothave, 'sMotherMobileNO': sMotherMobileNO, 'sMotherResCountry': sMotherResCountry,
        'sFamilyAtAmity': FamilyMember, 'sFamilyMemberName': sFamilyMemberName, 'sFamilyRelInst': sFamilyRelInst,
        'sFamilyProgramDesignation': sFamilyProgramDesignation, 'iDurationYear': iDurationYear, 'iDurationTo': iDurationTo,
        'sRelation': sRelation, 'sFatherCountryCode': sFatherCountryCode, 'sMotherCountryCode': sMotherCountryCode, 'rblSummerSchool': rblSummerSchool, 'iSummerSchoolYear': iSummerSchoolYear, 'rblKEA': rblKEA,
        'sKEA_SubCast': sKEA_SubCast, 'sKEA_AdmOrderNo': sKEA_AdmOrderNo, 'bFDeceased':bFDeceased, 'bMDeceased':bMDeceased, 'bFSingle':bFSingle, 'bMSingle':bMSingle
    };
    $.ajax({
        type: "POST",
        url: 'SavePersonalDetail',
        data: para,
        dataType: 'json',
        async: true,
        success: function (response) {
            if (response == 'Done') {
                LeadSquareRequest(UserGenNo, 'Form Started: Personal Details Filled');
                //swal({ title: "Personal Details Saved", type: "success", closeOnConfirm: true },
                //    function () {
                //        //window.location.href = "EducationDetail?UID=" + UserGenNo;
                //        bindStepWiseURL(sURL);
                //    })

                setTimeout(function () {
                    swal({ title: "Personal Details Saved", type: "success", closeOnConfirm: false }, function () {


                        bindStepWiseURL(sURL);
                    })
                }, 1000)
            }
            else {
                swal("Personal Detail Not Saved");
            }
        },
        error: OnError
    });
}


function validatePersonal() {
      debugger;
    var FName = $("#txtFName").val();
    var FQuali = $("#ddrpFQuali").val();
    var FProf = $("#txtFProfession").val();
    var Forg = $("#txtFOrganisation").val();
    var Fdesg = $("#txtFDesignation").val();
    var FResCtry = $("#ddlFCountryres").val();
    var MName = $("#txtMName").val();
    var MQuali = $("#ddrpMQuali").val();
    var MProf = $("#txtMProfession").val();
    var Morg = $("#txtMorganisation").val();
    var Mdesg = $("#txtMdesignation").val();
    var MResCtry = $("#ddlMCountryres").val();

    var bFDeceased = $("#hidFDeceased").val();
    var bMDeceased = $("#hidMDeceased").val();
    var bFSingle = $("#hidFSingle").val();
    var bMSingle = $("#hidMSingle").val();

    var FatherDetailCheck="0";
    var MotherDetailCheck="0";
    if (bFDeceased="1")
    {
        FatherDetailCheck=0
    }
    else if (bFSingle="1")
    {
        FatherDetailCheck=1
        MotherDetailCheck=0
    }

    if (bMDeceased="1")
    {
        MotherDetailCheck=0
    }
    else if (bMSingle="1")
    {
        MotherDetailCheck=1
        FatherDetailCheck=0
    }

    if (FName == "" && FatherDetailCheck=="1")  { swal("Please Fill Father Name"); return false; }
    else if ((MName == null || MName == "") && MotherDetailCheck=="1") { swal("Please Fill Mother Name"); return false; }        
    else { return true; }
}


/* Save educationdetail details*/

function SaveEducationdt(sURL) {
    
    
  
    if ($("#Educationform").valid()) {

      
        var iformno = $("#iFormNo").val();
        var IFSProgram = $("#hfsIFSProgram").val();
        var bCertificateProgram = $("#hfsCertificateProgram").val();
        var sType = isEmpty($("#sType").val());
        var sDiplomaType = isEmpty($("#sDiplomaType").val());
        var bPrequal = isEmpty($("#bPrequal").val());
        var bBarch = $("#bBarch").val();
        var bAmityJEE = $("#bAmityJEE").val();
        var iGenericId = $("#iGenericId").val();

        var rblMatScore = isEmpty($('input[type=radio][name=rblMat]:checked').val());
        var txtMatFormNo = isEmpty($("#txtMatFormNo").val());
        var txtMatDateofTest = isEmpty($("#txtMatDateofTest").val());
        var txtMatRollID = isEmpty($("#txtMatRollID").val());
        var txtMatScore = isEmpty($("#txtMatScore").val());
        var txtMatPercentile = isEmpty($("#txtMatPercentile").val());
        var txtExamValidUpTo = isEmpty($("#txtExamValidUpTo").val());
        var drpPreSLE = $("#drpPreSLE").val();



        // // debugger;

        var rblXBoardList = isEmpty($('input[type=radio][name=rblXBoard]:checked').val());
        var drpXPassYear = isEmpty($("#drpXPassYear").val());
        var txtXAvg = isEmpty($("#txtXAvg").val());
        var txtXSchool = isEmpty($("#txtXSchool").val());
        var txtXBoardName = isEmpty($("#drpXBoardName").val());
        if (txtXBoardName == "") {
            var txtXBoardName = isEmpty($("#txtXBoardName").val());
        }
        var txtXCity = isEmpty($("#txtXCity").val());
        var txtXPin = isEmpty($("#txtXPin").val());
        var rblXMarkType = isEmpty($("#XMarkSystem").val());
        var drpXMediumofinstruction = isEmpty($("#drpXMediumofinstruction").val());
        var txtXMediumofInstruction = isEmpty($("#txtXMediumofInstruction").val());
        var txtXthBoardRollNo = isEmpty($("#txtXBoardRollNo").val());
        var txtXSchoolCode = isEmpty($("#txtXSchoolCode").val());

        /*XIIth Mark Details*/
        var txtXIICity = isEmpty($("#txtXIICity").val());
        var txtXIISchool = isEmpty($("#txtXIISchool").val());
        var txtSchoolCode = isEmpty($("#txtSchoolCode").val());
        var txtCenterCode = isEmpty($("#txtCenterCode").val());

        var rblXIIBoardList = isEmpty($('input[type=radio][name=rblXIIBoard]:checked').val());
        var ddlXIIPassingYear = isEmpty($("#drpXIIPassingYear").val());
        var rblXIIMediumofinstruction = isEmpty($("#drpXIIMediumofinstruction").val());
        var txtXIIMediumofInstruction = isEmpty($("#txtXIIMediumofInstruction").val());
        //var txtXIIPin = $("#txtXIIPin").val();
        var txtXIIBoardName = isEmpty($("#txtXIIBoardName").val());
        var txtXIIBoardRollNo = isEmpty($("#txtXIIBoardRollNo").val());
        var txtXIIAdmitCardNo = isEmpty($("#txtXIIAdmitCardNo").val());
        var rblXIIResultDeclare = isEmpty($('input[type=radio][name=rblXIIResultDeclare]:checked').val());
        if (sType == "PG") {
            rblXIIResultDeclare = "0";
        }
        var rblXIIMarkType = isEmpty($("#XIIMarkSystem").val());

        var hfsFormType = isEmpty($('#hfsFormType').val());
        var hfsDipFormId = isEmpty($('#hfsDipFormId').val());

        var txtDipDegreeName = isEmpty($("#txtDipDegreeName").val());
        var txtDipEnrollmentNo = isEmpty($("#txtDipEnrollmentNo").val());
        var rblDipMediumofinstruction = isEmpty($('input[type=radio][name=rblDipMediumofinstruction]:checked').val());
        var txtDipMediumofInstruction = isEmpty($("#txtDipMediumofInstruction").val());
        var txtDipBranch = isEmpty($("#txtDipSpecialization").val());
        var ddlDipDuration = isEmpty($("#Dipduration").val());
        var rblDipSchemeofexam = isEmpty($('input[type=radio][name=rdoDipSchemeofExam]:checked').val());
        var rblDipDiscipline = isEmpty($('input[type=radio][name=rblDipDiscipline]:checked').val());
        var rblDipModeofStudy = isEmpty($('input[type=radio][name=rblDipModeofStudy]:checked').val());
        var txtDipYearAttendedFrom = isEmpty($("#txtDipFromdate").val());
        var txtDipYearAttendedTo = isEmpty($("#txtDipTodate").val());
        var txtDipCollegeName = isEmpty($("#txtDipcollegeName").val());
        var txtDipCity = isEmpty($("#txtDipCity").val());
        var txtDipUniversityName = isEmpty($("#txtDipuniversityName").val());
        var txtDipPin = isEmpty($("#txtDippincode").val());
        var rblDipMarkType = isEmpty($('input[type=radio][name=rdoDipSemesterYearType]:checked').val());
        var txtDipPointScale = isEmpty($("#txtDipPointScale").val());

        var txtGDegreeName = isEmpty($("#ddlGDegree").val());
        if (txtGDegreeName != "")
        {            
            if (txtGDegreeName.toLowerCase() == "other")
            {
                txtGDegreeName = isEmpty($("#txtGDegreeOther").val())
            }
        }

       // var txtGDegreeName = isEmpty($("#txtGDegreeName").val());
        var txtGEnrollmentNo = isEmpty($("#txtGEnrollmentNo").val());
        var rblGMediumofinstruction = isEmpty($('input[type=radio][name=rblGMediumofinstruction]:checked').val());
        var txtGradMediumofInstruction = isEmpty($("#txtGradMediumofInstruction").val());
        var txtGBranch = isEmpty($("#txtGSpecialization").val());
        var ddlGDuration = isEmpty($("#gradduration").val());
        var rblGSchemeofexam = isEmpty($('input[type=radio][name=rdoSchemeofExam]:checked').val());
        var rblGDiscipline = isEmpty($('input[type=radio][name=rblGDiscipline]:checked').val());
        var rblGModeofStudy = isEmpty($('input[type=radio][name=rblGModeofStudy]:checked').val());
        var txtGYearAttendedFrom = isEmpty($("#txtGFromdate").val());
        var txtGYearAttendedTo = isEmpty($("#txtGTodate").val());
        var txtGCollegeName = isEmpty($("#txtGcollegeName").val());
        var txtGCity = isEmpty($("#txtGCity").val());
        var txtGUniversityName = isEmpty($("#txtGuniversityName").val());
        var txtGPin = isEmpty($("#txtGpincode").val());
        var rblGMarkType = isEmpty($('input[type=radio][name=rdoGradSemesterYearType]:checked').val());
        var txtGradePointScale = isEmpty($("#txtGradePointScale").val());
        var iLFormTypeId = isEmpty($("#hfsDipFormId").val());

        var txtPGDegreeName = isEmpty($("#ddlPGDegree").val());
        if (txtPGDegreeName != "") {
            
            if (txtPGDegreeName.toLowerCase() == "other") {
                txtPGDegreeName = isEmpty($("#txtPGDegreeOther").val())
            }
        }
       
       // var txtPGDegreeName = isEmpty($("#txtPGDegreeName").val());
        var rblPGMediumofInstruction = isEmpty($('input[type=radio][name=rblPGMediumofInstruction]:checked').val());
        var txtPGMediumofInstruction = isEmpty($("#txtPGMediumofInstruction").val());
        var txtPGBranch = isEmpty($("#txtPGSpecialization").val());
        var ddlPGDuration = isEmpty($("#pgduration").val());
        var rblPGDiscipline = isEmpty($('input[type=radio][name=rblPGDiscipline]:checked').val());
        //alert(rblPGDiscipline);
        var rblPGModeofStudy = isEmpty($('input[type=radio][name=rblPGModeofStudy]:checked').val());
        var rblPGSchemeofExam = isEmpty($('input[type=radio][name=rdoPGSchemeofExam]:checked').val());
        var txtPGAttendedFrom = isEmpty($("#txtPGAttendedFrom").val());
        var txtPGAttendedTo = isEmpty($("#txtPGAttendedTo").val());
        var txtPGEnrollmentNo = isEmpty($("#txtPGEnrollmentNo").val());
        var txtPGUniversity = isEmpty($("#txtPGUniversityName").val());
        var txtPGCollegeName = isEmpty($("#txtPGcollegeName").val());
        var txtPGCity = isEmpty($("#txtPGCity").val());
        var rblPGMarkType = isEmpty($('input[type=radio][name=rdoPGSemesterYearType]:checked').val());
        var txtPGGradePointScale = isEmpty($("#txtPGGradePointScale").val());

        var XMarkArray = isEmpty(JSON.stringify(getXMarks()));
        var XIIMarkArray = isEmpty(JSON.stringify(getXIIMarks()));
        var DipMarkArray = isEmpty(JSON.stringify(getDiplomaMarks()));
        var GMarkArray = isEmpty(JSON.stringify(getGradMarks()));
        var PGMarkArray = isEmpty(JSON.stringify(getPGMarks()));
        var CUTEMarksArray = isEmpty(JSON.stringify(getCuteSubjectMarks()));

        var chkMat3 = $("#chkMat3").is(":checked");
        var chkMat9 = $("#chkMat9").is(":checked");
        var chkMat10 = $("#chkMat10").is(":checked");
        var hfiCoursecode = $('#hfiCoursecode').val();

        var txtNataFormNo = isEmpty($('#txtNataFormNo').val());
        var txtNataApptitudeScore = isEmpty($('#txtNataApptitudeScore').val());
        var txtNataMathScore = isEmpty($('#txtNataMathScore').val());
        var txtNataDrawingScore = isEmpty($('#txtNataDrawingScore').val());
        var txtNataTotalScore = isEmpty($('#txtNataTotalScore').val());
        var txtNataExamYear = isEmpty($('#txtNataExamYear').val());

        var txtJeeMainsFormNo = isEmpty($('#txtJeeMainsFormNo').val());
        var txtJeeMainsApptitudeScore = isEmpty($('#txtJeeMainsApptitudeScore').val());
        var txtJeeMainsMathScore = isEmpty($('#txtJeeMainsMathScore').val());
        var txtJeeMainsDrawingScore = isEmpty($('#txtJeeMainsDrawingScore').val());
        var txtJeeMainsTotalScore = isEmpty($('#txtJeeMainsTotalScore').val());
        var txtJeeMainsExamYear = isEmpty($('#txtJeeMainsExamYear').val());

        var txtUPSEEFormNo = isEmpty($('#txtUPSEEFormNo').val());
        var txtUPSEEMathScore = isEmpty($('#txtUPSEEMathScore').val());
        var txtUPSEEDrawingScore = isEmpty($('#txtUPSEEDrawingScore').val());
        var txtUPSEETotalScore = isEmpty($('#txtUPSEETotalScore').val());
        var txtUPSEEExamYear = isEmpty($('#txtUPSEEExamYear').val());


        var chkBtech13 = $("#chkBtech13").is(":checked");
        var txtJeemainsP1ApplicationNo = isEmpty($('#txtJeemainsP1ApplicationNo').val());
        var txtjeemainsP1RollNo1 = isEmpty($('#txtjeemainsP1RollNo1').val());
        var txtjeemainsP1RollNo2 = isEmpty($('#txtjeemainsP1RollNo2').val());
        var txtjeemainsP1Physics = isEmpty($('#txtjeemainsP1Physics').val());
        var txtjeemainsP1Chemistry = isEmpty($('#txtjeemainsP1Chemistry').val());
        var txtjeemainsP1Mathematics = isEmpty($('#txtjeemainsP1Mathematics').val());
        var txtjeemainsP1Total = isEmpty($('#txtjeemainsP1Total').val());
        var txtjeemainsP1ExamYear = isEmpty($('#txtjeemainsP1ExamYear').val());
        var txtjeemainsP1ExamDate = isEmpty($('#txtjeemainsP1ExamDate').val());

        var chkLaw12 = $("#chkLaw12").is(":checked");
        var txtCLATApplicationNo = isEmpty($('#txtCLATApplicationNo').val());
        var txtCLATRollNo1 = isEmpty($('#txtCLATRollNo1').val());
        var txtCLATTotal = isEmpty($('#txtCLATTotal').val());
        var txtCLATRank = isEmpty($('#txtCLATRank').val());
        var txtCLATExamYear = isEmpty($('#txtCLATExamYear').val());

        var Ischkcute = $('#chkcute').is(":checked");

      


        if (iformno == "") { swal("Please Reloade the Page"); return false; }
            //PreQualifying exam detail
            //    else if (bPrequal == "1" && rblMatScore == "") { swal("Please Select Score for "); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtMatFormNo == "") { swal("Please enter PreQualifying Form No"); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtMatDateofTest == "") { swal("Please Enter Date Of Test "); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtMatRollID == "") { swal("Please enter PreQualifying Roll no "); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtMatScore == "") { swal("Please enter PreQualifying Score  "); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtMatPercentile == "") { swal("Please enter PreQualifying Percentile  "); return false; }
            //    else if (bPrequal == "1" && rblMatScore != "99" && txtExamValidUpTo == "") { swal("Please enter PreQualifying Valid Up To  "); return false; }
            //X th exam detail


        else if (chkMat3 == true && txtNataFormNo == "") { swal("Please enter Nata Application form no "); return false; }
        else if (chkMat3 == true && txtNataApptitudeScore == "") { swal("Please enter Nata Apptitude Score "); return false; }
            //else if (chkMat3 == true && txtNataMathScore == "") { swal("Please enter Nata Maths Score "); return false; }
            //else if (chkMat3 == true && txtNataDrawingScore == "") { swal("Please enter Nata Drawing Score "); return false; }
        else if (chkMat3 == true && txtNataTotalScore == "") { swal("Please enter Nata Total Score "); return false; }
        else if (chkMat3 == true && txtNataExamYear == "") { swal("Please enter Nata Exam Year "); return false; }

        else if (chkMat9 == true && txtJeeMainsFormNo == "") { swal("Please enter Jee Main Roll No "); return false; }
        else if (chkMat9 == true && txtJeeMainsApptitudeScore == "") { swal("Please enter Jee Apptitude Score"); return false; }
        else if (chkMat9 == true && txtJeeMainsMathScore == "") { swal("Please enter Jee Main Maths Score "); return false; }
        else if (chkMat9 == true && txtJeeMainsDrawingScore == "") { swal("Please enter Jee Main Drawing Score "); return false; }
        else if (chkMat9 == true && txtJeeMainsTotalScore == "") { swal("Please enter Jee Main Total Score "); return false; }
        else if (chkMat9 == true && txtJeeMainsExamYear == "") { swal("Please enter Jee Main Exam Year "); return false; }

        else if (chkMat10 == true && txtUPSEEFormNo == "") { swal("Please enter UPSEE Roll No "); return false; }
        else if (chkMat10 == true && txtUPSEEMathScore == "") { swal("Please enter UPSEE Maths and Apptitude Score "); return false; }
        else if (chkMat10 == true && txtUPSEEDrawingScore == "") { swal("Please enter UPSEE Drawing Score "); return false; }
        else if (chkMat10 == true && txtUPSEETotalScore == "") { swal("Please enter UPSEE Total Score "); return false; }
        else if (chkMat10 == true && txtUPSEEExamYear == "") { swal("Please enter UPSEE Exam Year "); return false; }

        else if (chkBtech13 == true && txtJeemainsP1ApplicationNo == "") { swal("Please enter Jee Mains Paper I Application No"); return false; }
        else if (chkBtech13 == true && txtjeemainsP1Physics == "") { swal("Please enter Jee Mains Paper I Physics Score "); return false; }
        else if (chkBtech13 == true && txtjeemainsP1Chemistry == "") { swal("Please enter Jee Mains Paper I Chemistry Score "); return false; }
        else if (chkBtech13 == true && txtjeemainsP1Mathematics == "") { swal("Please enter Jee Mains Paper I Mathematics Score"); return false; }
        else if (chkBtech13 == true && txtjeemainsP1Total == "") { swal("Please enter Jee Mains Paper I Total Score"); return false; }
        else if (chkBtech13 == true && txtjeemainsP1ExamYear == "") { swal("Please enter Jee Mains Paper I Exam Year "); return false; }
        else if (chkBtech13 == true && txtjeemainsP1ExamDate == "") { swal("Please enter Jee Mains Paper I Exam Date "); return false; }

        else if (chkLaw12 == true && txtCLATApplicationNo == "") { swal("Please CLAT Application No"); return false; }
        else if (chkLaw12 == true && txtCLATRollNo1 == "") { swal("Please enter CLAT Roll No "); return false; }
        else if (chkLaw12 == true && txtCLATTotal == "") { swal("Please enter CLAT Total Score "); return false; }
        else if (chkLaw12 == true && txtCLATRank == "") { swal("Please enter CLAT Rank"); return false; }
        else if (chkLaw12 == true && txtCLATExamYear == "") { swal("Please enter CLAT Exam Year "); return false; }

        else if (rblXBoardList == "") { swal("Please Select Xth Board"); return false; }

        else if (txtXSchool == "" && sDiplomaType == "X") { swal("Please enter Xth School Name"); return false; }
        else if (txtXBoardName == "" && sDiplomaType == "X") { swal("Please enter Xth Board Name"); return false; }
        else if (txtXBoardName == "" && rblXBoardList != "CBSE" && rblXBoardList != "ISC" && sDiplomaType != "X") { swal("Please enter Xth Board Name"); return false; }
        else if (txtXCity == "" && sDiplomaType == "X") { swal("Please enter Xth Board City"); return false; }
        else if (txtXPin == "" && sDiplomaType == "X") { swal("Please enter Xth Board Pin No"); return false; }
        else if (txtXBoardRollNo == "") { swal("Please enter Xth Board Roll No"); return false; }
        else if (drpXPassYear == "0") { swal("Please Select Xth Passing Year"); return false; }
        else if (sType != "PG" && rblXBoardList == "CBSE" && drpXPassYear >= 2017 && txtXSchoolCode == "") { swal("Please enter X school code"); return false; }
        else if (XMarkSystem == "" && sDiplomaType == "X") { swal("Please select Xth Mark System"); return false; }
        else if ((drpXMediumofinstruction == "" || drpXMediumofinstruction == "0") && sDiplomaType == "X") { swal("Please Select Xth Medium of instruction"); return false; }
        else if (sDiplomaType == "X" && txtXMediumofInstruction == "Others" && txtXMediumofInstruction == "") { swal("Please enter Xth Medium of instruction"); return false; }
        else if (txtXAvg == "") { swal("Please enter Xth Aggregate Percentage"); return false; }
            //XII th exam detail
        else if (sDiplomaType != "X" && rblXIIBoardList == "" && hfsDipFormId != "1" && hfsDipFormId != "2") { swal("Please Select XIIth Board"); return false; }
            // else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && sType != "PG" && rblXIIBoardList == "CBSE" && txtSchoolCode == "") { swal("Please enter XII school code"); return false; }
            // else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && sType != "PG" && rblXIIBoardList == "CBSE" && txtCenterCode == "") { swal("Please enter XII center code"); return false; }
            // else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && sType != "PG" && rblXIIBoardList == "CBSE" && txtXIIAdmitCardNo == "") { swal("Please enter XII Admit card No"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && ddlXIIPassingYear == "") { swal("Please Select XIIth Passing Year"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && rblXIIMediumofinstruction == "" || rblXIIMediumofinstruction == "0") { swal("Please Select XIIth Medium of instruction"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && rblXIIMediumofinstruction == "Others" && txtXIIMediumofInstruction == "") { swal("Please enter XIIth Medium of instruction"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && txtXIISchool == "") { swal("Please enter XIIth School"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && txtXIICity == "") { swal("Please enter XIIth City"); return false; }
            //else if (sDiplomaType != "X" && txtXIIPin == "") { swal("Please enter XIIth Pin / Zip Code"); return false; }
            //  else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && txtXIIBoardName == "") { swal("Please enter XIIth Board Name"); return false; }
            // else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && txtXIIBoardRollNo == "") { swal("Please enter XIIth Board Roll No"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && rblXIIResultDeclare == "") { swal("Please Select XIIth Results Declared Or Not"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && rblXIIMarkType == "") { swal("Please Select XIIth Mark System"); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && XIIMarkArray == "") { swal("Please Fill XII Board Result Details "); return false; }
        else if (sDiplomaType != "X" && hfsDipFormId != "1" && hfsDipFormId != "2" && getXIIMarks().length < 4) { swal("Please fill English plus minimum THREE academic subjects as in class \n XII mark sheet"); return false; }

            //var hfsFormType = $('#hfsFormType').val();
            //var hfsDipFormId = $('#hfsDipFormId').val();

            // Diploma details
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipDegreeName == "") { swal("Please Fill Diploma Name"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipEnrollmentNo == "") { swal("Please Fill Diploma Enrollment No"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipMediumofinstruction == "" || rblGMediumofinstruction == "0") { swal("Please Select Diploma Medium of instruction"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipMediumofinstruction == "Others" && txtGradMediumofInstruction == "") { swal("Please enter Diploma Medium of instruction"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && ddlDipDuration == "") { swal("Please select Diploma Duration of Degree"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipSchemeofexam == "") { swal("Please select Diploma Scheme of exam"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipDiscipline == "") { swal("Please select Diploma Discipline"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipModeofStudy == "") { swal("Please select Diploma Mode of Study"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipYearAttendedFrom == "") { swal("Please enter Diploma Year Attended From"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipYearAttendedTo == "") { swal("Please enter Diploma Year Attended To"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipCollegeName == "") { swal("Please Select Diploma College Name"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipCity == "") { swal("Please Select Diploma City"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipUniversityName == "") { swal("Please enter Diploma University Name"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && txtDipPin == "") { swal("Please enter Diploma City pin"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipMarkType == "") { swal("Please Select Diploma Mark Type"); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && rblDipMarkType == "1" && txtDipPointScale == "") { swal("Please enter Diploma Mark Scale "); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && DipMarkArray == "") { swal("Please Fill Diploma Result Details "); return false; }
        else if (hfsFormType == "ONL" && (hfsDipFormId == "1" || hfsDipFormId == "2") && getDiplomaMarks().length < isEmpty($("#MinDipMarkRow").val())) { swal("Please fill Atleast " + $("#MinDipMarkRow").val() + " records in Diploma Marks Detail "); return false; }



            // G exam detail
        else if (sType == "PG" && txtGDegreeName == "") { swal("Please Fill Graduation Degree Name"); return false; }
        else if (sType == "PG" && txtGEnrollmentNo == "") { swal("Please Fill Graduation Enrollment No"); return false; }
        else if (sType == "PG" && rblGMediumofinstruction == "" || rblGMediumofinstruction == "0") { swal("Please Select Graduation Medium of instruction"); return false; }
        else if (sType == "PG" && rblGMediumofinstruction == "Others" && txtGradMediumofInstruction == "") { swal("Please enter Graduation Medium of instruction"); return false; }
            //  else if (sType == "PG" && txtGBranch == "") { swal("Please enter Graduation Specification"); return false; }
        else if (sType == "PG" && ddlGDuration == "") { swal("Please select Gradution Duration of Degree"); return false; }
        else if (sType == "PG" && rblGSchemeofexam == "") { swal("Please select Gradution Scheme of exam"); return false; }
        else if (sType == "PG" && rblGDiscipline == "") { swal("Please select Gradution Discipline"); return false; }
        else if (sType == "PG" && rblGModeofStudy == "") { swal("Please select Gradution Mode of Study"); return false; }
        else if (sType == "PG" && txtGYearAttendedFrom == "") { swal("Please enter Gradution Year Attended From"); return false; }
        else if (sType == "PG" && txtGYearAttendedTo == "") { swal("Please enter Gradution Year Attended To"); return false; }
        //else if (sType == "PG" && txtGCollegeName == "") { swal("Please Select Gradution College Name"); return false; }
        else if (sType == "PG" && txtGCity == "") { swal("Please Select Gradution City"); return false; }
        else if (sType == "PG" && txtGUniversityName == "") { swal("Please enter Gradution University Name"); return false; }
       // else if (sType == "PG" && txtGPin == "") { swal("Please enter Gradution City pin"); return false; }
        else if (sType == "PG" && rblGMarkType == "") { swal("Please Select Gradution Mark Type"); return false; }
        else if (sType == "PG" && rblGMarkType == "1" && txtGradePointScale == "") { swal("Please enter Gradution Mark Scale "); return false; }
        else if (sType == "PG" && GMarkArray == "") { swal("Please Fill Gradution Result Details "); return false; }
        else if (sType == "PG" && getGradMarks().length < isEmpty($("#MinGMarkRow").val())) { swal("Please fill Atleast " + $("#MinGMarkRow").val() + " records in Graduation Marks Detail "); return false; }

            // PG exam detail
        else if (sType == "PG" && txtPGDegreeName != "" && txtPGEnrollmentNo == "") { swal("Please Fill Post Graduation Enrollment No"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGMediumofInstruction == "" || rblPGMediumofInstruction == "0") { swal("Please Select Post Graduation Medium of instruction"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGMediumofInstruction == "Others" && txtPGMediumofInstruction == "") { swal("Please enter Post Graduation Medium of instruction"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && ddlPGDuration == "") { swal("Please select Post Gradution Duration of Degree"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGDiscipline == "") { swal("Please select Post Gradution Discipline"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGModeofStudy == "") { swal("Please select Post Gradution Mode of Study"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGSchemeofExam == "") { swal("Please select Post Gradution Scheme of exam"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && txtPGAttendedFrom == "") { swal("Please enter Post Gradution Year Attended From"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && txtPGAttendedTo == "") { swal("Please enter Post Gradution Year Attended To"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && txtPGUniversity == "") { swal("Please Select Post Gradution College Name"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && txtPGCity == "") { swal("Please Select Post Gradution City"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGMarkType == "") { swal("Please Select Post Gradution Mark Type"); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && rblPGMarkType == "1" && txtPGGradePointScale == "") { swal("Please enter Post Gradution Mark Scale "); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && PGMarkArray == "") { swal("Please Fill Post Gradution Result Details "); return false; }
        else if (sType == "PG" && txtPGDegreeName != "" && getPGMarks().length < isEmpty($("#MinPGMarkRow").val())) { swal("Please fill Atleast " + $("#MinPGMarkRow").val() + " records in Post Gradution Marks Detail "); return false; }

        if (Ischkcute == true) {
            debugger;
            var flag = 0;
            $('.cuteMarks .Marks').each(function () {
                var value = $(this).val();
                if (value == "") {
                    $(this).attr("class", "form-control required Marks");
                    swal("Please enter CUET Percentile Details ");
                    return false;
                }
                if (value > 100 && sType == "G") {

                    flag++;
                }
            });
        }
        if (flag > 0) {
            swal("CUET Percentile can not be greater then 100!");
            return false;
        }
        if (Ischkcute == true && (CUTEMarksArray == '[]' || CUTEMarksArray == "[]")) {
            swal("Please enter CUET Percentile Details ");
            return false;
        }
        else {
            //debugger;
            $("#loderimg").css("display", "block");
            var para = {
                'iformno': iformno, 'rblMatScore': rblMatScore, 'txtMatFormNo': txtMatFormNo, 'txtMatDateofTest': txtMatDateofTest, 'txtMatRollID': txtMatRollID, 'txtMatScore': txtMatScore,
                'txtMatPercentile': txtMatPercentile, 'txtExamValidUpTo': txtExamValidUpTo, 'drpPreSLE': drpPreSLE,
                'rblXBoardList': rblXBoardList, 'txtXSchool': txtXSchool, 'txtXBoardName': txtXBoardName, 'txtXCity': txtXCity, 'txtXPin': txtXPin,
                'rblXMarkType': rblXMarkType, 'txtXBoardRollNo': txtXthBoardRollNo, 'drpXPassYear': drpXPassYear, 'drpXMediumofinstruction': drpXMediumofinstruction, 'txtXMediumofInstruction': txtXMediumofInstruction, 'txtXAvg': txtXAvg,
                'txtXSchoolCode': txtXSchoolCode,

                'txtXIICity': txtXIICity,
                'txtXIISchool': txtXIISchool, 'rblXIIBoardList': rblXIIBoardList, 'txtSchoolCode': txtSchoolCode, 'txtCenterCode': txtCenterCode, 'ddlXIIPassingYear': ddlXIIPassingYear, 'rblXIIMediumofinstruction': rblXIIMediumofinstruction,
                'txtXIIMediumofInstruction': txtXIIMediumofInstruction, 'txtXIIBoardName': txtXIIBoardName, 'txtXIIBoardRollNo': txtXIIBoardRollNo, 'txtXIIAdmitCardNo': txtXIIAdmitCardNo,
                'rblXIIResultDeclare': rblXIIResultDeclare, 'rblXIIMarkType': rblXIIMarkType,


                'txtDipDegreeName': txtDipDegreeName, 'txtDipEnrollmentNo': txtDipEnrollmentNo, 'rblDipMediumofinstruction': rblDipMediumofinstruction, 'txtDipMediumofInstruction': txtDipMediumofInstruction,
                'txtDipBranch': txtDipBranch, 'ddlDipDuration': ddlDipDuration, 'rblDipSchemeofexam': rblDipSchemeofexam, 'rblDipDiscipline': rblDipDiscipline,
                'rblDipModeofStudy': rblDipModeofStudy, 'txtDipYearAttendedFrom': txtDipYearAttendedFrom, 'txtDipYearAttendedTo': txtDipYearAttendedTo, 'txtDipCollegeName': txtDipCollegeName,
                'txtDipCity': txtDipCity, 'txtDipUniversityName': txtDipUniversityName, 'txtDipPin': txtDipPin, 'rblDipMarkType': rblDipMarkType, 'txtDipPointScale': txtDipPointScale, 'iLFormTypeId': iLFormTypeId,

                'txtGDegreeName': txtGDegreeName, 'txtGEnrollmentNo': txtGEnrollmentNo, 'rblGMediumofinstruction': rblGMediumofinstruction, 'txtGradMediumofInstruction': txtGradMediumofInstruction,
                'txtGBranch': txtGBranch, 'ddlGDuration': ddlGDuration, 'rblGSchemeofexam': rblGSchemeofexam, 'rblGDiscipline': rblGDiscipline,
                'rblGModeofStudy': rblGModeofStudy, 'txtGYearAttendedFrom': txtGYearAttendedFrom, 'txtGYearAttendedTo': txtGYearAttendedTo, 'txtGCollegeName': txtGCollegeName,
                'txtGCity': txtGCity, 'txtGUniversityName': txtGUniversityName, 'txtGPin': txtGPin, 'rblGMarkType': rblGMarkType, 'txtGradePointScale': txtGradePointScale,

                'txtPGDegreeName': txtPGDegreeName, 'rblPGMediumofInstruction': rblPGMediumofInstruction, 'txtPGMediumofInstruction': txtPGMediumofInstruction, 'txtPGBranch': txtPGBranch,
                'ddlPGDuration': ddlPGDuration, 'rblPGSchemeofExam': rblPGSchemeofExam, 'txtPGAttendedFrom': txtPGAttendedFrom, 'txtPGAttendedTo': txtPGAttendedTo,
                'txtPGEnrollmentNo': txtPGEnrollmentNo, 'txtPGUniversity': txtPGUniversity, 'txtPGCollegeName': txtPGCollegeName, 'txtPGCity': txtPGCity, 'rblPGDiscipline': rblPGDiscipline, 'rblPGModeofStudy': rblPGModeofStudy,
                'rblPGMarkType': rblPGMarkType, 'txtPGGradePointScale': txtPGGradePointScale, 'IFSProgram': IFSProgram, 'bCertificateProgram': bCertificateProgram,

                'sType': sType, 'bPrequal': bPrequal, 'bBarch': bBarch, 'bAmityJEE': bAmityJEE, 'iGenericId': iGenericId,

                'txtNataFormNo': txtNataFormNo, "txtNataApptitudeScore": txtNataApptitudeScore, 'txtNataMathScore': txtNataMathScore, 'txtNataDrawingScore': txtNataDrawingScore, 'txtNataTotalScore': txtNataTotalScore, 'txtNataExamYear': txtNataExamYear,
                'txtJeeMainsFormNo': txtJeeMainsFormNo, "txtJeeMainsApptitudeScore": txtJeeMainsApptitudeScore, 'txtJeeMainsMathScore': txtJeeMainsMathScore, 'txtJeeMainsDrawingScore': txtJeeMainsDrawingScore, 'txtJeeMainsTotalScore': txtJeeMainsTotalScore, 'txtJeeMainsExamYear': txtJeeMainsExamYear,
                'txtUPSEEFormNo': txtUPSEEFormNo, 'txtUPSEEMathScore': txtUPSEEMathScore, 'txtUPSEEDrawingScore': txtUPSEEDrawingScore, 'txtUPSEETotalScore': txtUPSEETotalScore, 'txtUPSEEExamYear': txtUPSEEExamYear,

                'txtJeemainsP1ApplicationNo': txtJeemainsP1ApplicationNo, 'txtjeemainsP1RollNo1': txtjeemainsP1RollNo1, 'txtjeemainsP1RollNo2': txtjeemainsP1RollNo2, 'txtjeemainsP1ExamDate': txtjeemainsP1ExamDate,
                'txtjeemainsP1Physics': txtjeemainsP1Physics, 'txtjeemainsP1Chemistry': txtjeemainsP1Chemistry, 'txtjeemainsP1Mathematics': txtjeemainsP1Mathematics,
                'txtjeemainsP1Total': txtjeemainsP1Total, 'txtjeemainsP1ExamYear': txtjeemainsP1ExamYear,

                'txtCLATApplicationNo': txtCLATApplicationNo, 'txtCLATRollNo1': txtCLATRollNo1, 'txtCLATTotal': txtCLATTotal, 'txtCLATRank': txtCLATRank, 'txtCLATExamYear': txtCLATExamYear,

                'XMarkArray': XMarkArray, 'XIIMarkArray': XIIMarkArray, 'DipMarkArray': DipMarkArray, 'GMarkArray': GMarkArray, 'PGMarkArray': PGMarkArray, 'CUTEMarksArray': CUTEMarksArray,
                'Ischkcute': Ischkcute
            };


            $.ajax({
                type: "POST",
                url: 'SaveEducationDetail',
                data: para,
                dataType: 'json',
                async: true,
                success: function (response) {
                    $("#loderimg").css("display", "none");
                    if (response == 'Done') {
                        LeadSquareRequest(GetParameterValues('UID'), 'Form Started: Educational Details Filled');
                        swal(
                            { title: "Education Details Saved", type: "success", closeOnConfirm: true },
                            function () {
                                //var url = window.location.href;
                                //url = url.replace("EducationDetail", "FamilyInformation");
                                //location.replace(url);

                                bindStepWiseURL(sURL);



                            })
                    }
                    else { swal("Education Detail Not Saved"); }
                },
                error: OnError
            });
        }
    }
}


/*save Family info*/
function SaveFamilyInfo(sURL) {

    if ($('#familyform').valid()) {


        var UserGenNo = $('#UserGenno').val();
        var bHostel = isEmpty($('#bHostel').val());
        var rblsuspended = isEmpty($('input[type=radio][name=rblsuspended]:checked').val());
        var ddrpchronic = toTitleCase($('#ddrpchronic').val()) == "Other (please specify)" ? $('#txtchronic_ailment').val() : $('#ddrpchronic').val();
        var rblchronic_ailment = isEmpty($('input[type=radio][name=rblchronic_ailment]:checked').val());
        var ddrpsuspended = $('#ddrpsuspended').val();
        var txtSuspendedDetail = isEmpty($('#txtSuspendedDetail').val());
        var txtAadhaarNo = isEmpty($('#txtAadhaarNo').val());
        var adm_category = isEmpty($('input[type=radio][name=adm_category]:checked').val());
        var Hostel = isEmpty($('input[type=radio][name=radioHostel]:checked').val());
        var HostelType = isEmpty($('input[type=radio][name=radioHostelType]:checked').val());
        var Alumnus = isEmpty($('input[type=radio][name=radioAlumnus]:checked').val());
        var Alumnusdetail = JSON.stringify(getAlumnusdetail());

        if (isEmpty($('#ddlNationality').val()) == "") { swal("Please Select Nationality from Personal detail tab"); return false; }
        else if (adm_category == "") { swal("Please select admission category"); return false; }
        else if (bHostel == "1" && Hostel == "") { swal("Please select hostel option"); return false; }
        else if (bHostel == "1" && Hostel == "1" && HostelType == "") { swal("Please select hostel type option"); return false; }
        {
            var para = {
                "UserGenNo": UserGenNo,
                "rblsuspended": rblsuspended, "txtsuspended": ddrpsuspended, "SuspendedDetail": txtSuspendedDetail,
                "rblchronic_ailment": rblchronic_ailment, "txtchronic_ailment": ddrpchronic,
                "txtAadhaarNo": txtAadhaarNo, 'adm_category': adm_category, 'Hostel': Hostel, 'HostelType': HostelType,
                "Alumnus": Alumnus, "Alumnusdetail": Alumnusdetail
            };
            $.ajax({
                type: "POST",
                url: 'SaveFamilyInformation',
                data: para,
                dataType: 'json',
                async: true,
                success: function (response) {
                    if (response == 'Done') {
                        LeadSquareRequest(UserGenNo, 'Form Started: Other Details Filled');
                        swal(
                            { title: "Other information has been Updated..", type: "success", closeOnConfirm: true },
                            function () {
                                var url = window.location.href;
                                //url = url.replace("FamilyInformation", "OtherInformation");
                                bindStepWiseURL(sURL);
                            })
                    }
                    else { swal("Other information Not Updated.."); }

                },
                error: OnError
            })
        }
    }
}


/*
function OtherInfoSave(sURL) {
    if ($('#OtherInformationform').valid()) {
        var txtNameofAward1 = $('#txtNameofAward1').val();
        var txtDateofaward1 = $('#txtDateofaward1').val();
        var txtForWhat1 = $('#txtForWhat1').val();
        var txtNameofAward2 = $('#txtNameofAward2').val();
        var txtDateofaward2 = $('#txtDateofaward2').val();
        var txtForWhat2 = $('#txtForWhat2').val();
        //var WorkExp = $('input[type=radio][name=radioEg]:checked').val() == undefined ? "" : $('input[type=radio][name=radioEg]:checked').val()
        var WorkExp = isEmpty($('input[type=radio][name=radioEg]:checked').val());

        //  var txtExpYear = $('#txtExpYear').val();
        //  var txtExpMonth = $('#txtExpMonth').val();
        var txtLastSalary = isEmpty($('#txtLastSalary').val());
        // var JobType = $('input[type=radio][name=radioEgFTPT]:checked').val();
        var JobType = isEmpty($('input[type=radio][name=radioEgFTPT]:checked').val());

        var txtOrganisation = isEmpty($('#txtOrganisation').val());
        var txtDesignation = isEmpty($('#txtDesignation').val());
        var txtempfromdate = isEmpty($('#txtempfromdate').val());
        var txtempTodate = isEmpty($('#txtempTodate').val());
        var radioPrevApplied = isEmpty($('input[type=radio][name=radioPrevApplied]:checked').val());

        var txtPreviousFormNo = isEmpty($('#txtPreviousFormNo').val());
        var txtPreviousYear = isEmpty($('#txtPreviousYear').val());
        var radioPreviousAppliedSelected = isEmpty($('input[type=radio][name=radioPreviousAppliedSelected]:checked').val());

        // alert(WorkExp);

        var iFormno = $("#iFormno").val();
        var iExistingFormno = $("#iExistingFormno").val();


        var UserGenNo = $('#UserGenno').val();
        if (WorkExp == "") { swal("Please select Work Experience option"); return false; }
        else if (WorkExp == "1" && JobType == "") { swal("Please Select Full Time / Part Time Job"); return false; }
        else if (WorkExp == "1" && txtempfromdate == "") { swal("Please Fill From date"); return false; }
        else if (WorkExp == "1" && txtempTodate == "") { swal("Please Fill To date"); return false; }
        else if (WorkExp == "1" && txtOrganisation == "") { swal("Please Fill Organisation Name"); return false; }
        else if (WorkExp == "1" && txtDesignation == "") { swal("Please Fill Designation Name"); return false; }
        else if (WorkExp == "1" && txtLastSalary == "") { swal("Please Fill Last Salary"); return false; }
        else if (WorkExp == "1" && (process(txtempfromdate) > process(txtempTodate))) { swal("Work Experience To date=" + txtempTodate + " must be after From date=" + txtempfromdate + ""); return false; }
        else if (radioPrevApplied == "") { swal("Please select Previous Applied Option"); return false; }
        else if (radioPrevApplied == "1" && txtPreviousFormNo == "") { swal("Please Fill Previous formno"); return false; }
        else if (radioPrevApplied == "1" && txtPreviousYear == "") { swal("Please Fill previous year"); return false; }
        else if (radioPrevApplied == "1" && radioPreviousAppliedSelected == "") { swal("Please select Previous selection Option"); return false; }
        else {
            //return false;
            $.ajax({
                type: "POST",
                url: 'SaveOtherInformation',
                data: {
                    "txtNameofAward1": txtNameofAward1, "txtDateofaward1": txtDateofaward1, "txtForWhat1": txtForWhat1,
                    "txtNameofAward2": txtNameofAward2, "txtDateofaward2": txtDateofaward2, "txtForWhat2": txtForWhat2,
                    "WorkExp": WorkExp, "txtLastSalary": txtLastSalary, "JobType": JobType, "txtOrganisation": txtOrganisation,
                    "txtDesignation": txtDesignation, "txtempfromdate": txtempfromdate, "txtempTodate": txtempTodate,
                    "radioPrevApplied": radioPrevApplied, "txtPreviousFormNo": txtPreviousFormNo, "txtPreviousYear": txtPreviousYear,
                    "radioPreviousAppliedSelected": radioPreviousAppliedSelected, "UID": UserGenNo, "iFormno": iFormno, "iExistingFormno": iExistingFormno
                },
                dataType: 'json',
                async: true,
                success: function (response) {
                    if (response == 'Done') {
                        LeadSquareRequest(UserGenNo, 'Form Started: Extra-Curricular Details');
                        swal({ title: "Data Saved Successfully", type: "success", closeOnConfirm: false }, function () {
                            //var url = window.location.href;
                            //url = url.replace("OtherInformation", "UploadeDocs");
                            bindStepWiseURL(sURL);
                        })
                    }
                    else { swal("Data Not Saved Successfully"); }

                },
                error: OnError
            });
        }
    }
}
*/


//Added By Himanshu 21122023
function getAward() {
    debugger
    var chartDataArray = [];
    var flag = true;
    ($('#resultDivAchivement .appendedDiv')).each(function () {
        debugger
        var txtDateofaward = $($($(this).find('.Date'))[0]).val();
        var txtNameofAward = $($($(this).find('.AchType'))[0]).text();
        var txtForWhat = $($($(this).find('.AchBrief'))[0]).text();
        var txtlevel = $($($(this).find('.AchLevel'))[0]).text();

        /*var iAwardid = $($(this).find('input[type="hidden"]')).val();*/
        /*iAwardid = iAwardid == undefined ? 0 : iAwardid;*/
        if ((txtNameofAward != "" && txtDateofaward != "" && txtForWhat != "" && txtlevel != "")) {
            var chartData = { 'sNameofAward': txtNameofAward, 'sDateofaward': txtDateofaward, 'sForWhat': txtForWhat, 'AchLevel': txtlevel }; // 'iAwardid': iAwardid,
            chartDataArray.push(chartData);

        }
        else {

            flag = false;
        }

    })
    if (flag == false) {
        return flag;
    }
    else {

        return chartDataArray;
    }

}

function getWorkExperience() {
    debugger
    var chartDataArray = [];
    var flag = true;
    ($('#resultDivWorkExperience .appendedDivWE')).each(function () {
        debugger
        var WorkType = $($($(this).find('.Wtype'))[0]).val();
        var Orgiansiation = $($($(this).find('.CompName'))[0]).text();
        var HiddenWorkDesignation = $($($(this).find('.HiddenWorkDesignation'))[0]).val();
        var FormDate = $($($(this).find('.FDate'))[0]).val();
        var ToDate = $($($(this).find('.TDate'))[0]).val();

        if ((WorkType != "" && Orgiansiation != "" && HiddenWorkDesignation != "" && FormDate != "" && ToDate != "")) {
            var chartData = { 'WorkType': WorkType, 'Orgiansiation': Orgiansiation, 'HiddenWorkDesignation': HiddenWorkDesignation, 'FormDate': FormDate, 'ToDate': ToDate };
            chartDataArray.push(chartData);

        }
        else {

            flag = false;
        }

    })
    if (flag == false) {
        return flag;
    }
    else {

        return chartDataArray;
    }

}

function OtherInfoSave(sURL) {
    if ($('#OtherInformationform').valid()) {
        var UserGenNo = $('#UserGenno').val();
        debugger;
        var formData = new FormData();
        formData.append('iFormno', $('#iFormno').val());
        formData.append('txtAchvWebLink', $('#txtAchvWebLink').val());
        formData.append('UID', $('#UserGenno').val());
        formData.append('myfile', $('#myfile')[0].files[0]);
        formData.append('AwardArray', isEmpty(JSON.stringify(getAward())));
        formData.append('WorkExperienceArray', isEmpty(JSON.stringify(getWorkExperience())));
        formData.append("RadioAchv", $('input[type=radio][name=radioETA]:checked').val());
        formData.append("RadioWE", $('input[type=radio][name=radioEgFTPT]:checked').val());





        $.ajax({
            type: "POST",
            url: 'SaveOtherInformation',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            async: true,
            success: function (response) {
                if (response == 'Done') {
                    LeadSquareRequest(UserGenNo, 'Form Started: Extra-Curricular Details');
                    swal({ title: "Data Saved Successfully", type: "success", closeOnConfirm: false }, function () {
                        bindStepWiseURL(sURL);
                    })
                }
                else { swal("Data Not Saved Successfully"); }

            },
            error: OnError
        });
    }
}
//End

function UploadSave(sURL) {

    if ($('#UploadePhoto').css("display") !== "none" && isEmpty(document.getElementById('FileUploadPhoto').value) == ""
        && isEmpty(document.getElementById('PhotoString').value) == "") {
        swal("Please upload Photo ");
        return false;
        event.preventDefault();
    }

    if ($('#UploadeXmarksheet').css("display") !== "none" && isEmpty(document.getElementById('FileUploadXmarksheet').value) == "") {
        swal("Please upload X marksheet file"); return false; event.preventDefault();
    }

    if ($('#Programtype').val() == "PG") {
        if ($('#UploadeXIImarksheet').css("display") !== "none" && isEmpty(document.getElementById('FileUploadXIImarksheet').value) == "") {
            swal("Please upload XII marksheet file"); return false; event.preventDefault();
        }
    }
    if ($('#UGmarksheet').css("display") !== "none") {
        for (var slno = 1; slno <= $('#countofug').val() ; slno++) {
            var FileUploadUg = document.getElementById('FileUploadUg' + slno);
            if (FileUploadUg != undefined && FileUploadUg != null) {
                if ($('#UploadeUGmarksheet' + slno).css("display") !== "none" && isEmpty(document.getElementById('FileUploadUg' + slno).value) == "") {
                    swal("Please upload UG marksheet " + slno + " file");
                    return false; event.preventDefault();
                }
            }
        }
    }

    if ($('#PGmarksheet').css("display") !== "none") {
        for (var slno = 1; slno <= $('#countofpg').val() ; slno++) {
            var FileUploadPg = document.getElementById('FileUploadPg' + slno);
            if (FileUploadPg != undefined && FileUploadPg != null) {
                if ($('#UploadePGmarksheet' + slno).css("display") !== "none" && isEmpty(document.getElementById('FileUploadPg' + slno).value) == "") {
                    swal("Please upload Pg marksheet " + slno + " file");
                    return false; event.preventDefault();
                }
            }
        }
    }

    if ($('#Dipmarksheet').css("display") !== "none") {
        for (var slno = 1; slno <= $('#countofDip').val() ; slno++) {
            var FileUploadDip = document.getElementById('FileUploadDip' + slno);
            if (FileUploadDip != undefined && FileUploadDip != null) {
                if ($('#UploadeDipmarksheet' + slno).css("display") !== "none" && isEmpty(document.getElementById('FileUploadDip' + slno).value) == "") {
                    swal("Please upload Diploma marksheet " + slno + " file");
                    return false; event.preventDefault();
                }
            }
        }
    }
    if ($('#UploadeCuteImarksheet').css("display") !== "none" && isEmpty(document.getElementById('FileUploadCutemarksheet').value) == "") {
        swal("Please Cuet Marks upload"); return false; event.preventDefault();
    }
    if ($('#UploadePassport').css("display") !== "none" && isEmpty(document.getElementById('FileUploadPassport').value) == "") {
        swal("Please upload Passport"); return false; event.preventDefault();
    }

    if ($('#UploadeNataScorecard').css("display") !== "none" && isEmpty(document.getElementById('FileUploadNataScorecard').value) == "") {
        swal("Please upload Nata Scorecard"); return false; event.preventDefault();
    }

    if ($('#UploadeJeeScorecard').css("display") !== "none" && isEmpty(document.getElementById('FileUploadJeeScorecard').value) == "") {
        swal("Please upload Jee Scorecard"); return false; event.preventDefault();
    }

    if ($('#UploadeUPSEEScorecard').css("display") !== "none" && isEmpty(document.getElementById('FileUploadUPSEEScorecard').value) == "") {
        swal("Please upload UPSEE Scorecard"); return false; event.preventDefault();
    }

    if ($('#UploadeJeeMainsP1Scorecard').css("display") !== "none" && isEmpty(document.getElementById('FileUploadJeeMainsP1Scorecard').value) == "") {
        swal("Please upload Jee Mains Paper I Scorecard"); return false; event.preventDefault();
    }

    if ($('#UploadeCLATScorecard').css("display") !== "none" && isEmpty(document.getElementById('FileUploadCLATScorecard').value) == "") {
        swal("Please upload CLAT Scorecard"); return false; event.preventDefault();
    }
    if ($('#UploadLtDoc').css("display") !== "none" && isEmpty(document.getElementById('FilesemesterLateraldocument').value) == "") {
        swal("Please upload course structure document"); return false; event.preventDefault();
    }
    if ($('#KEA_Certificate').css("display") == "block") {
        var len = $('table .tblEdit tr').length;
        if (len < 1) {
            swal("Please upload at least one KEA document"); return false; event.preventDefault();
        }

    }
    for (var i = 0; i < $('table .tblEdit tr').length; i++) {

        if (!$($($('table .tblEdit tr')[i]).find('input[type="text"]')[0]).prop('readonly')) {

            if ($($($('table .tblEdit tr')[i]).find('input[type="file"]')[0]).val() == "") {
                swal("Please upload KEA document");
                $($($('table .tblEdit tr')[i]).find('input[type="file"]')[0]).focus();
                count++;
                return false; event.preventDefault();

            }
            if ($($($('table .tblEdit tr')[i]).find('input[type="Text"]')[0]).val() == "") {
                swal("Please Enter KEA Caption");
                $($($('table .tblEdit tr')[i]).find('input[type="Text"]')[0]).focus();
                count++;
                return false; event.preventDefault();

            }


        }

    }



    $('#UPDOCForm').submit();
}

function toTitleCase(val) {
    if (val != undefined && val != null && val != "") {
        return val[0].toUpperCase() + val.substr(1).toLowerCase();
    }
    else {
        return '';
    }
}

//function ValidateInput(ValidateArray) {
//    debugger;

//    var txtCandidateName = ValidateArray[0];
//    var txtMobile = ValidateArray[1];
//    var txtCandidateEmail = ValidateArray[2];
//    var ddlNationality = ValidateArray[3];



//    var BoolName = isEmpty(txtCandidateName);
//    var BoolMobile = isEmpty(txtMobile);
//    var BoolEmail = isEmpty(txtCandidateEmail);
//    var BoolddlNationality = isEmpty(ddlNationality)
//    if (BoolName == true) { swal("Please Fill Candidate Name"); return false; }

//    if (txtCountryCode == "") { swal("Please Select Country Code for Mobile"); return false; }
//    if (BoolMobile == true) { swal("Please Fill Mobile No "); return false; }

//    if (BoolMobile == false) {
//        if (txtMobile.length < 10) { swal("Invalid Mobile No."); return false; }
//    }

//    if (BoolEmail == true) {
//        {
//            swal("Please Enter an Valid Email Adreess");
//            return false;
//        }
//        if (BoolEmail == false) {
//            var Emailcheck = IsEmail(txtCandidateEmail);
//            if (Emailcheck == true) { swal("Please Enter an Valid Email Adreess"); return false; }

//        }


//        if (BoolddlNationality == true) { swal("Please Enter an Valid Email Adreess"); return false; }

//    }
function isEmpty(value) {
    var ret = ""
    if (value == null || value == "" || typeof value === "undefined") {
        return ret;
    }
    else {
        ret = value;
        return ret;
    }
}



