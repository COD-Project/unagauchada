<?php

$data = json_decode(
  file_get_contents("utils/consts.json")
, true);

define('OPTIONS', $data['OPTIONS']);
define('FILES', $data['FILES']);
define('EQUALS', $data['EQUALS']);

?>
