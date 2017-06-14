<?php

/**
 * created by Lucas Di Cunzolo in 26/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Images extends Models
{
	private $path;

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
	      	if (empty($this->router->getId()) && empty($_POST['path'])) {
	        	throw new PDOException("Error Processing Request", 1);
	      	} else {
		        $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
		        $this->path = isset($_POST['path']) ? $this->purifier($this->db->escape($_POST['path'])) : null;
	      	}
	    } catch (PDOException $e) {
	      Func::redirect(URL . $url . $e->getMessage());
	    }
  	}

  	final public function Add()
  	{
	    $this->errors('imagenes?error=');
	    $this->db->insert('Images', array(
	      'path' => $this->path,
	    ));
	    Func::redirect(URL . "imagenes?success=true");
  	}

		final public function Edit()
		{
			
		}

  	final public function Delete() {
	    $this->errors('imagenes?errors=');
	    $this->db->delete('Imagenes', "idImages=$this->id");
  	}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
