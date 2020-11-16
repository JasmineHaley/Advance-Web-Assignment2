<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
class ProfileController extends AbstractCommandPageControlle{
	protected function makeModel () :Observable_Model{
	return new \ProfileModel();
	}

	protected function makeView() : View{
		$v = new View();
		$v->setTemplate(TPL_DIR. '/profile.tpl.php');
		return $v;
	}

	public function run(){
		SessionManager::create();
		$session = new SessionManager();

		$this->model = $this->makeModel();
		 $this->view = $this->makeView();
		

		$this->model->attach($this->view);

		
		$user = $session->getSession('users');
		
		if($session->accessible($user,'profile')){
			$data=$this->model->getAll();

			$this->model->updateData($data);
			//tells the model to contact its observers
			$this->model->notify();
	}else{
		$this->view->setTemplate(TPL_DIR. '/login.tpl.php');
		$this->view->display();
	}
		
		
	}
}
?>