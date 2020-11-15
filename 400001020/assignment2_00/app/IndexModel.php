<?php

use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
class IndexModel extends Observable_Model {
	
	
	public function findAll():array{
		$conn=$this->makeConnection();
		//var_dump($conn); 
		$sql1= "SELECT * FROM courses WHERE course_id < 9 ORDER BY course_recommendation_count DESC";
		$sql2= "SELECT * FROM courses WHERE course_id < 9 ORDER BY course_access_count DESC";
		//$sql3="SELECT * FROM course_instructor ";
		//$sql4= "SELECT * FROM instructors";
		
		$recommendation_query = mysqli_query($conn,$sql1);
		$popular_query =  mysqli_query($conn,$sql2);
	
		
		
		while($recommendation_column = mysqli_fetch_array($recommendation_query,MYSQLI_ASSOC)){
			
			$sql3="SELECT instructor_name FROM instructors WHERE instructor_id= (SELECT instructor_id FROM course_instructor WHERE course_id =". $recommendation_column['course_id'].")" ;

			$instructors_query =  mysqli_query($conn,$sql3);
			$instructor_column=mysqli_fetch_array($instructors_query,MYSQLI_ASSOC);
			
			$recommended[]=array($recommendation_column["course_name"],$recommendation_column["course_image"],$instructor_column);
		}

		while($popular_column = mysqli_fetch_array($popular_query,MYSQLI_ASSOC)){
			
			$sql4="SELECT instructor_name FROM instructors WHERE instructor_id= (SELECT instructor_id FROM course_instructor WHERE course_id =". $popular_column['course_id'].")" ;

			$instructor_query =  mysqli_query($conn,$sql4);

			$popular[]=array($popular_column["course_name"],$popular_column["course_image"],$instructor_query);
		}
	
		mysqli_close($conn);
		return ['popular'=>$popular,'recommended'=>$recommended];
		

	}
	public function findRecord(String $id):array{
		return [];
	}
	public function insert (array $values){

	}
}
?>