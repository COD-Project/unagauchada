 <?php

/*
  The Kernel of the App!
*/

# Version alert
try {
    if (version_compare(phpversion(), '7.0.0', '<')) {
        throw new Exception(true);
    }
} catch (Exception $e) {
    die('Current <b>PHP</b> version is <b>' . phpversion() . '</b> and a version greater than or equal to <b>7.0.0</b> is required');
}

require('core/config.php');
require('core/consts.php');
require('vendor/autoload.php');
require('core/kernel/kernel.php');

//-------------------------------------------------------------------
__kernel_autoload('Router');
__kernel_autoload('Connection');
__kernel_autoload('Functions');
__models_autoload(array(
  'Models',
  'Sessions',
  'Images',
  'Users',
  'Gauchadas',
  'Categories',
  'Comments',
  'Postulants',
  'Ratings',
  'Credits',
  'Purchases',
  'Reputations'
));
__functions_autoload(array(
  'Ratings'
));


$router = new Router();

?>
