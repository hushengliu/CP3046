<?php

class UPME_Save {

	public $allowed_extensions;

	function __construct() {
		
		/*Form is fired*/
		foreach($_POST as $k=>$v) {
			if (strstr($k, 'upme-submit-')) {
				
				// User ID
				$this->userid = str_replace('upme-submit-', '', $k);
				
				// Prepare fields prior to update
				$this->prepare( $_POST );
				
				// upload files
				$this->process_upload($_FILES);
				
				// Error handler
				$this->handle();
				
				// Update fields
				$this->update();
				
			}
		}

	}
	
	/*Prepare user meta*/
	function prepare ($array ) {
		foreach($array as $k => $v) {
			$k = str_replace('-'.$this->userid,'', $k);
			if ($k == 'upme-submit') continue;
			$this->usermeta[$k] = $v;
		}
		return $this->usermeta;
	}
	
	/*Process uploads*/
	function process_upload($array) {
		
		/* File upload conditions */
		$this->allowed_extensions = array("image/gif", "image/jpeg", "image/png");
		$this->max_size = 500000;
		
		if (isset($_FILES)) {
			foreach ($_FILES as $key => $array) {
				extract($array);
				if ($name) {
					$clean_key = str_replace('-'.$this->userid,'', $key);
					if ( !in_array($type, $this->allowed_extensions) || $size > $this->max_size ) {
						$this->errors[$clean_key] = __('You are not allowed to upload this file.','upme');
					} else {
					
						/*Upload image*/
						$target_path = upme_path.'uploads/';
						$target_path = $target_path . time() . '_'. basename( $name );
						$nice_url = upme_url.'uploads/';
						$nice_url = $nice_url . time() . '_'. basename( $name );
						move_uploaded_file( $tmp_name, $target_path);

						/*Now we have the nice url*/
						/*Store in usermeta*/
						update_user_meta($this->userid, $clean_key, $nice_url);
						
					}
				}
			}
		}
		
	}
	
	/*Handle/return any errors*/
	function handle() {
		foreach($this->usermeta as $key => $value) {

			/* Validate email */
			if ($key == 'user_email') {
				if (!is_email($value)) {
					$this->errors[$key] = __('E-mail address was not updated. Please enter a valid e-mail.','upme');
				}
			}
			
			/* Validate password */
			if ($key == 'user_pass') {
				if (esc_attr($value) != '') {
					if ($this->usermeta['user_pass'] != $this->usermeta['user_pass_confirm']) {
						$this->errors[$key] = __('Your passwords do not match.','upme');
					}
				}
			}
		
		}
	}
	
	/*Update user meta*/
	function update() {
		require_once(ABSPATH . 'wp-includes/pluggable.php');
		
		// empty checkboxes
		$array = get_option('upme_profile_fields');
		foreach($array as $key => $field) {
			extract($field);
			if ($array[$key]['field'] == 'checkbox') {
				update_user_meta($this->userid, $meta, null);
			}
		}
				
		foreach($this->usermeta as $key => $value) {
			
			/* Update profile when there is no error */
			if (!isset($this->errors[$key])) {
				
				// save checkboxes
				if (is_array($value)) { // checkboxes
					$value = implode(', ', $value);
				}
				
				update_user_meta($this->userid, $key, esc_attr($value));
				
				/* update core fields - email, url, pass */
				if ( (in_array( $key, array('user_email', 'user_url', 'display_name') ) ) || ($key == 'user_pass' && esc_attr($value) != '') ) {
					wp_update_user( array('ID' => $this->userid, $key => esc_attr($value)) );
				}
				
			}

		}
	}
	
	/*Get errors display*/
	function get_errors($id) {
		global $upme;
		$display = null;
		if ($this->errors) {
		$display .= '<div class="upme-errors">';
			foreach($this->errors as $newError) {
				$display .= '<span class="upme-error"><i class="icon-remove"></i>'.$newError.'</span>';
			}
		$display .= '</div>';
		} else {
			/* Success message */
			if ($id == $upme->logged_in_user) {
			$display .= '<div class="upme-success"><span><i class="icon-ok"></i>'.__('Your profile was updated.','upme').'</span></div>';
			} else {
			$display .= '<div class="upme-success"><span><i class="icon-ok"></i>'.__('Profile was updated.','upme').'</span></div>';
			}
		}
		return $display;
	}

}

$upme_save = new UPME_Save();