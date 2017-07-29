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

  static private $instance;

  static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
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
      $this->db->insert('Categories', [
        'name' => ucfirst(strtolower($this->name)),
        'validate' => 0
      ]);
      $params = "success=Se creo la categoria exitosamente";
    } else if ($this->get(['name' => $this->name])[0]['validate'] == 1){
      $this->db->update('Categories', ['validate' => 0], 'idCategory='.$this->get(['name' => $this->name])[0]['idCategory']);
      $params="success=Se creo la categoria exitosamente.";
    } else {
      $params="error=Esa Categoria ya existe.";
    }
    Func::redirect(URL . "categories/main?$params");
  }

  final public function edit() {
    $this->errors('categories?error=');
    if(!$this->get(['name' => $this->name])){
      $this->db->update('Categories', ['validate' => 1], 'idCategory='.$this->id);
      $this->db->insert('Categories', [
        'name' => ucfirst(strtolower($this->name))
      ]);
      $params = "success=Se edito la categoria exitosamente.";
    } else {
      $params = "error=No se puede escribir el nombre de una categoria que ya existe.";
    }
    Func::redirect(URL . "categories/main?" . $params);
  }

  final public function delete() {
    $this->errors('categories?error=');
    $this->db->update('Categories', ['validate' => 1], 'idCategory='.$this->id);
    Func::redirect(URL . 'categories/main?success=Se elimino la categoria exitosamente.');
  }

  final protected function filter($options) {
    $where = !isset($options['name']) ? 'validate=0' : 'name="' . $options['name'] . '"';
    return ([
      "elements" => "*",
      "table" => "Categories",
      "where" => $where
    ]);
  }

  final protected function prepare($data) {
    for($i = 0; $i < count($data); $i++) {
      $categories[$i] = [
        'idCategory' => $data[$i]['idCategory'],
        'name' => $data[$i]['name'],
        'validate' => $data[$i]['validate']
      ];
    }
    return !$data ? $data : $categories;
  }

  final public function __destruct()
  {
    parent::__destruct();
  }
}
