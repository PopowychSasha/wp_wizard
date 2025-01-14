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
define( 'DB_NAME', 'wp_wizard_db' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '-:d.Wir:_zJIV@>4Vi >aQ8OQVtGW,ZWnHHOHui*3:@+.<#3|y51kn&IEvsFB5F:' );
define( 'SECURE_AUTH_KEY',  '!HO7G5r&d&9FM0)Pq:fJX=/y4Uw?OT}`q?l/[;es?zwIc|8-pF=ifC*oL!xh UlY' );
define( 'LOGGED_IN_KEY',    'jY0]C{%eV:KjR~j#KZ!u5-g6L9]GCvsiSzXe11>=dnPd?Pz/.8?.w},NFW8h_U,[' );
define( 'NONCE_KEY',        'IDv~Ctwv2UM09&i5SSL$*6R|73$zEwBY>$Y@FXR|_qlHykExJ%l8_( VffbwT>.V' );
define( 'AUTH_SALT',        'pFiJIC?{l4H.Sl>?iy!(i%uY2Dmcv#vdF%[>r0m`,I5GenA?Bo>+{b8ZDkUDS?F3' );
define( 'SECURE_AUTH_SALT', 'F}c{6CALK_+1o9dkbc&l?nX@gnb(!/TnNZz<(%yl%vBnn<hrnV1=ng>4z~^GWFk|' );
define( 'LOGGED_IN_SALT',   '*{Nr^7jQcl.v%A!1*dDm~gu$:F!/W@`:5:2E5E`!6W!x$~l5EB% Xx@>L,n8#x[E' );
define( 'NONCE_SALT',       'q/(Eri&8Y=T4hSe5?KX=TU!0n)Di[?06W!Aq0i/o}bpd2:%<O>)p^.7-k]a0_`@[' );

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

