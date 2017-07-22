<?php

/**
 * created by Ulises J. Cornejo Fandos in 17/03/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


abstract class Models
{

  protected $db; // All model class needs an instance variable of class Connection.
  protected $id; // Every table in the database has a column for the identifier.
  protected $router;

  abstract static function getInstance();

  public function __construct()
  {
    $this->db = new Connection;
    global $router;
    $this->router = $router;
  }

  protected function purifier($elem)
  {
    return str_replace(array('<script>','</script>','<script src','<script type='), '', $elem);
  }

  protected function executeQuery($query)
  {
    $where = $query['where'] ?? "1=1";
    $criteria = $query['criteria'] ?? "";
    return $this->db->select($query['elements'], $query['table'], $where, $criteria);
  }

  public function get($options = null)
  {
    $query = $this->filter($options);
    return $this->prepare($this->executeQuery($query));
  }

  protected function __destruct()
  {
    $this->db = null;
  }

}

?>
