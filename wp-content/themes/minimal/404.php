<?php 
/* ------------------------------------------------------------------------ */
/* Theme 404 Page
/* ------------------------------------------------------------------------ */
get_header();

$blog_sidebar = '';

if ( isset($sd_data['blog_sidebar']) ) {
	$blog_sidebar = $sd_data['blog_sidebar'];
}
?>
<!--left col-->

<div class="container">
<div class="row">
<!--left col-->
<div id="left-col" class="span8" <?php if ($blog_sidebar == 'left') echo 'style="float: right;"';?>>
	<div class="not-found">
		<p> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Back to Homepage', 'sd-framework'); ?>">
		<div class="center"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/404.png" alt="<?php _e('Back to Homepage', 'sd-framework'); ?>" title="<?php _e('Back to Homepage', 'sd-framework'); ?>" /></a></div><br/>
			<?php _e('We are really sorry, but the page you requested was not found.', 'sd-framework'); ?>
			<br />
		</p>
		<p>
			<?php _e('It seems that the page you were trying to reach does not exist anymore or maybe it has just been moved.', 'sd-framework'); ?>
			<?php _e('If you\'re looking for something try using the search form the top or just click on the image to go to the homepage.', 'sd-framework'); ?>
		</p>
		<p>
			<?php _e('Sorry for the inconvenience.', 'sd-framework'); ?>
		</p>
	</div>
</div>
<!--left col end--> 
<!--sidebar-->
<?php get_sidebar(); ?>
<!--sidebar end-->
</div>
</div>
<?php get_footer(); ?>