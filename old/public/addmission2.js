function bachelorPercentage(){
    $('#bachelorGPA').hide()
  }
  function bachelorGPA(){
    $('#bachelorGPA').show();
  }
  
  function PhDPercentage(){
    $('#PhDGPA').hide()
  }
  function PhDGPA(){
    $('#PhDGPA').show();
  }
  
    function NationalFellowshipYes(){
      $('#NationalFellowship').show();
      $('#government-agency').hide();
      $('#residency').hide();
    }
  
    function governmentYes(){
      $('#government-agency').show();
      $('#residency').hide();
      $('#NationalFellowship').hide();
    }
  
    function residencyYes(){
      $('#residency').show();
      $('#government-agency').hide();
      $('#NationalFellowship').hide();
    }
  
  
  $(document).ready(function() {
      var upload_number = 2;
      $('#attachMore').click(function() {
          //add more file
          var moreUploadTag = '';
          
          moreUploadTag += '<div class="col-lg-12 col-sm-12" style="margin-left: -20px;"><label for="upload">Upload a file</label><input type="file" name="files[]" id="upload" accept="image/jpeg,image/png,application/pdf" />';
        //  moreUploadTag += '<input type="file" id="upload_file' + upload_number + '"  name="files[]" />';


          moreUploadTag += '<a href="javascript:del_file(' + upload_number + ')" style="margin-left: 20px;cursor:pointer;" onclick="return confirm("Are you really want to delete ?")">Delete ' + upload_number + '</a>';
          $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl></div>').fadeIn('slow').appendTo('#moreImageUpload');
          upload_number++;
      });
  });
  
  function del_file(eleId) {
      var ele = document.getElementById("delete_file" + eleId);
      ele.parentNode.removeChild(ele);
  }