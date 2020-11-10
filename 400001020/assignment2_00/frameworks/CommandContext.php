<?php
namespace Quwius\Framework;

class CommandContext extends AbstractCommandContext{
	private $params = [];
    private $error = [];

	public function add(string $key,$val){
		$this->params[$key] = $val;
	}
	public function get(string $key){
		if (isset($this->params[$key])) { 
			return $this->params[$key];
	}
        return null;
	}
	public function setErrors($error){
		$this->error = $error;
	}
	public function getErrors(): array{
		return $this->error;
	}
}
?> 