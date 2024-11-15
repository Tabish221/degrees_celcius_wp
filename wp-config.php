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
define( 'DB_NAME', 'degrees_celcius' );

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
define( 'AUTH_KEY',         'mK ce4(7v+&<NG;)FvcHXMz!DAkLsAWFr,RvD#22GyB59.L99uUPeap.CIlFE}uM' );
define( 'SECURE_AUTH_KEY',  'x|]-eqW*x@JoLE_oJBj3eDmoz[tAVq*Vd-Sy>uz`+g+IB:9LFq%;AV6_15/KA^GP' );
define( 'LOGGED_IN_KEY',    '4<6:TAF9;ffO|2%$mI:X]Yh[/BS|I*zt=UT@8VT[Fdx=$6Cu]w[H/xLwr5ZAFbh|' );
define( 'NONCE_KEY',        '&&riXJP%?c/:lXH;2di@8*6w(xgBH7Vu{FfHOc4iLZe_)mO/6Tm`JHoTwH#$mXIf' );
define( 'AUTH_SALT',        'ccf+kG 4cD<3I:EUU})yfOnwbZZU#llC74)Ke:(JH7[Xdwjsx[JJ/lWv)@Sk|*Q&' );
define( 'SECURE_AUTH_SALT', 'dIB}jZP!dJ1lOOx^3OPS?#sI=^wD]mzX_Z25aq,onm:#z.6VM5{3:9X4;RE@i6z7' );
define( 'LOGGED_IN_SALT',   'e#TYRrz~5*5n(#pP)psO~IzEt||QBXx:OI83U XyhTg/PwXR~`H22=$!]]SW;@0S' );
define( 'NONCE_SALT',       '>,$]oW$JsnD}?D$rPTsu}[F|bw7w]oMdX)q+Ki:jbV-e@i9Xnar0!_Hn7vrab)|,' );

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
