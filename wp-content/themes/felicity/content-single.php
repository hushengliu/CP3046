<?php 
/**
 * @package Felicity
 */
?>
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
				<?php if (of_get_option('post_info') == 'above') { get_template_part('post','info');}?>
			<?php } ?>
			<?php 
			if (has_post_format( 'gallery' )) {
				felicity_gallery_post();
			} else { 
				if ( has_post_thumbnail() ) { 
					if (has_post_format( 'video' )) {
					} else { 
						if (of_get_option('featured_img_post') == '1') {?>
							<div class="thumb-wrapper">
								<?php the_post_thumbnail('full'); ?>
							</div><!--thumb-wrapper-->
					<?php
						} 
					}
				} 			
			} ?>
			<div id="article"><?php 
			if (has_post_format( 'quote' )) { ?> 
				<div class="clear"></div>
				<div class="quote-post">
					<i class="fa fa-quote-right"></i>
					<p class="quote-text"><?php echo get_post_meta($post->ID, 'fw_quote_post', true); ?></p>
					<span class="quote-author">~ <?php echo get_post_meta($post->ID, 'fw_quote_author', true); ?> ~</span>
				</div>
			<?php }
			if (has_post_format( 'link' )) { ?> 
				<div class="clear"></div>
				<div class="link-post">
					<i class="fa fa-chain"></i>
					<p class="link-text"><a href="<?php echo get_post_meta($post->ID, 'fw_link_post_url', true); ?>"><?php echo get_post_meta($post->ID, 'fw_link_post_description', true); ?></a></p>
				</div>
			<?php }
				the_content(); 
				the_tags('<p class="post-tags"><span>'.__('Tags:','felicity').'</span> ','','</p>');
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'felicity' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				
				//Displays navigation to next/previous post.
				if ( of_get_option('post_navigation') == 'below') { get_template_part('post','nav'); }
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template( '', true );
				} ?>
			
			</div><!--article-->
		</div><!--post-single-->
			<?php get_template_part('post','sidebar'); ?>
	</div><!--post-body-->
</div><!--content-box-->
<div class="sidebar-frame">
	<div class="sidebar">
		<?php get_sidebar(); ?>
	</div><!--sidebar-->
</div><!--sidebar-frame-->