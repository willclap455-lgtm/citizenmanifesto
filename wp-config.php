<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'citizen' );

/** Database username */
define( 'DB_USER', 'wordpress_user' );

/** Database password */
define( 'DB_PASSWORD', '12pg34' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '7m__;w>uD.c+[x-e[:@,6,lFrKt(;Qa6)O/YB4kFLBh/:MaRXFxp0Td_C`Y(UHo9');
define('SECURE_AUTH_KEY',  'P|@(j:#8Bb1sN.cN#(/f*}Gk!=Lv)Dy&xnCBs!X,[YOB}Aa%=5s~=D|Sf(x.ROo=');
define('LOGGED_IN_KEY',    'E{S;!ni0o[hdxe/8/_4A5D4p:`{yp2HX.xt>}y?l=K;:%6!z-A&Y8k}h%WR6t%`E');
define('NONCE_KEY',        '{<]uVVGv=trx|h3[Z{Us(Mm]K[@&D0CGQgF4 U.Bu73}x7!Z:LUbscm~I]N~J84(');
define('AUTH_SALT',        'MO%W_%NVX$$N){;QwIr0sfSTnNgx8+6c.maQ$uDDqc8~w&j:tTAX]35mqQb9iJ,,');
define('SECURE_AUTH_SALT', '[sP>8-NE&q3;Go>fA2v6Z3@zaBceHN<(O)lTUaiN*~BR5G(%8_ml?i0n[gH.9;4;');
define('LOGGED_IN_SALT',   'SYUh5uNi4Mh-z[|yZZ-|:a2qRG&dZ.}+XN_r>2XKL-d.$oIw.,kRxqD.:LEz:A[P');
define('NONCE_SALT',       '0`C@Yd(IGuGCFBnBm !8^{enMV0ijT|&bg[9@@%!7H-f,Ic[:n,|-$QS:M.F!U.8');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
