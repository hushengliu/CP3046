<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Felicity
 */ ?>

	<div class="clear"></div>
	<div id="footer">
	<?php if ( of_get_option('footer_widgets') == '1') { ?>
		<div id="footer-wrap">
			<?php  get_sidebar('footer'); ?>
		</div><!--footer-wrap-->
	<?php } ?>
	</div><!--footer-->
	<?php get_template_part( 'copyright' ); ?>
</div><!--grid-container-->
<?php wp_footer(); ?>
</body>
</html>