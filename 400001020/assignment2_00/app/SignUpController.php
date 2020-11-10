<?php
class SignUpController extends AbstractController{
	private $errors=[];
	public function run(){
		$v = new View();
		$v->setTemplate(TPL_DIR.  '/signup.tpl.php');
		$this->setView($v);
		$this->setModel(new SignUpModel());
		$this->model->attach($this->view);

		if(!(empty($_POST))){
			if($this->validEmail($_POST['email']) && $this->validPassword($_POST['password'],$_POST['repassword'])){
				$user = array('name'=>$_POST['formFullName'],'email'=>$_POST['email'],'password'=> $_POST['password']);
				$data = $this->model->addRecord($user);

				$session = new SessionManager();
				$session->setPages($this->model->getAll());

				header("login.php");
			}else{
				$this->view->addVar('errors',$this->errors);
				$this->view->display();
			}
		}else{
		
		$v->display();
		}
		
	}
	public function validEmail($email):bool{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       			 $this->errors['email']='INVALID EMAIL FORMAT';
        	return false;
			}
			return true;
	}
	public function validPassword($password,$repassword):bool{
		if (strlen($password) < 10 ) {
  	  		$this->errors["lengtherror"] = "Password should be min 10 characters ";
  	  		return false;
		}
		if (!preg_match("/\d/", $password)) {
   			 $this->errors["number"] = "Password should contain at least one digit";
   			 return false;
		}
		if (!preg_match("/[A-Z]/", $password)) {
    	$this->errors["capital"] = "Password should contain at least one Capital Letter";
    	return false;
		}
		if (preg_match("/\s/", $password)) {
    	$this->errors["whitespace"] = "Password should not contain any white space";
    	return false;
		}if ($password != $repassword) {
    	$this->errors["duplicate"] = "The passwords entered do not match";
    	return false;
		}
		return true;
	}
	public function setErrorMessages(array $errors){
	if (!empty($errors)){
		$this->errors=$errors;
	}
	}
}
	
?>
