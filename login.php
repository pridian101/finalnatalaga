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
    <link href="css/style.css" rel="stylesheet">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!-- prettify table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type='text/javascript' src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

    

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css?v=5" rel="stylesheet">
  </head>

  <body>
	<div id='fullWidth' >
		<div class="container">
			<div class="row contentViewport text-center">
				<div id="loginForm" >
					<img class="logoP" src='img/favicon.png?v1' width="160" height="140">
					<br>

					<p>Please sign in to get access</p>

					<form class="form-horizontal formView inlineLbl" id="trader-login" action="/login_check" method="post">
						<input type="hidden" name="_csrf_token" value="41FeUvuf7fr9r-7Q5weTrKUWm44Jf84LiLUzbWSbOlE"/>
						<fieldset>
							<div class="form-group">
								<div class="col-md-12">
									<input type="email" id="username" name="username" placeholder="Email address" class="form-control input-lg required">
								</div>
								<br>
								<div class="col-md-12">
									<input type="password" id="password" name="password"
									placeholder="Password" class="form-control input-lg required">
								</div>
								<br>
							</div>
							<div class="control-group form-actions text-left">
								<div class="offset2 span4">
									<div class="controls">
										<button type="submit" class="btn btn-lg btn-primary" id="_submit" name="_submit">Login</button>
									</div>
								</div>
							</div>
						</fieldset>
						<ul class="frgtPass">
							<li>
								<a id="forgot-password" href="#">Forgotten password?</a> 
								|
							</li>
							<li>
							<a href="signup.php">No account yet?</a>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
	
</html>
