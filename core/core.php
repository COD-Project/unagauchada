<?php

/*
  The Kernel of the App!
*/

# Version alert
try {
  if (version_compare(phpversion(), '7.0.0', '<'))
    throw new Exception(true);
} catch (Exception $e) {
  die('Current <b>PHP</b> version is <b>' . phpversion() . '</b> and a version greater than or equal to <b>7.0.0</b> is required');
}

require('core/config.php');
require('core/bin/consts.php');
require('vendor/autoload.php');
require('core/kernel/kernel.php');

//-------------------------------------------------------------------
__kernel_autoload('class.Router');
__kernel_autoload('class.Connection');
__kernel_autoload('class.Functions');
__models_autoload(array(
  'Models',
  'Sessions',
  'Images',
  'Users',
  'Gauchadas',
  'Categories',
  'Comments'
));
__functions_autoload(array(
  'Images',
  'Users',
  'EmailTemplate',
  'Comments',
  'Gauchadas',
  'Categories',
  'Creditos',
  'Comments'
));


$router = new Router();

?>
