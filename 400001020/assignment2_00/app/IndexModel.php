<?php

use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
class IndexModel extends Observable_Model {
	
	
	public function findAll():array{
		$conn=$this->makeConnection();
		
		$sql1= "SELECT * FROM courses  ORDER BY course_recommendation_count DESC";
		$sql2= "SELECT * FROM courses  ORDER BY course_access_count DESC";
		
		
		$recommendation_query = mysqli_query($conn,$sql1);
		$popular_query =  mysqli_query($conn,$sql2);
	
		
		
		while($recommendation_column = mysqli_fetch_array($recommendation_query,MYSQLI_ASSOC)){
			
			$sql3="SELECT instructor_name FROM instructors WHERE instructor_id= (SELECT instructor_id FROM course_instructor WHERE course_id =". $recommendation_column['course_id'].")" ;
			$instructors_query =  mysqli_query($conn,$sql3);
			$instructor_column=mysqli_fetch_array($instructors_query,MYSQLI_ASSOC);
			$recommended[]=array($recommendation_column["course_name"],$recommendation_column["course_image"],$instructor_column["instructor_name"]);
		}
		$recommended=array_slice($recommended,0,8);
		
		while($popular_column = mysqli_fetch_array($popular_query,MYSQLI_ASSOC)){
			
			$sql4="SELECT instructor_name FROM instructors WHERE instructor_id= (SELECT instructor_id FROM course_instructor WHERE course_id =". $popular_column['course_id'].")" ;

			$instructor_query =  mysqli_query($conn,$sql4);
			$instructor_column=mysqli_fetch_array($instructor_query,MYSQLI_ASSOC);
			$popular[]=array($popular_column["course_name"],$popular_column["course_image"],$instructor_column["instructor_name"]);
		}
		$popular=array_slice($popular,0,8);
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