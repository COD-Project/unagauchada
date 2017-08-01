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
            if (empty($_POST["bound"]) && !is_numeric($_POST["bound"])) {
                throw new PDOException("La operación no fué realizada con éxito.", 1);
            }
            $this->bound = $_POST["bound"] ?? null;
            $this->name = $_POST['name'] ?? null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    final public function add()
    {
    }

    final public function edit()
    {

    }

    final public function delete()
    {
        $this->errors("administration?");
        $max_bound = $this->get()[0];
        $this->db->delete("Reputations", "idReputation=$this->id");
        if($max_bound["idReputation"] == $this->id) {
            $this->db->insert("Reputations", [
                "name" => "Gaucho",
                "bound" => PHP_INT_MAX
            ]);
            Func::redirect(URL . "administration/settings/$this->id?success=La reputacion eliminada era la maxima. Se recomienda editar el nombre de la misma.");
        }
        Func::redirect(URL . "administration/settings?success=Se elimino la reputacion correctamente");
    }

    final public function filter($options)
    {
        return ([
          "elements" => "*",
          "table" => "Reputations",
          "criteria" => "bound DESC"
        ]);
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
