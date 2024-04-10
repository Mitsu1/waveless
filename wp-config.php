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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'waveless' );

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
define( 'AUTH_KEY',         '<uCk^9?O= L;Y]]ho8(HqI&I$=*. yba<0  )u[[=/<RO9_ux.?gV7pmE_]Q)6[F' );
define( 'SECURE_AUTH_KEY',  '&Eb;[>|,z5u$MPbnz&nee _M|55K.X%?U&VX;(mh3zRBP[m6*G{Z#{Fr1}R<sopC' );
define( 'LOGGED_IN_KEY',    '5)rqpfnz!-?k^Cx52n@cE)c,[rYC0pJ4NLQM4^;71Fd^jCC^t6FYMTy9zOb]0nM!' );
define( 'NONCE_KEY',        'z 9JBy{vTC7Ha&Q(:9=O*xf6ejt?IS:?vd*[Xjk6>8(&ssm_@,A/>,/lFn]t$Rv%' );
define( 'AUTH_SALT',        'G*VW=V*run)wjlBgADJZSl&:8S3*Ey7>+y`JQ){MOpi9?wd 2>2iVH!2nD&AaL9~' );
define( 'SECURE_AUTH_SALT', 'ptVBBxC;K~MTz0hlvY:a[38_dI+SR;tozA@omhIWoX$?gYP,C.[{RL1}SM;};)cl' );
define( 'LOGGED_IN_SALT',   'vjvBeu(?}<u30Gny{]PA[u{Y=a4w_W&~x,rTHM~( !p^/Jqcv;4FH$.indBgtf@i' );
define( 'NONCE_SALT',       'o^}hj7E9vnJ$Dhv2!H#]}dWdY8cw214Y<|`Bl`U /lX|NMpd?8~qj{R.tcc+20{E' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
