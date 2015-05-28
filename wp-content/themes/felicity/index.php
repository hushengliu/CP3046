<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Felicity
 */
get_header(); ?>
	<div id="main" class="<?php echo of_get_option('layout_settings'); ?>">
	<?php 
		if (is_front_page() && ! is_paged()) {
		
			if (of_get_option('image_slider_on') == '1') {
				
				if (of_get_option('default_slider') == 'refine') { felicity_refine_slide(); }
				if (of_get_option('default_slider') == 'flex') { felicity_flex_slider(); }
				
			}
		
			if (of_get_option('features_section_on') == '1') {
			
				if (of_get_option('features_num') == 'six') {
				
					get_template_part( 'features', 'section-6' );
					
				} else {
					
					get_template_part( 'features', 'section-4' );
					
				}
				
			}
			
			if (of_get_option('services_section_on') == '1') {
			
				get_template_part( 'services', 'section' );
				
			}
			
			if (of_get_option('about_section_on') == '1') {
			
				felicity_about_section();
				
			}
		
			if (of_get_option('content_boxes_section_on') == '1') {
			
				felicity_content_boxes();
				
			}
			
			if (of_get_option('blog_posts_on') == '1') {
			
				get_template_part( 'content', 'posts' );
				
			}
			
		} else {
		
			get_template_part( 'content', 'posts' );
			
		} ?>

	</div><!--main-->
<?php get_footer(); ?>