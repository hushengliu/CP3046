<?php 
/**
 * @package Felicity
 *
 *
 * Check for featured images 
 */ 
if ( of_get_option('blog_content') == 'Excerpt') {
	if (has_post_format( 'gallery' )) {
	
		if (of_get_option('blog_layout_format') == 'above-f') {
			
			felicity_gallery_post();
		} else {
			if ( has_post_thumbnail() ) { ?>
				<div class="image-holder">
					<div class="thumb-wrapper imgLiquidFill imgLiquid">
						<?php the_post_thumbnail('full'); ?>
					</div>
				</div>
			<?php 
			}else{ ?>
				<div class="image-holder">
					<div class="thumb-wrapper imgLiquidFill imgLiquid">
						<img class="attachment-full wp-post-image rs-slide-image" width="1024" height="500" alt="slide" src="<?php echo get_template_directory_uri() ?>/images/assets/slide.jpg">
					</div>
				</div>
				<?php 
			}
		}
	
	} else {
		if ( has_post_thumbnail() ) { ?>
			<div class="image-holder">
				<div class="thumb-wrapper imgLiquidFill imgLiquid">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>
		<?php 
		}else{ ?>
			<div class="image-holder">
				<div class="thumb-wrapper imgLiquidFill imgLiquid">
					<img class="attachment-full wp-post-image rs-slide-image" width="1024" height="500" alt="slide" src="<?php echo get_template_directory_uri() ?>/images/assets/slide.jpg">
				</div>
			</div>
		<?php 
		}
	} 
}

if ( of_get_option('blog_content') == 'Excerpt') { ?>
	<div class = "text-holder">
		<a class="post-title" href="<?php the_permalink() ?>"><h3 <?php post_class('entry-title'); ?>><?php the_title(); ?></h3></a>
			<?php 
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
			the_excerpt(); 
		  	get_template_part( 'post', 'meta'); ?>
	</div>
<?php } else { ?>
	<div class = "text-holder-full">
		<a class="post-title" href="<?php the_permalink() ?>"><h3 <?php post_class('entry-title left-text'); ?>><?php the_title(); ?></h3></a>
		
		<?php if (of_get_option('post_info') == 'above') { get_template_part('post','info');}
			
			if (has_post_format( 'gallery' )) {
				felicity_gallery_post();
			} else { 
				if (has_post_format( 'video' )) {
				} else {
					if ( has_post_thumbnail() ) { ?>
						<div class="thumb-wrapper">
							<?php the_post_thumbnail('full'); ?>
						</div><!--thumb-wrapper-->
					<?php 
					} 		
				}	
			}
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
			the_content( __( 'Continue Reading...', 'felicity' ) ); ?> 
	</div>	
<?php } ?>
