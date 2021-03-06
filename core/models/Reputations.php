<?php

/**
 * created by Ulises J. Cornejo Fandos in 31/07/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Reputations extends Models
{
    private static $instance;
    private $bound;
    private $name;

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

    final private function errors($url="")
    {
        try {
            if (!$this->router->getId() && empty($_POST["name"]) && empty($_POST["bound"]) && !is_numeric($_POST["bound"])) {
                throw new PDOException("La operación no fué realizada con éxito.", 1);
            }
            $this->id = $this->router->getId();
            $this->max_bound = $this->get()[0];
            $this->bound = $_POST["bound"] ?? PHP_INT_MAX;
            $this->name = $_POST['name'] ?? "Gaucho";
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors("administration/settings?error=");
        if (!$this->db->select("*", "Reputations", "name='$this->name' OR bound='$this->bound'", "LIMIT 1")) {
          $this->db->insert(
            "Reputations",
            [
              "name" => $this->name,
              "bound" => $this->bound
            ]
          );
          Func::redirect(URL . "administration/settings?success=La reputación fué editada con éxito.");
        } elseif ($this->db->select("*", "Reputations", "name='$this->name'", "LIMIT 1")) {
          Func::redirect(URL . "administration/settings?error=Ya existe una reputación con el nombre $this->name.");
        } else {
          Func::redirect(URL . "administration/settings?error=Ya existe una reputación con el límite superior de $this->bound puntos.");
        }
    }

    final public function edit()
    {
        $this->errors("administration/settings?error=");
        if (!$this->db->select("*", "Reputations", "name='$this->name' AND idReputation <> $this->id", "LIMIT 1")) {
          $this->db->update(
            "Reputations",
            [
              "name" => $this->name,
              "bound" => $this->bound
            ],
            "idReputation=$this->id",
            "LIMIT 1"
          );
          if($this->max_bound["idReputation"] == $this->id and $this->bound != PHP_INT_MAX) {
              $this->db->insert("Reputations", [
                  "name" => "Gaucho",
                  "bound" => PHP_INT_MAX
              ]);
              $id = $this->db->lastInsertId("Reputations");
              Func::redirect(URL . "administration/settings/$id?success=La reputacion eliminada era la maxima. Se recomienda editar el nombre de la misma.");
              return;
          }
          Func::redirect(URL . "administration/settings?success=La reputación fué editada con éxito.");
        } else {
          Func::redirect(URL . "administration/settings?error=Ya existe una reputación con el nombre $this->name.");
        }
    }

    final public function delete()
    {
        $this->errors("administration/settings?error=");
        $this->db->delete("Reputations", "idReputation=$this->id");
        if($this->max_bound["idReputation"] == $this->id) {
            $this->db->insert("Reputations", [
                "name" => $this->name,
                "bound" => $this->bound
            ]);
            $id = $this->db->lastInsertId("Reputations");
            Func::redirect(URL . "administration/settings/$id?success=La reputacion eliminada era la maxima. Se recomienda editar el nombre de la misma.");
            return;
        }
        Func::redirect(URL . "administration/settings?success=Se eliminó la reputacion correctamente");
    }

    final public function filter($options)
    {
        if(isset($options['points'])) {
          if(!$this->db->select('*', 'Reputations', 'bound < ' . $options['points'], 'LIMIT 1')) {
              $criteria = "ORDER BY bound ASC LIMIT 1";
          } else {
              $where = $options['points'] . ' between (SELECT bound FROM Reputations r2 WHERE r2.bound<r.bound ORDER BY r2.bound DESC LIMIT 1) AND r.bound';
          }
        }
        return ([
          "elements" => "*",
          "table" => "Reputations r",
          "where" => $where ?? "1=1",
          "criteria" => $criteria ?? "ORDER BY bound DESC"
        ]);
    }

    final public function prepare($data)
    {
        for ($i=0; $i < count($data); $i++) {
          $reputations[$i] = [
              'idReputation' => $data[$i]['idReputation'],
              'name' => $data[$i]['name'],
              'bound' => $data[$i]['bound'],
              'next' => $i < count($data) ? PHP_INT_MAX : $data[$i + 1]['bound'] - 1,
              'max_bound' => $data[$i]['bound'],
              'min_bound' => $data[$i + 1]['bound'] ?? PHP_INT_MIN
          ];
        }
        return !$data ? null : $reputations;
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
