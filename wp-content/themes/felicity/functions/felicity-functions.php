<?php
/**
 * Felicity functions and definitions
 *
 * @package Felicity
 *
 *
 */
	
/**
 * Loads theme setup functions.
 */
function felicity_setup() {

	/**
 	* Sets up the content width.
 	*/
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1200; }
	
	/** 
	 * Makes theme available for translation
	 * 
	 */
	load_theme_textdomain( 'felicity', get_template_directory() . '/languages' );

	/** 
 	* This theme styles the visual editor with editor-style.css to match the theme style.
 	*/
	add_editor_style();

	/** 
 	* Default RSS feed links
	 */
	add_theme_support('automatic-feed-links');

	/**
 	* Register Navigation
 	*/
	register_nav_menu('main_navigation', __('Primary Menu', 'felicity') );

	/** 
 	* Support a variety of post formats.
 	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );

	/** 
 	* Custom image size for featured images, displayed on "standard" posts.
 	*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 2500, 9999 ); // Unlimited height, soft crop
	
	/**
 	* Sets up theme custom backgrounds
 	*/
	$custombg = array(
		'default-color' => 'ffffff',
		);	
	add_theme_support( 'custom-background', $custombg );
}

add_action( 'after_setup_theme', 'felicity_setup' );


/**
 * Function to change excerpt more string
 */
function felicity_custom_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'felicity_custom_excerpt_more' );

/**
 * Sets up theme defaults CSS rules
 */
function felicity_custom_styling() {
	/**
	 * General Settings 
	 */		
	$google_font_logo = of_get_option('google_font_logo');
	$logo_uppercase = of_get_option('logo_uppercase');
	$tagline_uppercase = of_get_option('tagline_uppercase');
	$logo_font_weight = of_get_option('logo_font_weight');
	$text_logo_color = of_get_option('text_logo_color');
	$logo_font_size = of_get_option('logo_font_size');
	$google_font_body = of_get_option('google_font_body');
	$body_font_size = of_get_option('body_font_size');
	$body_font_color = of_get_option('body_font_color');
	$tagline_color = of_get_option('tagline_color');
	$tagline_font_size = of_get_option('tagline_font_size');
	$logo_width = of_get_option('logo_width');
	$logo_height = of_get_option('logo_height');
	$logo_top_margin = of_get_option('logo_top_margin');
	$logo_left_margin = of_get_option('logo_left_margin');
	$logo_bottom_margin = of_get_option('logo_bottom_margin');
	$logo_right_margin = of_get_option('logo_right_margin');
	$scrollup_color = of_get_option('scrollup_color');
	$scrollup_hover_color = of_get_option('scrollup_hover_color');

	/**
	 * Header Settings 
	 */		
	$header_social_color = of_get_option('header_social_color');
	
	/**
	 * Home Page Settings
	 */	
	$tagline_bg_color = of_get_option('tagline_bg_color');
	$tagline_text_color = of_get_option('tagline_text_color');
	$content_box_bg_color = of_get_option('content_box_bg_color');
	$column_header_color = of_get_option('column_header_color');
	
	/**
	 * Navigation Menu 
	 */	
	$google_font_menu = of_get_option('google_font_menu');
	$nav_font_size = of_get_option('nav_font_size');
	$nav_font_color = of_get_option('nav_font_color');
	$nav_bg_color  = of_get_option('nav_bg_color');
	$nav_hover_font_color  = of_get_option('nav_hover_font_color');
	$nav_bg_hover_color = of_get_option('nav_bg_hover_color');
	$nav_cur_item_color = of_get_option('nav_cur_item_color');
	$nav_bg_sub_color = of_get_option('nav_bg_sub_color');
	$menu_uppercase = of_get_option('menu_uppercase');

	/**
	 * Footer Settings
	 */	
	$footer_bg_color = of_get_option('footer_bg_color');	
	$copyright_bg_color = of_get_option('copyright_bg_color');
	$footer_widget_title_color = of_get_option('footer_widget_title_color');
	$footer_widget_title_border_color = of_get_option('footer_widget_title_border_color');
	$footer_widget_text_color = of_get_option('footer_widget_text_color');
	$footer_widget_text_border_color = of_get_option('footer_widget_text_border_color');
	$footer_social_color  = of_get_option('footer_social_color');

	/**
	 * Sidebar Settings
	 */
	$archives_widget_bg_color = of_get_option('archives_widget_bg_color');
	$archives_widget_font_color = of_get_option('archives_widget_font_color');
	$archives_widget_title_color = of_get_option('archives_widget_title_color');
	
	$categories_widget_bg_color = of_get_option('categories_widget_bg_color');
	$categories_widget_font_color = of_get_option('categories_widget_font_color');
	$categories_widget_title_color = of_get_option('categories_widget_title_color');
	
	$calendar_widget_bg_color = of_get_option('calendar_widget_bg_color');
	$calendar_widget_font_color = of_get_option('calendar_widget_font_color');
	$calendar_widget_title_color = of_get_option('calendar_widget_title_color');
	
	$custom_menu_widget_bg_color = of_get_option('custom_menu_widget_bg_color');
	$custom_menu_widget_font_color = of_get_option('custom_menu_widget_font_color');
	$custom_menu_widget_title_color = of_get_option('custom_menu_widget_title_color');
	
	$links_widget_bg_color = of_get_option('links_widget_bg_color');
	$links_widget_font_color = of_get_option('links_widget_font_color');
	$links_widget_title_color = of_get_option('links_widget_title_color');
	
	$meta_widget_bg_color = of_get_option('meta_widget_bg_color');
	$meta_widget_font_color = of_get_option('meta_widget_font_color');
	$meta_widget_title_color = of_get_option('meta_widget_title_color');
	
	$pages_widget_bg_color = of_get_option('pages_widget_bg_color');
	$pages_widget_font_color = of_get_option('pages_widget_font_color');
	$pages_widget_title_color = of_get_option('pages_widget_title_color');
	
	$recent_comments_widget_bg_color = of_get_option('recent_comments_widget_bg_color');
	$recent_comments_widget_font_color = of_get_option('recent_comments_widget_font_color');
	$recent_comments_widget_title_color = of_get_option('recent_comments_widget_title_color');
	
	$recent_posts_widget_bg_color = of_get_option('recent_posts_widget_bg_color');
	$recent_posts_widget_font_color = of_get_option('recent_posts_widget_font_color');
	$recent_posts_widget_title_color = of_get_option('recent_posts_widget_title_color');
	
	$rss_widget_bg_color = of_get_option('rss_widget_bg_color');
	$rss_widget_font_color = of_get_option('rss_widget_font_color');
	$rss_widget_title_color = of_get_option('rss_widget_title_color');
	
	$search_widget_bg_color = of_get_option('search_widget_bg_color');
	$search_widget_font_color = of_get_option('search_widget_font_color');
	$search_widget_title_color = of_get_option('search_widget_title_color');
	
	$tag_cloud_widget_bg_color = of_get_option('tag_cloud_widget_bg_color');
	$tag_cloud_widget_font_color = of_get_option('tag_cloud_widget_font_color');
	$tag_cloud_widget_title_color = of_get_option('tag_cloud_widget_title_color');
	
	$text_widget_bg_color = of_get_option('text_widget_bg_color');
	$text_widget_font_color = of_get_option('text_widget_font_color');
	$text_widget_title_color = of_get_option('text_widget_title_color');
	
	$other_widget_bg_color = of_get_option('other_widget_bg_color');
	$other_widget_font_color = of_get_option('other_widget_font_color');
	$other_widget_title_color = of_get_option('other_widget_title_color');

	/**
	 * Image Slider
	 */	
	$captions_bg_color = of_get_option('captions_bg_color');
	$captions_font_color = of_get_option('captions_font_color');
	
	$output = '';

	/**
	 * Sidebar Settings
	 */
	
	/* Other widgets */
	if ( $other_widget_title_color )
	$output .= '.sidebar .widget .widget-title h4 { color:' . $other_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget .widget-title  { border-bottom: 2px solid ' . $other_widget_title_color . '}' . "\n";
	
	if ( $other_widget_font_color )
	$output .= '.sidebar .widget, .sidebar .widget a { color:' . $other_widget_font_color . '}' . "\n";
	
	/* Text widget */
	if ( $text_widget_title_color )
	$output .= '.sidebar .widget_text .widget-title h4 { color:' . $text_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_text .widget-title { border-bottom: 2px solid ' . $text_widget_title_color . '}' . "\n";
	
	if ( $text_widget_font_color )
	$output .= '.sidebar .widget_text, .sidebar .widget_text a { color:' . $text_widget_font_color . '}' . "\n";
	
	/* Tag Cloud widget */
	if ( $tag_cloud_widget_title_color )
	$output .= '.sidebar .widget_tag_cloud .widget-title h4 { color:' . $tag_cloud_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_tag_cloud .widget-title { border-bottom: 2px solid ' . $tag_cloud_widget_title_color . '}' . "\n";
	
	if ( $tag_cloud_widget_font_color )
	$output .= '.sidebar .widget_tag_cloud, .sidebar .widget_tag_cloud a { color:' . $tag_cloud_widget_font_color . ' !important;}' . "\n";
	
	/* Search widget */
	if ( $search_widget_title_color )
	$output .= '.sidebar .widget_search .widget-title h4 { color:' . $search_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_search .widget-title { border-bottom: 2px solid ' . $search_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget .searchform input#s { border: 1px solid ' . $search_widget_title_color . '}' . "\n";
	
	if ( $search_widget_font_color )
	$output .= '.sidebar .widget_search, .sidebar .widget_search a, .sidebar .searchform input#s { color:' . $search_widget_font_color . '}' . "\n";
	
	/* RSS widget */
	if ( $rss_widget_title_color )
	$output .= '.sidebar .widget_rss .widget-title h4 a { color:' . $rss_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_rss .widget-title { border-bottom: 2px solid ' . $rss_widget_title_color . '}' . "\n";
	
	if ( $rss_widget_font_color )
	$output .= '.sidebar .widget_rss, .sidebar .widget_rss a { color:' . $rss_widget_font_color . '}' . "\n";
	
	/* Recent Posts widget */
	if ( $recent_posts_widget_title_color )
	$output .= '.sidebar .widget_recent_entries .widget-title h4 { color:' . $recent_posts_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_entries .widget-title { border-bottom: 2px solid ' . $recent_posts_widget_title_color . '}' . "\n";
	
	if ( $recent_posts_widget_font_color )
	$output .= '.sidebar .widget_recent_entries, .sidebar .widget_recent_entries a { color:' . $recent_posts_widget_font_color . '}' . "\n";
	
	/* Recent Comments widget */
	if ( $recent_comments_widget_title_color )
	$output .= '.sidebar .widget_recent_comments .widget-title h4 { color:' . $recent_comments_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_recent_comments .widget-title { border-bottom: 2px solid ' . $recent_comments_widget_title_color . '}' . "\n";
	
	if ( $recent_comments_widget_font_color )
	$output .= '.sidebar .widget_recent_comments, .sidebar .widget_recent_comments a { color:' . $recent_comments_widget_font_color . '}' . "\n";
	
	/* Pages widget */
	if ( $pages_widget_title_color )
	$output .= '.sidebar .widget_pages .widget-title h4 { color:' . $pages_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_pages .widget-title { border-bottom: 2px solid ' . $pages_widget_title_color . '}' . "\n";
	
	if ( $pages_widget_font_color )
	$output .= '.sidebar .widget_pages, .sidebar .widget_pages a { color:' . $pages_widget_font_color . '}' . "\n";
	
	/* Meta widget */
	if ( $meta_widget_title_color )
	$output .= '.sidebar .widget_meta .widget-title h4 { color:' . $meta_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_meta .widget-title { border-bottom: 2px solid ' . $meta_widget_title_color . '}' . "\n";
	
	if ( $meta_widget_font_color )
	$output .= '.sidebar .widget_meta, .sidebar .widget_meta a { color:' . $meta_widget_font_color . '}' . "\n";
	
	/* Links widget */
	if ( $links_widget_title_color )
	$output .= '.sidebar .widget_links .widget-title h4 { color:' . $links_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_links .widget-title { border-bottom: 2px solid ' . $links_widget_title_color . '}' . "\n";
	
	if ( $links_widget_font_color )
	$output .= '.sidebar .widget_links, .sidebar .widget_links a { color:' . $links_widget_font_color . '}' . "\n";
	
	/* Custom Menu widget */
	if ( $custom_menu_widget_title_color )
	$output .= '.sidebar .widget_nav_menu .widget-title h4 { color:' . $custom_menu_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_nav_menu .widget-title { border-bottom: 2px solid ' . $custom_menu_widget_title_color . '}' . "\n";
	
	if ( $custom_menu_widget_font_color )
	$output .= '.sidebar .widget_nav_menu, .sidebar .widget_nav_menu a { color:' . $custom_menu_widget_font_color . '}' . "\n";
	
	/* Calendar widget */
	if ( $calendar_widget_title_color )
	$output .= '.sidebar .widget_calendar .widget-title h4 { color:' . $calendar_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_calendar .widget-title { border-bottom: 2px solid ' . $calendar_widget_title_color . '}' . "\n";
	
	if ( $calendar_widget_font_color )
	$output .= '.sidebar .widget_calendar, .sidebar .widget_calendar a { color:' . $calendar_widget_font_color . '}' . "\n";
	
	/* Categories widget */
	if ( $categories_widget_title_color )
	$output .= '.sidebar .widget_categories .widget-title h4 { color:' . $categories_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_categories .widget-title { border-bottom: 2px solid ' . $categories_widget_title_color . '}' . "\n";
	
	if ( $categories_widget_font_color )
	$output .= '.sidebar .widget_categories, .sidebar .widget_categories a { color:' . $categories_widget_font_color . '}' . "\n";
	
	/* Archives widget */
	if ( $archives_widget_title_color )
	$output .= '.sidebar .widget_archive .widget-title h4 { color:' . $archives_widget_title_color . '}' . "\n";
	$output .= '.sidebar .widget_archive .widget-title { border-bottom: 2px solid ' . $archives_widget_title_color . '}' . "\n";
	
	if ( $archives_widget_font_color )
	$output .= '.sidebar .widget_archive a { color:' . $archives_widget_font_color . '}' . "\n";
		
	/**
	 * Footer Settings
	 */
	if ( $footer_bg_color )
	$output .= '#footer { background-color:' . $footer_bg_color . '}' . "\n";

	if ( $copyright_bg_color )
	$output .= '#copyright { background-color:' . $copyright_bg_color . '}' . "\n";
	
	if ( $footer_widget_title_color )
	$output .= '.footer-widget-col h4 { color:' . $footer_widget_title_color . '}' . "\n";
	
	if ( $footer_widget_title_border_color )
	$output .= '.footer-widget-col h4 { border-bottom: 2px solid ' . $footer_widget_title_border_color . '}' . "\n";
	
	if ( $footer_widget_text_color )
	$output .= '.footer-widget-col a, .footer-widget-col { color:' . $footer_widget_text_color . '}' . "\n";

	if ( $footer_widget_text_border_color )
	$output .= '.footer-widget-col ul li { border-bottom: 1px solid ' . $footer_widget_text_border_color . '}' . "\n";
	
	if ( $footer_social_color )
	$output .= '#social-bar-footer ul li a i { color:' . $footer_social_color . '}' . "\n"; 
	
	/**
	 * Navigation Menu 
	 */	
	if ( $google_font_menu )
	$output .= '#site-navigation ul li a {font-family:' . $google_font_menu . '}' . "\n";	

	if ( $nav_font_size )
	$output .= '#site-navigation ul li a {font-size:' . $nav_font_size . 'px}' . "\n";
	
	if ( $nav_font_color )
	$output .= '#site-navigation ul li a {color:' . $nav_font_color . '}' . "\n";

	if ( $nav_bg_color )
	$output .= '#site-navigation {background-color:' . $nav_bg_color . '}' . "\n";
	$output .= '#site-navigation:before {border-bottom: 5px solid ' . $nav_bg_color . '}' . "\n";
	$output .= '#site-navigation:after {border-bottom: 5px solid ' . $nav_bg_color . '}' . "\n";
	$output .= '#site-navigation ul li ul.sub-menu ul.sub-menu {border-bottom: 5px solid ' . $nav_bg_color . '}' . "\n";
	$output .= '#site-navigation ul li ul.sub-menu {border-bottom: 5px solid ' . $nav_bg_color . '}' . "\n";

	if ( $nav_hover_font_color )
	$output .= '#site-navigation ul li a:hover {color:' . $nav_hover_font_color . '}' . "\n";

	if ( $nav_bg_hover_color )
	$output .= '#site-navigation ul li a:hover, #site-navigation ul li a:focus, #site-navigation ul li a.active, #site-navigation ul li a.active-parent, #site-navigation ul li.current_page_item a { background:' . $nav_bg_hover_color . '}' . "\n";	

	if ( $nav_bg_sub_color )
	$output .= '#site-navigation ul li ul.sub-menu { background:'.$nav_bg_sub_color . '}' . "\n";
	$output .= '#grid-container {border-top: 5px solid ' . $nav_bg_sub_color . '}' . "\n";
	
	if ( $nav_cur_item_color )
	$output .= '#menu-main-navigation .current-menu-item a { color:' . $nav_cur_item_color . '}' . "\n";
	
	if ( $menu_uppercase == '1' )
	$output .= '#site-navigation ul li a {text-transform: uppercase;}' . "\n";

	/**
	 * Header Settings 
	 */	

	if ( $header_social_color )
	$output .= '#logo-layout #social-bar ul li a { color:' . $header_social_color . '}' . "\n";

	/**
	 * Image Slider 
	 */	

	if ( $captions_bg_color )
	$output .= '.posts-featured-details-wrapper div { background: none repeat scroll 0 0 ' . $captions_bg_color . '}' . "\n";
	
	if ( $captions_font_color )
	$output .= '.posts-featured-details-wrapper, .posts-featured-details-wrapper a { color: ' . $captions_font_color . '}' . "\n";	
	
	/**
	 * General Settings 
	 */		
	
	if ( $scrollup_color )
	$output .= '.back-to-top {color:' . $scrollup_color . '}' . "\n";
	
	if ( $scrollup_hover_color )
	$output .= '.back-to-top i.fa:hover {color:' . $scrollup_hover_color . '}' . "\n";
	
	if ( $logo_top_margin )
	$output .= '#logo { margin-top:' . $logo_top_margin . 'px }' . "\n";
	
	if ( $logo_bottom_margin )
	$output .= '#logo { margin-bottom:' . $logo_bottom_margin . 'px }' . "\n";
	
	if ( $logo_left_margin )
	$output .= '#logo { margin-left:' . $logo_left_margin . 'px }' . "\n";
	
	if ( $logo_right_margin )
	$output .= '#logo { margin-right:' . $logo_right_margin . 'px }' . "\n";
	
	if ( $logo_height )
	$output .= '#logo {height:' . $logo_height . 'px }' . "\n";
	
	if ( $logo_width )
	$output .= '#logo {width:' . $logo_width . 'px }' . "\n";
	
	if ( $logo_font_weight )
	$output .= '#logo {font-weight:' . $logo_font_weight . '}' . "\n";
	
	if ( $tagline_uppercase == '0' )
	$output .= '#logo .site-description {text-transform: none}' . "\n";

	if ( $tagline_uppercase == '1' )
	$output .= '#logo .site-description {text-transform: uppercase}' . "\n";
	
	if ( $tagline_font_size )
	$output .= '#logo h5.site-description {font-size:' . $tagline_font_size . 'px }' . "\n";
	
	if ( $logo_uppercase == '1' )
	$output .= '#logo {text-transform: uppercase }' . "\n";
	
	if ( $google_font_logo )
	$output .= '#logo {font-family:' . $google_font_logo . '}' . "\n";

	if ( $text_logo_color )
	$output .= '#logo a {color:' . $text_logo_color . '}' . "\n";

	if ( $tagline_color )
	$output .= '#logo .site-description {color:' . $tagline_color . '}' . "\n";	
	
	if ( $logo_font_size )
	$output .= '#logo {font-size:' . $logo_font_size . 'px }' . "\n";

	if ( $google_font_body != 'None' )
	$output .= 'body {font-family:' . $google_font_body . ' !important}' . "\n";	
	
	if ( $body_font_size )
	$output .= 'body {font-size:' . $body_font_size . 'px !important}' . "\n";
	
	if ( $body_font_color )
	$output .= 'body {color:' . $body_font_color . '}' . "\n";
			
	// Output styles
	if ( isset( $output ) && $output != '' ) {
		$output = strip_tags( $output );
		$output = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
	}
}

add_action('wp_head','felicity_custom_styling');

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 */
function felicity_wp_title( $title, $sep ) {
	global $paged, $page;
	
	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'felicity' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'felicity_wp_title', 10, 2 );

/** 
 * Add scripts function
 */
function felicity_add_script_function() {
	/** 
	* Enqueue css
	*/
	wp_enqueue_style('felicity',  get_stylesheet_uri());
	wp_enqueue_style ('animate', get_template_directory_uri() . '/css/animate.css');
	if (of_get_option('responsive_design') == '1'):
		wp_enqueue_style ('responsive', get_template_directory_uri() . '/css/responsive.css');
	endif;
	wp_enqueue_style ('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	if( of_get_option('google_font_body') !=""):
		wp_enqueue_style ('body-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_body')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( of_get_option('google_font_menu') != ""):
		wp_enqueue_style ('menu-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_menu')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;
	if( of_get_option('google_font_logo') != ""):
		wp_enqueue_style ('logo-font', '//fonts.googleapis.com/css?family='. urlencode(of_get_option('google_font_logo')) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
	endif;

	/** 
	 * Enqueue javascripts
	 */
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ),'', false);
	wp_enqueue_script('supersubs', get_template_directory_uri() . '/js/supersubs.js', array( 'jquery' ),'', false);
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ),'', false );
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),'', true);
	wp_enqueue_script('tinynav', get_template_directory_uri() . '/js/tinynav.js', array( 'jquery' ),'', false);
	wp_enqueue_script('refineslide', get_template_directory_uri() . '/js/jquery.refineslide.js', array( 'jquery' ),'', false);
	wp_enqueue_script('imgLiquid-min', get_template_directory_uri() . '/js/imgLiquid.js', array( 'jquery' ),'', false);
	if ( of_get_option('enable_scrollup') == 1) { 
		wp_enqueue_script('scroll-on', get_template_directory_uri() . '/js/scrollup.js', array( 'jquery' ),'', true); 
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array(),'', false);
	if ( of_get_option('animation') == 1) { 
		wp_enqueue_script('animation', get_template_directory_uri() . '/js/animation.js', array(),'', true); 
	}
}

add_action('wp_enqueue_scripts','felicity_add_script_function');

/** 
 * Register widgetized locations
 */
function felicity_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Main Sidebar', 'felicity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title clearfix"><h4><span>',
		'after_title' => '</span></h4></div>',
	));

	register_sidebar(array(
		'name' =>  __( 'Footer Widget 1', 'felicity' ),
		'id' => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'felicity' ),
		'id' => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'felicity' ),
		'id' => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer Widget 4', 'felicity' ),
		'id' => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

add_action( 'widgets_init', 'felicity_widgets_init' );

/** 
 * Load function to change excerpt length
 */
function felicity_excerpt_length( $length ) {
	
	if(of_get_option('blog_excerpt') !="") {
		$excrpt = of_get_option('blog_excerpt');
		return $excrpt;
	} else {
		$excrpt = '80';
		return $excrpt;
	}
}

add_filter('excerpt_length', 'felicity_excerpt_length', 999);


/** 
 * Custom favicon function
 */
function felicity_favicon() {
	if (of_get_option('enable_favicon') == '1' ) {
		echo '<link rel="shortcut icon" href="'.of_get_option('favicon').'"/>'."\n";
	}
}

add_filter( 'wp_head', 'felicity_favicon' );

/**
 * Displays navigation to next/previous post when applicable.
 */
function felicity_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php __( 'Post navigation', 'felicity' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'felicity' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'felicity' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/** 
 * Displays navigation to next/previous pages
 */
function felicity_paging_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'felicity' ),
		'next_text' => __( 'Next &rarr;', 'felicity' ),
	) );

	if ( $links ) :

	?>
	<div class="pagination">
		<?php echo $links; ?>
	</div><!--pagination-->
	<?php
	endif;
}

/**
 * Load Comments Support	
*/
function felicity_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php __( 'Pingback:', 'felicity' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'felicity' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment, 35); ?>
				</div><!--comment-author .vcard-->
				<div class="comment-date">
					<span>on</span>	 <?php comment_date('F j, Y'); ?>
				</div>
				<div class="comment-author-name">
					<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
					<?php edit_comment_link( __( 'Edit', 'felicity' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php __( 'Your comment is awaiting moderation.', 'felicity' ); ?></em>
					<br>
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?>
			<div>
				<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'felicity' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!--reply-->
			</div>
			</div>

		</div><!--comment-->

	<?php
			break;
	endswitch;
}

/** 
 * Function to add ScrollUp to the footer.
*/
function felicity_add_scrollup() { 
	if ( of_get_option('enable_scrollup') == 1) { 
		echo '<a href="#" class="back-to-top"><i class="fa fa-arrow-circle-up"></i></a>'."\n";
	}
}

add_action('wp_footer', 'felicity_add_scrollup');

/** 
 * Theme Options Support 
*/
add_action( 'optionsframework_before','felicity_options_support' );

function felicity_options_support() { ?>
	<div id="optionsframework-support">
		<div class="metabox-holder">
			<div class="postbox">
					<div class="inside">
                        <p class="btn"><a class="button green" target="_blank" href="http://www.vpthemes.com/support/"><?php _e('Theme Support','felicity') ?></a> <a class="button orange" target="_blank" href="http://vpthemes.com/preview/Felicity/"><?php _e('View Demo','felicity') ?></a> <a class="button blue" target="_blank" href="http://www.vpthemes.com/felicity/#theme-pricing"><?php  _e('Upgrade to Pro','felicity') ?></a><strong> If you like my work. Buy me a beer.</strong></p>
                        <div class="donate">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="Q48C87AFGGJQU">
								<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>
					</div>
			</div>
		</div>
	</div>
<?php }

/** 
 * Function to display "About Section" on home page.
*/
function felicity_about_section() { ?>
	<div class="about">
		<div>
			<h2 class="boxtitle wow bounceInLeft" data-wow-delay="0.1s"><?php echo of_get_option('about_section_header'); ?></h2>
			<p class="text wow bounceInRight" data-wow-delay="0.2s"><?php echo of_get_option('about_section_text'); ?> </p>
		</div>
	</div>
<?php }

/** 
 * Function to display "Content Boxes Section" on home page.
*/
function felicity_content_boxes() { ?>
	<div class="content-boxes">
		<div class="col wow bounceInLeft" data-wow-delay="0.1s">
			<?php if ( of_get_option('first_column_custom_image') != '' ) { ?>
				<img alt="First Image" src="<?php echo esc_url(of_get_option('first_column_custom_image')); ?>">
			<?php } else { ?>
				<i class="fa <?php echo of_get_option('first_column_image'); ?>"></i>
			<?php } ?>
			<h4><?php echo of_get_option('first_column_header'); ?></h4>
			<p><?php echo of_get_option('first_column_text'); ?></p>
		</div>
		<div class="col wow fadeIn" data-wow-delay="0.1s">
			<?php if ( of_get_option('second_column_custom_image') != '' ) { ?>
				<img alt="Second Image" src="<?php echo esc_url(of_get_option('second_column_custom_image')); ?>">
			<?php } else { ?>
				<i class="fa <?php echo of_get_option('second_column_image'); ?>"></i>
			<?php } ?>
			<h4><?php echo of_get_option('second_column_header'); ?></h4>
			<p><?php echo of_get_option('second_column_text'); ?></p>
		</div>
		<div class="col wow bounceInRight" data-wow-delay="0.5s">
			<?php if ( of_get_option('third_column_custom_image') != '' ) { ?>
				<img alt="Third Image" src="<?php echo esc_url(of_get_option('third_column_custom_image')); ?>">
			<?php } else { ?>
				<i class="fa <?php echo of_get_option('third_column_image'); ?>"></i>
			<?php } ?>
			<h4><?php echo of_get_option('third_column_header'); ?></h4>
			<p><?php echo of_get_option('third_column_text'); ?></p>
		</div>
	</div>
<?php }

/** 
 * Function to display image slider in gallery post formats.
*/
function felicity_gallery_post() { 
	global $post;
	$animation_speed=of_get_option('animation_speed');
	$slideshow_speed=of_get_option('slideshow_speed');
	?>
	<div class="flexslider">
		<ul class="slides">	
		<?php
			//Pull gallery images from custom meta
			$gallery_image = get_post_meta($post->ID,'fw_gl_',true);
			if($gallery_image !=  ''){
				foreach ($gallery_image as $arr){
					echo '<li><img src="'.$arr['fw_gallery_post_image']['url'].'" alt="'.$arr['fw_gallery_post_image_title'].'" /></li>';
				}
			}
		?>		
		</ul>
	</div>	
	
	<?php wp_enqueue_script('custom-slides', get_template_directory_uri() . '/js/slides.js', array( 'jquery' ),'', true);
}