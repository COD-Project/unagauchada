<?php
/**
 * created by Ulises J. Cornejo Fandos on 17/03/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . 'software says .i.');

//------------------------------------------------
final class Router
{
  private static $instance;
  public $dir = __ROOT__;
  private $controller = null;
  private $method = null;
  private $id = null;

  final static function getInstance() {
    if (!self::$instance) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  final public function __construct()
  {
    $this->session = Sessions::getInstance();
    $this->url = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if($this->dir == '/' and strlen($this->url) > strlen($this->dir)) {
      $this->url[0] = '';
    } else {
      $this->url = explode($this->dir,$this->url);
      $this->url = $this->url[1];
    }
    if(!empty($this->url) and $this->url != $this->dir) {
      $this->url = explode('/',$this->url);
      $this->controller = ctype_alnum($this->url[0]) ? ucfirst(strtolower( $this->url[0] )) . 'Controller' : 'HomeController';
      $this->method = array_key_exists(1,$this->url) ? $this->url[1] : null;
      $this->id = array_key_exists(2,$this->url) ? intval($this->url[2]) : null;
    } else {
      $this->controller = 'HomeController';
    }
  }

  final public function elements()
  {
    return array_slice($this->url, 3);
  }

  //------------------------------------------------
  /**
    * Returns actual driver
  */
  final public function getController()
  {
    return trim($this->controller);
  }

  //------------------------------------------------
  /**
    * Returns actual method if exists
  */
  final public function getMethod()
  {
    return $this->method;
  }

  //------------------------------------------------
  /**
   * Returns actual id if exists
  */
  final public function getId()
  {
    return $this->id;
  }

  final public function semanticURL(string $string) : string
  {
    $string = trim($string);
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        'a',
        $string
    );
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        'e',
        $string
    );
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        'i',
        $string
    );
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        'o',
        $string
    );
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        'u',
        $string
    );
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
      $string = str_replace(
          array("\\", "¨", "º", "-", "~",
               "#", "@", "|", "!", "\"",
               "·", "$", "%", "&", "/",
               "(", ")", "?", "'", "¡",
               "¿", "[", "^", "`", "]",
               "+", "}", "{", "¨", "´",
               ">", "< ", ";", ",", ":",
               ".", " "),
          '-',
          $string
      );
    return strtolower($string);
  }

}

?>
