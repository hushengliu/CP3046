<?php
/**
 * @package Felicity
 */
?>	
<div id="services">
	<div class="services-right">
		<h2 class="wow bounceInLeft" data-wow-delay="0.1s"><?php echo of_get_option('services_section_title'); ?></h2>
		<p class="wow bounceInRight" data-wow-delay="0.2s"><?php echo of_get_option('services_section_desc'); ?></p>
		<div class="row">
			<div class="row-item">
				<div class="service wow bounceIn" data-wow-delay="0.2s">
					<i class="fa <?php echo of_get_option('service_one_icon'); ?>"></i>
					<h3><?php echo of_get_option('service_one'); ?></h3>
					<p><?php echo of_get_option('service_one_desc'); ?></p>		
				</div><!--service-->
			</div><!--row-item-->
			<div class="row-item">
				<div class="service wow bounceIn" data-wow-delay="0.5s">
					<i class="fa <?php echo of_get_option('service_two_icon'); ?>"></i>
					<h3><?php echo of_get_option('service_two'); ?></h3>
					<p><?php echo of_get_option('service_two_desc'); ?></p>			
				</div><!--service-->
			</div><!--row-item-->
		</div><!--row-->
		<div class="row">
			<div class="row-item">
				<div class="service wow bounceIn" data-wow-delay="0.8s">
					<i class="fa <?php echo of_get_option('service_three_icon'); ?>"></i>
					<h3><?php echo of_get_option('service_three'); ?></h3>
					<p><?php echo of_get_option('service_three_desc'); ?></p>		
				</div><!--service-->
			</div><!--row-item-->
			<div class="row-item">
				<div class="service wow bounceIn" data-wow-delay="1.1s">
					<i class="fa <?php echo of_get_option('service_four_icon'); ?>"></i>
					<h3><?php echo of_get_option('service_four'); ?></h3>
					<p><?php echo of_get_option('service_four_desc'); ?></p>		
				</div><!--service-->
			</div><!--row-item-->
		</div><!--row-->
	</div><!--services-right-->
	<div class="services-left">
		<img class="wow bounceIn" data-wow-delay="0.4s" src="<?php echo esc_url(of_get_option('services_image')); ?>" alt="Services"/>
	</div><!--services-left-->
</div><!--services-->