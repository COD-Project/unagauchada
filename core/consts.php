<?php

define('OPTIONS', array(
  'gauchadas' => array(
    'filter' => array(
      'search' => array(
        'content' => 'title LIKE ',
        'begin' => '"%',
        'end' => '%"'
      ),
      'category' => array(
        'content' => 'idCategory=',
        'begin' => '"',
        'end' => '"'
      ),
      'location' => array(
        'content' => 'location=',
        'begin' => '"',
        'end' => '"'
      )
    ),
    'mode' => array(

    )
  ),
  'profiles' => array(
    'myprofile' => array(
      'path' => 'myprofile',
      'edit_options' => array(
        'pass' => 'password',
        'name' => 'name',
        'surname' => 'surname',
        'birthdate' => 'birthdate',
        'phone' => 'phone'
      )
    ),
    'postulante' => array(
      'path' => 'postulante'
    )
  )
));

define('FILES', array(
  'images' => array(
    'format' => 'image',
    'extensions' => array(
      'png',
      'jpg',
      'jpeg',
      'gif',
      'tiff',
      'bmp',
      'bpg'
    )
  )
));

define('EQUALS', array(
  'gauchadas' => array(
    'table' => array(
      'name' => 'Gauchadas',
      'key' => 'idGauchada'
    ),
    'nexus' => array(
      'name' => 'GauchadasImages',
      'fk' => 'idGauchada'
    )
  ),
  'profiles' => array(
    'table' => array(
      'name' => 'Users',
      'key' => 'idUser'
    ),
  )
));

?>
