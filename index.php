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

  define('INDEX_DIR', true);
  
  require('core/core.php');
  __kernel_autoload('Controller');


  $Controller = $router->getController();

  if (!is_readable('core/controllers/' . $Controller . '.php')) {
      $Controller = 'ErrorController';
  }

  require('core/controllers/' . $Controller . '.php');
  new $Controller;

 
