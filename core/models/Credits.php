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
  private $user;
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

  final private function errors($url="") {
    try {
      if (empty($_GET["monto"]) && !is_numeric($_GET["monto"])) {
        throw new PDOException("La operación no fué realizada con éxito.", 1);
      }
      $this->monto = $_GET["monto"];
      $this->user = (Sessions::getInstance())->connectedUser();
      $this->date = date('Y/m/d', time());
    } catch (PDOException $e) {
      Func::redirect(URL . $url . $e->getMessage());
    }
  }

  final public function add() {
    $this->errors();
    $this->db->insert("Credits", [
      "monto" => $this->monto,
      "idUser" => $this->user['idUser'],
      "date" => $this->date
    ]);
  }

  final public function get($options = null) {
    $data = $this->db->select('*', 'Creditos', '1=1', 'ORDER BY idCredito DESC');
    return $data;
  }

  final public function __destruct() {
    parent::__destruct();
  }

}
