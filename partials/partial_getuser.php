<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   
 include '../connection.php';

  $conn=$dbconn;
 
 	$uid = $_GET['student_id'];

  $query="SELECT students.student_id, students.first_name, students.last_name,
  							 activities.quarter, activities.activity_type, activities.date, activities.highest_score, activities.subject,
								 raw_scores.score, activities.date
							 	FROM   students 
							 	LEFT JOIN raw_scores ON raw_scores.student_id = students.student_id
							 	LEFT JOIN activities ON activities.activity_id = raw_scores.activity_id
							 	WHERE students.student_id = $uid
							 	ORDER BY activities.date ASC
			   			";
	 $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
    	$array[]=$row;
    	
    }
    foreach ($array as $row)
			{
			   $students[$row['student_id']][$row['quarter']][$row['subject']][$row['activity_type']][]=array(
			   																																																'date' => $row['date'],
			   																																																'highest'=>$row['highest_score'],
			   																																																'score'=>$row['score']
			   																																																);
			   
			}

				echo "<pre>";
        print_r($students);
        echo "</pre>";
        
  

function array_column_recursive(array $haystack, $needle) {
    $found = [];
    array_walk_recursive($haystack, function($value, $key) use (&$found, $needle) {
        if ($key == $needle)
            $found[] = $value;
    });
    return $found;
}
 ?>
   