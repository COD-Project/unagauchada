<?php

/**
 * created by Lucas Di Cunzolo in 26/06/2017
 */

# Security
defined("INDEX_DIR") or exit(APP . " software says .i.");
//------------------------------------------------

final class Postulants extends Models
{
    private $idUser;
    private $idGauchada;
    private $description;

    private static $instance;

    public static function getInstance()
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

    final public function errors($url="")
    {
        try {
            if (empty($_POST["description"]) && empty($_POST["selected"]) && empty($this->router->elements()[0]) && empty($this->router->getId())) {
                throw new PDOException("Error Processing Request");
            } else {
                $this->idUser = is_numeric($this->router->elements()[0]) ?
                                  intval($this->router->elements()[0]) :
                                  (Sessions::getInstance())->connectedUser()["idUser"];
                $this->idGauchada = $this->router->getId();
                $this->description = $_POST["description"] ?? null;
            }
        } catch (PDOException $error) {
            Func::redirect(URL . $url . $error->getMessage());
        }
    }

    final public function add()
    {
        $this->errors("?error=");
        $this->db->insert("Postulants", [
          "idUser" => $this->idUser,
          "idGauchada" => $this->idGauchada,
          "description" => $this->description,
          "selected" => 0
        ]);
        Func::redirect(URL . "?success=Se ha postulado correctamente");
    }

    final public function edit()
    {
        $this->errors("?error=");
        $this->db->update("Postulants", [
          "selected" => 1
        ], "idUser=$this->idUser AND idGauchada=$this->idGauchada");
        Func::redirect();
    }

    final public function delete()
    {
        $this->errors("?error=");
        $this->db->update("Postulants", [
          "validate" => 1
        ], "idUser=$this->idUser AND idGauchada=$this->idGauchada");
        Func::redirect(URL . "?success=Se despostulo correctamente");
    }


    final protected function filter($options)
    {
        $where = "1=1";
        foreach (OPTIONS['postulants'] as $key => $value) {
            if (($options && array_key_exists($key, $options)) or in_array($key, ['selected', 'validate'])) {
                $where .= " AND " . $value['content'] . ($options[$key] ?? $value['default']);
            }
        }
        $table = "(Postulants p INNER JOIN Gauchadas g ON(p.idGauchada = g.idGauchada))";
        if (isset($options['ranked'])) {
            $table .= " LEFT JOIN Ratings r ON(p.idGauchada=r.idGauchada)";
            $where .= " AND r.idGauchada " . ($options['ranked'] ? " IS NOT NULL" : "IS NULL");
        }
        return ([
          "elements" => "p.*, p.idUser as idPostulant" . (isset($options['ranked']) ? ", r.idRating" : ""),
          "table" => $table,
          "where" => $where
        ]);
    }

    final protected function prepare($data)
    {
        $users = (new Users)->get();
        for ($i = 0; $i < count($data); $i++) {
            $user = $users[$data[$i]["idPostulant"]];
            $postulants[$i] = [
              "idUser" => $data[$i]["idPostulant"],
              "idGauchada" => $data[$i]["idGauchada"],
              "completeName" => $user["completeName"],
              "description" => $data[$i]["description"],
              "email" => $user["email"],
              "idRating" => $data[$i]["idRating"] ?? null,
              "profilePicture" => $user["profilePicture"],
              "gauchada" => (new Gauchadas)->get()[$data[$i]["idGauchada"]] ?? null
            ];
        }
        return !$data ? null : $postulants;
    }


    final public function __destruct()
    {
        parent::__destruct();
    }
}
