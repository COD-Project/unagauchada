<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class gauchadasController extends Controller {
	public function __construct() {
    	parent::__construct();
    	if($this->sessions->isLoggedIn()) {
    		$gauchadas = new Gauchadas();
    		if(!$this->sessions->isGranted()){
    			switch ($this->router->getMethod()) {
		        case 'add':
		          	if ($_POST) {
		            	$gauchadas->Add();
		          	} else {
		            	$this->render('gauchadas/add');
		          	}
                break;
                }
    		}
    	} else {
    		$this->render('gauchadas/view');
    	}
    }
}

?>
