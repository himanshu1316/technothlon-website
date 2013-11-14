<?php
/**
 * @author Rahul Kadyan <mail@rahulkadyan.con>
 * @version version 1.0
 */
namespace xDec;
/**
 * Defines `the application` status. If false then `the application` is down.
 *
 * @name DISABLED
 * @since version 1.0
 *
 */
define('DISABLED', false);
/**
 * Path to root directory of `the application`
 * @name BASE
 * @since version 1.0
 *
 */
define('BASE', dirname(__FILE__) . '/');
/**
 * Path to core library of `the application`
 * @name CORE
 * @since version 1.0
 *
 */
define('CORE', BASE . 'core/');
/**
 * Path to static files and front end controller of `the application`
 * @name CONTENT
 * @since version 1.0
 *
 */
define('CONTENT', BASE . 'content/');
/**
 * Path to database modal classes of the `the application`
 * @name MODAL
 * @since version 1.0
 *
 */
define('MODAL', BASE . 'modal/');
/**
 * Path to working directory of `the application` with respect to the hosted root directory
 * @name DIR
 * @since version 1.0
 *
 */
define('DIR', '');
/**
 * Path to cache directory of `the application` with respect to the hosted root directory
 * @name CACHE
 * @since version 1.0
 */
define('CACHE', BASE . 'cache/');
/**
 * MySQL Database server host
 * @name DB_HOST
 * @since version 1.0
 *
 */
define('DB_HOST', 'localhost');
/**
 * MySQL Database user
 * @name DB_USER
 * @since version 1.0
 *
 */
define('DB_USER', 'root');
/**
 * MySQL Database password
 * @name DB_PASS
 * @since version 1.0
 *
 */
define('DB_PASS', 'rootx');
/**
 * MySQL Database name
 * @name DB_NAME
 * @since version 1.0
 *
 */
define('DB_NAME', 'prototype');
/**
 * MySQL Database Server connection port
 * @name DB_PORT
 * @since version 1.0
 *
 */
define('DB_PORT', 3306);
/**
 * Enable/Disable database access to `the application`
 * @name DB_ENABLED
 * @since version 1.0
 *
 */
define('DB_ENABLED', true);

/**
 * Enable/Disable database query logging
 * @name LOG_DB_QUERY
 * @since version 1.0
 *
 */
define('LOG_DB_QUERY', true);

/**
 * Secret key for encrypting cookies and other data. 8 to 16 character string.
 * @name SECRET_KEY
 * @since version 1.0
 *
 */
define('SECRET_KEY', '');

/**
 * Title of `the application`
 * @name SITE_NAME
 * @since version 1.0
 *
 */
define('SITE_NAME', 'Technothlon');

/**
 * Description of `the application`. Published in meta tag of html.
 * @name SITE_META
 * @since version 1.0
 *
 */
define('SITE_META', 'Inspiring Young minds.....');