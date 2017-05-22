<?php

/**
 * created by Lucas Di Cunzolo in 05/03/2017
 */

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------


final class Gauchadas extends Models
{
	private $title;
	private $body;
	private $location;
	private $limitDate;
	private $createdAt;
	private $evaluation;
	private $idUser;
	private $idCategory;