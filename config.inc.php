<?php
// Website status
define('DISABLED', false);
// Directories
define('BASE', dirname(__FILE__).'/');
define('CORE', BASE.'core/');
define('CONTENT', BASE.'content/');
define('MODAL', BASE.'modal/');

// Directory site hosted in relative to domain
define('DIR', '/mark-1');

// DATABASE definitions
define('DATABASE_DRIVER', 'MySQL');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','rootx');
define('DB_NAME','prototype');
define('DB_PORT',3306);
define('DB_ENABLED', true);

// DEV mode
define('LOG_DB_QUERY', true);

// Security definitions
define('SECRET_KEY', '');

// Site Definitions

// Class to route <domain>/ requests
define('HOME_CLASS','home');

// Default title
define('SITE_NAME', 'Rahul Kadyan');

// Default meta description
define('SITE_META', '');