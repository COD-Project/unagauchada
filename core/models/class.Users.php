<?php

/**
  * created by Ulises J. Cornejo Fandos on 27/05/2017
  */

final class Users extends Models
{
  private $email;
  private $password;
  private $name;
  private $surname;
  private $keyreg;
  private $regDate;
  private $phone;
  private $birthdate;
  private $points;
  private $credits;
  private $idImage;

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
      if (empty($_POST['email']) && empty($_POST['pass']) && empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['birthdate']) && empty($_POST['phone'])) {
        throw new PDOException("Error Processing Request");
      } else {
        $this->name = isset($_POST['name']) ? $this->db->escape($_POST['name']) : null;
        $this->surname = isset($_POST['surname']) ? $this->db->escape($_POST['surname']) : null;
        $this->email = isset($_POST['email']) ? $this->db->escape($_POST['email']) : null;
        $this->password = isset($_POST['pass']) ? Func::encrypt($_POST['pass']) : null;
        $this->birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
        $this->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $this->points = isset($_POST['points']) ? $_POST['points'] : null;
        $this->credits = isset($_POST['credits']) ? $_POST['credits'] : null;
        $this->idImage = isset($_POST['idImage']) ? $_POST['idImage'] : null;
      }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
  }

  final public function Add()
  {
    $this->errors();
    $sql = $this->db->query("SELECT idUser FROM Users WHERE email='$this->email' LIMIT 1;");
    if($this->db->rows($sql) > 0) {
      echo 'El mail ingresado corresponde a un usuario existente.';
    } else {
      $this->keyreg = md5(time());
      $reg_date = date('Y/m/d', time());
      $values = array(
        'name' => $this->name,
        'surname' => $this->surname,
        'email' => $this->email,
        'password' => $this->password,
        'keyreg' => $this->keyreg,
        'registrationDate' => $this->regDate,
        'phone' => $this->phone,
        'birthdate' => $this->birthdate,
        'credits' => 1,
        'points' => 1,
        'idImage' => 1
      );
      $this->db->insert("Users", $values);
      $sql = $this->db->query("SELECT MAX(idUser) AS idUser FROM Users;");
      $data = $this->db->fetch_array($sql);
      (new Sessions)->generateSession($data[0]['idUser']);
      echo 1;
    }
  }

  final public function __destruct()
  {
    parent::__destruct();
  }

}
