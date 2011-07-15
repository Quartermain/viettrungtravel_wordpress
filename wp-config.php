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
define('DB_NAME', 'wordpress32');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'vertrigo');

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
define('AUTH_KEY',         'Qw,|>ntTf~AnRp{jno%=lTJ(+3^]Qk.I6Z@mX4qf#8`[RyHW,#i;wMbS|zyq`0BJ');
define('SECURE_AUTH_KEY',  'M@>ZCa0PbNL(.f$J2U?<p/=tZ{feHB~AGZfd>QO^uzV*kUq%_=X: P:osW-v%{3s');
define('LOGGED_IN_KEY',    'xQ!o<WtE.%7af n@304?+,SCHcUUDq03-ja_!^k{WPpvvT)Wf5/iMTv7LJd@m#<7');
define('NONCE_KEY',        'P9tIL;_8OdJ;7t9N]A~*5td>jpansy]` w[%v/yw{5 W~NJsbY.#plAL=livRN3 ');
define('AUTH_SALT',        'ubzC/M#*hd_fM-^=hg,xc[AUg <]mY$qH,v%dLjdFK+ 5;)tAc;VEyy!,]zsq,mG');
define('SECURE_AUTH_SALT', 'S1.{fiqs^dY-z:=*]PljCm|iaKbx9SuC /W0X>~,ly=?gEK+<`v1;qe.Y48Yx!bD');
define('LOGGED_IN_SALT',   '+gwx;9}T)*$dbMug{HuN gEqUcq|mkfjGbpV-!j1b=MlN0z:Gg)g%bv$%o4s!Al1');
define('NONCE_SALT',       'N-mk[,WQR:XOcJ|T5pC3Fl5cN1KCWwLdg[[Cb89u1xr>6.:Qa%)bhBE17BOhN9@8');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
