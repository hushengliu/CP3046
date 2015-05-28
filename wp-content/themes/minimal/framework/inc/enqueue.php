<?php
function sd_jquery_scripts() {
	global $sd_data;
	/* ------------------------------------------------------------------------ */
	/* Register jQuery Scripts */
	/* ------------------------------------------------------------------------ */
	wp_register_script('preloader', get_template_directory_uri() . '/framework/js/preloader.js', false, '', true);
	wp_register_script('pretty-photo', get_template_directory_uri() . '/framework/js/prettyphoto.js', false, '', true);
	wp_register_script('superfish', get_template_directory_uri() . '/framework/js/superfish.js', false, '', true);
	wp_register_script('flexslider', get_template_directory_uri() . '/framework/js/flexslider.js', false, '', true);
	wp_register_script('isotope', get_template_directory_uri() . '/framework/js/isotope.js', false, '', true);
	wp_register_script('mobile-menu', get_template_directory_uri() . '/framework/js/mobile-menu.js', false, '', true);
	wp_register_script('custom', get_template_directory_uri() . '/framework/js/custom.js', false, '', true);
	
	/* ------------------------------------------------------------------------ */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_script('jquery');
	wp_enqueue_script('preloader');
	wp_enqueue_script('pretty-photo');
	if ( is_page_template('two-columns-portfolio.php') || is_page_template('three-columns-portfolio.php') || is_page_template('four-columns-portfolio.php') ) {
		wp_enqueue_script('isotope');
	}
	wp_enqueue_script('superfish');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('mobile-menu');
	wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'sd_jquery_scripts');

function sd_css_styles() {
	global $sd_data;
	
	/* ------------------------------------------------------------------------ */
	/* Register Stylesheets */
	/* ------------------------------------------------------------------------ */
	
	wp_register_style('bootstrap', get_template_directory_uri() . '/framework/css/bootstrap-fontawesome.css', 'style');
	wp_register_style('flexslider', get_template_directory_uri() . '/framework/css/flexslider.css', 'style');
	wp_register_style('prettyphoto', get_template_directory_uri() . '/framework/css/prettyPhoto.css', 'style');
	wp_register_style('custom-styles', get_template_directory_uri() . '/framework/css/custom-styles.css', 'style');
	wp_register_style('responsive', get_template_directory_uri() . '/framework/css/bootstrap-responsive.css', 'style');

	
	/* ------------------------------------------------------------------------ */
	/* Enqueue Styles */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_style( 'bootstrap', '2');
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '3', 'all' ); // Main Stylesheet
	wp_enqueue_style( 'flexslider');
	wp_enqueue_style( 'prettyphoto');
	wp_enqueue_style( 'custom-styles');
	if ( $sd_data['responsive_mode'] == 1 ) {
		wp_enqueue_style( 'responsive');
	}
}
add_action( 'wp_enqueue_scripts', 'sd_css_styles', 1 ); 
?>