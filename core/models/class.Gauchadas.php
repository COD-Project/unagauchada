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
	private $location;
	private $limitDate;
	private $evaluation;
	private $idUser;
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

	final private function Errors($url) 
	{
	    try {
	      	if (empty($this->router->getId()) && empty($_POST['title']) && empty($_POST['body']) && empty($_POST['location']) && empty($_POST['limitDate']) && empty($_POST['evaluation']) && empty($_POST['idUser']) && empty($_POST['idCategory'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->title = isset($_POST['title']) ? $this->purifier($this->db->escape($_POST['title'])) : null;
		        $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
		        $this->location = isset($_POST['location']) ? $this->purifier($this->db->escape($_POST['location'])) : null;
		        $this->limitDate = isset($_POST['limitDate']) ? $_POST['limitDate'] : null;
		        $this->evaluation = isset($_POST['evaluation']) ? intval($_POST['evaluation']) : null;
		        $this->idUser = isset($_POST['idUser']) ? intval($_POST['idUser']) : null;
		        $this->idCategory = isset($_POST['idCategory']) ? intval($_POST['idCategory']) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function Add() 
  	{
	    $this->Errors('gauchadas?error=');
	    $this->db->insert('Gauchadas', array(
	      'title' => $this->title,
	      'body' => $this->body,
	      'location' => $this->location,
	      'limitDate' => $this->limitDate,
	      'creationAt' => date('Y/m/d H:i:s', time()),
	      'evaluation' => $this->evaluation,
	      'idUser' => $this->idUser,
	      'idCategory' => $this->idCategory 
	    ));
	    Func::redirect(URL . "news?success=true");
  	}

  	final public function __destruct()
  	{

  	}
}