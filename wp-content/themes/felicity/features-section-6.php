<?php
/**
 * @package Felicity
 */
?>	
<div id="features">
	<h2 class="section-title wow bounceInLeft" data-wow-delay="0.1s"><?php echo of_get_option('features_section_title'); ?></h2>
	<h4 class="sub-title wow bounceInRight" data-wow-delay="0.2s"><?php echo of_get_option('features_section_desc'); ?></h4>
	<div class="feature wow bounceIn" data-wow-delay="0.2s">
		<h3><?php echo of_get_option('feature_one'); ?></h3>
		<p><?php echo of_get_option('feature_one_desc'); ?></p>
		<?php if (of_get_option('feature_one_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_one_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_one_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_one_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	

	</div><!--feature-->
	<div class="feature wow bounceIn" data-wow-delay="0.5s">
		<h3><?php echo of_get_option('feature_two'); ?></h3>
		<p><?php echo of_get_option('feature_two_desc'); ?></p>
		<?php if (of_get_option('feature_two_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_two_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_two_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_two_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	
	</div><!--feature-->
	<div class="feature wow bounceIn" data-wow-delay="0.8s">
		<h3><?php echo of_get_option('feature_three'); ?></h3>
		<p><?php echo of_get_option('feature_three_desc'); ?></p>
		<?php if (of_get_option('feature_three_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_three_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_three_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_three_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	
	</div><!--feature-->
	<div class="feature wow bounceIn" data-wow-delay="1.1s">
		<h3><?php echo of_get_option('feature_four'); ?></h3>
		<p><?php echo of_get_option('feature_four_desc'); ?></p>
		<?php if (of_get_option('feature_four_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_four_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_four_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_four_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	
	</div><!--feature-->
	<div class="feature wow bounceIn" data-wow-delay="1.4s">
		<h3><?php echo of_get_option('feature_five'); ?></h3>
		<p><?php echo of_get_option('feature_five_desc'); ?></p>
		<?php if (of_get_option('feature_five_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_five_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_five_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_five_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	
	</div><!--feature-->
	<div class="feature wow bounceIn" data-wow-delay="1.7s">
		<h3><?php echo of_get_option('feature_six'); ?></h3>
		<p><?php echo of_get_option('feature_six_desc'); ?></p>
		<?php if (of_get_option('feature_six_url') !='') { ?>
			<a href="<?php echo esc_url(of_get_option('feature_six_url')); ?>">
				<div class="circle">
					<i class="fa <?php echo of_get_option('feature_six_icon'); ?>"></i>
				</div><!--circle-->
			</a>
		<?php } else { ?>
			<div class="circle">
				<i class="fa <?php echo of_get_option('feature_six_icon'); ?>"></i>
			</div><!--circle-->			
		<?php } ?>	
	</div><!--feature-->
</div><!--features-->