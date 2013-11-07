<?php
// Reject direct script request
if(!defined('xDEC')) exit;

// xDec Core classes
$core = array(
    'Auth',         // Basic authentication
    'Cache',        // TODO implement
    'Cookie',
    'Database',
    'Extensions',   // TODO implement
    'Logger',       // Simple error logger
    'Mail',         // TODO implement
    'Router'
);


// Load registry: Handle all objects centrally and keeps them accessible everywhere
require_once(CORE.'Registry.class.php');

// Utility functions
require_once(CORE.'Function.php');

require_once(CORE .'Page.php');
require_once(CORE .'Pages.class.php');
require_once(CORE.'Extension.php');

// Load database modal
$modal = opendir(MODAL);
if($modal){
    while($file = readdir($modal)){
        if(is_file(MODAL.$file))
            /** @noinspection PhpIncludeInspection */
        require_once(MODAL.$file);
    }
}

// URL definitions
define('DOMAIN', (is_ssl()?'https://':'http://').$_SERVER['HTTP_HOST']);
define('URL_HOME', DOMAIN.DIR.'/');
define('URL_STATIC', DOMAIN.DIR.'/');
define('BINDING_MATCHES','BINDING_MATCHES');


// Registering error reporting function
error_reporting(E_ALL);
set_error_handler('error_handler', E_ALL);

// Building core classes into registry
foreach($core as $class){
    /** @noinspection PhpIncludeInspection */
    require_once(CORE.$class.'.class.php');
}
foreach($core as $class){
    define(strtoupper($class), $class);
    $obj = new $class();
// Defining a static reference
    set($class, $obj);
}
