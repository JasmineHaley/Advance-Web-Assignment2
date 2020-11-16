<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\Validator;
use Quwius\Framework\View;

class SignUpController extends AbstractCommandPageController{
	private $errors=[];
	private $data = null;
	protected function makeModel () :Observable_Model{
	return new \SignUpModel();
	}

	protected function makeView() : View{
		$v = new View();
		$v->setTemplate(TPL_DIR.  '/signup.tpl.php');
		return $v;
	}
	public function run(){
	
		
		$this->model = $this->makeModel();
		 $this->view = $this->makeView();
		

		$this->model->attach($this->view);

		if(!(empty($_POST))){
			$validator = new Validator();
			if($validator->validEmail($_POST['email']) && $validator->validPassword($_POST['password'],$_POST['repassword'])){

				$user = array('name'=>$_POST['formFullName'],'email'=>$_POST['email'],'password'=> $_POST['password']);
				$data = $this->model->insert($user);

				$session = new SessionManager();
				$session->setPages($this->model->getAll());

				$this->view->setTemplate(TPL_DIR. '/login.tpl.php');
			$this->model = new \loginModel();
			$this->model->attach($this->view);
			}else{
				$this->view->addVar('errors',$this->errors);
				$this->view->display();
			}
		}else{
		
		$this->view->display();
		}
		
	}
	public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
	/*public function setErrorMessages(array $errors){
	if (!empty($errors)){
		$this->errors=$errors;
	}
	}*/
}
	
?>
