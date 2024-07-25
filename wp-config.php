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
define( 'DB_NAME', 'MaMedical' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'n2KL|[|V~f]&1<ZxDz.wnNQw(KNNo]d4ux(q?Aeg5_F$NBIr8/r#ugU29vpKmZAP' );
define( 'SECURE_AUTH_KEY',  'G#<B{<;hF%3Xjcy%[,L4yPghqJ[GROW;a%y}comT~FbvP>AU?!f(SeK<q_W<:+_(' );
define( 'LOGGED_IN_KEY',    '7$B{eG_,/=Z^Q@AWnhy2vEP91xZCGAQ{K*EvE+KX); >[LO*Gs-7kc|M)/gdqlXB' );
define( 'NONCE_KEY',        'LEF+C-q}~m*x>^u~%1|KNiSDLf$A+[1In-0r5|w!EqA vo}{gf#nKD$[=$UuRRCK' );
define( 'AUTH_SALT',        'Zj,b<7vRHn9C`X-iYKr{haD=ryA|u{jdR.^_#Z?6F3=K61@.smLN_b3WSC7SpUj^' );
define( 'SECURE_AUTH_SALT', '`9($Ds<Y<Py~e_cwiQOr!5[=]s(-%nW:$&`}dIqA%w>OX3ogjSkk<]4I8(6NH@I6' );
define( 'LOGGED_IN_SALT',   'R:@W[ll@8+$)U$OexAlgl!e07yMl,yQx(Y`~,BZA:8V,$reaS6mwOTtM~|HuHQ[w' );
define( 'NONCE_SALT',       '5PS9LjMzF/5W-V+0a[]kTIaK6w$H$9>tq8*!7ckDq#S}[ML9xH*NbbqtNQr3sh:<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
