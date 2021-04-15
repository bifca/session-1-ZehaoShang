<!DOCTYPE html>
<html>

	<head>
		<!--Unicode-->
		<meta charset="UTF-8">
		<!--Browser status bar title-->
		<title>Weather</title>
		<!--Responsive get the browser width-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--keywords to help user search in Search Engine-->
		<meta name="keywords" content="Weather" />
		<!--<ico> left of title-->
		<link href="img/weather.ico" rel="icon" type="image/x-ico">
		<!-- Icomoon Icon Fonts-->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!--Bootstrap4-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<!--main-style-->
		<link href="css/formStyle.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<!--Require Database Connection-->
		<?php
		require 'config.php';
		?>
		<!--END: Require Database Connection-->

		<div class="formPosition">
			<!--Register Page Title-->
			<h1 class="registerTitle">New User Registration Form</h1>
			<div class="registerFormDiv">
				<!--Create Account Form-->
				<form action="createaccount.php?city=<?php echo $_GET["city"];?>" method="post" enctype="multipart/form-data" class="registerForm">
					<!--error infomation from createaccount.php-->
			
					<!--User Detail Part-->
					<div class="form-group">
						<label>Username:</label>
						<input class="form-control" type="text" name="username" required="required" placeholder="Enter Your Username">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input class="form-control" type="password" name="password" required="required" placeholder="Enter Your Password">
					</div>
					<div class="form-group">
						<label>Nickname:</label>
						<input class="form-control" type="text" name="nickname" required="required" placeholder="Enter Your Nickname">
					</div>
						<input type="submit" name="submit" value="submit" class="btn btn-primary mb-2">
							<p><a href="login.php?city=<?php echo $_GET["city"];?>">Return to website login</a></p>
							<?php if(!empty(	$_SESSION["error"])) { ?>
	<div class="Error"><?php echo 	$_SESSION["error"]; ?></div><?php } ?>
				</form>
			</div>
		</div>

		

		<!--JavaScript-->
		<!--jQuery-->
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<!--Bootstrap JS-->
		<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<!--main javaScript-->
		<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
		<!--END: JavaScript-->
	</body>

</html>