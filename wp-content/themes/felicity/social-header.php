<?php
/**
 * @package Felicity
 */
?>			
<div id="social-bar">
	<ul>
		<?php if(of_get_option('facebook_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('facebook_link')); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('flickr_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('flickr_link')); ?>" target="_blank" title="Flickr"><i class="fa fa-flickr"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('rss_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('rss_link')); ?>" target="_blank" title="RSS"><i class="fa fa-rss"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('twitter_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('twitter_link')); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('youtube_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('youtube_link')); ?>" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('pinterest_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('pinterest_link')); ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('tumblr_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('tumblr_link')); ?>" target="_blank" title="Tumblr"><i class="fa fa-tumblr"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('google_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('google_link')); ?>" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('dribbble_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('dribbble_link')); ?>" target="_blank" title="Dribbble"><i class="fa fa-dribbble"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('linkedin_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('linkedin_link')); ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
		</li>
		<?php endif; ?>
		<?php if(of_get_option('instagram_link')): ?>
		<li>
			<a href="<?php echo esc_url(of_get_option('instagram_link')); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
		</li>
		<?php endif; ?>
	</ul>
</div><!--social-bar-->