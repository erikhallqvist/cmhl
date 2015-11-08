<?php

  date_default_timezone_set('America/Denver'); // Set a default timezone
  define('BASEDIR', realpath(__DIR__ . '/../') . '/');
  define('LIBDIR', BASEDIR . 'lib/');
  define('HOSTNAME_CMHL', 'localhost'); // www.cmhlhockey.ca
  define('DIR_WS_IMAGES', BASEDIR . 'images/');
  define('CHARSET', 'utf-8');
  define('PASSWORD_MIN_LENGTH', 5);

  require BASEDIR . 'config/db.rc.php'; // db settings
  require BASEDIR . 'vendor/autoload.php'; //composer
  \SparkLib\Autoloader::setup();

  // Try to use the hostname provided by nginx/apache unless it's already defined
  if (!defined('HOSTNAME'))
    define('HOSTNAME', (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : gethostname()));

  \SparkLib\Autoloader::$classPath = [
      'CMHL'                => 'classes/CMHL.php',
      'CMHLRouteMap'        => 'classes/CMHLRouteMap.php'
  ];
  \SparkLib\Autoloader::$searchPaths = array(
    'CMHL' => 'classes/CMHL/',          // Main CMHL Application controller
  );

