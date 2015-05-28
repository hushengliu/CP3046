<?php 
/* ------------------------------------------------------------------------ */
/* Template name: Page: Blog
/* ------------------------------------------------------------------------ */
get_header();

$blog_sidebar = '';

if ( isset($sd_data['blog_sidebar']) ) {
	$blog_sidebar = $sd_data['blog_sidebar'];
}

$theme_pagination = '';

if ( isset($sd_data['theme_pagination']) ) {
	$theme_pagination = $sd_data['theme_pagination'];
}
?>

<div class="container content">
  <div class="row"> 
    <!--left col-->
    <div id="left-col" class="span8" <?php if ($blog_sidebar == 'left') echo 'style="float: right;"';?>>
      <?php 
		global $wp_query;
		global $more;
		
		$more = 0;
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$args = array(
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged
			);
		
		$wp_query = new WP_Query($args);
		
		if ($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
	?>
      <?php get_template_part( 'framework/inc/post-formats/content', get_post_format() ); ?>
      <?php endwhile; else: ?>
      <p>
        <?php _e('Sorry, no posts matched your criteria', 'sd-framework') ?>
        .</p>
      <?php endif; ?>
      <!--pagination-->
      <?php if ( $theme_pagination == 1 ) : ?>
      	<?php if ( get_previous_posts_link() ) : ?>
      		<div class="nav-previous">
        	<?php previous_posts_link( __( 'Previous Posts', 'sd-framework' ) ); ?>
      		</div>
      	<?php endif; ?>
      	
		<?php if ( get_next_posts_link() ) : ?>
      		<div class="nav-next">
        	<?php next_posts_link( __( 'Next Posts', 'sd-framework' ) ); ?>
      		</div>
      	<?php endif; ?>
      
	  <?php elseif ( $theme_pagination == 2 ) : ?>
      	<?php sd_custom_pagination();  ?>
      <?php endif; ?>
      <!--pagination end--> 
    </div>
    <!--left col end--> 
    <!--sidebar-->
    <?php get_sidebar(); ?>
    <!--sidebar end--> 
  </div>
</div>
<?php get_footer(); ?>