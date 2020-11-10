<?php
//require'autoloader.php';
class CoursesModel extends Observable_Model {
	
	public function getAll():array{
	$dept=json_decode($this->loadData('faculty_department'),true);
	$courses=json_decode($this->loadData('courses'),true);
	$dept_courses=json_decode($this->loadData('faculty_dept_courses'),true);
	$instructor=json_decode($this->loadData('instructor'),true);
	$course_instructor=json_decode($this->loadData('course_instructor'),true);

	$c=  array();
 	
 	
	for($i = 1;$i <= count($dept_courses["faculty_dept_courses"]);$i++){
		
		for($j =0; $j < count($dept_courses["faculty_dept_courses"][$i]);$j++){

			$c[]=  array($dept["faculty_department"][$i],$courses["courses"][$dept_courses["faculty_dept_courses"][$i][$j]][0],$courses["courses"][$dept_courses["faculty_dept_courses"][$i][$j]][4],$instructor["instructors"][$course_instructor["course_instructor"][$dept_courses["faculty_dept_courses"][$i][$j]]]);
		}
	}
	
	return ['courses'=>$c];
	
 		
	}
	
	public function getRecord(string $id):array{
		$json = file_get_contents("courses.json");

 		$obj = json_decode($json,true);

		foreach ($obj['courses'] as $x=>$item) {
    		if ($item['id'] === $id)
    		 return $item;
  		}
	}

}
?>