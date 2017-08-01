<?php

/**
 * created by Ulises J. Cornejo Fandos in 31/07/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Purchases extends Models
{
    private $mount;
    private $user;
    private $date;
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

    final private function errors($url="")
    {
        try {
            if (empty($_POST["cantidad"]) && !is_numeric($_POST["cantidad"])) {
                throw new PDOException("La operación no fué realizada con éxito.", 1);
            }
            $this->mount = $_POST["cantidad"];
            $this->user = (Sessions::getInstance())->connectedUser();
            $this->date = date('Y/m/d', time());
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    final public function add()
    {
        $this->errors();
        $this->db->insert("Purchases", [
          "mount" => $this->mount,
          "idUser" => $this->user['idUser'],
          "date" => $this->date
        ]);
    }

    final public function filter($options)
    {
        $where = isset($_GET['min_date']) && isset($_GET['max_date']) ?
                "date BETWEEN " . $_GET['min_date'] . " AND " . $_GET['min_date'] : "1=1";
        return ([
          "elements" => "*",
          "table" => "Purchases",
          "where" => $where,
          "criteria" => "ORDER BY idPurchase DESC"
        ]);
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
