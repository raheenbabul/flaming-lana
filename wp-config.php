<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'asplundh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'oBMPfcJnTk9t<Ix$81<r!-q?t1<D%.A;{^0R!5|FGmdo1>5dk~Qwy%WV:Y8#h7>.');
define('SECURE_AUTH_KEY',  '(08)^x=qEH<pj:VzVZIe7!s <5KD?d=)]Y(u<WP?KD=i[zWY-j4r1oRQ(iW[#nN|');
define('LOGGED_IN_KEY',    'tiH2qDT#6bS#z5 2gU6^sbt|JHTH5?|SSb>}Fy>%ve4~)280L1.WT|]|~o#l+O8S');
define('NONCE_KEY',        'O?G>#_Cb>{wm|J[pXpg~7F*yzXADO++JI0u3B5!++:s5$58N|}63DD(PKhLL4O!w');
define('AUTH_SALT',        'Wr*:fHw5N/l76l$9C@NS*2~A-=jU6Z D|L1@e.rE`)Toj^v}g47(4P%#Tvu? _W4');
define('SECURE_AUTH_SALT', '|e!QoHNdCff,%VlUs ji-jgV78$8U`KDuM]pMo;6+ %L3y|{{jq@eoOT[+Z>l>TH');
define('LOGGED_IN_SALT',   'Il7L1n{Dkb>Lgwpn@(G?@n*q-U[Y8M{UN}L1fA|d-{Et.Is=(KKVW&(A8Lrk<Ls]');
define('NONCE_SALT',       'q@%A&?LYqX}cmGt8^-TS+g,hHD7I_HrBnQ:Y`Jz?+UN4VC|i7-q+RSdNFZ]6TrjA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'asp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


    // Sets the value of a configuration option 
    // string ini_set ( string $varname , string $newvalue ) 
    ini_set('default_charset','UTF-8'); 
?>
