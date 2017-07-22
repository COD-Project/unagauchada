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
	    if(!$this->get(array('name' => $this->name))){
	    	$this->db->insert('Categories', array(
		      'name' => ucfirst(strtolower($this->name)),
		      'validate' => 0
		    ));
		    Func::redirect(URL . 'categories/main?success=Se creo la categoria exitosamente.');
	    } else if ($this->get(array('name' => $this->name))[0]['validate'] == 1){
	    	$this->db->update('Categories', array('validate' => 0), 'idCategory='.$this->get(array('name' => $this->name))[0]['idCategory']);
	    	Func::redirect(URL . 'categories/main?success=Se creo la categoria exitosamente.');
	    } else {
	    	Func::redirect(URL . 'categories/main?error=Esa Categoria ya existe.');
	    }    
  	}

	final public function edit() {
		$this->errors('categories?error=');
		if(!$this->get(array('name' => $this->name))){
			$this->db->update('Categories', array('validate' => 1), 'idCategory='.$this->id);
			$this->db->insert('Categories', array(
		      'name' => ucfirst(strtolower($this->name))
		    ));
		    Func::redirect(URL . 'categories/main?success=Se edito la categoria exitosamente.');
		} else {
			Func::redirect(URL . 'categories/main?error=No se puede escribir el nombre de una categoria que ya existe.');
		}
	}

  	final public function delete() {
	    $this->errors('categories?error=');
	    $this->db->update('Categories', array('validate' => 1), 'idCategory='.$this->id);
	    Func::redirect(URL . 'categories/main?success=Se elimino la categoria exitosamente.');
  	}

  	final public function get($options=null) {
  		$where = !isset($options['name']) ? '1=1 AND validate=0' : 'name LIKE "'.$options['name'].'"';
  		$data = $this->db->select('*', 'Categories', $where);
  		if(!$data) return false;

		for($i = 0; $i < count($data); $i++) {
		  $categories[$i] = array(
		    'idCategory' => $data[$i]['idCategory'],
		    'name' => $data[$i]['name'],
		    'validate' => $data[$i]['validate']
		  );
		}
		return $categories;
  	}

  	final public function __destruct()
  	{
  		parent::__destruct();
  	}
}
