<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class ratingsController extends Controller {
	public function __construct() {
    	parent::__construct();
    	if($this->sessions->isLoggedIn()) {
    		$ratings = new Ratings();
    			switch ($this->router->getMethod()) {
		        case 'add':
            	if ($_POST) {
              	$ratings->add();
            	}
              break;
          }
    	}
    }
}

?>
