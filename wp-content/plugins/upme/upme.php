<?php
/*
Plugin Name: User Profiles Made Easy
Plugin URI: http://www.luoxiao123.cn
Description: 一个非常棒的用户配置文件wordpress插件。更多主题汉化、插件汉化、以及其他wordpress问题，请访问<strong><a href="http://www.luoxiao123.cn">逍遥乐IT博客www.luoxiao123.cn</a></strong>  主题汉化不容易，请到<a href="https://me.alipay.com/xiaoyaole">支付宝</a>赞助我，不论多少，心意最重要，您的支持就是我继续汉化的动力，谢谢！请大家认准 逍遥乐汉化 ！
Version: 1.3.8
Author: ThemeFluent</a> - <a href="http://www.luoxiao123.cn">逍遥乐汉化制作</a><a>
Author URI: http://themeforest.net/user/ThemeFluent?ref=ThemeFluent
*/

define('upme_url',plugin_dir_url(__FILE__ ));
define('upme_path',plugin_dir_path(__FILE__ ));

	// Add settings link on plugin page
	function upme_settings_link($links) {
		$settings_link = '<a href="options-general.php?page=wp-upme">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'upme_settings_link' );

	/* Init */
	require_once upme_path . 'init/init.php';
	
	/* Classes */
	require_once upme_path . 'classes/class-upme-predefined.php';
	require_once upme_path . 'classes/class-upme.php';
	require_once upme_path . 'classes/class-upme-save.php';
	require_once upme_path . 'classes/class-upme-register.php';
	require_once upme_path . 'classes/class-upme-login.php';

	/* Shortcodes */
	require_once upme_path . 'shortcodes/shortcode-init.php';
	require_once upme_path . 'shortcodes/shortcodes.php';
	
	/* Registration customizer */
	require_once upme_path . 'registration/upme-register.php';
	
	/* Widgets */
	require_once upme_path . 'widgets/upme-widgets.php';
	
	/* Scripts - dynamic css */
	add_action('wp_footer', 'upme_custom_scripts');
	function upme_custom_scripts(){
		require_once upme_path . 'js/upme-custom-js.php';
	}

	/* Admin panel */
	if (is_admin()) {

		require_once(upme_path . 'classes/class-upme-admin.php');
		require_once(upme_path . 'classes/class-upme-sync-woocommerce.php');
		require_once(upme_path . 'admin/admin-icons.php');
	
	}