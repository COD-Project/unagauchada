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
    }

    final public function edit()
    {
        $this->errors("administration/settings?error=");
        $this->update(
          "Reputations",
          [
            "name" => $this->name,
            "bound" => $this->bound
          ],
          "idReputation=$this->id"
        );

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
        Func::redirect(URL . "administration/settings?success=Se elimino la reputacion correctamente");
    }

    final public function filter($options)
    {
        return ([
          "elements" => "*",
          "table" => "Reputations",
          "criteria" => "ORDER BY bound DESC"
        ]);
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
