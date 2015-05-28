<script type="text/javascript">
jQuery(document).ready(function($) {

	/* Password meter */
	if ($('#upme-registration-form').length > 0) {
		$.validator.passwordRating.messages = {
			"similar-to-username": "<?php _e('Too similar to username','upme'); ?>",
			"mismatch": "<?php _e('Passwords do not match','upme'); ?>",
			"too-short": "<?php _e('Password too short','upme'); ?>",
			"very-weak": "<?php _e('Very Weak','upme'); ?>",
			"weak": "<?php _e('Weak','upme'); ?>",
			"good": "<?php _e('Good','upme'); ?>",
			"strong": "<?php _e('Strong!','upme'); ?>"
		}
		$('#upme-registration-form').validate();
		$("#user_pass,#user_pass_confirm").valid();
	}

	/* Nice file upload */
	$('.upme-fileupload').click(function(){
		$(this).next('input[type=file]').click();
	});
	
	$(':file').change(function(){
		$(this).prev('.upme-fileupload').text($(this).val());
	});

	/* Tooltips */
	$('.upme-tooltip').tipsy({
		trigger: 'hover',
		offset: 4
	});
	
	/* Check/uncheck */
	$('.upme-hide-from-public').click(function(e){
		e.preventDefault();
		if ($(this).find('i').hasClass('icon-check-empty')) {
			$(this).find('i').addClass('icon-check').removeClass('icon-check-empty');
			$(this).find('input[type=hidden]').val(1);
		} else {
			$(this).find('i').addClass('icon-check-empty').removeClass('icon-check');
			$(this).find('input[type=hidden]').val(0);
		}
	});
		
	/* Toggle edit inline */
	$('.upme-field-edit a.upme-fire-editor').click(function(e){
		e.preventDefault();
		this_form = $(this).parent().parent().parent().parent().parent();
		if ($(this_form).find('.upme-edit').is(':hidden')) {
			if ($(this_form).find('.upme-view').length > 0) {
				$(this_form).find('.upme-view').slideUp(function() {
					$(this_form).find('.upme-edit').slideDown();
					$(this_form).find('.upme-field-edit a.upme-fire-editor').html('<?php _e('View Profile','upme'); ?>');
				});
			} else {
				$(this_form).find('.upme-main').show();
				$(this_form).find('.upme-edit').slideDown();
				$(this_form).find('.upme-field-edit a.upme-fire-editor').html('<?php _e('View Profile','upme'); ?>');
			}
		} else {
			$(this_form).find('.upme-edit').slideUp(function() {
				if ($(this_form).find('.upme-main').hasClass('upme-main-compact')) {
				$(this_form).find('.upme-main').hide();
				}
				$(this_form).find('.upme-view').slideDown();
				$(this_form).find('.upme-field-edit a.upme-fire-editor').html('<?php _e('Edit Profile','upme'); ?>');
			});
		}
	});
	
	/* Registration Form: Blur on email */
	$('.upme-registration').find('#user_email').change(function(){
		var new_user_email = $(this).val();
		$('.upme-registration .upme-pic').load('<?php echo upme_url; ?>ajax/upme-get-avatar.php?email=' + new_user_email );
	});
	
	/* Change display name as User type in */
	$('.upme-registration').find('#display_name').bind('change keydown keyup',function(){
		$('.upme-registration .upme-field-name').html( $('#display_name').val() );
	});

});
</script>