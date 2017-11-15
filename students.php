<?php
	//session_start();
	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	/**
	* Student functions
	*/

	include 'connection.php'; // connection.php has the database credentials and initializes connection

	class Student {
		
		private $conn;
		function __construct($dbconn)
		{
			$this->conn = $dbconn;
		}

		public function ListStudents() {
			$tid = $_SESSION['teacher_id'];
			$row = array();
			$students = array();
			$query = "
								SELECT 		grade_levels.grade, 
											 		sections.section, 
											 		students.student_id, students.first_name, students.middle_name, students.last_name
			   				FROM 			sections
			   				INNER JOIN grade_levels ON sections.grade_id = grade_levels.grade_id 
			   				LEFT JOIN students ON sections.section_id = students.section_id
			   				WHERE grade_levels.teacher_id = $tid
			   				ORDER BY grade_levels.grade asc, sections.section asc
			   			";

			if($result = $this->conn->query($query)){
				if ($result->num_rows===0) {
					return $students=0;
				} else {
			    while ($row = $result->fetch_assoc()) {  
			        $array[]=$row;   
				  }
				}
		  } else {
				printf('errno: %d, error: %s', $this->conn->errno, $this->conn->error);
			}
			foreach ($array as $row)
			{
			   $students[$row['grade']][$row['section']][] = array(
			   																											'student_id'=>$row['student_id'],
																												   		'first_name'=>$row['first_name'],
																												   		'middle_name'=>$row['middle_name'],
																												   		'last_name'=>$row['last_name'],
																												   		'scores'=> array('score1' => 1, 'score2' => 2)
																												   	);
			}
			
				$result->close();
				return $students;
			}

		public function UpdateStudent($test_data)
		{
			extract($test_data);
			$query = "UPDATE students SET student_id=?, first_name=?, middle_name=?, last_name=? WHERE student_id = ?";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('isssi', $student_id, $first_name, $middle_name, $last_name, $old_id);
				$stmt->execute();
				$stmt->close();
				return 'hello';
		}

		public function DeleteStudent($key)
		{
			$query = "DELETE FROM students WHERE student_id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('i', $key);
			$stmt->execute(); 
			$stmt->close();
		}
		
	}

	$student_information = new Student($dbconn);
	$student_list = $student_information->ListStudents();


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$student_information = new Student($dbconn);
    $action = $_POST['action'];
    	switch ($action) {
    		case 'delete':
    			$student_list = $student_information->DeleteStudent($_POST['key']);
    			break;
    		case 'update':
    			$student_list = $student_information->UpdateStudent($_POST);
    			break;
    		
    		default:
    			# code...
    			break;
    	}
	}
?>