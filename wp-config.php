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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sample1db' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'Q>iu{CF.!d3aom4g(lKei,jyI8qEv$S)]UZsrSI[VzdG,z+^1uj4af:|2f$[Le^z' );
define( 'SECURE_AUTH_KEY',  ' G8b.2L(KO{7[{.=z74AM_mw}&13,-<}sI:5fV4a|h/D(^|=8[([AaIv)|zQq$.+' );
define( 'LOGGED_IN_KEY',    'S|DQYO/>mwN.=6$C60=I($H#_%zgTgd=nqtH=h#?,~`YC8!pPjRR7-jQ{nU; |8Y' );
define( 'NONCE_KEY',        'yWAI1eocU-_1JxDQ9W.#Wzd]Ct/J8w+n)8PkC_9jf(-si=X5)5+&&*q#fe!UD a>' );
define( 'AUTH_SALT',        'vQ(a$QsigZ0Q<|m;n&r_~0KuK-JHa_:AW7*#HNS8#Z,GvcuRsnW6|gCc/X2au%p ' );
define( 'SECURE_AUTH_SALT', 'mFq:X+J2:h)X)_Ov`xiwi*mST?s?0}*TL8CT#,!yn|HYtuez]D5Jwcn*m2q94XEf' );
define( 'LOGGED_IN_SALT',   '(QN_27r7Me]ULicRjw%e(t}oy1 tNHsC2!Uk~mEgNOGch6E.H&[`M$sq!_Q4&Izs' );
define( 'NONCE_SALT',       '!8)L!W^dL1KiX!_Q6fu7# &94c^2=?L,TaE6Kj.sOOqTU[Zs:nGv{l5A0hCtY 7+' );

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