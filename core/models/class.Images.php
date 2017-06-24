<?php

/**
 * created by Ulises J. Cornejo Fandos on 24/06/2017
 */

class Images extends Models
{
  private $images;
  private $nexus;
  private $controller;

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

  final private function errors($url="")
  {
    try {
      if (Func::images($_FILES['images'])) {
        throw new PDOException("Solo pueden subirse imágenes", 1);
      }
      $this->images = $_FILES['images'];
      $this->controller = explode('Controller', $this->router->getController())[0];
      $this->id = $this->db->lastInsertId(EQUALS[$this->controller]['table']) ?? null;
      $this->nexus = EQUALS[$this->controller]['nexus'] ?? null;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  final public function Add() {
    $this->errors();
    for ($i=0; $i < count($this->images['name']); $i++) {
      $folder = $this->controller . '/' . $this->id;
      $name = 'image.' . $this->db->lastInsertId('Images') + 1 . $data['type'];
      Func::saveFile(array(
        'name' => $name,
        'tmp' => $this->images['tmp_name'][$i],
        'type' => $this->images['type'][$i],
        'folder' => $folder
      ));
      if ($this->nexus != null) {
        $this->db->insert($this->nexus['name'], array(
          $this->nexus['firstId'] => $this->id,
          'idImage' => $this->db->lastInsertId('Images')
        ));
      }
    }
  }

  final public function __destruct()
  {
    parent::__destruct();
  }

}


 ?>
