<?php
	namespace Quwius\Framework;
abstract class AbstractCommandContext{
	protected $data = [];
	protected $errors=[];

	public function __construct(){

		$this->data['post']=$_POST;
		$this->data['get']=$_GET;
		$this->data['parameters']=[];
		
	}
	abstract public function add(string $key,$val);
	abstract public function get(string $key);
	abstract public function setErrors($error);
	abstract public function getErrors() : array;
	
}
?>