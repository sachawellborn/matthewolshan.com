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
define('DB_NAME', 'iurcjfmy_WPPXN');

/** Database username */
define('DB_USER', 'iurcjfmy_WPPXN');

/** Database password */
define('DB_PASSWORD', 'hP{[Kx?n]6jRO/@Z>');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',NXq#]DRz^/2rP-5pn8d+&/-%&&o=;cRN&)DAEKABYkeG9vOE8(I),AY/Ngs(Vgm');
define('SECURE_AUTH_KEY',  'A+_/&?zkP]+c?!^O14t+<xu6r.|`-b{X+`*~+S4,+v.Q?!22umQFxDMzw)-2oDc+');
define('LOGGED_IN_KEY',    '*h],3<0?Zq!-AaUQ^`5PwzC0W[YE)_0}|(T.jge-eWrm54S@SlO-U;m+vOBY>[sS');
define('NONCE_KEY',        '<u9egQZU>T_7-}L4#IU/<0g-NZCv:GUE`E@FMo@|lk~4).uSBfPcI`q)|e@lct52');
define('AUTH_SALT',        '5on;r-.}3d[t=^pQkmv|1N)X7bm2z-b.hI+-]_fl_jeV$9TWba-@^_S/{&4VY{d ');
define('SECURE_AUTH_SALT', 'zV~r8F(N SBZ$0LANZkggx(M+: oZGeC=XYyNb:-$mwx4h>@WY+7-E>I|M))@T*Y');
define('LOGGED_IN_SALT',   '2)]UKs&XN:E#h;95#U>lZPFx3w26m+@p9L4)+/A.S3_egQNG|./QF-LkX<~$n/>n');
define('NONCE_SALT',       'z%+q(WKdv]/e  ~<Ls,pJ<j8NhIPm/n6$LGr8tx{<y-LNan?~UNL) +*#2KixC[&');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

// Include for settings managed by ddev.
$ddev_settings = __DIR__ . '/wp-config-ddev.php';
if ( ! defined( 'DB_USER' ) && getenv( 'IS_DDEV_PROJECT' ) == 'true' && is_readable( $ddev_settings ) ) {
	require_once( $ddev_settings );
}

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
