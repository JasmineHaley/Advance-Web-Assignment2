<?php
//namespace Apps\handlers;
use Quwius\Framework\Observable_Model;
//require'autoloader.php';
class CoursesModel extends Observable_Model {
	
	public function findAll():array{
	$conn=$this->makeConnection();

	$sql1= "SELECT * FROM faculty_dept_courses";
	$query = mysqli_query($conn,$sql1);
	
	while($faculty_dept_courses = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		$sql2="SELECT faculty_dept_name FROM faculty_department WHERE faculty_dept_id =".$faculty_dept_courses["faculty_dept_id"];
		$sql3="SELECT course_name,course_image FROM courses WHERE course_id = ".$faculty_dept_courses["course_id"];
		$sql4="SELECT instructor_name FROM instructors WHERE instructor_id= (SELECT instructor_id FROM course_instructor WHERE course_id =". $faculty_dept_courses['course_id'].")" ;

		$faculty_name_query=mysqli_query($conn,$sql2);
		$course_query=mysqli_query($conn,$sql3);
		//var_dump($course_query);
		$instructor_query = mysqli_query($conn,$sql4);

		$faculty_name=mysqli_fetch_array($faculty_name_query,MYSQLI_ASSOC);
		$course=mysqli_fetch_array($course_query,MYSQLI_ASSOC);
		$instructor=mysqli_fetch_array($instructor_query,MYSQLI_ASSOC);
		//var_dump($instructor["instructor_name"]);
		$c[]=array($faculty_name["faculty_dept_name"],$course["course_name"],$course["course_image"],$instructor["instructor_name"]);

	}
	//var_dump($c);
	return ['courses'=>$c];
	
 		
	}
	
	public function findRecord(string $id):array{
			return [];
	}
}
?>