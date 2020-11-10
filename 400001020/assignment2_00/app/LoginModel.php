<?php
//require'autoloader.php';
class LoginModel extends Observable_Model {
	
	public function getAll():array{
	$json=json_decode($this->loadData('users'),true);
		$users=[];
		for($i = 0; $i < (count($json)-1);$i++){
			$users[$i]= $json[$i]["name"];
 		}
 		
 		return $users;
	}

	public function getRecord(string $id):array{
		$users=json_decode($this->loadData('hashedUsers'),true);
		//echo var_dump($users['user'][1][1]);
		$person=[];
		for($i = 0;$i < (count($users)-1);$i++){
				if($users[$i]["email"]==$id){
					
					$person=$users[$i];
			}	
		}
		
	return $person;
}

}
?>