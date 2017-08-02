<?php

/**
 * created by Lucas Di Cunzolo in 22/07/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Credits extends Models
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
            if (empty($_POST["mount"]) && !is_numeric($_POST["mount"])) {
                throw new PDOException("La operación no fué realizada con éxito.", 1);
            }
            $this->mount = $_POST["mount"];
            $this->user = (Sessions::getInstance())->connectedUser();
            $this->date = $this->currentTime();
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors();
        $this->db->insert("Creditos", [
          "monto" => $this->mount,
          "idUser" => $this->user['idUser'],
          "date" => $this->date
        ]);
        Func::redirect(URL . "administration/settings?success=La operación fué realizada con éxito.");
    }

    final public function filter($options)
    {
        return ([
          "elements" => "*",
          "table" => "Creditos",
          "criteria" => "ORDER BY idCredito DESC"
        ]);
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
