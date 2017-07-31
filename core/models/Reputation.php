<?php

/**
 * created by Ulises J. Cornejo Fandos in 31/07/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Reputations extends Models
{
  private $mount;
  private $user;
  private $date;
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

  final private function errors($url="") {
    try {
      if (empty($_POST["bound"]) && !is_numeric($_POST["bound"])) {
        throw new PDOException("La operación no fué realizada con éxito.", 1);
      }
      $this->bound = $_POST["bound"];
      $this->name = $this->purifier($this->db->escape($_POST['name']));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  final public function add() {

  }

  final public function filter($options) {
    return ([
      "elements" => "*",
      "table" => "Reputations",
      "criteria" => "bound DESC"
    ]);
  }

  final public function __destruct() {
    parent::__destruct();
  }

}
