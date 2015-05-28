/* Confirm deletion */
function confirmAction(){
	var confirmed = confirm("Are you sure you want to delete this field?");
	return confirmed;
}

jQuery(document).ready(function($) {

	/* show/toggle choices */
	$('.upme-inputtype select').change(function(){
		val = $(this).val();
		if (val == 'select' || val == 'radio' || val == 'checkbox') {
			$(this).parent().parent().parent().find('.upme-choices').show();
		} else {
			$(this).parent().parent().parent().find('.upme-choices').hide();
		}
	});

	/* Tooltips */
	$('.upme-tooltip').tipsy({
		trigger: 'hover',
		gravity: 's',
		offset: 4
	});
	
	/* Tooltip in table */
	$('.upme-tooltip2').tipsy({
		trigger: 'hover',
		gravity: 'w',
		offset: 4
	});
	
	/* Tooltip for icon */
	$('.upme-tooltip3').tipsy({
		trigger: 'hover',
		offset: 4
	});
	
	/* Toggle ADD form */
	$('.upme-toggle').click(function(){
		$('.upme-add-form').show();
	});
	
	$('.upme-add-form-cancel').click(function(){
		$('.upme-add-form').hide();
	});
	
	/* Toggle inline edit */
	$('.upme-edit').click(function(){
		if ($(this).parent().parent().next('tr.upme-editor').is(':hidden')) {
		$(this).parent().parent().next('tr.upme-editor').show();
		} else {
		$(this).parent().parent().next('tr.upme-editor').hide();
		}
		$(this).parent().parent().parent().find('tr.upme-editor').not($(this).parent().parent().next('tr.upme-editor')).hide();
		return false;
	});
	
	$('.upme-inline-cancel').click(function(){
		$(this).parent().parent().parent().hide();
	});
	
	/* Toggle icon edit */
	$('.upme-inline-icon-edit').click(function(e){
		e.preventDefault();
		if ($(this).parent().parent().find('.upme-icons').is(':hidden')) {
		$(this).parent().parent().find('.upme-icons').show();
		} else {
		$(this).parent().parent().find('.upme-icons').hide();
		}
	});
	
	/* Switch field type */
	$('#up_type').change(function(){
		if ($(this).val() == 'seperator') {
			$('#up_meta,#up_meta_custom,#up_social,#up_can_edit,#up_can_hide,#up_tooltip,#up_field').parent().parent().hide();
			$('.upme-icons-holder').hide();
		} else {
			$('#up_meta,#up_meta_custom,#up_social,#up_can_edit,#up_can_hide,#up_tooltip,#up_field').parent().parent().show();
			$('.upme-icons-holder').show();
		}
	});

});