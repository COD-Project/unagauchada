<?php

/**
 * created by Lucas Di Cunzolo in 26/06/2017
 */

# Security
defined("INDEX_DIR") OR exit(APP . " software says .i.");
//------------------------------------------------

final class Postulants extends Models
{
  private $idUser;
  private $idGauchada;
  private $description;

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

  final function errors($url="")
  {
    try {
      if (empty($_POST["description"]) && empty($_POST["selected"]) && empty($this->router->elements()[0]) && empty($this->router->getId())) {
        throw new PDOException("Error Processing Request");
      } else {
        $this->idUser = is_numeric($this->router->elements()[0]) ?
          intval($this->router->elements()[0]) :
          (Sessions::getInstance())->connectedUser()["idUser"];
        $this->idGauchada = $this->router->getId() ?? null;
        $this->description = isset($_POST["description"]) ? $this->purifier($this->db->escape($_POST["description"])) : null;
      }
    } catch (PDOException $error) {
      Func::redirect(URL . $url . $error->getMessage());
    }
  }

  final function add()
  {
    $this->errors("?error=");
    $this->db->insert("Postulants", array(
      "idUser" => $this->idUser,
      "idGauchada" => $this->idGauchada,
      "description" => $this->description,
      "selected" => 0
    ));
    Func::redirect(URL . "?success=Se ha postulado correctamente");
  }

  final public function edit()
  {
    $this->errors("?error=");
    $this->db->update("Postulants", array(
      "selected" => 1
    ), "idUser=$this->idUser AND idGauchada=$this->idGauchada");
    Func::redirect();
  }

  final public function delete()
  {
    $this->errors("?error=");
    $this->db->update("Postulants", array(
      "validate" => 1
    ), "idUser=$this->idUser AND idGauchada=$this->idGauchada");
    Func::redirect(URL . "?success=Se despostulo correctamente");
  }


  final private function filter($options)
  {
    $where = "1 = 1";
    foreach (OPTIONS['postulants'] as $key => $value) {
      if(array_key_exists($key, $options)) {
        $where .= " AND " . $value['content'] . ($options[$key] ?? $value['default']);
      }
    }
    return array(
      "elements" => "*",
      "table" => "(Postulants p INNER JOIN Gauchadas g ON(p.idGauchada = g.idGauchada)) LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)",
      "where" => $where
    );
  }

  final private function prepare($data)
  {
    for($i = 0; $i < count($data); $i++) {
      $postulants[$i] = array(
        "idUser" => $data[$i]["idUser"],
        "idGauchada" => $data[$i]["idGauchada"],
        "completeName" => $data[$i]["name"] . " " . $data[$i]["surname"],
        "description" => $data[$i]["description"],
        "email" => $data[$i]["email"],
        "profilePicture" => (new Images)->get(['image' => $data[$i]["idImage"]])[0]["path"]
      );
    }
    return $postulants ?? false;
  }

  final public function get($options=null)
  {
    $query = $this->filter($options);
    return $this->prepare($this->executeQuery($query));
  }

  final public function __destruct()
  {
    parent::__destruct();
  }

}
?>
