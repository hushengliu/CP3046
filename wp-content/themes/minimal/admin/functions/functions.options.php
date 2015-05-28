<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		$bg_att = array("scroll", "fixed");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

		//Default RSS URL
		$default_feed = get_bloginfo('rss2_url');
		
		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/* ------------------------------------------------------------------------ */
/* Homepage
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Homepage",
					   "type" => "heading");
					   
$of_options[] = array( "name" => '',
					"desc" => "",
					"id" => "permission_box",
					"std" => "",
					"icon" => false,
					"type" => "permissions");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_responsive",
					"std" => "<h4>Responsive (Mobile) Mode</h4>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Enable Responsive Mode",
					"desc" => "Check to enable responsive (mobile) mode.",
					"id" => "responsive_mode",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch");

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "homepage_slider_title",
					"std" => "<h4>Homepage Slider</h4>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Enable Home Slider",
					"desc" => "Check to enable the Home Slider.",
					"id" => "home_slider",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch");
					
/* ------------------------------------------------------------------------ */
/* Header
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Header",
					   "type" => "heading");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "header_height_title",
					"std" => "<h4>Header Height</h4>",
					"icon" => true,
					"type" => "info");
					   
$of_options[] = array( "name" => "Header Height",
                    "desc" => "Enter the header's height (Default: 125).",
                    "id" => "header_height",
                    "std" => "125",
					"min" => "125",
					"step" => "1",
					"max" => "500",
                    "type" => "sliderui");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "logo_title",
					"std" => "<h4>Logo</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png).",
					"id" => "logo",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Logo Top Margin",
                    "desc" => "Enter the logo's top margin (Default: 38).",
                    "id" => "logo_top_margin",
                    "std" => "38",
					"step" => "1",
					"min" => "0",
					"max" => "200",
                    "type" => "sliderui");

/* ------------------------------------------------------------------------ */
/* Footer
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Footer",
					   "type" => "heading");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "footer_title",
					"std" => "<h4>Footer Settings</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Enable Footer Twitter Section",
					"desc" => "Check to enable the footer twitter section.",
					"id" => "footer_twitter",
					"std" => 0,
					"folds" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch");
					
$of_options[] = array( "name" => "Twitter Username",
                    "desc" => "Enter your Twitter Username.",
                    "id" => "twitter_username",
                    "std" => "skatdesign",
					"fold" => "footer_twitter",
                    "type" => "text");
					
$of_options[] = array( "name" => "Consumer Key",
                    "desc" => "Enter your Consumer Key. Create your app here: <a href=\"http://dev.twitter.com/apps\" target=\"_blank\">http://dev.twitter.com/apps</a>",
                    "id" => "consumer_key",
                    "std" => "",
					"fold" => "footer_twitter",
                    "type" => "text");
					
$of_options[] = array( "name" => "Consumer Secret",
                    "desc" => "Enter your Consumer Secret.",
                    "id" => "consumer_secret",
                    "std" => "",
					"fold" => "footer_twitter",
                    "type" => "text");
					
$of_options[] = array( "name" => "Access Token",
                    "desc" => "Enter your Access Token.",
                    "id" => "access_token",
                    "std" => "",
					"fold" => "footer_twitter",
                    "type" => "text");
					
$of_options[] = array( "name" => "Access Token Secret",
                    "desc" => "Enter your Access Token Secret.",
                    "id" => "access_token_secret",
                    "std" => "",
					"fold" => "footer_twitter",
                    "type" => "text");


$of_options[] = array( "name" => "Enable Widgetized Footer",
								"desc" => "Check to show the Widgetized Footer.",
								"id" => "widgetized_footer",
								"std" => 0,
								"on" => "Enable",
								"off" => "Disable",
								"type" => "switch");

					
$of_options[] = array( "name" => "Custom Copyright Text",
					"desc" => "Insert your custom copyright text.",
					"id" => "copyright",
					"std" => "",
					"type" => "textarea");
								
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "tracking_title",
					"std" => "<h4>Tracking Code</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "analytics_code",
					"std" => "",
					"type" => "textarea");        

/* ------------------------------------------------------------------------ */
/* Styling
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Styling",
					   "type" => "heading");
					   
$of_options[] = array( "name" =>  "Theme's Accent Color",
					"desc" => "Pick the accent color for the theme (default: #f56532).",
					"id" => "main_theme_color",
					"std" => "#f56532",
					"type" => "color");
					   
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "fav_title",
					"std" => "<h4>Favicon</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "favicon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "custom_css_title",
					"std" => "<h4>Custm CSS</h4>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");
				   
/* ------------------------------------------------------------------------ */
/* Portfolio
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Portfolio",
					   "type" => "heading");
					   
$of_options[] = array( "name" => "Portfolio Page Slug",
                    "desc" => "Enter your portfolio page slug.",
                    "id" => "portfolio_slug",
                    "std" => "portfolio-page",
                    "type" => "text");
					
$of_options[] = array( "name" => "Number of items on portfolio page",
                    "desc" => "Enter the number of items on the portfolio page.",
                    "id" => "portfolio_items",
                    "std" => "12",
                    "type" => "text");

$of_options[] = array( "name" => "Enable Related Portfolio Items",
					"desc" => "Enable the related portfolio items.",
					"id" => "related_portfolio",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch");

/* ------------------------------------------------------------------------ */
/* Blog
/* ------------------------------------------------------------------------ */
					   
$of_options[] = array( "name" => "Blog",
					   "type" => "heading");
					   
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => "Sidebar Position",
					"desc" => "Select the position of the sidebar (right or left).",
					"id" => "blog_sidebar",
					"std" => "right",
					"type" => "images",
					"options" => array(
						'right' => $url . '2cr.png',
						'left' => $url . '2cl.png',
						)
					);
					
$of_options[] = array( "name" => "Pagination",
					"desc" => "Select the type of pagination for your site.",
					"id" => "theme_pagination",
					"std" => "2",
					"type" => "images",
					"options" => array(
						'1' => $url . 'post-links.png',
						'2' => $url . 'pagination.png',
						)
					);

/* ------------------------------------------------------------------------ */
/* Backup Options
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
	}
}
?>
