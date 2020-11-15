<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
use Quwius\Framework\SessionManager;
class CoursesController extends AbstractCommandPageController{
	private $data = null;
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

		$this->model = $this->makeModel();
		$this->view = $this->makeView();
		
		
		$user = $session->getSession('users');
		if($session->accessible($user,'profile')){
		$this->model->attach($this->view);
		$data=$this->model->findAll();

		$this->model->updateData($data);
		//tells the model to contact its observers
		$this->model->notify();
		
	}else{
		$this->view->setTemplate(TPL_DIR.  '/login.tpl.php');
		//$this->view->display();
	}	
	}
	 public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
	
}
?>
