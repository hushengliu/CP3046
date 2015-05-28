<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Felicity
 */
get_header(); ?>
	<div id="main" class="<?php echo of_get_option('layout_settings');?>">
		<?php 
		if ( have_posts() ) : ?>
			<div class="clear"></div>
			<div class="breadcrumbs">
				<div class="breadcrumbs-wrap"> 
					<?php get_template_part( 'breadcrumbs'); ?>
				</div><!--breadcrumbs-wrap-->
			</div><!--breadcrumbs-->
			<div class="standard-posts-wrapper">
				<div class="posts-wrapper">	
				<?php 
				// Start the Loop.
				while ( have_posts() ) : the_post();		
					get_template_part('content');
				endwhile; 
				
				if (of_get_option('simple_paginaton') == '1') {
					
					// Displays links for next and previous pages.
					posts_nav_link();
					
				} else {
				
					// Previous/next post navigation.
					felicity_paging_nav();
					
				}
				
				?>
				</div>
			</div>
			<div class="sidebar-frame">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php 
		else: ?>
			<?php get_template_part( 'content', 'none' );
		endif; ?>
	</div><!--main-->
<?php get_footer(); ?>