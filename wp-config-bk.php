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
define('DB_NAME', 'blog_atosconsulting');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'J~(R^NA+A;#%H6k=Z- kj.#*`tD?vHV(aN-JcZV5n#7]xjKh*l1Ve]uNaS6j2C7Y');
define('SECURE_AUTH_KEY',  'aiG.S<.$p>DewD;df$XVVL8W~>`P:R|4!^jW<.Te6m.rj*Ouo:Oh Uf~XU<N$#(,');
define('LOGGED_IN_KEY',    '{|Fh sN YMv5;Q7d6fJ$Mud#MXPr0&XT1*VJrH ]X<oIvaDtnH9+I5ibLi*k=U_=');
define('NONCE_KEY',        '>4{,)2}jj,jE:JUX%yGvWY=Ko@3O_:}^F[vQtEk[-+qQqrK]}2 h~~5RNcg@rAlz');
define('AUTH_SALT',        '~`)UppRJPGp7>3Nn}i_vBuDYjOKbd?B;yJs=fO3LMUumaq(l^`[$<bQEV%,Y}nbm');
define('SECURE_AUTH_SALT', '_8f4RT6d~yfo?+YLq6xsDKAqZr5o_v6?>BY}a)-(I|J==VQWSCDRW-LPj4wtMCNZ');
define('LOGGED_IN_SALT',   'i!:PW{7~_[{:k{G}SS`1`S7XD2$l1~Tjw_KPY+ce-O&{ej%(MB.gE0hXrX^-rZmE');
define('NONCE_SALT',       'yhA(dPquLyr6|I8_4|&VD,~;1.FR@j$Mh&(N4A  T0AuWx#4Yb~V#Cu:tlZ[u[H{');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
