<?php 
/**
 * @package Felicity
 */
?>
<div <?php post_class('post-wrapper wow fadeIn'); ?> data-wow-delay="0.5s">
	<div class="<?php echo of_get_option('blog_layout_format'); ?>">
		<?php get_template_part( 'post', 'formats');?>
	</div>
</div>