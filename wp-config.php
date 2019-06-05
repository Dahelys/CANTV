<?php


/** Enable W3 Total Cache Edge Mode */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/amagi/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache
/* define var file size*/
@ini_set ('upload_max_filesize', '1024M');
@ini_set ('post_max_size', '1024M');
@ini_set ('memory_limit', '1024M');
@ini_set ('max_execution_time', '300');
@ini_set ('max_input_time', '300');



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
define('DB_NAME', 'certificacion_econsulting_la');

/** MySQL database username */
define('DB_USER', 'amagi_la');

/** MySQL database password */
define('DB_PASSWORD', 'C@QeUG3TaWyjD(]Lrp.85@.4');


/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'qDtBnJWQnPntZp4sv8GEFuUB4tjIdieMdELlVTBFtADkoT3vY2kIwZ31DqEKuY7w');
define('SECURE_AUTH_KEY',  '7dxqTdWkpg5bqyyVVzdpNFOw6j3GqpiBBQi5jqrOc098P6FVPBM2eIBgjc06pFdO');
define('LOGGED_IN_KEY',    'QFYMQSp3ecW0VPSVuI3rz0q3USVJTbuKxefQ0BFiwSYBN4RxrtR2JR8oAfcS2yNr');
define('NONCE_KEY',        'i04wU5u44O3H8da6bnYzPHO0A4tGgDx046XdDoESjme1WymsN1JOZ6hgnnqZFzr7');
define('AUTH_SALT',        'CIAJrJbxyWmRiVcGR3jTuC7uN6doAJzILTq64vuEUVc4qrwtHV6cIMvGrSyTrUEV');
define('SECURE_AUTH_SALT', 'KINgmq4GSE9RFShPi9ux8b1TrLNHRPol2NehLVtSDiqaLes13l6mqx3h5cF7w6FD');
define('LOGGED_IN_SALT',   'Xgqm0oh6jduwyvkFoYsvwc5rTMW90iTCnAnjEVyUFVngq4A5o87Vai4l5G6aaP0f');
define('NONCE_SALT',       'q29lfkN8secIkUaCpHLKBMq75DxrsDF4UVlB7uU3ndBCstQDUiVgN0AdiDWrqSc6');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'am_';

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
