<?php
namespace Quwius\Framework;

class CommandContext extends AbstractCommandContext{
	
   
	public function add(string $key,$val){
		$this->data[$key] = $val;
	}
	public function get(string $key){
		if (isset($this->data[$key])) { 
			return $this->data[$key];
	}
        return null;
	}
	public function setErrors($error){
		$this->errors = $errors;
	}
	public function getErrors(): array{
		return $this->errors;
	}
}
?> 