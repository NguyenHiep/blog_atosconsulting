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

define('DISALLOW_FILE_MODS',true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ij(Ot5vQNn}#wp=jq0I&H)Cg@-U=/HM2dXV>U+Lvgvw5o)(h}x8(D]zCNjpA9u,?');
define('SECURE_AUTH_KEY',  '*Y?{&H|ZV6ZnSPWLi68IMXNN&G>m:6>&w:Eo@}}prztspNP%Gc}fog]-pOjfIo<8');
define('LOGGED_IN_KEY',    '`TT;9<CAW0]TlE{>T1jNB3fd{aIB~i$RY($p2>hR(1A_0qG9i]Jh*IHcMN&YQw+A');
define('NONCE_KEY',        '5 ,Xw1-kt[Txf S&zF,m_Jbjt+Y;E$Ughk);`vX7&PJ-jS|wt*MUgZ2|#Vxjg&kq');
define('AUTH_SALT',        'g$EZ{Sk)|aj_phbbrW@^&TRDv4*QU/1R(6q7]IdxNbhJFxWU;,<8?Y9oHGNx)9$o');
define('SECURE_AUTH_SALT', 'Rf4GoVD6MMSjyJsdC+AHnV#}_w|h|4lZsUV~%IxpmpQHq@T6kzftMY5^Nm9wYrkL');
define('LOGGED_IN_SALT',   '6yU.aH[!ClO!xIH<y:<IYcX-`<~v_A!_pm9zLOvEDd5;2yxio*y$tO!A0aC:}Wix');
define('NONCE_SALT',       'd0:Ef~gm4=g~/$]~#A}~Bk,a.%=!J(BH~^kDBMB{D^5QC@3^*,VUg_x${4+~EbE+');

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
