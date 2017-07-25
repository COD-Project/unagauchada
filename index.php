<?php

/**
  * PHP7-QuickStart - MVC Architecture for Web Applications
  * PHP Version 7
  * @package php7-quickstart
  * @version v1.1
  * @author ulises-jeremias <github.com/ulises-jeremias/> COD-Project
  * @copyright 2017 - PHP7-QuickStart
  * @license	http://opensource.org/licenses/MIT	MIT License
  * @link http://github.com/ulises-jeremias/php7-quickstart
*/

  //------------------------------------------------

  define('INDEX_DIR', true);
  # Kernel load
  require('core/core.php');
  __kernel_autoload('Controller');

  //------------------------------------------------

  # Driver Detection
  $Controller = $router->getController();

  //------------------------------------------------

  # Identification of the controller in the system
  if(!is_readable('core/controllers/' . $Controller . '.php')) {
    $Controller = 'errorController';
  }

  # Loading selected driver
  require('core/controllers/' . $Controller . '.php');
  new $Controller;

  //------------------------------------------------

?>
