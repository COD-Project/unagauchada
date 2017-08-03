<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Comments extends Models
{
    private $body;
    private $idGauchada;
    private $idQuestion;

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
            if (empty($this->router->getId()) && empty($_POST['body']) && empty($_GET['idQuestion'])) {
                throw new PDOException("Error Processing Request", 1);
            } else {
                $this->id = $this->router->getId();
                $this->body = $_POST['body'] ?? null;
                $this->idGauchada = $this->router->getId();
                $this->idQuestion = $_GET['idQuestion'] ?? null;
            }
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors('comments?error=');
        $data = [
          'body' => $this->body,
          'createdAt' => $this->currentTime(),
          'lastModify' => $this->currentTime(),
          'idGauchada' => $this->idGauchada,
          'idUser' => (Sessions::getInstance())->connectedUser()['idUser'],
        ];
        if ($this->idQuestion != null) {
            $data['idQuestion'] = $this->idQuestion;
        }
        $this->db->insert('Comments', $data);
        Func::redirect(URL . 'gauchadas/view/' . $this->idGauchada);
    }

    final protected function filter($options)
    {
        $where = "idGauchada=". $options['gauchada'] ." AND idQuestion" . (isset($options['question']) ? "=".$options['question'] : " IS NULL");
        return ([
          "elements" => "*",
          "table" => "Comments",
          "where" => $where
        ]);
    }

    final protected function prepare($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $comments[$i] = [
              "idComment" => $data[$i]["idComment"],
              "body" => $data[$i]["body"],
              "createdAt" => $data[$i]["createdAt"],
              "lastModify" => $data[$i]["lastModify"],
              "idUser" => $data[$i]["idUser"],
              "answer" => (isset($data[$i]["idComment"])) ? $this->get([
                "gauchada" => $data[$i]["idGauchada"],
                "question" => $data[$i]["idComment"]
              ])[0] : false
            ];
        }

        return !$data ? null : $comments;
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
