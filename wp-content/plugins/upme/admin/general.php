<h3><?php _e('常规设置','upme'); ?></h3>

<table class="form-table">

	<tr valign="top">
	<th scope="row"><label for="style"><?php _e('Style','upme'); ?></label></th>
	<td>
		<select name="style" id="style">
			<option value="0" <?php selected(0, $this->options['style']); ?>><?php _e('Ignore styles - I will do my custom css!','upme'); ?></option>
			<?php
			$fp = opendir(upme_path.'styles/');
			while ($file = readdir($fp)) {
					if (strpos($file, '.css') !== false) {
						$file = str_replace('.css','',$file);
						?>
						<option value="<?php echo $file; ?>" <?php selected($file, $this->options['style']); ?>><?php echo $file; ?></option>
						<?php
					}
				}
			closedir($fp);
			?>
		</select>
	</td>
	</tr>
	
<?php

$this->add_plugin_setting(
	'select',
	'clickable_profile',
	__('显示名称链接到用户个人资料','upme'),
	array(
		1 => __('链接到用户资料','upme'), 
		0 => __('不，静态文本','upme')),
	__('启用/禁用的公众资料链接使用资料显示名称。','upme'));
	
$this->add_plugin_setting(
	'select',
	'set_password',
	__('允许用户在注册过程中设置密码','upme'),
	array(
		1 => __('Yes','upme'), 
		0 => __('No','upme')),
	__('启用/禁用在注册中设置密码以及强度计算。','upme'));
	
?>
	
</table>

<h3><?php _e('Privacy / Options','upme'); ?></h3>
<table class="form-table">

<?php

$this->add_plugin_setting(
	'select',
	'users_can_view',
	__('Allow logged-in users to view other profiles','upme'),
	array(
		1 => __('Yes!','upme'), 
		0 => __('Logged in user can see his profile only','upme')),
	__('Allow or do not allow logged-in users to view other user profiles. If disabled, users will see their profiles only.','upme'));

$this->add_plugin_setting(
	'select',
	'guests_can_view',
	__('Guests can view','upme'),
	array(
		1 => __('Allow guests to view profiles','upme'), 
		0 => __('Guests must login to view profiles','upme')),
	__('Allow or do not allow guests to view user profiles. You can require login before guests can view profiles.','upme'));
		
$this->add_plugin_setting(
	'textarea',
	'html_login_to_view',
	__('Guests cannot view profiles','upme'),
	null,
	__('Show a customized text/HTML If you do not allow guests to view profiles, like asking them to login to view the profile.','upme'));
	
$this->add_plugin_setting(
	'textarea',
	'html_user_login_message',
	__('User must log-in to view/edit his profile','upme'),
	null,
	__('This can be any text/HTML to show the user when he must login to view or edit his own profile. Leave blank to show nothing.','upme'));
	
$this->add_plugin_setting(
	'textarea',
	'html_private_content',
	__('User must log-in to view private content','upme'),
	null,
	__('This can be any text/HTML to show the user when he must login to view private/hidden content. Leave blank to show nothing.','upme'));
	
?>

</table>

<h3><?php _e('Custom Redirection / Block WP backend','upme'); ?></h3>

<table class="form-table">

<?php

$this->add_plugin_setting(
	'select',
	'profile_redirect',
	__('Redirect backend Profile to','upme'),
	array(
		0 => __('Do not redirect','upme'),
		1 => __('UPME Profile Page','upme'), 
		2 => __('Custom Defined URL','upme')),
	__('To block access to WordPress backend profile, you can setup redirection here. Profile page is automatically created by this plugin.','upme'));

$this->add_plugin_setting(
	'input',
	'profile_redirect_url',
	__('Redirect to custom profile URL', 'upme'),
	null,
	__('If you prefer to redirect WP profile to a custom defined URL (e.g. a custom page that has the UPME shortcode) Please enter custom URL here.','upme'));
	
$this->add_plugin_setting(
	'input',
	'login_redirect',
	__('Redirect default login page to custom URL', 'upme'),
	null,
	__('Enter URL here to disable WordPress backend login and enable redirection to your custom login page. You can use the <code>[upme_login]</code> shortcode on any page to create a login page that replace backend login.','upme'));
	
$this->add_plugin_setting(
	'input',
	'register_redirect',
	__('Redirect default registration page to custom URL', 'upme'),
	null,
	__('Enter URL here to disable WordPress backend registration and enable redirection to your custom registration page. You can use the <code>[upme_registration]</code> shortcode on any page to create a registration page that replace backend registration.','upme'));
											
?>

</table>