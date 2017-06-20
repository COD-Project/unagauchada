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
  )
));

?>
