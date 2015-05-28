<?php

class UPME {

	function __construct() {
	
		add_action('wp_enqueue_scripts', array(&$this, 'add_style_scripts_frontend'), 9);
		
		/* Allowed input types */
		$this->allowed_inputs = array(
			'text' => __('Text','upme'),
			'fileupload' => __('Image Upload','upme'),
			'textarea' => __('Textarea','upme'),
			'select' => __('Select Dropdown','upme'),
			'radio' => __('Radio','upme'),
			'checkbox' => __('Checkbox','upme'),
			'password' => __('Password','upme')
		);
		
		/* Core registration fields */
		$set_pass = $this->get_option('set_password');
		if ($set_pass) {
		$this->registration_fields = array( 
			50 => array( 
				'icon' => 'user', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_login', 
				'name' => __('Username','upme'),
				'required' => 1
			),
			100 => array( 
				'icon' => 'envelope', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_email', 
				'name' => __('E-mail','upme'),
				'required' => 1,
				'can_hide' => 1,
			),
			150 => array( 
				'icon' => 'lock', 
				'field' => 'password', 
				'type' => 'usermeta', 
				'meta' => 'user_pass', 
				'name' => __('Password','upme'),
				'required' => 1,
				'can_hide' => 0,
				'help' => __('Password must be at least 7 characters long. To make it stronger, use upper and lower case letters, numbers and symbols.','upme')
			),
			200 => array( 
				'icon' => 0, 
				'field' => 'password', 
				'type' => 'usermeta', 
				'meta' => 'user_pass_confirm', 
				'name' => 0,
				'required' => 1,
				'can_hide' => 0,
				'help' => __('Type your password again.','upme')
			),
			250 => array(
				'icon' => 0,
				'field' => 'password_indicator',
				'type' => 'usermeta'
			)
		);
		} else {
		$this->registration_fields = array( 
			50 => array( 
				'icon' => 'user', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_login', 
				'name' => __('Username','upme'),
				'required' => 1
			),
			100 => array( 
				'icon' => 'envelope', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_email', 
				'name' => __('E-mail','upme'),
				'required' => 1,
				'can_hide' => 1,
				'help' => __('A password will be e-mailed to you.','upme')
			)
		);
		}
		
		/* Core login fields */
		$this->login_fields = array( 
			50 => array( 
				'icon' => 'user', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_login', 
				'name' => __('Username','upme'),
				'required' => 1
			),
			100 => array( 
				'icon' => 'lock', 
				'field' => 'password', 
				'type' => 'usermeta', 
				'meta' => 'user_pass', 
				'name' => __('Password','upme'),
				'required' => 1
			)
		);
		
		/* Setup profile fields */
		$this->fields = array(
			50 => array( 
				'type' => 'seperator', 
				'name' => __('Profile Info','upme'),
				'private' => 0,
				'deleted' => 0
			),
			60 => array( 
				'icon' => 'camera', 
				'field' => 'fileupload', 
				'type' => 'usermeta', 
				'meta' => 'user_pic', 
				'name' => __('Profile Picture','upme'),
				'can_hide' => 0,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			100 => array( 
				'icon' => 'user', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'first_name', 
				'name' => __('First Name','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			101 => array( 
				'icon' => 0, 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'last_name', 
				'name' => __('Last Name','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			150 => array( 
				'icon' => 'user', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'display_name', 
				'name' => __('Display Name','upme'),
				'can_hide' => 0,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			200 => array( 
				'icon' => 'pencil',
				'field' => 'textarea',
				'type' => 'usermeta',
				'meta' => 'description',
				'name' => __('About / Bio','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0,
				'allow_html' => 1
			),
			210 => array(
				'icon' => 'picture',
				'field' => 'fileupload',
				'type' => 'usermeta',
				'meta' => 'custom_pic',
				'name' => __('Custom Photo 1','upme'),
				'can_hide' => 0,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			250 => array( 
				'type' => 'seperator', 
				'name' => __('Contact Info','upme'),
				'private' => 0,
				'deleted' => 0
			),
			300 => array( 
				'icon' => 'envelope', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_email', 
				'name' => __('Email Address','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 1,
				'tooltip' => __('Send E-mail','upme'),
				'deleted' => 0
			),
			400 => array( 
				'icon' => 'link', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'user_url', 
				'name' => __('Website','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 0,
				'deleted' => 0
			),
			450 => array( 
				'type' => 'seperator', 
				'name' => __('Social Profiles','upme'),
				'private' => 0,
				'deleted' => 0
			),
			500 => array( 
				'icon' => 'facebook', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'facebook', 
				'name' => __('Facebook','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 1,
				'tooltip' => __('Connect via Facebook','upme'),
				'deleted' => 0
			),
			510 => array( 
				'icon' => 'twitter', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'twitter', 
				'name' => __('Twitter Username','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 1,
				'tooltip' => __('Connect via Twitter','upme'),
				'deleted' => 0
			),
			520 => array( 
				'icon' => 'google-plus', 
				'field' => 'text', 
				'type' => 'usermeta', 
				'meta' => 'googleplus', 
				'name' => __('Google+','upme'),
				'can_hide' => 1,
				'can_edit' => 1,
				'private' => 0,
				'social' => 1,
				'tooltip' => __('Connect via Google+','upme'),
				'deleted' => 0
			),
			550 => array( 
				'type' => 'seperator', 
				'name' => __('Account Info','upme'),
				'private' => 0,
				'deleted' => 0
			),
			600 => array(
				'icon' => 'lock',
				'field' => 'password',
				'type' => 'usermeta',
				'meta' => 'user_pass',
				'name' => __('New Password','upme'),
				'can_hide' => 0,
				'can_edit' => 1,
				'private' => 1,
				'social' => 0,
				'deleted' => 0
			),
			700 => array(
				'icon' => 0,
				'field' => 'password',
				'type' => 'usermeta',
				'meta' => 'user_pass_confirm',
				'name' => 0,
				'can_hide' => 0,
				'can_edit' => 1,
				'private' => 1,
				'social' => 0,
				'deleted' => 0
			)
		);
		
		/* Store default profile fields */
		if (!get_option('upme_profile_fields')) {
		update_option('upme_profile_fields', $this->fields);
		}
		
		/*Create a generic profile page*/
		add_action( 'wp_loaded', array(&$this, 'create_profile_page'), 9);
		
		/*Setup redirection*/
		add_action( 'wp_loaded', array(&$this, 'upme_redirect'), 9);
		
		/*Setup global vars*/
		add_action( 'wp_loaded', array(&$this, 'upme_globals'), 9);
		
		/*Should we override "default avatar"*/
		add_filter( 'get_avatar', array(&$this, 'replace_avatar'), 10, 3 );
		
		/*Current page of users*/
		if (!isset($_REQUEST['userspage']) || $_REQUEST['userspage'] == 0 ) {
			$this->current_users_page = 1;
		} else {
			$this->current_users_page = $_REQUEST['userspage'];
		}
		
	}
	
	/* Replace avatar */
	function replace_avatar( $avatar, $id_or_email, $size) {
		$user_id = $id_or_email->user_id;
		if (get_the_author_meta('user_pic', $user_id ) != '') {
			$avatar = '<img src="'.get_the_author_meta('user_pic', $user_id ).'" alt="" width="'.$size.'" height="'.$size.'" class="avatar avatar-'.$size.' photo">';
		}
		return $avatar;
	}
	
	/*Globals*/
	function upme_globals() {
		$this->current_page = $_SERVER['REQUEST_URI'];
	}
	
	/*Setup redirection*/
	function upme_redirect() {
		global $pagenow;
		
		/* Not admin */
		if (!current_user_can('manage_options')) {
			
			/* Redirect profile.php */
			if ($pagenow == 'profile.php') {
				if ($this->get_option('profile_redirect') != 0) {
					if ($this->get_option('profile_redirect') == 2 && $this->get_option('profile_redirect_url') != '') {
						wp_redirect ( $this->get_option('profile_redirect_url') );
					} else {
						wp_redirect( get_page_link( get_option('upme_profile_page') ) );
					}
				}
			}
			
			/* Redirect wp-login.php */
			if ($pagenow == 'wp-login.php' && !isset($_REQUEST['action']) ) {
				if ($this->get_option('login_redirect') != '') {
					$url = $this->get_option('login_redirect');
					if (isset($_REQUEST['redirect_to'])) {
						$url = add_query_arg('redirect_to', $_REQUEST['redirect_to'], $url );
					}
					wp_redirect ( $url );
				}
			}
			
			/* Redirect action=register */
			if ($pagenow == 'wp-login.php' && isset($_REQUEST['action']) && $_REQUEST['action'] == 'register' ) {
				if ($this->get_option('register_redirect') != '') {
					wp_redirect ( $this->get_option('register_redirect') );
				}
			}
			
		}

	}
	
	/*Create profile page */
	function create_profile_page() {
		if (!get_option('upme_profile_page')) {
			$new = array(
			  'post_title'    => __('View Profile','upme'),
			  'post_type'     => 'page',
			  'post_name'     => 'profile',
			  'post_content'  => '[upme]',
			  'post_status'   => 'publish',
			  'comment_status' => 'closed',
			  'ping_status' => 'closed',
			  'post_author' => 1
			);
			$new_page = wp_insert_post( $new, FALSE );
			if ($new_page) {
				update_option('upme_profile_page', $new_page );
			}
		}
	}
	
	/*Get profile link by ID*/
	function profile_link ( $id ) {
		return add_query_arg( array( 'viewuser' => $id ), get_page_link( get_option('upme_profile_page') ) );
	}
	
	/* get setting */
	function get_option($option) {
		$settings = get_option('upme_options');
		if (isset($settings[$option])) {
			return $settings[$option];
		}
	}

	/* register styles */
	function add_style_scripts_frontend(){
	
		/* Tipsy script */
		wp_register_script('upme_tipsy', upme_url.'js/jquery.tipsy.js', array('jquery') );
		wp_enqueue_script('upme_tipsy');
		/* Tipsy css */
		wp_register_style('upme_tipsy', upme_url.'css/tipsy.css');
		wp_enqueue_style('upme_tipsy');

		/* Google fonts */
		wp_register_style( 'upme_google_fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext');
		wp_enqueue_style('upme_google_fonts');

		/* Font Awesome */
		wp_register_style( 'upme_font_awesome', upme_url.'css/font-awesome.min.css');
		wp_enqueue_style('upme_font_awesome');
		
		/* Main css file */
		wp_register_style( 'upme_css', upme_url.'css/upme.css');
		wp_enqueue_style('upme_css');
		
		/* Add style */
		if ($this->get_option('style')) {
		wp_register_style( 'upme_style', upme_url.'styles/'.$this->get_option('style').'.css');
		wp_enqueue_style('upme_style');
		}
		
		/* Responsive */
		wp_register_style( 'upme_responsive', upme_url.'css/upme-responsive.css');
		wp_enqueue_style('upme_responsive');
		
		/* jQuery validate */
		wp_register_script('upme_validate', upme_url.'js/jquery.validate.js' );
		wp_enqueue_script('upme_validate');
		
		wp_register_script('upme_validate_pass', upme_url.'js/jquery.validate.password.js' );
		wp_enqueue_script('upme_validate_pass');
		
		wp_register_style( 'upme_password_meter', upme_url.'css/password-meter.css');
		wp_enqueue_style('upme_password_meter');

	}
	
	/* Display shortcode */
	function display( $args=array() ) {
	
		global $post;
	
		/* Capture logged in user ID */
		if (is_user_logged_in()) {
			$current_user = wp_get_current_user();
			if ( ($current_user instanceof WP_User) ) {
				$this->logged_in_user = $current_user->ID;
			}
		}
		
		/* Arguments */
		$defaults = array(
			'id' => null,
			'group' => null,
			'width' => 1,
			'view' => null,
			'show_stats' => null,
			'show_social_bar' => null,
			'use_in_sidebar' => null,
			'users_per_page' => null,
			'hide_until_search' => null
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		
		$sidebar_class = null;
		if ($use_in_sidebar) $sidebar_class = 'upme-sidebar';
		
		/* Using group shuts down id */
		if (!$group) {
			if ($id == 'author' && isset($post->post_author) ) {
				$id = $post->post_author;
			} elseif ($this->user_exists($id)) {
				$id = $id;
			} elseif (isset($_REQUEST['viewuser']) && $this->user_exists($_REQUEST['viewuser'] ) && ( $this->get_option('users_can_view') || (!$this->get_option('users_can_view') && current_user_can('manage_options') )) && !$use_in_sidebar ) {
				$id = $_REQUEST['viewuser'];
			} else {
				$id = $this->logged_in_user;
			}
		}
		
		/* If no ID is set, normally logged out*/
		/* He must login to view his profile.*/
		if (!$group) {
			if ($id == null && !is_user_logged_in()) {
				return $this->login_to_view_your_profile();
			} elseif ($id && !is_user_logged_in() && !$this->guests_can_view() ) {
				return $this->login_to_view_profile();
			} else {
				return $this->view_profile( $id, $width, $view, $group, $show_stats, $show_social_bar, $use_in_sidebar, $users_per_page );
			}
		}
		
		/* If group of users is used */
		if ($group) {
			if (!is_user_logged_in() && !$this->guests_can_view() ) {
				return $this->login_to_view_profile();
			} else {
				return $this->view_profile( $id, $width, $view, $group, $show_stats, $show_social_bar, $use_in_sidebar, $users_per_page, $hide_until_search );
			}
		}

	}
	
	/* Return true if guests can view profiles */
	function guests_can_view(){
		if ($this->get_option('guests_can_view') == 1)
			return true;
		return false;
	}
	
	/* Login to view profile */
	function login_to_view_profile(){
		$display = null;
		$display .= '<div class="upme-wrap">';
		$display .= wpautop($this->get_option('html_login_to_view'));
		$display .= '</div>';
		return $display;
	}
	
	/* Login to view your profile */
	function login_to_view_your_profile(){
		$display = null;
		$display .= '<div class="upme-wrap">';
		$display .= wpautop($this->get_option('html_user_login_message'));
		$display .= '</div>';
		return $display;
	}
	
	/* Display pagination class */
	function pagination ($users_per_page, $users) {
		$display = null;
		
		/*Prepare loop*/
		if ($users == 'all') {
			$args = array( 'orderby' => 'registered', 'order' => 'DESC' );
			$args = $this->search_param($args);
			$all_users = get_users( $args );
		} else {
			$list_of_users = explode(',', $users);
			$args = array( 'include' => $list_of_users, 'orderby' => 'registered', 'order' => 'DESC' );
			$args = $this->search_param($args);
			$all_users = get_users( $args );
		}
		
		/* Count of users returned */
		$count = count($all_users);
		if ($count > $users_per_page) { // activate page links
		
					$display .= '<div class="upme-navi">';
					
					/* How many links will we display ? */
					$this->num_of_links = ceil($count / $users_per_page);
					
					/* Setup navi */
					for( $i=1; $i <= $this->num_of_links;$i++) {
					
						if ($this->current_users_page > $this->num_of_links) {
							$this->current_users_page = 1;
						}
					
						$link = add_query_arg( array('userspage' => $i ) );
						
						if ($this->current_users_page+1 <= $this->num_of_links ) {
						$next_link = add_query_arg( array('userspage' => $this->current_users_page+1) );
						} else {
						$next_link = null;
						}
				
						if ($this->current_users_page-1 <= $this->num_of_links && $this->current_users_page != 1 ) {
						$previous_link = add_query_arg( array('userspage' => $this->current_users_page-1) );
						} else {
						$previous_link = null;
						}
										
						if ($i == 1) { // first
							if ($this->current_users_page > 1) {
							$display .= '<a href="'.$link.'" class="page gradient"><span>'.__('first','upme').'</span></a>';
							}
							if ($previous_link) $display .= '<a href="'.$previous_link.'" class="page gradient"><span>'.__('previous','upme').'</span></a>';
						}
					
						if ($i == $this->current_users_page) {
							$display .= '<span class="page active">'.$i.'</span>';
						} else {
							$display .= '<a href="'.$link.'" class="page gradient"><span>'.$i.'</span></a>';
						}

						if ($i == $this->num_of_links) { // last
							if ($next_link) $display .= '<a href="'.$next_link.'" class="page gradient"><span>'.__('next','upme').'</span></a>';
							if ($this->current_users_page < $this->num_of_links) {
							$display .= '<a href="'.$link.'" class="page gradient"><span>'.__('last','upme').'</span></a>';
							}
						}
						
					}
					
					$display .= '</div>';
		}
		
		return $display;
	}
	
	/* Setup which results appear on page */
	function setup_page( $args, $users_per_page ) {
		if ($this->current_users_page > $this->num_of_links) {
			$current_page = 0;
		} else {
			$current_page = $this->current_users_page - 1;
		}
		$offset = $users_per_page * ($current_page);
		$args['number'] = $users_per_page;
		$args['offset'] = $offset;
		return $args;
	}
	
	/* Setup search form */
	function search( $args=array() ) {
	
		/* Arguments */
		$defaults = array(
			'autodetect' => 'on',
			'use_in_sidebar' => null,
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
	
		$sidebar_class = null;
		if ($use_in_sidebar) $sidebar_class = 'upme-sidebar';
				
		$display = null;
		if ( ( $this->allow_search && $autodetect == 'on' ) || (!$this->allow_search && $autodetect=='off' )  ) {
		$display .= '<div class="upme-wrap upme-wrap-form '.$sidebar_class.'">
					<div class="upme-inner">
						<div class="upme-head">'.__('Search Users','upme').'</div>
						<form action="" method="get">
							<p class="upme-p">
								<input type="text" class="upme-input" value="'.$_REQUEST['search'].'" name="search" placeholder="'.__('ID, username, e-mail address or site URL','upme').'" />
							</p>
							<p class="upme-p">
								<input type="text" class="upme-input upme-input-left" value="'.$_REQUEST['bynickname'].'" name="bynickname" placeholder="'.__('Display name','upme').'" />
								<input type="text" class="upme-input upme-input-right" value="'.$_REQUEST['byname'].'" name="byname" placeholder="'.__('First or Last name','upme').'" />
							</p><div class="upme-clear"></div>
							<p class="upme-p">
								<input type="hidden" name="page_id" value="'.$_REQUEST['page_id'].'" />
								<input type="submit" class="upme-button-alt" value="'.__('Filter','upme').'" />
							</p><div class="upme-clear"></div>
						</form>
					</div>
					</div>';
					
		}
		
		return $display;
	}
	
	/* Apply search params $_REQUEST */
	function search_param( $args ) {
		global $wpdb;
		
			if (isset($_REQUEST['search'])) {
				$args['search'] = esc_attr($_REQUEST['search']);
			}
			
			$user_ids = array();
			$user_query = null;
			
			if (isset($_REQUEST['byname']) && !empty($_REQUEST['byname']) ) {
				$s = $_REQUEST['byname'];
				$user_query .= "meta_key='first_name' AND meta_value LIKE '%".$s."%' OR meta_key='last_name' AND meta_value LIKE '%".$s."%'";
			}
			
			if (isset($_REQUEST['bynickname']) && !empty($_REQUEST['bynickname']) ) {
				$s = $_REQUEST['bynickname'];
				if ($user_query) {
				$user_query .= " OR meta_key='display_name' AND meta_value LIKE '%".$s."%'";
				} else {
				$user_query .= "meta_key='display_name' AND meta_value LIKE '%".$s."%'";
				}
			}
			
			if (!empty($user_query)) {
				$wp_users = $wpdb->get_results("SELECT DISTINCT user_id FROM $wpdb->usermeta WHERE ($user_query)");
				foreach($wp_users as $uid) {
					array_push($user_ids,$uid->user_id);
				}
				$args['include'] = $user_ids;
				if (empty($user_ids)) {
					$args['search'] = 'none';
				}
			}
			
		return $args;
	}
	
	/* View profile area */
	function view_profile( $id=null, $width=null, $view=null, $group=null, $show_stats=null, $show_social_bar=null, $use_in_sidebar=null, $users_per_page=null, $hide_until_search=null ) {
		
		global $upme_save;
		
		$display = null;
		
		/* Search running? */
		if (isset($_REQUEST['search'])) {
			$hide_until_search = false;
		}
		
		$sidebar_class = null;
		if ($use_in_sidebar) $sidebar_class = 'upme-sidebar';
		
		/* Ignore id if group is used */
		if ($group) {
		
			/*allow search*/
			$this->allow_search = true;
					
			/*pagination*/
			if (!$hide_until_search) {
			
				if ($users_per_page) $display .= $this->pagination( $users_per_page, $group );
			
			}
			
			/* Loop of users */
			if ($group != 'all') {
				$list_of_users = explode(',', $group);
				$args = array( 'include' => $list_of_users, 'orderby' => 'registered', 'order' => 'DESC' );
			} else {
				$args = array( 'orderby' => 'registered', 'order' => 'DESC' );
			}
			
			/*Setup offset/page and array of users*/
			if ($users_per_page) {
				$args = $this->setup_page( $args, $users_per_page );
			}
			
			/*Modify args*/
			$args = $this->search_param($args);
			
			$get_users = get_users( $args );
			foreach($get_users as $user){
				$users[] = $user->ID;
			}
			
		} else {
			$users[] = $id;
		}
	
		/*Loop and display users*/
		if (!$hide_until_search) {
		
		
		if ($users) {
		foreach($users as $id) {
		
		$display .= '<div class="upme-wrap upme-'.$id.' upme-width-'.$width.' '.$sidebar_class.'">
					<div class="upme-inner">
						
						<div class="upme-head">
							
							<div class="upme-left">
								<div class="upme-pic">'.$this->pic($id, 50).'</div>';
								
								if ($this->can_edit_profile($this->logged_in_user, $id)) {
													
								$display .= '<div class="upme-name">
												<div class="upme-field-name">';
												
												if ($this->get_option('clickable_profile')) {
												$display .= '<a href="'.$this->profile_link($id).'">';
												$display .= get_the_author_meta('display_name', $id);
												$display .= '</a>';
												} else {
												$display .= get_the_author_meta('display_name', $id);
												}
												
												$display .= '</div>
												<div class="upme-field-edit"><a href="#edit" class="upme-button-alt upme-fire-editor">'.__('Edit Profile','upme').'</a></div>
										</div>';
										
								} else {
								
								$display .= '<div class="upme-name">
												<div class="upme-field-name upme-field-name-wide">';
												
												if ($this->get_option('clickable_profile')) {
												$display .= '<a href="'.$this->profile_link($id).'">';
												$display .= get_the_author_meta('display_name', $id);
												$display .= '</a>';
												} else {
												$display .= get_the_author_meta('display_name', $id);
												}
												
												$display .= '</div>
															</div>';
								
								}
								
							$display .= '</div>';
							
							if ($width == 2) {
								$display .= '<div class="upme-clear"></div>';
							}
							
							$display .= '<div class="upme-right">';
							
							if ($show_social_bar != 'no') {
								$display .= $this->show_user_social_profiles($id);
							}
								
							if ($show_stats != 'no') {
								$display .= $this->show_user_stats($id);
							}
								
							$display .= '</div><div class="upme-clear"></div>
							
						</div>
						
						<div class="upme-main upme-main-'.$view.'">';
						
						/*Display errors*/
						if (isset($_POST['upme-submit-'.$id])) {
						$display .= $upme_save->get_errors( $id );
						}
							
						$display .= $this->show_profile_fields($id, $view);
						$display .= $this->edit_profile_fields($id, $width, $sidebar_class);
						
						$display .= '</div>
						
					</div>
				</div>';
				
		}
		} else {
			$display .= '<p>'.__('No users found matching the selected criteria.','upme').'</p>';
		}
		
		} /* hide_until_search argument */
		
		/* pagination */
		if (!$hide_until_search) {
			if ($group) {
				if ($users_per_page) {
					$display .= '<div class="upme-clear"></div>';
					$display .= $this->pagination( $users_per_page, $group );
				}
			}
		}
				
		return $display;
		
	}
	
	/*Show user stats*/
	function show_user_stats($id) {
	return '<div class="upme-stats">
				<div class="upme-stats-i"><i class="icon-rss"></i><span>'.$this->get_entries_num($id).'</span></div>
				<div class="upme-stats-i"><i class="icon-comments-alt"></i><span>'.$this->get_comments_num($id).'</span></div>
			</div>';
	}
	
	/* Can edit user profile */
	function can_edit_profile($logged_in, $profile_id) {
		if ($logged_in == $profile_id || ( current_user_can('edit_user', $profile_id) ) )
			return true;
	}
	
	/* Bool user exists by ID */
	function user_exists ( $id ) {
		$userdata = get_userdata( $id );
		if ($userdata==false)
			return false;
		return true;
	}
	
	/* Get picture by ID */
	function pic( $id, $size ) {
		if (get_the_author_meta('user_pic', $id) != '') {
			return '<img src="'.get_the_author_meta('user_pic', $id).'" class="avatar avatar-50" />';
		} else {
			return get_avatar($id, $size);
		}
	}
	
	/* Edit profile fields */
	function edit_profile_fields($id, $width=null, $sidebar_class=null) {
		
		global $predefined;
		
		if ($this->can_edit_profile($this->logged_in_user, $id)) {
		$display = null;
		
		$display .= '<form action="" method="post" enctype="multipart/form-data">';
		
		$array = get_option('upme_profile_fields');

		foreach(get_option('upme_profile_fields') as $key => $field) {
			extract($field);
			
			/* seperator */
			if ( $type == 'seperator' && $deleted == 0 ) {
				$display .= '<div class="upme-field upme-seperator upme-edit">'.$name.'</div>';
			}
			
			/* user meta - editing fields */
			if ( $type == 'usermeta' && $deleted == 0 ) {
				
				$display .= '<div class="upme-field upme-edit">';
				
				/* Show the label */
				if (isset($array[$key]['name']) && $name) {
					$display .= '<label class="upme-field-type" for="'.$meta.'-'.$id.'">';
					if (isset($array[$key]['icon']) && $icon) {
						$display .= '<i class="icon-'.$icon.'"></i>';
					} else {
						$display .= '<i class="icon-none"></i>';
					}
					$display .= '<span>'.$name.'</span></label>';
				} else {
					if (isset($array[$key]['icon']) && $icon) {
						$display .= '<label class="upme-field-type upme-field-type-width-'.$width.'" for="'.$meta.'-'.$id.'"><i class="icon-'.$icon.'"></i></label>';
					} else {
					$display .= '<label class="upme-field-type upme-field-type-width-'.$width.' upme-field-type-'.$sidebar_class.'">&nbsp;</label>';
					}
				}
				
				$display .= '<div class="upme-field-value">';
				
				if ($can_edit == 0) {
					$disabled = 'disabled="disabled"';
				} else {
					$disabled = null;
				}
					
					switch($field) {
						case 'textarea':
							$display .= '<textarea '.$disabled.' class="upme-input" name="'.$meta.'-'.$id.'" id="'.$meta.'-'.$id.'">'.get_the_author_meta($meta, $id).'</textarea>';
							break;
							
						case 'text':
							$display .= '<input '.$disabled.' type="text" class="upme-input" name="'.$meta.'-'.$id.'" id="'.$meta.'-'.$id.'" value="'.get_the_author_meta($meta, $id).'" />';
							break;
							
						case 'select':
						
							if (isset($array[$key]['predefined_loop']) ) {
							$loop = $predefined->get_array( $array[$key]['predefined_loop'] );
							}
							if (isset($array[$key]['choices']) && $array[$key]['choices'] != '') {
							$loop = explode(PHP_EOL, $choices);
							}
							
							if (isset($loop)) {
								$display .= '<select '.$disabled.' class="upme-input" name="'.$meta.'-'.$id.'" id="'.$meta.'-'.$id.'">';
								foreach($loop as $option) {
								$display .= '<option value="'.$option.'" '.selected( get_the_author_meta($meta, $id), $option, 0 ).'>'.$option.'</option>';
								}
								$display .= '</select>';
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'radio':
							if (isset($array[$key]['choices'])) {
							$loop = explode(PHP_EOL, $choices);
							}
							if (isset($loop) && $loop[0] != '') {
								foreach($loop as $option) {
									$display .= '<label class="upme-radio"><input '.$disabled.' type="radio" name="'.$meta.'-'.$id.'" value="'.$option.'" '.checked( get_the_author_meta($meta, $id), $option, 0 );
									$display .= '/> '.$option.'</label>';
								}
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'checkbox':
							if (isset($array[$key]['choices'])) {
							$loop = explode(PHP_EOL, $choices);
							}
							if (isset($loop) && $loop[0] != '') {
								foreach($loop as $option) {
									$display .= '<label class="upme-checkbox"><input '.$disabled.' type="checkbox" name="'.$meta.'-'.$id.'[]" value="'.$option.'" ';
									$values = explode(', ', get_the_author_meta($meta, $id));
									if (in_array($option, $values)) {
									$display .= 'checked="checked"';
									}
									$display .= '/> '.$option.'</label>';
								}
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'password':
							$display .= '<input '.$disabled.' type="password" class="upme-input" name="'.$meta.'-'.$id.'" id="'.$meta.'-'.$id.'" value="" autocomplete="off" />';
							
							if ($meta == 'user_pass') {
							$display .= '<div class="upme-help">'.__('If you would like to change the password type a new one. Otherwise leave this blank.','upme').'</div>';
							} elseif ($meta == 'user_pass_confirm') {
							$display .= '<div class="upme-help">'.__('Type your new password again.','upme').'</div>';
							}
							break;
							
						case 'fileupload':
						
							if ($meta == 'user_pic') {
								$display .= '<div class="upme-note"><strong>Current Picture:</strong></div>';
								if (get_the_author_meta('user_pic', $id) != '') {
									$display .= '<div class="upme-note"><img src="'.get_the_author_meta('user_pic', $id).'" alt="" /></div>';
								} else {
									$display .= '<div class="upme-note">'.get_avatar($id, 50).'</div>';
									$display .= '<div class="upme-note">'.__('You can sign up at <a href="http://en.gravatar.com/">Gravatar</a> to have a globally recognized avatar or upload a custom profile picture below.','upme').'</div><div class="upme-clear"></div>';
								}
							} else {
							
								if (get_the_author_meta($meta, $id) != '') {
									$display .= '<div class="upme-note"><img src="'.get_the_author_meta($meta, $id).'" alt="" /></div>';
								}
							
							}
						
							$display .= '<div id="'.$meta.'-'.$id.'" class="upme-fileupload upme-button-alt">'.__('Choose File','upme').'</div>
										<input '.$disabled.' type="file" name="'.$meta.'-'.$id.'" />';
						
							break;
					}
					
					/*User can hide this from public*/
					if (isset($array[$key]['can_hide']) && $can_hide == 1 ) {
						
						/* user hide from public */
						if (get_the_author_meta('hide_'.$meta, $id) == 1) {
							$class = 'icon-check';
						} else {
							$class = 'icon-check-empty';
						}
						
						$display .= '<div class="upme-hide-from-public">
										<i class="'.$class.'"></i>'.__('Hide from Public','upme').'
										<input type="hidden" name="hide_'.$meta.'-'.$id.'" id="hide_'.$meta.'-'.$id.'" value="'.get_the_author_meta('hide_'.$meta, $id).'" />
									</div>';

					} elseif ($can_hide == 0 && $private == 0) {
						$display .= '<div class="upme-hide-from-public upme-disable">
										'.sprintf(__('%s must be publicly visible.','upme'), $name).'
									</div>';
					}
					
				$display .= '</div>';

				$display .= '</div><div class="upme-clear"></div>';
			}
		}
		
		$display .= '<div class="upme-field upme-edit">
						<label class="upme-field-type upme-field-type-width-'.$width.' upme-field-type-'.$sidebar_class.'">&nbsp;</label>
						<div class="upme-field-value">
							<input type="submit" name="upme-submit-'.$id.'" class="upme-button" value="'.__('Update Profile','upme').'" />
						</div>
					</div><div class="upme-clear"></div>';
					
		$display .= '</form>';
		
		return $display;
		}
	}
	
	/* user flag */
	function user_flag($meta, $id) {
		global $predefined;
		$user_country = get_the_author_meta($meta, $id);
		$countries = $predefined->get_array('countries');
		foreach($countries as $code => $country) {
			if ($country == $user_country) {
				return '<img src="'.upme_url.'img/assets/flags/'.strtolower($code).'.png" class="upme-img-normal" />';
			}
		}
	}
	
	/* Display profile fields */
	function show_profile_fields($id, $view) {
	
		$display = null;
		
		$fullname = null;
		
		$profile_fields = get_option('upme_profile_fields');
		
		/*If user specified view (specific fields)
		It should be included (filter profile fields
		to show only these fields*/
		if ($view) {
			$view_fields = explode(',',$view);
			foreach($profile_fields as $key => $array) {
				if (!in_array($key, $view_fields)) {
					unset($profile_fields[$key]);
				}
			}
		}
		/*Done fitlering*/

		foreach($profile_fields as $key => $field) {
			extract($field);
			if ($type == 'usermeta' && get_the_author_meta($meta, $id) != '' && $deleted == 0 ) {
				if ($social == 0 || ( $social == 1 && $meta =='user_email' ) || !isset($profile_fields[$key]['social']) ) {
			
				/* Do not show private fields */
				if ($private == 0 || ($private == 1 && current_user_can ('manage_options') ) ) {
					if (get_the_author_meta('hide_'.$meta, $id) == 0 || ( get_the_author_meta('hide_'.$meta, $id) == 1 && $this->can_edit_profile($this->logged_in_user, $id) ) ) {
			
						if ($meta == 'first_name') {
							$display .= '<div class="upme-field upme-view">
											<div class="upme-field-type">';
						
								if (isset($profile_fields[$key]['icon']) && $icon) {
									$display .= '<i class="icon-'.$icon.'"></i>';
								} else {
									$display .= '<i class="icon-none"></i>';
								}
											
							$display .= '<span>'.__('Name','upme').'</span></div>
											<div class="upme-field-value"><span>'.$this->get_user_name($id).'</span></div>
									</div><div class="upme-clear"></div>';
						
						} elseif ($meta=='last_name') { 

						} else {
						
						/* Do not show these fields */
						if ($meta == 'display_name') continue;
						if ($meta == 'user_pass') continue;
						if ($meta == 'user_pass_confirm') continue;
						if ($meta == 'user_pic') continue;
										
						/* Show these fields */
						$display .= '<div class="upme-field upme-view">
											<div class="upme-field-type">';
											
								if (isset($profile_fields[$key]['icon']) && $icon) {
									$display .= '<i class="icon-'.$icon.'"></i>';
								} else {
									$display .= '<i class="icon-none"></i>';
								}
								
								$display .= '<span>'.$name.'</span></div>
											<div class="upme-field-value">';
											
											if ($field == 'fileupload') {
												
												$display .= '<img src="'.get_the_author_meta($meta, $id).'" alt="" />';
											
											} else {

												if (isset($profile_fields[$key]['allow_html']) && $allow_html == 1) {
													$display .= html_entity_decode(get_the_author_meta($meta, $id));
												} else {
													$display .= '<span>';
													
													/* Append country with flag */
													if (isset($profile_fields[$key]['predefined_loop']) && $predefined_loop == 'countries') {
														$display .= $this->user_flag($meta, $id);
													}
													
													$display .= get_the_author_meta($meta, $id);
													
													
													$display .= '</span>';
												}

											}
									
									$display .= '</div>
									</div><div class="upme-clear"></div>';
									
						}
					
					}
				}
				
				}
			}
		}
		
		return $display;
	}
	
	/*Get social profiles of user */
	function show_user_social_profiles( $id ) {
		$display = null;
		$array = get_option('upme_profile_fields');
		$display .= '<div class="upme-social">';
		$profile_fields = get_option('upme_profile_fields');
		foreach($profile_fields as $key => $field) {
			extract($field);
			if ( $type == 'usermeta' && isset($profile_fields[$key]['social']) && $social == 1 && get_the_author_meta($meta, $id) != '' &&  ( get_the_author_meta('hide_'.$meta, $id) == 0 || ( get_the_author_meta('hide_'.$meta, $id) == 1 && $this->can_edit_profile($this->logged_in_user, $id) ) ) ) {
				
				$display .= '<div class="upme-'.$icon.'"><a href="';
				
				if ($meta == 'user_email') { $display .= 'mailto:'; }
				
				if ($meta == 'twitter') {
					$meta_value = 'http://twitter.com/'.get_the_author_meta($meta, $id);
				} else {
					$meta_value = get_the_author_meta($meta, $id);
				}
				$display .= $meta_value;
				
				$display .= '"';
				if (isset( $array[$key]['tooltip'] ) && $tooltip) {
				$display .= ' class="upme-tooltip" title="'.$tooltip.'"';
				}
				$display .= '><i class="icon-'.$icon.'"></i></a></div>';
			}
			
		}
		$display .= '</div><div class="upme-clear"></div>';
		return $display;
	}
	
	/*Get full name of user */
	function get_user_name( $id ) {
		$name = null;
		if (get_the_author_meta('first_name', $id) || get_the_author_meta('last_name', $id)) {
			if (get_the_author_meta('first_name', $id) != '' ) {
				$name .= get_the_author_meta('first_name', $id).' ';
			}
			if (get_the_author_meta('last_name', $id) != '' ) {
				$name .= get_the_author_meta('last_name', $id);
			}
		}
		return $name;
	}
	
	/*Get number of entries*/
	function get_entries_num( $id ) {
		$count=  count_user_posts( $id );
		if ($count == 1) {
			return sprintf(__('%s entry','upme'), $count);
		} else {
			return sprintf(__('%s entries','upme'), $count);
		}
	}
	
	/*Get number of comments */
	function get_comments_num( $id ) {
		$args = array('user_id' => $id);
		$comments = get_comments( $args );
		$count = count($comments);
		if ($count == 1) {
			return sprintf(__('%s comment','upme'), $count);
		} else {
			return sprintf(__('%s comments','upme'), $count);
		}
	}
	
	/*Post value*/
	function post_value($meta) {
		global $upme_register;
		if (isset($_POST['upme-register'])) {
			if (isset($_POST[$meta]) ) {
				return $_POST[$meta];
			}
		} else {
			if (strstr($meta, 'country')) {
			return 'United States';
			}
		}
	}
	
	/* Show registration form */
	function show_registration( $args=array() ) {

		global $post, $upme_register;
		
		/* Arguments */
		$defaults = array(
			'use_in_sidebar' => null,
			'redirect_to' => $this->current_page
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		
		$sidebar_class = null;
		if ($use_in_sidebar) $sidebar_class = 'upme-sidebar';
		
		$display = null;
		
		$display .= '<div class="upme-wrap upme-registration '.$sidebar_class.'">
					<div class="upme-inner">
						
						<div class="upme-head">
							
							<div class="upme-left">
								<div class="upme-pic">';
								
								if (isset($_POST['upme-register']) && $_POST['user_email'] != '' ) {
									$display .= $this->pic($_POST['user_email'], 50);
								} else {
									$display .= $this->pic('', 50);
								}
								
								$display .= '</div>';
								
								$display .= '<div class="upme-name">
								
												<div class="upme-field-name upme-field-name-wide">';
												
												if (isset($_POST['upme-register']) && $_POST['display_name'] != '' ) {
													$display .= $_POST['display_name'];
												} else {
													$display .= __('Your display name will appear here.','upme');
												}
												
												$display .= '</div>
												
										</div>';
								
							$display .= '</div>';
							
							
							$display .= '<div class="upme-right">';
								
							$display .= '</div><div class="upme-clear"></div>
							
						</div>
						
						<div class="upme-main">';
						
						/*Display errors*/
						if (isset($_POST['upme-register'])) {
						$display .= $upme_register->get_errors();
						}
						
						$display .= $this->show_register_form( $sidebar_class, $redirect_to );

						$display .= '</div>
						
					</div>
				</div>';

		
		return $display;
		
	}
	
	/* Display registration form */
	function show_register_form( $sidebar_class=null, $redirect_to=null ){
		global $upme_register, $predefined;
		$display = null;
		if ($upme_register->registered != 1) {
		
		$display .= '<form action="" method="post" id="upme-registration-form">';
		
		$display .= '<div class="upme-field upme-seperator upme-edit upme-edit-show">'.__('Account Info','upme').'</div>';
			
		/* Add Account Information Fields to
		Top of Registration fields */
		foreach($this->registration_fields as $key=>$field) {
			extract($field);
			
			if ( $type == 'usermeta') {
				
				$display .= '<div class="upme-field upme-edit upme-edit-show">';
				
				/* Show the label */
				if (isset($this->registration_fields[$key]['name']) && $name) {
					$display .= '<label class="upme-field-type" for="'.$meta.'">';
					if (isset($this->registration_fields[$key]['icon']) && $icon) {
						$display .= '<i class="icon-'.$icon.'"></i>';
					} else {
						$display .= '<i class="icon-none"></i>';
					}
					$display .= '<span>'.$name.'</span></label>';
				} else {
					$display .= '<label class="upme-field-type">&nbsp;</label>';
				}
				
				$display .= '<div class="upme-field-value">';
					
					switch($field) {
						
						case 'textarea':
							$display .= '<textarea class="upme-input" name="'.$meta.'" id="'.$meta.'">'.$this->post_value($meta).'</textarea>';
							break;
						
						case 'text':
							$display .= '<input type="text" class="upme-input" name="'.$meta.'" id="'.$meta.'" value="'.$this->post_value($meta).'" />';
							
							if (isset($this->registration_fields[$key]['help']) && $help != '') {
								$display .= '<div class="upme-help">'.$help.'</div><div class="upme-clear"></div>';
							}
							
							break;
							
						case 'password':

							$display .= '<input type="password" class="upme-input password" name="'.$meta.'" id="'.$meta.'" value="" autocomplete="off" />';
							
							if (isset($this->registration_fields[$key]['help']) && $help != '') {
								$display .= '<div class="upme-help">'.$help.'</div><div class="upme-clear"></div>';
							}

							break;
							
						case 'password_indicator':
							$display .= '<div class="password-meter"><div class="password-meter-message">&nbsp;</div></div>';
							break;
							
					}
					
					/*User can hide this from public*/
					if (isset($this->registration_fields[$key]['can_hide']) && $can_hide == 1) {
						
						$display .= '<div class="upme-hide-from-public">
										<i class="icon-check-empty"></i>'.__('Hide from Public','upme').'
										<input type="hidden" name="hide_'.$meta.'" id="hide_'.$meta.'" value="" />
									</div>';

					}
					
				$display .= '</div>';

				$display .= '</div><div class="upme-clear"></div>';
			}
						
		}

		
		/* Get end of array */
		$array = get_option('upme_profile_fields');

		foreach($array as $key=>$field) {
			if ( $field['meta'] == 'user_pass' || $field['meta'] == 'user_pass_confirm' || $field['meta'] == 'user_email' ) {
				unset($array[$key]);
			}
		}
			
		$i_array_end = end($array);
		$array_end = $i_array_end['position'];
		if ($array[$array_end]['type'] == 'seperator') {
			unset($array[$array_end]);
		}
		
		/*Show the fields that user added to customizer*/
		
		foreach($array as $key => $field) {

			extract($field);
			
			/* seperator */
			if ( $type == 'seperator' && $deleted == 0 && $private == 0 && isset($array[$key]['show_in_register']) && $array[$key]['show_in_register'] == 1) {
				$display .= '<div class="upme-field upme-seperator upme-edit upme-edit-show">'.$name.'</div>';
			}
			
			/* user meta - registration fields */
			if ( $type == 'usermeta' && $deleted == 0 && $private == 0 && isset($array[$key]['show_in_register']) && $array[$key]['show_in_register'] == 1) {
				
				$display .= '<div class="upme-field upme-edit upme-edit-show">';
				
				/* Show the label */
				if (isset($array[$key]['name']) && $name) {
					$display .= '<label class="upme-field-type" for="'.$meta.'">';
					if (isset($array[$key]['icon']) && $icon) {
						$display .= '<i class="icon-'.$icon.'"></i>';
					} else {
						$display .= '<i class="icon-none"></i>';
					}
					$display .= '<span>'.$name.'</span></label>';
				} else {
					$display .= '<label class="upme-field-type">&nbsp;</label>';
				}
				
				$display .= '<div class="upme-field-value">';
					
					switch($field) {
					
						case 'textarea':
							$display .= '<textarea class="upme-input" name="'.$meta.'" id="'.$meta.'">'.$this->post_value($meta).'</textarea>';
							break;
							
						case 'text':
							$display .= '<input type="text" class="upme-input" name="'.$meta.'" id="'.$meta.'" value="'.$this->post_value($meta).'" />';
							break;
							
						case 'select':
						
							if (isset($array[$key]['predefined_loop']) ) {
							$loop = $predefined->get_array( $array[$key]['predefined_loop'] );
							}
							if (isset($array[$key]['choices']) && $array[$key]['choices'] != '') {
							$loop = explode(PHP_EOL, $choices);
							}
							
							if (isset($loop)) {
								$display .= '<select class="upme-input" name="'.$meta.'" id="'.$meta.'">';
								foreach($loop as $option) {
								$display .= '<option value="'.$option.'" '.selected( $this->post_value($meta), $option, 0 ).'>'.$option.'</option>';
								}
								$display .= '</select>';
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'radio':
							if (isset($array[$key]['choices'])) {
							$loop = explode(PHP_EOL, $choices);
							}
							if (isset($loop) && $loop[0] != '') {
								foreach($loop as $option) {
									$display .= '<label class="upme-radio"><input type="radio" name="'.$meta.'" value="'.$option.'" '.checked( $this->post_value($meta), $option, 0 );
									$display .= '/> '.$option.'</label>';
								}
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'checkbox':
							if (isset($array[$key]['choices'])) {
							$loop = explode(PHP_EOL, $choices);
							}
							if (isset($loop) && $loop[0] != '') {
								foreach($loop as $option) {
									$display .= '<label class="upme-checkbox"><input type="checkbox" name="'.$meta.'[]" value="'.$option.'" ';
									if (is_array($this->post_value($meta)) && in_array($option, $this->post_value($meta) )) {
									$display .= 'checked="checked"';
									}
									$display .= '/> '.$option.'</label>';
								}
							}
							$display .= '<div class="upme-clear"></div>';
							break;
							
						case 'password':
							$display .= '<input type="password" class="upme-input" name="'.$meta.'" id="'.$meta.'" value="'.$this->post_value($meta).'" />';
							
							if ($meta == 'user_pass') {
							$display .= '<div class="upme-help">'.__('If you would like to change the password type a new one. Otherwise leave this blank.','upme').'</div>';
							} elseif ($meta == 'user_pass_confirm') {
							$display .= '<div class="upme-help">'.__('Type your new password again.','upme').'</div>';
							}
							break;
							
					}
					
					/*User can hide this from public*/
					if (isset($array[$key]['can_hide']) && $can_hide == 1) {
						
						$display .= '<div class="upme-hide-from-public">
										<i class="icon-check-empty"></i>'.__('Hide from Public','upme').'
										<input type="hidden" name="hide_'.$meta.'" id="hide_'.$meta.'" value="" />
									</div>';

					} elseif ($can_hide == 0 && $private == 0) {
						$display .= '<div class="upme-hide-from-public upme-disable">
										'.sprintf(__('%s must be publicly visible.','upme'), $name).'
									</div>';
					}
					
				$display .= '</div>';

				$display .= '</div><div class="upme-clear"></div>';
			}
		}
		
		$display .= '<div class="upme-field upme-edit upme-edit-show">
						<label class="upme-field-type upme-field-type-'.$sidebar_class.'">&nbsp;</label>
						<div class="upme-field-value">
							<input type="submit" name="upme-register" class="upme-button" value="'.__('Register','upme').'" />
						</div>
					</div><div class="upme-clear"></div>';
					
		$display .= '<input type="hidden" name="redirect_to" value="'.$redirect_to.'" />';
		
		$display .= '</form>';
		
		} // Registration complete
		
		return $display;
	}
	
	/* Login Form on Front end */
	function login( $args=array() ) {

		global $upme_login;
		
		/* Arguments */
		$defaults = array(
			'use_in_sidebar' => null,
			'redirect_to' => $this->current_page
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		
		$sidebar_class = null;
		if ($use_in_sidebar) $sidebar_class = 'upme-sidebar';
		
		$display = null;
		$display .= '<div class="upme-wrap upme-login '.$sidebar_class.'">
					<div class="upme-inner">
						
						<div class="upme-main">';
						
						/*Display errors*/
						if (isset($_POST['upme-login'])) {
						$display .= $upme_login->get_errors();
						}
						
						$display .= $this->show_login_form( $sidebar_class, $redirect_to );

						$display .= '</div>
						
					</div>
				</div>';

		
		return $display;
		
	}
	
	/* Show login forms */
	function show_login_form( $sidebar_class=null, $redirect_to=null) {
		global $upme_login;
		$display = null;		
		$display .= '<form action="" method="post">';
	
		foreach($this->login_fields as $key=>$field) {
			extract($field);
			
			if ( $type == 'usermeta') {
				
				$display .= '<div class="upme-field upme-edit upme-edit-show">';
				
				/* Show the label */
				if (isset($this->login_fields[$key]['name']) && $name) {
					$display .= '<label class="upme-field-type" for="'.$meta.'">';
					if (isset($this->login_fields[$key]['icon']) && $icon) {
						$display .= '<i class="icon-'.$icon.'"></i>';
					} else {
						$display .= '<i class="icon-none"></i>';
					}
					$display .= '<span>'.$name.'</span></label>';
				} else {
					$display .= '<label class="upme-field-type">&nbsp;</label>';
				}
				
				$display .= '<div class="upme-field-value">';
					
					switch($field) {
						case 'textarea':
							$display .= '<textarea class="upme-input" name="'.$meta.'" id="'.$meta.'">'.$this->post_value($meta).'</textarea>';
							break;
						case 'text':
							$display .= '<input type="text" class="upme-input" name="'.$meta.'" id="'.$meta.'" value="'.$this->post_value($meta).'" />';
							
							if (isset($this->login_fields[$key]['help']) && $help != '') {
								$display .= '<div class="upme-help">'.$help.'</div><div class="upme-clear"></div>';
							}
							
							break;
						case 'password':
							$display .= '<input type="password" class="upme-input" name="'.$meta.'" id="'.$meta.'" value="" />';
							break;
					}
					
					if ($field == 'password') {
						if (isset($_POST['rememberme']) && $_POST['rememberme'] == 1) { $class = 'icon-check'; } else { $class = 'icon-check-empty'; }
						$display .= '<div class="upme-hide-from-public upme-rememberme">
										<i class="'.$class.'"></i>'.__('Remember me','upme').'
										<input type="hidden" name="rememberme" id="rememberme" value="0" />
									</div>';
					}
					
				$display .= '</div>';

				$display .= '</div><div class="upme-clear"></div>';
			}
						
		}
		
		$display .= '<div class="upme-field upme-edit upme-edit-show">
						<label class="upme-field-type upme-field-type-'.$sidebar_class.'">&nbsp;</label>
						<div class="upme-field-value">
							<input type="submit" name="upme-login" class="upme-button" value="'.__('Log In','upme').'" />
						</div>
					</div><div class="upme-clear"></div>';
					
		
		$display .= '<input type="hidden" name="redirect_to" value="'.$redirect_to.'" />';
		
		$display .= '</form>';
		return $display;
	}
	
	/* TRUE or false user can view content */
	function user_can_view_content() {
		if (!is_user_logged_in())
			return false;
		return true;
	}
	
	/* Private content plugin */
	function hidden_content( $args=array(), $content ) {

		$display = null;
		
		/* Arguments */
		$defaults = array(
			'message' => 'on'
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		
		/* Require login */
		if (!$this->user_can_view_content()) {
		
			if ($message !== 'off') {
				
				/* filter wildcards */
				$html = $this->get_option('html_private_content');
				$html = str_replace("{upme_current_uri}", $this->current_page, $html);
				$display .= wpautop($html);
					
			}
		
		} else { /* Show hidden content */
			$display .= $content;
		}
		
		return $display;
	}
	
	/* Logout button */
	function logout( $args=array() ) {
		$display = null;
		
		$defaults = array(
			'redirect_to' => $this->current_page
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args, EXTR_SKIP );
		
		if (is_user_logged_in()) {
			$display .= '<div class="upme-wrap">';
			$display .= '<a href="'.wp_logout_url( $redirect_to ).'" class="upme-button-alt">'.__('Log Out','upme').'</a>';
			$display .= '</div>';
		}
		return $display;
	}

}

$upme = new UPME();