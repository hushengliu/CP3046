<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Felicity
 */
get_header(); ?>
	<div id="main" class="<?php echo of_get_option('layout_settings');?>">
		<div id="content-box">
			<div id="post-body">
				<h1><?php _e('Error 404 - Page not found!', 'felicity'); ?></h1>
				<div class="sorry"><?php _e('Sorry! It seems that the page you are looking for is not here.', 'felicity'); ?></div>
			</div><!--post-body-->
		</div><!--content-box-->
		<div class="sidebar-frame">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div><!--sidebar-->
		</div><!--sidebar-frame-->
	</div><!--main-->
<?php get_footer(); ?>