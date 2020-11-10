<?php
use PHPUnit\Framework\TestCase;

require'frameworks/View.php';

class ViewTest extends TestCase{
	public function testViewObjectCreated(): void{
		$this->assertIsObject(new View);
	}

	public function testSetTemplate() : void{
		$v = new View();
		$v->setTemplate('index.tpl.php');
		$this->assertTrue($v);
		
	}
	public function testdisplay() : void{
		$v = new View();
		$this->assertIsString($v->display());
	}
	public function testAddVar(): void{
		$v = new View();
		$this->assertIsArray($v->addVar(error,'error occured'));
	}
}
?>