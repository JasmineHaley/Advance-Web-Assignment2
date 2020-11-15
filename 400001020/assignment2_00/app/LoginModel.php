<?php
//namespace Apps\handlers;
use Quwius\Framework\Observable_Model;
//require'autoloader.php';
class LoginModel extends Observable_Model {
	
	public function findAll():array{
    $conn=$this->makeConnection();
	$sql= "SELECT * FROM users ";
	$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$users[]=$row["name"];
		}
 		
 		
 		return $users;
	}

	public function findRecord(string $id):array{
		$conn=$this->makeConnection();

		$sql1= "SELECT * FROM users WHERE email ='$id'";
		$result = mysqli_query($conn, $sql);
		
		return mysqli_fetch_array($result,MYSQLI_ASSOC);
}

}
?>