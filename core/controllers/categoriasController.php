<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class categoriasController extends Controller {
	public function __construct() {
    	parent::__construct(true);
    	if($this->sessions->isLoggedIn()) {
    		$categorias = new Categories();
    		if($this->sessions->isGranted()){
    			switch ($this->router->getMethod()) {
    		        case 'add':
  		          	if ($_POST) {
  		            	$categorias->add();
  		          	} else {
  		            	$this->render('categorias/add');
  		          	}
                  break;
                }
            }
    	}
    }
}

?>
