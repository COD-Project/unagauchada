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

	final private function errors($url)
	{
	    try {
	      	if (empty($this->router->getId()) && empty($_POST['name']) && empty($_POST['idCategory'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->name = isset($_POST['name']) ? $this->purifier($this->db->escape($_POST['name'])) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function add() {
	    $this->errors('categories?error=');
	    $this->db->insert('Categories', array(
	      'name' => $this->name
	    ));
	    Func::redirect(URL . 'categories/main?success=Se creo la categoria exitosamente.');
  	}

	final public function edit() {
		$this->errors('categories?error=');
		$this->db->update('Categories', array('validate' => 1), 'idCategory='.$this->id);
		$this->db->insert('Categories', array(
	      'name' => $this->name
	    ));
	    Func::redirect(URL . 'categories/main?success=Se edito la categoria exitosamente.');
	}

  	final public function delete() {
	    $this->errors('categories?error=');
	    $this->db->update('Categories', array('validate' => 1), 'idCategory='.$this->id);
	    Func::redirect(URL . 'categories/main?success=Se elimino la categoria exitosamente.');
  	}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
