<?php
	if (!isset($_SESSION['teacher_id'])) {
		header("Location: login.php");
	}
	extract($_SESSION);

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include 'students.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>eClassRecord</title>

     <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- prettify table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type='text/javascript' src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

    

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css?v=4" rel="stylesheet">
  </head>

  <body>
		<!-- header-->
		<div id="header">
		  <div class="container">
		    <div id="logoDsktp">
		       <a href="#"><img class="p-logo" src="img/logo.png?v53" width="864" height="209"></a>
		    </div>
				<ul id="subLinks">
					<li>
						<span class="header-username">
							<a href="#"><?php echo "$first_name $last_name"; ?></a>
						</span>|
					</li>
					<li>
						<a href="/logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /header-->

		<!-- content area -->
		<div class="container ca">
			<div class="row no-gutters">
				<!-- left navigation - sidebar -->
				<div class="col-lg-3">
					<div class="list-group">
          	<a href="index.php" class="list-group-item list-group-item-action bg-yale-blue active"><i class="fa fa-address-book-o fa-fw fa-2x align-middle" aria-hidden="true"></i> Students</a>
					  <a href="#" class="list-group-item list-group-item-action bg-denim-blue"><i class="fa fa-tasks fa-fw fa-2x align-middle aria-hidden="true"></i> Raw Scores</a>
					  <a href="#" class="list-group-item list-group-item-action bg-smurf-blue"><i class="fa fa-folder-o fa-fw fa-2x align-middle" aria-hidden="true"></i> Grades</a>
					  <a href="#" class="list-group-item list-group-item-action bg-light-blue"><i class="fa fa-user-o fa-fw fa-2x align-middle" aria-hidden="true"></i> Profile</a>
					</div>
				</div>
				<!-- /left navigation - sidebar-->

				<!-- main content -->
  			<div class="col 9">
  				<div class="container-fluid">
  					<section>
							<div class="tabs-wrapper">
								<ul class="nav classic-tabs blue-gradient" role="tablist">
									<li class="nav-item">
						        <a class="nav-link waves-light active" id="home-tab" data-toggle="tab" href="#nav-home" role="tab">Home</a>
						      </li>
		  						<?php
							    	foreach ($student_list as $grade => $value) {
							    		foreach ($value as $section => $students) {
									    	echo "
									    				<li class='nav-item'>
									    				<a class='nav-link waves-light' data-toggle='tab' href='#$grade$section' role='tab'>$grade - $section</a>
									    				</li>
									    	";
									    }
									  }
									?>
								</ul>
							</div>
						  <div class="tab-content card">
						    <div class="tab-pane fade in show active" id="nav-home" role="tabpanel">
					        <h3>Do your stuff here</h3>
	      					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
						    <?php
						    	foreach ($student_list as $grades => $grade) {

						    		foreach ($grade as $sections => $section) {
												    			
						    			echo "
						    				<div class='tab-pane fade' id='$grades$sections' role='tabpanel'>
													<table class='table table-sm display' id=''>
													  <thead>
													    <tr>
													      <th>ID #</th>
													      <th>Name</th>
													    </tr>
													  </thead>
													  <tbody>
											";
						    			foreach ($section as $students => $student) {
							    			echo "
											    	<tr>
												      <td>${student['student_id']}</td>
												      <td>${student['last_name']} ${student['first_name']} ${student['middle_name']}
												      		<button type='button' class='btn btn-sm fa-2x danger-color float-right' data-toggle='modal' data-target='#modalConfirmDelete' data-id='${student['student_id']}' data-f_name='${student['first_name']}' data-m_name='${student['middle_name']}' data-l_name='${student['last_name']}'><i class='fa fa-remove' aria-hidden='true'></i> Delete</button>
												      		<button type='button' class='btn btn-sm fa-2x success-color float-right' data-toggle='modal' data-target='#centralModalSuccess' data-id='${student['student_id']}' data-f_name='${student['first_name']}' data-m_name='${student['middle_name']}' data-l_name='${student['last_name']}'><i class='fa fa-edit' aria-hidden='true'></i> Edit</button>
												      		<button type='button' class='btn btn-sm fa-2x info-color float-right' data-toggle='modal' data-target='#centralModalSm' data-load-url='partials/partial_getuser.php?student_id=${student['student_id']}' data-id='${student['student_id']}' data-f_name='${student['first_name']}' data-l_name='${student['last_name']}'><i class='fa fa-eye' aria-hidden='true'></i> View Student Record</button>
												      </td>
												    </tr>
												  ";
												}
											echo "
														</tbody>
													</table>
												</div>";
										}
									}
								?>
							</div>
						</section>
  				</div>
  			</div>
  			<!-- /main content -->

  			<!-- modal content -->

  			<!-- PARTIAL delete record -->
				<?php include 'partials/partial_delete.html'; ?>
				<!-- /delete record -->

				<!-- PARTIAL update record -->
				<?php include 'partials/partial_update.html'; ?>
				<!-- /update record -->

				<!-- view student record -->
				<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-lg" role="document">
	        	<div class="modal-content">
	        		<div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Student Score</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body" id="score">

            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
            
        		</div>
	        </div>
	      </div>
				<!-- /view student record -->

  			<!-- /modal content -->
			</div>
		</div>


<script>
	$(document).ready( function () {
    $('table.display').DataTable();
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
		$(window).on("popstate", function() {
		    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
		    $("a[href='" + anchor + "']").tab("show");
		});
		$('#modalConfirmDelete').on('show.bs.modal', function (event) {
			
			var student_id = $(event.relatedTarget).data('id')
			var f_name = $(event.relatedTarget).data('f_name')
			var m_name = $(event.relatedTarget).data('m_name') 
			var l_name = $(event.relatedTarget).data('l_name')
	    
			var modal = $(this)
			modal.find('.modal-body #sid').text(student_id)
			modal.find('.modal-body #fname').text(f_name)
			modal.find('.modal-body #mname').text(m_name)
			modal.find('.modal-body #lname').text(l_name)
			modal.find('.modal-footer #url').text("test.php?id=" + student_id)

		  var student= {};
		    student.action="delete";
		    student.key = student_id;
		    console.log(JSON.stringify(student));

			$('#delete').click(function(){
			  $.ajax
			    ({
			      type: "POST",
			      dataType : 'json',
			      async: true,
			      url: 'students.php',
			      data: student,
			      success: function(data) {
        			console.log('Success!', data);
				    },
    				error: function(e) {
			        console.log('Error!', e);
			        window.location.reload();
				    }
			    });
			}); 		
		});
		$('#centralModalSuccess').on('show.bs.modal', function (event) {
			var old_student_id = $(event.relatedTarget).data('id')
			var student_id = $(event.relatedTarget).data('id')
			var f_name = $(event.relatedTarget).data('f_name')
			var m_name = $(event.relatedTarget).data('m_name') 
			var l_name = $(event.relatedTarget).data('l_name')
	    
			var modal = $(this)
			modal.find('.modal-body #old_id').text(student_id)
			modal.find('.modal-body #esid').val(student_id)
			modal.find('.modal-body #efname').val(f_name)
			modal.find('.modal-body #emname').val(m_name)
			modal.find('.modal-body #elname').val(l_name)
			$('input[name="old_id"]').val(old_student_id);
			console.log($('form').serialize());
			$('#save').click(function(){
				event.preventDefault();
				console.log($('form').serialize());
			  $.ajax
			    ({
			      type: "POST",
			      dataType : 'json',
			      async: true,
			      url: 'students.php',
			      data: $('form').serializeArray(),
			      success: function(data) {
        			console.log('Success!', data);
				    },
    				error: function(data) {
			        console.log(JSON.stringify(data));
			        window.location.reload();
				    }
			    });
			}); 		
		});
		$('#centralModalSm').on('shown.bs.modal', function (event) {
			var load_url = $(event.relatedTarget).data('load-url');
			var id = $(event.relatedTarget).data('id');
			var first_name = $(event.relatedTarget).data('f_name');
			var last_name = $(event.relatedTarget).data('l_name');
			$(this).find('.modal-body').load(load_url);
			$(this).find('.modal-title').text(id + ' - ' + first_name + ' ' + last_name);
		});
  });
</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
	
</html>