<?php

/* Hook into registration form */
add_action('register_form','upme_add_custom_fields');
//add_action('register_post','upme_validate_fields',10,3);
add_action('user_register', 'upme_save_extra_fields');

//Adds custom styling to the log-in/resgister/forgot password pages
add_action('login_head', 'upme_login_head');

	function upme_add_custom_fields() {

		$fields = get_option('upme_profile_fields');
		foreach($fields as $profile_field) {
			
			extract($profile_field);
			
			if ($type == 'seperator') continue; /*Do not show seperators*/
			if ($field == 'password') continue; /*Do not allow passwords*/
			if ($meta == 'user_email') continue; /*Duplicate remove*/
			
			if (!isset($profile_field['show_in_register']) || $show_in_register == 0) continue; /*Only marked fields included*/
	
			print "<p>
					<label>$name<br/>";
		
			/*Switch field type*/
			switch ($field) {
				
				case 'text':
					print "<input type=\"text\" name=\"upme[$meta]\" id=\"upme[$meta]\" class=\"input\" value=\"".$_POST['upme'][$meta]."\" size=\"25\" />";
					break;
					
				case 'textarea':
					print "<textarea name=\"upme[$meta]\" id=\"upme[$meta]\" class=\"input upme-textarea\" size=\"20\">".stripslashes($_POST['upme'][$meta])."</textarea>";
					break;
					
			}
			
			print "</label>
					</p>";
					
		}
	}

	/* Validate extra fields */
	function upme_validate_fields ( $login, $email, $errors ){
		$form = $_POST['upme'];
		extract( $form );
		
		if ( $first_name == '' ) {
			$errors->add( 'empty_first_name', "<strong>ERROR</strong>: Please Enter your first name." );
		}

	}

	/* Save extra fields */
	function upme_save_extra_fields ( $user_id, $password = "", $meta = array() ) {
	
		$form = $_POST['upme'];
		foreach($form as $key => $value) {
			update_user_meta($user_id, $key, esc_attr($value));
				
			/* update core fields - email, url, pass */
			if ( (in_array( $key, array('user_email', 'user_url', 'display_name') ) ) ) {
				wp_update_user( array('ID' => $user_id, $key => esc_attr($value)) );
			}
				
		}
		
	}

	/**
	 * Adds custom forms to the registration forms.
	*/
	function upme_login_head(){
		wp_register_style( 'upme_login_style',upme_url.'registration/upme-register.css');
		wp_enqueue_style( 'upme_login_style');
	}