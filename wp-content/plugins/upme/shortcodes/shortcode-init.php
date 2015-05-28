<?php

	add_filter('widget_text', 'do_shortcode');

	function upme_refresh_mce( $ver ) {
		$ver += 3;
		return $ver;
	}

	add_action( 'init', 'upme_add_shortcode_button' );
	add_filter( 'tiny_mce_version', 'upme_refresh_mce' );

	function upme_add_shortcode_button() {
		if ( ! current_user_can('manage_users') ) return;
		if ( get_user_option('rich_editing') == 'true') :
			add_filter('mce_external_plugins', 'upme_add_shortcode_tinymce_plugin');
			add_filter('mce_buttons', 'upme_register_shortcode_button');
		endif;
	}

	function upme_register_shortcode_button($buttons) {
		array_push($buttons, "|", "upme_shortcodes_button");
		return $buttons;
	}

	function upme_add_shortcode_tinymce_plugin($plugin_array) {
		global $upme;
		$plugin_array['UPMEShortcodes'] = upme_url . 'admin/js/editor_plugin.js';
		return $plugin_array;
	}