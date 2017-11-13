<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   
 include '../connection.php';

  $conn=$dbconn;
 
 

  $query="SELECT students.student_id, students.first_name, students.last_name,
  							 activities.quarter, activities.activity_type, activities.date, activities.highest_score, activities.subject,
								 raw_scores.score, activities.date
							 	FROM   students 
							 	LEFT JOIN raw_scores ON raw_scores.student_id = students.student_id
							 	LEFT JOIN activities ON activities.activity_id = raw_scores.activity_id
			   			";
	 $result = $conn->query($query);
		if ($result->num_rows > 0) {

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

			$hello = array();
			$hello=array_column_recursive($students, 'date');
			echo "<pre>";
        print_r($hello);
        echo "</pre>";
        
} else {
    echo "0 results";
}

function array_column_recursive(array $haystack, $needle) {
    $found = [];
    array_walk_recursive($haystack, function($value, $key) use (&$found, $needle) {
        if ($key == $needle)
            $found[] = $value;
    });
    return $found;
}
 ?>
   
<!--  <div class="table-responsive">
  
 <table class="table table-striped table-bordered">
 <tr>
 <th>First Name</th>
 <td><?php echo $first_name; ?></td>
 </tr>
 <tr>
 <th>Last Name</th>
 <td><?php echo $last_name; ?></td>
 </tr>
 <tr>
 <th>Email ID</th>
 <td><?php echo $email; ?></td>
 </tr>
 <tr>
 <th>Position</th>
 <td><?php echo $position; ?></td>
 </tr>
 <tr>
 <th>Office</th>
 <td><?php echo $office; ?></td>
 </tr>
 </table>
   
 </div> -->
   
