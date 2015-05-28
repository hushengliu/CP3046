<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: 4 Columns Portfolio
/* ------------------------------------------------------------------------ */

get_header();

?>

<div class="container content">
  <div class="row">
    <div class="portfolio-filters span12 clearfix">
      <h3 class="pull-left">
        <?php _e('Our Projects', 'sd-framework'); ?>
      </h3>
      <?php
			$portfolio_filters = get_terms('portfolio_filter');
				if($portfolio_filters): ?>
      <ul class="pull-right">
        <li><a href="#" data-filter="*" class="sd-active sd-bg-trans">
          <?php _e('All', 'sd-framework'); ?>
          </a> </li>
        <?php foreach($portfolio_filters as $portfolio_filter): ?>
        <?php if(rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list')  && !in_array('0', rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list'))): ?>
        <?php if(in_array($portfolio_filter->term_id, rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list') )): ?>
        <li><a href="#" data-filter=".<?php echo $portfolio_filter->slug; ?>" class="sd-bg-trans"><?php echo $portfolio_filter->name; ?></a></li>
        <?php endif; ?>
        <?php else: ?>
        <li><a href="#" data-filter=".<?php echo $portfolio_filter->slug; ?>" class="sd-bg-trans"><?php echo $portfolio_filter->name; ?></a></li>
        <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
    <div class="sd-portfolio-content clearfix">
      <?php
	global $wp_query;
			
	$portfolio_items = $sd_data['portfolio_items']; // Get Items per Page Value
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
				'post_type' 		=> 'portfolio',
				'posts_per_page' 	=> $portfolio_items,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'paged' 			=> $paged
			);
			
	// Only pull from selected taxonomy
	$selected_taxonomies = rwmb_meta('sd_portfolio-taxonomies', 'type=checkbox_list');

		if($selected_taxonomies && $selected_taxonomies[0] == 0) {
			unset($selected_taxonomies[0]);
		}
		
		if($selected_taxonomies){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'portfolio_filter',
				'field' 	=> 'ID',
				'terms' 	=> $selected_taxonomies
			);
		}

		$wp_query = new WP_Query($args);
	
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <?php $taxonomies = get_the_terms( get_the_ID(), 'portfolio_filter' ); ?>
      <div class="<?php if($taxonomies) : foreach ($taxonomies as $taxonomy) { echo $taxonomy->slug. ' '; } endif; ?> sd-portfolio-item span3">
        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
        <figure> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('portfolio-four-columns'); ?>
          </a>
          <div class="sd-button-container"> <a class="sd-link-icon sd-bg-trans" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">&nbsp;</a>
            <?php
				$image_id = get_post_thumbnail_id();  
				$full_image_url = wp_get_attachment_image_src($image_id,'full');  
				$full_image_url = $full_image_url[0];
			?>
            <a class="sd-lightbox-icon sd-bg-trans" rel="lightbox" title="<?php the_title(); ?>" href="<?php echo $full_image_url; ?> ">
            <?php _e('View Item', 'sd-framework'); ?>
            </a> </div>
        </figure>
        <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h4>
        <?php endif; ?>
      </div>
      <?php endwhile; ?>
    </div>
    <!--pagination-->
    <?php sd_custom_pagination();  ?>
    <!--pagination end--> 
    
  </div>
</div>
<?php get_footer(); ?>
