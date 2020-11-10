<?php
use PHPUnit\Framework\TestCase;

require'frameworks/Observable_Model.php';

class ObservableModelTest extends TestCase {
	public function modelObjectTest() {
		$this->assertIsObject(new Observable_Model);
		
	}
	public function checkObservableDetachTest() :void{
		$method = new ReflectionMethod ('Obseravble_Model','detach');
		$this->assertFalse($method,'Method detach() not exists ');
	}
 
	public function checkObservableAttachTest() :void{
		$method = new ReflectionMethod ('Obseravble_Model','detach');
		$this->assertFalse($method,'Method detach() not exists ');
	}
	public function checkObservableAttachTest() :void{
		$method = new ReflectionMethod ('Obseravble_Model','notify');
		$this->assertFalse($method,'Method detach() not exists ');
	}
	
	
}
?>