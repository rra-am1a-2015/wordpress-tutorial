<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress-infoavond');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'on!&I7U6AH_,NpfikS|UhVPr.dSL%v$c/V7<7ir)3C` `dHShRNC{{7+-cU6Y|+]');
define('SECURE_AUTH_KEY',  'ji]j-|v+4!TOX HW!o}l!G*I3-mRg6wQzb[hpinob08JT@<Hn?5Ub/X-e|D:V|xY');
define('LOGGED_IN_KEY',    '>ZhD=Y/S=79C;QQ|OZAOOTqjJ!XcgC0JzMFkTQdV[r)VWsly vfP<7O.ECn0N1_e');
define('NONCE_KEY',        'oa@E+[[y>cZ,zC<0qD[e$BsO?AN~@p.s;q2,G:6Us#xI:i*Z(0d_|xD-Zhk0`(|R');
define('AUTH_SALT',        'fCGBp[x|z}tGA]-K=f6F#@u<u;`|1xKiAhz4J|e?Hpxyp/rd{}qN4B53t67oXc-H');
define('SECURE_AUTH_SALT', '-d7jxbMo4})+yy#9O847,Z1DbP2a}XOkbxG=u|9I`)eu,3pVD|czG^Rb,=ZNg<aA');
define('LOGGED_IN_SALT',   'J|Wr90?1a/HQ%jkDAr- ^6-S i>D,3eed~ktU-G}5i-va-56rqd`,a1-kdr06W-a');
define('NONCE_SALT',       't_ns{91XStMGu5IqNNJ|+Z+/R#dj8CGa_{[*|YKKc+f)#(86XSUeHhyj3|JBdsJk');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
