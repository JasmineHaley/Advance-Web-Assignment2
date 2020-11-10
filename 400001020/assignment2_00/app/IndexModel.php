<?php
//namespace Apps\handlers;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\InsertTrait;
class IndexModel extends Observable_Model {
	
	
	public function findAll():array{
		$conn=$this->makeConnection();
		//var_dump($conn); 
		$sql1= "SELECT * FROM courses ORDER BY course_recommendation_count DESC";
		$sql2= "SELECT * FROM courses ORDER BY course_access_count DESC";
		$sql3="SELECT * FROM course_instructor ";
		$sql4= "SELECT * FROM instructors";
		
		$recommendation_query = mysqli_query($conn,$sql1);
		$popular_query =  mysqli_query($conn,$sql2);
		$course_instructor_query =  mysqli_query($conn,$sql3);
		$instructors_query =  mysqli_query($conn,$sql4);

		while($recommendation_column = mysqli_fetch_array($recommendation_query,MYSQLI_ASSOC)){
			while ($course_instructor_column=mysqli_fetch_array($course_instructor_query, MYSQLI_ASSOC)){

			}
		}
		
		//$instructor = mysqli_fetch_array($instructors_column, MYSQLI_BOTH);
		
		/*while ($instructor_column=mysqli_fetch_array($instructors_query, MYSQLI_ASSOC)){
			$instructor["instructor"][]= $instructor_column["instructor_id"];
			$instructor["instructor_name"][]=$instructor_column["instructor_name"];
		}
		while ($course_instructor_column=mysqli_fetch_array($course_instructor_query, MYSQLI_ASSOC)){
			$course_instructor["course_id"][]= $course_instructor_column["course_id"];
			$course_instructor["instructor_id"][]=$course_instructor_column["instructor_id"];
		}*/
		
		//var_dump($course_instructor["instructor_id"]);
		/*while($recommendation_column = mysqli_fetch_array($recommendation_query,MYSQLI_ASSOC)){
			//var_dump($course_instructor["instructor_id"][0]);
			for ($i = 0; $i < count($course_instructor["course_id"]);$i++){
				if($recommendation_column["course_id"]== $course_instructor["course_id"][$i]){
					
					$recommend[] = array($recommendation_column,$instructor_column["instructor_name"][$course_instructor["instructor_id"][$i]]);
				}
			}
		}*/
		//var_dump($recommend);
		//$popular = $popular_column->fetch_assoc();
		//$course_instructor = $course_instructor_column->fetch_assoc();
		//$instructors =$instructors_column->fetch_assoc();
		
		/*$courses=json_decode($this->loadData('courses'),true);
		$instructor=json_decode($this->loadData('instructor'),true);
		$course_instructor=json_decode($this->loadData('course_instructor'),true);

		$popular_column = array_column($courses["courses"],3);
		$recommended_column = array_column($courses["courses"],2);
		$c = $courses["courses"];

		array_multisort($recommended_column,SORT_DESC,$courses["courses"]);
		
		$recommended = array_slice($courses["courses"],0,8);

		array_multisort($popular_column,SORT_DESC,$c);
		$popular = array_slice($c,0,8);
		
		//var_dump($courses["courses"]);
		$instructors=[];
		foreach($courses["courses"] as $key=>$value){
			foreach($course_instructor["course_instructor"] as $k=>$val){
				if($key == $k){
					$instructors[$value[0]]=$instructor["instructors"][$val];
				}
			}
		}
		
		return ['popular'=>$popular,'recommended'=>$recommended,'instructors'=>$instructors];*/
		

	}
	public function findRecord(String $id):array{
		return [];
	}
	public function insert (array $values){

	}
}
?>