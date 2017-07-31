<?php

/**
 * created by Ulises J. Cornejo Fandos in 31/07/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Purchases extends Models
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
      if (empty($_POST["cantidad"]) && !is_numeric($_POST["cantidad"])) {
        throw new PDOException("La operación no fué realizada con éxito.", 1);
      }
      $this->mount = $_POST["cantidad"];
      $this->user = (Sessions::getInstance())->connectedUser();
      $this->date = date('Y/m/d', time());
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  final public function add() {
    $this->errors();
    $this->db->insert("Purchases", [
      "mount" => $this->mount,
      "idUser" => $this->user['idUser'],
      "date" => $this->date
    ]);
  }

  final public function filter($options) {
    return ([
      "elements" => "*",
      "table" => "Purchases",
      "criteria" => "ORDER BY idPurchase DESC"
    ]);
  }

  final public function __destruct() {
    parent::__destruct();
  }

}
