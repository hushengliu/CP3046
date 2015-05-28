<h3><?php _e('Profile Fields Cutomizer','upme'); ?></h3>
<p><?php _e('Organize profile fields, add custom fields to profiles, control privacy of each field, and more using the following customizer.','upme'); ?></p>

<a href="#upme-add-form" class="button button-secondary upme-toggle"><i class="icon-plus"></i>&nbsp;&nbsp;<?php _e('Click here to add new field','upme'); ?></a>

<table class="form-table upme-add-form">
	
	<tr valign="top">
	<th scope="row"><label for="up_position"><?php _e('Position','upme'); ?></label></th>
	<td>
		<input name="up_position" type="text" id="up_position" value="<?php if (isset($_POST['up_position']) && $this->errors) echo $_POST['up_position']; ?>" class="small-text" />
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Please use a unique position. Position lets you place the new field in the place you want exactly in Profile view.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_position"><?php _e('Type','upme'); ?></label></th>
	<td>
		<select name="up_type" id="up_type">
			<option value="usermeta"><?php _e('Profile Field','upme'); ?></option>
			<option value="seperator"><?php _e('Seperator','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('You can create a seperator or a usermeta (profile field)','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_field"><?php _e('Editor / Input Type','upme'); ?></label></th>
	<td>
		<select name="up_field" id="up_field">
			<?php global $upme; foreach($upme->allowed_inputs as $input=>$label) { ?>
				<option value="<?php echo $input; ?>"><?php echo $label; ?></option>
			<?php } ?>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('When user edit profile, this field can be an input (text, textarea, image upload, etc.)','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_meta"><?php _e('Meta Key / Field','upme'); ?></label></th>
	<td>
		<select name="up_meta" id="up_meta">
			<option value=""><?php _e('Choose a user field','upme'); ?></option>
			<?php
			$current_user = wp_get_current_user();
			if( $all_meta_for_user = get_user_meta( $current_user->ID ) ) {
				foreach($all_meta_for_user as $user_meta => $array) {
				?>
				<option value="<?php echo $user_meta; ?>"><?php echo $user_meta; ?></option>
				<?php
				}
			}
			?>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Choose from a predefined/available list of meta fields (usermeta) or use Custom to define a unique custom field (e.g. city, address, phone)','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_meta_custom"><?php _e('Custom Meta Key / Field','upme'); ?></label></th>
	<td>
		<input name="up_meta_custom" type="text" id="up_meta_custom" value="<?php if (isset($_POST['up_meta_custom']) && $this->errors) echo $_POST['up_meta_custom']; ?>" class="regular-text" />
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Enter a custom profile field If you want to create a custom meta for user profile and do not want to use predefined meta fields above.','upme'); ?>"></i>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row"><label for="up_name"><?php _e('Label','upme'); ?></label></th>
	<td>
		<input name="up_name" type="text" id="up_name" value="<?php if (isset($_POST['up_name']) && $this->errors) echo $_POST['up_name']; ?>" class="regular-text" />
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Enter the label / name of this field as you want it to appear in front-end (Profile edit/view)','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_tooltip"><?php _e('Tooltip Text','upme'); ?></label></th>
	<td>
		<input name="up_tooltip" type="text" id="up_tooltip" value="<?php if (isset($_POST['up_tooltip']) && $this->errors) echo $_POST['up_tooltip']; ?>" class="regular-text" />
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('A tooltip text can be useful for social buttons on profile header.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_social"><?php _e('This field is social','upme'); ?></label></th>
	<td>
		<select name="up_social" id="up_social">
			<option value="0"><?php _e('No','upme'); ?></option>
			<option value="1"><?php _e('Yes','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('A social field can show a button with your social profile in the head of your profile. Such as Facebook page, Twitter, etc.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_can_edit"><?php _e('User can edit','upme'); ?></label></th>
	<td>
		<select name="up_can_edit" id="up_can_edit">
			<option value="1"><?php _e('Yes','upme'); ?></option>
			<option value="0"><?php _e('No','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Users can edit this profile field or not.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_allow_html"><?php _e('Allow HTML Content','upme'); ?></label></th>
	<td>
		<select name="up_allow_html" id="up_allow_html">
			<option value="0"><?php _e('No','upme'); ?></option>
			<option value="1"><?php _e('Yes','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('If yes, users will be able to write HTML code in this field.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_can_hide"><?php _e('User can hide','upme'); ?></label></th>
	<td>
		<select name="up_can_hide" id="up_can_hide">
			<option value="1"><?php _e('Yes','upme'); ?></option>
			<option value="0"><?php _e('No','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Users can hide this profile field or not.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_private"><?php _e('This field is private','upme'); ?></label></th>
	<td>
		<select name="up_private" id="up_private">
			<option value="0"><?php _e('No','upme'); ?></option>
			<option value="1"><?php _e('Yes','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Make this field Private. Only admins can see private fields.','upme'); ?>"></i>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><label for="up_show_in_register"><?php _e('Show in WordPress Registration form','upme'); ?></label></th>
	<td>
		<select name="up_show_in_register" id="up_show_in_register">
			<option value="0"><?php _e('No','upme'); ?></option>
			<option value="1"><?php _e('Yes','upme'); ?></option>
		</select>
		<i class="icon-question-sign upme-tooltip2" title="<?php _e('Show this profile field in WordPress registration form','upme'); ?>"></i>
	</td>
	</tr>

	<tr valign="top" class="upme-icons-holder">
	<th scope="row"><label><?php _e('Icon for this field','upme'); ?></label></th>
	<td>
		<label class="upme-icons"><input type="radio" name="up_icon" value="0" /> <?php _e('None','upme'); ?></label>
		<?php foreach($this->fontawesome as $icon) { ?>
		<label class="upme-icons"><input type="radio" name="up_icon" value="<?php echo $icon; ?>" /><i class="icon-<?php echo $icon; ?> upme-tooltip3" title="<?php echo $icon; ?>"></i></label>
		<?php } ?>
	</td>
	</tr>
	
	<tr valign="top">
	<th scope="row"></th>
	<td>
		<input type="submit" name="upme-add" id="upme-add" value="<?php _e('Submit New Field','upme'); ?>" class="button button-primary" />
		<input type="button" class="button button-secondary upme-add-form-cancel" value="<?php _e('Cancel','upme'); ?>" />
	</td>
	</tr>
	
</table>

<!-- show customizer -->

<table class="widefat fixed upme-table" cellspacing="0">
	<thead>
    <tr>
        <tr>
            <th class="manage-column column-columnname" scope="col"><?php _e('Position / ID','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Use position to control the order of this field. Lower positions appear first.','upme'); ?>"></i></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Field Type','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Seperator is a legend/section that has a set of fields and appear in Profile Edit form. A Profile Field is the standard profile field which can be any user meta/field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Field Input','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('This column tells you the field input that will appear to user for this data.','upme'); ?>"></i></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Meta Key','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('This is the meta field that stores this specific profile data (e.g. first_name stores First Name)','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Icon','upme'); ?></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Label','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('The label that appears in front-end profile view or edit.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Tooltip','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Please note that tooltips can be activated only for Social buttons such as Facebook, E-mail. Enter tooltip text here.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Social','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Make a field Social to have it appear as a button on the head of profile such as Facebook, Twitter, Google+ buttons.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('User can edit','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Allow or do not allow user to edit this field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Allow HTML','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('If yes, users will be able to write HTML code in this field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('User can hide','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Allow user to show/hide this profile field from public view.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Private','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Only admins can see private fields.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Show in Registration','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Show this profile field in WordPress registration form','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Edit','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Click to edit this profile field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Trash','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Click to remove this profile field.','upme'); ?>"></i></th>
        </tr>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <tr>
            <th class="manage-column column-columnname" scope="col"><?php _e('Position / ID','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Use position to control the order of this field. Lower positions appear first.','upme'); ?>"></i></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Field Type','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Seperator is a legend/section that has a set of fields and appear in Profile Edit form. A Profile Field is the standard profile field which can be any user meta/field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Field Input','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('This column tells you the field input that will appear to user for this data.','upme'); ?>"></i></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Meta Key','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('This is the meta field that stores this specific profile data (e.g. first_name stores First Name)','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Icon','upme'); ?></th>
            <th class="manage-column column-columnname" scope="col"><?php _e('Label','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('The label that appears in front-end profile view or edit.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Tooltip','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Please note that tooltips can be activated only for Social buttons such as Facebook, E-mail. Enter tooltip text here.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Social','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Make a field Social to have it appear as a button on the head of profile such as Facebook, Twitter, Google+ buttons.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('User can edit','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Allow or do not allow user to edit this field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Allow HTML','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('If yes, users will be able to write HTML code in this field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('User can hide','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Allow user to show/hide this profile field from public view.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Private','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Only admins can see private fields.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Show in Registration','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Show this profile field in WordPress registration form','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Edit','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Click to edit this profile field.','upme'); ?>"></i></th>
			<th class="manage-column column-columnname" scope="col"><?php _e('Trash','upme'); ?><i class="icon-question-sign upme-tooltip" title="<?php _e('Click to remove this profile field.','upme'); ?>"></i></th>
        </tr>
    </tr>
    </tfoot>
	
	<tbody>
	
		<?php
		$fields = get_option('upme_profile_fields');
		ksort($fields);
		$i = 0;
		foreach($fields as $pos => $array) {
			extract($array); $i++;
		?>

		<tr class="<?php if ($i %2) { echo 'alternate'; } else { echo ''; } ?>">
		
            <td class="column-columnname">
				<?php echo $pos; ?>
			</td>
			
            <td class="column-columnname">
				<?php
				if ($type == 'seperator') {
					echo __('Seperator','upme');
				} else {
					echo __('Profile Field','upme');
				}
				?>
			</td>
			
			<td class="column-columnname">
				<?php
				if ($array['field']) {
					echo $field;
				} else {
					echo '&mdash;';
				}
				?>
			</td>
			
			
            <td class="column-columnname">
				<?php
				if ($array['meta']) {
					echo $meta;
				} else {
					echo '&mdash;';
				}
				?>
			</td>
			
            <td class="column-columnname">
				<?php
					if ($array['icon']) {
						echo '<i class="icon-'.$icon.'"></i>';
					} else {
						echo '&mdash;';
					}
				?>
			</td>
			
            <td class="column-columnname">
				<?php
					if ($array['name']) $name = $array['name'];
					if ($name) echo $name;
				?>
			</td>
			
            <td class="column-columnname">
				<?php
					if ($array['tooltip']) $tooltip = $array['tooltip']; else $tooltip = '&mdash;';
					echo $tooltip;
				?>
			</td>
			
            <td class="column-columnname">
				<?php
				if (isset($array['social'])) {
					if ($social == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
			<td class="column-columnname">
				<?php
				if (isset($array['can_edit'])) {
					if ($can_edit == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
			<td class="column-columnname">
				<?php
				if (isset($array['allow_html'])) {
					if ($allow_html == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
			<td class="column-columnname">
				<?php
				if (isset($array['can_hide']) && $private != 1) {
					if ($can_hide == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
            <td class="column-columnname">
				<?php
				if (isset($array['private'])) {
					if ($private == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
            <td class="column-columnname">
				<?php
				if (isset($array['show_in_register'])) {
					if ($show_in_register == 1) {
						echo '<i class="upme-ticked"></i>';
					}
				}
				?>
			</td>
			
			<td class="column-columnname">
				<a href="#quick-edit" class="upme-edit"><i class="icon-pencil"></i></a>
			</td>
			
			<td class="column-columnname">
				<a href="<?php echo add_query_arg( array ('trash_field' => $pos ) ); ?>" class="upme-trash" onclick="return confirmAction()"><i class="icon-remove"></i></a>
			</td>
			
        </tr>
		
		<!-- edit field -->
		<tr class="upme-editor">
		
            <td class="column-columnname" colspan="3">

				<p>
				<label for="upme_<?php echo $pos; ?>_position"><?php _e('Position','upme'); ?></label>
				<input name="upme_<?php echo $pos; ?>_position" type="text" id="upme_<?php echo $pos; ?>_position" value="<?php echo $pos; ?>" class="small-text" />
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Please use a unique position. Position lets you place the new field in the place you want exactly in Profile view.','upme'); ?>"></i>
				</p>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_type"><?php _e('Field Type','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_type" id="upme_<?php echo $pos; ?>_type">
						<option value="usermeta" <?php selected('usermeta', $type); ?>><?php _e('Profile Field','upme'); ?></option>
						<option value="seperator" <?php selected('seperator', $type); ?>><?php _e('Seperator','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('You can create a seperator or a usermeta (profile field)','upme'); ?>"></i>
				</p>
				
				<?php if ($type != 'seperator') { ?>
				
				<p class="upme-inputtype">
				<label for="upme_<?php echo $pos; ?>_field"><?php _e('Field Input','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_field" id="upme_<?php echo $pos; ?>_field">
						<?php global $upme; foreach($upme->allowed_inputs as $input=>$label) { ?>
							<option value="<?php echo $input; ?>" <?php selected($input, $field); ?>><?php echo $label; ?></option>
						<?php } ?>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('When user edit profile, this field can be an input (text, textarea, image upload, etc.)','upme'); ?>"></i>
				</p>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_meta"><?php _e('Choose Meta Field','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_meta" id="upme_<?php echo $pos; ?>_meta">
						<option value=""><?php _e('Choose a user field','upme'); ?></option>
						<?php
						$current_user = wp_get_current_user();
						if( $all_meta_for_user = get_user_meta( $current_user->ID ) ) {
							foreach($all_meta_for_user as $user_meta => $user_meta_array) {
							?>
							<option value="<?php echo $user_meta; ?>" <?php selected($user_meta, $meta); ?>><?php echo $user_meta; ?></option>
							<?php
							}
						}
						?>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Choose from a predefined/available list of meta fields (usermeta) or use Custom to define a unique custom field (e.g. city, address, phone)','upme'); ?>"></i>
				</p>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_meta_custom"><?php _e('Custom Meta Field','upme'); ?></label>
				<input name="upme_<?php echo $pos; ?>_meta_custom" type="text" id="upme_<?php echo $pos; ?>_meta_custom" value="<?php if (!isset($all_meta_for_user[$meta])) echo $meta; ?>" />
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Enter a custom profile field If you want to create a custom meta for user profile and do not want to use predefined meta fields above.','upme'); ?>"></i>
				</p>
				
				<?php } ?>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_name"><?php _e('Label / Name','upme'); ?></label>
				<input name="upme_<?php echo $pos; ?>_name" type="text" id="upme_<?php echo $pos; ?>_name" value="<?php echo $name; ?>" />
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Enter the label / name of this field as you want it to appear in front-end (Profile edit/view)','upme'); ?>"></i>
				</p>
				
			</td>
			<td class="column-columnname" colspan="3">

				<?php if ($type != 'seperator') { ?>
				
				<?php if ($social == 1) { ?>
				<p>
				<label for="upme_<?php echo $pos; ?>_tooltip"><?php _e('Tooltip Text','upme'); ?></label>
				<input name="upme_<?php echo $pos; ?>_tooltip" type="text" id="upme_<?php echo $pos; ?>_tooltip" value="<?php echo $tooltip; ?>" />
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('A tooltip text can be useful for social buttons on profile header.','upme'); ?>"></i>
				</p>
				<?php } ?>
				
				<?php if ($field != 'password') { ?>
				<p>
				<label for="upme_<?php echo $pos; ?>_social"><?php _e('This field is social','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_social" id="upme_<?php echo $pos; ?>_social">
						<option value="0" <?php selected(0, $social); ?>><?php _e('No','upme'); ?></option>
						<option value="1" <?php selected(1, $social); ?>><?php _e('Yes','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('A social field can show a button with your social profile in the head of your profile. Such as Facebook page, Twitter, etc.','upme'); ?>"></i>
				</p>
				<?php } ?>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_can_edit"><?php _e('User can edit','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_can_edit" id="upme_<?php echo $pos; ?>_can_edit">
						<option value="1" <?php selected(1, $can_edit); ?>><?php _e('Yes','upme'); ?></option>
						<option value="0" <?php selected(0, $can_edit); ?>><?php _e('No','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Users can edit this profile field or not.','upme'); ?>"></i>
				</p>
				
				<?php if (!isset($array['allow_html'])) { $allow_html = 0; } ?>
				<p>
				<label for="upme_<?php echo $pos; ?>_allow_html"><?php _e('Allow HTML','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_allow_html" id="upme_<?php echo $pos; ?>_allow_html">
						<option value="0" <?php selected(0, $allow_html); ?>><?php _e('No','upme'); ?></option>
						<option value="1" <?php selected(1, $allow_html); ?>><?php _e('Yes','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('If yes, users will be able to write HTML code in this field.','upme'); ?>"></i>
				</p>
				
				<?php if ($private != 1) { ?>
				<p>
				<label for="upme_<?php echo $pos; ?>_can_hide"><?php _e('User can hide','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_can_hide" id="upme_<?php echo $pos; ?>_can_hide">
						<option value="1" <?php selected(1, $can_hide); ?>><?php _e('Yes','upme'); ?></option>
						<option value="0" <?php selected(0, $can_hide); ?>><?php _e('No','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Users can hide this profile field or not.','upme'); ?>"></i>
				</p>
				<?php } ?>
				
				<p>
				<label for="upme_<?php echo $pos; ?>_private"><?php _e('This field is private','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_private" id="upme_<?php echo $pos; ?>_private">
						<option value="0" <?php selected(0, $private); ?>><?php _e('No','upme'); ?></option>
						<option value="1" <?php selected(1, $private); ?>><?php _e('Yes','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Make this field Private. Only admins can see private fields.','upme'); ?>"></i>
				</p>
				
				<?php } ?>
				
				<?php if ($private != 1 && $meta != 'user_email' && $field != 'fileupload' ) { ?>
				<p>
				<label for="upme_<?php echo $pos; ?>_show_in_register"><?php _e('Include in WordPress registration','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_show_in_register" id="upme_<?php echo $pos; ?>_show_in_register">
						<option value="0" <?php selected(0, $show_in_register); ?>><?php _e('No','upme'); ?></option>
						<option value="1" <?php selected(1, $show_in_register); ?>><?php _e('Yes','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Show this profile field in WordPress registration form','upme'); ?>"></i>
				</p>
				<?php } ?>
				
			</td>
			<td class="column-columnname" colspan="9">
			
				<?php if ($type != 'seperator') { ?>
				
				<?php if (in_array($field, array('select','radio','checkbox'))) {
					$show_choices = null; } else { $show_choices = 'upme-hide'; } ?>
				
				<p class="upme-choices <?php echo $show_choices; ?>">
				<label for="upme_<?php echo $pos; ?>_choices" style="display:block"><?php _e('Available Choices','upme'); ?></label>
				<textarea name="upme_<?php echo $pos; ?>_choices" type="text" id="upme_<?php echo $pos; ?>_choices" class="large-text"><?php if (isset($array['choices'])) echo $choices; ?></textarea>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('Enter one choice per line please. The choices will be available for front end user to choose from.','upme'); ?>"></i>
				</p>
				
				<?php if (!isset($array['predefined_loop'])) $predefined_loop = 0; ?>
				
				<p class="upme-choices <?php echo $show_choices; ?>">
				<label for="upme_<?php echo $pos; ?>_predefined_loop" style="display:block"><?php _e('Enable Predefined Choices','upme'); ?></label>
				<select name="upme_<?php echo $pos; ?>_predefined_loop" id="upme_<?php echo $pos; ?>_predefined_loop">
						<option value="0" <?php selected(0, $predefined_loop); ?>><?php _e('None','upme'); ?></option>
						<option value="countries" <?php selected('countries', $predefined_loop); ?>><?php _e('List of Countries','upme'); ?></option>
				</select>
				<i class="icon-question-sign upme-tooltip2" title="<?php _e('You can enable a predefined filter for choices. e.g. List of countries It enables country selection in profiles and saves you time to do it on your own.','upme'); ?>"></i>
				</p>
				
				<p>
				
					<span style="display:block;font-weight:bold;margin: 0 0 10px 0"><?php _e('Field Icon:','upme'); ?>&nbsp;&nbsp;
					<?php if ($icon) { ?><i class="icon-<?php echo $icon; ?>"></i><?php } else { _e('None','upme'); } ?>&nbsp;&nbsp;
					<a href="#changeicon" class="button button-secondary upme-inline-icon-edit"><?php _e('Change Icon','upme'); ?></a></span>
					
					<label class="upme-icons"><input type="radio" name="upme_<?php echo $pos; ?>_icon" value="" <?php checked('', $fonticon); ?> /> <?php _e('None','upme'); ?></label>
					
					<?php foreach($this->fontawesome as $fonticon) { ?>
					<label class="upme-icons"><input type="radio" name="upme_<?php echo $pos; ?>_icon" value="<?php echo $fonticon; ?>" <?php checked($fonticon, $icon); ?> /><i class="icon-<?php echo $fonticon; ?> upme-tooltip3" title="<?php echo $fonticon; ?>"></i></label>
					<?php } ?>
				
				</p><div class="clear"></div>
				
				<?php } ?>
				
				<p>
				<input type="submit" name="submit" value="<?php _e('Update','upme'); ?>" class="button button-primary" />
				<input type="button" value="<?php _e('Cancel','upme'); ?>" class="button button-secondary upme-inline-cancel" />
				</p>

			</td>
			
        </tr>
		
		<?php } ?>
	
	</tbody>

</table>