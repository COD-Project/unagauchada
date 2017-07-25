<?php

/**
 * created by Ulises J. Cornejo Fandos on 17/03/2017
 */

final class Sessions extends Models
{
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

  /**
   * Genera una sesión por un tiempo determinado para un usuario.
   *
   * @param int $id: Id de usuario para generar la sesión
   *
   * @return void
   */
  final public function generateSession(int $id)
  {
    $_SESSION[SESS_APP_ID] = $id;
    $e['session'] = time() + SESSION_TIME;
    $this->db->update('Users',$e,"idUser='$id'",'LIMIT 1');
  }

  /**
   * Chequea el uso de la sesión en un usuario.
   *
   * @param int $id: Id de usuario para generar la sesión
   *
   * @return bool: TRUE si el usuario tiene la sesión iniciada, FALSE si no
   */
  final public function isLoggedIn(int $id = NULL) : bool
  {
    $idUser = ($id=='' && isset($_SESSION[SESS_APP_ID])) ? $_SESSION[SESS_APP_ID] : $id;
    $time = time();
    if($this->db->rows($this->db->query("SELECT * FROM Users WHERE idUser='$idUser' AND session >= '$time' LIMIT 1;")) > 0) {
      return true;
    }
    return false;
  }

  /**
   * Chequea la vida de una sesión, si ésta caduca se culmina la sesión existente.
   *
   * @param bool $force: Fuerza la culminación de una sesión que pueda existir.
   *
   * @return void
   */
  final public function checkLife(bool $force = false)
  {
    if(isset($_SESSION[SESS_APP_ID])) {
      $id = $_SESSION[SESS_APP_ID];
      $time = time();
      if($force || $this->db->rows($this->db->query("SELECT idUser FROM Users WHERE idUser='$id' AND session <= '$time' LIMIT 1;")) > 0) {
        $e['session'] = 0;
        $this->db->update('Users',$e,"idUser='$id'",'LIMIT 1');
        unset($_SESSION[SESS_APP_ID]);
        session_write_close();
        session_unset();
      }
    }
  }

  final public function connectedUser() : array
  {
    $id = $_SESSION[SESS_APP_ID];
    return ($this->isLoggedIn()) ? (new Users)->get()[$id] : null;
  }

  final public function isGranted() : bool
  {
    return ($this->isLoggedIn()) ? ($this->connectedUser()['role'] == 'admin') : false; // 1 correspond to admin users - 2 correspond to normal users
  }

  final public function hasCredits() : bool
  {
    return ($this->isLoggedIn()) ? ($this->connectedUser()['credits'] >=1) : false;
  }

  final public function __destruct()
  {
    parent::__destruct();
  }

}

?>
