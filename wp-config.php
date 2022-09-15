<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realestate' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '?8l@T2asi!vv]~Ee={M:A;*YA0{9jj]kq~yIa@:I*%]HSyL@Y_3FvaADXVhj5YL/' );
define( 'SECURE_AUTH_KEY',  '>]8Iihz9<RT1JXt/xK^d/!vg[iIy>AN}nL^V7<u(QOrW0{Pp8TuUy1`E_UxZK{wW' );
define( 'LOGGED_IN_KEY',    'HI`tFs{FztR+4}))ORBkdNhFN{rE[NIq{HV@vi:qjz#s,ggrKi0FIx3aC@3^G#m(' );
define( 'NONCE_KEY',        '}/cJ1v@iKmP/q;f57*M-256lZ8MN1{;dB/y0 Z[Sr2W=w1a3a(Ca3M(cNJ5>G#-|' );
define( 'AUTH_SALT',        'cSEH8ybza<9Cw*hYKqB~*9=Cb<>-h<6@CM4btl=L+_^Gsz@U-&D@X.Kg)pW*Nhsp' );
define( 'SECURE_AUTH_SALT', 's!JD1RqQK0)E,XOC*!Z?f^VP^=llUgU,{)K{PIgG:M~&R?o*NkKtP8#%hRqbVHU}' );
define( 'LOGGED_IN_SALT',   'JCV(3)ZL)_nX=smxsfs-^~TV|:kqx6NF]+u_+5L/q~.yv~p]k9@Ax?Mw[5.CoSLj' );
define( 'NONCE_SALT',       'GKgR+p?IVBsI:R`^tT<Gtv=>.Hxf8FuxvoNfJPsRA>Oh#TWcb =:A )4nn!AvP%|' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
