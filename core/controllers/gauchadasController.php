<?php

# Security
defined('INDEX_DIR') OR exit(APP . ' software says .i.');
//------------------------------------------------

class gauchadasController extends Controller {
	public function __construct() {
  	parent::__construct(true);
  	if($this->sessions->isLoggedIn()) {
  		$this->models = array(
				"gauchadas" => new Gauchadas,
				"postulantes" => new Postulants
			);
			$this->gauchadas = $this->models['gauchadas']->get(['all']);
			$this->postulantes = $this->models['postulantes']->get($this->router->getId());
			switch ($this->router->getMethod()) {
	        case 'add':
						if(!$this->sessions->isGranted()){
							$this->categories = (new Categories)->get();
		        	if ($_POST) {

		        		$this->models['gauchadas']->add();
		        	} else if(!GauchadasDebit((Sessions::getInstance())->connectedUser()['idUser'])){
		        			$this->render('gauchadas/add');
		        	} else {
		        		Func::redirect(URL.'?success=Usted tiene calificaciones pendientes.');
		        	}
						}
	        	break;
					case 'view':
						if (array_key_exists($this->router->getId(), $this->gauchadas)) {
							$this->gauchada = $this->gauchadas[$this->router->getId()];
							$this->render("gauchadas/view");
						} else {
							Func::redirect();
						}
						break;
					case 'delete':
						if (array_key_exists($this->router->getId(), $this->gauchadas)) {
							$this->models['gauchadas']->delete();
						} else {
							Func::redirect();
						}
						break;
					default:
						Func::redirect();
        }
  	} else if ($this->router->getMethod() == 'view') {
  		Func::redirect(URL . '?error=Debes estar logueado para ver una gauchada');
  	}
	}
}

?>
