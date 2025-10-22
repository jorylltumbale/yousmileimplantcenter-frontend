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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          '01N<%}f:A&Cv_u1xaVT^&E0E2%.xwJUhIY7i9;xtJR10HNUbq{e$L0YSh+ZFz&14' );
define( 'SECURE_AUTH_KEY',   'j%3kLAmd[QaX)Z?-UzWvqB4`iqKOjMAxfi4ax2hP&eiqd(aO(|(?IxzH8KVARZX+' );
define( 'LOGGED_IN_KEY',     '8OVX:h.nStEp<!-0kQ7w=/7MNH5zlaGNfq6P[kI0=IV[*pR9MCng-?#TX5.pLyTR' );
define( 'NONCE_KEY',         'XlG4VnVy[m&G)`6T7=09h [66gV/4I-D8Fi&H wjTIL/%dNB.q/-@IDgtHPGA]Lh' );
define( 'AUTH_SALT',         '^L/!!o5-^tFy+NrIqI7&G0.Ml*>d<NEB#z@ym7Qr)jP3j98n6Jx4FoNCUUgU+xEy' );
define( 'SECURE_AUTH_SALT',  'gbyhOPwo%eS:;Jy|)6/|L^sty1BT!A0g{P^ BB~SO}jVg/mhSKNQ|h6R(#D{-N#d' );
define( 'LOGGED_IN_SALT',    'ZAp0 {P(XEXoE(!9C]kfS4%bcXPj!Ibi`0rZ*J]:HNlE1{~w#DkmV+=216/r{,l8' );
define( 'NONCE_SALT',        '+;n6zI_mO?050O@b>}[/%Go(O_[Mwe_xaJo=5&@._|7LF}q8,o@->?yh=|@u]>z8' );
define( 'WP_CACHE_KEY_SALT', 'lK]-k#e6SgANqFB^8PE:Qb@[RiL{[ >rdaw)o)HdwtghY{zdgnIFo}-}i1 h9K1j' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
