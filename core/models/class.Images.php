<?php

/**
 * created by Ulises J. Cornejo Fandos on 24/06/2017
 */

class Images extends Models
{
  private $images;
  private $folder;
  private $controller;
  private $nexus;
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

  final private function errors($url="")
  {
    try {
      if (!Func::images($_FILES['images'])) {
        throw new PDOException("Solo pueden subirse imágenes", 1);
      }
      $this->images = $_FILES['images'];
      $this->controller = explode('Controller', $this->router->getController())[0];
      $this->nexus = EQUALS[$this->controller]['nexus'] ?? null;
      $table = EQUALS[$this->controller]['table'];
      $this->idGauchada = ($this->db->select('idGauchada', 'Gauchadas', '1=1', 'ORDER BY idGauchada DESC LIMIT 1'))[0]['idGauchada'] ?? null;
      $this->folder = $this->controller . '/' . $this->idGauchada;
    } catch (PDOException $e) {
      Func::redirect(URL . $url . $e->getMessage());
    }
  }

  final public function Add() {
    $this->errors('?error=');
    for ($i=0; $i < count($this->images['name']); $i++) {
      $id = ($this->db->select('idImage', 'Images', '1=1', 'ORDER BY idImage DESC LIMIT 1'))[0]['idImage'] + 1;
      $type = explode('/', $this->images['type'][$i]);
      $name = 'image.' . $id . '.' . $type[1];
      Func::saveFile(array(
        'name' => $name,
        'tmp' => $this->images['tmp_name'][$i],
        'folder' => $this->folder
      ));
      if ($this->nexus != null) {
        $this->db->insert($this->nexus['name'], array(
          $this->nexus['firstId'] => $this->idGauchada,
          'idImage' => $id
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
