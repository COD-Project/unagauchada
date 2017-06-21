<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class commentsController extends Controller {
	public function __construct() {
    	parent::__construct(true);
    	if($this->sessions->isLoggedIn()) {
    		$categorias = new Comments();
    			switch ($this->router->getMethod()) {
		        case 'add':
            	if ($_POST) {
              	$categorias->Add();
            	}
              break;
						case 'addQuestion':
            	if ($_POST) {
              	$categorias->AddAnswer();
            	}
              break;
          }
    	}
    }
}

?>
