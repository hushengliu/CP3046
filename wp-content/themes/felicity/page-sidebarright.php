<?php
/*
Template Name: Page With Right Sidebar
*
* @package Felicity
 */
get_header(); ?>
	<div id="main" class="col2-l">
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="content-box">
				<div id="post-body">
					<div <?php post_class('post-single'); ?>>
						<h1 id="post-title" <?php post_class('entry-title'); ?>><?php the_title(); ?> </h1>
						<?php if (of_get_option('enable_breadcrumbs') == '1') { ?>
							<div class="breadcrumbs">
								<div class="breadcrumbs-wrap"> 
									<?php get_template_part( 'breadcrumbs'); ?>
								</div><!--breadcrumbs-wrap-->
							</div><!--breadcrumbs-->
						<?php } ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="thumb-wrapper">
								<?php the_post_thumbnail('full'); ?>
							</div><!--thumb-wrapper-->
						<?php } ?>
						<div id="article">
							<?php the_content(); 
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'felicity' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
							
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template( '', true );
							} ?>
							
						</div><!--article-->
					</div><!--post-single-->
				</div><!--post-body-->
			</div><!--content-box-->
			<?php if ( of_get_option('page_sidebar_position') != 'none' ) { ?>
				<div class="sidebar-frame">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>
		<?php endwhile; ?>
	</div><!--main-->
<?php get_footer(); ?>