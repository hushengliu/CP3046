<?php
/* ------------------------------------------------------------------------ */
/* Theme Archive
/* ------------------------------------------------------------------------ */
get_header();

$blog_sidebar = '';

if ( isset($sd_data['blog_sidebar']) ) {
	$blog_sidebar = $sd_data['blog_sidebar'];
}
?>
<!--left col-->

<div class="container">
  <div class="row"> 
    <!--left col-->
    <div id="left-col" class="span8" <?php if ($blog_sidebar == 'left') echo 'style="float: right;"';?>>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'framework/inc/post-formats/content', get_post_format() ); ?>
      <?php endwhile; else: ?>
      <p>
        <?php _e('Sorry, no posts matched your criteria', 'sd-framework') ?>
        . </p>
      <?php endif; ?>
      <!--pagination-->
      <?php sd_custom_pagination();  ?>
      <!--pagination end--> 
    </div>
    <!--left col end--> 
    <!--sidebar-->
    <?php get_sidebar(); ?>
    <!--sidebar end--> 
  </div>
</div>
<?php get_footer(); ?>
