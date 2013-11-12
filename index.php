<?php
/**
 * \brief An open source application development framework for php
 *
 * xDec
 * ====
 *
 * xDec is light weight application development framework for PHP.
 *
 * Copyright
 * ---------
 * Copyright (C) 2013 Rahul Kadyan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 *
 * @author Rahul Kadyan <mail@rahulkadyan.com>
 *
 * @since version 1.0
 *
 * @version xDec 1.0 (Alpha)
 */

/**
 * Starts session
 */
session_start();

/**
 * Defines a constant and used to prevent indirect script access
 *
 * @name xDEC
 * @since version 1.0
 */
// Defines a constant and used to prevent indirect script access
define('xDEC', true);
// Starts output buffering. To prevent sending headers due accidental echoing text.
ob_start();
// Including `config.inc.php`, this file has definitions for global constants, like directories, database connections parameter, application meta etc.
require_once(dirname(__FILE__) . '/config.inc.php');
// Checks if website is accessible or not.
if (DISABLED) {
    // Maintenance mode: if file exists in `CONTENT` directory then include it otherwise echo error message stating 'Website under maintenance'.
    if (file_exists(CONTENT . 'maintenance.php')) require_once(CONTENT . 'maintenance.php');
    else echo "<h1>Website under maintenance...</h1>";
    exit;
}
// Including `bootstrap.php`, this file loads core library and xDec environment.
require_once(BASE . 'bootstrap.php');
// Flushes buffered output
ob_end_clean();
/**
 * $router is instance of Router class. It handles url binding.
 * @var object $router
 * @since version 1.0
 */
// $router is instance of Router class. It handles url binding.
$router = get('Router');
// If $router returns instance of Router class then navigate to requested url
if ($router instanceof Router)
    $router->navigate();