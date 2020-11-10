<?php
class CoursesController extends AbstractController{


	public function run(){
		SessionManager::create();
		$session = new SessionManager(); 

		$v = new View();
		$v->setTemplate(TPL_DIR.  '/courses.tpl.php');
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
