<?php
/**
 * Felicity functions and definitions
 *
 * @package Felicity
 */

/**
 * Load Flex slider function	
 *
*/
function felicity_flex_slider()
{
$slider_animation = of_get_option('slider_animation');
$animation_speed = of_get_option('animation_speed');
$slideshow_speed = of_get_option('slideshow_speed');
$slider_cat = of_get_option('slider_cat');
$num_of_slides = of_get_option('slider_num');

$flex_query = new WP_Query(
	array(
		'posts_per_page' => $num_of_slides,
		'cat' 	=> $slider_cat
	)
);?>
<div class="clear"></div>
<div class="flexslider" >
	<ul class="slides">
	<?php while ( $flex_query->have_posts() ): $flex_query->the_post(); ?>
		<li>
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } else { ?>
				<img class="attachment-full wp-post-image rs-slide-image" width="1024" height="500" alt="slide" src="<?php echo get_template_directory_uri() ?>/images/assets/slide.jpg">
			<?php } ?>
			<?php if (of_get_option('captions') == '1') { ?>
				<div class="posts-featured-details-wrapper">
					<div>
						<a class="post-title" href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
						<?php the_excerpt(); ?>
					</div>
				</div>
			<?php }; ?>	
			</li>
		<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div>
	<div class="clear"></div>
<script type="text/javascript">
	var flex=jQuery.noConflict();
    flex(window).load(function(){
      flex('.flexslider').flexslider({
		slideshowSpeed: <?php echo $slideshow_speed ?> , 
		animationSpeed: <?php echo $animation_speed ?>,
		animation: "fade",
        start: function(slider){
          flex('body').removeClass('loading');
        }
      });
    });
</script>
<?php }
/**
 * Load Refine slider function	
 * 
*/
function felicity_refine_slide()
{
$slider_animation = of_get_option('slider_animation');
$animation_speed = of_get_option('animation_speed');
$slideshow_speed = of_get_option('slideshow_speed');
$slider_cat = of_get_option('slider_cat');
$num_of_slides = of_get_option('slider_num');

$refine_query = new WP_Query(
	array(
		'posts_per_page' => $num_of_slides,
		'cat' 	=> $slider_cat
	)
);?>
<div class="clear"></div>
<div class="slider-wrap">
	<ul class="rs-slider">
	<?php while ( $refine_query->have_posts() ): $refine_query->the_post(); ?>		    
		<li>
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('full'); ?>
			<?php } else { ?>
				<img class="attachment-full wp-post-image rs-slide-image" width="1200" height="450" alt="slide" src="<?php echo get_template_directory_uri() ?>/images/assets/slide.jpg">
			<?php } ?>	
			<?php if (of_get_option('captions') == '1') { ?>
				<div class="posts-featured-details-wrapper">
					<div>
						<a class="post-title" href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
						<?php the_excerpt(); ?>
					</div>
				</div>
			<?php }; ?>	
		</li>
	<?php endwhile; wp_reset_query(); ?>
	</ul>
</div>
<script type="text/javascript">
	var refine=jQuery.noConflict();
		refine(function () {
        	refine('.rs-slider').refineSlide({
            	useThumbs             : false,
				useArrows             : true,
				autoPlay              : true,
				keyNav                : true,
				transition         	  : '<?php echo $slider_animation ?>',
				maxWidth              : 1200,
				delay                 : <?php echo $slideshow_speed ?>, 
				transitionDuration    : <?php echo $animation_speed ?>,
				fallback3d            : 'sliceV',
        	});
    	});
</script>
<?php }