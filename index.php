<?php
// Starting session
session_start();
// Global declaration of xDEC variable for limiting direct script access
define('xDEC', true);
ob_start();
// Site constant definitions
require_once(dirname(__FILE__).'/config.inc.php');
if(DISABLED){
    require_once(CONTENT.'home/maintenance.php');
    exit;
}
// Framework loader
require_once(BASE.'bootstrap.php');
ob_end_clean();
$router = get('Router');
if( $router instanceof Router)
    $router->navigate();