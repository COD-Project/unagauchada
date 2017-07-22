<?php

/**
 * created by Juan Cruz Ocampos in 22/05/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
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

  static private $ins;

  static function getInstance()
  {
    if (!self::$ins) {
      self::$ins = new self();
      }
      return self::$ins;
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
            $this->id = $this->router->getId() != null ? intval($this->router->getId()) : null;
            $this->title = isset($_POST['title']) ? $this->purifier($this->db->escape($_POST['title'])) : null;
            $this->body = isset($_POST['body']) ? $this->purifier($this->db->escape($_POST['body'])) : null;
            $this->state = isset($_POST['state']) ? $this->purifier($this->db->escape($_POST['state'])) : null;
            $this->locality = isset($_POST['locality']) ? $this->purifier($this->db->escape($_POST['locality'])) : null;
            $this->limitDate = $_POST['limitDate'] ?? null;
            $this->evaluation = isset($_POST['evaluation']) ? intval($_POST['evaluation']) : null;
            $this->idCategory = isset($_POST['idCategory']) ? intval($_POST['idCategory']) : null;
          }
      } catch (PDOException $e) {
        Func::redirect(URL . $url . $e->getMessage());
      }
    }

    final public function add() {
      $this->errors('gauchadas?error=');
      $this->db->insert('Gauchadas', array(
        'title' => $this->title,
        'body' => $this->body,
        'location' => $this->state . ", " .$this->locality,
        'limitDate' => $this->limitDate,
        'createdAt' => date('Y/m/d H:i:s', time()),
        'evaluation' => $this->evaluation,
        'idUser' => (Sessions::getInstance())->connectedUser()['idUser'],
        'idCategory' => $this->idCategory
      ));
      if (isset($_FILES['images']) && Func::images($_FILES['images'])) {
        (new Images())->add();
      } else {
        $this->db->insert('GauchadasImages', array(
          'idGauchada' => $this->db->lastInsertId(),
          'idImage' => 1
        ));
      }
      $this->db->update('Users', array('credits' => (Sessions::getInstance())->connectedUser()['credits'] - 1), 'idUser='.(Sessions::getInstance())->connectedUser()['idUser'], 'LIMIT 1');
      Func::redirect(URL . '?success=¡Se creo la gauchada!');
    }

    final public function delete() {
      $this->Errors('gauchadas?errors=');
      $this->db->update('Gauchadas', array(
        'validate' => 1
      ),"idGauchada=$this->id");
      $this->db->update('Postulants', array(
        'validate' => 1
      ), "idGauchada=$this->id");
      if(Postulants_aux($this->id) == false){
        $this->db->update('Users', array(
          'credits' => (Sessions::getInstance())->connectedUser()['credits'] + 1
        ), 'idUser='.(Sessions::getInstance())->connectedUser()['idUser']);
        Func::redirect(URL . '?success=Gauchada eliminada con exito, se devolvio el credito invertido en la misma.');
      } else {
        Func::redirect(URL . '?success=Gauchada eliminada con exito, no se devolvio el credito invertido en la misma debido a que esta tenia usuarios postulados.');
      }
    }


    final private function filter() {
      $select = '*';
      $table = 'Gauchadas g';
      $criteria = 'ORDER BY g.idGauchada DESC';
      $where = 'DATEDIFF(CURDATE(), limitDate) <= 0 AND g.validate IS NULL';
      foreach (OPTIONS['gauchadas']['filter'] as $key => $value) {
        $where .= array_key_exists($key, $_GET) && !Func::emp($_GET[$key]) ?
          ' AND ' . $value['content'] . $value['begin'] . $this->db->escape($_GET[$key]) . $value['end'] : '';
      }
      if (isset($_GET['mode'])) {
        $select = 'g.idGauchada, g.idUser, g.title, g.body, g.location, g.limitDate, g.createdAt, g.evaluation, g.idCategory, COUNT(idPostulante) as "postulantes"';
        $table .= ' LEFT JOIN Postulants p ON (g.idGauchada=p.idGauchada)';
        $criteria = 'GROUP BY g.idGauchada ORDER BY postulantes ' . $_GET['mode'] . ', g.idGauchada DESC';
      }
      return $this->db->select($select, $table, $where, $criteria);
    }

    final public function prepare($data) {
      for($i = 0; $i < count($data); $i++) {
        $gauchadas[$data[$i]['idGauchada']] = array(
          'idGauchada' => $data[$i]['idGauchada'],
          'idUser' => $data[$i]['idUser'],
          'title' => $data[$i]['title'],
          'body' => $data[$i]['body'],
          'location' => $data[$i]['location'],
          'limitDate' => $data[$i]['limitDate'],
          'creationDate' => $data[$i]['createdAt'],
          'evaluation' => $data[$i]['evaluation'],
          'user' => (new Users)->get()[$data[$i]['idUser']],
          'idCategory' => $data[$i]['idCategory'],
          'comments' => (new Comments)->get(array('gauchada' => $data[$i]['idGauchada'])),
          'images' => (new Images)->get(array(
            'gauchada' => $data[$i]['idGauchada']
          ))
        );
      }
      return $gauchadas;
    }

    final public function get($options = null) {
      $where = isset($options['user']) ? "idUser=" . $options['user'] : '1=1';
      $data = !isset($options['all']) ? $this->filter() : $this->db->select('*', 'Gauchadas', $where, 'ORDER BY idGauchada DESC');
      return !$data ? $data : $this->prepare($data);
    }

    final public function __destruct()
    {
      parent::__destruct();
    }

}
