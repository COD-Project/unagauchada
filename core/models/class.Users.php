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
  private $state;
  private $locality;
  private $points;
  private $credits;
  private $image;

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
      if (empty($_POST['email']) && empty($_POST['pass']) && empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['birthdate']) && empty($_POST['phone']) && empty($_FILES['images'])) {
        throw new PDOException("Error Processing Request");
      } else {
        $this->id = (Sessions::getInstance())->isLoggedIn() ? intval((Sessions::getInstance())->connectedUser()['idUser']) : null;
        $this->name = isset($_POST['name']) ? $this->purifier($this->db->escape($_POST['name'])) : null;
        $this->surname = isset($_POST['surname']) ? $this->purifier($this->db->escape($_POST['surname'])) : null;
        $this->email = isset($_POST['email']) ? $this->purifier($this->db->escape($_POST['email'])) : null;
        $this->password = isset($_POST['pass']) ? Func::encrypt($_POST['pass']) : null;
        $this->state = isset($_POST['state']) ? $this->purifier($this->db->escape($_POST['state'])) : null;
        $this->locality = isset($_POST['locality']) ? $this->purifier($this->db->escape($_POST['locality'])) : null;
        $this->birthdate = $_POST['birthdate'] ?? null;
        $this->phone = $_POST['phone'] ?? null;
        $this->points = $_POST['points'] ?? null;
        $this->credits = $_POST['credits'] ?? null;
        $this->image = $_FILES['images'] ?? null;
      }
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  final public function add()
  {
    $this->errors();
    $sql = $this->db->query("SELECT idUser FROM Users WHERE email='$this->email' LIMIT 1;");
    if($this->db->rows($sql) > 0) {
      echo 'El mail ingresado corresponde a un usuario existente.';
    } else {
      $this->keyreg = md5(time());
      $regDate = date('Y/m/d', time());
      $values = array(
        'name' => $this->name,
        'surname' => $this->surname,
        'email' => $this->email,
        'password' => $this->password,
        'keyreg' => $this->keyreg,
        'registrationDate' => $regDate,
        'phone' => $this->phone,
        'birthdate' => $this->birthdate,
        'credits' => 1,
        'points' => 1,
        'idImage' => 1
      );
      $this->db->insert("Users", $values);
      $id = $this->db->lastInsertId('Users');
      (Sessions::getInstance())->generateSession($id);
      echo 1;
    }
  }

  final public function edit()
  {
    $this->errors();
    $update = array();
    foreach (OPTIONS['profiles']['myprofile']['edit_options'] as $key => $value) {
      if (array_key_exists($key, $_POST)) {
        eval("\$update[\$value] = \$this->" . $value . ';');
      }
    }
    if (isset($this->state) && isset($this->locality)) {
      $update['location'] = $this->state . ', ' . $this->locality;
    }
    if ($this->image && Func::images($_FILES['images'])) {
      $idImage = $this->db->select('idImage', 'Images', '1=1', 'ORDER BY idImage DESC LIMIT 1')[0]['idImage'];
      $type = explode('/', $this->image['type'][0]);
      $name = 'image.' . $idImage . '.' . $type[1];
      Func::saveFile(array(
        'name' => $name,
        'tmp' => $this->image['tmp_name'][0],
        'folder' => 'users/' . $this->id
      ));
      $update['idImage'] = ($this->db->select('idImage', 'Images', '1=1', 'ORDER BY idImage DESC LIMIT 1'))[0]['idImage'];
    }
    if ($update != null) $this->db->update("Users", $update, "idUser=" . $this->id, "LIMIT 1;");
    if ($this->image) Func::redirect(URL . 'profiles/myprofile'); else echo 1;
  }

  final public function delete() {

  }

  final protected function filter($options)
  {
    return array(

    );
  }

  final protected function prepare($data = null) {
    for($i = 0; $i < count($data); $i++) {
      $users[$data[$i]['idUser']] = array(
        'idUser' => $data[$i]['idUser'],
        'name' => $data[$i]['name'],
        'surname' => $data[$i]['surname'],
        'completeName' => $data[$i]['name'] . ' ' . $data[$i]['surname'],
        'birthdate' => $data[$i]['birthdate'],
        'location' => $data[$i]['location'],
        'phone' => $data[$i]['phone'],
        'email' => $data[$i]['email'],
        'state' => ($data[$i]['state'] == 1),
        'credits' => $data[$i]['credits'],
        'points' => $data[$i]['points'],
        'registrationDate' => $data[$i]['registrationDate'],
        'role' => ($data[$i]['role'] == 1) ? 'admin' : 'user',
        'profilePicture' => ((new Images)->get(array(
          'image' => $data[$i]['idImage']
        )))[0]['path']
        //put user's info here if there is more in the db
      );
    }
    return !$data ? $data : $users;
  }

  final public function get($options = null) {
    $data = $this->db->select("*", "Users", "1=1", "ORDER BY role, registrationDate");
    return $this->prepare($data);
  }

  final public function __destruct()
  {
    parent::__destruct();
  }

}
