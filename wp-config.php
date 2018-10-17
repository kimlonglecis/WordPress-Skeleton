<?php
$MYSQL_DATABASE = getenv('MYSQL_DATABASE');
$MYSQL_USER = getenv('MYSQL_USER');
$MYSQL_PASSWORD = getenv('MYSQL_PASSWORD');
$MYSQL_HOST = getenv('MYSQL_HOST');

$AUTH_KEY = getenv('AUTH_KEY');
$SECURE_AUTH_KEY = getenv('SECURE_AUTH_KEY');
$LOGGED_IN_KEY = getenv('LOGGED_IN_KEY');
$NONCE_KEY = getenv('NONCE_KEY');
$AUTH_SALT = getenv('AUTH_SALT');
$SECURE_AUTH_SALT = getenv('SECURE_AUTH_SALT');
$LOGGED_IN_SALT = getenv('LOGGED_IN_SALT');
$NONCE_SALT = getenv('NONCE_SALT');
 

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define('DB_NAME', $MYSQL_DATABASE);
    define('DB_USER', $MYSQL_USER);
    define('DB_PASSWORD', $MYSQL_PASSWORD);
    define('DB_HOST', $MYSQL_HOST);
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         $AUTH_KEY);
define('SECURE_AUTH_KEY',  $SECURE_AUTH_KEY);
define('LOGGED_IN_KEY',    $LOGGED_IN_KEY);
define('NONCE_KEY',        $NONCE_KEY);
define('AUTH_SALT',        $AUTH_SALT);
define('SECURE_AUTH_SALT', $SECURE_AUTH_SALT);
define('LOGGED_IN_SALT',   $LOGGED_IN_SALT);
define('NONCE_SALT',       $NONCE_SALT);

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
