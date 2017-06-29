<?php

define('OPTIONS', array(
  'gauchadas' => array(
    'filter' => array(
      'search' => array(
        'content' => 'g.title LIKE ',
        'begin' => '"%',
        'end' => '%"'
      ),
      'category' => array(
        'content' => 'g.idCategory=',
        'begin' => '"',
        'end' => '"'
      ),
      'locality' => array(
        'content' => 'g.location LIKE ',
        'begin' => '"%',
        'end' => '%"'
      ),
      'state' => array(
        'content' => 'g.location LIKE ',
        'begin' => '"%',
        'end' => '%"'
      )
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
    'profile' => array(
      'path' => 'profile'
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
