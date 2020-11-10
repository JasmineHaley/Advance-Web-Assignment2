<?php
namespace Quwius\Framework;
class SessionManager{
	protected $pages=["profile"=>["Test User"],'courses'=>["Test User"]];
	public static function create(){
		session_start();
	}
	public function destroy(){
		
		session_destroy();
	}
	public function add($name, $value){
		$_SESSION[$name] = $value;
	}
	public function remove($name){
		if(isset($_SESSION[$name])){
			unset($_SESSION[$name]);
		}		
	}
	public function setPages(array $values){
		$this->pages["profile"]=$values;
		//$this->pages["courses"]=$values;
	}
	public function getSession($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		return null;
	}
	public function accessible($user,$page){
		
		if(in_array($user,$this->pages[$page])){
			return true;
		}else{
			return false;
		}
	}
}
?>