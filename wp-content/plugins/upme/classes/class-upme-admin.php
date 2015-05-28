<?php

class UPME_Admin {

	var $options;

	/* constructor for admin panel */
	function __construct() {
		$this->slug = 'wp-upme';
		$this->tabs = array( 'general' => __('常规','upme'), 'customizer' => __('自定义','upme'), 'sync' => __('同步/工具','upme') );
		$this->default_tab = 'general';
		add_action('admin_menu', array(&$this, 'add_menu'), 9);
		add_action('admin_enqueue_scripts', array(&$this, 'add_styles'), 9);
		$this->defaults = array(
			'html_user_login_message' => sprintf(__('Please <a href="%s">log in</a> to view / edit your profile.','upme'), home_url().'/wp-login.php'),
			'html_login_to_view' => sprintf(__('Please <a href="%s">log in</a> to view this profile.','upme'), home_url().'/wp-login.php'),
			'html_private_content' => sprintf(__('This content is hidden from public. You must <a href="%s">log in</a> to view this hidden content.','upme'), home_url().'/wp-login.php?redirect_to={upme_current_uri}'),
			'clickable_profile' => 1,
			'set_password' => 1,
			'guests_can_view' => 1,
			'users_can_view' => 1,
			'style' => 'default',
			'profile_redirect' => 1,
			'profile_redirect_url' => '',
			'login_redirect' => '',
			'register_redirect' => ''
		);
		$this->colorsdefault = array(

		);
		$this->options = get_option('upme_options');
		if (!get_option('upme_options')) {
			update_option('upme_options', $this->defaults);
		}
		
		/* Store icons in array */
		$this->fontawesome = array(
			'cloud-download','cloud-upload','lightbulb','exchange','bell-alt','file-alt','beer','coffee','food','fighter-jet',
			'user-md','stethoscope','suitcase','building','hospital','ambulance','medkit','h-sign','plus-sign-alt','spinner',
			'angle-left','angle-right','angle-up','angle-down','double-angle-left','double-angle-right','double-angle-up','double-angle-down','circle-blank','circle',
			'desktop','laptop','tablet','mobile-phone','quote-left','quote-right','reply','github-alt','folder-close-alt','folder-open-alt',
			'adjust','asterisk','ban-circle','bar-chart','barcode','beaker','beer','bell','bolt','book','bookmark','bookmark-empty','briefcase','bullhorn',
			'calendar','camera','camera-retro','certificate','check','check-empty','cloud','cog','cogs','comment','comment-alt','comments','comments-alt',
			'credit-card','dashboard','download','download-alt','edit','envelope','envelope-alt','exclamation-sign','external-link','eye-close','eye-open',
			'facetime-video','film','filter','fire','flag','folder-close','folder-open','gift','glass','globe','group','hdd','headphones','heart','heart-empty',
			'home','inbox','info-sign','key','leaf','legal','lemon','lock','unlock','magic','magnet','map-marker','minus','minus-sign','money','move','music',
			'off','ok','ok-circle','ok-sign','pencil','picture','plane','plus','plus-sign','print','pushpin','qrcode','question-sign','random','refresh','remove',
			'remove-circle','remove-sign','reorder','resize-horizontal','resize-vertical','retweet','road','rss','screenshot','search','share','share-alt',
			'shopping-cart','signal','signin','signout','sitemap','sort','sort-down','sort-up','spinner','star','star-empty','star-half','tag','tags','tasks',
			'thumbs-down','thumbs-up','time','tint','trash','trophy','truck','umbrella','upload','upload-alt','user','volume-off','volume-down','volume-up',
			'warning-sign','wrench','zoom-in','zoom-out','file','cut','copy','paste','save','undo','repeat','text-height','text-width','align-left','align-right',
			'align-center','align-justify','indent-left','indent-right','font','bold','italic','strikethrough','underline','link','paper-clip','columns',
			'table','th-large','th','th-list','list','list-ol','list-ul','list-alt','arrow-down','arrow-left','arrow-right','arrow-up','caret-down',
			'caret-left','caret-right','caret-up','chevron-down','chevron-left','chevron-right','chevron-up','circle-arrow-down','circle-arrow-left',
			'circle-arrow-right','circle-arrow-up','hand-down','hand-left','hand-right','hand-up','play-circle','play','pause','stop','step-backward',
			'fast-backward','backward','forward','step-forward','fast-forward','eject','fullscreen','resize-full','resize-small','phone','phone-sign',
			'facebook','facebook-sign','twitter','twitter-sign','github','github-sign','linkedin','linkedin-sign','pinterest','pinterest-sign',
			'google-plus','google-plus-sign','sign-blank'
		);
		asort($this->fontawesome);
		
	}
	
	/* add styles */
	function add_styles(){

		/* admin panel css */
		wp_register_style( 'upme_admin',upme_url.'admin/css/upme-admin.css');
		wp_enqueue_style('upme_admin');
		
		wp_register_script('upme_admin_tipsy', upme_url.'js/jquery.tipsy.js', array('jquery') );
		wp_enqueue_script('upme_admin_tipsy');
		
		wp_register_style('upme_admin_tipsy', upme_url.'css/tipsy.css');
		wp_enqueue_style('upme_admin_tipsy');
		
		wp_register_script( 'upme_admin',upme_url.'admin/js/upme-admin.js');
		wp_enqueue_script('upme_admin');
		
		wp_register_style( 'upme_font_awesome', upme_url.'css/font-awesome.min.css');
		wp_enqueue_style('upme_font_awesome');
		
		/* google fonts */
		wp_register_style( 'upme_google_fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext');
		wp_enqueue_style('upme_google_fonts');
	
	}
	
	// add menu
	function add_menu() {
		add_submenu_page( 'options-general.php', __('User Profiles Made Easy','upme'), __('User Profiles Made Easy','upme'), 'manage_options', $this->slug, array(&$this, 'settings_page'), null);
	}
	
	// get value in admin option
	function get_value($option_id) {
		if (isset($this->options[$option_id]) && $this->options[$option_id] != '' ) {
			return $this->options[$option_id];
		} elseif (isset($this->defaults[$option_id]) && $this->defaults[$option_id] != '' ) {
			return $this->defaults[$option_id];
		} else {
			return null;
		}
	}
	
	// add normal info
	function add_plugin_info($label, $content) {
		print "<tr valign=\"top\">
				<th scope=\"row\"><label>$label</label></th>
				<td class=\"upme-label\">$content</td>
			</tr>";
	}

	// add setting field
	function add_plugin_setting($type, $id, $label, $pairs, $help, $extra=null) {
		
		print "<tr valign=\"top\">
				<th scope=\"row\"><label for=\"$id\">$label</label></th>
				<td>";
				
				switch ($type) {
				
					case 'textarea':
						$value = $this->get_value($id);
						print "<textarea name=\"$id\" type=\"text\" id=\"$id\" class=\"large-text code\" rows=\"3\">$value</textarea>";
						break;
						
					case 'input':
						$value = $this->get_value($id);
						print "<input name=\"$id\" type=\"text\" id=\"$id\" value=\"$value\" class=\"regular-text\" />";
						break;
				
					case 'select':
						print "<select name=\"$id\" id=\"$id\">";
							foreach($pairs as $k => $v) {
						
								if (is_array($v)) {
									$v = $v['name'];
								}
								
								echo '<option value="'.$k.'"';
								if (isset($this->options[$id]) && $k == $this->options[$id]) {
									echo ' selected="selected"';
								}
								echo '>';
								echo $v;
								echo '</option>';
								
							}
						print "</select>";
						break;
						
					case 'color':
						$value = $this->get_value($id);
						$default_color = $this->defaults[$id];
						print "<input name=\"$id\" type=\"text\" id=\"$id\" value=\"$value\" class=\"my-color-field\" data-default-color=\"$default_color\" />";
						break;
						
				}
		
		if ($help)
			print "<p class=\"description\">$help</p>";
		
		if (is_array($extra)) {
			echo "<div class=\"helper-wrap\">";
			foreach ($extra as $a) {
				echo $a;
			}
			echo "</div>";
		}
					
		print "</td></tr>";
		
	}
	
	// save form
	function saveform() {
		foreach($_POST as $key => $value) {
			if ($key != 'submit') {
				if ( strpos($key, 'upme') !== false ) {
					
					/*Save new fields*/
					$array_key = filter_var($key, FILTER_SANITIZE_NUMBER_INT);
					
					$new_pos = filter_var($_POST['upme_'.$array_key.'_position'], FILTER_SANITIZE_NUMBER_INT);
					
					$plain_key = str_replace('upme_'.$array_key.'_', '', $key);
					
					$form_fields[$new_pos][$plain_key] = $value;
	
					if ($plain_key == 'meta_custom' && $value != '') {
						$form_fields[$new_pos]['meta'] = $value;
					}
					
					if ($plain_key == 'icon' && $value != '') {
						$form_fields[$new_pos]['icon'] = $value;
					} else {
						$form_fields[$new_pos]['icon'] = 0;
					}
					
					if ($plain_key == 'private' && $value == 1) {
						$form_fields[$new_pos]['can_hide'] = 0;
					}
					
				} else {
				
					if (strpos($key, 'html_') !== false) {
					$this->options[$key] = stripslashes($value);
					} else {
					$this->options[$key] = esc_attr($value);
					}
				
				}
			}
		}
		if ($form_fields) {
		ksort($form_fields);
		update_option('upme_profile_fields', $form_fields);
		}
	}
	
	// add new field
	function add_field() {
		$current = get_option('upme_profile_fields');
		foreach($_POST as $key => $value) {
			if ($key != 'upme-add') {
				if ( strpos($key, 'up_') !== false ) {
				
					$plain_key = str_replace('up_', '', $key);
					
					//Error handling
					if ($plain_key == 'position') {
						if ($_POST[$key] != '' && !is_numeric($_POST[$key])) {
							$this->errors[] = __('Position must be a number.','upme');
						} elseif (isset($current[$_POST[$key]])) {
							$this->errors[] = __('A field that has the same position already exists.','upme');
						}
					}
					
					if ($plain_key == 'name') {
						if (esc_attr($_POST[$key]) == '') {
							$this->errors[] = __('Please enter a name that describes your field.','upme');
						}
					}
					
					if ($plain_key == 'meta') {
						if (  $_POST[$key] == '' && $_POST['up_meta_custom'] == '' && $_POST['up_type'] == 'usermeta' ) {
							$this->errors[] = __('You must specify a usermeta / custom field.','upme');
						}
					}
					
					if ($plain_key == 'meta_custom') {
						if (  esc_attr($_POST[$key]) == '' && $_POST['up_meta'] == '' && $_POST['up_type'] == 'usermeta' ) {
							$this->errors[] = __('You must specify a usermeta / custom field.','upme');
						} elseif (strpos($_POST[$key], ' ')) {
							$this->errors[] = __('Invalid usermeta / custom field.','upme');
						}
					}
				
				}
			}
		}
		
		/*Show any errors */
		if ($this->errors) {
			echo '<div class="error"><p>'.$this->errors[0].'</p></div>';
		} else {
		
			/*Force a position*/
			if (!$_POST['up_position']) {
				$_POST['up_position'] =  max(array_keys($current)) + 10;
			}
		
			/*Update fields*/
			if ($_POST['up_position'] == 'seperator') {
			
			$current[$_POST['up_position']]['type'] = $_POST['up_type'];
			$current[$_POST['up_position']]['name'] = $_POST['up_name'];
			$current[$_POST['up_position']]['private'] = $_POST['up_private'];
			$current[$_POST['up_position']]['deleted'] = 0;
			
			} else {
			
			$current[$_POST['up_position']]['type'] = $_POST['up_type'];
			$current[$_POST['up_position']]['name'] = $_POST['up_name'];
			$current[$_POST['up_position']]['social'] = $_POST['up_social'];
			$current[$_POST['up_position']]['can_hide'] = $_POST['up_can_hide'];
			$current[$_POST['up_position']]['field'] = $_POST['up_field'];
			$current[$_POST['up_position']]['can_edit'] = $_POST['up_can_edit'];
			if ($_POST['up_meta_custom'] != '') {
			$current[$_POST['up_position']]['meta'] = $_POST['up_meta_custom'];
			} else {
			$current[$_POST['up_position']]['meta'] = $_POST['up_meta'];
			}
			$current[$_POST['up_position']]['private'] = $_POST['up_private'];
			$current[$_POST['up_position']]['icon'] = $_POST['up_icon'];
			$current[$_POST['up_position']]['allow_html'] = $_POST['up_allow_html'];
			$current[$_POST['up_position']]['deleted'] = 0;
			
			if ($_POST['up_private'] == 1) {
				$current[$_POST['up_position']]['can_hide'] = 0;
			}
			
			if ($_POST['up_field'] != 'fileupload') {
			$current[$_POST['up_position']]['show_in_register'] = $_POST['up_show_in_register'];
			}
			
			}
		
			/*Done*/
			ksort($current);
			update_option('upme_profile_fields', $current);
			echo '<div class="updated"><p><strong>'.__('Profile field was added.','upme').'</strong></p></div>';
			
		}
		
	}

	// save default colors
	function save_default_colors() {
		$alloptions = get_option('upme_options');
		foreach( $this->colorsdefault as $k =>$v) {
			$alloptions[$k] = $v;
			$this->options[$k] = $v;
		}
	}
	
	// update settings
	function update() {
		update_option('upme_options', $this->options);
		echo '<div class="updated"><p><strong>'.__('Settings saved.','upme').'</strong></p></div>';
	}
	
	// reset settings
	function reset() {
		update_option('upme_options', $this->defaults );
		$this->options = array_merge( $this->options, $this->defaults );
		echo '<div class="updated"><p><strong>'.__('Settings are reset to default.','upme').'</strong></p></div>';
	}
	
	function reset_all() {
		global $upme;
		update_option('upme_profile_fields', $upme->fields);
		update_option('upme_options', $this->defaults );
		$this->options = array_merge( $this->options, $this->defaults );
		echo '<div class="updated"><p><strong>'.__('Settings are reset to default.','upme').'</strong></p></div>';
	}
	
	/* Get admin tabs */
	function admin_tabs( $current = null ) {
			$tabs = $this->tabs;
			$links = array();
			if ( isset ( $_GET['tab'] ) ) {
				$current = $_GET['tab'];
			} else {
				$current = $this->default_tab;
			}
			foreach( $tabs as $tab => $name ) :
				if ( $tab == $current ) :
					$links[] = "<a class='nav-tab nav-tab-active' href='?page=".$this->slug."&tab=$tab'>$name</a>";
				else :
					$links[] = "<a class='nav-tab' href='?page=".$this->slug."&tab=$tab'>$name</a>";
				endif;
			endforeach;
			foreach ( $links as $link )
				echo $link;
	}
	
	/* get tab ID and load its content */
	function get_tab_content() {
		$screen = get_current_screen();
		if( strstr($screen->id, $this->slug ) ) {
			if ( isset ( $_GET['tab'] ) ) {
				$tab = $_GET['tab'];
			} else {
				$tab = $this->default_tab;
			}
			$this->load_tab($tab);
		}
	}
	
	/* load tab */
	function load_tab($tab) {
		require_once upme_path.'admin/'.$tab.'.php';
	}

	// add settings
	function settings_page() {
	
		/**
		* @submit settings page
		*/
		if (isset($_POST['submit'])) {
			$this->saveform();
			$this->update();
		}
		
		/* Create a new field */
		if (isset($_POST['upme-add'])) {
			$this->add_field();
		}
		
		/*Trash field*/
		if (isset($_GET['trash_field']) && !isset($_POST['submit']) && !isset($_POST['reset-options']) && !isset($_POST['reset-options-fields']) ) {
			$fields = get_option('upme_profile_fields');
			$trash = $_GET['trash_field'];
			if (isset($fields[$trash])) {
				unset($fields[$trash]);
				update_option('upme_profile_fields', $fields);
				echo '<div class="updated"><p><strong>'.__('Profile field was sent to Trash.','upme').'</strong></p></div>';
			}
		}
		
		/**
		* @submit theme reset button
		*/
		if (isset($_POST['reset-custom-theme'])) {
			$this->saveform();
			$this->save_default_colors();
			$this->update();
		}
		
		/**
		* @callback to restore all options
		*/
		if (isset($_POST['reset-options'])) {
			$this->reset();
		}
		
		if (isset($_POST['reset-options-fields'])) {
			$this->reset_all();
		}
		
	?>
	
		<div class="wrap">
			<div id="icon-<?php echo $this->slug; ?>" class="icon32"><br /></div><h2 class="nav-tab-wrapper"><?php $this->admin_tabs(); ?></h2>
			<form method="post" action="">
				<?php $this->get_tab_content(); ?>
				<p class="submit">
					<input type="submit" name="submit" id="submit" value="<?php _e('Save Changes','upme'); ?>" class="button button-primary" />
					<input type="submit" name="reset-options" value="<?php _e('Reset Options','upme'); ?>" class="button button-secondary" />
					<input type="submit" name="reset-options-fields" value="<?php _e('Reset Options &amp; Default Fields','upme'); ?>" class="button button-secondary" />
				</p>
			</form>
		</div>

	<?php }

}

$upme_admin = new UPME_Admin();