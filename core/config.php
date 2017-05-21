<?php

# Strict types for PHP 7
declare(strict_types=1);

//------------------------------------------------
# Security
defined('INDEX_DIR') OR exit('unagauchada software says .i.');

//------------------------------------------------
# Timezone DOC http://php.net/manual/es/timezones.php
date_default_timezone_set('America/Argentina/Buenos_Aires');

//------------------------------------------------
/**
  * Settings for DB connection.
  * @param host 'Server for connection to the database -> local/remote hosting'
  * @param user 'Database user'
  * @param pass 'Password of the database user'
  * @param name 'Database name'
  * @param port 'Database port (not required on most engines)'
  * @param protocol 'Connection protocol (not required on most engines)'
  * @param motor 'Default connection engine'
  * MOTORS VALUES:
  *        mysql
  *        sqlite
  *        oracle
  *        postgresql
  *        cubrid
  *        firebird
  *        odbc
  */
define('DATABASE', array(
  'host' => 'localhost', 
  'user' => 'root',
  'pass' => '',
  'name' => 'unagauchadaDB',
  'port' => 1521,
  'protocol' => 'TCP',
  'motor' => 'mysql'
));

//------------------------------------------------
/**
 * Defines the directory in which the framework is installed
 * @example "/" If to access the framework we place http://url.com in the URL, or http://localhost
 * @example "/php7-quickstart/" if to access the framework we place http://url.com/php7-quickstart, or http://localhost/php7-quickstart/
*/
define('__ROOT__', '/unagauchada/');

# App constants
define('URL', 'http://localhost/unagauchada/');
define('APP', 'unagauchada');
define('HTML_DIR', 'templates/');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP);

//------------------------------------------------
# Session control
define('DB_SESSION', true);
define('SESSION_TIME', 18000); # life time for session cookies -> 5 hs = 18000 seconds.
define('SESS_APP_ID', '_sess_app_id_');
define('KEY', '__$unagauchada$__key&__');
session_start([
  'use_strict_mode' => true,
  'use_cookies' => true,
  'cookie_lifetime' => SESSION_TIME,
  'cookie_httponly' => true # Avoid access to the cookie using scripting languages (such as javascript)
]);

//------------------------------------------------
# PHPMailer constants
define('PHPMAILER', array(
  'HOST' => '',
  'USER' => '',
  'PASS' => '',
  'PORT' => 465
));

//------------------------------------------------
# PayPal SDK
define('PAYPAL', array(
  'MODE' => 'sandbox', //sandbox or live
  'CLIENT_ID' => '',
  'CLIENT_SECRET' => ''
));

//------------------------------------------------
# Firewall
define('FIREWALL', true);

//------------------------------------------------
# DEBUG mode
define('DEBUG', false);

//------------------------------------------------
define('E_ERNO','');


//------------------------------------------------
# Current version of the framework
define('VERSION', '1.1');

?>
