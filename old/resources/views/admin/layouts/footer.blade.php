<!-- Footer opened -->
<style>
.text-sm{padding: 20px;}
relative z-0 inline-flex shadow-sm rounded-md{display:none;}
</style>
<!-- Footer closed -->


<div class="main-footer">
    <div class="container-fluid pd-t-0-f ht-100p"> Copyright © 2022 </div>
</div> 
<script src="{{ url('js/shorturl.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

<!-- JQUERY JS -->
<!-- <script src="https://scrs.in/admin/assets/plugins/jquery/jquery.min.js"></script>  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.js"></script> -->




<!-- IONICONS JS -->
<script src="https://scrs.in/admin/assets/plugins/ionicons/ionicons.js"></script>

<!-- MOMENT JS -->
<script src="https://scrs.in/admin/assets/plugins/moment/moment.js"></script>

<!-- P-SCROLL JS -->
<script src="https://scrs.in/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://scrs.in/admin/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- SIDEBAR JS -->
<script src="https://scrs.in/admin/assets/plugins/side-menu/sidemenu.js"></script>

<!-- STICKY JS -->
<script src="https://scrs.in/admin/assets/js/sticky.js"></script>

<!-- Chart-circle js -->
<script src="https://scrs.in/admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- RIGHT-SIDEBAR JS -->
<script src="https://scrs.in/admin/assets/plugins/sidebar/sidebar.js"></script>
<script src="https://scrs.in/admin/assets/plugins/sidebar/sidebar-custom.js"></script>


<!-- Internal Chart.Bundle js-->
<script src="https://scrs.in/admin/assets/plugins/chartjs/Chart.bundle.min.js"></script>

<!-- INTERNAL Apexchart js -->
<script src="https://scrs.in/admin/assets/js/apexcharts.js"></script>

<!--Internal Sparkline js -->
<script src="https://scrs.in/admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Moment js -->
<script src="https://scrs.in/admin/assets/plugins/raphael/raphael.min.js"></script>

<!-- Internal Flot js -->
<script src="https://scrs.in/admin/assets/plugins/jquery.flot/jquery.flot.js"></script>
<script src="https://scrs.in/admin/assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
<script src="https://scrs.in/admin/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>

<!-- Rating js-->
<script src="https://scrs.in/admin/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="https://scrs.in/admin/assets/plugins/rating/jquery.barrating.js"></script>

<!--Internal  index js -->
<script src="https://scrs.in/admin/assets/js/index.js"></script>

<!-- Internal Data tables -->
<script src="https://scrs.in/admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="https://scrs.in/admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="https://scrs.in/admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="https://scrs.in/admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>

<!-- INTERNAL Select2 js -->
<script src="https://scrs.in/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="https://scrs.in/admin/assets/js/select2.js"></script>


<!-- EVA-ICONS JS -->
<script src="https://scrs.in/admin/assets/plugins/eva-icons/eva-icons.min.js"></script>

<!-- THEME-COLOR JS -->
<script src="https://scrs.in/admin/assets/js/themecolor.js"></script>

<!-- CUSTOM JS -->

<script src="https://scrs.in/admin/assets/js/custom.js"></script>

<!-- exported JS -->
<script src="https://scrs.in/admin/assets/js/exported.js"></script>

<!-- SWITCHER JS -->
<!-- <script src="https://scrs.in/admin/assets/switcher/js/switcher.js"></script> -->
<style>svg{display:none;}</style>





<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<style>
ul {
  padding:0px;
  margin: 0px;
}
#response {
  padding:10px;
  background-color:#9F9;
  border:2px solid #396;
  margin-bottom:20px;
}
#list li {
  margin: 0 0 3px;
  padding:8px;
  background-color:#333;
  color:#fff;
  list-style: none;
  text-align: center;
}
</style>
<script type="text/javascript">
$(document).ready(function(){   
    function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
  
    $("#response").hide();
  $(function() {
  $("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
      
      // var order = $(this).sortable("serialize") + '&update=update&_token={{ csrf_token() }}'; 
      // $.post('https://scrsold.in/admin/page/pages_order_save', order, function(theResponse){
      //       alert(theResponse);
      //   $("#response").html(theResponse);
      //   $("#response").slideDown('slow');
      //   slideout();
      // });                                
    }                 
    });
  });

}); 
</script>



</body>
</html>





