<?php
/**
 * The Header of the theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Felicity
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
<div id="grid-container">
	<div class="clear"></div>
		<div id="header-holder">
			<div id="logo-layout">	
				<div class="clear"></div>	
				<div id="logo">
					<?php if ( of_get_option('logo') != '' ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ) ?>"><img src="<?php echo esc_url(of_get_option('logo')); ?>" alt="<?php echo of_get_option('logo_alt_text'); ?>"/></a>
						<?php if (of_get_option('enable_logo_tagline') == '1' ) { ?> 
							<h5 class="site-description"><?php echo bloginfo('description'); ?></h5>
						<?php } ?>
					<?php } else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php echo of_get_option('logo_alt_text'); ?></a>
						<?php if (of_get_option('enable_logo_tagline') == '1' ) { ?> 
							<h5 class="site-description"><?php echo bloginfo('description'); ?></h5>
						<?php } ?>
					<?php } ?>
				</div><!--logo-->
				 				
			  <?php if(class_exists('Woocommerce')) { 
						if ( of_get_option('shopping_cart_enable') == '1' ) { get_template_part( 'shopping','cart' ); };
					}
					
					if ( of_get_option('header_address_enable') == '1' ) { get_template_part( 'address','bar' ); }; 
					
					if ( of_get_option('header_social_enable') == '1' ) { get_template_part( 'social','header' ); }; ?>
			</div><!--logo-layout-->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'container' => false,'menu_id'=>'menu-main-navigation','menu_class' => 'sf-menu sf-js-enabled sf-shadow', 'fallback_cb'=> 'wp_page_menu', )); ?>
			</nav><!--site-navigation-->
		</div><!--header-holder-->