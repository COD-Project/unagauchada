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
