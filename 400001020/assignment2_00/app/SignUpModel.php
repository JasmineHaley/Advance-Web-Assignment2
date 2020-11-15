<?php

use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
//require'autoloader.php';
class SignUpModel extends Observable_Model {
	
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