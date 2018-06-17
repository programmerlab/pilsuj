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
define('DB_NAME', 'pilsuj');

/** MySQL database username */
define('DB_USER', 'naaru');

/** MySQL database password */
define('DB_PASSWORD', 'Naaru!@123');

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
define('AUTH_KEY',         'cluduig2mwoscjr0rskrongfp1fhpmiuaheitexqkgx0eijpxy46fqfj4cwdorcp');
define('SECURE_AUTH_KEY',  'ooxzwg5sqpgl4vn94jsydaeq4fn5orwtwkn4epv7isoqdhyw6qqcovum01zmznbt');
define('LOGGED_IN_KEY',    'pphstaopicmdttcklyn1rkffmp5xsczcx2034g7lpbrasgtgr5emyd5fvgexdhnx');
define('NONCE_KEY',        '26vrze8snbg1nibgtc5eb7frgmpp8qxqba5kqkgmvgvxjsmbl0huzlqmgowcasmt');
define('AUTH_SALT',        'u4rgdlaliwyxelagckxdbbqat9qfmpoqclelwinmnp2qjgaqjkuofmcvxgxofae8');
define('SECURE_AUTH_SALT', 'pjtgdndszotmui3shjxvfedn0xjen9n4k07j895tvtdccn2ll4vo0czbunnxy8kx');
define('LOGGED_IN_SALT',   'hkzb6olmhxawgzsnf8vzcemkhmus5qs1pmcacxroympj66bul5mrpyzqlzzvbvff');
define('NONCE_SALT',       'u71anpyj2wlmprrgegonsgwcmj5mnpu89s8dxvtfxtnitwjwconuffm9cugqa5fk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wprs_';
define('WP_ALLOW_REPAIR', true);
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
define('SCRIPT_DEBUG', TRUE);
define('WP_DEBUG', TRUE);
define( 'WP_DEBUG_LOG', true );

define('FS_METHOD', 'direct');  
// define('DISALLOW_FILE_MODS', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


define( 'WPMS_ON', true );

