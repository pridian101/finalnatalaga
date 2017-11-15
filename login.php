<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/favicon.png">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
           <section class="login">

    <!-- Form login -->
							<form action="auth_user.php" method="POST">
							    <div class="text-center">
							        <img class="logo" src="img/favicon.png">
							    </div>
							    <div class="md-form">
							        <i class="fa fa-envelope prefix white-text"></i>
							        <input type="text" id="defaultForm-email" class="form-control white-text" name="username">
							        <label for="defaultForm-email" class="white-text">Your email</label>
							    </div>

							    <div class="md-form">
							        <i class="fa fa-lock prefix white-text"></i>
							        <input type="password" id="defaultForm-pass" class="form-control white-text" name="password">
							        <label for="defaultForm-pass" class="white-text">Your password</label>
							    </div>

							    <div class="text-center">
							        <button class="btn info-color-dark info-color">Login</button>
							    </div>
							</form>
						</section>   
        </div>
    </div>
    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
