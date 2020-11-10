<?php
use PHPUnit\Framework\TestCase;

require'frameworks/SessionManager.php';

class SessionManagerTest extends TestCase{
	public function testContainerCreated(): void{
		SessionManager :: create();
		$this->assertArrayHasKey('container',$_SERVER);
		$this->assertIsArray($_SESSION['container']);
	}

	public function testSessionObjectCreated(): void{
		$this->assertIsObject(new SessionManager);
	}

	public function testSessionManagerHasStaticMethodClear() : void{
		$method = new ReflectionMethod ('SessionManager','create');
		$this->assertTrue($method->isStatic(),'Method create() exists but is not static');
	}

	/*public function getAllRecordsTest() :void{
		$model = new Obseravble_Model();
		$json = $model->getAll();
		$this->assertCount(1,$json[0]);
	}
	public function getRecordTest() :void{

	}*/
}
?>