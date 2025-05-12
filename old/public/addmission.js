$(document).ready(function(){
    $('#selector').on('change', function() {
      if ( this.value == 'non-saarc')
      {
        $("#non-saarc").show();
        $("#saarc").hide();
      }
      else if ( this.value == 'saarc')
      {
        $("#saarc").show();
        $("#non-saarc").hide();
      }
    });

    $('#aplying').on('change', function() {
      if ( this.value == 'masters')
      {
        $("#direct_link").show();
        $("#non-saarc").hide();
      }
      else if(this.value == 'PhD')
      {
        $("#php_condidate").show();
        $("#PhD").show();
        $("#all_users").hide();
        $("#direct_link").hide();
      }
    });
});

function permanentNo(){
  $('#permanent').show();
}


function newUser(){
  $('#NewUser').show();
}


function phd_direct() {
  $("#non-saarc").show();
}

function  phd_entrance()
{ 
$("#phd_entrance").show();
$("#non-saarc").hide();
}

function fillMobileCode(code){
$("#ns_mpbile").val('+'+$('#ns_countrycode').val());
}


function BTechProgrammes(){
  $('#btech-programmes').show();
  $('#mtech-programmes').hide();
  $('#master-programmes').hide();
  $('#phd-programmes').hide();
  $("#saarc_div").hide();
  }

  function ShortTermProgrammes(){
    $('#Short-Term').show();
    $('#btech-programmes').hide();
    $('#master-programmes').hide();
    $('#phd-programmes').hide();
    $("#saarc_div").hide();
  }
  
  function MTechProgrammes(){
    $('#mtech-programmes').show();
	$('#Short-Term').hide();
    $('#btech-programmes').hide();
    $('#master-programmes').hide();
    $('#phd-programmes').hide();
    $("#saarc_div").hide();
  }
  

function MasterProgrammes(){
$('#master-programmes').show();
$('#Short-Term').hide();
$('#mtech-programmes').hide();
$('#btech-programmes').hide();
$('#tech-programmes').hide();
$('#phd-programmes').hide();
$("#saarc_div").hide();
}

function PhDProgrammes(){
  $('#phd-programmes').show();
  $("#saarc_div").show();
  $('#Short-Term').hide();
  $('#btech-programmes').hide();
  $('#mtech-programmes').hide();
  $('#master-programmes').hide();
}


function samepermanent(){
$('#permanent').hide();
}

