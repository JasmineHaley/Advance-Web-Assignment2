<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
class IndexController extends AbstractCommandPageController{
	private $data = null;
	public function run(){

		if(!(empty($_GET))){
		
		if($_GET['controller']=='Login'){
			header('Location: login.php');
		}
		if($_GET['controller']=='SignUp'){
			header('Location: signup.php');
		}
		if($_GET['controller']=='Courses'){
			header('Location: Courses.php');
		}
		if($_GET['controller']=='LogOut'){
			SessionManager::create();
			$session = new SessionManager();
			$session->destroy();
			header('Location: index.php');
		}
		
		}
		$v = new View();
		$v->setTemplate(TPL_DIR. '/index.tpl.php');
		
		$m = new  IndexModel();
		$this->setModel(new  IndexModel());
		 $this->setView($v);
		
		
		$this->model->attach($this->view);
		$data=$this->model->findAll();

		$this->model->updateData($data);
		//tells the model to contact its observers
		$this->model->notify();

	}
	public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}
?>