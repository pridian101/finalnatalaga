<?php


include '../connection.php';

$conn=$dbconn;

$uid = $_GET['student_id'];

$query="SELECT activities.quarter, activities.subject, activities.activity_type, activities.date, activities.highest_score,
               raw_scores.score 
        FROM   raw_scores 
        LEFT JOIN activities ON activities.activity_id = raw_scores.activity_id
        WHERE raw_scores.student_id = $uid
        ORDER BY activities.date ASC";
 $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
    $array[]=$row;
  }

  foreach ($array as $row){
    $students[$row['quarter']][$row['subject']][$row['activity_type']][]=array(
    'date' => $row['date'],
    'highest'=> $row['highest_score'],
    'score'=> $row['score']
    );
  }
  // echo "<pre>";
  //     print_r($students);
  //     echo "</pre>";
  $total_grade = array();
  $whs = $phs = $ahs = 0;
 ?>
   
<ul class="nav md-pills nav-justified pills-secondary purple-gradient" id="myTab">
    <li class="nav-item active">
        <a class="nav-link" data-toggle="tab" href="#1" role="tab">Quarter 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#2" role="tab">Quarter 2</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#3" role="tab">Quarter 3</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#4" role="tab">Quarter 4</a>
    </li>
</ul>

<!-- Tab panels -->
<div class="tab-content">


 

    <?php  

      foreach ($students as $key => $value) {
        if ($key==1) {
          echo "<div class='tab-pane active' id='$key' role='tabpanel'>";
        } else {
          echo "<div class='tab-pane' id='$key' role='tabpanel'>";
        }
        echo "
          <br>

          <table class='table table-striped table-bordered table-sm'>
            <thead>
              <tr>
                <th></th>
                <th>Written</th>
                <th>Performance</th>
                <th>Assessment</th>
                <th>Raw Grade</th>
                <th>Final Grade</th>
              </tr>
            </thead>
            <tbody>";
              foreach ($value as $key1 => $value2) {
                echo "<tr>";
                echo "<th scope='row'>$key1</th>";
                echo "<td>";
                foreach ($value2['Written'] as $key2 => $score) {
                  $total_grade[] = 
                                    array(
                                      'written_highest' => $score['highest'],
                                      'written_score' => $score['score']
                                    
                                  );
                  echo "<span type='button' class='btn btn-sm btn-outline-default top ' data-toggle='popover' data-trigger='hover' data-placement='top' title='Date: ${score['date']}' data-content='Perfect score: ${score['highest']}'>".($score['score'])."</span>";
                }
                $whs = array_column($total_grade, 'written_highest');
                $ws = array_column($total_grade, 'written_score');
                $wst = array_sum($ws)/array_sum($whs);
                echo "</td>";
                echo "<td>";
                foreach ($value2['Performance'] as $key2 => $score) {
                  $total_grade[] = 
                                    array(
                                      'performance_highest' => $score['highest'],
                                      'performance_score' => $score['score']
                                    
                                  );
                $phs = array_column($total_grade, 'performance_highest');
                $ps = array_column($total_grade, 'performance_score');
                $pst = array_sum($ps)/array_sum($phs);
                echo "<span type='button' class='btn btn-sm btn-outline-default top ' data-toggle='popover' data-trigger='hover' data-placement='top' title='Date: ${score['date']}' data-content='Perfect score: ${score['highest']}'>".($score['score'])."</span>";
                }
                echo "</td>";
                echo "<td>";
                foreach ($value2['Assessment'] as $key2 => $score) {
                  $ast = $score['score']/$score['highest'];
                  echo "<span type='button' class='btn btn-sm btn-outline-default top ' data-toggle='popover' data-trigger='hover' data-placement='top' title='Date: ${score['date']}' data-content='Perfect score: ${score['highest']}'>".($score['score'])."</span>";
                }
                echo "
                        </td>
                <td>".round((($wst*100*.3)+($pst*100*.5)+($ast*100*.2)),2)."</td>
                <td></td>
                      </tr>
                    ";
              }
            echo "</tbody>
          </table>
        </div>";
      }
    ?>

</div>

