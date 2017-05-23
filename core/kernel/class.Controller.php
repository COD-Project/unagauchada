<?php

/**
 * created by Ulises J. Cornejo Fandos on 17/03/2017
 */

abstract class Controller
{
  private static $instance;

  protected $isset_id;
  protected $method;
  protected $router;
  protected $sessions = null;

  static function getInstance() {
    if (!self::$instance) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  public function __construct(bool $LOGED = false, bool $UNLOGED = false)
  {
    global $router;
    $this->router = $router;
    $this->sessions = Sessions::getInstance();

    # Control de vida de sesiones
    if(DB_SESSION) {
      $this->sessions->checkLife();
    }

    # Restricción para usuarios logeados
    if($LOGED and !isset($_SESSION[SESS_APP_ID])) {
      Func::redirect(URL . 'logout/');
    }

    # Restricción de página para ser vista sólamente por usuarios No logeados
    if($UNLOGED and isset($_SESSION[SESS_APP_ID])) {
      Func::redirect();
    }

    # Debug
    if(DEBUG) {
      $_SESSION['___QUERY_DEBUG___'] = array();
    }

    # Utilities
    $this->method = $this->method = ($this->router->getMethod() != null and ctype_alnum($this->router->getMethod())) ? $this->router->getMethod() : null;
    $this->isset_id = ($this->router->getId() != null and is_numeric($this->router->getId()) and $this->router->getId() >= 1);
  }

  protected function render($template)
  {
    return include(HTML_DIR . $template . '.php');
  }

  protected function include($template)
  {
    return $this->render($template);
  }

}

?>
