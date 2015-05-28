(function($) {

function HideAll() {
$('#gallery_post, #quote_post, #link_post').css('display', 'none');
}

function checkMetaboxSettings() {
	HideAll(null);

if($('#post-format-gallery').is(":checked")) {
        $('#gallery_post, #postdivrich').css('display', 'block');
    }

else if($('#post-format-quote').is(":checked")) {
        $('#quote_post').css('display', 'block');
        $('#postdivrich').css('display', 'block');
    }

else if($('#post-format-link').is(":checked")) {
        $('#link_post').css('display', 'block');
        $('#postdivrich').css('display', 'block');
    }

else {
	$('#quote_post').css('display', 'none');
	$('#link_post').css('display', 'none');
	$('#gallery_post').css('display', 'none');
	$('#postdivrich').css('display', 'block');
  }
}

checkMetaboxSettings() ;
$('.post-format').change(function () {
checkMetaboxSettings() ;

});
})(jQuery);