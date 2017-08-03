<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') or exit(APP . ' software says .i.');
//------------------------------------------------


final class Gauchadas extends Models
{
    private $title;
    private $body;
    private $state;
    private $locality;
    private $limitDate;
    private $evaluation;
    private $idCategory;

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
            if (empty($this->router->getId()) && empty($_POST['title']) && empty($_POST['body']) && empty($_POST['locality']) && empty($_POST['limitDate']) && empty($_POST['evaluation']) && empty($_POST['idUser']) && empty($_POST['idCategory'])) {
                throw new PDOException("Error Processing Request", 1);
            } else {
                $this->id = $this->router->getId();
                $this->title = $_POST['title'] ?? null;
                $this->body = $_POST['body'] ?? null;
                $this->state = $_POST['state'] ?? null;
                $this->locality = $_POST['locality'] ?? null;
                $this->limitDate = $_POST['limitDate'] ?? null;
                $this->evaluation = $_POST['evaluation'] ?? null;
                $this->idCategory = $_POST['idCategory'] ?? null;
                $this->user = (Sessions::getInstance())->connectedUser();
            }
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors('gauchadas?error=');
        $this->db->insert('Gauchadas', [
          'title' => $this->title,
          'body' => $this->body,
          'location' => $this->state . ", " .$this->locality,
          'limitDate' => $this->limitDate,
          'createdAt' => date('Y/m/d H:i:s', time()),
          'lastModified' => date('Y/m/d H:i:s', time()),
          'evaluation' => $this->evaluation,
          'idUser' => $this->user['idUser'],
          'idCategory' => $this->idCategory
        ]);
        if (isset($_FILES['images']) && Func::images($_FILES['images'])) {
            (new Images())->add();
        } else {
            $this->db->insert(
              'GauchadasImages',
              [
                'idGauchada' => $this->db->lastInsertId(),
                'idImage' => 1
              ]
            );
        }
        $this->db->update(
          'Users',
          ['credits' => $this->user['credits'] - 1],
          'idUser='.$this->user['idUser'],
          'LIMIT 1'
        );
        Func::redirect(URL . '?success=¡Se creo la gauchada!');
    }

    final public function edit()
    {
        $this->errors('gauchadas?error=');
        $this->db->update('Gauchadas', array(
          'title' => $this->title,
          'body' => $this->body,
          'location' => $this->state . ", " .$this->locality,
          'lastModified' => date('Y/m/d H:i:s', time()),
          'limitDate' => $this->limitDate,
          'idCategory' => $this->idCategory
        ), "idGauchada=$this->id");
        if (isset($_FILES['images']) && Func::images($_FILES['images'])) {
            (new Images())->add();
        }
        Func::redirect(URL . '?success=¡Se editó la gauchada correctamente!');
    }

    final public function delete()
    {
        $this->errors('gauchadas?errors=');
        $this->db->update(
          'Gauchadas',
          [ 'validate' => 1 ],
          "idGauchada=$this->id"
        );
        $this->db->update(
          'Postulants',
          [ 'validate' => 1 ],
          "idGauchada=$this->id"
        );
        if (!(new Postulants)->get(['gauchada' => $this->id])) {
            $this->db->update(
              'Users',
              [ 'credits' => $this->user['credits'] + 1 ],
              'idUser=' . $this->user['idUser']
            );
            Func::redirect(URL . '?success=Gauchada eliminada con exito, se devolvio el credito invertido en la misma.');
        } else {
            Func::redirect(URL . '?success=Gauchada eliminada con exito, no se devolvio el credito invertido en la misma debido a que esta tenia usuarios postulados.');
        }
    }

    final protected function filter($options)
    {
        $select = '*';
        $table = 'Gauchadas g LEFT JOIN Ratings r ON(g.idGauchada=r.idGauchada)';
        $criteria = 'ORDER BY g.idGauchada DESC';
        $where = 'DATEDIFF(CURDATE(), limitDate) <= 0 AND g.validate IS NULL AND r.idGauchada IS NULL';
        if (!isset($options['all'])) {
            foreach (OPTIONS['gauchadas']['filter'] as $key => $value) {
                $where .= (array_key_exists($key, $_GET) && !Func::emp($_GET[$key])) || ($options && array_key_exists($key, $options) && !Func::emp($options[$key]))  ?
          ' AND ' . $value['content'] . $value['begin'] . $this->db->escape($_GET[$key] ?? $options[$key]) . $value['end'] : '';
            }
        }
        if (isset($_GET['mode'])) {
            $select = 'g.idGauchada, g.idUser, g.title, g.body, g.location, g.limitDate, g.createdAt, g.evaluation, g.idCategory, COUNT(idPostulante) as "postulantes"';
            $table .= ' LEFT JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
            $criteria = 'GROUP BY g.idGauchada ORDER BY postulantes ' . $_GET['mode'] . ', g.idGauchada DESC, lastModified DESC';
        }
        return ([
          "elements" => $select,
          "table" => $table,
          "where" => $where,
          "criteria" => $criteria
        ]);
    }

    final protected function prepare($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $gauchadas[$data[$i]['idGauchada']] = [
              'idGauchada' => $data[$i]['idGauchada'],
              'idUser' => $data[$i]['idUser'],
              'title' => $data[$i]['title'],
              'body' => $data[$i]['body'],
              'province' => explode(',', $data[$i]['location'])[0],
              'location' => explode(',', $data[$i]['location'])[1],
              'entireLocation' => $data[$i]['location'],
              'creationDate' => $data[$i]['createdAt'],
              'lastModified' => $data[$i]['lastModified'],
              'limitDate' => $data[$i]['limitDate'],
              'evaluation' => $data[$i]['evaluation'],
              'user' => (new Users)->get()[$data[$i]['idUser']],
              'idCategory' => $data[$i]['idCategory'],
              'comments' => (new Comments)->get([
                'gauchada' => $data[$i]['idGauchada']
              ]),
              'images' => (new Images)->get([
                'gauchada' => $data[$i]['idGauchada']
              ])
            ];
        }
        return !$data ? null : $gauchadas;
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
