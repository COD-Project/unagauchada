<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class gauchadasController extends Controller {
	public function __construct() {
    	parent::__construct();
    	if($this->session->session_inuse()) {
    		$gauchadas = new Gauchadas();
    		if(!$this->session->is_granted()){
    			switch ($this->router->getMethod()) {
		        case 'add':
		          	if ($_POST) {
		            	$gauchadas->Add();
		          	} else {
		            	$this->render('gauchadas/add');
		          	}
    		}
    	}
    }
}

?>