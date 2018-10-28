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
define('DB_NAME', 'films-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'x-HqOHj=+ Wgh-ER0Q<9suH[@1*yx*/A&j|SQJu+UU4f+>$kNaP/X3W.crk 75Zx');
define('SECURE_AUTH_KEY',  ')s.F80li)-my<Fo6H%>8mK!#h]OyS= %gTCZBA&^7q`U3OaFH%@Q;9$r;[KNI}Pc');
define('LOGGED_IN_KEY',    ')hu33*ng>iBUt^dz<JM<?u`L.kaeJyBV_GHVkHdwSIzn*7mNH@GY`BI8}U1{R@l4');
define('NONCE_KEY',        '0Bs}RORV YgmcHjVz`P1~*OC|r`K[WqW4TaA[a`pHo>io8cxQY=s2[`;CqV3i2&A');
define('AUTH_SALT',        'N(J=WdlXrG_W .k=w}aDCDj?ao$#GhvWm)aR[&.Q4:m03&P$$ @;2>%Hw6krEYJa');
define('SECURE_AUTH_SALT', '7i4O_9h%Ju0dR!ZyR*cn-5;X-8cHrh&k?d9*00oHk!Je.7m&l*so(Z^><I^DWkW&');
define('LOGGED_IN_SALT',   'bXgGh^x(f*sawJ,Vq4cC 8u]QU31<+X0Dv0s6RoHru%dRqoq$)>SO+qx;YYd/1zV');
define('NONCE_SALT',       '9^DNOsJhLVO!Jk#qB/J^CL]N#.[@{DvMWErT_j&{PNk-yYs-k*_y{.!m>P`8bM^P');

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
