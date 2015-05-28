<?php

class UPME_Login {

	function __construct() {
		
		/*Form is fired*/
		if (isset($_POST['upme-login'])) {
						
			/* Prepare array of fields */
			$this->prepare( $_POST );
			
			/* Validate, get errors, etc before we login a user */
			$this->handle();

		}

	}
	
	/*Prepare user meta*/
	function prepare ($array ) {
		foreach($array as $k => $v) {
			if ($k == 'upme-login') continue;
			$this->usermeta[$k] = $v;
		}
		return $this->usermeta;
	}
	
	/*Handle/return any errors*/
	function handle() {
		require_once(ABSPATH . 'wp-includes/pluggable.php');
		foreach($this->usermeta as $key => $value) {
		
			if ($key == 'user_login') {
				if (sanitize_user($value) == '') {
					$this->errors[] = __('<strong>ERROR:</strong> The username field is empty.','upme');
				}
			}
			
			if ($key == 'user_pass') {
				if (esc_attr($value) == '') {
					$this->errors[] = __('<strong>ERROR:</strong> The password field is empty.','upme');
				}
			}
		
		}
	
			/* attempt to signon */
			if (!$this->errors) {
				$creds = array();
				$creds['user_login'] = sanitize_user($_POST['user_login']);
				$creds['user_password'] = $_POST['user_pass'];
				$creds['remember'] = $_POST['rememberme'];
				$user = wp_signon( $creds, false );
				if ( is_wp_error($user) ) {
					if ($user->get_error_code() == 'invalid_username') {
						$this->errors[] = __('<strong>ERROR:</strong> Invalid Username was entered.','upme');
					}
					if ($user->get_error_code() == 'incorrect_password') {
						$this->errors[] = __('<strong>ERROR:</strong> Incorrect password was entered.','upme');
					}
				}
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
			if (isset($_REQUEST['redirect_to'])) {
				$url = $_REQUEST['redirect_to'];
			} elseif (isset($_POST['redirect_to'])) {
				$url = $_POST['redirect_to'];
			} else {
				$url = $_SERVER['REQUEST_URI'];
			}
			wp_redirect( $url );
		}
		return $display;
	}

}

$upme_login = new UPME_Login();