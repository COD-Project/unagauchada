<?php

/**
 * created by Lucas Di Cunzolo in 22/07/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Credits extends Models
{
  private $monto;
  private $idUser;
  private $date;

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

  final private function errors($url) {
  }

  final public function add() {
  }

  final public function get() {
    $data = $this->db->select('*', 'Creditos', '1=1', 'ORDER BY idCredito DESC');
    return $data;
  }

  final public function __destruct() {
    parent::__destruct();
  }

}
