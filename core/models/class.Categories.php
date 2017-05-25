<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Categories extends Models
{
	private $name;


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
	      	if (empty($this->router->getId()) && empty($_POST['name'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->name = isset($_POST['name']) ? $this->purifier($this->db->escape($_POST['name'])) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function Add() 
  	{
	    $this->Errors('categorias?error=');
	    $this->db->insert('Categories', array(
	      'name' => $this->name, 
	    ));
	    Func::redirect(URL . "news?success=true");
  	}

  	final public function __destruct()
  	{

  	}
}