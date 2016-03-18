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
define('DB_NAME', 'jeanknowscars');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ')e-D ,s,U|=O_8|^It@gEpO/CvHR|%I$>i<e+d;B,2zEmtUkFGrqAlw9K|J9hRpV');
define('SECURE_AUTH_KEY',  '##Hz<K:^iBhi3_T>][I!QVv;|OLdH1!+SX0b)K?&t]2*:KIdgO^3`|^wd 6iL2;@');
define('LOGGED_IN_KEY',    'rCUZ)lT=!~w7L+bRH+%+|q80S4 aQ+nHSNh0QQ|?nFmMM[mFw/F`@f)7qQt0u#t#');
define('NONCE_KEY',        'ED{Fst-^?z!e;aP.]d0vX:]K=|^4tckM~0#E.;~ku$RXa0~|+8|~`LOp2R$@r[L&');
define('AUTH_SALT',        ':XqcvLjSy~LZdj+AKvl$GS,P9Q^WLkK[U6]+_+/5-Icd`+@I(c<{trw2yBg*0V%C');
define('SECURE_AUTH_SALT', '_j[t_oT17_-Bh9WwV[}-L+pX-p-zW&#D%rDR+tuTCr12E8Ng0<7ULs?VuX*]w&|i');
define('LOGGED_IN_SALT',   'Ix?v0#][h#[/0=FWgAD9iqi9X1rs.R8hgA:P-zS ;YfR`]j 0e@KCY]?]yC CyhM');
define('NONCE_SALT',       'q ^@|*#vc*+7wOr)#7*0sXV_F:Wi|KDHyRuoMV>@98+kG|[x+4@9V6)~I:ZhW4qC');

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

/** Setting home url */
define('WP_HOME', 'http://local.jeanknowscars.com/');
define('WP_SITEURL', 'http://local.jeanknowscars.com/');

/** Debugging disabled */
define('WP_DEBUG', false);

/** Automatic updates disabled */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/** Automatic database optimization */
define('WP_ALLOW_REPAIR', true);

/* That's all, stop editing! Happy blogging. */


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
