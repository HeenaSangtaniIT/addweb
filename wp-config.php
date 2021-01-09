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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         '2fMj8C[OD&@atIzxf8YfD63Q|L<iEC5%1$CLa?^ !5SD7G&MgdA0lQm{YU/K9J57' );
define( 'SECURE_AUTH_KEY',  '%9nPUlv[$TF%$/uQnV`K[+ljkS&MaZprl;F;ql!ObGiCs L=L, (c8|w6{U>k[ty' );
define( 'LOGGED_IN_KEY',    '%Oj$e<c-$6r$i5}-!{}fftg3f72 p%TUpb!%{!aq*he|3#Gi(e2:>E8.4KC?/w,^' );
define( 'NONCE_KEY',        'kX^0;_$L=ti_H#-`-,6p,6b`9j+T*:P~k$Y$rh~xF1+?H=`)EJ%<m3E vY_Ju94t' );
define( 'AUTH_SALT',        'i=pIN@H]!UQE<oxt]?8gk4]~n>b0eF/}vhi$*xN9iL0q/gF7#A5x+UlZa i{rB,?' );
define( 'SECURE_AUTH_SALT', '}z~oS<)q8=LXiWLAM6!h|.A&<NtYCQt:Q] CcN`?xhTf1(fKe7JD1]HA,O!c)xXU' );
define( 'LOGGED_IN_SALT',   'kBaH<9UnS-zU9;rk&8[H^*;n,{;nA=-9`A:,>^e}I}jnK{tr7_e}1gZPFq`&Wn2l' );
define( 'NONCE_SALT',       '`hFtvc-g|v9;}zR)0OZRC*>e><$qxh blHM2]3` vJjxX[7d=X$Yw@X+5qvi`(Yk' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
