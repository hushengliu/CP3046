<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Felicity
 */

if ( of_get_option('post_navigation') == 'sidebar') { get_template_part('post','nav'); } 

if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
	<div id="archives" class="widget widget_archive">
		<div class="widget-title clearfix">
			<h4><?php _e( 'Archives', 'felicity' ); ?></h4>
		</div>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</div>
	<div id="meta" class="widget widget_meta">
		<div class="widget-title clearfix">
			<h4><?php _e( 'Meta', 'felicity' ); ?></h4>
		</div>	
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>
<?php endif; ?>
