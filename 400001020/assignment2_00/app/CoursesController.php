<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
class CoursesController extends AbstractCommandPageController{
protected function makeModel () :Observable_Model{
	return new  \CoursesModel();
	}

	protected function makeView() : View{
		$v = new View();
		$v->setTemplate(TPL_DIR.  '/courses.tpl.php');
		return $v;
	}

	public function run(){
		SessionManager::create();
		$session = new SessionManager(); 

		$v = new View();
		
		$this->setView($v);
		$this->setModel(new CoursesModel());
		$this->model->attach($this->view);
		
		$user = $session->getSession('users');
		if($session->accessible($user,'profile')){
			$data=$this->model->getAll();

		$this->model->updateData($data);
		//tells the model to contact its observers
		$this->model->notify();
		
	}else{
		$v->setTemplate(TPL_DIR. '/login.tpl.php');
		$v->display();
	}	
	}
	
}
?>
