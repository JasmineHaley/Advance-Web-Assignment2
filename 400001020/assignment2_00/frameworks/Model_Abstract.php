<?php
namespace Quwius\Framework;
	abstract class Model_Abstract {
		 
		 protected $files = array(
		'courses'=>"courses.json",
		'faculty_dept_courses'=>"faculty_dept_courses.json",
		'instructor'=>"instructors.json",
		'faculty_department'=>"faculty_department.json",
		'users'=>"users.json",
		'course_instructor'=>"course_instructor.json",
		'hashedUsers'=>"hashedUsers.json");

		abstract public function findAll():array;
		abstract public function findRecord(string $id):array;

		public function loadData($key){
			return file_get_contents(DATA_DIR."/".$this->files[$key]);
		}

		public static function makeConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mooc";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		}
			return $conn;
		}
	}
?>