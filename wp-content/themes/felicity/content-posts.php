<?php 
/**
 * @package Felicity
 *
 */
if ( have_posts() ) : ?>
	<div class="clear"></div>
	<div class="standard-posts-wrapper">
		<div class="posts-wrapper">	
			<div id="post-body">
				<div class="post-single">
				<?php if (of_get_option('enable_breadcrumbs') == '1') { 
					if (!is_front_page()) { ?>
						<div class="breadcrumbs">
							<div class="breadcrumbs-wrap"> 
								<?php get_template_part( 'breadcrumbs'); ?>
							</div><!--breadcrumbs-wrap-->
						</div><!--breadcrumbs-->
					<?php }
					}  
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
			</div><!--posts-body-->
		</div><!--posts-wrapper-->
	</div><!--standard-posts-wrapper-->
	<div class="sidebar-frame">
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php 
else: ?>
	<?php get_template_part( 'content', 'none' );
endif; ?>