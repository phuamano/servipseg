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
define('DB_NAME', 'servipseg');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 's3gurid@d');

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
define('AUTH_KEY',         'p?R^(S|h;Kl!Oj!h0<|^PRAQF85F+7`JS9ft)<J<8]Pnk|?QX7vy/~N^Sv}rjDLi');
define('SECURE_AUTH_KEY',  'bQxzDcU=d(zgN$+{E-M/l27k{|G|uFS3_hzGV4G5NC8*;~rbe>.6U*7>-0MHI-05');
define('LOGGED_IN_KEY',    'O}3@-J9m->[|/ISfW3e[CF~)Uoqhg&ja+5yE7%QS5u05#oC$m}ME-a _p4rS|F*O');
define('NONCE_KEY',        '?yWm)VdQ{th1gTCjcb8ngCiA?(5g?_oZ_F]BiAG7yy,X~@ $s25bRwm MoGS79%O');
define('AUTH_SALT',        '+Z+:MK@S@cD7p0(pq29#|y0~R.<]PqeS$j|w-1&LLr{H^*Z}_H*4D)L{/H(46Mrl');
define('SECURE_AUTH_SALT', 'rD:_{&g8<XF7BC!0-$49Iqw:afK@)mM|z_pV#Lq;u8{iWt|Y]2^k/b<kf}U>^:qC');
define('LOGGED_IN_SALT',   'zx},E?6~lsC=w{Rt`di4*/z<g=2[@5WA^Xj0*R5C|t(8!#q>e]nioAV`Ur>1?fZ?');
define('NONCE_SALT',       '<-C3;LGU5A>_UHUQ4?elHu/ y< yeg|9T]?r1F3_AFxbT-/|g#Sx,D:sBCO1J(d ');

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
define('FS_METHOD','direct');
/*define('WP_HOME','http://192.168.1.10/servipseg');*/
/*define('WP_SITEURL','http://192.168.1.10/servipseg');*/

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
