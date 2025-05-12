function formatState(state) {
    if (!state.id) { return state.text; }
    var $state = $(
      '<span><img src="images/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
};
$(".contact_dropdown").select2({
    templateResult: formatState
});
$(function () {
    $('.select_file input').hide();
    $('.upload_btn').click(function () {
        $(this).siblings('.select_file').find('input').trigger('click');
    });
    $('.form_no a').click(function () {
        $(this).parent().hide();
    });
    $('#startDate').datepicker();
    $('#endDate').datepicker();
 
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
});
