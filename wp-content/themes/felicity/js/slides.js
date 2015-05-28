var flex=jQuery.noConflict();
flex(window).load(function(){
	flex('.flexslider').flexslider({
		animation: 'slide',
        start: function(slider){
          	flex('body').removeClass('loading');
        }
	});
});