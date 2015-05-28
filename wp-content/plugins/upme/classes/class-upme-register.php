<?php

class UPME_Register {

	function __construct() {
		
		/*Form is fired*/
		if (isset($_POST['upme-register'])) {
			
			/* Prepare array of fields */
			$this->prepare( $_POST );
			
			/* Validate, get errors, etc before we create account */
			$this->handle();
			
			/* Create account */
			$this->create();
				
		}

	}
	
	/*Prepare user meta*/
	function prepare ($array ) {
		foreach($array as $k => $v) {
			if ($k == 'upme-register') continue;
			$this->usermeta[$k] = $v;
		}
		return $this->usermeta;
	}
	
	/*Handle/return any errors*/
	function handle() {
		require_once(ABSPATH . 'wp-includes/pluggable.php');
		foreach($this->usermeta as $key => $value) {
		
			/* Validate username */
			if ($key == 'user_login') {
				if (esc_attr($value) == '') {
					$this->errors[] = __('<strong>ERROR:</strong> Please enter a username.','upme');
				} elseif (username_exists($value)) {
					$this->errors[] = __('<strong>ERROR:</strong> This username is already registered. Please choose another one.','upme');
				}
			}
			
			/* Validate email */
			if ($key == 'user_email') {
				if (esc_attr($value) == '') {
					$this->errors[] = __('<strong>ERROR:</strong> Please type your e-mail address.','upme');
				} elseif (!is_email($value)) {
					$this->errors[] = __('<strong>ERROR:</strong> The email address isn’t correct.','upme');
				} elseif (email_exists($value)) {
					$this->errors[] = __('<strong>ERROR:</strong> This email is already registered, please choose another one.','upme');
				}
			}
		
		}
	}
	
	/*Create user*/
	function create() {
		require_once(ABSPATH . 'wp-includes/pluggable.php');
			
			/* Create profile when there is no error */
			if (!isset($this->errors)) {
				
				/* Create account, update user meta */
				$sanitized_user_login = sanitize_user($_POST['user_login']);
				
				/* Get password */
				if (isset($_POST['user_pass']) && $_POST['user_pass'] != '') {
					$user_pass = $_POST['user_pass'];
				} else {
					$user_pass = wp_generate_password( 12, false);
				}
				
				/* New user */
				$user_id = wp_create_user( $sanitized_user_login, $user_pass, $_POST['user_email'] );
				if ( ! $user_id ) {

				} else {
				
					/* Now update all user meta */
					foreach($this->usermeta as $key => $value) {
						update_user_meta($user_id, $key, esc_attr($value));

						/* update core fields - email, url, pass */
						if ( in_array( $key, array('user_email', 'user_url', 'display_name') ) ) {
							wp_update_user( array('ID' => $user_id, $key => esc_attr($value)) );
						}
					}
					
				}
				
				update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag.

				wp_new_user_notification( $user_id, $user_pass );
				
			}
			
	}
	
	/*Get errors display*/
	function get_errors() {
		global $upme;
		$display = null;
		if ($this->errors) {
		$display .= '<div class="upme-errors">';
			foreach($this->errors as $newError) {
				
				$display .= '<span class="upme-error upme-error-block"><i class="icon-remove"></i>'.$newError.'</span>';
			
			}
		$display .= '</div>';
		} else {
		
			$this->registered = 1;
			$display .= '<div class="upme-success"><span><i class="icon-ok"></i>'.__('Registration successful. Please check your email.','upme').'</span></div>';
			
			if (isset($_POST['redirect_to'])) {
				wp_redirect( $_POST['redirect_to'] );
			}
			
		}
		return $display;
	}

}

$upme_register = new UPME_Register();