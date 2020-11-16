<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\AbstractCommandPageController;
use Quwius\Framework\View;
use Quwius\Framework\SessionManager;
class LoginController extends AbstractCommandPageController{
	private $errors=[];
	private $data = null;
	protected function makeModel () :Observable_Model{
	return new  \LoginModel();
	}

	protected function makeView() : View{
		$v = new View();
		$v->setTemplate(TPL_DIR. '/login.tpl.php');
		return $v;
	}

	public function run(){
		SessionManager::create();
		$this->model = $this->makeModel();
		 $this->view = $this->makeView();
		
		$this->model->attach($this->view);
	if(!(empty($_POST))){
		if($this->auth($_POST['email'],$_POST['password'])){
			$records = $this->model->findRecord($_POST['email']);
         	 $session = new SessionManager();
            $session->add('users',$records["name"]);
            $session->setPages($this->model->findAll());
         	 
			$this->view->setTemplate(TPL_DIR. '/profile.tpl.php');
			$this->model = new \ProfileModel();
			$this->model->attach($this->view);
			exit();
		}
		else{

			$this->view->addVar('errors',$this->errors);
			$this->view->display();
		}
	}else{
		
		$this->view->display();
	}
}
public function auth(String $email,String $password):bool
        {
        	//$this->model=$this->setModel(new LoginModel());
        	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       			 $this->errors['email']='INVALID EMAIL FORMAT';
        	return false;
			}
            //using model
            $records = $this->model->getRecord($email);
          $session = new SessionManager($records["name"]);
            $session->add('users',$records["name"]);
            
          // echo $records;

            if(!empty($records)  && password_verify($password, $records["password"])){
               return true;
            }
            else{
              $this->errors['credentials']='INVALID PASSWORD OR EMAIL';
                return false;
               
            }
                 
           
        }
  public function execute (CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
public function setErrorMessages(array $errors){
	if (!empty($errors)){
		$this->errors=$errors;
	}
	}
}
?>