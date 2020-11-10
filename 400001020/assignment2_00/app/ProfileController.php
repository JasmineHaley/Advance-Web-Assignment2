<?php
class ProfileController extends AbstractController{


	public function run(){
		SessionManager::create();
		$session = new SessionManager();
	

		$v = new View();
		$v->setTemplate(TPL_DIR. '/profile.tpl.php');
		$this->setModel(new ProfileModel());
		$this->setView($v);

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