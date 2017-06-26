<?php

/**
 * created by Lucas Di Cunzolo in 26/06/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

final class Postulants extends Models
{
  private $idUser;
  private $idGauchada;
  private $description;
  private $selected;

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

  final function errors()
  {
    try {
      if (empty($_POST['description']) && empty($_POST['selected'])) {
        throw new PDOException("Error Processing Request");
      } else {
        $this->idUser = intval($this->router->elements()[0]) ?? null;
        $this->idGauchada = intval($this->router->elements()[1]) ?? null;
        $this->description = isset($_POST['description']) ? $this->db->escape($_POST['description']) : null;
      }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
  }

  final function add()
  {
    $this->errors('postulant?error=');
    $this->db->insert('Postulants', array(
      'idUser' => $this->idUser,
      'idGauchada' => $this->idGauchada,
      'description' => $this->description,
      'selected' => 0
    ));
    Func::redirect(URL);
  }

  final public function edit()
  {
    $this->errors('postulants?errors=');
    $this->db->update('Postulants', array(
      'selected' => 1
    ), "idUser=$this->idUser AND idGauchada=$this->idGauchada");
    Func::redirect(URL );
  }

  final public function delete()
  {
    $this->errors('postulants?errors=');
    $this->db->delete('Postulants', "idUser=$this->idUser AND idGauchada=$this->idGauchada");
    Func::redirect(URL);
  }

  final public function __destruct()
  {
    parent::__destruct();
  }
}
?>
