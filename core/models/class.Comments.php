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
	      	if (empty($this->router->getId()) && empty($_POST['body']) && empty($_GET['idQuestion'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
						$this->idGauchada = ($this->router->getId()) ? intval($this->router->getId()) : null;
						$this->idQuestion = isset($_GET['idQuestion']) ? intval($_GET['idQuestion']) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function Add() {
	    $this->errors('comments?error=');
	    $this->db->insert('comments', array(
	      'body' => $this->body,
	      'createdAt' => date('Y/m/d H:i:s', time()),
        'lastModify' => date('Y/m/d H:i:s', time()),
        'idGauchada' => $this->router->getId(),
	      'idUser' => (new Sessions)->connectedUser()['idUser'],
	    ));
	    Func::redirect(URL . 'gauchadas/view/' . $this->router->getId());
  	}

		final public function AddQuestion() {
	    $this->errors('comments?error=');
	    $this->db->insert('comments', array(
	      'body' => $this->body,
	      'createdAt' => date('Y/m/d H:i:s', time()),
        'lastModify' => date('Y/m/d H:i:s', time()),
				'idGauchada' => $this->idGauchada,
				'idQuestion' => $this->idQuestion,
	      'idUser' => (new Sessions)->connectedUser()['idUser']
	    ));
	    Func::redirect(URL . 'gauchadas/view/' . $this->idGauchada);
  	}

  	final public function Delete() {
  		$this->Errors('news?errors=');
    	$this->db->delete('news', "idNew=$this->id");
    	Func::redirect(URL);
  	}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
