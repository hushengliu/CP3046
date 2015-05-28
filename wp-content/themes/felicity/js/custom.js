var script=jQuery.noConflict();
script(document).ready(function($) {					
    $(".imgLiquidFill").imgLiquid();

	// Mobile Nav
	$('#menu-main-navigation').tinyNav({
  		active: 'selected', // String: Set the "active" class
  		header: 'Navigation', // String: Specify text for "header" and show header instead of the active item
  		label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
	});

});
				
var sf=jQuery.noConflict();
	sf(window).load(function(){
    // superFish
    sf('ul.sf-menu').supersubs({
	minWidth:    16, // minimum width of sub-menus in em units
    maxWidth:    40, // maximum width of sub-menus in em units
    extraWidth:  1 // extra width can ensure lines don't sometimes turn over
    })
	.superfish(); // call supersubs first, then superfish
});

