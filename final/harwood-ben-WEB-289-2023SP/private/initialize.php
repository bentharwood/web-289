<?php
  ob_start(); // output buffering
  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '\public');
  define("SHARED_PATH", PRIVATE_PATH . '\shared');

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('my_autoload');

  //function files
  require_once('functions.php');
  require_once('error_functions.php');
  require_once('db_cred.php');
  require_once('db_functions.php');
  require_once('validation_functions.php');

  //
  require_once('classes/database_object.class.php');
  require_once('classes/members.class.php');
  require_once('classes/session.class.php');

  $database = db_connect();
  DatabaseObject::set_database($database);

  $session = new Session;
