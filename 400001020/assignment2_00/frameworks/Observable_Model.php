<?php
namespace Quwius\Framework;
//require'autoloader.php';
abstract class Observable_Model extends Model_Abstract implements Observable_Interface{
	private $observers =[];
	protected $updatedData =[];
	
	public function attach (Observer_Interface $o){
		$this->observers[]= $o;
	}
	public function detach (Observer_Interface $o){
		$this->observers = array_filter($this->observers,function($a) use($o){return(!($a === $o));});
	}
	public function notify(){
		foreach($this->observers as $ob){
			$ob->update($this);
		}
	}
	public function GetUpdatedData(){
		return $this->updatedData;
	}
	public function updateData(array $data){
		$this->updatedData=$data;
	}
	
	abstract public function findAll():array;
	abstract public function findRecord(string $id) :array;
}
?>