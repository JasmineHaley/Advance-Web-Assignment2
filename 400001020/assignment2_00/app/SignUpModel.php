<?php
//require'autoloader.php';
class SignUpModel extends Observable_Model {
	public function addRecord (array $user){
	$json=json_decode($this->loadData('users'),true);
	array_push($json, $user);
	$jsonData = json_encode($json);
	file_put_contents('data/users.json', $jsonData);
	
	$users = $json;
	
	for($i = 0; $i < (count($users)-1);$i++){
		$users[$i]["password"] = password_hash($users[$i]["password"],PASSWORD_DEFAULT);
		
	}

	
    $UpdatedData = json_encode($users);
	file_put_contents('data/hashedUsers.json', $UpdatedData);

}

	
	public function getAll():array{
		$json=json_decode($this->loadData('users'),true);
		$users=[];
		for($i = 0; $i < (count($json)-1);$i++){
			$users[$i]= $json[$i]["name"];
 		}
 		
 		return $users;
 		
	}
	
	public function getRecord(string $id):array{
		
  		return [];
	}

}
?>