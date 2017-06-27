<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Ratings extends Models
{
	private $rating;
	private $body;
	private $idGauchada;

	static private $ins;

	static function getInstance()
	{
	    if (!self::$ins) {
	        self::$ins = new self();
	    }
	    return self::$ins;
	}

	final public function __construct()
	{
	    parent::__construct();
	}

	final private function errors($url)
	{
	    try {
	      	if (empty($this->router->getId()) && empty($_POST['body']) && empty($_POST['rating'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
		        $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
				$this->idGauchada = ($this->router->getId()) ? intval($this->router->getId()) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function add() {
	    $this->errors('comments?error=');
		$insert = array(
		'rating' => $this->rating,
	    'body' => $this->body,
        'idGauchada' => $this->idGauchada
	    );
	    $this->db->insert('Ratings', $insert);
	    Func::redirect(URL . 'gauchadas/view/' . $this->idGauchada);
  	}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
