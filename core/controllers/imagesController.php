<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class imagesController extends Controller {
	public function __construct() {
    	parent::__construct(true);
    	if($this->sessions->isLoggedIn()) {
    		$images = new Images();
    		if($this->sessions->isGranted()){
    			switch ($this->router->getMethod()) {
    		        case 'add':
    		          	if ($_POST) {
    		            	$images->Add();
    		          	} else {
    		            	$this->render('images/add');
    		          	}
                        break;
                    case 'delete':
                    	if ($_POST) {
    		            	$images->Delete();
    		          	}
                        break;
                }
            }
    	}
    }
}

?>
