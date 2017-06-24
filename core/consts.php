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
      'path' => 'myprofile'
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
    'table' => 'Gauchadas',
    'nexus' => array(
      'name' => 'GauchadasImages',
      'firstId' => 'idGauchada'
    )
  ),
  'profiles' => array(
    'table' => 'Gauchadas',
  )
));

?>
