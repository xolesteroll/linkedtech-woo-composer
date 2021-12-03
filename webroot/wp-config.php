<?php
// @codingStandardsIgnoreFile
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Note: WP Super Cache plugin tries to add CACHE contants within try-catch
// statement, or inbetween, which might cause errors. Or right here inbetween
// this comment. Aha, you see, it just did it again!
try { (new \josegonzalez\Dotenv\Loader(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env'))->parse()->expect('DB_NAME')->toEnv(true)->putenv(true); } catch (\Exception $e) { echo $e->getMessage(); exit(1); }

$url = getenv( 'WP_URL' );
$parse = parse_url( $url );

$is_wp_cli = defined( 'WP_CLI' ) && WP_CLI;
if ( ! $is_wp_cli && isset( $parse['host'] ) ) {
	$current_url = $parse['host'] . ( ! empty( $parse['port'] ) ? ':' . $parse['port'] : '' );
	if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) && $current_url !== $_SERVER['HTTP_HOST'] ) {
		$new_link = $parse['scheme'] . "://{$current_url}{$_SERVER['REQUEST_URI']}";
		header( 'Location: ' . $new_link );
		exit();
	}
}

// Changes for WordPress in wp/ folder
define('WP_HOME', getenv('WP_URL'));
define('WP_SITEURL', WP_HOME . '/wp');

// Changes for wp-content/ folder at root level
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define('WP_CONTENT_URL', WP_HOME . '/wp-content');

$name = getenv('DB_NAME');
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

// Check if the os cron is enabled then to disable the wp cron.
$disable_wp_cron = (bool)getenv('CRON_ENABLED') ?: false;

// Thanks to: https://wordpress.org/support/topic/disable-error-reporting-in-wordpress
$debug = getenv('WP_DEBUG') ?: false;
$debug_log = getenv('WP_DEBUG_LOG') ?: false;
$debug_display = getenv('WP_DEBUG_DISPLAY') ?: false;
$allow_repair = getenv('WP_ALLOW_REPAIR') ?: false;

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $name);

/** MySQL database username */
define('DB_USER', $user);

/** MySQL database password */
define('DB_PASSWORD', $pass);

/** MySQL hostname */
define('DB_HOST', $host);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Allow repair database http://www.yoursite.com/wp/wp-admin/maint/repair.php */
define('WP_ALLOW_REPAIR', $allow_repair);

/** Enable WP Cron only if OS Cron is disabled */
define ('DISABLE_WP_CRON', $disable_wp_cron);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', $debug);
define('WP_DEBUG_LOG', $debug_log);
define('WP_DEBUG_DISPLAY', $debug_display);

/*WP SuperCache constants*/
$supercache_plugin_path = __DIR__ . '/wp-content/plugins/wp-super-cache/';

if( is_dir( $supercache_plugin_path ) ){
	if( !defined('WPCACHEHOME' ) ){
		define( 'WPCACHEHOME', $supercache_plugin_path );
	}
	if( !defined('WP_CACHE') ){
		define( 'WP_CACHE', true );
	}
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
