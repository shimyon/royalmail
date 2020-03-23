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
define('WP_CACHE', true);
define( 'WPCACHEHOME', dirname( __FILE__ ) . '/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'sarsofts_wp636' );

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
define( 'AUTH_KEY',         'gdhr4qstfogkmsayovj66n1xt393hfthh5zdoffmclefjgwuv2lombxxawvoeltv' );
define( 'SECURE_AUTH_KEY',  'lzmmrca9salwvxww6znwpdglcu19ipap1cgqfcuj4qu5iyn6bkz57urkktfr7zex' );
define( 'LOGGED_IN_KEY',    '8k33fz97pcjsy4acty0pnqsq2l9fqytyfd9sskvvxnbkvfuquybc7equ3ny686bn' );
define( 'NONCE_KEY',        'ktgnqcjuue2xvfjz7qmgcm9lzohhrzrx7jzywrm7yjt63x7idc6fyqbjf7uspkdt' );
define( 'AUTH_SALT',        'nyperaj41amjdfjmnugylhrxqe0s7dnuvzbztof1b1oscjhjlniidtytfyq8hpbt' );
define( 'SECURE_AUTH_SALT', 'p29dswc0h7gephnbpov34m5ip32jscxssqoipjgdbcor3vyxfkeupo5y7ql7rz0d' );
define( 'LOGGED_IN_SALT',   'wwnxxo6bq7uvhml6xcfx3kh0ew2flmahctofmfbl458x28srafejxr85ucprvzlz' );
define( 'NONCE_SALT',       'obru4dwuclvd7epdlt7mm2glvugov3m1ysfwlceipkjwhhwbxjxed6lwy85xx1jx' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpdw_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
