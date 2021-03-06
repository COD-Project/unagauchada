<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Ratings extends Models
{
    private $rating;
    private $body;
    private $idGauchada;

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

    final private function errors($url)
    {
        try {
            if (empty($this->router->getId()) && empty($_POST['body']) && empty($_POST['rating'])) {
                throw new PDOException("Error Processing Request", 1);
            } else {
                $this->rating = $_POST['rating'] ?? null;
                $this->body = $_POST['body'] ?? null;
                $this->idGauchada = $this->router->getId();
            }
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors('comments?error=');
        $instanceert = [
          'rating' => $this->rating,
          'body' => $this->body,
          'idGauchada' => $this->idGauchada
        ];
        $this->db->insert('Ratings', $instanceert);
        if ($this->rating != 2) {
            $gaucho = (new Postulants)->get([
              "gauchada" => $this->idGauchada,
              "selected" => "1"
            ]);
            $user = (new Users)->get()[$gaucho[0]['idUser']];
            $where = 'idUser='.$user['idUser'];
            if ($this->rating == 3) {
                $points = 1;
                $credits = 1;
            } elseif ($this->rating == 1) {
                $points = -2;
                $credits = 0;
            }
            $this->db->update('Users', [
              'points' => $user['points'] + $points,
              'credits' => $user['credits'] + $credits
            ], $where);
        }
        Func::redirect(URL . 'gauchadas/view/' . $this->idGauchada);
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
