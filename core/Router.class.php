<?php
if (!defined('xDEC')) exit;

// Defining some keys
define('ROUTER_FOLDER', 'ROUTER_FOLDER');
define('ROUTER_PAGE', 'ROUTER_PAGE');
define('ROUTER_ARGS', 'ROUTER_ARGS');
define('PAGE_OBJECT', 'PAGE_OBJECT');
class Router
{

    public function __construct()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = explode('?', $requestUri);
        $requestStr = $requestUri[0];
        if(strcmp(substr($requestStr,0,strlen(DIR)), DIR) == 0)
            $requestStr = substr($requestUri[0], strlen(DIR));
        $segments = explode('/', trim($requestStr, '/'));
        if (0 == count($segments)) {
            array_push($segments, 'home');
            array_push($segments, 'index');
        } else if (1 == count($segments))
            array_push($segments, 'index');
        // Check if there exist a folder in content with name === $segments[0]
        // and check if there is a home class (home.page.php) in that folder
        if ('error' != $segments[0] &&
            is_dir(CONTENT . $segments[0]) &&
            is_file(CONTENT . $segments[0] . '/' . $segments[1] . '.page.php')
        ) {
            set(ROUTER_FOLDER, $segments[0]);
            set(ROUTER_PAGE, $segments[1]);
        } else if (is_file(CONTENT . 'bind.php')) {
            require_once(CONTENT . 'bind.php');
            if (function_exists('urlBinding') && call_user_func('urlBinding', $requestStr)) {
            } else {
                set(ROUTER_FOLDER, 'error');
                set(ROUTER_PAGE, 'Error_404');
            }
        } else {
            set(ROUTER_FOLDER, 'error');
            set(ROUTER_PAGE, 'Error_404');
        }
        set(ROUTER_ARGS, $segments);
        set('REQUEST_URI', DOMAIN . $_SERVER['REQUEST_URI']);
        /** @noinspection PhpIncludeInspection */
        require_once(CONTENT . get(ROUTER_FOLDER) . '/' . get(ROUTER_PAGE) . '.page.php');
    }

    var $class, $method;

    public function navigate()
    {
        $cache = get('Cache');
        $uri = get('REQUEST_URI');
        if ($cache instanceof Cache && $cache->inCache($uri)) {
            $cache->_echo($uri);
        } else {
            $page = get(PAGE_OBJECT);
            if ($page instanceof Pages) {
                $page->startOutput(get(ROUTER_ARGS));
            }
        }
    }

    public function redirect($url, $rel = URL_HOME)
    {
        header("Location: " . $rel . $url);
    }

    /**
     *
     */
    private function __clone()
    {
    }

}