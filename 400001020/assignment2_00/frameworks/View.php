<?php
namespace Quwius\Framework;

class View implements Observer_Interface{
	private $tpl = '';
	private $vars=[];

	public function setTemplate (string $filename){
		if (empty($filename)){
  		trigger_error ('<b>View error: </b> No template file given',E_USER_ERROR);
  	}
  	if (!file_exists($filename)){
  		trigger_error('<b>View error: <b/> File '. $filename.'does not exist.
  						Cannot bind the template',E_USER_ERROR);
  	}

  	$this->tpl =$filename;
	}
	public function addVar(string $name, $value ){
		$this->vars[$name]=$value;
	}
	public function display(){
		extract($this->vars);
		require $this->tpl;
	}
	public function update (Observable_Model $o){
		$records = $o->GetUpdatedData();
		foreach ($records as $k=>$r){
			$this->addVar($k,$r);
		}
		$this->display();
	}

}
?>