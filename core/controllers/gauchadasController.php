<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class gauchadasController extends Controller {
	public function __construct() {
	  	parent::__construct(true);
	  	if($this->sessions->isLoggedIn()) {
	  		$gauchadas = new Gauchadas();
  			switch ($this->router->getMethod()) {
		        case 'add':
					if(!$this->sessions->isGranted()){
			          	if ($_POST) {
		            		$gauchadas->Add();
			          	} else {
		            		$this->render('gauchadas/add');
			          	}
					}
            	break;
				case 'view':
					if (array_key_exists($this->router->getId(), Gauchadas())) {
						$this->render("gauchadas/view");
					} else {
						Func::redirect();
					}
					break;
				case 'delete':
					if(true){
						$gauchadas->Delete();
					}
	        }
	  	} else if ($this->router->getMethod() == 'view') {
	  		Func::redirect(URL . '?error=Debes estar logueado para ver una gauchada');
	  	}
	}		
}

?>
