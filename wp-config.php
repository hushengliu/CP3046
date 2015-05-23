<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i1481748_wp1');

/** MySQL database username */
define('DB_USER', 'i1481748_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'H#NvrjuO^n79&~8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S0RshH1cwV5mOoBUHvqj3o1IqoAwtvnR2L7Diwa8s6Vw6XnsVcdaNcp9fAxyAuPC');
define('SECURE_AUTH_KEY',  'AGO2cDRcz6RspQlCOE5YJgfTyb7ufVG76n6mv2wGxKqDlVkTfDnyMGxsubuycjjs');
define('LOGGED_IN_KEY',    '7Zi9VM1ZI6xYtd76IvsvzItGjm0j057mTTiTZ95oSFJf90Pv04civ0EzFx9Z3J84');
define('NONCE_KEY',        'GU5YYbftCzQrnB8OoF6PPHa4i8sRi6Hwj91QDvpJ0cGb9oM3kJ1HhiV0T5laPBBD');
define('AUTH_SALT',        'Is11yXl7keYAGcRswIC9AyYqErGsmhMKDl9nAhCyx1FbT0vuEFOqX5ldmkFKQ2aV');
define('SECURE_AUTH_SALT', 'ScHCEweIRLvYpYPjQvwVatJMazEObyV6DaD3ZZyWuMirr5OmgoqAwiG85WHtkhXg');
define('LOGGED_IN_SALT',   '51Z5eke9xF28Rfs32sTTMo6dDmzZmYlMnqvFheY8xVWth207zectEMhrVjJFzsCz');
define('NONCE_SALT',       'xKdYPikhOyUt8gtObtmojwtkVtSWykYgXoOfDgMUpD1WIyvzlailfemGdaSnxmNJ');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
