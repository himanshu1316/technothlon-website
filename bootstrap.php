<?php
namespace xDec;
// Checks for direct script request and exits if found so.
if (!defined('xDEC')) exit;

// Core library classes of `the application` or xDec
/**
 * @var array $core Core library classes of `the application` or xDec
 * @since version 1.0
 */
$core = array(
    'Database', // Interface for common database queries
    'Cache', // Caching functions TODO implement
    'Cookie', // Secure cookie storage
    'Extensions', // TODO implement
    'Logger', // Simple error logger
    'Mail', // TODO implement
    'Auth', // Basic authentication
    'Router' // URL Binding handler
);


// Loading registry: Loads a static instance of Registry class and this instance takes care of global variable and manges singleton
require_once(CORE . 'Registry.class.php');

// Loading utility functions: Some commonly used functions
require_once(CORE . 'Function.php');

// Loading page template: Minimal interface for class capable of handling Router class' navigate mechanism
require_once(CORE . 'Page.php');
// Loading default page template implementation: Advanced interface for class capable of handling Router class' navigate mechanism
require_once(CORE . 'Pages.class.php');
// Loading extension library: Loads all enabled extensions into memory
require_once(CORE . 'Extension.php');

// Loading database modal: Database modal is a collection of static classes
/**
 * Resource link for loading Database modal
 * @var resource $modal
 * @since version 1.0
 */
$modal = opendir(MODAL);
if ($modal) {
    while ($file = readdir($modal)) {
        if (is_file(MODAL . $file))
        require_once(MODAL . $file);
    }
}

/**
 * Domain name of the server where `the application` is hosted.
 * @name DOMAIN
 * @since version 1.0
 */
// Domain name of the server where `the application` is hosted.
define('DOMAIN', (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']);

/**
 * Complete address/url of `the application`
 * @name URL_HOME
 * @since version 1.0
 */
// Complete address/url of `the application`
define('URL_HOME', DOMAIN . DIR . '/');

/**
 * Complete address/url of `the application` for static files. (Some servers can't load `htaccess` file).
 * @name URL_STATIC
 * @since version 1.0
 */
// Complete address/url of `the application` for static files. (Some servers can't load `.htaccess` file).
define('URL_STATIC', DOMAIN . DIR . '/');


/**
 * Used as array index for sending custom url parameters (other than $_GET) to routing class
 * @name BINDING_MATCHES
 * @since version 1.0
 */
// Used as array index for sending custom url parameters (other than $_GET) to routing class
define('BINDING_MATCHES', 'BINDING_MATCHES');

// Registering custom error reporting function
error_reporting(E_ALL);
set_error_handler('error_handler', E_ALL);

// Loading core library
foreach ($core as $class) {
    require_once(CORE . $class . '.class.php');
}

// Loading core library instances into registry
foreach ($core as $class) {
    define(strtoupper($class), $class);
    $obj = new $class();
    set($class, $obj);
}
