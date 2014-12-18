<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'np_999_enpii');

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
define('AUTH_KEY',         'A;d&K|~v<}{8_ WUc]?N`+}@%.&{XwLt]6`R.AVDw$<Ow/ez%+^%E_,G=^ra%k[|');
define('SECURE_AUTH_KEY',  'E420wtqllXDp!3CX{;o2@U(@:-e4R&z-2Cu QUW(E|}6c4Mkl%Qp(Dc-4f[KWQ1B');
define('LOGGED_IN_KEY',    'C-t1-Nrh.6AgOfzv  ub2*vkcQC]N1k}e{D$3`E|dt:E_KT& gL_>hg&4^Ej~aF-');
define('NONCE_KEY',        '..DM8uPTMN8?xx3X]=]a[^*.I44JvU_|SeT1hH7|IB3$1dmW0E}NdBHW%SB$?yH-');
define('AUTH_SALT',        'xQyG5Nt>*6;d|&v)!p p76{s!s)0Y}_vSv;@eyr+hol}b{OVUHS1aSxep@VY[1m=');
define('SECURE_AUTH_SALT', 'yl>2IjqIN=OMxAf0-&pv,H&t/`|YJz|JN|{v^NeL>$-1Es2]s|-#h|Qa<]XR&|UO');
define('LOGGED_IN_SALT',   'k@}yMrp<}5!lW-+(nBC)f0g_Uh3(4PS..[V.1_ZM6K,QH- StY`b{^z*&+iVYAa,');
define('NONCE_SALT',       '5X`;YO5F`$8th+*M|CG!5haU+p}jH-|u[ZEBtnO)]rCGlAk[]4.#MC-i3r;Q?[O!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'enpii_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
