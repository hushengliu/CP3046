jQuery( document ).ready( function( $ ) {


$('#sd_portfolio-details').click(function(){
        var isChecked = $('#sd_portfolio-details').is(':checked');
        if(isChecked)
          $('.sd_portfolio-client-name, .sd_portfolio-client-link').show();
        else
    	  $('.sd_portfolio-client-name, .sd_portfolio-client-link').hide();
      });

$('#sd_portfolio-type').change(function() {
	
    if ($('#sd_portfolio-type option:selected').val() == "image") {
        $('.sd_portfolio-slider').show();
        $('.sd_video-type, .sd_video-item').hide();
	
	} else {
		$('#sd_portfolio-type option:selected').val() == "video";
        $('.sd_video-type, .sd_video-item').show();
        $('.sd_portfolio-slider').hide();
	}
	
});

// show and hide sections on page load based off of the currently selected option 
var isChecked = $('#sd_portfolio-details').is(':checked');
        if(isChecked)
          $('.sd_portfolio-client-name, .sd_portfolio-client-link').show();
        else
    	  $('.sd_portfolio-client-name, .sd_portfolio-client-link').hide();

if ($('#sd_portfolio-type option:selected').val() == "image") {
		$('.sd_portfolio-slider').show();
        $('.sd_video-type, .sd_video-item').hide();
};
if ($('#sd_portfolio-type option:selected').val() == "video") {
		$('.sd_portfolio-slider').hide();
        $('.sd_video-type, .sd_video-item').show();
};});
