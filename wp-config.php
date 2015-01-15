<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'slick');

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
define('AUTH_KEY',         'I%-lLeeln[hE[ejH^Fi&]D{,B-EdA;S|=bBd_k=wP^bo8Cihrbz#F.+(%#_y{G9-');
define('SECURE_AUTH_KEY',  '^pL@vl%z9-GE=3=B7/]s(<kANkw4-tE}Q^HWdr@K-I[N+Q)|!]j!?`*dcK$3)!`n');
define('LOGGED_IN_KEY',    '9FR(.zF4@1e,&(+.M,J-^-BIqfZQH,EGCAgcUU]DoN{|K qbzjvp:xO67Fdx;Q<}');
define('NONCE_KEY',        'DT)[Hm5lHw`8{f_G9}99}SS1T-a0^+|ghf|T(`/<UD(|&}T_8v#i#Zs+2r`U{?5t');
define('AUTH_SALT',        'P+qR-$bR-;r~uQ9jrgkSrtH!idwIR=gG6>Uc@-]ZehYn[(FiPo+I|y#qwn;dt#0w');
define('SECURE_AUTH_SALT', 'YTu@$+MWl,ox4bd0-P?]8P&u5-Q@T-T8 OKmz4UWeh:X?0yYc=giJ,^Qcm-=;O*4');
define('LOGGED_IN_SALT',   ',Kpb,A4bE,k1~CT3?lxQ-iR7cXG P+7=<?I?&6o ]8/8Y2Cq2ko|keoPQ=Mgusdo');
define('NONCE_SALT',       '*f-()g$a)d^+0b{81$*.Z>!ypoY!rhpdt+}z!Yy|y$/fCRaW:M&7>t<:.0IC%1i{');

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
