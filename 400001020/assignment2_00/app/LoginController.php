<?php
class LoginController extends AbstractController{
	private $errors=[];
	public function run(){
		SessionManager::create();
		$v = new View();
		$v->setTemplate(TPL_DIR. '/login.tpl.php');
		$this->setView($v);
		$this->setModel(new LoginModel());
		$this->model->attach($this->view);
	if(!(empty($_POST))){
		if($this->auth($_POST['email'],$_POST['password'])){
			$records = $this->model->getRecord($_POST['email']);
         	 $session = new SessionManager();
            $session->add('users',$records["name"]);
            $session->setPages($this->model->getAll());
         	 
			header('Location: profile.php');
			exit();
		}
		else{

			$this->view->addVar('errors',$this->errors);
			$this->view->display();
		}
	}else{
		
		$v->display();
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
public function setErrorMessages(array $errors){
	if (!empty($errors)){
		$this->errors=$errors;
	}
	}
}
?>