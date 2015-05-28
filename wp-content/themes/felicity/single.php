<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Felicity
 */
get_header(); ?>
	<div id="main" class="<?php echo of_get_option('layout_settings');?>">
	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'single');
		
		endwhile;
	?>
	</div><!--main-->
<?php get_footer(); ?>