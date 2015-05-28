<?php
/* ------------------------------------------------------------------------ */
/* Theme Footer
/* ------------------------------------------------------------------------ */
global $sd_data 
?>
<?php if ( $sd_data['footer_twitter'] == 1 ) : ?>
<?php get_template_part('framework/inc/latest-tweets'); ?>
<?php endif; ?>
<?php if ( $sd_data['widgetized_footer'] == 1 ) : ?>
<!-- footer -->

<footer id="footer"> 
  <!-- footer content -->
  <div class="container"> 
    
    <!-- footer widgets -->
    <div class="footer-widgets">
      <div class="row">
        <div class="span4">
          <?php dynamic_sidebar( 'footer-left-sidebar' ); ?>
        </div>
        <div class="span4">
          <?php dynamic_sidebar( 'footer-middle-sidebar' ); ?>
        </div>
        <div class="span4">
          <?php dynamic_sidebar( 'footer-right-sidebar' ); ?>
        </div>
      </div>
    </div>
    <!-- footer widgets end --> 
  </div>
  <!-- footer content end --> 
</footer>
<!-- footer end -->
<?php endif; ?>

<!-- copyright -->
<div class="copyright clearfix">
  <div class="container">
    <div class="row">
      <div class="span4">
        <?php /* Replace default text if option is set */
	if( $sd_data['copyright'] != '') : ?>
        <p><?php echo stripslashes($sd_data['copyright']); ?></p>
        <?php else : ?>
        <p>Copyright &copy; <?php echo the_time('Y'); ?> - <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' ); ?> </a> </p>
        <?php endif; ?>
      </div>
      <div class="span8">
        <div class="footer-menu">
          <?php
			// Using wp_nav_menu() to display menu
			wp_nav_menu( array(
				'menu' => 'Footer', // Select the menu to show by Name
				'class' => '',
				'menu_class' =>'',
				'menu_id' => '',
				'container' => false, // Remove the navigation container div
				'theme_location' => 'Footer Menu'
				)
			);
			?>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright container end --> 
</div>
<!-- copyright end -->
<?php wp_footer(); ?>
</body></html>