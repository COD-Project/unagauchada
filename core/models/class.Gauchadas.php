<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Gauchadas extends Models
{
	private $title;
	private $body;
	private $state;
	private $locality;
	private $limitDate;
	private $evaluation;
	private $idCategory;

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
	      	if (empty($this->router->getId()) && empty($_POST['title']) && empty($_POST['body']) && empty($_POST['locality']) && empty($_POST['limitDate']) && empty($_POST['evaluation']) && empty($_POST['idUser']) && empty($_POST['idCategory'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->title = isset($_POST['title']) ? $this->purifier($this->db->escape($_POST['title'])) : null;
		        $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
		        $this->state = isset($_POST['state']) ? $this->purifier($this->db->escape($_POST['state'])) : null;
		        $this->locality = isset($_POST['locality']) ? $this->purifier($this->db->escape($_POST['locality'])) : null;
		        $this->limitDate = $_POST['limitDate'] ?? null;
		        $this->evaluation = isset($_POST['evaluation']) ? intval($_POST['evaluation']) : null;
		        $this->idCategory = isset($_POST['idCategory']) ? intval($_POST['idCategory']) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function add() {
	    $this->errors('gauchadas?error=');
	    $this->db->insert('Gauchadas', array(
	      'title' => $this->title,
	      'body' => $this->body,
	      'location' => $this->state . ", " .$this->locality,
	      'limitDate' => $this->limitDate,
	      'createdAt' => date('Y/m/d H:i:s', time()),
	      'evaluation' => $this->evaluation,
	      'idUser' => (Sessions::getInstance())->connectedUser()['idUser'],
	      'idCategory' => $this->idCategory
	    ));
			if (isset($_FILES['images']) && Func::images($_FILES['images'])) {
				(new Images())->Add();
			} else {
				$this->db->insert('GauchadasImages', array(
					'idGauchada' => $this->db->lastInsertId(),
					'idImage' => 1
				));
			}
	    $this->db->update('Users', array('credits' => (Sessions::getInstance())->connectedUser()['credits'] - 1), 'idUser='.(Sessions::getInstance())->connectedUser()['idUser'], 'LIMIT 1');
	    Func::redirect(URL);
  	}

  	final public function delete() {
  		$this->Errors('gauchadas?errors=');
    	$this->db->update('Gauchadas', array(
	      'validate' => 1
	    ),"idGauchada=$this->id");
    	Func::redirect(URL);
  	}

		final public function postulate() {
			$this->Errors('gauchadas?errors=');
			$this->db->insert('Postulantes', array(
				'idUser' => (new Sessions)->connectedUser()['idUser'],
				'idGauchada' => $this->id,
				'selected' => '0'
			));
			Func::redirect(URL.'gauchadas/view/'. $this->id);
		}

		final public function accept() {
			$this->Errors('gauchadas?errors=');
			$this->db->update('Postulantes', array(
				'selected' => 1
			), "idGauchada=$this->id AND iduser=");
			Func::redirect(URL);
		}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
