<?php

use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
//require'autoloader.php';
class SignUpModel extends Observable_Model {
	/*public function addRecord (array $user){
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

}*/
	public function insert (array $values){
		$conn=$this->makeConnection();

		$name = $values["name"];
		$email=$values["email"];
		$password= password_hash($values["password"],PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (name, email,password)
				VALUES ('$name', '$email', '$password');";

		mysqli_query($conn, $sql);

		mysqli_close($conn);
	}
	
	public function findAll():array{
		$json=json_decode($this->loadData('users'),true);
		$users=[];
		for($i = 0; $i < (count($json)-1);$i++){
			$users[$i]= $json[$i]["name"];
 		}
 		
 		return $users;
 		
	}
	
	public function findRecord(string $id):array{
		
  		return [];
	}

}
?>