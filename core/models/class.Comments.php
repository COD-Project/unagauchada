<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Comments extends Models
{
  private $body;
  private $idGauchada;
  private $idQuestion;

  static private $ins;

  static function getInstance() {
      if (!self::$ins) {
          self::$ins = new self();
      }
      return self::$ins;
  }

  final public function __construct() {
      parent::__construct();
  }

  final private function errors($url) {
      try {
          if (empty($this->router->getId()) && empty($_POST['body']) && empty($_GET['idQuestion'])) {
            throw new PDOException("Error Processing Request", 1);
          } else {
            $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
            $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
            $this->idGauchada = is_numeric($this->router->getId()) ? intval($this->router->getId()) : null;
            $this->idQuestion = isset($_GET['idQuestion']) ? intval($_GET['idQuestion']) : null;
          }
      } catch (PDOException $e) {
        Func::redirect(URL . $url . $e->getMessage());
      }
    }

    final public function add() {
      $this->errors('comments?error=');
      $insert = array(
        'body' => $this->body,
        'createdAt' => date('Y/m/d H:i:s', time()),
        'lastModify' => date('Y/m/d H:i:s', time()),
        'idGauchada' => $this->idGauchada,
        'idUser' => (Sessions::getInstance())->connectedUser()['idUser'],
      );
      if ($this->idQuestion != null) $insert['idQuestion'] = $this->idQuestion;
      $this->db->insert('Comments', $insert);
      Func::redirect(URL . 'gauchadas/view/' . $this->idGauchada);
    }

    final public function get($options) {
      $where = "idGauchada=".$options['gauchada'] ." AND idQuestion";
      $where .= isset($options['question']) ? "=\"".$options['question']."\"" : " IS NULL";
    	$data = $this->db->select('*', 'Comments', $where);
	    if ($data) {
	        for($i = 0; $i < count($data); $i++) {
	          $comments[$i] = array(
	            'idComment' => $data[$i]['idComment'],
	            'body' => $data[$i]['body'],
	            'createdAt' => $data[$i]['createdAt'],
	            'lastModify' => $data[$i]['lastModify'],
	            'idUser' => $data[$i]['idUser'],
	            'answer' => (isset($data[$i]['idComment'])) ?
	                $this->get(array(
	              'gauchada' => $options['gauchada'],
	              'question' => $data[$i]['idComment'])
	            )[0] : false
	          );
	        }
	    } else {
      	$comments = null;
	    }
	  return $comments;
		}

    final public function __destruct() {
      parent::__destruct();
    }
}
