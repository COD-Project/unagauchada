<?php

/**
 * created by Ulises J. Cornejo Fandos on 24/06/2017
 */

class Images extends Models
{
    private $images;
    private $folder;
    private $controller;
    private $nexus;
    private $fk;

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

    final protected function errors($url="")
    {
        try {
            if (!Func::images($_FILES['images'])) {
                throw new PDOException("Solo pueden subirse imágenes", 1);
            }
            $this->images = $_FILES['images'] ?? null;
            $this->controller = strtolower(explode('Controller', $this->router->getController())[0]);
            $this->nexus = EQUALS[$this->controller]['nexus'] ?? null;
            $table = EQUALS[$this->controller]['table'];
            $this->fk = ($this->db->select($table['key'], $table['name'], '1=1', 'ORDER BY ' . $table['criteria'] . ' DESC LIMIT 1'))[0][$table['key']] ?? null;
            $this->folder = $this->controller . '/' . $this->fk;
            $this->id = ($this->db->select('idImage', 'Images', '1=1', 'ORDER BY idImage DESC LIMIT 1'))[0]['idImage'] + 1;
        } catch (PDOException $e) {
            Func::redirect(URL . $url . $e->getMessage());
        }
    }

    final public function add()
    {
        $this->errors('?error=');
        for ($i=0; $i < count($this->images['name']); $i++) {
            $id = $this->id + $i;
            $type = explode('/', $this->images['type'][$i]);
            $name = 'image.' . $id . '.' . $type[1];
            Func::saveFile([
              'name' => $name,
              'tmp' => $this->images['tmp_name'][$i],
              'folder' => $this->folder
            ]);
            if ($this->nexus) {
                $this->db->insert($this->nexus['name'], [
                  $this->nexus['fk'] => $this->fk,
                  'idImage' => $id
                ]);
            }
        }
    }

    final protected function filter($options)
    {
        $where = "1=1";
        $where .= isset($options["gauchada"]) ? " AND idGauchada=". $options['gauchada'] : "";
        $where .= isset($options["image"]) ? " AND i.idImage=" . $options["image"] : "";
        $table = "Images i ";
        $table .= isset($options["gauchada"]) ? "INNER JOIN GauchadasImages g ON (i.idImage = g.idImage)" : "";
        return ([
          "elements" => "*",
          "table" => $table,
          "where" => $where
        ]);
    }

    final protected function prepare($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $images[$i] = [
              'idImage' => $data[$i]['idImage'],
              'path' => 'assets/app/images/' . $data[$i]['path']
            ];
        }
        return !$data ? null : $images;
    }

    final public function __destruct()
    {
        parent::__destruct();
    }
}
