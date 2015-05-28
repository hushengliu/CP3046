<?php
/**
 * @package Felicity
 */
?>			
<div id="address-bar">
	<div class="address-box">
		<span><?php echo of_get_option('header_address'); ?></span>
	</div>
	<div class="phone-box">
		<span class="top-email"><i class="fa fa-phone"></i><?php echo of_get_option('header_phone'); ?></span>
		<span class="top-email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo of_get_option('header_email'); ?>"><?php echo of_get_option('header_email'); ?></a></span>
	</div>
</div><!---address-bar-->